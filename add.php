<?php

   if(isset($_GET['submit'])){
    echo $_GET['email'];
   }
?>

<!DOCTYPE html>
<html>
    <?php include ('./template/header.php');?>
<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="GET" class="white">
        <label for="">Your Email:</label>
        <input type="text" name="email">
        <label for="">Pizza Title:</label>
        <input type="text" name="title">
        <label for="">Ingredients (comma separated):</label>
        <input type="text" name="ingredients">
     <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0"/>
     </div>
    </form>
</section>

    <?php include ('./template/footer.php');?>
</html>

