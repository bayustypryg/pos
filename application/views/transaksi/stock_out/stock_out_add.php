<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Stock Out</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('stock/out')?>">Data Stock Out</a></li>
              <li class="breadcrumb-item active">Add Stock Out</li>
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
          <div class="col-6">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?=site_url('stock/process')?>" method="post">
              <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        
                    </div>
                </div>

              <div class="form-group">
                <label for="">Barcode *</label>
              <div class="input-group">
                <input type="hidden" name="item_id" id="item_id">
                <input type="text" class="form-control" name="barcode" id="barcode">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button" id="modal-barcode" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search"></i></button>
                </span>
              </div><!-- /input-group -->
              </div>

              <div class="form-group">
              <label for="">Item Name</label>
              <input type="text" name="item_name" id="item_name" class="form-control" readonly>
              </div>
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label for="">Item Unit</label>
                    <input type="text" name="item_unit" id="item_unit" class="form-control" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="">Initial Stock</label>
                    <input type="text" name="stock" id="stock" class="form-control" readonly>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
              <label for="">Info</label>
              <input type="text" name="detail" placeholder="Kadaluarsa/rusak?" id="detail" class="form-control">
              </div>

              <div class="form-group">
              <label for="">Qty</label>
              <input type="number" name="qty" id="qty" class="form-control">
              </div>

              <div class="pull-right">
                <button type="submit" name="out_add" class="btn btn-primary" name="">Save</button>
                <button type="reset" class="btn btn-success">Reset</button>
              </div>

              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
      </div>


    


<!-- Modal -->
<div class="modal fade" id="modal-item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close bg-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="" >
          <table class="table table-bordered table-responsive" id="example1" style="width:100%">
            <thead>
              <tr>
                <td>Barcode</td>
                <td>Name</td>
                <td>Unit</td>
                <td>Price</td>
                <td>Stock</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($item as $i => $data) {?>
              <tr>
                <td><?=$data->barcode?></td>
                <td><?=$data->name?></td>
                <td><?=$data->unit_name?></td>
                <td><?=$data->price?></td>
                <td><?=$data->stock?></td>
                <td>
                  <button class="btn btn-sm btn-block btn-primary" id="select"
                  data-id="<?=$data->item_id?>"
                  data-barcode="<?=$data->barcode?>"
                  data-name="<?=$data->name?>"
                  data-unit="<?=$data->unit_name?>"
                  data-stock="<?=$data->stock?>"
                  >Select</button>
                </td>
              </tr>
              
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script src="<?=base_url()?>assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $(document).on('click', '#select', function() {
    var item_id = $(this).data('id');
    var barcode = $(this).data('barcode');
    var name = $(this).data('name');
    var unit_name = $(this).data('unit');
    var stock = $(this).data('stock');
    $('#item_id').val(item_id);
    $('#barcode').val(barcode);
    $('#item_name').val(name);
    $('#item_unit').val(unit_name);
    $('#stock').val(stock);
    $('#modal-item').modal('hide');
  })
})
</script>