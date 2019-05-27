
<div class="container-fluid">   
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1" role="tab" id="tab1id" data-toggle="tab">Add </a></li>
        <li><a href="#tab-2" role="tab" id="tabView" data-toggle="tab">View </a></li>
        
    </ul>
    <div class="tab-content">    
        <div role="tabpanel" class="tab-pane active" id="tab-1">
            <fieldset class="scheduler-border">     
                <br>   
                <form method="post" action="AdminAddVendor/insertWeb" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-1">Date:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control txtDate" name="txtDate" value="<?php echo $date = date('Y-m-d'); ?>" />
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.txtDate').datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    yearRange: "-25:+5",
                                    dateFormat: 'yy-mm-dd'
                                });

                            });
                        </script>    

                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">Vendor Name: *</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Vendor Name" name="txtVendroName" required="" />
                        </div>
                        <label class="control-label col-md-1">Address: </label>
                        <div class="col-md-5">
                            <textarea class="form-control" placeholder="Address" name="txtAddress"></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">Contact No: *</label>
                        <div class="col-md-5">  
                            <input type="number" class="form-control" placeholder="Contact No" name="txtContactNo" required="" />
                        </div>
                        <label class="control-label col-md-1">Email Id:</label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" placeholder="Email" name="txtPhone2" />
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">Pancard No: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Pancard No" name="txtPanNo"  />
                        </div>
                        <label class="control-label col-md-1">Adharcard No: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Adharcard No" name="txtAdharNo"  />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-1">GST No:* </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="GST No" name="txtGstNo" required="" />
                        </div>
                        <label class="control-label col-md-1">Note: </label>
                        <div class="col-md-5">
                              <textarea class="form-control" placeholder="Note" name="txtNote"></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-5">
                            <div role="group" class="btn-group">
                                <button class="btn btn-primary" type="submit">Save </button>
                                <button class="btn btn-warning" onclick="removeAllIcon();" type="reset">Clear </button>
                            </div>
                        </div>
                    </div>

                </form>
            </fieldset>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-2">
            <fieldset class="scheduler-border"> 
                <br>
                <div class="form-group">
                    <div class="col-md-5">
                        <label class="control-label col-md-2 col-xs-2">Limit:</label>
                        <div class="col-md-3 col-xs-10">
                            <input type="text" id="limitedrowshow" class="form-control" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-1 col-xs-2">
                        <span id="countrow" class="pull-right hidden"></span>
                    </div>
                    <div class="col-md-4 col-xs-10">
                        <div class="input-group">
                            <input type="text" class="search form-control" id="mytablesearch" placeholder="Search">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-search"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2">   
                        <div class="btn-group" role="group">
                            <button class="btn btn-default  btn btn-primary" type="button" onClick="location.href = '/AddMenu/excel'">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
                <div class="table-responsive" >
                    <div id="table-wrapper">
                        <div id="table-scroll">
                            <table class="table table-bordered table-hover table-condensed" id="adminAddSliderTable">
                                <thead>
                                    <tr class="bg-primary">    
                                        <th class="hidden">Id</th>
                                        <th>Date</th>  
                                        <th>Time</th>
                                        <th>Vendor Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Email Id</th>
                                        <th>Pancard No</th>
                                        <th>Adharcard No</th>  
                                        <th>GST No</th>  
                                        <th>Note</th>
                                        <th>Opration</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php foreach ($getAddVendor as $row): ?>
                                        <tr>
                                            <td class="hidden"><?php echo $row['id']; ?></td>
                                            <td data-field="date" ><?php echo $row['date']; ?></td>  
                                            <td data-field="time"><?php echo $row['time']; ?></td>
                                            <td data-field="vendorName"><?php echo $row['vendorName']; ?></td>
                                            <td data-field="address" ><?php echo $row['address']; ?></td>  
                                            <td data-field="contactNo"><?php echo $row['contactNo']; ?></td>
                                            <td data-field="email"><?php echo $row['email']; ?></td>
                                            <td data-field="pancardNo" ><?php echo $row['pancardNo']; ?></td>  
                                            <td data-field="adharNo"><?php echo $row['adharNo']; ?></td>
                                            <td data-field="gstNo"><?php echo $row['gstNo']; ?></td>
                                            <td data-field="note" ><?php echo $row['note']; ?></td>  
                                            <td><i class="fa fa-pencil btn-mg edit btn btn-primary btn-md"></i>
                                                <i class="fa fa-save btn-md btn btn-primary btn-md save hidden" ></i>
                                                <i class="fa fa-trash-o btn-md btn btn-warning btn-md btnDeleteAsk" aria-hidden="true"></i>
                                                <i class="fa fa-check btn btn-warning btn-md btndeleteConfirm hidden" aria-hidden="true">Confirm</i>
                                            </td>
                                        </tr>   
                                    <?php endforeach; ?>
                                </tbody>   
                            </table>
                        </div>
                    </div>
                </div> 
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#fileaddSliderOption").change(function () {
                            setTimeout(function () {
                                $('#saveAddSliderSubmitBtn').click();
                            }, 400);

                        });
                    });
                </script>
                <script type="text/javascript">

                    $(document).ready(function () {

                        $("#adminAddSliderTable").each(function () {
                            $('th:nth-child(1), thead td:nth-child(1)', this).each(function () {
                                var tag = $(this).prop('tagName');
                                $(this).before('<' + tag + '>Sr No</' + tag + '>');
                            });
                            $('td:nth-child(1)', this).each(function (i) {
                                $(this).before('<td>' + (i + 1) + '</td>');
                            });
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        var rowCount = $('#adminAddSliderTable tr').length;
                        $('#countrow').text(rowCount);
                        $('#mytablesearch').keyup(function () {
                            searchTable($(this).val());
                            var numOfVisibleRows = $('tr:visible').length - 1;
                            $('#countrow').text(numOfVisibleRows);
                        });
                        $('#limitedrowshow').keyup(function () {
                            var limiterow = $(this).val();
                            if (limiterow == "") {
                                $('#adminAddSliderTable  > tbody > tr').show();
                            } else {
                                $('#adminAddSliderTable  > tbody > tr').slice(limiterow).hide();
                            }

                        });
                    });
                    function searchTable(inputVal) {
                        var table = $('#adminAddSliderTable');
                        table.find('tr').each(function (index, row) {
                            var allCells = $(row).find('td');
                            if (allCells.length) {
                                var found = false;
                                allCells.each(function (index, td) {
                                    var regExp = new RegExp(inputVal, 'i');
                                    if (regExp.test($(td).text())) {
                                        found = true;
                                        return false;
                                    }
                                });
                                if (found == true)
                                    $(row).show();
                                else
                                    $(row).hide();
                            }

                        });
                    }
                </script>
                <script type="text/javascript">
                    $(function () {
                        // $('.save').hide();
                        $('table tr').editable({
                            edit: function (values) {
                                var row_index = $(this).closest("tr").index();
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".edit").addClass("hidden");
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".save").removeClass('hidden');
                                //$('.edit').hide();
                                //$('.save').show();
                            }
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(document).ready(function () {


                        $('.fa-save').click(function () {
                            $(".fa-save").dblclick();
                            var id = $(this).closest('tr').children('td:eq(1)').text();
                            var date = $(this).closest('tr').children('td:eq(2)').text();
                            var time = $(this).closest('tr').children('td:eq(3)').text();
                            var vendorName = $(this).closest('tr').children('td:eq(4)').text();
                            var address = $(this).closest('tr').children('td:eq(5)').text();
                            var contactNo = $(this).closest('tr').children('td:eq(6)').text();
                            var email = $(this).closest('tr').children('td:eq(7)').text();
                            var pancardNo = $(this).closest('tr').children('td:eq(8)').text();
                            var adharNo = $(this).closest('tr').children('td:eq(9)').text();
                            var gstNo = $(this).closest('tr').children('td:eq(10)').text();
                            var note = $(this).closest('tr').children('td:eq(11)').text();
                            $.ajax({
                                type: 'POST',
                                url: 'AdminAddVendor/updateWeb',
                                data: {'id': id, 'date': date, 'time': time, 'vendorName': vendorName, 'address': address, 'contactNo': contactNo, 'email': email, 'pancardNo': pancardNo, 'adharNo': adharNo, 'gstNo': gstNo, 'note': note},
                                success: function (data14) {
                                    $('.content').load("AdminAddVendor");
                                    $('.error1').text('Updata Data.');
                                    $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                    setTimeout(function () {
                                        $('#tabView').click();
                                    }, 400);
                                }
                            });
                        });



                        $('.btnDeleteAsk').click(function () {
                            var row_index = $(this).closest("tr").index();
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btnDeleteAsk").addClass("hidden");
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btndeleteConfirm").removeClass('hidden');
                            // $('.btnDeleteAsk').hide();
                            // $('.btndeleteConfirm').removeClass('hidden');

                        });
                        $('.btndeleteConfirm').click(function () {
                            var id = $(this).closest('tr').children('td:eq(1)').text();
                            $.ajax({
                                type: 'POST',
                                url: 'AdminAddVendor/deleteWeb',
                                data: {'id': id},
                                success: function (data) {
                                    $('.content').load("AdminAddVendor");  
                                    $('.error1').text('Delete Data.');
                                    $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                    setTimeout(function () {
                                        $('#tabView').click();
                                    }, 400);
                                }
                            });
                        });
                    });
                </script>
            </fieldset>
        </div>
    </div>   

</div>




