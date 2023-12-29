<!-- section -->

<?php
// access validator
require_once(__DIR__ . "../../../../backend/model/SessionManager.php");


$sessionManager = new SessionManager("alg006_admin");
if (!$sessionManager->isLoggedIn()) {
       header("Location: index.php");
}
else{
      $userData=$sessionManager->getUserData();
}
?>

<section class="alg-bg-darker alg-rounded-small my-2 d-flex h-100">
    <div class="p-2 col-3 flex-grow-1">
        <div class="px-2 algbg alg-rounded-small">




        <?php
                            if($userData['user_type_user_type_id']==2){

                            ?>
            <button onclick="toggleOrderSection('orderView');" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">View Orders
                            <?php 
                            }else{
                            ?>
            <button onclick="toggleOrderSection('orderViewSeller');" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">View Your Orders

                            <?php }
                            ?>


                
            </span><i class="bi bi-box d-block d-lg-none"></i></button>
        </div>
    </div>
    <div class="p-2 col-9 flex-grow-1 text-dark" id="orderContainer">
        <div class="p-2 h-100 d-block alg-bg-light alg-rounded-small overflow-auto flex-grow-1">
        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="orderViewSection">

        </div>

        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="orderViewSellerSection">

</div>
       

    </div>
</section>