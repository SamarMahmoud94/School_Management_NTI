<?php
include_once "../Connect.php";
$conct = new Connect();
$teacher = $conct->selectOne('teacher', $_GET['id']);

if(isset($_POST['first_name'])){
    $conct->update($_POST,'teacher',$teacher['id']);
    header('location:\school_managment_NTI\teacher\index.php?edit=success');
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
                <h1>page edit teacher <?php print  $teacher['first_name'] ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" class="form1">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" value="<?php print $teacher['first_name'] ?>" name='first_name' class="form-control">
                        <div class="form-text">update your first name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" value="<?php print $teacher['last_name'] ?>" class="form-control" name='last_name'>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="<?php print $teacher['email'] ?>" name='email' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Specialization</label>
                        <input type="text" value="<?php print $teacher['specialization'] ?>" name='specialization' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hire_date</label>
                        <input type="text" value="<?php print $teacher['hire_date'] ?>" name='hire_date' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salary</label>
                        <input type="number" value="<?php print $teacher['salary'] ?>" name='salary' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" value="<?php print $teacher['address'] ?>" name='address' class="form-control">
                    </div>

                    <button type="submit" class="btn btn-info">Edit</button>
                </form>
            </div>
        </div>
        <!-- close container -->
    <?php 
    include_once "../footer.php";