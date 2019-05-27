
<div class="container-fluid"> 
    <fieldset class="scheduler-border">     
        <br>
        <?php foreach ($getNote as $row): ?>
            <form method="post" action="AddTable/insertWeb" enctype="multipart/form-data">
                <div class="form-group col-md-offset-3">  
                    <label class="control-label col-md-1">Note: </label>
                    <div class="col-md-5">
                        <textarea class="form-control" placeholder="Note" id="txtNote" name="txtNote" value="<?php echo $row['note']; ?>"></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-5">
                        <div role="group" class="btn-group">
                            <button class="btn btn-primary" id="btnUpdate" type="button">Update </button>
                            <button class="btn btn-warning"  type="reset">Clear </button>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#btnUpdate').click(function () {
                            var note = $('#txtNote').val()
                            $.ajax({
                                type: 'POST',
                                url: 'HomePageNote/updateWeb',
                                data: {'note': note},
                                success: function (data14) {
                                    $('.content').load("HomePageNote");
                                    $('.error1').text('Updata Data.');
                                    $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                }
                            });
                        });

                    });

                </script>

            </form>
            <div class="form-group">
                <marquee><b><?php echo $row['note']; ?></b></marquee>
            </div>
        <?php endforeach; ?>
    </fieldset>

</div>
