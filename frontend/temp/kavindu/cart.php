<!-- Modal -->
<div class="modal fade modal-xl" id="cardModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


        <div class="modal-content alg-bg-light" >
            <div class="modal-header alg-bg-dark">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">WATCHLIST</h1>
                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"> <i class="bx bx-x fs-5 fw-bold"></i></button>
            </div>

<div class="modal-body">
    

    <!-- empty watchlist -->

    <!-- <div class="text-center alg-header-text alg-text-h2 mt-4 fw-bold">
                    <span>Select your favorite sweat .........</span>
                 </div> -->

    <!-- empty watchlsit -->

    <div class="alg-bg-light-blue p-4">
        <?php
        for ($x = 0; $x < 5; $x++) {
        ?>
            <div class="col-12 d-flex justify-content-center align-items-center gap-5 pt-3 pb-3">
                <div class="col-5 col-lg-2 d-flex flex-column flex-lg-row justify-content-center bg-white ct-div-size alg-shadow rounded-1">
                    <img src="resources/image/home/engineImage.png" class="crt_itm_img img-fluid mt-lg-4 mx-auto" alt="item_img" />
                    <div class="col-12 d-flex flex-row d-lg-none d-block justify-content-around gap-5 pt-3">
                            <div><input type="checkbox" /></div>
                            <div><i class="bi bi-trash-fill"></i></div>
                        </div>
                </div>
                
                    <div class="row col-6 col-lg-9 col-lg-9 bg-white ct-div-size alg-shadow rounded-1 d-flex justify-content-lg-between align-items-lg-center py-4">
                        <div class="col-12 col-lg-3 d-flex flex-column alg-text-h3 gap-1 gap-lg-2">
                            <span class="fw-bold lh-1 alg-text-blue">Break Cable<br /><span class="fw-normal text-black">(Brand New)</span></span>
                            <span class="text-black-50">Brand : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;Honda</span></span>
                            <span class="text-black-50">Model : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;Civic</span></span>
                            <span class="text-black-50">Sold By : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;Nimal Perera</span></< /span>
                        </div>
                        <div class="col-12 col-lg-3 d-flex gap-3 gap-lg-5 alg-text-h3 mt-3">
                            <div>
                                <span class="fw-bold">LKR 1800.00</span><br />
                                <span class="alg-bg-dark-blue p-1 rounded-1 text-white alg-text-h3">-20%</span>
                            </div>
                            <div>
                                <span class="text-decoration-line-through">LKR 2599.00</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-1 d-flex flex-row d-none d-lg-block flex-lg-column  justify-content-lg-between gap-lg-5">
                            <div class="pb-4"><input type="checkbox" /></div>
                            <div class="pt-5"><i class="bi bi-trash-fill"></i></div>
                        </div>
                    </div>
                
            </div>
        <?php
        }
        ?>

        <div class="d-flex justify-content-end col-12 mt-4">
            <div class="col-12 col-md-5 col-lg-3 text-center bg-white alg-text-h3 pt-1 pb-3 rounded-1 alg-shadow">
                <span class="fw-bold">Order Summery</span>
                <div class="d-flex justify-content-between mx-3 pb-1">
                    <span>Sub Total(5)</span>
                    <span class="fw-bold">LKR 65000.00</span>
                </div>
                <div class="d-flex justify-content-between border-bottom border-2 pb-1 mx-3">
                    <span>Shipping Price</span>
                    <span class="fw-bold">LKR 360.00</span>
                </div>
                <div class="d-flex justify-content-between mx-3">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold">LKR 65360.00</span>
                </div>
                <div class="d-grid mx-4 mt-3">
                <button class="alg-bg-green border-0 rounded-1 text-white fw-bolder">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>






</div>
</div>


    </div>
</div>