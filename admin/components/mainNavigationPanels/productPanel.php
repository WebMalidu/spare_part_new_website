<!-- section -->
<section class="alg-bg-darker alg-rounded-small my-2 d-flex h-100">
       <div class="p-2 col-3 flex-grow-1">
              <div class="px-2 algbg alg-rounded-small">
                     <button onclick="toggleProductSection('productView')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">VIEW</span><i class="bi bi-box d-block d-lg-none"></i></button>
                     <button onclick="toggleProductSection('productAdd')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">ADD</span><i class="bi bi-box d-block d-lg-none"></i></button>
              </div>
       </div>
       <div class="p-2 col-9 flex-grow-1 text-dark" id="productSectionsContainer">
              <div class="p-2 h-100 d-block alg-bg-light alg-rounded-small overflow-auto flex-grow-1">
                     👈 Please Select a section...
              </div>
              <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="productViewSection">

              </div>
              <div class="p-2  h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="productAddSection">
                     <div class="w-100">
                            <label class="form-label" for="productTitleInputField">Product Title</label>
                            <input type="text" id="productTitleInputField" class="form-control">
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productOrigin">Product Origin</label>
                            <select id="productOrigin" class="form-select">
                                   Something Went Wrong..!!
                            </select>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productQty">Product QTY</label>
                            <input type="number" id="productQty" class="form-control">
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productDescriptionInputField">Product Description</label>
                            <textarea type="text" id="productDescriptionInputField" class="form-control" rows="5"></textarea>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productPrice">Product Price</label>
                            <input type="number" id="productPrice" class="form-control"></input>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productBrand">Brand</label>
                            <select id="productBrand" class="form-select">
                                   Something Went Wrong..!!
                            </select>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productModelLine">Model Line</label>
                            <select id="productModelLine" class="form-select">
                                   Something Went Wrong..!!
                            </select>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productShippingPrice">Shipping Price</label>
                            <input type="number" id="productShippingPrice" class="form-control"></input>
                     </div>
                     <div class="w-100">
                            <button onclick="addProduct()" class="my-4 w-100 alg-btn-pill">Add Product</button>
                     </div>
              </div>
       </div>
</section>