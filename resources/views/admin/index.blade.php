<!DOCTYPE html>
<html lang="en">

    @include('admin.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/switches.css')}}">
<body class="form">
    

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
                        <p class="">Log in to your account to continue.</p>
                        
                        <form class="text-left" method="POST" action="{{url('admin/login')}}">
                            @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">USERNAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="email" type="text" class="form-control" placeholder="e.g John_Doe">
                                </div>

                                <div id="password-field" class="field-wrapper input ">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="{{Url('/forgot_password')}}" class="forgot-pass-link">Forgot Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                               
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('public/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('public//js/bootstrap.min.js')}}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/assets/js/authentication/form-2.js')}}"></script>
    <script>
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 3000)
    </script>
</body>
</html>