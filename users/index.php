<?php
include_once "../Connect.php";
include_once "../header.php";
$conect = new Connect();

if (isset($_POST['id'])) {
    if (!isset($_SESSION['userName'])) {
        header('location:\school_managment_NTI\users\login.php');
        exit;
    }
    if ($conect->delete('users', $_POST['id'])) {
        header('location:\school_managment_NTI\users\index.php?delete=success');
        exit;
        // print "you delete record";
    }
}

$userData = $conect->select("users");

include_once "../header.php";
?>

<div class="row justify-content-center">
    <div class="col-8">
        <h1>welcom to users show</h1>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-8">
        <a class="btn btn-success" href="\school_managment_NTI\users\add.php">Add New User</a>
        <?php
        if (isset($_GET['add']) && $_GET['add'] == "success") {
            print "<div class='alert alert-success'> you add user success</div>";
        }
        if (isset($_GET['delete']) && $_GET['delete'] == "success") {
            print "<div class='alert alert-danger'> you delete user success</div>";
        }
        if (isset($_GET['edit']) && $_GET['edit'] == "success") {
            print "<div class='alert alert-info'> you update user success</div>";
        }
        ?>
        <table class="table mt-1">
            <thead class="btn-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($userData as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['user_name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('are you sure to delete user')">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="\school_managment_NTI\users\edit.php?id=<?= $value['id'] ?>">Edit</a>
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