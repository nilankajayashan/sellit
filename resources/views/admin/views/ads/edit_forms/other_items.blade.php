<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3">
        <label for="ad_type">Ad Type</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" name="ad_type" id="ad_type">
            <option value="" selected disabled>Select Ad Type</option>
            <option value="offering">Offering</option>
            <option value="wanted">Wanted</option>
        </select>
    </div>
</div>

<script defer>
    valueAdder('ad_type', "{{ isset($ad_info->ad_type)?$ad_info->ad_type:'' }}");
</script>
