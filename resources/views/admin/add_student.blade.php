<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/signature_assets/css/jquery_signature.css')}}">
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    @include('admin.includes.topbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
      
    @include('admin.includes.navbar')
        
        <!--  BEGIN CONTENT PART content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mb-5">
            @if(session('success_msg'))
                <div class="alert alert-success mt-2 " role="alert" id="alert">           
                    <strong>Success! </strong>{{session('success_msg')}}
                </div> 
            @endif  
            @if(session('error_msg'))
                <div class="alert alert-danger mt-2 " role="alert" id="alert">           
                    <strong>Error! </strong>{{session('error_msg')}}
                </div> 
            @endif   
                        <div class="col-lg-12 col-12 layout-spacing">
                            
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Add Student </h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="{{url('/admin/add_student')}}" method="POST" >
                                       @csrf
                                        <div class="form-row mb-4">
                                            
                                            <div class="form-group col-md-4">
                                                <label >Student Name</label>
                                                <input type="text" class="form-control" id="subject" name="name" placeholder="Enter Student name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Father/Gaurdian Name</label>
                                                <input type="text" class="form-control" id="shopcontact" name="father_name" placeholder="Enter Father/Gaurdian Name" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Father Contact</label>
                                                <input type="text" class="form-control" id="subject" name="father_contact" placeholder="Enter Father Contact" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Student Email</label>
                                                <input type="email" class="form-control" id="shopcontact" name="student_email" placeholder="Enter Student Email" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Password</label>
                                                <input type="password" class="form-control" id="password" name="student_password"  required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Student Contact</label>
                                                <input type="text" class="form-control" id="subject" name="student_contact" placeholder="Enter Student Contact" required>
                                            </div>
                                            
                                            <div class="form-group col-md-4" required>
                                             <label >Class No.</label>
                                                <input type="text" class="form-control" id="subject" name="classno" placeholder="Enter Class No." required>
                                            </div>
                                            <div class="form-group col-md-8">
                                            <label>Street Address</label>
                                                <input type="text" class="form-control" id="dealerstreet" name="student_street" placeholder="Enter Street Address" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-10">
                                                        <h5>Course Enrollment</h5>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <button type="button" class="btn btn-primary" onclick="addproduct()"> Add Course</button>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div id="body" class="form-group col-md-12">
                                                <div class="form-row mb-3">
                                                    <div class="form-group col-md-8">
                                                        <Select class="form-control select2" name="courses[]">
                                                            <option value="">Select Course</option>
                                                            @foreach($courses as $course)
                                                            <option value="{{$course->id}}">{{$course->name."\t".$course->class_no}}</option>
                                                            @endforeach
                                                        </Select>
                                                    </div>
                                                   
                                                    
                                                </div>
                                               
                                            </div>
                                            
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-success mt-3" >Add Student</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
            </div>
            @include('admin.includes.footer')

        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('public/assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>
    <script>
            var count=2
        function addproduct(){
            additionalhtml='<div class="form-row mb-3" id="'+count+'">'+
                                '<div class="form-group col-md-8">'+
                                    '<Select class="form-control select2" name="courses[]">'+
                                        '<option value="">Select Course</option>'+
                                        '@foreach($courses as $course)'+
                                            '<option value="{{$course->id}}">{{$course->name."\t".$course->class_no}}</option>'+
                                        '@endforeach'+
                                    '</Select>'+
                                '</div>'+
                                '<div class="form-group col-md-4">'+
                                    '<a  onclick="deleterow('+count+')"><i class="fa fa-times" style="color: red; font-size: 30px;" aria-hidden="true"></i></a>'+
                                '</div>'+
                               
                            '</div>';
                            count++;
                            
            $("#body").append(additionalhtml);
            $('.select2').select2();
            


        }

            function deleterow(id){
            
                $('#'+id).remove()
                // alert("aaa")
            
            }

    </script>
    <script >
       
       $(document).ready(function() {
           $('.select2').select2();
       });
       
       setTimeout(()=> {
           $('#alert').hide('slow')
       }, 5000)
      
   </script>
    
</body>
</html>