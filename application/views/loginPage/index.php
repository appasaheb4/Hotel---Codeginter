<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php
        include_once 'application/views/staticfiles.php';
        ?>
        <link href="application/views/loginPage/index.css" rel="stylesheet" type="text/css"/>
        <link rel="hotel" href="Content/WebImages/DefulatImages/icon.ico">    
        <title>Login </title>    
        <style>
         .error1 {
                width:200px;
                height:20px;
                height:auto;
                position:absolute;
                z-index: 1;
                left:50%;
                margin-left:-100px;
                bottom:10px;
                background-color: #383838;
                color: #F0F0F0;
                font-family: Calibri;
                font-size: 20px;
                padding:10px;
                text-align:center;
                border-radius: 2px;
                -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
                -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
                box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
            }
            .imgNH{
                height: 100px;
                width: 100px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
<?php
$commentMess = $this->session->flashdata('registationFlash');
 if ($commentMess == "Login done.") {
    ?>

                    location.href = '/AdminDashboard';
                    setTimeout(function () {
                        $('.error1').text('Login Done.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Login not done.") {
    ?>

                    setTimeout(function () {
                        $('.error1').text('Enter corret email and password.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
}   
else if ($commentMess == "Email Sent.") {
    ?>

                    setTimeout(function () {
                        $('.error1').text('Password is sent your email address thanks.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php  
}
else if ($commentMess == "Email not Sent.") {
    ?>

                    setTimeout(function () {
                        $('.error1').text('Password is not sent.Plz correct enter email address.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
}
?>
            });
        </script>
    </head>
    <body>
        <div class='error1' style="display: none"></div>
        <div class="container">
            <div class="row" id="pwd-container">    
                <div class="col-md-4"></div>
                <div class="col-md-4">    
                    <section class="login-form">  
                        <form method="post" action="LoginPage/loginWeb" role="login">
                            <img src="Content/WebImages/DefulatImages/newhotellogo.png" class="imgNH img-responsive img-thumbnail img-circle" alt=""/>
                            <h3 class="text-center">Hotel Silver Oak</h3>
                            <input type="number" name="mobileNo" placeholder="Mobile Number" required class="form-control input-lg" />
                            <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" required="" />
                            <div class="pwstrength_viewport_progress"></div>
                            <button type="submit"  class="btn btn-lg btn-primary btn-block">Sign in</button>
                            <div>
                              <button class="btn btn-link btn-lg" name="btnForgotPassword"  type="button" style="width:100%;text-decoration:none;" data-toggle="modal" data-target="#myModal">Forgot Password </button>
                            </div>         
                        </form>

                    </section>  
                </div>
            </div>   
            
            
            
             <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Forgot Password</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="LoginPage/forGetPasswordWeb">
                            <div class="form-group">
                                <label class="control-label col-md-offset-6">Email:</label>
                                <div class="clearfix"></div>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Email" required/>
                                <div class="clearfix"></div>
                            </div>
                            <button type="submit" name="btnForgotPassword" style="width:100%;background-color:#1AB08A;color:#fff;text-decoration:none;">Sent</button>
                        </form>
                    </div>
                    <div class="modal-footer bg-primary">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <div class="clerfix"></div>
                </div>

            </div>
        </div>
            
            
            
            
        </div>
    </body>
</html>