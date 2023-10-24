if (document.URL.endsWith('/index.php')) {
    const header = document.querySelector('.m-header');

    if (window.scrollY === 0) {
        header.classList.add('position-hh');
    } else {
        header.classList.add('scrolled');
    }

    window.addEventListener('scroll', () => {
        if (window.scrollY === 0) {
            header.classList.remove('scrolled');
            header.classList.add('position-hh');
        } else {
            header.classList.add('scrolled');
            header.classList.remove('position-hh');
        }
    });
} else {
    const header = document.querySelector('.m-header');

    header.classList.add('position-h');

    window.addEventListener('scroll', () => {
        if (window.scrollY === 0) {
            header.classList.remove('scrolled');
            header.classList.add('position-h');
        } else {
            header.classList.add('scrolled');
            header.classList.remove('position-h');
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
        purachse.classList.add('d-none');
        profile.classList.remove('d-none');
    } else {
        profile.classList.add('d-none');
        purachse.classList.remove('d-none');
    }

}

// login section toggle

function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}





