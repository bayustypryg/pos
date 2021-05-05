<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
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
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                <div class="text-right">
                  <a href="<?=site_url('item/add')?>" class="btn btn-primary">Create</a>
                </div>
              </div>
              <?php $this->view('message') ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th style="width: 15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no= 1; foreach ($row->result() as $key => $data) { ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td>
                    <?=ucfirst($data->barcode)?><br>
                    <a href="<?=site_url('item/barcode_qrcode/'.$data->item_id)?>" class="btn btn-sm btn-default">Lihat Barcode</a>
                    </td>
                    <td><?=ucfirst($data->name)?></td>
                    <td><?=ucfirst($data->category_name)?></td>
                    <td><?=ucfirst($data->unit_name)?></td>
                    <td>Rp. <?=number_format($data->price,'0',',','.')?></td>
                    <td><?=$data->stock?></td>

                    <td style="width: 50px">
                    <?php if ($data->image != null) {?>
                    <img src="<?=base_url('uploads/product/'.$data->image)?>" alt="<?=$data->image?>" style="width:100px">
                    <?php }?>
                    </td>
                    
                    <td> 
                    <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-sm btn-success btn-block">Edit</a>
                    <a href="<?=site_url('item/delete/'.$data->item_id)?>" class="btn btn-sm btn-danger btn-block" onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
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