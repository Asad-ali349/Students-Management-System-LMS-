<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\admin;
use App\Models\courses;
use App\Models\student;
use App\Models\course_enrollment;
use App\Models\quiz_responses;
use App\Models\response_docs;
use App\Models\helping_material;
use App\Models\helping_material_docs;
use App\Models\quiz;
use App\Models\quiz_docs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\fee_reminder;
use App\Mail\new_account;
use App\Mail\quiz_assigned;
use App\Mail\course_helping_material;
use App\Models\invoice;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function login(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required', 
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            // dd($req);
            if(Auth::guard('admin')->attempt(['email'=>$req->email,'password'=>$req->password]))
            {

                ///////////////////take to dashboard
                return redirect("admin/dashboard");
            }
            else
            {
                //////////////////////error msg password not correct
                return redirect()->back()->with('error_msg', "Incorrect Password");
            }
        }
           
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/admin');
    }
    public function update_profile(Request $req){
        // dd("hello");
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required | email',
            'telephone'=>'required',
            // 'image'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required',
            'country'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $user_id=Auth::guard('admin')->user()->id;
                if($req->image!=null){
                    // dd("with");
                    if(substr($req->image->getMimeType(), 0, 5)=="image"){
                        $image=$req->file('image')->store('admin');
                        if($image){
                            $update=admin::where('id',$user_id)->update([
                                'name'=>$req->name, 
                                'email'=>$req->email,  
                                'phone'=>$req->telephone, 
                                'street'=>$req->street,
                                'image'=>$image,
                                'city'=>$req->city, 
                                'state'=>$req->state, 
                                'zip'=>$req->zip, 
                                'country'=>$req->country, 
                                
                            ]);
                            if($update){
                                return $this->profile();
                            }else{
                                return redirect()->back()->with('error_msg', "Unable to update profile");
                            }
                        }else{
                            return redirect()->back()->with('error_msg', "Unable to update profile");
                        }
                    }else{
                        return redirect()->back()->with('error_msg', "Profile Picture must be an Image");
                    }    
                }else{
                    // dd("without");
                    $update=admin::where('id',$user_id)->update([
                        'name'=>$req->name, 
                        'email'=>$req->email,  
                        'phone'=>$req->telephone, 
                        'street'=>$req->street,
                        'city'=>$req->city, 
                        'state'=>$req->state, 
                        'zip'=>$req->zip, 
                        'country'=>$req->country, 
                        
                    ]);
                    if($update){
                        return $this->profile();
                    }else{
                        return redirect()->back()->with('error_msg', "Unable to update profile");
                    }
                }
           
            
        }
    }
    public function dashboard()
    {
        $student_count=student::get()->count();
        $courses_count=courses::get()->count();
        $helping_material_count=helping_material::get()->count();

        $monthly_revenue=DB::select('SELECT MONTHNAME(created_at) as month,sum(total_fee) as sum FROM `invoice` GROUP BY Month(created_at);');
        $count=0;
        $month_name=array();
        $month_sum=array();
        foreach($monthly_revenue as $revenue){
            $month_name[$count]=$revenue->month;
            $month_sum[$count]=$revenue->sum;
            $count++;  
        }
        // dd('students: '.$student_count.' course: '.$courses_count.' helping material: '.$helping_material_count);

        // dd($month_name);

        return view('admin/dashboard',compact(['student_count','courses_count','helping_material_count','month_name','month_sum']));
    }
    public function cal_revenue()
    {
        $monthly_revenue=DB::select('SELECT MONTHNAME(created_at) as month,sum(total_fee) as sum FROM `invoice` GROUP BY Month(created_at);');
        $count=0;
        $month_name=array();
        $month_sum=array();
        foreach($monthly_revenue as $revenue){
            $month_name[$count]=$revenue->month;
            $month_sum[$count]=$revenue->sum;
            $count++;  
        }

        $yearly_revenue=DB::select('SELECT Year(created_at) as year,sum(total_fee) as sum FROM `invoice` GROUP BY Year(created_at);');
        $count2=0;
        $year_name=array();
        $year_sum=array();
        foreach($yearly_revenue as $revenue){
            $year_name[$count2]=$revenue->year;
            $year_sum[$count2]=$revenue->sum;
            $count2++;  
        }

        $response=['error'=>false];
        $response['month_name']=$month_name;
        $response['month_sum']=$month_sum;
        $response['year_name']=$year_name;
        $response['year_sum']=$year_sum;
        return response()->json([
            // $response=['error'=>false];
            'month_name'=>$month_name,
            'month_sum'=>$month_sum,
            'year_name'=>$year_name,
            'year_sum'=>$year_sum,
        ]);


        // return view('admin/dashboard',compact(['student_count','courses_count','helping_material_count','month_name','month_sum']));
    }



    public function add_student()
    {
        $courses=courses::get();
        return view('admin/add_student',compact('courses'));
    }
    public function submit_add_student(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'father_name'=>'required',
            'father_contact'=>'required',
            'student_email'=>'required | email',
            'student_password'=>'required',
            'student_contact'=>'required',
            'classno'=>'required',
            'student_street'=>'required',
            'courses'=>'required',
            // 'course_class'=>'required',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{

            $student_exist=student::where('email',$req->student_email)->get();

            if(count($student_exist)>0){
                return redirect()->back()->with('error_msg', "Student Already Exist");
            }else{

                $add_student=student::create([
                    'name'=>$req->name, 
                    'email'=>$req->student_email,
                    'password'=>Hash::make($req->student_password),
                    'father_name'=>$req->father_name, 
                    'father_phone'=>$req->father_contact, 
                    'class_no'=>$req->classno, 
                    'phone'=>$req->student_contact, 
                    'address'=>$req->student_street, 
                ]);
                if($add_student){
                     $student_id=$add_student->id;
                    foreach($req->courses as $key=>$val){
                        $course_id=$req->courses[$key];
                        // $course_class=$req->course_class[$key];
                        
                        $enroll=course_enrollment::create([
                            'student_id'=>$student_id,
                            'course_id'=>$course_id,
                            // 'class_no'=>$course_class,
                        ]);
                    }
                    $total_fee=$this->calculate_fee($student_id);
                    $update_fee=student::where('id',$student_id)->update([
                        'total_fee'=>$total_fee,
                    ]);
                    if($update_fee){
                        $details=[
                            'title'=>"New Account",
                            'name'=>$req->name,
                            'email'=>$req->student_email,
                            'password'=>$req->student_password
                        ];
                        $email=$req->student_email;
                        // dd($email);
                        // $sent=Mail::to($email)->send(new new_account($details));
                        
                    }else{
                        return redirect()->back()->with('success_msg', 'Unable to Update Student Fee');
                    }
                }else{
                    return redirect()->back()->with('success_msg', 'Unable to add Student');
                }
            }
            
        }
        
    }
    public function calculate_fee($student_id)
    {
        $total_fee=0;
        $get_all_enrolled_course=course_enrollment::with('course')->where('student_id',$student_id)->get();
        foreach($get_all_enrolled_course as $enrollment){

            $total_fee+=$enrollment->course->course_fee;
        }
        return $total_fee;
    }
    public function view_students()
    {

        $students=student::orderBy('id', 'desc')->get();
        return view('admin/view_students',compact('students'));

    }
    public function edit_student($id)
    {
        $courses=courses::get();
        $student=student::with('enrolled_courses')->where('id',$id)->first();
        return view('admin/edit_student',compact(['student','courses']));

    }
    public function submit_edit_student(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'father_name'=>'required',
            'father_contact'=>'required',
            'student_email'=>'required | email',
            'student_contact'=>'required',
            'classno'=>'required',
            'student_street'=>'required',
            'courses'=>'required',
            'student_id'=>'required',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            // dd($req->student_id);s
            $add_student=student::where('id',$req->student_id)->update([
                'name'=>$req->name, 
                'email'=>$req->student_email,
                'father_name'=>$req->father_name, 
                'father_phone'=>$req->father_contact, 
                'class_no'=>$req->classno, 
                'phone'=>$req->student_contact, 
                'address'=>$req->student_street, 
            ]);
            if($add_student){
                $student_id=$req->student_id;
                $get_all_enrolled_course=course_enrollment::where('student_id',$student_id)->delete();
                // $get_all_enrolled_course->delete();
                foreach($req->courses as $key=>$val){
                    $course_id=$req->courses[$key];
                    // $course_class=$req->course_class[$key];
                    
                    $enroll=course_enrollment::create([
                        'student_id'=>$student_id,
                        'course_id'=>$course_id,
                        // 'class_no'=>$course_class,
                    ]);
                }
                $total_fee=$this->calculate_fee($student_id);
                $update_fee=student::where('id',$student_id)->update([
                    'total_fee'=>$total_fee,
                ]);
                if($update_fee){
                    
                    return redirect()->back()->with('success_msg', 'Student Updated');
                }else{
                    return redirect()->back()->with('error_msg', 'Unable to Update Student Fee');
                }
            }else{
                return redirect()->back()->with('error_msg', 'Unable to add Student');
            }
        }
        
    }
    public function student_details($id)
    {
        
        $student=student::with('enrolled_courses','quiz_responses.quiz_detail','invoices')->where('id',$id)->first();
        // dd($student);

        return view('admin/student_details',compact('student'));
    }
    public function delete_student($id)
    {
        $student=student::with('enrolled_courses')->where('id',$id)->delete();
        if($student){
            return redirect()->back()->with('success_msg', 'Student Deleted');
        }else{
            return redirect()->back()->with('success_msg', 'Unable to Delete Student');
        }
    }



    public function add_course()
    {
        return view('admin/add_course');
    }
    public function submit_add_course(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'class_no'=>'required',
            
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $add_course=courses::create([
                'name'=>$req->name,
                'course_fee'=>$req->price,
                'description'=>$req->description,
                'class_no'=>$req->class_no
            ]);
            if($add_course){
                return redirect()->back()->with('success_msg', "Course Added");
            }else{
                return redirect()->back()->with('error_msg', "Unable to add Course");
            }
        }    
        
    }
    public function view_courses()
    {
        $courses=courses::orderBy('id', 'desc')->get();
        
        return view('admin/view_courses',compact('courses'));
    }
    public function edit_course($id)
    {
        $course=courses::where('id',$id)->first();
        return view('admin/edit_course',compact('course'));
    }
    public function submit_edit_course(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'course_id'=>'required',
            'class_no'=>'required',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $add_course=courses::where('id',$req->course_id)->update([
                'name'=>$req->name,
                'course_fee'=>$req->price,
                'description'=>$req->description,
                'class_no'=>$req->class_no
            ]);
            if($add_course){
                return redirect()->back()->with('success_msg', "Course Updated");
            }else{
                return redirect()->back()->with('error_msg', "Unable to update Course");
            }
        }    
        
    }
    public function delete_course($id)
    {
        $delete_course=courses::where('id',$id)->first();
        $delete_course->delete();
        if($delete_course){
            return $this->view_courses();
         }else{
             return redirect()->back()->with('error_msg',"Unable to delete course");
         }
    }
    public function due_fee()
    {
        $invoices=invoice::with('student_detail')->where('status','0')->orderBy('id', 'desc')->get();

        return view('admin/due_fee',compact('invoices'));
    }
    public function update_invoice_status($id)
    {
        $current_date=date('Y-m-d');
        $invoices=invoice::where('id',$id)->update([
            'status'=>'1',
            'paid_date'=>$current_date
        ]);
        if($invoices){
            return redirect()->back()->with('success_msg',"Fee Accepted");
        }else{
             return redirect()->back()->with('error_msg',"Unable To Accept");
        }
        
    }
    public function paid_fee()
    {
        $invoices=invoice::with('student_detail')->where('status','1')->orderBy('id', 'desc')->get();
        return view('admin/paid_fee',compact('invoices'));
    }
    public function course_enrollment()
    {
        $courses=courses::get();
        $students=student::where('status','1')->get();
        return view('admin/course_enrollment',compact(['students','courses']));
    }
    public function submit_course_enrollment(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'student_id'=>'required',
            'course_id'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $student_id=$req->student_id;
            $course_id=$req->course_id;
            $enroll=course_enrollment::create([
                'student_id'=>$student_id,
                'course_id'=>$course_id,
                // 'class_no'=>$course_class,
            ]);
            if($enroll){
                $total_fee=$this->calculate_fee($student_id);
                $update_fee=student::where('id',$student_id)->update([
                    'total_fee'=>$total_fee,
                ]);
                if($update_fee){
                    return redirect()->back()->with('success_msg', 'Student Enrolled In Course');
                }else{
                    return redirect()->back()->with('success_msg', 'Unable to Update Student Fee');
                }
            }else{
                return redirect()->back()->with('error_msg', "Unable to Enroll Student");
            }
        } 
    }
    public function profile()
    {

        $user_id= Auth::guard('admin')->user()->id;
        $admin=admin::where('id',$user_id)->first();
        return view('admin/profile',compact('admin'));
    }
    public function edit_profile()
    {
        return view('admin/edit_profile');
    }
    public function add_quiz()
    {
        $courses=courses::get();
        return view('admin/add_quiz',compact('courses'));
    }
    public function submit_add_quiz(Request $req)
    {        
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'course_name'=>'required',
            'total_marks'=>'required',
            'quiz_end_time'=>'required',
            'description'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            // dd('as');
            $add_quiz= quiz::create([
                'name'=>$req->name, 
                'description'=>$req->description, 
                'course_id'=>$req->course_name, 
                'total_marks'=>$req->total_marks, 
                'total_time'=>$req->quiz_end_time, 
                'status'=>'0'
            ]);

            if($add_quiz){
                $quiz_id=$add_quiz->id;
                // if($req->file('file')!=null){
                //     dd('file is null');
                // }
                // dd($req->file('file'));
                if($req->file('file')!=null){
                    foreach($req->file('file') as $key=>$name){
                        $quizdoc=$req->file('file')[$key]->store('Quiz_docs');
                        $add_docs=new quiz_docs;
                        $add_docs->quiz_id=$quiz_id;
                        $add_docs->document=$quizdoc;
                        $add_docs->save();
                    }

                    $get_students=course_enrollment::with('student')->where('course_id',$req->course_name)->get();
                    // dd($get_students);
                    foreach($get_students as $student){
                        $add_response=quiz_responses::create([
                            'student_id'=>$student->student_id,
                            'quiz_id'=>$quiz_id,
                            'total_marks'=>$req->total_marks,
                        ]);

                        $details=[
                            'title'=>"quiz",
                            'name'=>$student->student->name,
                        ];
                        // $sent=Mail::to($student->student->email)->send(new quiz_assigned($details));
                    }

                    return redirect()->back()->with('success_msg', 'Quiz Added');
                }else{
                    $get_students=course_enrollment::with('student')->where('course_id',$req->course_name)->get();
                    // dd($get_students);
                    foreach($get_students as $student){
                        $add_response=quiz_responses::create([
                            'student_id'=>$student->student_id,
                            'quiz_id'=>$quiz_id,
                            'total_marks'=>$req->total_marks,
                        ]);

                        $details=[
                            'title'=>"quiz",
                            'name'=>$student->student->name,
                        ];
                        // $sent=Mail::to($student->student->email)->send(new quiz_assigned($details));
                    }

                    return redirect()->back()->with('success_msg', 'Quiz Added'); 
                }
            }else{
                return redirect()->back()->with('error_msg', "Unable to Enroll Student");
            }
        } 
    }
    public function edit_quiz($id)
    {
        $courses=courses::get();
        $quiz=quiz::with('course_detail','quiz_docs')->where('id',$id)->first();
        // dd($quiz);
        return view('admin/edit_quiz',compact('quiz','courses'));
    }
    public function submit_edit_quiz(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'course_name'=>'required',
            'total_marks'=>'required',
            'quiz_end_time'=>'required',
            'description'=>'required',
            'quiz_id'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{

            $add_quiz= quiz::where('id',$req->quiz_id)->update([
                'name'=>$req->name, 
                'description'=>$req->description, 
                'course_id'=>$req->course_name, 
                'total_marks'=>$req->total_marks, 
                'total_time'=>$req->quiz_end_time,
            ]);

            if($add_quiz){
                return redirect()->back()->with('success_msg', "Quiz Updated Successfully");
            }else{
                return redirect()->back()->with('error_msg', "Unable to Update Quiz");
            }

        }

    }
    public function view_quiz()
    {
        $quizes=quiz::with('course_detail')->orderBy('id', 'desc')->get();

        
        return view('admin/view_quiz',compact('quizes'));
    }
    public function quiz_detail($id)
    {
        $quiz=quiz::with('course_detail','quiz_docs')->where('id',$id)->first();
        $quiz_response=quiz_responses::with('student_detail')->where('quiz_id',$id)->get();
        // dd()
        return view('admin/quiz_detail',compact('quiz','quiz_response'));
    }
    public function quiz_response_detail($id)
    {
        $quiz_response=quiz_responses::with('quiz_detail.course_detail','response_docs','student_detail')->where('id',$id)->first();
        return view('admin/quiz_response_detail',compact('quiz_response'));
    }


    public function delete_quiz($id)
    {
        $quiz=quiz::with('quiz_docs')->where('id',$id)->first();

        foreach($quiz->quiz_docs as $docs){
            $unlink_doc=Storage::delete($docs->document);
        }




        $quiz_responses=quiz_responses::with('response_docs')->where('quiz_id',$id)->get();
        foreach($quiz_responses as $quiz_response){
            foreach($quiz_response->response_docs as $r_docs){
                $unlink_doc=Storage::delete($r_docs->document);
    
            }
            $quiz_responses=quiz_responses::where('quiz_id',$id)->delete();
        }
        

        $delete=$quiz->delete();
        if($delete){
            return redirect()->back()->with('success_msg', "Deleted successfully");
        }else{
            return redirect()->back()->with('error_msg', "Unable To delete");
        }
    }



    public function delete_quiz_docs($id)
    {
        // dd($id);
        $get_doc=quiz_docs::where('id',$id)->first();
        $unlink_doc=Storage::delete($get_doc->document);
        if($unlink_doc){
            $get_doc->delete();
            if($get_doc){
                return response()->json([
                    'type' => 'success',
                    'msg'=> 'Document Deleted'
                ]);
            }else{
                return response()->json([
                    'type' => 'error',
                    'msg'=> 'Unable To Delete'
                ]);
            }
        }else{
            return response()->json([
                'type' => 'error',
                'msg'=> 'Document Not Found'
            ]);
        }
    }
    public function uplaod_quiz_docs(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'quiz_id'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{



            $quiz_id=$req->quiz_id;
            $materialdoc=$req->file('file')->store('Quiz_docs');
            $add_docs=new quiz_docs;
            $add_docs->quiz_id=$quiz_id;
            $add_docs->document=$materialdoc;
            $add_docs->save();
            
            if($add_docs){
                return response()->json([
                    'type' => 'success',
                    'msg'=> 'Quiz Document Added'
                ]);
            }else{
                return response()->json([
                    'type' => 'error',
                    'msg'=> 'Unable To Add Document'
                ]);
            }
           
               
           
           
        }
    }  
    public function update_marks(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'obt_marks'=>'required',
            'response_id'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
           $updatemarks=quiz_responses::where('id',$req->response_id)->update([
                'obtain_marks'=>$req->obt_marks,
                'status'=>'2'
           ]);
           if($updatemarks){
                return redirect()->back()->with('success_msg', "Quiz Marks Updated Successfully");
            }else{
                return redirect()->back()->with('error_msg', "Unable to Update Quiz Marks");
            }
        }
    }


    public function add_material()
    {
        $courses=courses::get();
        return view('admin/add_material',compact('courses'));
    }
    public function submit_add_material(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'course_id'=>'required',
            'description'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
           $add=helping_material::create([
                'course_id'=>$req->course_id,
                'description'=>$req->description
           ]);
           if($add){
                $helping_material_id=$add->id;
                if($req->file('file')!=null){
                    foreach($req->file('file') as $key=>$name){
                        $materialdoc=$req->file('file')[$key]->store('Helping_material_docs');
                        $add_docs=new helping_material_docs;
                        $add_docs->helping_material_id=$helping_material_id;
                        $add_docs->document=$materialdoc;
                        $add_docs->save();
                    }
                }
                
                $course=course_enrollment::with('student','course')->where('course_id',$req->course_id)->get();

                foreach($course as $student){
                    
                    $details=[
                        'title'=>"material",
                        'name'=>$student->student->name,
                        'course_name'=>$student->course->name,
                    ];
                    // $sent=Mail::to($student->student->email)->send(new course_helping_material($details));
                }
                // dd($course);
                return redirect()->back()->with('success_msg', "Material Added");
                
            }else{
                return redirect()->back()->with('error_msg', "Unable to add Material");
            }
        }   
    }
    public function edit_material()
    {
        return view('admin/edit_material');
    }
    public function view_materials()
    {
        $materials= DB::select('SELECT helping_material.*,Count(*) as count,courses.name as course_name,courses.class_no as course_class FROM helping_material LEFT JOIN courses ON courses.id=helping_material.course_id GROUP BY helping_material.course_id');
        
        return view('admin/view_materials',compact('materials'));
    }
    public function material_detail($id)
    {
        $material=helping_material::with('course_detail','helping_material_docs')->where('id',$id)->first();
        // dd($material);
        return view('admin/material_detail',compact('material'));
    }
    public function view_course_material($id)
    {
        $materials=helping_material::with('course_detail')->where('course_id',$id)->orderBy('id', 'desc')->get();
        // dd($material);
        return view('admin/view_course_material',compact('materials'));
    }
    public function delete_material($id)
    {
        $materials=helping_material::with('helping_material_docs')->where('id',$id)->first();

        foreach($materials->helping_material_docs as $docs){
            $unlink_doc=Storage::delete($docs->document);
        }
        $delete=$materials->delete();
        if($delete){
            return redirect()->back()->with('success_msg', "Deleted successfully");
        }else{
            return redirect()->back()->with('error_msg', "Unable To delete");
        }
    }
    public function delete_all_material($id)
    {
        $materials=helping_material::with('helping_material_docs')->where('course_id',$id)->get();
        foreach($materials as $material){
            foreach($material->helping_material_docs as $docs){
                $unlink_doc=Storage::delete($docs->document);
            }
        }
        $delete=helping_material::with('helping_material_docs')->where('course_id',$id)->delete();
        // $delete=$materials->delete();
        if($delete){
            return redirect()->back()->with('success_msg', "Deleted successfully");
        }else{
            return redirect()->back()->with('error_msg', "Unable To delete");
        }
    }
    public function delete_material_docs($id)
    {
        // dd($id);
        $get_doc=helping_material_docs::where('id',$id)->first();
        $unlink_doc=Storage::delete($get_doc->document);
        if($unlink_doc){
            $get_doc->delete();
            if($get_doc){
                return response()->json([
                    'type' => 'success',
                    'msg'=> 'Document Deleted'
                ]);
            }else{
                return response()->json([
                    'type' => 'error',
                    'msg'=> 'Unable To Delete'
                ]);
            }
        }else{
            return response()->json([
                'type' => 'error',
                'msg'=> 'Document Not Found'
            ]);
        }
    }
    
    
    public function uplaod_material_docs(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'helping_material_id'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{



            $helping_material_id=$req->helping_material_id;
            $materialdoc=$req->file('file')->store('Helping_material_docs');
            $add_docs=new helping_material_docs;
            $add_docs->helping_material_id=$helping_material_id;
            $add_docs->document=$materialdoc;
            $add_docs->save();
            
            if($add_docs){
                return response()->json([
                    'type' => 'success',
                    'msg'=> 'Helping Material Added'
                ]);
            }else{
                return response()->json([
                    'type' => 'error',
                    'msg'=> 'Unable To Add Document'
                ]);
            }
           
               
           
           
        }
        
    }
    public function change_password()
    {
        return view('admin/change_password');
    }
    public function submit_change_password(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'oldpassword'=>'required',
            'newpass'=>'required',
            'cpass'=>'required',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $user_id=Auth::guard('admin')->user()->id;
            // Hash::make($req->oldpassword);
            // dd();
            if(Hash::check($req->oldpassword,Auth::guard('admin')->user()->password)){

                if($req->newpass==$req->cpass){
                    $update_pass=admin::where('id',$user_id)->update([
                        'password'=>Hash::make($req->newpass),
                    ]);
                    if($update_pass){
                        return redirect()->back()->with('success_msg', "password updated successfully");
                    }else{
                        return redirect()->back()->with('error_msg', "unable to update password");
                    }
                }else{
                    return redirect()->back()->with('error_msg', "new password and confirm password are not matched");
                }
            }else{
                return redirect()->back()->with('error_msg', "inccorrect old password");
            }
        }
    }

    public function index()
    {
        return view('admin/index');
    }
    public function forgot_password()
    {
        return view('admin/forget_password');
    }
    public function make_fee_invoice()
    {
        $get_students=student::where('status','1')->get();
        $current_date=date('Y-m-d');
        $next_five_date=date('Y-m-d',strtotime("+5 days"));
        $error=true;
        foreach($get_students as $student){
            $make_invoice=invoice::create([
                'student_id'=>$student->id, 
                'total_fee'=>$student->total_fee,
                'due_date'=>$next_five_date
            ]);
            $details=[
                'title'=>"Fee Reminder",
                'name'=>$student->name,
                'fee_amount'=>$student->total_fee,
                'due_date'=>$next_five_date
            ];
            if($make_invoice){
                $error=false;
            }
            
        }
        if(!$error){
            return redirect()->back()->with('success_msg', "Fee invoice created successfully");
        }else{
            return redirect()->back()->with('error_msg', "Unable to create invoices");
        }
        




    }
}
