<!-- section -->
<section class="alg-bg-darker alg-rounded-small my-2 d-flex h-100">
       <div class="p-2 col-3 flex-grow-1">
              <div class="px-2 algbg alg-rounded-small">
                     <button onclick="toggleProductSection('catalogView')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">CATALOG</span><i class="bi bi-box d-block d-lg-none"></i></button>
                     <button onclick="toggleProductSection('productView')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">VIEW</span><i class="bi bi-box d-block d-lg-none"></i></button>
                     <button onclick="toggleProductSection('productAdd')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">ADD</span><i class="bi bi-box d-block d-lg-none"></i></button>
              </div>
       </div>
       <div class="p-2 col-9 flex-grow-1 text-dark" id="productSectionsContainer">
              <div class="p-2 h-100 d-block alg-bg-light alg-rounded-small overflow-auto flex-grow-1">
                     👈 Please Select a section...
              </div>
              <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="catalogViewSection">
                     <div class="d-flex flex-column p-2">
                            <div class="d-flex flex-row gap-2">
                                   <select class="form-select" id="categorySelector">
                                          <option>Select Category</option>
                                   </select>

                                   <input type="text" class="form-control" placeholder="Enter new catalog (category item)" />
                            </div>
                            <button class="my-4 w-100 alg-btn-pill" onclick="addCatalog(event);">Add Catalog</button>
                     </div>

                     <div class="p-2 h-100  alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="productCatalogTable">
                            <!-- table goes here -->
                     </div>
              </div>
              <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="productViewSection">
                     <!-- table goes here -->
              </div>
              <div class="p-2  h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="productAddSection">
                     <div class="w-100">
                            <label class="form-label" for="productTitleInputField">Product Title</label>
                            <input type="text" id="productTitleInputField" class="form-control">
                     </div>
                     <div class="w-100">
                            <label class="form-label">Product Origin</label>
                            <select id="sectionOrigin" class="form-select">
                                   <!-- option goes here -->
                            </select>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productQty">Product QTY</label>
                            <input type="number" id="productQty" class="form-control" min="1">
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productDescriptionInputField">Product Description</label>
                            <textarea type="text" id="productDescriptionInputField" class="form-control" rows="5"></textarea>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productPrice">Product Price</label>
                            <input type="text" id="productPrice" class="form-control"></input>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productBrand">Brand</label>
                            <select id="productBrand" class="form-select">
                                   <!-- option goes here -->
                            </select>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productCategoryItem">Category Item</label>
                            <select id="productCategoryItem" class="form-select">
                                   <!-- option goes here -->
                            </select>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productModelLine">Model Line</label>
                            <select id="productModelLine" class="form-select">
                                   <!-- option goes here -->
                            </select>
                     </div>
                     <div class="w-100">
                            <label class="form-label" for="productShippingPrice">Shipping Price</label>
                            <input type="text" id="productShippingPrice" class="form-control"></input>
                     </div>
                     <div class="w-100 m-0 d-flex flex-column overflow-auto">
                            <div class="w-100">
                                   <label class="form-label" for="addProductImageInput">Add Product Image</label>
                                   <input alt="Product Image Not Selected" onchange="previewProductListImages(event)" class="alg-rounded-mid form-control w-100" placeholder="Select a product image" type="file" accept="image" multiple id="productItemImageInput">
                                   <div class="my-2 p-1 rounded-1 product-items d-flex" id="productItemImagePreviewContainer"></div>
                            </div>
                     </div>
                     <div class="w-100">
                            <button onclick="addProduct(event)" class="my-4 w-100 alg-btn-pill">Add Product</button>
                     </div>
              </div>
       </div>
</section>