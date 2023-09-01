<section class="py-5">
    <div class="container">
        <h3 class=" alg-text-blue mt-3 mb-4 fs-2 fw-bold">Search By Category</h3>
        <div class="row d-flex ">
            <div class="col-12 d-flex justi align-content-cente flex-wrap gap-5 gap-lg-4" id="category">

                <?php
                $num_row = 12;

                if ($num_row >= 5) {
                    for ($x = 0; $x < 4; $x++) {
                ?>
                        <div class="col-5 col-md-3 col-lg-2 alg-bg-category mb-3 rounded mt-3 mx-4">

                            <div class="d-flex flex-column align-items-center">
                                <img src="resources/image/car.jpg" alt="" class="alg-category-img mt-4 mb-3">
                                <span class="mt-1 p-3 fw-bold text-white">Air Condition</span>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    for ($x = 0; $x < $num_row; $x++) {
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

                ?>

            </div>

            <div class="d-flex justify-content-center mt-5 p-3">
                <button class="btn btn-outline-primary fw-semibold" onclick='increaseCategory(<?php echo $num_row ?>)'>Load More</button>
            </div>

        </div>
    </div>
</section>