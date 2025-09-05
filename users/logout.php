<?php

session_start();

session_unset();

session_destroy();

header('location:\school_managment_NTI\home.php');
exit;