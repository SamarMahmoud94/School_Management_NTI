<?php
include_once "../Connect.php";
$conct = new Connect();
$class = $conct->selectOne('class_room', $_GET['id']);

if(isset($_POST['class_name'])){
    $conct->update($_POST,'class_room',$class['id']);
    header('location:\school_managment_NTI\class_room\index.php?edit=success');
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
                <h1>page edit student <?php print  $class['class_name'] ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 ">
                <form method="POST" class="form1">
                    <div class="mb-3">
                        <label class="form-label">Class Name</label>
                        <input type="text" value="<?php print $class['class_name'] ?>" name='class_name' class="form-control">
                        <div class="form-text">update your class name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" value="<?php print $class['location'] ?>" class="form-control" name='location'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capacity</label>
                        <input type="number" value="<?php print $class['capacity'] ?>" name='capacity' class="form-control">
                    </div>

                    <button type="submit" class="btn btn-info">Edit</button>
                </form>
            </div>
        </div>
        <!-- close container -->
    <?php 
    include_once "../footer.php";