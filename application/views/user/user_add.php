<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('user')?>">Data User</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="post">
                    <div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
                    <label for="">
                        Name *       
                    </label>
                    <input type="text" name="fullname" id="" class="form-control " value="<?=set_value('fullname')?>">
                    <?=form_error('fullname')?>
                    </div>
                    <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
                    <label for="">
                        Username *       
                    </label>
                    <input type="text" name="username" id="" class="form-control" value="<?=set_value('username')?>">
                    <?=form_error('username')?>
                    </div>
                    <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                    <label for="">
                        Password *       
                    </label>
                    <input type="password" name="password" id="" class="form-control" value="<?=set_value('password')?>">
                    <?=form_error('password')?>
                    </div>
                    <div class="form-group <?=form_error('confpassword') ? 'has-error' : null?>">
                    <label for="">
                    Confirm Password *       
                    </label>
                    <input type="password" name="confpassword" id="" class="form-control" value="<?=set_value('confpassword')?>">
                    <?=form_error('confpassword')?>
                    </div>
                    <div class="form-group">
                    <label for="">
                        Address        
                    </label>
                    <textarea name="address" id="" class="form-control"><?=set_value('fullname')?></textarea>
                    </div>

                    <div class="form-group <?=form_error('confpassword') ? 'has-error' : null?>">
                        <label for="exampleFormControlSelect1">Level *</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="level">
                        <option value="">Select</option>
                        <option value="1"<?=set_value('level') == 1 ? "selected" : null?>>Admin</option>
                        <option value="2"<?=set_value('level') == 2 ? "selected" : null?>>Kasir</option>
                        </select>
                        <?=form_error('level')?>
                    </div>

                    

                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-success">Reset</button>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            </section>
</div>