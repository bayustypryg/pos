<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
            Edit User
            </h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-success pull-righ">Back</a>
            </div>

        </div>
        <div class="box-body">
        
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                
                <form action="" method="post">
                <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                    <div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
                    <label for="">
                        Name        
                    </label>
                    <input type="text" name="fullname" id="" class="form-control " value="<?=$this->input->post('fullname') ?? $row->name?>">
                    <?=form_error('fullname')?>
                    </div>
                    <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
                    <label for="">
                        Username        
                    </label>
                    <input type="text" name="username" id="" class="form-control" value="<?=$this->input->post('username') ?? $row->username?>">
                    <?=form_error('username')?>
                    </div>
                    <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                    <label for="">
                        Password       
                    </label> <small>(Biarkan kosong bila tidak diganti)</small>
                    <input type="password" name="password" id="" class="form-control" value="<?=$this->input->post('password')?>">
                    <?=form_error('password')?>
                    </div>
                    <div class="form-group <?=form_error('confpassword') ? 'has-error' : null?>">
                    <label for="">
                    Confirm Password      
                    </label>
                    <input type="password" name="confpassword" id="" class="form-control" value="<?=$this->input->post('confpassword')?>">
                    <?=form_error('confpassword')?>
                    </div>
                    <div class="form-group">
                    <label for="">
                        Address        
                    </label>
                    <textarea name="address" id="" class="form-control"><?=$this->input->post('address') ?? $row->address?></textarea>
                    </div>

                    <div class="form-group <?=form_error('confpassword') ? 'has-error' : null?>">
                        <label for="exampleFormControlSelect1">Level *</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="level">
                        <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level?>
                        <option value="1">Admin</option>
                        <option value="2"<?=$level == 2 ? "selected" : null?>>Kasir</option>
                        </select>
                        <?=form_error('level')?>
                    </div>

                    

                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-success">Reset</button>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</section>