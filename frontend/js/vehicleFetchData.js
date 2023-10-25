//vehicleMakers Data , vehicleModel Data,vehicleYear Data,vehicleModificationLine Data,vehicleGeneration Data,vehicleType Data,you can get all data for this
class vehicleDataFetcher {
     async fetchVehicleData() {
          //set request
          const vehicleMakersResponse = await fetch(SERVER_URL + 'backend/api/vehicleMakersAPI.php');
          const vehicleNamesResponse = await fetch(SERVER_URL + 'backend/api/vehicleNames.php');
          const vehicleModelResponse = await fetch(SERVER_URL + 'backend/api/vehicleModelAPI.php');
          const vehicleYearResponse = await fetch(SERVER_URL + 'backend/api/vehicleDateAPI.php');
          const vehicleModelModificationResponse = await fetch(SERVER_URL + 'backend/api/vehicleModelModification.php');
          const vehicleModificationLineResponse = await fetch(SERVER_URL + 'backend/api/vehicleModificationAPI.php');
          const vehicleGenerationResponse = await fetch(SERVER_URL + 'backend/api/vehicleGenarationAPI.php');
          const vehicleTypeResponse = await fetch(SERVER_URL + 'backend/api/vehicleTypeAPI.php');

          //get response json
          const vehicleMakersData = await vehicleMakersResponse.json();
          const vehicleNamesData = await vehicleNamesResponse.json();
          const vehicleModelData = await vehicleModelResponse.json();
          const vehicleYearsData = await vehicleYearResponse.json();
          const vehicleModelModificationData = await vehicleModelModificationResponse.json();
          const vehicleModificationLineData = await vehicleModificationLineResponse.json();
          const vehicleGenerationData = await vehicleGenerationResponse.json();
          const vehicleTypeData = await vehicleTypeResponse.json();

          return {
               vehicleMakersData,
               vehicleNamesData,
               vehicleModelData,
               vehicleYearsData,
               vehicleModelModificationData,
               vehicleModificationLineData,
               vehicleGenerationData,
               vehicleTypeData,
          };
     }
}