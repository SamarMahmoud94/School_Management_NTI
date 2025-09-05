<?php
include_once "../Connect.php";
$conect = new Connect();

if (isset($_POST['id'])) {
    if ($conect->delete('student_info', $_POST['id'])) {
        header('location:\school_managment_NTI\student\index.php?delete=success');
        exit;
        // print "you delete record";
    }
}

$studentData = $conect->select("student_info");

include_once "../header.php";
if(!isset($_SESSION['userName'])){
    header('location:\school_managment_NTI\users\login.php');
    exit;

}
?>

        <div class="row justify-content-center">
            <div class="col-8 bg-info">
                <h1 style="text-align: center;">welcom to student show</h1>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <a class="btn btn-success" href="\school_managment_NTI\student\add.php">Add New Student</a>
                <?php
                if (isset($_GET['add']) && $_GET['add'] == "success") {
                    print "<div class='alert alert-success'> you add student success</div>";
                }
                if (isset($_GET['delete']) && $_GET['delete'] == "success") {
                    print "<div class='alert alert-danger'> you delete student success</div>";
                }
                if (isset($_GET['edit']) && $_GET['edit'] == "success") {
                    print "<div class='alert alert-info'> you update student success</div>";
                }
                ?>
                <table class="table table-bordered mt-1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Age</th>
                            <th scope="col">Add by</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $i = 1;
                        foreach ($studentData as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value['first_name'] ?></td>
                                <td><?= $value['last_name'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['age'] ?></td>
                                <td><?= @$conect->selectOne('users',$value['user_id'])['user_name'] ?></td>
                                <td>
                                    <form method="POST" onsubmit="return confirm('are you sure to delete student')">
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="\school_managment_NTI\student\edit.php?id=<?= $value['id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php
                            // $i++;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- container close -->
    <?php
    include_once '../footer.php'
    ?>