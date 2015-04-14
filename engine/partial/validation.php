<? if($validate_register==1){ ?>
<script>
	$("#form-signup").validate({  
        rules: {
				inputcName: {
                required: true,
                minlength: 6
                },
				inputcUserName: {
                required: true,
                minlength: 6,
				remote: "/check.php"
                },
				inputEmail: {
                email: true,
                required: true,
                minlength: 6
                },
				inputPassword: {
                required: true,
                minlength: 6
                },
				inputRePassword: {
                required: true,
                minlength: 6
                },
				
		},
		messages: {
				inputcName: {
                required: "Please input Name",
				minlength: "Name Length should be at least 6 characters"
                },
				inputcUserName: {
                required: "Please input Username",
				minlength: "Username Length should be at least 6 characters",
				remote: "Such username is already registered, please pick another."
                },
				inputEmail: {
                required: "Please input Email",
				minlength: "Email Length should be at least 6 characters",
				email: "Please check your email"
                },
				inputPassword: {
                required: "Please input Password",
				minlength: "Password Length should be at least 6 characters"
                },
				inputRePassword: {
                required: "Please input repeated Password",
				minlength: "Repeated password Length should be at least 6 characters",
				equalTo: "Passwords doesn't match"
                }
		}
  });
  </script>
<? } ?>
<? if($validate_login==1){ ?>
<script>
	$("#form-signin").validate({  
        rules: {
				inputcUserName: {
                required: true,
                minlength: 6,
				remote: "/check2.php"
                },
				inputPassword: {
                required: true,
                minlength: 6
				}
				
		},
		messages: {
				inputcUserName: {
                required: "Please input Username",
				minlength: "Username Length should be at least 6 characters",
				remote: "Such username is already registered, please pick another."
                },
				inputPassword: {
                required: "Please input Password",
				minlength: "Password Length should be at least 6 characters"
                }
		}
  });
  </script>
<? } ?>
