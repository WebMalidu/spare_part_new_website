document.addEventListener("DOMContentLoaded", () => {
  loadWatchList();
 
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

  const requestDataObject = {
    email: SignUpemail,
    password: signUppassword,
    cpassword: signUppassword,
    firstName: signUpname,
  };

  // store data in a form
  let form = new FormData();
  form.append("signUpData", JSON.stringify(requestDataObject));

  // send the data to server
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        alert("please Check Your email");
      } else {
        console.log("Sign Up failed Please check your data");
      }
      console.log(request.responseText);
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
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/signOut.php", true);
  request.send();
}

function signIn() {
  const signInemail = document.getElementById("signInemail").value;
  const signInpassword = document.getElementById("signInpassword").value;
  console.log(signInemail);

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
      }
      console.log(request.responseText);
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
  let watchListConatiner=document.getElementById('WatchListContainer')
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // preform an action on response
      let response = JSON.parse(request.responseText);
      if (response.status == "success") {
        let data=response.data;
        watchListConatiner.innerHTML='';
        

        data.forEach(item => {
          watchListConatiner.innerHTML +=`<div class="col-12 d-flex justify-content-center align-items-center gap-5 pb-3">
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
                  <span class="text-black-50">Brand : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;${item.brand_name}</span></span>
                  <span class="text-black-50">Name : <span class="alg-text-blue"> &nbsp;&nbsp;&nbsp;&nbsp;${item.title}</span></span>
                  <span class="text-black-50">Sold By : <span class="alg-text-blue"> &nbsp;&nbsp;${item.full_name}</span></< /span>
             </div>
             <div class="col-12 col-lg-4 d-flex gap-3 gap-lg-5 alg-text-h3 mt-3">
                  <div>
                       <span class="fw-bold">${item.price}</span><br />
                       <span class="alg-bg-dark-blue p-1 rounded-1 text-white alg-text-h3">-20%</span>
                  </div>
                  <div>
                       <span class="text-decoration-line-through">LKR 2599.00</span>
                  </div>
             </div>
             <div class="col-12 col-lg-1 d-flex flex-row d-none d-lg-block flex-lg-column  justify-content-lg-between gap-lg-5">
                  <div class="pb-4"><input type="checkbox" /></div>
                  <div class="pt-5"><i class="bi bi-trash-fill" onclick="watchListDelete(${item.w_id})"></i></div>
             </div>
        </div>
        
        </div>`
      });
        
      } else {
        console.log(response.error);
        // alert("WatchList adding failed");
        Toast.toastLoad("error","WatchList adding failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/watchListLoad.php", true);
  request.send();
}
function watchListDelete(w_id){
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
        loadWatchList()        
      } else {
        console.log(response.error);
        // alert("WatchList adding failed");
        Toast.toastLoad("error","WatchList adding failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/watchListDelete.php", true);
  request.send(form);
}



function addWatchlist(part_id) {
  const requestDataObject = {
    parts_id: part_id,
  };
  console.log("hi")

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
        Toast.toastLoad("success","successfully added item to watchlist");
        // alert("successfully added item to watchlist");
        loadWatchList();
      } else {
        console.log(response.error);
        Toast.toastLoad("error","WatchList adding failed");
      }
      console.log(request.responseText);
    }
  };
  request.open("POST", "../backend/api/watchListAdd.php", true);
  request.send(form);
}