      
<div class="content-wrapper">
    <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Sale Report</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
                  <li class="breadcrumb-item active">Sale Report</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered">
                  <div class="table-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Invoice</th>
                      <th>Date</th>
                      <th>Customer</th>
                      <th>Total</th>
                      <th>Discount</th>
                      <th>Grand Total</th>
                      <th>Note</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no= 1; foreach ($row->result() as $key => $data) { ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$data->invoice?></td>
                        <td><?=indo_date($data->date)?></td>
                        <td><?=$data->customer_id == null ? "Umum" : $data->customer_name?></td>
                        <td><?=indo_currency($data->total_price)?></td>
                        <td><?=indo_currency($data->discount)?></td>
                        <td><?=indo_currency($data->final_price)?></td>
                        <td><?=$data->note?></td>
                        <td>
                          <button id="detail" data-toggle="modal" data-target="#modal-detail" class="btn btn-sm btn-primary"
                          data-invoice ="<?=$data->invoice?>"
                          data-date ="<?=$data->date?>"
                          data-time ="<?=substr($data->sale_created, 11, 5)?>"
                          data-customer ="<?=$data->customer_id == null ? "Umum" : $data->customer_name?>"
                          data-total ="<?=indo_currency($data->total_price)?>"
                          data-discount ="<?=indo_currency($data->discount)?>"
                          data-grandtotal ="<?=indo_currency($data->final_price)?>"
                          data-cash ="<?=indo_currency($data->cash)?>"
                          data-remaining ="<?=indo_currency($data->remaning)?>"
                          data-note ="<?=$data->note?>"
                          data-cashier ="<?=$data->user_name?>"
                          data-saleid ="<?=$data->sale_id?>"
                          ><i class="fa fa-search-plus"></i> Detail</button>
                          <a href="<?=site_url('sale/cetak/'.$data->sale_id)?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> Print</a>
                          <a href="<?=site_url('sale/del/'.$data->sale_id)?>" onclick="return confirm('Apakah kamu yakin?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  </div>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
    
    <!-- Modal -->
    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sale Report Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body table-responsive">
            <table class="table table-bordered no-margin">
                      <tr>
                          <th>Invoice</th>
                          <td><span id="invoice"></span></td>
                          <th>Customer</th>
                          <td><span id="cust"></span></td>
                      </tr>
                      <tr>
                          <th>Date Time</th>
                          <td><span id="date-time"></span></td>
                          <th>Cashier</th>
                          <td><span id="cashier"></span></td>
                      </tr>
                      <tr>
                          <th>Total</th>
                          <td><span id="total"></span></td>
                          <th>Cash</th>
                          <td><span id="cash"></span></td>
                      </tr>
                      <tr>
                          <th>Discount</th>
                          <td><span id="discount"></span></td>
                          <th>Change</th>
                          <td><span id="change"></span></td>
                      </tr>
                      <tr>
                          <th>Grand Total</th>
                          <td><span id="grandtotal"></span></td>
                          <th>Note</th>
                          <td><span id="note"></span></td>
                      </tr>
                      <tr>
                          <th>Product</th>
                          <td colspan="3"><span id="product"></span></td>
                      </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


    <script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <script>
    $(document).on('click', '#detail', function() {
      $('#invoice').text($(this).data('invoice'))
      $('#cust').text($(this).data('customer'))
      $('#date-time').text($(this).data('date') + ' ' + $(this).data('time'))
      $('#total').text($(this).data('total'))
      $('#discount').text($(this).data('discount'))
      $('#change').text($(this).data('remaining'))
      $('#grandtotal').text($(this).data('grandtotal'))
      $('#note').text($(this).data('note'))
      $('#cash').text($(this).data('cash'))
      $('#cashier').text($(this).data('cashier'))

      var product = '<table class="table no-margin"><tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
      $.getJSON('<?=site_url('report/sale_product/')?>'+$(this).data('saleid'), function(data) {
          $.each(data, function(key, val) {
          product += '<tr><td>'+val.name+'</td><td>'+val.price+'</td><td>'+val.qty+'</td><td>'+val.discount_item+'</td><td>'+val.total+'</td></tr>'
      
        })
        product += '</table>'
        $('#product').html(product)
      })
    })
    </script>