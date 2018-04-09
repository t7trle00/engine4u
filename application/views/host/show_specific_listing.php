<h2>Listing in details</h2>
<?php echo form_open_multipart('host/delete_listing'); ?>
<form enctype="multipart/form-data" method="post">
  <input type="text" name="carID"  hidden value="<?php echo $carID ?>">

  <label>Tile</label>
  <input type="text" name="title" value="<?php echo $id_get_edit[0]['title']?>">
  <br> <br>

  <label>Description</label>
  <input type="text" name="description" value="<?php echo $id_get_edit[0]['description']?>">
  <br> <br>

  <label>Cover photo</label>
  <input type="text" name="cover_photo" value="<?php echo $id_get_edit[0]['cover_photo'] ;?>">
  <img src="<?php echo base_url().'cover_gallery/'.$id_get_edit[0]['cover_photo']?>" width="500px" height="500px" alt="">

  <br> <br>
  <label>Other Photo</label>
  <?php for ($i=0; $i <count($id_get_edit) ; $i++)
  {
    echo '<input type="text" name="other_photo" value='.$id_get_edit[$i]['photo'].'>' ;
    echo '<br><br>' ;
  }
  ?>

<?php
for ($i=0; $i <count($id_get_edit) ; $i++)
{
  echo '<img src="'.base_url().'other_gallery/'.$id_get_edit[$i]['photo']. '" width="500px" height="500px" alt="">';
  echo '<br><br>' ;
}
 ?>

  <br><br>
  <label>Type of car</label>
  <input type="text" name="type_of_car" value="<?php echo $id_get_edit[0]['type_of_car']?>">
  <br> <br>

  <label>Year</label>
  <input type="number" name="year" value="<?php echo $id_get_edit[0]['year']?>">
  <br><br>

  <label>Cancellation Policy</label>
  <input type="text" name="cancellation_policy" value="<?php echo $id_get_edit[0]['cancellation_policy']?>">

</form>
<br><br>
<a href="<?php echo site_url('host/delete_listing/').$carID; ?>">
  <button class="btn btn-danger">DELETE</button></a>
<a href="<?php echo site_url('host/get_listing'); ?>">
  <button class="btn btn-info">CANCEL</button></a>
