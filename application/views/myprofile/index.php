<section>

    <style>
        .changePasswordPanel{
            margin-top: -60px;
        }
    </style>
    <?php foreach ($getAdminData as $row): ?>
        <div class="form-group">
            <form action="MyProfile/saveProfilePicWeb" method="post" enctype="multipart/form-data">
                <div class="col-md-offset-1 col-md-2 col-xs-offset-4 form-group">
                    <?php echo '<img src="' . $row['imagePath'] . '" id="blah" class="img-circle img-responsive" style="width: 100px;height: 100px;margin-top: 40px;"/>'; ?>
                    <input type="file" name="images" onchange="readURL(this);" class="btn btn-link col-md-12" value="Change Profile Picture">
                    <input type="submit" class="hidden" value="Save" id="btnSaveImagePro">
                    <div class="clearfix"></div>  
                </div>      

            </form>
            <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                            document.getElementById("btnSaveImagePro").click();
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <div class="col-md-9 form-group">
                <div class="form-group">
                    <button class="btn btn-link col-md-offset-10" id="btnEdit" type="button"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </button>
                    <div class="clearfix"></div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#btnEdit').click(function () {
                                $(".form-control").prop('disabled', false);
                                $(".btnUpdate").prop('disabled', false);
                            });

                        });
                    </script>   
                </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Full Name :</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control col-md-3" id="txtFirstName" name="txtFirstName" value="<?php echo $row['fullName'] ?>" disabled="" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Email :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="txtMobileNO" name="txtMobileNO" disabled="" value="<?php echo $row['email'] ?>" />
                        </div>   
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-xs-offset-5">
                            <button class="btn btn-primary col-md-4 btnUpdate" type="submit"  disabled="disabled">Update </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <div class="form-group">
                    <button class="btn btn-link col-md-offset-10 " type="button"  id="btnchangePass" ><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Change Password</button>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#btnchangePass').click(function () {
                            $('.changePasswordPanel').removeClass('hidden');
                        });

                        $('.btnUpdate').click(function () {
                            var fullName = $('#txtFirstName').val();
                            var email = $('#txtMobileNO').val();
                            $.ajax({   
                                type: 'POST',
                                url: 'MyProfile/updateWeb',
                                data: {'fullName': fullName, 'email': email},
                                success: function (data) {
                                    $('.content').load("MyProfile");   
                                    setTimeout(function () {
                                        $('.error1').text('Update Profile Data.');
                                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                    }, 500);
                                }
                            });
                        });
                        
                         $('#btnChangePass').click(function () {
                            var oldpass = $('#txtOldPass').val();
                            var newpass = $('#txtPass2').val();
                             $.ajax({   
                                type: 'POST',
                                url: 'MyProfile/changePasswordWeb',
                                data: {'oldpass': oldpass, 'newpass': newpass},
                                success: function (data) {
                                    $('.content').load("MyProfile");     
                                    setTimeout(function () {
                                        $('.error1').text(data);
                                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                    }, 500);
                                }
                            });
                        });


                    });
                </script>
            </div>   
        </div>
    <?php endforeach; ?>

    <div class="form-group col-md-offset-2 col-md-8 changePasswordPanel hidden">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <section>   
                        <div class="form-group">
                            <label class="control-label col-md-3">Old Password:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="txtOldPass" name="txtOldPass" id="txtOldPass" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">New Passsword:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="txtPass1" id="txtPass1" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="txtPass2" name="txtPass2" id="txtPass2" />
                            </div>  
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-group col-md-offset-4 col-xs-offset-5">
                                <button class="btn btn-primary col-md-5 " type="button" id="btnChangePass">Change</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>


</section>