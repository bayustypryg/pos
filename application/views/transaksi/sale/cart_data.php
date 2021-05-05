<?php $no = 1;
  if ($cart->num_rows() > 0) {
  foreach ($cart->result() as $c => $data) { ?>
    <tr>
        <td><?=$no++?>.</td>
        <td><?=$data->barcode?></td>
        <td><?=$data->item_name?></td>
        <td><?=$data->cart_price?></td>
        <td><?=$data->qty?></td>
        <td><?=$data->discount_item?></td>
        <td id="total"><?=$data->total?></td>
        <td>
        <button class="btn btn-block btn-primary btn-sm" type="button" id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
        data-cartid="<?=$data->cart_id?>"
        data-barcode="<?=$data->barcode?>"
        data-product="<?=$data->item_name?>"
        data-price="<?=$data->cart_price?>"
        data-qty="<?=$data->qty?>"
        data-discount="<?=$data->discount_item?>"
        data-total="<?=$data->total?>"
        >Update</button>
        <button type="submit" id="del_cart" data-cartid="<?=$data->cart_id?>" class="btn btn-block btn-sm btn-danger">Delete</button>
        </td>
    </tr>
  
<?php }
        }else {
          echo '<tr>
                    <td colspan="8" class="text-center">
                    Tidak ada item
                    </td>
                </tr>';
        }?>