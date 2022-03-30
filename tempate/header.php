<?php
session_start();
$name = $_SESSION['name'];

//cookies

$ginder = $_COOKIE['ginder'] ;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Project</title>
    <style type="text/css">
        .brand {
            background: #cbb09c !important;
        }

        .brand-text {
            color: #cbb09c !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">
                Logo
            </a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text"> Hellow <?php echo htmlspecialchars($name);  ?> </li>
                <li class="grey-text"> (<?php echo htmlspecialchars($ginder); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0"> Add Categories</a> </li>

            </ul>
        </div>
    </nav>