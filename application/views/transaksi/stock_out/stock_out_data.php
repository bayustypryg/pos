<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stock Out</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Stock Out</li>
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
                <a href="<?=site_url('stock/out/add')?>" class="btn btn-primary">Create</a>
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
                  <th>Qty</th>
                  <th>Detail</th>
                  <th>Date</th>
                  <th style="width: 15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($row as $key => $data) {?>
                    <tr>
                        
                        <td><?=$no++?></td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->name?></td>
                        <td class="text-center"><?=$data->qty?></td>
                        <td class="text-center"><?=$data->detail?></td>
                        <td class="text-center"><?=indo_date($data->date)?></td>
                        <td>
                        
                        <a href="<?=site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id)?>" class="btn btn-block btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
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
      </div>

