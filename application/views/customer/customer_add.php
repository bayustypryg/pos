<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=ucfirst($page)?> Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active"><?=ucfirst($page)?> Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6 ">
            <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title"><?=ucfirst($page)?> Customer</h3>
                <div class="text-right">
                <a href="<?=site_url('customer')?>" class="btn btn-success pull-righ">Back</a>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?=site_url('customer/process')?>" method="post">
                    <div class="form-group">
                        <label for="">
                            Customer Name *       
                        </label>
                        <input type="hidden" name="id" value="<?=$row->customer_id?>">
                        <input type="text" name="suppname" id="" class="form-control " value="<?=$row->name?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Gender *    
                        </label>
                        <select name="gender" id="" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-Laki</option>
                            <option value="P" <?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
                        </select>
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
                    
                    

                    

                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary" name="<?=$page?>">Save</button>
                        <button type="reset" class="btn btn-success">Reset</button>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            </section>
</div>