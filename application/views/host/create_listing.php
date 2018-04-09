<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2><?php echo $message ?></h2>

    <?php


        echo '<div>';
        echo '<h4>Title: '.$title.'</h4>' ;
        echo '</div>' ;
        echo '<div>' ;
        echo "<img src='".$cover_photo."' width=500px height = 300px >" ;
        echo '</div>' ;
        echo '<div>' ;
        echo '<p>Description: '.$description.'</p>' ;
        echo '</div>' ;
        echo '<div>' ;
        echo '<p> Type of car: '.$type_of_car.'</p>' ;
        echo '</div>' ;
        echo '<div>' ;
        echo '<p>Year: '.$year.'</p>' ;
        echo '</div>' ;
        echo '<div>' ;
        echo '<p>Cancellation policy: '.$cancellation_policy.'</p>' ;
        echo '</div>' ;

     ?>

     <!-- other photo display -->
     <ul>
       <?php foreach ($images as $image): ?>
         <li>
           <img src="<?php echo base_url().'other_gallery/'.$image['photo']?>" width='500px' height = '300px'>
         </li>
       <?php endforeach ; ?>
     </ul>



  </body>
</html>
