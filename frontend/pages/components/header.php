     <header class="sticky-top">
          <nav class="batta-bg-prim header-b ma-img-overla m-header py-2 position-absolute">
               <div class="">
                    <div class="d-flex justify-content-between p-2">
                         <!-- Button trigger modal -->
                         <div class="mobile-toggler d-lg-none fs-2 ps-4 ">
                              <a href="#header" onclick="openHeaderModel();" data-bs-toggle="modal" data-bs-target="#navbModal" class="batta-font-lite">
                                   <i class="bi bi-border-width"></i>
                              </a>
                         </div>
                         <!-- logo -->
                         <div class="p-1 ps-2  ps-lg-5 pe-5 pe-lg-0">
                              <a href="index.php"> <img src="resources/image/battaLogoWhite.png" alt="logo" style="width:180px ;height: 20px;"></a>
                         </div>
                         <!-- navigation -->
                         <div class="d-lg-flex d-none gap-4 batta-font-lite">
                              <div class="p-1 fs-5 d-flex  gap-5 ps-2 pe-2 text-white fw-bold">
                                   <div class="header-link">
                                        <a class="nav-link" href="index.php">Home</a>
                                   </div>
                                   <div class="header-link">
                                        <a class="nav-link" href="./category.php">Category</a>
                                   </div>
                                   <div class="header-link">
                                        <a class="nav-link" href="contactUs.php">Contact Us</a>
                                   </div>
                                   <div class="header-link">
                                        <a class="nav-link">My Garage</a>
                                   </div>

                              </div>
                              <div class="header-link fs-5 d-flex justify-content-between gap-4 p-1 ps-4 pe-5 text-white">
                                   <a href="#watchlist" onclick="openWatchlistModel()"><i class="bi bi-heart-fill text-white"></i></a>
                                   <a href="#cart" onclick="openCartModel();"><i class="bi bi-cart-fill text-white"></i></a>
                                   <a href="#login" onclick="openLoginModel();"><i class="bi bi-person-circle text-white"></i></a>
                              </div>
                         </div>
                    </div>

               </div>
          </nav>

     </header>

     <!-- Modal -->
     <div class="modal fade" id="headerModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content header-bg">

                    <div class="modal-header d-flex justify-content-around gap-1 px-4">
                         <img src="resources/image/battaLogoWhite.png" class="img-fluid pe-5" alt="Logo">
                         <button type="button" class="btn-close bg-white px-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-white">

                         <div class="modal-line d-flex gap-3 align-items-center fw-bolder">
                              <i class="fa-solid fa-house"></i><a href="index.php" class="text-decoration-none">Home</a>
                         </div>

                         <div class="modal-line d-flex gap-3 align-items-center fw-bolder">
                              <i class="fa-solid fa-bell-concierge"></i><a href="category.php" class="text-decoration-none">Category</a>
                         </div>

                         <div class="modal-line d-flex gap-3 align-items-center fw-bolder">
                              <i class="fa-solid fa-file-lines"></i> <a href="contactUs.php" class="text-decoration-none">Contact Us</a>
                         </div>

                         <div class="modal-line d-flex gap-3 align-items-center fw-bolder">
                              <i class="fa-solid fa-circle-info"></i><a href="/about" class="text-decoration-none">My Garage</a>
                         </div>
                         <div class="modal-line d-flex gap-3 align-items-center fw-bolder">
                              <i class="bi bi-heart-fill text-white"></i><a href="#watchlist" class="text-decoration-none" onclick="openWatchlistModel();">Watchlist</a>
                         </div>
                         <div class="modal-line d-flex gap-3 align-items-center fw-bolder">
                              <i class="bi bi-cart-fill text-white"></i> <a href="#cart" class="text-decoration-none" onclick="openCartModel();">Cart</a>
                         </div>
                         <div class="modal-line d-flex gap-3 align-items-center fw-bolder">
                              <i class="bi bi-person-circle text-white"></i> <a href="#login" class="text-decoration-none" onclick="openLoginModel();">User Login</a>
                         </div>
                    </div>
               </div>
          </div>
     </div>


     <!-- cart -->
     <div class="modal fade modal-xl" id="cartModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


               <div class="modal-content">
                    <div class="modal-header alg-bg-light-blue">
                         <span class="modal-title alg-text-h2 alg-text-dark-blue fw-bold mx-3" id="staticBackdropLabel">My Cart</span>
                         <button type="button" class="border-0 alg-bg-light-blue" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill fs-2"></i></button>
                    </div>

                    <div class="modal-body alg-bg-light-blue">


                         <!-- empty cart -->

                         <!-- <div class="text-center alg-header-text alg-text-h2 mt-4 fw-bold">
                    <span>Select your favorite sweat .........</span>
                 </div> -->

                         <!-- empty cart -->

                         <div class="p-4">
                              <?php
                              for ($x = 0; $x < 5; $x++) {
                              ?>
                                   <div class="col-12 d-flex justify-content-center  align-items-center gap-5 pb-3">
                                        <div class="col-5 col-lg-2 d-flex flex-column flex-lg-row justify-content-center bg-white ct-div-size alg-shadow rounded-1">
                                             <img src="resources/image/home/engineImage.png" class="crt_itm_img img-fluid my-auto mx-auto" alt="item_img" />
                                             <div class="col-12 d-flex flex-row d-lg-none d-block justify-content-around gap-5 pt-3">
                                                  <div><input type="checkbox" /></div>
                                                  <div><i class="bi bi-trash-fill"></i></div>
                                             </div>
                                        </div>

                                        <div class="row col-6 col-lg-8 col-lg-9 bg-white ct-div-size alg-shadow rounded-1 d-flex justify-content-lg-between align-items-lg-center py-1">
                                             <div class="col-12 col-lg-3 d-flex flex-column alg-text-h3 gap-1 gap-lg-2">
                                                  <span class="fw-bold lh-1 alg-text-blue">Break Cable<br /><span class="fw-normal text-black">(Brand New)</span></span>
                                                  <span class="text-black-50">Brand : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;Honda</span></span>
                                                  <span class="text-black-50">Model : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;Civic</span></span>
                                                  <span class="text-black-50">Sold By : <span class="alg-text-blue"> &nbsp;&nbsp;Nimal Perera</span></< /span>
                                             </div>
                                             <div class="col-12 col-lg-4 d-flex gap-3 gap-lg-5 alg-text-h3 mt-3">
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
                                        <div class="d-flex justify-content-between mx-3 pb-1 pt-1">
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



     <!-- watchlist -->

     <!-- Modal -->
     <div class="modal fade modal-xl" id="watchlistModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


               <div class="modal-content">
                    <div class="modal-header alg-bg-light-blue">
                         <span class="modal-title alg-text-h2 alg-text-dark-blue fw-bold mx-3" id="staticBackdropLabel">My Watchlist</span>
                         <button type="button" class="border-0 alg-bg-light-blue" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill fs-2"></i></button>
                    </div>

                    <div class="modal-body alg-bg-light-blue">


                         <!-- empty cart -->

                         <!-- <div class="text-center alg-header-text alg-text-h2 mt-4 fw-bold">
                    <span>Select your favorite sweat .........</span>
                 </div> -->

                         <!-- empty cart -->

                         <div class="p-4">
                              <?php
                              for ($x = 0; $x < 5; $x++) {
                              ?>
                                   <div class="col-12 d-flex justify-content-center align-items-center gap-5 pb-3">
                                        <div class="col-5 col-lg-2 d-flex flex-column flex-lg-row justify-content-center bg-white ct-div-size alg-shadow rounded-1">
                                             <img src="resources/image/home/engineImage.png" class="crt_itm_img img-fluid my-auto mx-auto" alt="item_img" />
                                             <div class="col-12 d-flex flex-row d-lg-none d-block justify-content-around gap-5 pt-3">
                                                  <div><input type="checkbox" /></div>
                                                  <div><i class="bi bi-trash-fill"></i></div>
                                             </div>
                                        </div>

                                        <div class="row col-6 col-lg-8 col-lg-9 py-1 bg-white ct-div-size alg-shadow rounded-1 d-flex justify-content-lg-between align-items-lg-center">
                                             <div class="col-12 col-lg-3 d-flex flex-column alg-text-h3 gap-1 gap-lg-2">
                                                  <span class="fw-bold lh-1 alg-text-blue">Break Cable<br /><span class="fw-normal text-black">(Brand New)</span></span>
                                                  <span class="text-black-50">Brand : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;Honda</span></span>
                                                  <span class="text-black-50">Model : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;Civic</span></span>
                                                  <span class="text-black-50">Sold By : <span class="alg-text-blue"> &nbsp;&nbsp;Nimal Perera</span></< /span>
                                             </div>
                                             <div class="col-12 col-lg-4 d-flex gap-3 gap-lg-5 alg-text-h3 mt-3">
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

                         </div>
                    </div>
               </div>
          </div>
     </div>



     <!-- user login -->

     <!-- Modal -->
     <div class="modal fade modal-xl" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">


               <div class="modal-content">
                    <div class="modal-header alg-bg-light-blue">
                         <span class="modal-title alg-text-h2 alg-text-dark-blue fw-bold mx-3" id="staticBackdropLabel">User Login</span>
                         <button type="button" class="border-0 alg-bg-light-blue" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill fs-2"></i></button>
                    </div>

                    <div class="modal-body">

                         <div class="container">
                              <div class="row">
                                   <div class="col-12 ">
                                        <div class="d-flex justify-content-center align-items-center h-100 align-items-stretch py-5">
                                             <div class="col-md-4 col-lg-3  d-none d-md-block  alg-bg-light-blue alg-shadow py-4 rounded-3">
                                                  <div class="d-flex justify-content-center align-items-center">
                                                       <div class="col-9">
                                                            <img src="./resources/image/home/engineImage.png" class="img-fluid" />.
                                                            <div class="text-center"><span class="fw-semibold alg-text-dark-blue">Enter the best cat spare parts marketplace in Srilanka</span></div>
                                                            <p class="alg-text-h3 text-center mt-4 alg-text-dark-blue">With our advanced search functionality you can easily find any spare part for your car</p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-12 col-md-5 d-flex justify-content-center align-items-center bg-dange alg-shadow">
                                                  <!-- sign In section -->
                                                  <div class="col-8 d-flex flex-column gap-3 py-4 py-md-0" id="signInBox">
                                                       <h4 class="alg-text-dark-blue fw-bold">Sign In</h4>
                                                       <input type="email" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter email" />
                                                       <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter password">
                                                       <button class="button rounded-2 alg-text-h3"><a href="userProfile.php" class="text-decoration-none">Continue</a></button>
                                                       <div class="text-center"><span class="alg-cursor fw-semibold alg-text-dark-blue alg-text-h3" onclick="changeView();">Sign up with &nbsp;<span class="fw-bold"> ></span></span></div>
                                                  </div>
                                                  <!-- sign Up section -->
                                                  <div class="col-8 d-flex flex-column gap-3 d-none py-4 py-md-0" id="signUpBox">
                                                       <h4 class="alg-text-dark-blue fw-bold">Sign Up</h4>
                                                       <input type="email" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter email" />
                                                       <input type="text" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter Full Name" />
                                                       <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter password">
                                                       <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Confirm password">
                                                       <button class="button rounded-2 alg-text-h3">Register</button>
                                                       <div class="text-center"><span class="alg-cursor fw-semibold alg-text-dark-blue alg-text-h3" onclick="changeView();">Sign In with &nbsp;<span class="fw-bold"> ></span></span></div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                    </div>
               </div>
          </div>
     </div>