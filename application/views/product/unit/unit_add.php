<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
            <?=ucfirst($page)?> Unit
            </h3>
            <div class="pull-right">
                <a href="<?=site_url('unit')?>" class="btn btn-success pull-righ">Back</a>
            </div>

        </div>
        <div class="box-body">
        
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                
                <form action="<?=site_url('unit/process')?>" method="post">
                    <div class="form-group">
                        <label for="">
                            Unit Name *       
                        </label>
                        <input type="hidden" name="id" value="<?=$row->unit_id?>">
                        <input type="text" name="name_unit" id="" class="form-control " value="<?=$row->name?>" required>
                    </div>
                    
                    

                    

                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary" name="<?=$page?>">Save</button>
                        <button type="reset" class="btn btn-success">Reset</button>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</section>