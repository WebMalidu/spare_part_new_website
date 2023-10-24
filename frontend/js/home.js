function promotionLoder(){
console.log("hi")        
  

  // Send the data to the server using Fetch
  fetch("../../backend/api//productPromation.php", {
    method: "POST",
  })
    .then(response => response.json())
    .then(data => {
      // Handle the response data
      if (data.status === "success") {
        alert(data.status);
        
        const imageUrls = data.imageUrls;
        const swiperWrapper = document.getElementById("swiper-wrapper");

        // Clear existing slides
        swiperWrapper.innerHTML = '';

        
         // Check the screen size (viewport width)
         const screenWidth = window.innerWidth;
  
         if (screenWidth <= 768) {
           // Code for small screens
           for (let i = 0; i < imageUrls.length; i++) {
             const slide = document.createElement("div");
             slide.className = "swiper-slide d-flex gap-5 p-3";
 
             const img = document.createElement("img");
             img.src = imageUrls[i];
             img.className = "alg-slider-img alg-shadow";
             img.alt = "";
             slide.appendChild(img);
 
             swiperWrapper.appendChild(slide);
           }
         } else {
           // Code for big screens
           const swiperContainer = document.getElementById("swiper-container");
           const mySwiper = new Swiper(swiperContainer, {
             // Swiper parameters for big screens
             slidesPerView: 2,
             spaceBetween: 20,
             // Add other settings as needed
           });
 
           for (let i = 0; i < imageUrls.length; i += 2) {
             const slide = document.createElement("div");
             slide.className = "swiper-slide d-flex gap-5 p-3";
 
             const img1 = document.createElement("img");
             img1.src = imageUrls[i];
             img1.className = "alg-slider-img alg-shadow";
             img1.alt = "";
             slide.appendChild(img1);
 
             if (imageUrls[i + 1]) {
               const img2 = document.createElement("img");
               img2.src = imageUrls[i + 1];
               img2.className = "alg-slider-img alg-shadow";
               img2.alt = "";
               slide.appendChild(img2);
             }
 
             swiperWrapper.appendChild(slide);
           }
         }
      } else {
        console.log(data.error);
      }
      console.log(data);
    })
    .catch(error => {
      console.error("Error:", error);
    });
    

}
promotionLoder()