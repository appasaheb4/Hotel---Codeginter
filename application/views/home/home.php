<html>
    <head>
        <meta charset="UTF-8">  
        <title>Hotel Silver Oak</title>     
        <?php
        include_once 'application/views/staticfiles.php';
        ?>
        <link href="assets/css/Footer-with-button-logo.css" rel="stylesheet" type="text/css"/>
        <script src="assets/demo.js" type="text/javascript"></script>
        <script src="application/Resource/MyFiles/js/jquery.min.js"></script>
        <link rel="hotel" href="Content/WebImages/DefulatImages/icon.ico"> 


        <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
        <style>
            .service{
                background-color: #FF9900;
            }
            .panelSB{
                background-color: #FF9900;
            }
            .serImage{
                margin-left: auto;
                margin-right: auto;
                display: block;
            }
            .aboutusTitle{
                font-family: 'Kavivanar', cursive;
                font-size: 40px;
            }
            .aboutDis{
                font-family: 'Raleway', sans-serif;
                line-height: 25px;
                font-size: 18px;
            }

            .galleryF{
                height: 400px;
                margin-left: auto;
                margin-right: auto;
                display: block;
            }
            .mapShowC{
                width: 100%;
                height: 300px;
                border-color: none;
            }
            .panelCon{
                height: 332px;
            }
            .panelContact{
                font-size: 20px;
                color: grey;
                margin-top: 40px;
                font-family: 'Coming Soon', cursive;
                line-height: 30px;
            }
            .panelSB{
                height: 150px;
            }
            .sentCon{
                background-color: transparent;
                border: solid 1px gray;
            }
            .btnSentEmail{
                margin-left: 20px;
            }
            .subServText{
                font-family: 'Libre Baskerville', serif;
            }
            .subSerTitle{
                font-family: 'Courgette', cursive;
                font-size: 25px;
            }

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

            .merqueeShow{
                font-family: 'Bad Script', cursive;
                font-size: 25px;
                color: red;
            }

        </style>


        <script type="text/javascript">
            $(document).ready(function () {
<?php
$commentMess = $this->session->flashdata('adminBackEnd');
if ($commentMess == "Sent Email.") {
    ?>
                    setTimeout(function () {
                        $('.error1').text('Sent email.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

<?php }
?>
            });
        </script>

    </head>
    <body>

        <div class='error1' style="display: none"></div>
        <section for="masterhearpage">
            <div class="form-group">    
                <?php
                include 'application/views/Head.php';
                ?>     
                <div class="clearfix"></div>
            </div>
        </section>

        <section>
            <div class="content-fluid  form-group">
                <?php
                include 'slider.php';
                ?>  
                <div class="clearfix"></div>
            </div>
        </section>

        <section for="merquee">
            <div class="form-group">
                <?php foreach ($getNote as $row): ?>
                    <marquee class="merqueeShow"><?php echo $row['note']; ?></marquee>
                <?php endforeach; ?>
            </div>
        </section>

        <section for="aboutus"  class="content" id="about">    
            <div class="form-group">
                <div class="col-md-6">
                    <span class="aboutusTitle">About Us</span>
                    <p class="aboutDis">
                        A Newly Open Lavish Hotel In The Area.Do Visit to test delicious Indial Veg And Non-Veg 
                        food.
                        Separate Setting Arrangement For Families.
                        Garden And Stage Facility for Birthday Parties,Anniversaries.
                        Parking Facility.
                        Do Visit for memorable time.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="Content/WebImages/multipleSliderItem/1.jpg" class="img-responsive imgH">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <img src="Content/WebImages/multipleSliderItem/2.jpg" class="img-responsive imgH">
                </div>
                <div class="col-md-6">
                    <p class="aboutDis">
                        Enjoy the friendly services and relaxed ambience at 
                        our food and beverage outlets offering a blend of Indian, 
                        Oriental and Western cuisine, 
                        with an extensive buffet spread of breakfast, 
                        lunch and dinner with the choices of exciting drinks to choose from.
                        Hotel Silver Oak also caters for state of the art conference room 
                        and royal banquet hall to meet the 
                        expectations of your very special events.
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <section for="service" class="service" id="services">
            <div class="form-group">
                <h3 class="text-center aboutusTitle">Services</h3>
                <div class="col-md-8">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body panelSB">
                                <img src="Content\WebImages\HomePage\service\vegnonveg.png" class="img-responsive serImage" alt="hotel"/>
                                <h4 class="text-center">Veg-Non Veg Food</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body panelSB">
                                <img src="Content\WebImages\HomePage\service\family.png" class="img-responsive serImage" alt="hotel"/>
                                <h4 class="text-center">Separte Setting Arrangment For Family</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body panelSB">
                                <img src="Content\WebImages\HomePage\service\garden.png" class="img-responsive serImage" alt="hotel"/>
                                <h4 class="text-center">Garden</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body panelSB">
                                <img src="Content\WebImages\HomePage\service\birthdaySelebaration.png" class="img-responsive serImage" alt="hotel"/>
                                <h4 class="text-center">Separate Hall For Birthday Celebration </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body panelSB">
                                <img src="Content\WebImages\HomePage\service\Parking.png" class="img-responsive serImage" alt="hotel"/>
                                <h4 class="text-center">Parking</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body panelSB">
                                <img src="Content\WebImages\HomePage\service\tastryFood.png" class="img-responsive serImage" alt="hotel"/>
                                <h4 class="text-center">A Good Place For Delicious & Tasty Food.</h4>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="subSerTitle">SUSPENDISSE SED FEUGIAT RISUS.</h4>
                        <p class="subServText">Aliquam id metus condimentum, venenatis erat non, lacinia ligula. Donec venenatis erat facilisis metus luctus, et condimentum ante fermentum.lacinia ligula. Donec venenatis erat facilisis metus luctus, et condimentum ante fermentum.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <img src="Content/WebImages/multipleSliderItem/3.jpg" class="img-responsive ">
                        <div class="clerfix"></div>
                    </div>
                    <div class="form-group">
                        <h3 class="subSerTitle">Service 1</h3>
                        <p class="subServText">Aliquam id metus condimentum, venenatis erat non, lacinia ligula. Donec venenatis erat facilisis metus luctus, et condimentum ante fermentum.Aliquam id metus condimentum, venenatis erat non, lacinia ligula. Donec venenatis erat facilisis metus luctus, et condimentum ante fermentum.Aliquam id metus condimentum, venenatis erat non, lacinia ligula.</p>
                    </div>
                </div>
                <div class="form-group"></div>
            </div>
        </section>



        <section for="Gallery" class="Gallery content" id="gallery">
            <div class="form-group">
                <h2 class="text-center aboutusTitle">Our Gallery</h2>
                <div class="form-group">
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <img src="Content/WebImages/HomePage/Gallery/b5.jpg" class="img-responsive galleryF" alt="menuF"/><br/>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <img src="Content/WebImages/HomePage/Gallery/b7.jpg" class="img-responsive galleryF" alt="menuS"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <img src="Content/WebImages/HomePage/Gallery/gallery1.jpg" class="img-responsive galleryS" alt="menuF"/>
                    </div>
                    <div class="col-md-3">
                        <img src="Content/WebImages/HomePage/Gallery/gallery3.jpg" class="img-responsive galleryS" alt="menuS"/>
                    </div>
                    <div class="col-md-3">
                        <img src="Content/WebImages/HomePage/Gallery/gallery5.jpg" class="img-responsive galleryS" alt="menuF"/>
                    </div>
                    <div class="col-md-3">
                        <img src="Content/WebImages/HomePage/Gallery/gallery6.jpg" class="img-responsive galleryS" alt="menuS"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <img src="Content/WebImages/HomePage/Gallery/gallery9.jpg" class="img-responsive galleryT" alt="menuF"/>
                    </div>
                    <div class="col-md-4">
                        <img src="Content/WebImages/HomePage/Gallery/g1.jpg" class="img-responsive galleryT" alt="menuS"/>
                    </div>
                    <div class="col-md-4">
                        <img src="Content/WebImages/HomePage/Gallery/g2.jpg" class="img-responsive galleryT" alt="menuF"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>

        <section for="contact" class="contact" id="contact">
            <div class="form-group well"> 
                <div class="form-group">
                    <h3 class="text-center aboutusTitle">Contact Us</h3>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="panel panel-default panelCon">
                                <div class="panel-body ">
                                    <div class="col-md-offset-3 col-md-6 panelContact">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>  xx <br/>
                                        <i class="fa fa-phone" aria-hidden="true"></i> +91 xxxx xxxx xx <br/>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> xxxx@gmail.com <br/>
                                        <a href="#" class="text-center"> <i class="btn btn-default fa fa-facebook-official" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <iframe class="mapShowC" src="https://maps.google.com/maps?hl=en&amp;q=Motewadi,Phondshiras,Natepute&amp;ie=UTF8&amp;t=satellite&amp;z=15&amp;iwloc=B&amp;output=embed">
                                    <div><br/>  
                                        <a href="http://embedgooglemaps.com">
                                            embedgooglemaps.com
                                            embed google map
                                            embed google maps
                                            google maps karte erstellen
                                        </a>
                                    </div>
                                    <div><small><a href="https://ultimatewebtraffic.com/">buy websit traffic Ultimatewebtraffic</a></small></div>
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <form  method="post" action="Home/contactSentEmail" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" id="txtConName" name="txtConName" class="form-control sentCon" placeholder="Full Name" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="email" id="txtConEmail" name="txtConEmail" class="form-control sentCon" placeholder="Email" required="">
                            </div>
                            <div class="clearfix"></div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="form-gorup">
                            <div class="col-md-12">
                                <textarea class="form-control sentCon" id="txtConMessage" name="txtConMessage" placeholder="Message" rows="10" required=""></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-gorup">
                            <br/>
                            <div >
                                <button type="submit" id="sentEmail" class="btn btn-warning btnSentEmail">Send</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
            </div>
        </section>








        <div class="form-group">       
            <?php
            include 'application/views/Fotter.php';
            ?>  
            <div class="clearfix"></div>    
        </div>
    </section>
</body>
</html>
