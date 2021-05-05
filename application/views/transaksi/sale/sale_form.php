<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php $this->view('message') ?>
    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row justify-content-center">
                    <label for="date" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-7">
                    <input type="date" class="form-control" readonly id="date" value="<?=date('Y-m-d')?>">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="kasir" class="col-sm-4 col-form-label">Kasir</label>
                    <div class="col-sm-7">
                    <input type="text" readonly class="form-control" id="user" value="<?=$this->fungsi->user_login()->name;?>">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="customer" class="col-sm-4 col-form-label">Customer</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="customer">
                            <option value="">-- Umum --</option>
                            <?php foreach ($customer as $cust => $value) {?>
                              <option value="<?=$value->customer_id?>"><?=$value->name?></option>;
                            <?php }?>
                        </select>
                    </div>
                </div>

              
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
             
              <div class="form-group row justify-content-center">
                    <input type="hidden" id="item_id">
                    <input type="hidden" id="price">
                    <input type="hidden" id="stock">
                    <label for="barcode" class="col-sm-4 col-form-label">Barcode</label>
                    <div class="col-sm-7 input-group">
                    <input type="text" class="form-control" id="barcode" autofocus>
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-flat" type="button" id="modal-barcode" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="qty" class="col-sm-4 col-form-label" >Qty</label>
                    <div class="col-sm-7">
                    <input type="number" class="form-control" id="qty" value="1" min="1">
                    <button type="button" id="add_cart" class="btn btn-primary mt-2 btn-block font-weight-bold">Add</button>
                    </div>
                </div>
                <div class="text-right">
               
                </div>

              
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              
              <div class="">
              <div class="text-right mb-1">
                <h4> Invoice :  <b> <span id="invoice"><?=$invoice?></span> </b></h4><br><br>
              </div>
              <div class="text-right">
                <h1><b><span id="grand_total2">0</span></b></h1>
              </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card">
              <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Product Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Discount Item</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="cart_table">
                      <?php $this->view('transaksi/sale/cart_data');?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-3">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row justify-content-center">
                    <label for="sub_total" class="col-sm-5 col-form-label">Sub Total</label>
                    <div class="col-sm-7">
                    <input type="text" readonly class="form-control" id="sub_total">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="" class="col-sm-5 col-form-label">Discount</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="discount">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="" class="col-sm-5 col-form-label">Grand Total</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="grand_total" readonly>
                    </div>
                </div>

              
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
             
                <div class="form-group row justify-content-center">
                    <label for="cash" class="col-sm-4 col-form-label">Cash</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" id="cash">
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="change" class="col-sm-4 col-form-label">Change</label>
                    <div class="col-sm-8">
                    <input type="number" readonly class="form-control" id="change">
                    </div>
                </div>
                <div class="text-right">
               
                </div>

              
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row justify-content-center">
                    <label for="note" class="col-sm-3 col-form-label">Note</label>
                    <div class="col-sm-9 input-group">
                    <textarea class="form-control" id="note" rows="3"></textarea>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-2">
            <div class="row">
                <div class="col-md-12">
                    <button id="process_payment" class="btn btn-block btn-primary btn-flat font-weight-bold">Process Payment</button>
                    <button id="cancel_payment" class="btn btn-block btn-success btn-flat font-weight-bold">Cancel</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      </div>


    


<!-- Modal add item to cart-->
<div class="modal fade" id="modal-item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title font-weight-bold text-dark" id="exampleModalLabel">Add Product Item</h5>
        <button type="button" class="close bg-warning" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="example2">
            <thead>
                <th>Barcode</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php foreach ($item as $i => $data) {?>
              
            <tr>
                <td><?=$data->barcode?></td>
                <td><?=$data->name?></td>
                <td><?=$data->unit_name?></td>
                <td><?=$data->price?></td>
                <td><?=$data->stock?></td>
                <td><button class="font-weight-bold text-dark btn btn-sm btn-warning" id="select"
                data-id="<?=$data->item_id?>"
                data-barcode="<?=$data->barcode?>"
                data-price="<?=$data->price?>"
                data-stock="<?=$data->stock?>"
                >Select</button></td>
            </tr>
              <?php }?>
            </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal edit cart-->
<div class="modal fade" id="modal-item-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title font-weight-bold text-dark" id="exampleModalLabel">Update Item Cart</h5>
        <button type="button" class="close bg-warning" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="cartid_item">
        <div class="form-group">
              <label for="product_item">Product Item</label>
              <div class="row">
                <div class="col-md-5 mt-2">
                  <input type="text" id="barcode_item" class="form-control" readonly>
                </div>
                <div class="col-md-7 mt-2">
                  <input type="text" id="product_item" class="form-control" readonly>
                </div>
              </div>
        </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label for="price_item">Price Item</label>
              <input type="number" class="form-control" id="price_item">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label for="qty_item">Qty</label>
              <input type="number" min="1" class="form-control" id="qty_item">
          </div>
        </div>
      </div>
        
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="total_before">Total Before Discount</label>
                <input type="number" class="form-control" id="total_before" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="discount_item">Discount /Item</label>
                <input type="number" class="form-control" id="discount_item">
            </div>
          </div>
      </div>
        
        <div class="form-group">
              <label for="total_item">Total After Discount</label>
              <input type="number" class="form-control" id="total_item" readonly>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="edit_cart" class="btn btn-primary">Save changes</button>
      </div>
      
    </div>
  </div>
</div>

<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>

<script>
  $(document).on('click', '#select', function(){
    $('#item_id').val($(this).data('id'))
    $('#barcode').val($(this).data('barcode'))
    $('#price').val($(this).data('price'))
    $('#stock').val($(this).data('stock'))
    $('#modal-item').modal('hide')

    get_cart_qty()
  })

  function get_cart_qty() {
    $('#cart_table tr').each(function(){
      var qty_cart = $(this).find("td").eq(4).text()
      
    });
  }

  $(document).on('click', '#add_cart', function(){
    var item_id = $('#item_id').val()
    var price = $('#price').val()
    var stock = $('#stock').val()
    var qty = $('#qty').val()
    if (item_id == '') {
      alert('Product belum dipilih')
      $('#barcode').focus()
    } else if(stock < 1 || parseInt(qty) > parseInt(stock)){
        alert('Stock tidak mencukupi!')
        $('#item_id').val('')
        $('#barcode').val('')
        $('#barcode').focus()
    } else {
      $.ajax({
        type: 'POST',
        url: '<?=site_url('sale/process')?>',
        data: {'add_cart' : true, 'item_id' : item_id, 'price' : price, 'qty' : qty},
        dataType: 'json',
        success: function(result){
          if (result.success == true) {
            $('#cart_table').load('<?=site_url('sale/cart_data')?>', function(){
              kalkulasi()
            })
            $('#item_id').val('')
            $('#barcode').val('')
            $('#qty').val(1)
            $('#barcode').focus()

          }else{
            alert('Gagal tambah item keranjang')
          }
        }
      })
    }
  })

  $(document).on('click', '#del_cart', function(){
    if (confirm('Apakah Anda Yakin?')) {
      var cart_id = $(this).data('cartid')
      $.ajax({
        type: 'POST',
        url: '<?=site_url('sale/cart_del')?>',
        dataType: 'json',
        data: {'cart_id': cart_id},
        success: function(result){
            if (result.success == true) {
              $('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
                kalkulasi()
              })
            }else{
              alert('Gagal hapus item!')
            }
        }
      })
    }
  })

  $(document).on('click', '#update_cart', function(){
    $('#cartid_item').val($(this).data('cartid'))
    $('#barcode_item').val($(this).data('barcode'))
    $('#product_item').val($(this).data('product'))
    $('#price_item').val($(this).data('price'))
    $('#qty_item').val($(this).data('qty'))
    $('#total_before').val($(this).data('price') * $(this).data('qty'))
    $('#discount_item').val($(this).data('discount'))
    $('#total_item').val($(this).data('total'))
  })

  function count_edit_modal() {
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()
    var discount = $('#discount_item').val()

    total_before = price * qty
    $('#total_before').val(total_before)

    total = (price - discount) * qty
    $('#total_item').val(total)

    if(discount == '') {
      $('#discount_item').val(0)
    }
  }

  $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
    count_edit_modal()
  })

  $(document).on('click', '#edit_cart', function(){
    var cart_id = $('#cartid_item').val()
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()
    var discount = $('#discount_item').val()
    var total = $('#total_item').val()
    
    if (price == '') {
      alert('Harga tidak boleh kosong!')
      $('#price_item').focus()
    } else if(qty == '' || qty < 1) {
        alert('Qty minimal 1')
        $('#qty_item').focus()
    } else {
      $.ajax({
        type: 'POST',
        url: '<?=site_url('sale/process')?>',
        data: {'edit_cart' : true, 'cart_id' : cart_id, 'price' : price, 'qty' : qty, 'discount' : discount, 'total' : total},
        dataType: 'json',
        success: function(result){
          if (result.success == true) {
            $('#cart_table').load('<?=site_url('sale/cart_data')?>', function(){
              kalkulasi()
            })
            alert('Item cart berhasil di ubah!')
            $('#modal-item-edit').modal('hide')
          }else{
            alert('Gagal! Data item cart tidak ter-update')
          }
        }
      })
    }
  })

  function kalkulasi() {
    var subtotal = 0;
    $('#cart_table tr').each(function() {
      subtotal += parseInt($(this).find('#total').text())
    })
    isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

    var discount = $('#discount').val()
    var grand_total = subtotal - discount
    if(isNaN(grand_total)) {
        $('#grand_total').val(0)
        $('#grand_total2').text(0)
    } else {
      $('#grand_total').val(grand_total)
      $('#grand_total2').text(grand_total)
    }
    var cash = $('#cash').val()
    cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

    if(discount == '') {
      $('#discount').val(0)
    }
  }

  
  $(document).on('keyup mouseup', '#discount, #cash', function() {
    kalkulasi()
  })

  $(document).ready(function() {
    kalkulasi()
  })

  // proses pembayaran
  $(document).on('click', '#process_payment', function() {
    var customer_id = $('#customer').val()
    var subtotal = $('#sub_total').val()
    var discount = $('#discount').val()
    var grandtotal = $('#grand_total').val()
    var cash = $('#cash').val()
    var change = $('#change').val()
    var note = $('#note').val()
    var date = $('#date').val()

    if(subtotal < 1) {
      alert('Belum ada produk item yang dipilih')
      $('#barcode').focus()
    } else if(cash < 1) {
      alert('Jumlah uang tunai belum diinput')
      $('#cash').focus()
    } else {
      if(confirm('Yakin proses transaksi ini?')) {
        $.ajax({
          type: 'POST',
          url: '<?=site_url('sale/process')?>',
          data: {'process_payment': true, 'customer_id': customer_id, 'subtotal': subtotal, 'discount': discount, 'grandtotal': grandtotal, 'cash': cash, 'change': change, 'note': note, 'date': date},
          dataType: 'json',
          success: function(result){
            if (result.success) {
              alert('transaksi berhasil');
              window.open('<?=site_url('sale/cetak/')?>' + result.sale_id, '_blank')
            } else {
              alert('gagal');
            }
            location.href='<?=site_url('sale')?>'
          }
        })
      }
    }
  })

  $(document).on('click', '#cancel_payment', function(){
    if(confirm('Apakah Anda Yakin?')) {
      $.ajax({
        type: 'POST',
        url: '<?=site_url('sale/cart_del')?>',
        dataType: 'json',
        data: {'cancel_payment': true},
        success: function(result) {
          if (result.success == true) {
            $('#cart_table').load('<?=site_url('sale/cart_data')?>', function(){
              count()
            })
          }
        }
      })
      $('#discount').val(0)
      $('#cash').val(0)
      $('#customer').val('').change()
      $('#barcode').val('')
      $('#barcode').focus()
    }
  })

  $('#barcode').keypress(function (e) {
    var key = e.which;
    var barcode = $(this).val();
    if (key == 13) {
      $.ajax({
        type: 'POST',
        url: '<?=site_url('sale/get_item')?>',
        data: {'barcode' : barcode},
        dataType: 'json',
        success: function(result) {
          if (result.success == true) {
            $('#item_id').val(result.item.item_id)
            $('#barcode').val(barcode)
            $('#price').val(result.item.price)
            $('#stock').val(result.item.stock)
            

            $('#add_cart').click();

          } else {
            alert('Produk tidak ditemukan!');
            $('#barcode').val('');
          }
        }
      })
    }
  });
</script>