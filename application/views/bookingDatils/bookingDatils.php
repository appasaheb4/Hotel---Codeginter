 <section for="tableBooking" class="tableBooking">
                        <div class="form-group">
                            <?php foreach ($getTableBookingDetails as $row): ?>
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <span class="pull-left"><?php echo $row['date']; ?></span>
                                        <span class="pull-right"><?php echo $row['time']; ?></span><br/>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <span>Table No: <?php echo $row['tableNo']; ?></span>
                                            </div>
                                            <div class="col-md-6">
                                                <span>Table Code: <?php echo $row['tableCode']; ?></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <span>Waiter Name: <?php echo $row['waiterName']; ?></span>     
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Menu</th>
                                                    <th>SubMenu</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php foreach ($row['extraMenuList'] as $item): ?>
                                                <tr>
                                                    <td><?php echo $item['ExmenuName'] ?></td>
                                                    <td><?php echo $item['ExsubMenuName'] ?></td>
                                                    <td><?php echo $item['ExQty'] ?></td>
                                                </tr>   
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </section>