<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>         
            .carousel-inner{      
                height: 600px;      
            }
            .sliderShow{
                margin-top: -35px;
            }
              @media all and (min-width:960px) and (max-width: 1024px) {
                /* put your css styles in here */
            }

            @media all and (min-width:801px) and (max-width: 959px) {
                /* put your css styles in here */
            }

            @media all and (min-width:769px) and (max-width: 800px) {
                /* put your css styles in here */
            }

            @media all and (min-width:569px) and (max-width: 768px) {
                /* put your css styles in here */
            }

            @media all and (min-width:481px) and (max-width: 568px) {
                /* put your css styles in here */
            }

            @media all and (min-width:321px) and (max-width: 480px) {
                .carousel-inner{
                    height: 200px;   

                }
                .iconHotel{
                    display: none;
                }
                .galleryF{
                   height: 300px;
                }
            }
            @media all and (min-width:0px) and (max-width: 320px) {
                /* put your css styles in here */
            }
        </style>
<section class="sliderShow">
            <div class="form-group">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php foreach ($getalldataSlider as $row): ?>
                            <div class="item activeclass">
                                <img src="<?php echo 'http://hotelsameer.web44.net/' . $row['imagePath']; ?> " class="img img-responsive" style="width: 100%;" />    
                                
                            </div>  
                        <?php endforeach; ?>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $(".activeclass").first().addClass("active");
                        });
                    </script>


                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>