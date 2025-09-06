<?php
include_once "../Connect.php";
$conct = new Connect();
$student = $conct->selectOne('users', $_GET['id']);
// print "<pre>";
// var_dump($student);
// exit;
if(isset($_POST['user_name'])){
    $conct->update($_POST,'users',$student['id']);
    header('location:\school_managment_NTI\users\index.php?edit=success');
    exit;
}
include_once "../header.php";
if(!isset($_SESSION['userName'])){
    header('location:\school_managment_NTI\users\login.php');
    exit;

}

?>

        <div class="row justify-content-center">
            <div class="col-6">
                <h1>page edit user <?php print  $student['user_name'] ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" class="form1">
                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" value="<?php print $student['user_name'] ?>" name='user_name' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="<?php print $student['email'] ?>" name='email' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">password</label>
                        <input type="number" value="<?php print $student['password'] ?>" name='password' class="form-control">
                    </div>

                    <button type="submit" class="btn btn-info">Edit</button>
                </form>
            </div>
        </div>
        <!-- close container -->
    <?php 
    include_once "../footer.php";