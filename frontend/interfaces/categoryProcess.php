<?php

$id = $_GET["id"];
$y = $_GET["x"];


if ($id > 4) {

    $newRow = $id - 4 * $y;

    if ($newRow > 4) {

        $newRow = 4;
    } else {
        $newRow = $id - 4;
        $y = 1;
    }
    if ($newRow >= 4) {
        for ($x = 0; $x < 4 + ($newRow * $y); $x++) {
?>
            <div class="col-6 col-md-4 col-lg-2 alg-bg-category mb-3 rounded mt-3 mx-4 px-3 card">

                <div class="d-flex flex-column align-items-center">
                    <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                    <span class="mt-1 p-3 fw-bold text-white pb-5 alg-text-h3">Air Condition</span>
                </div>
            </div>
        <?php
        }
    } else {
        for ($x = 0; $x < 4 + ($newRow * $y); $x++) {
        ?>
            <div class="col-6 col-md-4 col-lg-2 alg-bg-category mb-3 rounded mt-3 mx-4 px-3">

                <div class="d-flex flex-column align-items-center">
                    <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-4 img-fluid">
                    <span class="mt-1 p-3 fw-bold text-white pb-5 alg-text-h3">Air Condition</span>
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
