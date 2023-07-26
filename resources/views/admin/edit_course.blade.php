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
                                            <h2>Edit Course </h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="{{url('/admin/edit_course/')}}" method="POST" >
                                       
                                        <div class="form-row mb-4">
                                            @csrf 
                                            <input type="text" value="{{$course->id}}" name="course_id" style="display:none">
                                            <div class="form-group col-md-6">
                                                <label >Course Name</label>
                                                <input type="text" class="form-control" id="subject" name="name" placeholder="Enter Course name" value="{{$course->name}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Price</label>
                                                <input type="text" class="form-control" id="shopcontact" name="price" placeholder="Enter Price" value="{{$course->course_fee}}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                             <label >Description</label>
                                                <textarea class="form-control" id="subject" name="description" placeholder="Enter Course Description" required>{{$course->description}}</textarea>
                                            </div>  
                                            <div class="form-group col-md-6">
                                                <label >Class No</label>
                                                <input type="text" class="form-control" id="subject" name="class_no" placeholder="Enter Class No" value="{{$course->class_no}}" required>
                                            </div> 
                                        </div>
                                        <center><button type="submit" name="submit" class="btn btn-success mt-3" >Update Course</button></center>
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
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>
    
</body>
</html>