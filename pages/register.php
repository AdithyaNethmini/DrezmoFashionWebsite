<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
</head>


    <body>

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <!-- Register Section Begin -->
        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="register-form">
                            <h2>Register</h2>
                            <form method="POST">
                                <div class="group-input">
                                    <label for="fname">First Name *</label>
                                    <input type="text" id="fname">
                                </div>
                                <div class="group-input">
                                    <label for="lname">Last Name *</label>
                                    <input type="text" id="lname">
                                </div>
                                <div class="group-input">
                                    <label for="username">User Name *</label>
                                    <input type="text" id="username" >
                                </div>
                                <div class="group-input">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" >
                                </div>
                                <div class="group-input">
                                    <label for="password">Confirm Password *</label>
                                    <input type="password" id="password2">
                                </div>
                                <div class="group-input">
                                    <label for="nic">NIC *</label>
                                    <input type="text" id="nic" >
                                </div>
                                <div class="group-input">
                                    <label for="username">Address no. *</label>
                                    <input type="text" id="adno" >
                                </div>
                                <div class="group-input">
                                    <label for="username">Street *</label>
                                    <input type="text" id="adstreet" >
                                </div>
                                <div class="group-input">
                                    <label for="username">Town *</label>
                                    <input type="text" id="adtown" >
                                </div>
                                <div class="group-input">
                                    <label for="username">Telephone *</label>
                                    <input type="text" id="telephone" >
                                </div>
                                <div class="group-input">
                                    <label for="username">Email *</label>
                                    <input type="text" id="email" >
                                </div>
                                
                                <button class="site-btn register-btn" id="register">register</button>
                                <!-- <input type="button"  class="site-btn register-btn" id="register" value="register"> -->
                            </form>
                            <div class="switch-login">
                                <a href="index.php?login"  class="or-login">Or Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register Form Section End -->



        <!-- <div id="demo"></div> -->




        <div id="contentt"></div>






        <script >
            $("#register").click(function(){
                var fname= $("#fname").val();
                var lname= $("#lname").val();
                var username= $("#username").val();
                var password= $("#password").val();
                var adno= $("#adno").val();
                var adstreet= $("#adstreet").val();
                var adtown= $("#adtown").val();
                var telephone= $("#telephone").val();
                var email= $("#email").val();
                var nic= $("#nic").val();
				var type= "customer";
                console.log(fname); 
                $.ajax({
                    url: "DAO/registerDAO.php",
                    data: {
                        fname: fname,
                        lname: lname,
                        username: username,
                        password: password,
                        adno: adno,
                        adstreet: adstreet,
                        adtown: adtown,
                        telephone: telephone,
                        email: email,
                        nic: nic,
						type: type
                    },
                    
                    success:function(data){
                        $('#contentt').html(data);
                    }
                })
                return false;
            }) 
        </script>

    </body>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</html>

