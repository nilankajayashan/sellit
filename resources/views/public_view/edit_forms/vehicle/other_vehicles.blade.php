<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3">
        <label for="make">Make</label>
        <input type="text" class="form-control" id="make" name="make">
    </div>
    <div class="col-lg-4 mt-3">
        <label for="model">Model</label>
        <input type="text" class="form-control" id="model" name="model">
    </div>
    <div class="col-lg-4 mt-3">
        <label for="year">Year</label>
        <input type="text" class="form-control" id="year" name="year">
    </div>
    <div class="col-lg-4 mt-3" id="fuel_box">
        <label for="fuel">Fuel</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('fuel_box',value,'fuel')" name="fuel" id="fuel">
            <option value="">Select Fuel Type</option>
            <option value="Other">Other</option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Hybrid">Hybrid</option>
            <option value="Electric">Electric</option>
            <option value="LPG">LPG</option>
        </select>
    </div>
    <div class="col-lg-4 mt-3" id="condition_box">
        <label for="condition">Condition</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('condition_box',value,'condition')" name="condition" id="condition">
            <option value="" selected disabled>Select Condition</option>
            <option value="Other">Other</option>
            <option value="New">New</option>
            <option value="Used">Used</option>
            <option value="Certified Pre-Owned">Certified Pre-Owned</option>

        </select>
    </div>
</div>

<script defer>
    valueAdder('make', "{{ isset($ad_info->make)?$ad_info->make:'' }}");
    valueAdder('model', "{{ isset($ad_info->model)?$ad_info->model:'' }}");
    valueAdder('year', "{{ isset($ad_info->year)?$ad_info->year:'' }}");
    valueAdder('fuel', "{{ isset($ad_info->fuel)?$ad_info->fuel:'' }}");
    valueAdder('condition', "{{ isset($ad_info->condition)?$ad_info->condition:'' }}");
</script>
