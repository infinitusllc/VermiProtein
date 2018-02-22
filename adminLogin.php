
<html>

<?php
    include_once 'includes/dbh.inc.php';
    session_start();
?>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        input {
            text-align: center;
            background-color: #ECF0F1;
            border: 2px solid transparent;
            border-radius: 3px;
            font-size: 16px;
            font-weight: 200;
            padding: 10px 0;
            width: 250px;
            transition: border .5s;
            margin-bottom:5px;
        }

        .button {
            background-color: #0a662a; /* Green */
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            width: 255px;
            margin: 0 auto;
            border-radius: 3px;
            font-weight: 600;
            margin-bottom:5px;
        }

        .sub{
            font-size: 125%;
            margin-top:20px;
        }
    </style>
</head>

<body>

<form id="inputs_form" action="includes/login.inc.php" method="post" style="position:absolute; left:40%; top:20%;">

    <h1 style="text-align:center; font-family:serif; color: #0a662a;">Login</h1>

    <input type="text" name="username" placeholder="username"/>
    </br>
    <input type="password" name="password" placeholder="password"/>
    </br>
    <button type="submit" class="button sub" name="submit"> Submit </button>
    </br>

</form>

</body>
</html>
