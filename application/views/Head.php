<link href='https://fonts.googleapis.com/css?family=Arbutus' rel='stylesheet'>
<style>
    * {
  border-radius: 0 !important;
  -moz-border-radius: 0 !important;
  
}

.titleHeading{
     font-family: 'Arbutus';font-size: 28px;
}

ul li{
    cursor: pointer;     
}
.ho:hover{
    color: floralwhite;
    font-size: 20px;
}
.whiteC{
    color: white;
}
.navbar{
    color: white;
}
.iconHotel{
    width: 80px;
    height: 48px;
    margin-top: -15px;
    background-color: transparent;
}
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand whitle titleHeading" href="#"><span class="whiteC">
                <img src="Content/WebImages/DefulatImages/icon.png" class="iconHotel img-responsive img-thumbnail img-circle" alt="hotelIcon"/>
                Hotel Silver Oak</span></a>
    </div> 
    <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav navbar-right whitle">  
         <li ><a href="#about" ><span class="glyphicon glyphicon-th "></span> <span class="whiteC">About us</span></a></li>
         <li class="whitle"><a href="#services"><span class="fa fa-bars"></span><span class="whiteC"> Services</span></a></li>
          <li class="whitle"><a href="#gallery"><span class="fa fa-picture-o"></span><span class="whiteC"> Gallery</span></a></li>
         <li class="whitle"><a href="#contact"><span class="glyphicon glyphicon-phone"></span><span class="whiteC"> Contact us</span></a></li>  
           <?php
                $sessionUserName = $this->session->userdata('username');
                if ($sessionUserName == NULL) {
                    ?>
                    <li class="whitle"><a href="#" onClick="location.href = '/LoginPage'"><span class="glyphicon glyphicon-log-in"></span><span class="whiteC"> Login</span></a></li>
                    <?php
                } else {
                    ?>
                    <li role="presentation"><a onClick="location.href = '/AdminDashboard'"  style="color: white;"><?php echo "Hi!!" . $sessionUserName ?> </a></li>
                    <?php
                }
                ?>
         
      </ul>
    </div>
  </div>
</nav>