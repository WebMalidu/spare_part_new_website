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
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="makersViewSection">

        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="namesViewSection">

        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="modelsViewSection">

        </div>
        <div class="p-2 h-100 d-none alg-bg-light alg-rounded-small overflow-auto flex-grow-1" id="modelLinesViewSection">

        </div>
    </div>
</section>