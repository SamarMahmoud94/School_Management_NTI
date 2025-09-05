<?php
include_once "../Connect.php";

if (isset($_POST['user_name'])) {
    $objConnect = new Connect();
    if ($objConnect->isert($_POST, 'users')) {
        header('location:\school_managment_NTI\users\index.php?add=success');
        exit;
    } else {
        print "<div class='alert alert-danger'>no your user not added</div>";
    }
}
include_once "../header.php";
?>


<div class="row justify-content-center">
    <div class="justify-content-center col-6 bg-info">
        <h1 style="text-align: center;">Add User</h1>
    </div>
</div>
<div class="row mt-4">
    <div class="col-3"></div>
    <div class="col-6">
        <form method="POST" style="border-radius: 8px;padding: 20px;box-shadow: 0 3px 8px rgba(0,0,0,0.1);">
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="user_name" class="form-control" placeholder="add your user name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="add your email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="add your pass">
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
    <div class="col-3"></div>
</div>
<?php include_once "../footer.php";
