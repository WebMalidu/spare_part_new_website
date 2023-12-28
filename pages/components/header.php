<?php
require_once("./backend/model/SessionManager.php");

$loggedUserData = null;
$access = new SessionManager();
if ($access->isLoggedIn()) {
     $loggedUserData = $access->getUserData();
}

?>
<header class="sticky-top top-0">

     <nav class="batta-bg-prim header-b m-header py-2">
          <div class="d-flex justify-content-between p-2 ">
               <!-- Button trigger modal -->
               <div class="mobile-toggler d-lg-none fs-2 ps-4 ">
                    <a href="#header" onclick="openHeaderModel();" data-bs-toggle="modal" data-bs-target="#navbModal" class="batta-font-lite">
                         <!-- <i class="bi bi-border-width"></i> -->
                         <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
                    </a>
               </div>
               <!-- logo -->
               <div class="p-1 ps-2  ps-lg-5 pe-5 pe-lg-0">
                    <a href="index.php"> <img src="resources/image/battaLogoWhite.png" alt="logo" style="width:180px ;height: 20px;"></a>
               </div>
               <!-- navigation -->
               <div class="d-lg-flex d-none gap-4 batta-font-lite">
                    <div class="hp-box p-1 fs-5 d-flex ps-2 pe-2 text-white fw-bold">
                         <div class="header-link">
                              <a class="nav-link alg-button-header-hover" href="index.php">Home</a>
                         </div>
                         <div class="header-link ">
                              <a class="nav-link alg-button-header-hover" href="garage.php">My Garage</a>
                         </div>
                         <div class="header-link ">
                              <a class="nav-link alg-button-header-hover" href="multvendoRegister.php">Become a Seller</a>
                         </div>


                    </div>
                    <div class="header-link fs-5 d-flex justify-content-between gap-4 p-1 ps-4 pe-5 text-white">
                         <a class="nav-link alg-button-header-hover" href="contactUs.php"><i class="fa-solid fa-address-book text-white"></i></a>
                         <a href="#cart" class="alg-button-header-hover" onclick="openCartModel();"><i class="bi bi-cart-fill text-white"></i></a>
                         <a href="#watchlist" class="alg-button-header-hover" onclick="openWatchlistModel()"><i class="bi bi-heart-fill text-white"></i></a>






                         <?php
                         if (isset($loggedUserData) && isset($loggedUserData["email"])) {
                         ?>
                              <i class="bi bi-box-arrow-right text-white" onclick="logOut()" style="cursor: pointer;"></i>
                         <?php
                         } else {
                         ?>
                              <a href="#login" class="alg-button-header-hover" onclick="openLoginModel();"><i class="bi bi-person-circle text-white"></i></a>
                         <?php
                         }
                         ?>









                    </div>
               </div>
          </div>
     </nav>



</header>

<!-- Modal -->
<div class="modal fade" id="headerModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content header-b">

               <div class="modal-header d-flex justify-content-around gap-1 px-4">
                    <img src="resources/image/battaLogo.png" class="nav-model-logo pe-5" alt="Logo">
                    <button type="button" class="btn-close bg-white px-3" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>

               <div class="modal-body">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="fa-solid fa-house"></i> -->
                         <a href="index.php" class=" nav-model-heading text-decoration-none alg-text-dark-blue">Home</a>
                    </div>
                    <hr style="color: black;">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="fa-solid fa-bell-concierge"></i> -->
                         <a href="category.php" class=" nav-model-heading text-decoration-none alg-text-dark-blue">Category</a>
                    </div>
                    <hr style="color: black;">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="fa-solid fa-file-lines"></i> -->
                         <a href="contactUs.php" class=" nav-model-heading text-decoration-none alg-text-dark-blue">Contact Us</a>
                    </div>
                    <hr style="color: black;">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="fa-solid fa-circle-info"></i> -->
                         <a href="garage.php" class=" nav-model-heading text-decoration-none alg-text-dark-blue">My Garage</a>
                    </div>
                    <hr style="color: black;">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="fa-solid fa-circle-info"></i> -->
                         <a href="multvendoRegister.php" class=" nav-model-heading text-decoration-none alg-text-dark-blue">Are You Seller</a>
                    </div>
                    <hr style="color: black;">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="bi bi-heart-fill text-white"></i> -->
                         <a href="#watchlist" class=" nav-model-heading text-decoration-none alg-text-dark-blue" onclick="openWatchlistModel();">Watchlist</a>
                    </div>
                    <hr style="color: black;">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="bi bi-cart-fill text-white"></i>  -->
                         <a href="#cart" class=" nav-model-heading text-decoration-none alg-text-dark-blue" onclick="openCartModel();">Cart</a>
                    </div>
                    <hr style="color: black;">

                    <div class="modal-line d-flex gap-3 align-items-center">
                         <!-- <i class="bi bi-person-circle text-white"></i>  -->
                         <a href="#login" class=" nav-model-heading text-decoration-none alg-text-dark-blue" onclick="openLoginModel();">User Login</a>
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

                    <div class="p-4" id="cartContainer">



                    </div>

                    <div class="cart-shipping-main d-flex flex-column flex-lg-row justify-content-between p-lg-3  col-12 mt-4 gap-3">
                         <div class="d-flex flex-column col-12  col-lg-8 gap-2 align-items-md-center">
                              <div class="alg-text-h2 alg-text-blue alg-bold text-center">Shipping Details</div>
                              <div class="w-100 d-flex d-flex justify-content-center">
                                   <input class="W-100 cart-shipping-lg-input alg-rounded-small  border-primary" type="text" id="usernameInput" placeholder="username">
                              </div>
                              <div class="w-100 d-flex gap-3 justify-content-center">
                                   <input class="cart-shipping-sm-input alg-rounded-small  border-primary" type="text" placeholder="phone number" id="phoneNumberInput">
                                   <input class="cart-shipping-sm-input alg-rounded-small  border-primary" type="text" placeholder="postal code" id="postalCodeInput">
                              </div>
                              <div class="w-100 d-fle d-flex justify-content-center">
                                   <input class="cart-shipping-lg-input alg-rounded-small  border-primary" type="text" placeholder="address line 1" id="addressLine1Input">
                              </div>
                              <div class="w-100 d-flex d-flex justify-content-center">
                                   <input class="cart-shipping-lg-input alg-rounded-small  border-primary" type="text" placeholder="address line 2" id="addressLine2Input">
                              </div>
                              <div class="w-100  d-flex gap-3 justify-content-center">
                                   <input class="cart-shipping-sm-input alg-rounded-small  border-primary" type="text" placeholder="city" id="cityInput">
                                   <select id="districtInput" class="cart-shipping-sm-input alg-rounded-small border-primary">
                                        <option value="0">District</option>
                                        <option value="1">Ampara</option>
                                        <option value="2">Anuradhapura</option>
                                        <option value="3">Badulla</option>
                                        <option value="4">Batticaloa</option>
                                        <option value="5">Colombo</option>
                                        <option value="6">Galle</option>
                                        <option value="7">Gampaha</option>
                                        <option value="8">Hambantota</option>
                                        <option value="9">Jaffna</option>
                                        <option value="10">Kalutara</option>
                                        <option value="11">Kandy</option>
                                        <option value="12">Kegalle</option>
                                        <option value="13">Kilinochchi</option>
                                        <option value="14">Kurunegala</option>
                                        <option value="15">Mannar</option>
                                        <option value="16">Matale</option>
                                        <option value="17">Matara</option>
                                        <option value="18">Monaragala</option>
                                        <option value="19">Mullaitivu</option>
                                        <option value="20">Nuwara Eliya</option>
                                        <option value="21">Polonnaruwa</option>
                                        <option value="22">Puttalam</option>
                                        <option value="23">Ratnapura</option>
                                        <option value="24">Trincomalee</option>
                                        <option value="25">Vavuniya</option>

                                   </select>
                              </div>
                              <div class="w-100 d-flex d-flex justify-content-center">
                                   <select id="provinceInput" class="cart-shipping-sm-input alg-rounded-small border-primary">
                                        <option value="0">Provience</option>
                                        <option value="1">Central Province</option>
                                        <option value="2">Eastern Province</option>
                                        <option value="3">North Central Province</option>
                                        <option value="4">Northern Province</option>
                                        <option value="5">North Western Province</option>
                                        <option value="6">Sabaragamuwa Province</option>
                                        <option value="7">Southern Province</option>
                                        <option value="8">Uva Province</option>
                                        <option value="9">Western Province</option>
                                   </select>

                              </div>
                              <div class="d-flex justify-content-center gap-2">
                                   <input class="cart-shipping-button alg-rounded-small alg-text-light alg-text-h3 alg-bg-blue alg-button-search-hover p-2 border-0" type="submit" value="Edit" onclick="shippingDetailsUpdate()">
                                   <input class="cart-shipping-button alg-rounded-small cart-shipping-button-save alg-text-h3 cart-shipping-button" type="submit" value="Save" onclick="shippingDetails()">
                              </div>
                         </div>
                         <div class="cart-ordering-main d-flex flex-column col-12  col-lg-3 text-center bg-white alg-text-h3 pt-1 pb-3 rounded-1 alg-shadow gap-3" id="ordercontaiber">

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

                    <div class="p-4" id="WatchListContainer">


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
                                                  <input type="email" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter email" / id="signInemail">
                                                  <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter password" id="signInpassword">
                                                  <button class="button rounded-2 alg-text-h3" onclick="signIn()"><!--a href="userProfile.php" class="text-decoration-none" onclick="signIn()"-->Continue</-a></button>
                                                  <div class="text-center">
                                                       <span class="alg-cursor alg-text-h3" onclick="openForgotPassword();">Forgot your password?</span><br />
                                                       <span class="alg-cursor fw-semibold alg-text-dark-blue alg-text-h3" onclick="changeView();">Sign up with &nbsp;<span class="fw-bold"> ></span></span>
                                                  </div>
                                             </div>
                                             <!-- sign Up section -->
                                             <div class="col-8 d-flex flex-column gap-3 d-none py-4 py-md-0" id="signUpBox">
                                                  <h4 class="alg-text-dark-blue fw-bold">Sign Up</h4>
                                                  <input type="email" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter email" / id="SignUpemail">
                                                  <input type="text" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter First Name" / id="signUpname">
                                                  <input type="text" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter Last Name" / id="signUplastName">

                                                  <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Enter password" id="signUppassword">
                                                  <input type="password" class="alg-input px-2 alg-bg-light-blue p-1 alg-text-h3" placeholder="Confirm password" id="signUpCpassword">
                                                  <button class="button rounded-2 alg-text-h3" onclick="signUp()">Register</button>
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

<!-- forgot password model -->
<div class="modal fade" id="forgotPasswordModel" tabindex="-1" aria-labelledby="ALG-SignIn-Modal-Label" aria-hidden="true">
     <div class="modal-dialog p-0">
          <div class="modal-content rounded-3">
               <div class="modal-body p-0">
                    <div class="rounded-3">
                         <div class="alg-bg-light-blue p-3 rounded-3 d-flex flex-column align-items-center">
                              <div class="text-center">
                                   <span class="alg-text-h2 fw-bold">Forgot password?</span>
                                   <p class="alg-text-h3 text-black-50">No worries, we will send you reset instructions.</p>

                                   <div class="text-start">
                                        <span class="alg-text-h3 fw-semibold">Email</span>
                                        <input type="email" id="forgottenPasswordEmail" class="ALG-model-input alg-bg alg-text-h3 form-control rounded-3" placeholder="Email address" />
                                        <button id="mainButton" class="p-2 mb-3 w-100 rounded-3 alg-bg-blue main-btn-1 alg-text-h3 text-white fw-bolder mt-2 mt-md-3" onclick="passwordReset();">
                                             <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span>
                                             <span role="status">Reset Password</span>
                                        </button>
                                        <p class="alg-text-h3 text-center alg-cursor" onclick="openLoginModel();"><i class="bi bi-arrow-left"></i> Back to Sign In</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<!-- password reset model -->
<div class="modal fade" id="passwordResetModel" tabindex="-1" aria-labelledby="ALG-SignIn-Modal-Label" aria-hidden="true">
     <div class="modal-dialog p-0">
          <div class="modal-content rounded-3">
               <div class="modal-body p-0">
                    <div class="rounded-3">
                         <div class="alg-bg-light-blue p-3 rounded-3 px-5">
                              <div class="text-center">
                                   <span class="alg-text-h2 fw-bold">Password Reset</span>
                                   <p class="alg-text-h3 text-black-50">We sent a code to abc@gmail.com</p>

                                   <div class="text-start">
                                        <span class="alg-text-h3 fw-semibold">Verification code</span>
                                        <span class="alg-text-h3 fw-semibold" id="verificationSendingTimeRunner">30</span>
                                        <input type="text" id="verification_code" class="ALG-model-input alg-text-h3 form-control rounded-3" placeholder="code" />
                                        <button class="p-2 mb-3 w-100 rounded-3 alg-text-h3  text-white alg-bg-blue main-btn-1 fw-bolder mt-2 mt-md-3" onclick="passwordSet();">Next</button>
                                        <p class="alg-text-h3 text-center alg-cursor">Didn't receive the email? <a href="#">Click to resend</a></p>
                                        <p class="alg-text-h3 text-center alg-cursor" onclick="openLoginModel();"><i class="bi bi-arrow-left"></i> Back to Sign In</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<!-- set password model -->
<div class="modal fade" id="passwordSetModel" tabindex="-1" aria-labelledby="ALG-SignIn-Modal-Label" aria-hidden="true">
     <div class="modal-dialog p-0">
          <div class="modal-content rounded-3">
               <div class="modal-body p-0">
                    <div class="rounded-3">
                         <div class="alg-bg-light-blue p-3 rounded-5">
                              <div class="text-center px-5">
                                   <span class="alg-text-h2 fw-bold">Set new password</span>
                                   <p class="alg-text-h3 text-black-50">Must be at least 8 characters</p>

                                   <div class="text-start">

                                        <span class="alg-text-h3 fw-semibold">Password</span>
                                        <input type="password" id="fg-password" class="ALG-model-input form-control alg-text-h3 rounded-3 mb-3" placeholder="password" />

                                        <span class="alg-text-h3 fw-semibold">Confirm Password</span>
                                        <input type="password" id="fg-confirm_password" class="ALG-model-input alg-text-h3 form-control rounded-3" placeholder="confirm password" />

                                        <button class="p-2 mb-3 w-100 rounded-3 alg-text-h3 alg-bg-blue main-btn-1 text-white fw-bolder mt-2 mt-md-3">Reset password</button>
                                        <p class="alg-text-h3 text-center alg-cursor" onclick="openLoginModel();"><i class="bi bi-arrow-left"></i> Back to Sign In</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>