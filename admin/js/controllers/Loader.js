//dev - madusha 
//version - 1.0.0 (development)
//you can also use load all data 
//modification-line , vehicle type, vehicle year, vehicle generations
//MDN reference JS OOP

class Loader {

       constructor() {
              this.dataSender = new Sender();
       }

       //load modification lines
       async LoadModificationLine() {
              const modificationDataResponse = await this.dataSender.dataLoad("backend/api/vehicleModificationAPI.php");
              return modificationDataResponse;
       }
       //load vehicleTypes
       async LoadVehicleType() {
              const vehicleTypeDataResponse = await this.dataSender.dataLoad("backend/api/vehicleTypeAPI.php");
              return vehicleTypeDataResponse;
       }
       //load vehicle years
       async LoadVehicleYears() {
              const vehicleYearsDataResponse = await this.dataSender.dataLoad("backend/api/vehicleDateAPI.php");
              return vehicleYearsDataResponse;
       }
       //load vehicle generation
       async LoadVehicleGeneration() {
              const vehicleYearsDataResponse = await this.dataSender.dataLoad("backend/api/vehicleGenarationAPI.php");
              return vehicleYearsDataResponse;
       }
       //load vehicle names
       async LoadVehicleName() {
              const vehicleNamesDataResponse = await this.dataSender.dataLoad("backend/api/vehicleNames.php");
              return vehicleNamesDataResponse;
       }
       //load vehicle makers
       async LoadVehicleMakers() {
              const vehicleMakersDataResponse = await this.dataSender.dataLoad("backend/api/vehicleMakersAPI.php");
              return vehicleMakersDataResponse;
       }
       //load vehicle models
       async LoadVehicleModels() {
              const vehicleModelsDataResponse = await this.dataSender.dataLoad("backend/api/vehicleModelAPI.php");
              return vehicleModelsDataResponse;
       }
       //load vehicle models has modification line
       async LoadVehicleModelsModificationLine() {
              const vehicleModelsModificationLineDataResponse = await this.dataSender.dataLoad("backend/api/vehicleModelModification.php");
              return vehicleModelsModificationLineDataResponse;
       }
       //load vehicle parts
       async LoadVehiclePartsLoad() {
              const vehiclePartsResponse = await this.dataSender.dataLoad("backend/api/productManupulateAPI.php");
              return vehiclePartsResponse;
       }
       //load parts origin
       async LoadVehiclePartsOrin() {
              const vehiclePartsOriginResponse = await this.dataSender.dataLoad("backend/api/vehicleOriginLoad.php");
              return vehiclePartsOriginResponse;
       }
       //load vehicle brand
       async LoadVehicleBrand() {
              const vehicleBrandResponse = await this.dataSender.dataLoad("backend/api/relatedBrandLoad.php");
              return vehicleBrandResponse;
       }
       //load vehicle category items
       async LoadVehicleCategoryItem() {
              const vehicleCategoryItemResponse = await this.dataSender.dataLoad("backend/api/categoryItemLoadAll.php");
              return vehicleCategoryItemResponse;
       }
       //load vehicle category 
       async LoadVehicleCategory() {
              const vehicleCategoryResponse = await this.dataSender.dataLoad("backend/api/categoriesLoad.php");
              return vehicleCategoryResponse;
       }

}