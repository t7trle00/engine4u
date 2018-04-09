<h2>Listing get</h2>
<table>
  <th>TITLE</th>
  <th>DESCRIPTION</th>
  <th>COVER PHOTO</th>
  <th>TYPE OF CAR</th>
  <th>YEAR</th>
  <th>CANCELLATION POLICY</th>
  <th>EDIT</th>
  <th>DELETE</th>
  <th>SHOW</th>

  <?php
    foreach ($images as $row ) {
      ?>
      <tr>
      <td><?php echo $row['carID'] ;?></td>
      <td><?php echo $row['title'] ;?></td>
      <td><?php echo $row['description'] ;?></td>
      <td>
        <img src="<?php echo base_url().'cover_gallery/'.$row['cover_photo']?>" width="100px" height="100px">
      </td>
      <td><?php echo $row['type_of_car'] ; ?></td>
      <td><?php echo $row['year'] ?></td>
      <td><?php echo $row['cancellation_policy'] ?></td>
      <td><a href="<?php echo site_url('host/show_specific_listing/').$row['carID']?>">
        <button class="btn btn-warning">EDIT</button></td></a>
      <td><a href="<?php echo site_url('host/show_specific_listing/').$row['carID']?>">
        <button class="btn btn-danger">DELETE</button></a></td>
      <td><button class="btn btn-primary">SHOW</td>
      </tr>
    <?php
      }
     ?>
</table>
