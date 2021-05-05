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
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
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
                <div class="text-right">
                  <a href="<?=site_url('customer/add')?>" class="btn btn-primary">Create</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th style="width: 15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no= 1; foreach ($row->result() as $key => $data) { ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=ucfirst($data->name)?></td>
                      <td><?=$data->gender?></td>
                      <td><?=ucfirst($data->phone)?></td>
                      <td><?=ucfirst($data->address)?></td>
                      <td> 
                      <a href="<?=site_url('customer/edit/'.$data->customer_id)?>" class="btn btn-sm btn-success">Edit</a>
                      <a href="<?=site_url('customer/delete/'.$data->customer_id)?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
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