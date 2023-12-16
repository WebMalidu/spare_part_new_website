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
<!-- section -->
<section class="alg-bg-darker alg-rounded-small my-2 d-flex h-100">
    <div class="p-2 col-3 flex-grow-1">
        <div class="px-2 algbg alg-rounded-small">
            <?php
                            if($userData['user_type_user_type_id']==2){

                            ?>
            <button onclick="togglePromotionSection('promotionView');" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">View Promotion</span><i class="bi bi-box d-block d-lg-none"></i></button>
                            <?php 
                            }else{
                            ?>
            <button onclick="togglePromotionSection('promotionViewSeller')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Add Promotion</span><i class="bi bi-box d-block d-lg-none"></i></button>

                            <?php }
                            ?> 
                            
                            <?php
                            if($userData['user_type_user_type_id']==2){

                            ?>
            <button onclick="togglePromotionSection('promotionAdd')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Add Promotion</span><i class="bi bi-box d-block d-lg-none"></i></button>
                            <?php 
                            }else{
                            ?>
            <button onclick="togglePromotionSection('promotionAddSeller')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Add Promotion</span><i class="bi bi-box d-block d-lg-none"></i></button>

                            <?php }
                            ?>
            

        </div>
    </div>
    <div class="p-2 col-9 flex-grow-1 text-dark" id="productPromotionContainer">
        <div class="p-2 h-100 d-block alg-bg-light alg-rounded-small overflow-auto flex-grow-1">

        </div>

      
  <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="promotionViewSection">
 

</div>
<div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="promotionViewSellerSection">
 

 </div>
 <?php
                            if($userData['user_type_user_type_id']==2){

                            ?>
 <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="promotionAddSection">
            <div class=" d-flex justify-content-between mt-3">
                <div>
                    <label class="form-label" for="productTitleInputField">Start date</label>
                    <input type="date" id="promoStartDate" class="form-control">
                </div>
                <div>
                    <label class="form-label" for="productTitleInputField">End Date</label>
                    <input type="date" id="promoEndDate" class="form-control w-100">
                </div>


            </div>
            <div class="w-100 ">
                <label class="form-label mt-3">Product Name</label>
                <select id="promotionTitle" class="form-select">
                    <!-- option goes here -->

                </select>
            </div>
            <div class="w-100">
                <div>
                    <label class="form-label mt-3"" for=" productTitleInputField">Discount Precentage</label>
                    <input type="number" id="promoPrecentage" class="form-control w-100 ">
                </div>
            </div>
            <div class="w-100 m-0 d-flex flex-column overflow-auto">
                <div class="w-100">
                    <label class="form-label mt-3" for="addProductImageInput">Add Product Image</label>
                    <input alt="Product Image Not Selected" onchange="previewProductListImages(event)" class="alg-rounded-mid form-control w-100" placeholder="Select a product image" type="file" accept="image" id="promotionImage">
                    <div class="my-2 p-1 rounded-1 product-items d-flex" id="productItemImagePreviewContainer"></div>
                </div>
            </div>
            <div class="w-100">
                <button onclick="promoAdd()" class="my-4 w-100 alg-btn-pill">Add Promotion</button>
            </div>
        </div>                            <?php 
                            }else{
                            ?>
<div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="promotionAddSellerSection">
 <div class=" d-flex justify-content-between mt-3">
                <div>
                    <label class="form-label" for="productTitleInputField">Start date</label>
                    <input type="date" id="promoStartDate" class="form-control">
                </div>
                <div>
                    <label class="form-label" for="productTitleInputField">End Date</label>
                    <input type="date" id="promoEndDate" class="form-control w-100">
                </div>


            </div>
            <div class="w-100 ">
                <label class="form-label mt-3">Product Name</label>
                <select id="promotionTitle" class="form-select">
                    <!-- option goes here -->

                </select>
            </div>
            <div class="w-100">
                <div>
                    <label class="form-label mt-3"" for=" productTitleInputField">Discount Precentage</label>
                    <input type="number" id="promoPrecentage" class="form-control w-100 ">
                </div>
            </div>
            <div class="w-100 m-0 d-flex flex-column overflow-auto">
                <div class="w-100">
                    <label class="form-label mt-3" for="addProductImageInput">Add Product Image</label>
                    <input alt="Product Image Not Selected" onchange="previewProductListImages(event)" class="alg-rounded-mid form-control w-100" placeholder="Select a product image" type="file" accept="image" id="promotionImage">
                    <div class="my-2 p-1 rounded-1 product-items d-flex" id="productItemImagePreviewContainer"></div>
                </div>
            </div>
            <div class="w-100">
                <button onclick="promoAdd()" class="my-4 w-100 alg-btn-pill">Add Promotion</button>
            </div>

 </div> 

                            <?php }
                            ?>
 


 



             
                   
 
      
       


    </div>
</section>