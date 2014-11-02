<html>
   <?PHP
   include 'KKHead.php';
   ?>
   <body>
      <br><br>
      <h1>Katie's Kitchen</h1> <br/>
      <?php
      include 'getCategory2.php';
      ?>
      <br/>
      <div class="katieProfile">
         <?php
         if (time() % 2 == 0) {
            echo '<img width=400 src="ShowImage.php?id=19"/>';
         } else {
            echo '<img width=400 src="ShowImage.php?id=20"/>';
         }
         ?>
      </div>
      <br/>
   </body>
</html>
