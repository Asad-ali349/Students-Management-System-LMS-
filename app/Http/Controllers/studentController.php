<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\student;
use App\Models\course_enrollment;
use App\Models\quiz;
use App\Models\quiz_docs;
use App\Models\quiz_responses;
use App\Models\response_docs;
use App\Models\helping_material;
use App\Models\invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DateTime;

class studentController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
    
    public function index()
    {
        return view('index');
    }

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
            if(Auth::guard('student')->attempt(['email'=>$req->email,'password'=>$req->password]))
            {
                ///////////////////take to dashboard
                
                return redirect("profile");
            }
            else
            {
                //////////////////////error msg password not correct
                return redirect()->back()->with('error_msg', "Incorrect Password");
            }
        }
    }
    public function profile()
    {
        $student_id=Auth::guard('student')->user()->id;
        // dd($student_id);
        $student=student::with('enrolled_courses','quiz_responses.quiz_detail','invoices')->where('id',$student_id)->first();
        // dd($student);
        return view('profile',compact('student'));
    }
    public function view_courses()
    {
        $student_id=Auth::guard('student')->user()->id;
        $materials=course_enrollment::with('course')->where('student_id',$student_id)->get();
        // dd($materials);
        return view('view_courses',compact('materials'));
    }
    public function view_course_material($id)
    {
        $materials=helping_material::with('course_detail')->where('course_id',$id)->orderBy('id', 'desc')->get();
        return view('view_course_material',compact('materials'));
    }
    public function material_detail($id)
    {
        $material=helping_material::with('course_detail','helping_material_docs')->where('id',$id)->first();
        return view('material_detail',compact('material'));
    }
    public function view_quiz()
    {
        $student_id=Auth::guard('student')->user()->id;
        $quizes=quiz_responses::with('quiz_detail.course_detail')->where('student_id',$student_id)->get() ;
        // dd($quizes);
        return view('view_quiz',compact('quizes'));
    }
    public function quiz_detail($id)
    {
        $student_id=Auth::guard('student')->user()->id;
        $quiz=quiz::with('course_detail','quiz_docs')->where('id',$id)->first();

        $quiz_response=quiz_responses::with('response_docs')->where('quiz_id',$id)->where('student_id',$student_id)->first();
        // dd($quiz_response);
        return view('quiz_detail',compact('quiz','quiz_response'));
    }
    public function submit_quiz_response(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'quiz_id'=>'required',
            'total_marks'=>'required', 
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $student_id=Auth::guard('student')->user()->id;

            $get_quiz=quiz_responses::where('student_id',$student_id)->where('quiz_id',$req->quiz_id)->first();
            // dd($get_quiz->status);
            // if($get_quiz->status!='0'){
            //     return response()->json([
            //         'type' => 'error',
            //         'msg'=> 'Already Submit'
            //     ]);
            // }else{

                $end_time_date=date('m/d/Y H:i:s',strtotime($req->end_time));
                // dd($end_time_date);
                $current=$req->current_datetime;
                $datetime1 = new DateTime($current);
                $datetime2 = new DateTime($end_time_date);
                
                if($datetime1>$datetime2){
                    return response()->json([
                        'type' => 'error',
                        'msg'=> 'Time Has Finished'
                    ]);
                }else{
                    
                    $add_response=quiz_responses::where('quiz_id',$req->quiz_id)->where('student_id',$student_id)->update([
                        'status'=>'1',
                    ]);
                    if($add_response){
                        $response_id=$get_quiz->id;
                        foreach($req->file('file') as $key=>$name){
                            $responsedoc=$req->file('file')[$key]->store('Quiz_Response_Docs');
                            $add_docs=new response_docs;
                            $add_docs->response_id=$response_id;
                            $add_docs->document=$responsedoc;
                            $add_docs->save();
                        }
                    
                        return response()->json([
                            'type' => 'success',
                            'msg'=> 'Response Submited'
                        ]);
                    }else{
                        return response()->json([
                            'type' => 'error',
                            'msg'=> 'Unable To Submit'
                        ]);
                    }
                }   
            // }   
        }    

    }

    public function delete_response_doc($id)
    {
        // dd($id);
        $get_doc=response_docs::where('id',$id)->first();
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
    public function due_fee()
    {
        $student_id=Auth::guard('student')->user()->id;
        $invoices=invoice::with('student_detail')->where('status','0')->where('student_id',$student_id)->orderBy('id', 'desc')->get();

        return view('due_fee',compact('invoices'));
    }
    public function paid_fee()
    {
        $student_id=Auth::guard('student')->user()->id;
        $invoices=invoice::with('student_detail')->where('status','1')->where('student_id',$student_id)->orderBy('id', 'desc')->get();

        return view('paid_fee',compact('invoices'));
    }
    public function change_password()
    {
        return view('change_password');
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
            $user_id=Auth::guard('student')->user()->id;

            // Hash::make($req->oldpassword);
            // dd($user_id);
            if(Hash::check($req->oldpassword,Auth::guard('student')->user()->password)){

                if($req->newpass==$req->cpass){
                    $update_pass=student::where('id',$user_id)->update([
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
}
