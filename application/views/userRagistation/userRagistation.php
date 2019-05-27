
<div class="container-fluid">   
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1" role="tab" id="tab1id" data-toggle="tab">Add </a></li>
    </ul>
    <div class="tab-content">    
        <div role="tabpanel" class="tab-pane active" id="tab-1">
            <fieldset class="scheduler-border">     
                <br>   
                <form method="post" action="UserRagistation/insertWeb" enctype="multipart/form-data">
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
                        <label class="control-label col-md-1">User Type: *</label>
                        <div class="col-md-5">
                            <select class="form-control"  name="selectUserType" >
                                <optgroup label="Select">
                                        <option>Waiter</option>
                                        <option>Kitchen</option>
                                </optgroup>
                            </select>
                        </div>
                        <label class="control-label col-md-1">Full Name: *</label>
                        <div class="col-md-5">  
                            <input type="text" class="form-control" placeholder="Full Name"  name="txtFullName" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">Contact No: </label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" placeholder="Contact No"  name="txtContactNo"  />
                        </div>
                        <label class="control-label col-md-1">Email Id: </label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" placeholder="Email"  name="txtEmail"  />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-1">Adharcard No:* </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Adharcard No" name="txtAdharNO" />
                        </div>
                         <label class="control-label col-md-1">Profile Image:* </label>    
                        <div class="col-md-5">
                            <input type="file" class="form-control" placeholder="Profile Image" name="images" />    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <div class="form-group">
                       
                        <label class="control-label col-md-1">Status: </label>
                        <div class="col-md-5">
                           <select class="form-control"  name="selectUserStatus" >
                                <optgroup label="Select">
                                        <option>Active</option>
                                        <option>UnActive</option>
                                </optgroup>
                            </select>
                        </div>
                        <label class="control-label col-md-1">Password: </label>  
                        <div class="col-md-5">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="txtConfirmPassword"  />
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                    <div class="form-group">
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
                                <button class="btn btn-warning"  type="reset">Clear </button>
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
                                        <th>Contact No</th>
                                        <th>Pancard No</th>
                                        <th>Adharcard No</th>  
                                        <th>GST No</th> 
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Price</th>  
                                        <th>GST %</th> 
                                        <th>GST Amount</th> 
                                        <th>Total Amount</th> 
                                        <th>Note</th>
                                        <th>Opration</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php foreach ($getAllPurchaseData as $row): ?>
                                        <tr>
                                            <td class="hidden"><?php echo $row['id']; ?></td>
                                            <td data-field="date" ><?php echo $row['date']; ?></td>  
                                            <td data-field="time"><?php echo $row['time']; ?></td>
                                            <td data-field="vendorName"><?php echo $row['vendorName']; ?></td>
                                            <td data-field="contactNo"><?php echo $row['contactNo']; ?></td>
                                            <td data-field="panNo" ><?php echo $row['panNo']; ?></td>  
                                            <td data-field="adharNo"><?php echo $row['adharNo']; ?></td>
                                            <td data-field="gstNo"><?php echo $row['gstNo']; ?></td>
                                            <td data-field="proName"><?php echo $row['proName']; ?></td>
                                            <td data-field="qty"><?php echo $row['qty']; ?></td>
                                            <td data-field="rate" ><?php echo $row['rate']; ?></td>  
                                            <td data-field="price"><?php echo $row['price']; ?></td>
                                            <td data-field="gstPer"><?php echo $row['gstPer']; ?></td>
                                            <td data-field="gstAmount"><?php echo $row['gstAmount']; ?></td>
                                            <td data-field="totalAmount"><?php echo $row['totalAmount']; ?></td>
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
                            var restName = $(this).closest('tr').children('td:eq(4)').text();
                            var type = $(this).closest('tr').children('td:eq(5)').text();
                            var phoneNo1 = $(this).closest('tr').children('td:eq(6)').text();
                            var phoneNo2 = $(this).closest('tr').children('td:eq(7)').text();
                            var address = $(this).closest('tr').children('td:eq(8)').text();
                            var area = $(this).closest('tr').children('td:eq(9)').text();
                            var subrub = $(this).closest('tr').children('td:eq(10)').text();
                            var city = $(this).closest('tr').children('td:eq(11)').text();
                            var pincode = $(this).closest('tr').children('td:eq(12)').text();
                            var state = $(this).closest('tr').children('td:eq(13)').text();
                            $.ajax({
                                type: 'POST',
                                url: 'AddMenu/updateWeb',
                                data: {'id': id, 'date': date, 'time': time, 'restName': restName, 'type': type, 'phoneNo1': phoneNo1, 'phoneNo2': phoneNo2, 'address': address, 'area': area, 'subrub': subrub, 'city': city, 'pincode': pincode, 'state': state},
                                success: function (data14) {
                                    $('.content').load("AddMenu");
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
                                url: 'AddMenu/deleteWeb',
                                data: {'id': id},
                                success: function (data) {
                                    $('.content').load("AddMenu");
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




