<?php

//ternary operators

// $score = 50;

// $score > 40 ? 'high' : "low score";
if (isset($_POST['submit'])) {

    //cookies for ginder
    setcookie('ginder', $_POST['ginder'], time() + 86400);

    //session
    session_start();

    $_SESSION['name'] = $_POST['name'];

    header('location:index.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title> php tuts </title>
</head>

<body>
    <section class="container grey-text">
        <h2 class="gray-text"> Enter Your name</h2>
        <form class="white center" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="name">
            <select name="ginder">
                <option value="male"> male</option>
                <option value="female"> female </option>

            </select>
            <input type="submit" name="submit" value="submit">
        </form>
    </section>
</body>

</html>