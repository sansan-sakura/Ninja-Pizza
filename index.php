<?php
$conn=mysqli_connect('localhost','san','test123','ninja pizza');

if(!$conn)
{
 echo 'Connection error'.mysqli_connect_error();
}

//query for all pizzas

$sql='SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
$result=mysqli_query($conn,$sql);
$pizzas=mysqli_fetch_all($result, MYSQLI_ASSOC);

//claen up
mysqli_free_result($result);
mysqli_close($conn);
print_r($pizzas);
?>

<!DOCTYPE html>
<html>
    <?php include ('./template/header.php');?>


    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza){?>
                <div class='col s6 md3'>
                    <div class="card z-depth-0">
                        <h6><?=htmlspecialchars($pizza['title'])?></h6>
                        <div><?=htmlspecialchars($pizza['ingredients'])?></div>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>

    <?php include ('./template/footer.php');?>
</html>