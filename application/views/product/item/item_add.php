
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=ucfirst($page)?> Product Item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('item')?>">Item Data</a></li>
              <li class="breadcrumb-item active"><?=ucfirst($page)?> Product Item</li>
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
              <div class="card-header">
                <h3 class="card-title font-weight-bold text-center">Form Add Item</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?=form_open_multipart('item/process')?>
                    <div class="form-group">
                        <label for="barcode">
                            Barcode *       
                        </label>
                        <input type="hidden" name="id" value="<?=$row->item_id?>">
                        <input type="text" name="barcode" id="" class="form-control " value="<?=$row->barcode?>" required>
                    </div>
                    <div class="form-group">
                        <label for="product_name">
                            Product Name *       
                        </label>
                        <input type="text" name="product_name" id="" class="form-control " value="<?=$row->name?>" required>
                    </div>
                    <div class="form-group">
                        <label>
                            Category *       
                        </label>
                        <select name="category" id="" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach ($category->result() as $key => $data) {?>
                            <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null ?> ><?=$data->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">
                            Unit *       
                        </label>
                        <?php echo 
                        form_dropdown('unit', $unit, $selectedunit,
                            ['class' => 'form-control', 'required' => 'required']);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="price">
                            Price *       
                        </label>
                        <input type="number" name="price" id="" class="form-control " value="<?=$row->price?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">
                            Image *       
                        </label>
                        <?php if ($page == 'edit') {
                            if ($row->image != null) {?>
                                <div>
                                    <img src="<?=base_url('uploads/product/'.$row->image)?>" alt="<?=$row->image?>" style="width:80%">
                                </div>
                            <?php
                            }
                        }?>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    
                    

                    

                    <div class="float-sm-right">
                        <button type="submit" class="btn btn-primary" name="<?=$page?>">Save</button>
                        <button type="reset" class="btn btn-success">Reset</button>
                    </div>
                <?=form_close();?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>