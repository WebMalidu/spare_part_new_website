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

// category load
let categoryLoadModel;
function categoryLoad() {
  categoryLoadModel = new bootstrap.Modal("#categoryLoad");
  categoryLoadModel.show();
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
  request.open("POST", "../../backend/api//signUp.php", true);
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
  request.open("POST", "../../backend/api//signOut.php", true);
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
  request.open("POST", "../../backend/api//signIn.php", true);
  request.send(form);
}
