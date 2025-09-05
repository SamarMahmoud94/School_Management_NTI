<?php
include_once "./header.php";
?>
<div class="container"></div>
<div class="row justify-content-center mt-3">
    <div class="col-6 mb-2">
        <?php if (isset($_SESSION['userName'])) {
            print "<h1 style='text-align: center;border-radius: 8px;padding: 10px;box-shadow: 0 3px 8px rgba(0,0,0,0.1);'>welcome " . $_SESSION['userName'] . "</h1>";
        }
        ?>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-6" style="width: 800px; height:800px;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://static.vecteezy.com/system/resources/previews/015/529/452/original/100th-day-of-school-cartoon-colored-clipart-free-vector.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://static.vecteezy.com/system/resources/previews/004/641/880/original/illustration-of-high-school-building-school-building-free-vector.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="row justify-content-center mb-3">
    <div class="col-3">
        <div class="card" style="width: 18rem;border-radius: 8px;padding: 20px;box-shadow: 0 3px 8px rgba(0,0,0,0.1);">
            <img style="height:250px;" src="https://cdn5.vectorstock.com/i/1000x1000/04/64/cartoon-students-vector-25730464.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Students</h5>
                <p class="card-text">information about students.</p>
                <a href="student/index.php" class="btn btn-primary">Go table students</a>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card" style="width: 18rem;border-radius: 8px;padding: 20px;box-shadow: 0 3px 8px rgba(0,0,0,0.1);">
            <img style="height:250px;" src="https://img.freepik.com/premium-photo/teachers-character-cartoon-illustration-white-backround_1230721-200.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Teachers</h5>
                <p class="card-text">information about teachers.</p>
                <a href="teacher/index.php" class="btn btn-primary">Go table teachers</a>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card" style="width: 18rem;border-radius: 8px;padding: 20px;box-shadow: 0 3px 8px rgba(0,0,0,0.1);">
            <img style="height:230px;" src="https://static.vecteezy.com/system/resources/previews/000/568/517/original/vector-cartoon-illustration-of-school-classroom.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">class rooms</h5>
                <p class="card-text">information about class rooms.</p>
                <a href="class_room/index.php" class="btn btn-primary">Go table class room</a>
            </div>
        </div>
    </div>
</div>


<?php
include_once "./footer.php";
?>