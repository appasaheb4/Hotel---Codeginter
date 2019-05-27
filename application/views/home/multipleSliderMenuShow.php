<style>
    .carousel-inner .active.left { left: -33%; }
    .carousel-inner .next        { left:  33%; }
    .carousel-inner .prev        { left: -33%; }
    .carousel-control.left,.carousel-control.right {background-image:none;}
    .item:not(.prev) {visibility: visible;}
    .item.right:not(.prev) {visibility: hidden;}
    .rightest{ visibility: visible;}
    
    .imgH{
        height: 250px;
    }

</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myCarouselM').carousel({
            interval: 4000
        });

        $('.carousel .item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length > 0) {

                next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');

            } else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));

            }
        });
    });
</script>
<div class="col-md-12 multislider">
    <div class="carousel  slide" id="myCarouselM">
        <div class="carousel-inner">
            <div class="item active">
                <div class="col-lg-12 col-xs-12 col-md-4 col-sm-12">
                    <a href="#"><img src="Content/WebImages/multipleSliderItem/1.jpg" class="img-responsive imgH"></a></div>
            </div>
            <div class="item">
                <div class="col-lg-12 col-xs-12 col-md-4 col-sm-12">
                    <a href="#"><img src="Content/WebImages/multipleSliderItem/2.jpg" class="img-responsive imgH"></a></div>
            </div>
            <div class="item">
                <div class="col-lg-12 col-xs-12 col-md-4 col-sm-12">
                    <a href="#"><img src="Content/WebImages/multipleSliderItem/3.jpg" class="img-responsive imgH"></a></div>
            </div>
            <div class="item">
                <div class="col-lg-12 col-xs-12 col-md-4 col-sm-12">
                    <a href="#"><img src="Content/WebImages/multipleSliderItem/5.jpg" class="img-responsive imgH"></a></div>
            </div>
            <div class="item">
                <div class="col-lg-12 col-xs-12 col-md-4 col-sm-12">
                    <a href="#"><img src="Content/WebImages/multipleSliderItem/food-hotel-21.jpg" class="img-responsive imgH"></a></div>
            </div>
        </div>

    </div>
</div>
