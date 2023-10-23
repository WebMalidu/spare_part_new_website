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

// garage model
let garageModel;
function openGarageModel() {
    garageModel = new bootstrap.Modal("#garageModel");
    garageModel.show();
    
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

var x = 0;
function addCarGarage() {
    let garage = '';
    for (x = 0; x < 2; x++) {
        garage += `<div class="alg-shadow py-2 garage-card">
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-end gap-2 px-2">
                <span><i class="bi bi-pencil-square"></i></span>
                <span><i class="bi bi-trash3-fill"></i></span>
            </div>
            <div class="d-flex justify-content-center"><img src="resources/image/car.jpg" alt=""></div>
            <div class="d-flex flex-column py-3 px-4 pt-4">
                <span class="alg-text-h3 fw-bold">Honda City</span>
                <span class="alg-text-h3">1.5L S/Petrol</span>
                <span class="alg-text-h3">Model Year:2013</span>
            </div>
        </div>
    </div>`;
    }

    garage += `<div class="alg-shadow py-2 garage-card" onclick="openGarageModel();">
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center"><img src="resources/image/car.jpg" alt=""></div>
        <div class="d-flex flex-column align-items-center py-3 px-4 pt-4">
            <span class="alg-text-h3 fw-bold">Add your car</span>
            <span class="alg-text-h1 alg-text-blue"><i class="bi bi-plus-lg fw-bold"></i></span>
        </div>
    </div>
</div>`;

    document.getElementById('garage').innerHTML = garage;
    garageModel.hide();
}



