
<?php
  include("inc/header.inc.php");
?>

  <!-- Form to import the staff file -->
  <form action="import/staff_detail_update.php" method="POST" enctype="multipart/form-data">
    <div align="center">
      <p>Upload Staff File: <input type="file" name="file"></p>
      <p><input type="submit" name="submit" valie="Import"></p>    
    </div>  
  </form>


<?php
  include("inc/footer.inc.php");
?>
