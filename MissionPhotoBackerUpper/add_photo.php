<?php
// Start the session
session_start();

echo '<h1>Upload your Photos!</h1>';
//Make form
?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
   <input name="userfile[]" type="file" multiple> 
   <br><input name="upload" type="submit" class="box" id="upload" value=" Upload ">
</form>

