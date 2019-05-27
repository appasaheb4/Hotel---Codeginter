<section>
    <div class="form-group">
        <div>
            <div class='error' style="display: none"></div>
            <ul class="nav nav-tabs">

                <li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Add Menu</a></li>
                <li><a href="#tab-2" role="tab" data-toggle="tab">Add Submenu</a></li>
                <li><a href="#tab-3" role="tab" id="tabViewSubect" data-toggle="tab">View Menu</a></li>
                <li><a href="#tab-4" role="tab" id="tabViewMrakRange" data-toggle="tab">View Submenu</a></li>
            </ul>   
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab-1">
                    <fieldset class="scheduler-border">     
                <br>   
                <form method="post" action="AddMenuAndSubmenu/insetMenuWeb" enctype="multipart/form-data">
                    <div class="form-group col-md-offset-3">
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
                    <div class="form-group col-md-offset-3">
                        <label class="control-label col-md-1">Menu:*</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Menu" name="txtMenu" required=""  />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                   <div class="form-group col-md-offset-3">
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
                                <button class="btn btn-warning" type="reset">Clear </button>
                            </div>
                        </div>
                    </div>

                </form>
            </fieldset>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab-2">
                    <fieldset class="scheduler-border">     
                <br>   
                <form method="post" action="AddMenuAndSubmenu/insetSubMenuWeb" enctype="multipart/form-data">
                    <div class="form-group col-md-offset-3">
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
                    <div class="form-group col-md-offset-3">
                        <label class="control-label col-md-1">Select Menu:*</label>
                        <div class="col-md-5">
                           <select class="form-control"  name="selectMenu" >
                                <optgroup label="Select">
                                    <?php foreach ($getMenuData as $row): ?>
                                        <option><?php echo $row['menu']; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        </div>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col-md-offset-3">
                        <label class="control-label col-md-1">Sub Menu:*</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Sub Menu" name="txtSubMenu"  required="" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                     <div class="form-group col-md-offset-3">
                        <label class="control-label col-md-1">Price:* </label>
                        <div class="col-md-5">   
                            <input type="number" class="form-control" placeholder="Price" name="txtPrice" required="" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                   <div class="form-group col-md-offset-3">
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
                <div role="tabpanel" class="tab-pane" id="tab-3">
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
                                <span id="countrow" class="pull-right"></span>
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
                                    <button class="btn btn-primary" type="button" onClick="location.href = '/AdminAddSubject/reportClassList'">
                                        <i class="fa fa-print "  aria-hidden="true"></i>  
                                    </button>
                                    <button class="btn btn-default  btn btn-primary" type="button" onClick="location.href = '/AdminAddSubject/excel'">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                    </button>
                                </div>


                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-condensed" id="adminAddSliderTable">
                                <thead>
                                    <tr class="bg-primary">    
                                        <th class="hidden">Id</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Menu</th>
                                        <th>Opration</th>
                                    </tr>
                                </thead>
                                <tbody>     
                                    <?php foreach ($getMenuData as $row): ?>
                                        <tr>
                                            <td class="hidden"><?php echo $row['id']; ?></td>
                                            <td data-field="date" class="dateData" ><?php echo $row['date']; ?></td>  
                                            <td data-field="time"><?php echo $row['time']; ?></td>
                                            <td data-field="menu"><?php echo $row['menu']; ?></td>
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

                        <!--                    For First Sr No Add-->
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

                        <!--                    For Filter Table Value-->
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

                        <!--                    For Edit And Save Button Code-->
                        <script type="text/javascript">
                            $(function () {
                                $('table tr').editable({
                                    edit: function (values) {
                                       var row_index = $(this).closest("tr").index();
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".edit").addClass("hidden");
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".save").removeClass('hidden');
                                    }
                                });
                                $('.fa-save').click(function () {
                                    $(".fa-save").dblclick();
                                    var id = $(this).closest('tr').children('td:eq(1)').text();
                                    var date = $(this).closest('tr').children('td:eq(2)').text();
                                    var time = $(this).closest('tr').children('td:eq(3)').text();
                                    var menu = $(this).closest('tr').children('td:eq(4)').text();
                                    var note = $(this).closest('tr').children('td:eq(5)').text();
                                    $.ajax({
                                        type: 'POST',
                                        url: 'AddMenuAndSubmenu/updateMenuWeb',
                                        data: {'id': id, 'date': date, 'time': time, 'menu': menu, 'note': note},
                                        success: function (data) {
                                            //var value = data;
                                            // alert(value);
                                            $('.content').load("AddMenuAndSubmenu");
                                            $('.error1').text('Updata Data.');
                                            $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                            setTimeout(function () {
                                                $('#tabViewSubect').click();
                                            }, 400);


                                        }
                                    });
                                });

                                $('.btnDeleteAsk').click(function () {
                                  var row_index = $(this).closest("tr").index();
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btnDeleteAsk").addClass("hidden");
                            $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btndeleteConfirm").removeClass('hidden');

                                });
                            });
                        </script>
                        <script type="text/javascript">
                            $(document).ready(function () {

                                $('.btndeleteConfirm').click(function () {
                                    var id = $(this).closest('tr').children('td:eq(1)').text();
                                    $.ajax({
                                        type: 'POST',
                                        url: 'AddMenuAndSubmenu/deleteMenuWeb',
                                        data: {'id': id},
                                        success: function (data) {
                                            $('.content').load("AddMenuAndSubmenu");
                                            $('.error1').text('Delete Data.');
                                            $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                            setTimeout(function () {
                                                $('#tabViewSubect').click();
                                            }, 400);
                                        }
                                    });
                                });
                            });
                        </script>

                    </fieldset>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab-4">
                    <fieldset class="scheduler-border">
                        <br>
                        <div class="form-group">
                            <div class="pull-right col-md-2">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary" type="button" onClick="location.href = '/AdminAddSubject/reportMarkRange'">
                                        <i class="fa fa-print "  aria-hidden="true"></i>  
                                    </button>
                                    <button class="btn btn-default  btn btn-primary" type="button" onClick="location.href = '/AdminAddSubject/excelMarkRage'">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                    </button>
                                </div>


                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-condensed" id="adminAddSliderTable1">
                                <thead>
                                    <tr class="bg-primary">    
                                        <th class="hidden">Id</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Menu</th>
                                        <th>Sub Menu</th>
                                         <th>Price</th>
                                        <th>Note</th>
                                        <th>Opration</th>
                                    </tr>
                                </thead>
                                <tbody>     
                                    <?php foreach ($getSubMenuData as $row): ?>
                                        <tr>
                                            <td class="hidden"><?php echo $row['id']; ?></td>
                                            <td data-field="date" class="dateData" ><?php echo $row['date']; ?></td>  
                                            <td data-field="time"><?php echo $row['time']; ?></td>
                                            <td data-field="menu"><?php echo $row['menu']; ?></td>
                                            <td data-field="subMenu"><?php echo $row['subMenu']; ?></td>
                                             <td data-field="price"><?php echo $row['price']; ?></td>
                                            <td data-field="note"><?php echo $row['note']; ?></td>
                                            <td><i class="fa fa-pencil btn-mg edit btn btn-primary btn-md"></i>
                                                <span class="glyphicon glyphicon-ok-circle btn-mg btn btn-primary secoundTableValue hidden"></span>
                                                <i class="fa fa-trash-o btn-md btn btn-warning btn-md btnDeleteAsk1" aria-hidden="true"></i>
                                                <i class="fa fa-check btn btn-warning btn-md btndeleteConfirm1 hidden" aria-hidden="true">Confirm</i>
                                            </td>
                                        </tr>      
                                    <?php endforeach; ?>
                                </tbody>
                            </table>   
                        </div> 

                        <!--                    For First Sr No Add-->
                        <script type="text/javascript">

                            $(document).ready(function () {

                                $("#adminAddSliderTable1").each(function () {
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
                            $(function () {
                                $('table tr').editable({
                                    edit: function (values) {
                                        $('.edit').hide();

                                    }
                                });
                                $('.edit').click(function () {
                                    var row_index = $(this).closest("tr").index();
                                $("#adminAddSliderTable1 tbody tr:eq(" + row_index + ")").find(".edit").addClass("hidden");
                                $("#adminAddSliderTable1 tbody tr:eq(" + row_index + ")").find(".secoundTableValue").removeClass('hidden');
                                });

                                $('.secoundTableValue').click(function () {
                                    $(".secoundTableValue").dblclick();
                                    var id = $(this).closest('tr').children('td:eq(1)').text();
                                    var date = $(this).closest('tr').children('td:eq(2)').text();
                                    var time = $(this).closest('tr').children('td:eq(3)').text();
                                    var menu = $(this).closest('tr').children('td:eq(4)').text();
                                    var subMenu = $(this).closest('tr').children('td:eq(5)').text();
                                    var price = $(this).closest('tr').children('td:eq(6)').text();
                                    var note = $(this).closest('tr').children('td:eq(7)').text();
                                    
                                    $.ajax({
                                        type: 'POST',
                                        url: 'AddMenuAndSubmenu/updateSubMenuWeb',
                                        data: {'id': id, 'date': date, 'time': time, 'menu': menu, 'subMenu': subMenu,'price':price,'note':note},
                                        success: function (data) {
                                            //var value = data;
                                            // alert(value);
                                            $('.content').load("AddMenuAndSubmenu");
                                            $('.error1').text('Updata Data.');
                                            $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                            setTimeout(function () {
                                                $('#tabViewMrakRange').click();
                                            }, 400);
                                        }
                                    });
                                });

                                $('.btnDeleteAsk1').click(function () {
                                      var row_index = $(this).closest("tr").index();
                            $("#adminAddSliderTable1 tbody tr:eq(" + row_index + ")").find(".btnDeleteAsk1").addClass("hidden");
                            $("#adminAddSliderTable1 tbody tr:eq(" + row_index + ")").find(".btndeleteConfirm1").removeClass('hidden');
                            

                                });
                            });
                        </script>
                        <script type="text/javascript">
                            $(document).ready(function () {

                                $('.btndeleteConfirm1').click(function () {
                                    var id = $(this).closest('tr').children('td:eq(1)').text();
                                    $.ajax({
                                        type: 'POST',
                                        url: 'AddMenuAndSubmenu/deleteSubMenuWeb',
                                        data: {'id': id},
                                        success: function (data) {
                                            $('.content').load("AddMenuAndSubmenu");
                                            $('.error1').text('Delete Data.');
                                            $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                            setTimeout(function () {
                                                $('#tabViewMrakRange').click();
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
    </div>
</section>