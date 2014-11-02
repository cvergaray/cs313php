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
         echo '<img class="katiePic" width=400 src="ShowImage.php?id=';
         if (time() % 2 == 0) {
            echo '19';
         } else {
            echo '20';
         }
         echo '"/>';
         ?>
         <div/>
         <br/>
   </body>
</html>
