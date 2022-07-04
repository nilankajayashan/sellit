<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3">
        <label for="area">Area -(m<sup>2</sup>)</label>
        <input type="text" class="form-control" id="area" name="area">
    </div>
</div>
<script defer>
    valueAdder('area', "{{ isset($ad_info->area)?$ad_info->area:'' }}");
</script>
