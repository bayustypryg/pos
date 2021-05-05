      
<div class="content-wrapper">
    <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Category</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
                  <li class="breadcrumb-item active">Category</li>
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
                  <a href="<?=site_url('category/add')?>" class="btn btn-primary">Create</a>
                </div>
              </div>
              <?php $this->view('message') ?>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered">
            <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th style="width: 20%">Created</th>
              <th style="width: 10%">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $no= 1; foreach ($row->result() as $key => $data) { ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=ucfirst($data->name)?></td>
                  <td class="text-center"><?=$data->created?></td>
                  <td> 
                  <a href="<?=site_url('category/edit/'.$data->category_id)?>" class="btn btn-sm btn-success btn-block">Edit</a>
                  <a href="<?=site_url('category/delete/'.$data->category_id)?>" class="btn btn-sm btn-danger btn-block" onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
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
    