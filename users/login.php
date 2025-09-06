<?php

include_once "../Connect.php";
include_once "../header.php";
$connect = new Connect;
if(isset($_POST['user_name']))
{
    $user = $connect->login($_POST['user_name'],$_POST['password']);
    if(count($user) > 0){
        $_SESSION['userName'] = $user['user_name'];
        $_SESSION['id'] = $user['id'];
        header('location:\school_managment_NTI\home.php');
        exit;
    }
    else{
        print "user not login";
    }
}
?>
<div class="row justify-content-center">
    <div class="col-6 mb-2">
        <h1>Login in Site</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-6 mt-2">
        
        
        <form action="" method="POST" class="form1">
            <div class="m-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name="user_name">
            </div>
            <div class="m-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="m-3">
            <button type="submit" class="btn btn-info">Login</button>
            </div>
        </form>
    </div>
</div>

<?php    

include_once "../footer.php";
