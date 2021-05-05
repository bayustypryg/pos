<div class="content-wrapper">
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Barcode Generate</h3>
          <a href="<?=site_url('item')?>" class="btn btn-success pull-right">Back</a>
        </div>

        <div class="box-body">
        <?php
              $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
              echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
              ?> <br>
              <?=$row->barcode?>
              <br>
              <br>
              <a href="<?=site_url('item/barcode_print/'.$row->item_id)?>" target="_blank" class="btn btn-primary mt-2"><i class="fa fa-print"></i>  Print</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    