<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stock In</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Stock In</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php $this->view('message') ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="text-right">
                <a href="<?=site_url('stock/in/add')?>" class="btn btn-primary">Create</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th style="width: 10px">#</th>
                  <th>Barcode</th>
                  <th>Product Item</th>
                  <th>Supplier</th>
                  <th>Qty</th>
                  <th>Date</th>
                  <th>Detail</th>
                  <th style="width: 15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($row as $key => $data) {?>
                    <tr>
                        
                        <td><?=$no++?></td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->item_name?></td>
                        <td><?=$data->supplier_name?></td>
                        <td class="text-center"><?=$data->qty?></td>
                        <td class="text-center"><?=indo_date($data->date)?></td>
                        <td class="text-center"><?=$data->detail?></td>
                        <td>
                        
                        <a href="<?=site_url('stock/in/del/'.$data->stock_id.'/'.$data->item_id)?>" class="btn btn-block btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
                        </td>
                    </tr>
                      <?php } ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-responsive">
                  <tbody>
                        <tr>
                          <td>Barcode</td>
                          <td>Barcode</td>
                        </tr>
                        <tr>
                          <td>Barcode</td>
                        </tr>
                        <tr>
                          <td>Barcode</td>
                        </tr>
                        <tr>
                          <td>Barcode</td>
                        </tr>
                        <tr>
                          <td>Barcode</td>
                        </tr>
                        <tr>
                          <td>Barcode</td>
                        </tr>
                  </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</div>