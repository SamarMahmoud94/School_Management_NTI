<?php
include_once "../Connect.php";

if (isset($_POST['class_name'])) {
    $objConnect = new Connect();
    if ($objConnect->isert($_POST,'class_room')) {
        header('location:\school_managment_NTI\class_room\index.php?add=success');
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
        <h1>Add Class Name</h1>
    </div>
</div>
<?php
if (isset($_SESSION['userName'])) {
?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" class="form1">
                <div>
                    <label class="form-label">Class Name</label>
                    <input type="text" name="class_name" class="form-control" placeholder="add your class name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="add your location">
                </div>
                <div class="mb-3">
                    <label class="form-label">Capacity</label>
                    <input type="number" name="capacity" class="form-control" placeholder="add your capacity">
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
