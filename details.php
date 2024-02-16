<?php
include ('config/db_connect.php');
//check get req
if(isset($_GET['id'])){
   $id=mysqli_real_escape_string($conn, $_GET['id']);
   $sql="SELECT * FROM pizzas WHERE id='$id'";

   $result=mysqli_query($conn, $sql);

   $pizza=mysqli_fetch_assoc($result);

   mysqli_free_result($result);
   mysqli_close($conn);



}
?>

<!DOCTYPE html>
<html lang="en">
<?php include ('./template/header.php');?>
<div class="container center">
    <?php if($pizza):?>
        <h4><?=htmlspecialchars($pizza['title'])?></h4>
        <p>Created by : <?=htmlspecialchars($pizza['email'])?></p>
        <p><?=date($pizza['created_at'])?></p>
        <h5>Ingredients: </h5>
        <p><?=htmlspecialchars($pizza['ingredients'])?></p>
        <form>
            <input type='hidden' name="id_to_delete" value="<?=$pizza['id']?>"/> 
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0"/>
        </form>
        <?php else: ?>
            <p>No such pizza exists!</p>
        <?php endif;?>
</div>
<?php include ('./template/footer.php');?>
</html>