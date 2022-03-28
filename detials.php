<?php

include('./config/db_connect.php');

//check Get Requst Id Param
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM pizaa WHERE id = $id";
    //get the queru result
    $result = mysqli_query($conn, $sql);


    //fetch the in array format
    $pizza = mysqli_fetch_assoc($result);

    //free result from memory
    mysqli_free_result($result);

    //close connectiom
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<?php include('./tempate/header.php');  ?>

<div class="container center">
    <?php if ($pizza) : ?>
        <h4> Name :<?php echo htmlspecialchars($pizza['title']) ?> </h4>
        <p> created by:<?php echo htmlspecialchars($pizza['email']) ?></p>
        <span> created at: <?php echo date($pizza['created_at']); ?></span>
        <ul> ingridents:
            <?php foreach (explode(',', $pizza['ind']) as $ing) : ?>
                <!-- divide coponents -->
                <li> <?php echo htmlspecialchars($ing); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <h6 class="red-text"> No Such Pizaa Exist</h6>
    <?php endif ?>
</div>

<?php include('./tempate/footer.php');  ?>



</html>