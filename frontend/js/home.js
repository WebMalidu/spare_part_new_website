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
        const promotionData = document.getElementById('promotion_list');

for (let i = 0; i < imageUrls.length; i++) {
    const li = document.createElement('li');
    li.className = "splide__slide";

    const img = document.createElement('img');
    img.src = imageUrls[i]; // Use the image URL from the array
    img.alt = ""; // Set alt text if needed

    // Add any additional attributes or styles here
    img.style.width = "100%"; // For example, set the image width to 100%

    li.appendChild(img);
    promotionData.appendChild(li);
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









