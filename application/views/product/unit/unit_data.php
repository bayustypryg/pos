<div class="content-wrapper">
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Unit Data</h3>
          <a href="<?=site_url('category/add')?>" class="btn btn-primary pull-right">Create</a>
        </div>

        <div class="box-body">
          <table id="example2" class="table table-bordered table-responsive">
            <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Created</th>
              <th style="width: 15%">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $no= 1; foreach ($row->result() as $key => $data) { ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=ucfirst($data->name)?></td>
                <td><?=$data->created?></td>
                <td> 
                <a href="<?=site_url('unit/edit/'.$data->unit_id)?>" class="btn btn-sm btn-success">Edit</a>
                <a href="<?=site_url('unit/delete/'.$data->unit_id)?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

    