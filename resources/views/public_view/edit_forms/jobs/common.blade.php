<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3" id="industry_box">
        <label for="industry">Industry</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('industry_box',value,'industry')" name="industry" id="industry">
            <option value="" selected disabled>Select Industry</option>
            <option value="Other">Other</option>
            <option value="Accounting">Accounting</option>
            <option value="Advertising">Advertising</option>
            <option value="Aerospace">Aerospace</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Arts &amp; Media">Arts &amp; Media</option>
            <option value="Automotive">Automotive</option>
            <option value="Communications">Communications</option>
            <option value="Construction">Construction</option>
            <option value="Consulting">Consulting</option>
            <option value="Consumer Products">Consumer Products</option>
            <option value="Education &amp; Training">Education &amp; Training</option>
            <option value="Engineering">Engineering</option>
            <option value="Government">Government</option>
            <option value="Health">Health</option>
            <option value="Insurance">Insurance</option>
            <option value="Legal">Legal</option>
            <option value="Manufacturing">Manufacturing</option>
            <option value="Personal Care">Personal Care</option>
            <option value="Real Estate">Real Estate</option>
            <option value="Restaurant &amp; Food">Restaurant &amp; Food</option>
            <option value="Sports">Sports</option>
            <option value="Technology">Technology</option>
            <option value="Telecommunications">Telecommunications</option>
        </select>
    </div>

    <div class="col-lg-4 mt-3" id="job_type_box">
        <label for="job_type">Job Type</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('job_type_box',value,'job_type')" name="job_type" id="job_type">
            <option value="" selected disabled>Select Job Type</option>
            <option value="Other">Other</option>
            <option value="Permanent">Permanent</option>
            <option value="Part-time">Part-time</option>
            <option value="Temporary/Contract">Temporary/Contract</option>
        </select>
    </div>

    <div class="col-lg-4 mt-3" id="work_experience_box">
        <label for="work_experience">Work Experience</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('work_experience_box',value,'work_experience')" name="work_experience" id="work_experience">
            <option value="" selected disabled>Select Work Experience</option>
            <option value="Other">Other</option>
            <option value="1 To 2 Years">1 To 2 Years</option>
            <option value="10+ Years">10+ Years</option>
            <option value="2 To 5 Years">2 To 5 Years</option>
            <option value="5 To 7 Years">5 To 7 Years</option>
            <option value="7 To 10 Years">7 To 10 Years</option>
            <option value="At Least 1 Year">At Least 1 Year</option>
            <option value="At Least 3 Years">At Least 3 Years</option>
            <option value="Less Than 1 Year">Less Than 1 Year</option>
            <option value="More Than 5 Years">More Than 5 Years</option>
        </select>
    </div>
</div>

<script defer>
    valueAdder('industry', "{{ isset($ad_info->industry)?$ad_info->industry:'' }}");
    valueAdder('job_type', "{{ isset($ad_info->job_type)?$ad_info->job_type:'' }}");
    valueAdder('work_experience', "{{ isset($ad_info->work_experience)?$ad_info->work_experience:'' }}");
</script>
