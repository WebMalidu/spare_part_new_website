function promotionLoder(){
    
        
  

  // Send the data to the server using Fetch
  fetch("../../backend/api//productPromation.php", {
    method: "POST",
  })
    .then(response => response.json())
    .then(data => {
      // Handle the response data
      if (data.status === "success") {
        alert(data.status);
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