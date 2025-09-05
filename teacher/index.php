<?php
include_once "../Connect.php";
$conect = new Connect();

if (isset($_POST['id'])) {
    if ($conect->delete('teacher', $_POST['id'])) {
        header('location:\school_managment_NTI\teacher\index.php?delete=success');
        exit;
        // print "you delete record";
    }
}

$teacherData = $conect->select("teacher");

include_once "../header.php";
if(!isset($_SESSION['userName'])){
    header('location:\school_managment_NTI\users\login.php');
    exit;

}
?>

        <div class="row justify-content-center">
            <div class="col-9 bg-info">
                <h1 style="text-align: center;">welcom to teacher show</h1>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-9">
                <a class="btn btn-success" href="\school_managment_NTI\teacher\add.php">Add New teacher</a>
                <?php
                if (isset($_GET['add']) && $_GET['add'] == "success") {
                    print "<div class='alert alert-success'> you add teacher success</div>";
                }
                if (isset($_GET['delete']) && $_GET['delete'] == "success") {
                    print "<div class='alert alert-danger'> you delete teacher success</div>";
                }
                if (isset($_GET['edit']) && $_GET['edit'] == "success") {
                    print "<div class='alert alert-info'> you update teacher success</div>";
                }
                ?>
                <table class="table table-bordered mt-1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Hire_date</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Address</th>
                            <th scope="col">Add by</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $i = 1;
                        foreach ($teacherData as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value['first_name'] ?></td>
                                <td><?= $value['last_name'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['specialization'] ?></td>
                                <td><?= $value['hire_date'] ?></td>
                                <td><?= $value['salary'] ?></td>
                                <td><?= $value['address'] ?></td>
                                <td><?= @$conect->selectOne('users',$value['user_id'])['user_name'] ?></td>
                                <td>
                                    <form method="POST" onsubmit="return confirm('are you sure to delete teacher')">
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="\school_managment_NTI\teacher\edit.php?id=<?= $value['id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- container close -->
    <?php
    include_once '../footer.php'
    ?>