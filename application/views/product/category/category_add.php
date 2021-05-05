
<div class="content-wrapper">
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6 ">
            <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Create Category</h3>
                <div class="text-right">
                <a href="<?=site_url('category')?>" class="btn btn-success pull-righ">Back</a>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?=site_url('category/process')?>" method="post">
                    <div class="form-group">
                        <label for="">
                            Category Name *       
                        </label>
                        <input type="hidden" name="id" value="<?=$row->category_id?>">
                        <input type="text" name="namecat" id="" class="form-control " value="<?=$row->name?>" required>
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