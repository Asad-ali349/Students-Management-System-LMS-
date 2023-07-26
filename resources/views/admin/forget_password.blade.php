<!DOCTYPE html>
<html lang="en">
    @include('admin.includes.head')
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/switches.css')}}">
<body class="form no-image-content">
    

    <div class="form-container outer">
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
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <img src="{{asset('public/logo.png')}}" style="height: 50px">
                        <p class="signup-link recovery">Enter your email and instructions will be sent to you!</p>
                        <form class="text-left" action="{{url('employee/submit_forget_password')}}" method="post">
                            <div class="form">
                                @csrf
                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">EMAIL</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="email" class="form-control" value="" placeholder="Email">
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Reset</button>
                                    </div>
                                </div>
                                <p class="signup-link">Back to<a href="{{Url('/')}}">Login</a></p>
                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/assets/js/authentication/form-2.js')}}"></script>
    <script>
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 1000)
    </script>
</body>
</html>