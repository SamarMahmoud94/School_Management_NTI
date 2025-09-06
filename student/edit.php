<?php
include_once "../Connect.php";
$conct = new Connect();
$student = $conct->selectOne('student_info', $_GET['id']);

if(isset($_POST['first_name'])){
    $conct->update($_POST,'student_info',$student['id']);
    header('location:\school_managment_NTI\student\index.php?edit=success');
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
                <h1>page edit student <?php print  $student['first_name'] ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" class="form1">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" value="<?php print $student['first_name'] ?>" name='first_name' class="form-control">
                        <div class="form-text">update your first name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" value="<?php print $student['last_name'] ?>" class="form-control" name='last_name'>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="<?php print $student['email'] ?>" name='email' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">age</label>
                        <input type="number" value="<?php print $student['age'] ?>" name='age' class="form-control">
                    </div>

                    <button type="submit" class="btn btn-info">Edit</button>
                </form>
            </div>
        </div>
        <!-- close container -->
    <?php 
    include_once "../footer.php";