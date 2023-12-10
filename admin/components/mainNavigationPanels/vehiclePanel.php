<!-- section -->
<section class="alg-bg-darker alg-rounded-small my-2 d-flex h-100">
    <div class="p-2 col-3 flex-grow-1">
        <div class="px-2 algbg alg-rounded-small">
            <button onclick="toggleVehicleSection('makers')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Makers</span><i class="bi bi-box d-block d-lg-none"></i></button>
            <button onclick="toggleVehicleSection('names')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Names</span><i class="bi bi-box d-block d-lg-none"></i></button>
            <button onclick="toggleVehicleSection('models')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Models</span><i class="bi bi-box d-block d-lg-none"></i></button>
            <button onclick="toggleVehicleSection('modelLines')" class="alg-btn-pill my-2 w-100"><span class="d-none d-lg-block">Model Lines</span><i class="bi bi-box d-block d-lg-none"></i></button>
        </div>
    </div>
    <div class="p-2 col-9 flex-grow-1 text-dark" id="vhMakerSectionsContainer">
        <div class="p-2 h-100 d-block alg-bg-light alg-rounded-small overflow-auto flex-grow-1">
            👈 Please Select a section...
        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small" id="makersViewSection">
            <div class="w-100 d-flex flex-column gap-2 alg-text-white">
                <div class="w-100 alg-rounded-mid alg-bg-dark p-2 d-flex gap-3">
                    <input class="alg-rounded-mid form-control w-75" placeholder="add a new Makers" type="text" id="addMakersInput"><button class="p-0 justify-content-center align-items-center w-25 alg-btn-pill" onclick="addMakers(event)"><span class="d-none d-md-block">Add</span><i class="bi bi-plus d-block d-md-none"></i></button>
                </div>
                <div class="w-100 overflow-auto alg-bg-light p-2 alg-rounded-mid" id="makersTable">
                    Loading....
                </div>
            </div>
        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small" id="namesViewSection">
            <div class="w-100 d-flex flex-column gap-2 alg-text-white">
                <div class="alg-bg-dark d-flex flex-column flex-lg-row p-3 p-lg-3 gap-3 gap-lg-4  alg-rounded-mid justify-content-between align-content-center">
                    <div class="col-12 col-lg-3">
                        <select class="form-select" id="vhMakersSelector">
                            <option>select maker</option>
                            <!-- makers goes here -->
                        </select>
                    </div>
                    <div class="col-12 col-lg-6">
                        <input class="alg-rounded-mid form-control" placeholder="add a new vehicle Name" type="text" id="addNamesInput">
                    </div>
                    <div class="col-12 col-lg-3">
                        <button class="alg-btn-pill" onclick="addNames(event)"><span class="d-none d-md-block">Add</span><i class="bi bi-plus d-block d-md-none"></i></button>
                    </div>

                </div>
                <div class="w-100 overflow-auto alg-bg-light p-2 alg-rounded-mid" id="namesTable">
                    Loading....
                </div>
            </div>

        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small" id="modelsViewSection">
            <div class="d-flex flex-column">
                <div class="d-flex flex-column flex-lg-row gap-2 p-2">
                    <select class="form-select" id="vhNamesSelector">
                        <!-- option goes here -->
                    </select>

                    <select class="form-select" id="vhTypeSelector">
                        <!-- option -->
                    </select>
                </div>

                <div class="d-flex flex-column flex-lg-row gap-2 p-2">
                    <select class="form-select" id="vhYearSelector">
                        <!-- option -->
                    </select>

                    <select class="form-select" id="vhGenerationSelector">
                        <!-- option -->
                    </select>
                </div>

                <div class="d-flex flex-column p-2">
                    <label class="form-label" for="addProductImageInput">Add model image</label>
                    <input alt="Vehicle image not upload" type="file"  id="vehicleImagesInput" class="form-control" onchange="vhModelImagePreview(event);" />
                    <div class="my-2 p-1 rounded-1 product-items d-flex justify-content-center align-content-center" id="modeImagePreviewContainer"></div>
                </div>
                <div class="w-100 p-1">
                    <button onclick="addModel(event)" class="my-4 w-100 alg-btn-pill">Add Model</button>
                </div>
            </div>

            <div class="w-100 overflow-auto alg-bg-light p-2 alg-rounded-mid" id="modelTable">
                Loading....
            </div>
        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="modelLinesViewSection">

        </div>
    </div>
</section>