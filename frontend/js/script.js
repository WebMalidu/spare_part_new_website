document.addEventListener('scroll', () => {
    const header = document.querySelector('.m-header');

    if (window.scrollY > 0) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
})


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
let loginModel;
function openLoginModel() {
    loginModel = new bootstrap.Modal("#loginModel");
    loginModel.show();
    headerModel.hide();
}

// password change open
let passwordModel;
function openPasswordModel() {
    passwordModel = new bootstrap.Modal("#passwordModel");
    passwordModel.show();
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



