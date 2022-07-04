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
    <div class="col-lg-4 mt-3">
        <label for="mileage">Mileage-(Km)</label>
        <input type="text" class="form-control" id="mileage" name="mileage">
    </div>
    <div class="col-lg-4 mt-3" id="color_box">
        <label for="color">Color</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('color_box',value,'color')" name="color" id="color">
            <option value="" disabled selected>Select Color</option>
            <option value="Other">Other</option>
            <option value="Beige">Beige</option>
            <option value="Black">Black</option>
            <option value="Blue">Blue</option>
            <option value="Brown">Brown</option>
            <option value="Burgundy/ Maroon">Burgundy/ Maroon</option>
            <option value="Cream/ Pearl">Cream/ Pearl</option>
            <option value="Gold">Gold</option>
            <option value="Green">Green</option>
            <option value="Grey">Grey</option>
            <option value="Orange">Orange</option>
            <option value="Purple">Purple</option>
            <option value="Red">Red</option>
            <option value="Silver">Silver</option>
            <option value="Turquoise/ Teal">Turquoise/ Teal</option>
            <option value="White">White</option>
            <option value="Yellow">Yellow</option>
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
    <div class="col-lg-4 mt-3" id="type_box">
        <label for="type">Engine Type</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('type_box',value,'type')" name="type" id="type">
            <option value="" selected disabled>Select Engine Type</option>
            <option value="Other">Other</option>
            <option value="4 Stroke Engine">4 Stroke Engine</option>
            <option value="2 Stroke Engine">2 Stroke Engine</option>
            <option value="Electric">Electric</option>
        </select>
    </div>
</div>

<script defer>
    valueAdder('make', "{{ isset($ad_info->make)?$ad_info->make:'' }}");
    valueAdder('model', "{{ isset($ad_info->model)?$ad_info->model:'' }}");
    valueAdder('year', "{{ isset($ad_info->year)?$ad_info->year:'' }}");
    valueAdder('mileage', "{{ isset($ad_info->mileage)?$ad_info->mileage:'' }}");
    valueAdder('color', "{{ isset($ad_info->color)?$ad_info->color:'' }}");
    valueAdder('condition', "{{ isset($ad_info->condition)?$ad_info->condition:'' }}");
    valueAdder('type', "{{ isset($ad_info->type)?$ad_info->type:'' }}");
</script>
