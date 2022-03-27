<?php 
//connect to database
$conn = mysqli_connect('localhost', 'awab', '123456789', 'project');
//check connection
if (!$conn) {
    echo 'Connectiom error : ' . mysqli_connect_errno();
}
?>