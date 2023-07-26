<!DOCTYPE html>
<html lang="en">
    @include('head')
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/switches.css')}}">
<body class="form no-image-content">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <img src="{{asset('public/logo.png')}}" style="height: 50px">
                        
                        <form class="text-left" action="{{url('employee/submit_recover_password')}}" method="post">
                            <div class="form">
                                @csrf
                                <input type="hidden" name="user_token" value="{{$token}}">
                                <div id="password-field" class="field-wrapper input mb-2">
										<div class="d-flex justify-content-between">
											<label for="password">PASSWORD</label>
										</div>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
											<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
											<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
										</svg>
										<input id="password" name="newpass" onkeyup="checkpass()" type="password" required class="form-control" placeholder="Password">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
											<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
											<circle cx="12" cy="12" r="3"></circle>
										</svg>
									</div>
									<div id="password-field" class="field-wrapper input mb-2">
										<div class="d-flex justify-content-between">
											<label for="password">CONFIRM PASSWORD</label>
										</div>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
											<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
											<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
										</svg>
										<input id="cpass" name="cpass" type="password" required onkeyup="checkpass()" class="form-control" placeholder="Confirm Password">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password2" class="feather feather-eye">
											<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
											<circle cx="12" cy="12" r="3"></circle>
										</svg>
										<span id="msg"></span>                                   
									</div>
                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Change</button>
                                    </div>
                                </div>
                                <p class="signup-link">Back to<a href="{{Url('/customer')}}">Login</a></p>
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
			
			
			
			function checkpass(){
			    var pass=$('#password').val()
			    var cpass=$('#cpass').val()
			
			    if (pass!=cpass) {
			        
			        $('#msg').text('Not Matched')
			        $('#msg').css('color','red')
			        $('#msg').css('display','block')
			    }else{
			        
			        console.log(" Matched")
			        $('#msg').css('display','none')
			    }
			}


			var togglePassword = document.getElementById("toggle-password2");
			var formContent = document.getElementsByClassName('form-content')[0]; 
			var getFormContentHeight = formContent.clientHeight;

			var formImage = document.getElementsByClassName('form-image')[0];
			if (formImage) {
				var setFormImageHeight = formImage.style.height = getFormContentHeight + 'px';
			}
			if (togglePassword) {
				togglePassword.addEventListener('click', function() {
				var x = document.getElementById("cpass");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
				});
			}
		</script>
</body>
</html>