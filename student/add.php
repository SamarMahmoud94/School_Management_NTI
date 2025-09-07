<?php
include_once "../Connect.php";

if (isset($_POST['first_name'])) {
    $objConnect = new Connect();
    if ($objConnect->isert($_POST, 'student_info')) {

        setcookie("lastStudent", $_POST['first_name'], time() + (86400 * 7), '/');
        setcookie("lastStudentLastName", $_POST['last_name'], time() + (86400 * 7), '/');
        setcookie("lastStudentEmail", $_POST['email'], time() + (86400 * 7), '/');
        setcookie("lastStudentAge", $_POST['age'], time() + (86400 * 7), '/');

        header('location:\school_managment_NTI\student\index.php?add=success');
        exit;
    }
}
include_once "../header.php";
if(!isset($_SESSION['userName'])){
    header('location:\school_managment_NTI\users\login.php');
    exit;

}
?>


<div class="row justify-content-center">
    <div class="justify-content-center col-6">
        <h1>Add student</h1>
    </div>
</div>
<?php
if (isset($_SESSION['userName'])) {
?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" class="form1">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="add your fisrt name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="add your last name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="add your email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" class="form-control" placeholder="add your age">
                </div>
                <input type="hidden" name="user_id" value="<?php print $_SESSION['id']?>">
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
<?php } else {
    //print ("<div class='alert alert-danger'>ypu dont login<div>)
    header('location:\school_managment_NTI\users\login.php');
    exit;
} ?>
<?php include_once "../footer.php";
