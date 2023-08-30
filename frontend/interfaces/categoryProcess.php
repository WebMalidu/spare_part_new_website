<?php

$id = $_GET["id"];
$y = $_GET["x"];


if ($id > 5) {

    // $x = $x + 1;
    $newRow = $id - 5 * $y;


    if ($newRow > 5) {

        $newRow = 5;
    } else {
        $newRow = $id - 5;
        $y = 1;
    }
    if ($newRow >= 5) {
        for ($x = 0; $x < 5 + ($newRow * $y); $x++) {
?>
            <div class="col-5 col-md-3 col-lg-2 alg-bg-category mb-3 rounded mt-3">

                <div class="d-flex flex-column align-items-center">
                    <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-3">
                    <span class="mt-1 p-3 fw-bold text-white">Air Condition</span>
                </div>
            </div>
        <?php
        }
    } else {
        for ($x = 0; $x < 5 + ($newRow * $y); $x++) {
        ?>
            <div class="col-5 col-md-3 col-lg-2 alg-bg-category mb-3 rounded mt-3">

                <div class="d-flex flex-column align-items-center">
                    <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-3">
                    <span class="mt-1 p-3 fw-bold text-white">Air Condition</span>
                </div>
            </div>
        <?php
        }
    }
} else {
    for ($x = 0; $x < $id; $x++) {
        ?>
        <div class="col-5 col-md-3 col-lg-2 alg-bg-category mb-3 rounded mt-3">

            <div class="d-flex flex-column align-items-center">
                <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-3">
                <span class="mt-1 p-3 fw-bold text-white">Air Condition</span>
            </div>
        </div>
<?php
    }
}
