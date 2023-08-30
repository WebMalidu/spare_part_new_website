// category

var newRow = 0;
var x = 0;
function increaseCategory(id) {
    x = x+1;
    var category = document.getElementById("category");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            category.innerHTML = text;
            // alert(text);
            
        }
    }
    request.open("GET", "interfaces/categoryProcess.php?id=" + id + "&x="+x, true);
    request.send();

}

// offersection

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 80,
    pagination: {
        // el: ".swiper-pagination",
        clickable: true,
    },
});