<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3">
        <label for="area">Area -(m<sup>2</sup>)</label>
        <input type="text" class="form-control" id="area" name="area">
    </div>
    <div class="col-lg-4 mt-3" id="condition_box">
        <label for="condition">Condition</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('condition_box',value,'condition')" name="condition" id="condition">
            <option value="" selected disabled>Select Condition</option>
            <option value="Other">Other</option>
            <option value="Resale">Resale</option>
            <option value="New">New</option>
            <option value="Pre-Construction">Pre-Construction</option>
        </select>
    </div>
</div>

<script defer>
    valueAdder('area', "{{ isset($ad_info->area)?$ad_info->area:'' }}");
    valueAdder('condition', "{{ isset($ad_info->condition)?$ad_info->condition:'' }}");
</script>
