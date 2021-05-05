<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
                  <a href="<?=site_url('user/add')?>" class="btn btn-primary">Create</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Level</th>
                    <th style="width: 15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no= 1; foreach ($row->result() as $key => $data) { ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=ucfirst($data->username)?></td>
                      <td><?=ucfirst($data->name)?></td>
                      <td><?=ucfirst($data->address)?></td>
                      <td><?=ucfirst($data->level == 1 ? "Admin" : "Kasir")?></td>
                      <td> <a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-sm btn-success btn-block">Edit</a>
                      
                      <form action="<?=site_url('user/del')?>" method="post">
                      <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                      <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-sm btn-danger btn-block" style="margin-top:5px">Delete</button>
                      </form>
                      
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