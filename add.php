<?php

include('./config/db_connect.php');



$email = $title = $ingredients = "";
//errors messages
$errors = array('email' => '', 'title' => '', 'ingredients' => '',);

if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        $errors['email'] = '  Error! This Email Must Be Required <br/>'; //req email
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // validate email
            $errors['email'] = 'Error! This Email Must Be Valid Email Adress '; //email error mesaage
        }
    }
    if (empty($_POST['title'])) {
        $errors['title'] =  ' A title is required  <br/>';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] =  'Title must be letters and spaces only';
        }
    }
    // check ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'At least one ingredient is required';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
    }

    if (array_filter($errors)) {
    } else {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ind = mysqli_real_escape_string($conn, $_POST['ingredients']);

        //create sql
        $sql = "INSERT INTO pizaa(email,title,ind) VALUES( '$email' ,'$title', '$ind')";

        //save db and check
        if (mysqli_query($conn, $sql)) {
            //success
            header('location: index.php'); //to redirect page

        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include('./tempate/header.php');  ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="add.php" method="POST">
        <label>Your Email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"> <?php echo $errors['email']; ?></div>
        <label>Pizza Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"> <?php echo $errors['title']; ?></div>
        <label>Ingredients (comma separated)</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('./tempate/footer.php');  ?>



</html>