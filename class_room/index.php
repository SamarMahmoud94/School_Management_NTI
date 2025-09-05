<?php
include_once "../Connect.php";
$conect = new Connect();

if (isset($_POST['id'])) {
    if ($conect->delete('class_room', $_POST['id'])) {
        header('location:\school_managment_NTI\class_room\index.php?delete=success');
        exit;
        // print "you delete record";
    }
}

$classtData = $conect->select("class_room");

include_once "../header.php";
if (!isset($_SESSION['userName'])) {
    header('location:\school_managment_NTI\users\login.php');
    exit;
}
?>

<div class="row justify-content-center">
    <div class="col-8 bg-info">
        <h1 style="text-align: center;">welcom to class room show</h1>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-8">
        <a class="btn btn-success" href="\school_managment_NTI\class_room\add.php">Add New class room</a>
        <?php
        if (isset($_GET['add']) && $_GET['add'] == "success") {
            print "<div class='alert alert-success'> you add class room success</div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "success") {
            print "<div class='alert alert-danger'> you delete class room success</div>";
        }
        if (isset($_GET['edit']) && $_GET['edit'] == "success") {
            print "<div class='alert alert-info'> you update class room success</div>";
        }
        ?>
        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">capacity</th>
                    <th scope="col">location</th>
                    <th scope="col">Add by</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>

                </tr>
            </thead>
            <tbody>
                <?php
                // $i = 1;
                foreach ($classtData as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['class_name'] ?></td>
                        <td><?= $value['capacity'] ?></td>
                        <td><?= $value['location'] ?></td>
                        <td><?= @$conect->selectOne('users', $value['user_id'])['user_name'] ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('are you sure to delete class room')">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="\school_managment_NTI\class_room\edit.php?id=<?= $value['id'] ?>">Edit</a>
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