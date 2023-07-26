
<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    @include('includes.topbar')

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

      
    @include('includes.navbar')
        
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            
            <div class="layout-px-spacing mt-1">
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
                        <div class="col-lg-6 col-sm-12 layout-spacing" >
                            
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Reset Password</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="{{url('/change_password')}}" method="POST">
                                    @csrf
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <input type="Password" class="form-control" id="name" name="oldpassword" placeholder="Enter Previous Password" required>
                                            </div>
                                        </div>

                                         <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <input type="Password" class="form-control" id="password" name="newpass" placeholder="Enter New Password" required>
                                            </div>
                                        </div>

                                         <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <input type="Password" class="form-control" id="confirm_password" name="cpass" placeholder="Re-enter New Password" required>
                                                <span id='message'></span>
                                            </div>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-success mt-3">Update</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
            </div>
            @include('includes.footer')

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
       
    </script>
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>

    <script>
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 3000)
        $('#confirm_password').on('keyup', function () {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
</body>
</html>