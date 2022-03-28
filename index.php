<?php
 
 include('./config/db_connect.php');

//write query
$sql = 'SELECT title,ind ,id  FROM pizaa ORDER BY created_at';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the reuslt
$pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connectiom
mysqli_close($conn);

//divide component
// explode(',' , $pizza[]['ind']);

?>


<!DOCTYPE html>
<html lang="en">

<?php include('./tempate/header.php');  ?>
<h4 class="center grey-text"> Pizzas</h4>
<div class="container">
    <div class="row">
        <?php foreach ($pizza as $x) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h4> <?php echo htmlspecialchars($x['title']); ?> </h4>
                        <ul>
                            <?php foreach (explode(',', $x['ind']) as $ing) : ?> <!-- divide coponents --> 
                                <li> <?php echo htmlspecialchars($ing) ; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="detials.php?id=<?php echo $x['id'] ?>" class="brand-text"> More Info</a>
                    </div>
                </div>
            </div>
        <?php  endforeach; ?>
    </div>
</div>
<?php include('./tempate/footer.php');  ?>



</html>