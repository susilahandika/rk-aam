<?php foreach ($data as $value) { ?>
<tbody>
  <tr>
    <td><?php echo $value->item_name; ?></td>
    <td><input type="radio" name="<?php echo "choice[" . $value->id . "]"; ?>" value="ok" class="flat-red <?php echo "choice[" . $value->id . "]"; ?>" ></td>
    <td><input type="radio" name="<?php echo "choice[" . $value->id . "]"; ?>" value="no" class="flat-red <?php echo "choice[" . $value->id . "]"; ?>" ></td>
    <td><input type="radio" name="<?php echo "choice[" . $value->id . "]"; ?>" value="na" class="flat-red <?php echo "choice[" . $value->id . "]"; ?>" ></td>
    <td>
      <textarea class="form-control" name="<?php echo "txt_info[" . $value->id . "]"; ?>" id="" cols="30" rows="5"></textarea>
    </td>
  </tr>
  <?php if($value->need_image == 'Y'){ ?>
  <tr>
    <td colspan="5">
      <div class="col-sm-12">
        <input type="file" name="<?php echo "img_checklist" . $value->id . ""; ?>" class="form-control" id="<?php echo "img_checklist" . $value->id . ""; ?>">
      </div>
    </td>
  </tr>
  <?php } ?>
</tbody>
<?php } ?>