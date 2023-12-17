document.addEventListener("DOMContentLoaded", () => {
  loadWatchList();
  cartLoad();
  loadShippingDetails();
});

if (document.URL.endsWith("/index.php")) {
  const header = document.querySelector(".m-header");

  if (window.scrollY === 0) {
    header.classList.add("position-hh");
  } else {
    header.classList.add("scrolled");
  }

  window.addEventListener("scroll", () => {
    if (window.scrollY === 0) {
      header.classList.remove("scrolled");
      header.classList.add("position-hh");
    } else {
      header.classList.add("scrolled");
      header.classList.remove("position-hh");
    }
  });
} else {
  const header = document.querySelector(".m-header");

  header.classList.add("position-h");

  window.addEventListener("scroll", () => {
    if (window.scrollY === 0) {
      header.classList.remove("scrolled");
      header.classList.add("position-h");
    } else {
      header.classList.add("scrolled");
      header.classList.remove("position-h");
    }
  });
}

// header open model
let headerModel;
function openHeaderModel() {
  headerModel = new bootstrap.Modal("#headerModel");
  headerModel.show();
}

// cart open model
let cartModel;
function openCartModel() {
  cartModel = new bootstrap.Modal("#cartModel");
  cartModel.show();
  headerModel.hide();
}

// watchlist open model
let watchlistModel;
function openWatchlistModel() {
  watchlistModel = new bootstrap.Modal("#watchlistModel");
  watchlistModel.show();
  headerModel.hide();
}

// user login open model
// function openLoginModel() {
//     headerModel.hide();
// }

let loginModel;
function openLoginModel() {
  loginModel = new bootstrap.Modal("#loginModel");
  loginModel.show();
  headerModel.hide();
  forgotPasswordModel.hide();
  passwordResetModel.hide();
  passwordSetModel.hide();
}

// password change open
let passwordModel;
function openPasswordModel() {
  passwordModel = new bootstrap.Modal("#passwordModel");
  passwordModel.show();
}

// forgot password model
let forgotPasswordModel;
function openForgotPassword() {
  forgotPasswordModel = new bootstrap.Modal("#forgotPasswordModel");
  loginModel.hide();
  forgotPasswordModel.show();
}

// password reset
let passwordResetModel;
function passwordReset() {
  passwordResetModel = new bootstrap.Modal("#passwordResetModel");
  passwordResetModel.show();
  forgotPasswordModel.hide();
}

// password set
let passwordSetModel;
function passwordSet() {
  passwordSetModel = new bootstrap.Modal("#passwordSetModel");
  passwordSetModel.show();
  passwordResetModel.hide();
}

function goBackToSignIn() {
  signUpModel.hide();
  signInModel.show();
}

// profile section toggle

function viewChange(id) {
  var profile = document.getElementById("profile_view");
  var purachse = document.getElementById("purchasing_view");

  if (id == 1) {
    purachse.classList.add("d-none");
    profile.classList.remove("d-none");
  } else {
    profile.classList.add("d-none");
    purachse.classList.remove("d-none");
  }
}

// login section toggle

function changeView() {
  var signUpBox = document.getElementById("signUpBox");
  var signInBox = document.getElementById("signInBox");

  signUpBox.classList.toggle("d-none");
  signInBox.classList.toggle("d-none");
}

function signUp() {
  const SignUpemail = document.getElementById("SignUpemail").value;
  const signUpname = document.getElementById("signUpname").value;
  const signUppassword = document.getElementById("signUppassword").value;
  const signUpCpassword = document.getElementById("signUpCpassword").value;
  const signUplastName = document.getElementById("signUplastName").value;

    // Email Validation function
  function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(String(email).toLowerCase());
  }

  // Check if email is valid
  if (!validateEmail(SignUpemail)) {
    alert("Please enter a valid email address");
    return;
  }

  // Check if password and confirm password match
  if (signUppassword !== signUpCpassword) {
    alert("Passwords do not match");
    return;
  }

  // Function to check if there are spaces between letters
  function containsSpaces(text) {
    return /\s/.test(text);
  }

  // Check if first name contains spaces
  if (containsSpaces(signUpname)) {
    alert("First name should not contain spaces between letters");
    return;
  }

  // Check if last name contains spaces
  if (containsSpaces(signUplastName)) {
    alert("Last name should not contain spaces between letters");
    return;
  }


  const requestDataObject = {
    email: SignUpemail,
    password: signUppassword,
    cpassword: signUppassword,
    firstName: signUpname,
    lastname:signUplastName
  };

  // store data in a form
  let form = new FormData();
  form.append("signUpData", JSON.stringify(requestDataObject));

  alert("Please Wait Few Seconds");
  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("Please Check Your email");
      } else {
        alert("Sign Up failed Please check your data");
        console.log("Sign Up failed Please check your data");
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/signUp.php", true);
  request.send(form);
}

function logOut() {
  // send the data to server
  console.log("logout");
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("Sucessfully Logout");
        window.location.reload();
      } else {
        console.log(response.status);
      }
     // console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/signOut.php", true);
  request.send();
}

function signIn() {
  const signInemail = document.getElementById("signInemail").value;
  const signInpassword = document.getElementById("signInpassword").value;
  //console.log(signInemail);

  const requestDataObject = {
    email: signInemail,
    password: signInpassword,
  };

  // store data in a form
  let form = new FormData();
  form.append("signInData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("Sign In sucessfull");
        window.location.reload();
      } else {
        console.log(response.error);
        alert("Sign In Failed");
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/signIn.php", true);
  request.send(form);
}

class First15Words {
  // constructor(inputString){

  // }

  static getFirst15Words(inputString) {
    // Split the input string into an array of words using whitespace as the delimiter
    const wordsArray = inputString.split(/\s+/);
    // Take the first 20 elements from the array using the slice method
    const first20WordsArray = wordsArray.slice(0, 8);
    // Join the first 20 words back together into a new string using whitespace as a separator
    const resultString = first20WordsArray.join(" ");
    return resultString;
  }
}

//watchlist section

//Load WatchList

function loadWatchList() {
  // send the data to server
  let request = new XMLHttpRequest();
  let watchListConatiner = document.getElementById("WatchListContainer");
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        let data = response.data;
        watchListConatiner.innerHTML = "";

        data.forEach((item) => {
          watchListConatiner.innerHTML += `<div class="col-12 d-flex justify-content-center align-items-center gap-5 pb-3">
        <div class="col-5 col-lg-2 d-flex flex-column flex-lg-row justify-content-center bg-white ct-div-size alg-shadow rounded-1">
             <img src="resources/image/partsImages/partsId=${item.parts_id}_categoryItemId=${item.category_item_id}_image=1.jpg" class="crt_itm_img img-fluid my-auto mx-auto" alt="item_img" />
             <div class="col-12 d-flex flex-row d-lg-none d-block justify-content-around gap-5 pt-3">
                  <div><input type="checkbox" /></div>
                  <div><i class="bi bi-trash-fill"></i></div>
             </div>
        </div>
        
        <div class="row col-6 col-lg-8 col-lg-9 py-1 bg-white ct-div-size alg-shadow rounded-1 d-flex justify-content-lg-between align-items-lg-center">
             <div class="col-12 col-lg-3 d-flex flex-column alg-text-h3 gap-1 gap-lg-2">
                  <span class="fw-bold lh-1 alg-text-blue">Break Cable<br /><span class="fw-normal text-black">(Brand New)</span></span>
                  <span class="text-black-50">Brand : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;${item.brand_name}</span></span>
                  <span class="text-black-50">Name : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;${item.title}</span></span>
                  <span class="text-black-50">Sold By : <span class="alg-text-blue"> &nbsp;&nbsp;${item.full_name}</span></< /span>
             </div>
             <div class="col-12 col-lg-4 d-flex gap-3 gap-lg-5 alg-text-h3 mt-3">
                  <div>
                       LKR &nbsp;<span class="fw-bold">${item.price}</span>.00<br />
                       <span class="alg-bg-dark-blue p-1 rounded-1 text-white alg-text-h3">${item.discount || 0}%</span>
                  </div>
                  <div>
                  </div>
             </div>
             <div class="col-12 col-lg-1 d-flex flex-row d-none d-lg-block flex-lg-column  justify-content-lg-between gap-lg-5">
                  <div class="pb-4"><input type="checkbox" /></div>
                  <div class="pt-5"><i class="bi bi-trash-fill" onclick="watchListDelete(${item.w_id})"></i></div>
             </div>
        </div>
        
        </div>`;
        });
      } else {
        console.log(response.error);
        // alert("WatchList adding failed");
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/watchListLoad.php", true);
  request.send();
}
function watchListDelete(w_id) {
  const requestDataObject = {
    watchlistId: w_id,
  };

  // store data in a form
  let form = new FormData();
  form.append("watchListData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("successfully deleted");
        loadWatchList();
      } else {
        console.log(response.error);
        alert("WatchList adding failed");
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/watchListDelete.php", true);
  request.send(form);
}

function addWatchlist(part_id) {
  const requestDataObject = {
    parts_id: part_id,
  };

  // store data in a form
  let form = new FormData();
  form.append("watchListData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("successfully added item to watchlist");

        loadWatchList();
      } else {
        console.log(response.error);
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/watchListAdd.php", true);
  request.send(form);
}

function addCart(part_id) {
  const requestDataObject = {
    parts_id: part_id,
  };
  //console.log("cart add");

  // store data in a form
  let form = new FormData();
  form.append("cartData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("successfully added item to cart");
        cartLoad();
        location.reload()
      } else {
        console.log(response.error);
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/cartAdding.php", true);
  request.send(form);
}

//multi vendor registation

function multiVendorRegistation() {
  const name = document.getElementById("name").value;
  const address = document.getElementById("Adress").value;
  const businessName = document.getElementById("bName").value;
  const brNumber = document.getElementById("br").value;
  const businessAddress = document.getElementById("bAdress").value;
  const businessContact = document.getElementById("bContact").value;
  const privateContact = document.getElementById("bPrivate").value;
  const emailAddress = document.getElementById("bEmail").value;
  const password = document.getElementById("bPAssword").value;

  const requestDataObject = {
    name: name,
    address: address,
    business_name: businessName,
    br_number: brNumber,
    business_address: businessAddress,
    business_contact: businessContact,
    private_contact: privateContact,
    email_address: emailAddress,
    password: password,
  };
 // console.log(requestDataObject);
  //console.log("multi vendor add");

  // Regular expressions for phone number and email validation
  const phoneRegex = /^\d{10}$/; // Validates a 10-digit phone number
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Validates an email address

  // Verify phone number and email using regex
  const isPhoneNumberValid = phoneRegex.test(businessContact);
  const isPhoneNumberValidtwo = phoneRegex.test(privateContact);

  const isEmailValid = emailRegex.test(emailAddress);

  if (!isPhoneNumberValid) {
    alert("Please enter a valid 10-digit phone number.");
    return; // Prevent further execution if phone number is invalid
  }
  if (!isPhoneNumberValidtwo) {
    alert("Please enter a valid 10-digit phone number.");
    return; // Prevent further execution if phone number is invalid
  }

  if (!isEmailValid) {
    alert("Please enter a valid email address.");
    return; // Prevent further execution if email is invalid
  }

  // store data in a form
  let form = new FormData();
  form.append("mData", JSON.stringify(requestDataObject));

  alert("Please Wait Few Seconds");

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("Please Check your Email");
      } else {
        alert("Registaton Failed");

        //console.log(response.error);
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/adminSignUp.php", true);
  request.send(form);
}

//cart Load
//cart global variable

let subtotal = 0;
let discount = 0;
let shippinPrice = 0;

function cartLoad() {
  console.log("cart");
  let request = new XMLHttpRequest();
  let cartContainer = document.getElementById("cartContainer");
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        let data = response.data;
        //console.log(data);
        cartContainer.innerHTML = "";

        data.forEach((item) => {
          cartContainer.innerHTML += `<div class="col-12 d-flex justify-content-center align-items-center gap-5 pb-3">
          <div class="col-5 col-lg-2 d-flex flex-column flex-lg-row justify-content-center bg-white ct-div-size alg-shadow rounded-1">
               <img src="resources/image/partsImages/partsId=${item.parts_id}_categoryItemId=${item.category_item_id}_image=1.jpg" class="crt_itm_img img-fluid my-auto mx-auto" alt="item_img" />
               <div class="col-12 d-flex flex-row d-lg-none d-block justify-content-around gap-5 pt-3">
                    <div><input type="checkbox" /></div>
                    <div><i class="bi bi-trash-fill"></i></div>
               </div>
          </div>
          
          <div class="row col-6 col-lg-8 col-lg-9 py-1 bg-white ct-div-size alg-shadow rounded-1 d-flex justify-content-lg-between align-items-lg-center">
               <div class="col-12 col-lg-3 d-flex flex-column alg-text-h3 gap-1 gap-lg-2">
                    <span class="fw-bold lh-1 alg-text-blue">Break Cable<br /><span class="fw-normal text-black">(Brand New)</span></span>
                    <span class="text-black-50">Brand : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;${item.brand_name}</span></span>
                    <span class="text-black-50">Name : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;${item.title}</span></span>
               </div>
               <div class="col-12 col-lg-4 d-flex gap-3 gap-lg-5 alg-text-h3 mt-3">
                    <div>
                         LKR.<span class="fw-bold">${item.price}</span>.00<br />
                         <span class="alg-bg-dark-blue p-1 rounded-1 text-white alg-text-h3">${item.discount || 0}%</span>
                         </div>
                    <div>
                    </div>
               </div>
               <div class="col-12 col-lg-1 d-flex flex-row d-none d-lg-block flex-lg-column  justify-content-lg-between gap-lg-5">
                    <div class="pb-4"><input type="checkbox" /></div>
                    <div class="pt-5"><i class="bi bi-trash-fill" onclick="cartDelete(${item.cart_id})"></i></div>
               </div>
          </div>
          
          </div>`;
          // Increment subtotal by the price of the current item
          subtotal += parseFloat(item.price);
          discount += item.discount
            ? parseFloat(((item.discount * item.price) / 100).toFixed(1))
            : 0;

          // Update discount only if item.discount exists
          shippinPrice += item.shipping_price
            ? parseFloat(item.shipping_price)
            : 0;
          //console.log(item.parts_id, item.shipping_price);
        });
        payingdisplay(discount, subtotal, shippinPrice);
      } else {
        //console.log(response.error);
        // alert("WatchList adding failed");
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/cartLoad.php", true);
  request.send();
}

function cartDelete(cartId) {
  const requestDataObject = {
    cart_id: cartId,
  };
  console.log("deleted");

  // store data in a form
  let form = new FormData();
  form.append("cartData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("successfully deleted");
        cartLoad();
      } else {
        console.log(response.error);
        alert("Cart Delete failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/cartDelete.php", true);
  request.send(form);
}

//subtatotal adding

function payingdisplay(discount, subtatotal, shippinPrice) {
  console.log(discount);
  console.log(subtotal);

  let orderContainer = document.getElementById("ordercontaiber");
  orderContainer.innerHTML = `
  <span class="alg-text-h2 alg-text-blue fw-bold">Order Summery</span>
  <div class="d-flex justify-content-between mx-3 pb-1 pt-1">
       <span>Sub Total(5)</span>
       <span class="fw-bold" id="subTotal">LKR ${subtatotal}</span>
  </div>
  <div class="d-flex justify-content-between mx-3">
       <span class="">Discount</span>
       <span class="fw-bold" id="disscount">LKR ${discount}</span>
  </div>
  <div class="d-flex justify-content-between border-bottom border-2 pb-1 mx-3">
       <span>Shipping Price</span>
       <span class="fw-bold" id="shippingprice">LKR ${shippinPrice}</span>
  </div>
  <div class="d-flex justify-content-between mx-3">
       <span class="fw-bold">Total</span>
       <span class="fw-bold" id="total">LKR ${
         subtatotal + shippinPrice - discount
       }</span>
  </div>
  <div class="d-grid mx-4 mt-5">
       <button class="alg-bg-blue  alg-text-h3 alg-button-hover border-0 rounded-1 text-white p-1 fw-bolder" onclick="checkOut();paymentProcess();">Proceed To Checkout</button>
  </div>
  `;
}

function shippingDetails() {
  var username = document.getElementById("usernameInput").value;
  var phoneNumber = document.getElementById("phoneNumberInput").value;
  var postalCode = document.getElementById("postalCodeInput").value;
  var addressLine1 = document.getElementById("addressLine1Input").value;
  var addressLine2 = document.getElementById("addressLine2Input").value;
  var city = document.getElementById("cityInput").value;
  var district = document.getElementById("districtInput").value;
  var province = document.getElementById("provinceInput").value;

 
  if (
    username.trim() === '' ||
    phoneNumber.trim() === '' ||
    postalCode.trim() === '' ||
    addressLine1.trim() === '' ||
    city.trim() === '' ||
    district === '0' ||  // Assuming '0' is an invalid selection
    province === '0'     // Assuming '0' is an invalid selection
  ){
    alert('Please fill inputs');
    return;
  }
  if(!validatePhoneNumber(phoneNumber)){
    alert('please enter validate phone number')
    return
  }
  phoneNumber='+94' + phoneNumber.substring(1);
  console.log(district, province, city);

  const requestDataObject = {
    username: username,
    phoneNumber: phoneNumber,
    postalCode: postalCode,
    addressLine1: addressLine1,
    addressLine2: addressLine2,
    city: city,
    district: district,
    province: province,
  };
  console.log("deleted");
  console.log(requestDataObject);

  // store data in a form
  let form = new FormData();
  form.append("shippingData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("successfully data added");
      } else {
        console.log(response.error);
        alert("data adding Failes please check input ");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/shippingDetailsAdd.php", true);
  request.send(form);
}
function validatePhoneNumber(phoneNumber) {
  const phonePattern = /^\d{10}$/; // Matches 10 digits only
  return phonePattern.test(phoneNumber);
}
  // Check if the number starts with '0' (assuming Sri Lankan format)
 

function loadShippingDetails() {
  console.log("shipping Details loaded");
  var username = document.getElementById("usernameInput");
  var phoneNumber = document.getElementById("phoneNumberInput");
  var postalCode = document.getElementById("postalCodeInput");
  var addressLine1 = document.getElementById("addressLine1Input");
  var addressLine2 = document.getElementById("addressLine2Input");
  var city = document.getElementById("cityInput");
  var district = document.getElementById("districtInput");
  var province = document.getElementById("provinceInput");

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      let data = response.data[0];
      if (response.status == "success") {
        //console.log(data.name);
        username.value = data.user_name;
        phoneNumber.value = data.mobile;
        postalCode.value = data.postal_code;
        addressLine1.value = data.address_line_1;
        city.value = data.city;
        addressLine2.value = data.address_line_2;
        province.selectedIndex = data.province_province_id;
        district.selectedIndex = data.district_district_id;
      } else {
        console.log(response.error);
      }
      //console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/shippingDetailsLod.php", true);
  request.send();
}

function checkOut() {
  let total = document.getElementById("total").textContent;

  //let subTotal = document.getElementById("subTotal").textContent;
  //let disscount = document.getElementById("disscount").textContent;
  let shippingprice = document.getElementById("shippingprice").textContent;

  //console.log(total.replace("LKR ", ""));
  console.log("checkOut");

  const requestDataObject = {
    total: total,
    shipping: shippingprice,
  };
 // console.log("deleted");
  //console.log(requestDataObject);

  // store data in a form
  let form = new FormData();
  form.append("checkOutData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("successfully data added");
      } else {
        console.log(response.error);
        alert("data adding Failes please check input ");
      }
     // console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/checkOutProcess.php", true);
  request.send(form);
}

function paymentProcess() {
  let total=document.getElementById('total').textContent

  

  //console.log(total.replace("LKR ", ""));
  //console.log("checkOut");

  const requestDataObject = {
    total: total.replace("LKR ", ""),
  }
  //console.log("deleted");
 // console.log(requestDataObject);

  // store data in a form
  let form = new FormData();
  form.append("checkOutData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        window.location.href = response.data;
      } else {
        alert(response.error)
        console.log(response.error);
      }
     // console.log(request.responseText);
    }
  };
  request.open("POST", "./payment.php", true);
  request.send(form);
}
