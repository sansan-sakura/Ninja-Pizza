<?php
include('config/db_connect.php');
//query for all pizzas

$sql='SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
$result=mysqli_query($conn,$sql);
$pizzas=mysqli_fetch_all($result, MYSQLI_ASSOC);

//claen up
mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<?php include ('./template/header.php');?>
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza):?>
                <div class='col s6 md3'>
                    <div class="card z-depth-0">
                        <div class="card-content center">
                        <h6><?=htmlspecialchars($pizza['title'])?></h6>
                        <ul>
                            <?php foreach(explode(',',$pizza['ingredients']) as $ing) :?>
                                <li><?=htmlspecialchars($ing)?></li>
                                <?php endforeach;?>
                        </ul>
                    
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?=$pizza['id']?>" class="brand-text">more info</a>
                    </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>

<?php include ('./template/footer.php');?>
</html>