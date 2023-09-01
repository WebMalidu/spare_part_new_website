<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Header</title>
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
     <!-- js -->
     <script defer src="js/bootstrap.bundle.js"></script>
     <script defer src="js/script.js"></script>
</head>

<body>
     <header class="fixed-top">
          <nav class="batta-bg-primery">
               <div class="container">
                    <div class="d-flex justify-content-between p-2  ">
                         <!-- Button trigger modal -->
                         <div class="mobile-toggler d-lg-none fs-2 ps-4 ">
                              <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal" class="batta-font-lite">
                                   <i class="bi bi-border-width"></i>
                              </a>
                         </div>
                         <!-- logo -->
                         <div class="p-1 ps-2  ps-lg-5 pe-5 pe-lg-0">
                              <img src="./resources/image/battaLogoWhite.png" alt="logo" style="width:180px ;height: 20px;">
                         </div>
                         <!-- navigation -->
                         <div class="d-lg-flex d-none gap-4 batta-font-lite">
                              <div class="p-1 fs-5 d-flex  gap-5 ps-2 pe-2">
                                   <div class="header-link">
                                        <a>Home</a>
                                   </div>
                                   <div class="header-link">
                                        <a>Category</a>
                                   </div>
                                   <div class="header-link">
                                        <a>Contact Us</a>
                                   </div>
                                   <div class="header-link">
                                        <a>My Garage</a>
                                   </div>

                              </div>
                              <div class="header-link fs-5 d-flex justify-content-between gap-4 p-1 ps-4 pe-5">
                                   <i class="bi bi-heart-fill"></i>
                                   <i class="bi bi-cart-fill"></i>
                                   <i class="bi bi-person-circle"></i>
                              </div>
                         </div>
                    </div>

               </div>
          </nav>

     </header>

     <!-- Modal -->
     <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">

                    <div class="modal-header">
                         <img src="/img/logo-variant.png" alt="Logo">
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    </div>

                    <div class="modal-body">

                         <div class="modal-line">
                              <i class="fa-solid fa-house"></i><a href="/">Home</a>
                         </div>

                         <div class="modal-line">
                              <i class="fa-solid fa-bell-concierge"></i><a href="/services">Category</a>
                         </div>

                         <div class="modal-line">
                              <i class="fa-solid fa-file-lines"></i> <a href="/cases">Contact Us</a>
                         </div>

                         <div class="modal-line">
                              <i class="fa-solid fa-circle-info"></i><a href="/about">My Garage</a>
                         </div>
                         <div class="modal-line">
                              <i class="fa-solid fa-circle-info"></i><a href="/about">Heart</a>
                         </div>
                         <div class="modal-line">
                              <i class="fa-solid fa-circle-info"></i><a href="/about">Cart</a>
                         </div>
                         <div class="modal-line">
                              <i class="fa-solid fa-circle-info"></i><a href="/about">Watchlist</a>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</body>

</html>