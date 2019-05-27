<style>
    .lblhedading{
        text-align: center;
        margin: auto;
    }
</style>   

<fieldset class="scheduler-border" id="printableArea">    
    <br/>
    <div class="form-group">
        <h6 class="lblhedading">...OM SAI RAM...</h6>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12 text-center">Ahmednagar</label>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12 text-center">M.P.K.V.RAHURI</label>
        <label class="control-label col-md-12 text-center">AHMEDNAGAR 413722</label>
        <label class="control-label col-md-12 text-center">MOB NO.9260303151</label>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="control-label  col-md-offset-10">DATE:2018/01/06</label>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="control-label  col-md-2">BILL  NO: 4</label>
        <label class="control-label  col-md-offset-8">TIME: 17:30</label>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ITEM NAME</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                    <th>AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pav bhaji</td>
                    <td>2</td>
                    <td>200.00</td>
                    <td>200.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td><span>Total Item(s): 3 /Qty :3.00</span></td>
                    <td></td>
                    <td></td>
                    <td><span>200.00</span></td>
                </tr>
                <tr>
                    <td><span>Total</span></td>
                    <td></td>
                    <td></td>
                    <td><span>200.00</span></td>
                </tr>
            </tfoot>
        </table>
        <div class="form-group">
            <label class="control-label col-md-12 text-center">...THANKS...VISIT AGAIN</label>
            <div class="clearfix"></div>
        </div>
      
        <div class="clearfix"></div>
    </div>
</fieldset>
  <button class="btn btn-primary " onclick="printDiv('printableArea')">Print</button>
  
    <script type="text/javascript">
       function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>