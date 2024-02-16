<?php

   include('config/db_connect.php');

   $errors=array('email'=>'','title'=>'','ingredients'=>'');
   $email=   $title=   $ingredients="";
  

   if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $errors['email']= 'An email is required <br/>';
        }else{
            $email=($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
           $errors['email']= "email must be a valid address";
        }
    }

    if(empty($_POST['title'])){
        $errors['title']='A title is required <br/>';
    }else{
        $title=$_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title))
        {
            $errors['title']=  "Title must be letters and spaces only";
        }
    }

    if(empty($_POST['ingredients'])){
        $errors['ingredients']=  'A title is required <br/>';
    }else{
         $ingredients=$_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$_POST['ingredients']))
        {
            $errors['ingredients']= "Ingtredients must be a comma separeted list";
        }
    }

    if(array_filter($errors)){
        echo 'errors in the form';

    } else {
   
  
    // } else {

        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $title=mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients=mysqli_real_escape_string($conn, $_POST['ingredients']);
        
        $sql="INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients')";

        if(mysqli_query($conn,$sql)){
       
            header('Location:index.php');
        }else {
            echo "query error".mysqli_error($conn);
        }
       
    }
   }
?>

<!DOCTYPE html>
<html>
    <?php include ('./template/header.php');?>
<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label for="">Your Email:</label>
        <input type="text" name="email" value='<?=htmlspecialchars($email)?>'>
        <div class="red-text"><?=$errors['email']?></div>
        <label for="">Pizza Title:</label>
        <input type="text" name="title" value='<?=htmlspecialchars($title)?>'>
        <div class="red-text"><?=$errors['title']?></div>
        <label for="">Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value='<?=htmlspecialchars($ingredients)?>'>
        <div class="red-text"><?=$errors['ingredients']?></div>
     <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0"/>
     </div>
    </form>
</section>

    <?php include ('./template/footer.php');?>
</html>

