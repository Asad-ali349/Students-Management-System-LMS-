<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
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
                                    <h2>Edit Quiz </h2>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{url('/admin/submit_edit_quiz')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" value="{{$quiz->id}}" name="quiz_id" style="display:none" >
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label >Quiz Name</label>
                                        <input type="text" class="form-control"  name="name" id="name" placeholder="Enter Quiz name" value="{{$quiz->name}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Course Name</label>
                                        <select name="course_name" id="course_name" class="form-control select2">
                                            <option value="">Select Course</option>
                                            @foreach($courses as $course)
                                                @if($course->id==$quiz->course_id)
                                                <option value="{{$course->id}}" selected>{{$course->name."\t".$course->class_no}}</option>
                                                @else
                                                <option value="{{$course->id}}">{{$course->name."\t".$course->class_no}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Total Marks</label>
                                        <input type="text" class="form-control"  name="total_marks" id="total_marks" value="{{$quiz->total_marks}}" placeholder="Enter Total Marks" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Quiz End Time</label>
                                        
                                        <input type="datetime-local" class="form-control"  name="quiz_end_time" placeholder="Enter Time" id="quiz_end_time" value="{{$quiz->total_time}}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label >Description</label>
                                        <textarea class="form-control"  name="description" placeholder="Enter Quiz Description" id="description" required>{{$quiz->description}}</textarea>
                                    </div>
                                   
                                </div>
                                <center><button type="submit" name="submit" id="submit-all" class="btn btn-success mt-3" >Update Quiz</button></center>
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
    <script >
       
        $(document).ready(function() {
            $('.select2').select2();
        });
        
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
       
    </script>
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
 
</body>
</html>