<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=ucfirst($page)?> Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('supplier')?>">Supplier Data</a></li>
              <li class="breadcrumb-item active"><?=ucfirst($page)?> Supplier</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-6">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?=site_url('supplier/process')?>" method="post">
                    <div class="form-group">
                        <label for="">
                            Supplier Name *       
                        </label>
                        <input type="hidden" name="id" value="<?=$row->supplier_id?>">
                        <input type="text" name="suppname" id="" class="form-control " value="<?=$row->name?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Phone *       
                        </label>
                        <input type="number" name="phone" id="" class="form-control " value="<?=$row->phone?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Address *       
                        </label>
                        <textarea name="address" id="" class="form-control " required><?=$row->address?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Description    
                        </label>
                        <textarea name="description" id="" class="form-control "><?=$row->description?></textarea>
                    </div>
                    

                    

                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary" name="<?=$page?>">Save</button>
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