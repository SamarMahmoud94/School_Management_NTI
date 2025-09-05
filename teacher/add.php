<?php
include_once "../Connect.php";

if (isset($_POST['first_name'])) {
    $objConnect = new Connect();
    if ($objConnect->isert($_POST, 'teacher')) {
        header('location:\school_managment_NTI\teacher\index.php?add=success');
        exit;
    }
}
include_once "../header.php";
if (!isset($_SESSION['userName'])) {
    header('location:\school_managment_NTI\users\login.php');
    exit;
}
?>


<div class="row justify-content-center">
    <div class="justify-content-center col-6 bg-info mt-1">
        <h1 style="text-align: center;">Add teacher</h1>
    </div>
</div>
<?php
if (isset($_SESSION['userName'])) {
?>
    <div class="row mt-3">
        <div class="col-3"></div>
        <div class="col-6 mb-5">
            <form method="POST"style="border-radius: 8px;padding: 20px;box-shadow: 0 3px 8px rgba(0,0,0,0.1);">
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
                    <label class="form-label">Specialization</label>
                    <input type="text" name="specialization" class="form-control" placeholder="add your specialization">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hire_date</label>
                    <input type="text" name="hire_date" class="form-control" placeholder="add your hire_date">
                </div>
                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input type="number" name="salary" class="form-control" placeholder="add your salary">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="add your address">
                </div>
                <input type="hidden" name="user_id" value="<?php print $_SESSION['id'] ?>">
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
