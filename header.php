<?php
session_start();
?>
<!--header start-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/school_managment_NTI/assets/style/bootstrap.min.css">
    <link rel="stylesheet" href="/school_managment_NTI/assets/style/style.css">
    <!-- <link rel="stylesheet" href="/assets/style/style.css"> -->
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/school_managment_NTI"><?php print isset($_SESSION['userName'])?$_SESSION['userName']:"School Management" ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/school_managment_NTI">Home</a>
                        </li>
                        <?php
                        if (isset($_SESSION['userName'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/school_managment_NTI/student">student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/school_managment_NTI/teacher">teacher</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/school_managment_NTI/class_room">class room</a>
                            </li>

                        <?php }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/school_managment_NTI/users">user</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Auth
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if (!isset($_SESSION['userName'])) { ?>
                                    <li><a class="dropdown-item" href="/school_managment_NTI/users/login.php">Login</a></li>
                                    <li><a class="dropdown-item" href="/school_managment_NTI/users/add.php">Register</a></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item" href="/school_managment_NTI/users/logout.php">logout</a></li>
                                    <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--header end-->