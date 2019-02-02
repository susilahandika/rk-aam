<?php foreach ($data as $value) { ?>
<tbody>
  <tr>
    <td><?php echo $value->item_name; ?></td>
    <td><input type="radio" name="<?php echo "choice[" . $value->id . "]"; ?>" value="ok" class="flat-red" ></td>
    <td><input type="radio" name="<?php echo "choice[" . $value->id . "]"; ?>" value="no" class="flat-red" ></td>
    <td><input type="radio" name="<?php echo "choice[" . $value->id . "]"; ?>" value="na" class="flat-red" ></td>
    <td>
      <textarea class="form-control" name="<?php echo "txt_info[" . $value->id . "]"; ?>" id="" cols="30" rows="5"></textarea>
    </td>
    <td>
      <input type="file" name="<?php echo "img_checklist[" . $value->id . "]"; ?>" class="form-control input-sm" id="">
    </td>
  </tr>
</tbody>
<?php } ?>
