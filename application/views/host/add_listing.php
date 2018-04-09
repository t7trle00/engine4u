<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Engine4u</title>
  </head>
  <body>
    <h1>CREATE NEW LISTING</h1>
    <?php echo form_open_multipart('host/create_listing'); ?>
    <form enctype="multipart/form-data" method="post">


        <label>Title</label>
        <input type="text" name="title" maxlength="100"> <br>

        <label>Description</label>
        <textarea name="description" rows="8" cols="80" placeholder="Give short description for your car"></textarea> <br>

        <label>Type of car</label>
        <input type="text" name="type_of_car" value=""> <br>

        <label>Year</label>
        <input type="number" name="year" value=""> <br>

        <label>Cancellation Policy</label>
        <select name="cancellation_policy">
          <option value="">Choose option</option>
          <option value="strict">Strict</option>
          <option value="moderate">Moderate</option>
          <option value="flexible">Flexible</option>
        </select> <br>

        <label>Cover photo for your listing</label>
        <input type="file" name="cover_photo" value="" id="cover_photo"><br>

        <label>More photos for your listing</label>
        <input type="number" name="carID" hidden>
        <input type="file" name="other_photo[]" multiple> <br>

        <input type="submit" name="upload" value="submit">

    </form>




  </body>
</html>
