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
</div>

<script defer>
    valueAdder('make', "{{ isset($ad_info->make)?$ad_info->make:'' }}");
    valueAdder('model', "{{ isset($ad_info->model)?$ad_info->model:'' }}");
</script>
