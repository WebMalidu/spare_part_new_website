<!-- section -->
<section class="alg-bg-darker alg-rounded-small my-2 d-flex h-100">
    <div class="p-2 col-3 flex-grow-1">
        <div class="px-2 algbg alg-rounded-small">
            <button onclick="togglePromotionSection('promotionView');" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">View Promotion</span><i class="bi bi-box d-block d-lg-none"></i></button>
            <button onclick="togglePromotionSection('promotionAdd')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Add Promotion</span><i class="bi bi-box d-block d-lg-none"></i></button>
        </div>
    </div>
    <div class="p-2 col-9 flex-grow-1 text-dark" id="productPromotionContainer">
        <div class="p-2 h-100 d-block alg-bg-light alg-rounded-small overflow-auto flex-grow-1">
            👈 Please Select a section...
        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="promotionViewSection">

        </div>
    </div>
</section>