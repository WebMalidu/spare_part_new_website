SERVER_URL = 'http://localhost:9001/';

document.addEventListener('DOMContentLoaded', async () => {
     vehicleMakers();
});

//this is the promise
//call class and 
async function vehicleDataFetch() {
     const obj = new vehicleDataFetcher();
     const data = await obj.fetchVehicleData();
     return data
}

//my garage section
//set vehicle makers inside the model
function vehicleMakers() {
     const makersSelector = document.getElementById('vehicleMakerSelector');

     //get data and set
     vehicleDataFetch().then((data) => {
          console.log(data);
          const vhm = data.vehicleMakersData;

          if (vhm.status === 'success') {
               try {
                    vhm.results.forEach((element) => {
                         const makerOption = document.createElement('option');
                         makerOption.value = element.maker_id;
                         makerOption.textContent = element.maker_name;
                         makersSelector.appendChild(makerOption);
                    });

               } catch (error) {
                    console.log('The vhm variable is not an array');
               }
          } else {
               console.log(vhm.error);
          }
     }).catch((error) => console.log(error));

}

//get a maker id and set model line 
const makersSelector = document.getElementById('vehicleMakerSelector');
//get vehicle model names
const vehicleModelNameSelector = document.getElementById('vehicleModelNameSelector');

makersSelector.addEventListener('change', () => {

     //get maker id
     const makerId = makersSelector.value;

     vehicleDataFetch().then((data) => {
          const vhModel = data.vehicleModelData;

          vehicleModelNameSelector.innerHTML = "";

          if (vhModel.status === 'success') {
               //get a variable
               const result = vhModel.results;

               // vehicleModelNameSelector.innerHTML +=
               //      `<option selected>Select Model Line</option>`;
               //result filter and map 
               result.filter((res) => res.maker_id === makerId).map((rs2) => {
                    //create a new model selection
                    const makerNameOption = document.createElement('option');
                    makerNameOption.textContent = rs2.model_name;
                    makerNameOption.value = rs2.model_name;
                    vehicleModelNameSelector.appendChild(makerNameOption);
               });

          } else {
               console.log(vhModel.error);
          }



     })

});

//vehicle year container
const vehicleYearsContainer = document.getElementById('vehicleYearsContainer');
//select related date in a car model
vehicleModelNameSelector.addEventListener('change', () => {

     const vehicleName = vehicleModelNameSelector.value;

     vehicleDataFetch().then((data) => {
          const vehicleModelData = data.vehicleModelData;

          if (vehicleModelData.status === 'success') {
               //get a variable
               const result = vehicleModelData.results;

               // filtering and mapping 
               var yearId = result.filter((res) => res.model_name === vehicleName).map((rs2) => rs2.model_year_id);
               // console.log(yearId);
               return yearId
          } else {
               console.log(vhModel.error);
          }
     }).then((yearId) => {

          console.log(yearId);
          const resultDate = data.vehicleYearsData;
          
          resultDate.status === 'success' ? console.log("hello") : console.log('errr');
     });
});




