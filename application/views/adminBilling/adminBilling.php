
<div class="container-fluid">   
    <ul class="nav nav-tabs">
        <li><a href="#tab-2" role="tab" id="tabView" data-toggle="tab">View </a></li>
    </ul>
    <div class="tab-content">    
        <div role="tabpanel" class="tab-pane active" id="tab-2">
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
                                        <th>Table No</th>
                                        <th class="hidden">Table Code</th>
                                        <th>Vendor Name</th>
                                        <th class="hidden">Menu Name</th>
                                        <th class="hidden">Submenu Name</th>
                                        <th class="hidden">Qty</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Opration</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php foreach ($getTableBookingData as $row): ?>
                                        <tr>
                                            <td class="hidden"><?php echo $row['id']; ?></td>
                                            <td ><?php echo $row['date']; ?></td>    
                                            <td ><?php echo $row['time']; ?></td>
                                            <td ><?php echo $row['tableNo']; ?></td>
                                            <td class="hidden"><?php echo $row['tableCode']; ?></td>
                                            <td ><?php echo $row['waiterName']; ?></td>  
                                            <td class="hidden"><?php echo $row['menuName']; ?></td>  
                                            <td class="hidden"><?php echo $row['subMenuName']; ?></td> 
                                            <td class="hidden"><?php echo $row['qty']; ?></td>  
                                            <td ><?php echo $row['price']; ?></td>  
                                            <td ><?php echo $row['status']; ?></td>
                                            <td>     
                                                <?php if ($row['status'] != "Paid") { ?>
                                                    <i class="fa fa-money btn btn-success btnAskPaid" aria-hidden="true"></i>   
                                                    <i class="fa fa-check btn btn-primary hidden confirmPaid" aria-hidden="true">Confirm Paid</i>
                                                <?php } else if ($row['status'] == "Paid") { ?>
                                                    <i class="fa fa-print btn btn-info " onClick="location.href = '/AdminBilling/reportBillingShow'" aria-hidden="true"></i> 
                                                    <!--                                                btnPrintData-->
                                                <?php } ?>
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
                    $(document).ready(function () {

                        $('.btnAskPaid').click(function () {
                            var row_index = $(this).closest("tr").index();
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btnAskPaid").addClass("hidden");
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".confirmPaid").removeClass('hidden');
                        });


                        $('.confirmPaid').click(function () {
                            var id = $(this).closest('tr').children('td:eq(1)').text();
                            var tableNo = $(this).closest('tr').children('td:eq(4)').text();
                            $.ajax({
                                type: 'POST',
                                url: 'AdminBilling/updatePaidWeb',
                                data: {'id': id, 'tableNo': tableNo},
                                success: function (data) {
                                    $('.content').load("AdminBilling");
                                    $('.error1').text('Paid amount done.');
                                    $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                    setTimeout(function () {
                                        $('#tabView').click();
                                    }, 400);
                                }
                            });
                        });

                        $('.btnPrintData').click(function () {
                            $('.content').load("AdminBillingPrint");
                        });


                        $('.btnDeleteAsk').click(function () {
                            var row_index = $(this).closest("tr").index();
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btnDeleteAsk").addClass("hidden");
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btndeleteConfirm").removeClass('hidden');
                        });

                        $('.btndeleteConfirm').click(function () {
                            var id = $(this).closest('tr').children('td:eq(1)').text();
                            var tableNo = $(this).closest('tr').children('td:eq(4)').text();
                            $.ajax({
                                type: 'POST',
                                url: 'AdminBilling/deleteTableBooking',
                                data: {'id': id, 'tableNo': tableNo},
                                success: function (data) {
                                    $('.content').load("AdminBilling");
                                    $('.error1').text('Delete data and free table.');
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




