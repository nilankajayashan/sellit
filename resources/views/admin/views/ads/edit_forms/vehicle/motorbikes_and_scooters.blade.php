<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3" id="make_box">
        <label for="make">Make</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange=" OptionBox('make_box',value,'make') " name="make" id="make">
            <option value="">Select Make</option>
            <option value="Other">Other</option>
            <option value="Aprilia">Aprilia</option>
            <option value="Ariel">Ariel</option>
            <option value="Benelli">Benelli</option>
            <option value="Bimota">Bimota</option>
            <option value="Bmw">Bmw</option>
            <option value="Buell">Buell</option>
            <option value="Cagiva">Cagiva</option>
            <option value="Cz">Cz</option>
            <option value="Derbi">Derbi</option>
            <option value="Ducati">Ducati</option>
            <option value="Gilera">Gilera</option>
            <option value="Harley-Davidson">Harley-Davidson</option>
            <option value="Honda">Honda</option>
            <option value="Husqvarna">Husqvarna</option>
            <option value="Hyosung">Hyosung</option>
            <option value="Jawa">Jawa</option>
            <option value="Kawasaki">Kawasaki</option>
            <option value="Ktm">Ktm</option>
            <option value="Kymco">Kymco</option>
            <option value="Malaguti">Malaguti</option>
            <option value="Moto Guzzi">Moto Guzzi</option>
            <option value="Mv Agusta">Mv Agusta</option>
            <option value="Mz">Mz</option>
            <option value="Peugeot">Peugeot</option>
            <option value="Piaggio">Piaggio</option>
            <option value="Polaris">Polaris</option>
            <option value="Rieju">Rieju</option>
            <option value="Romet">Romet</option>
            <option value="Simson">Simson</option>
            <option value="Suzuki">Suzuki</option>
            <option value="Triumph">Triumph</option>
            <option value="Vespa">Vespa</option>
            <option value="Yamaha">Yamaha</option>
            <option value="Zipp">Zipp</option>
        </select>
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
    <div class="col-lg-4 mt-3" id="transmission_box">
        <label for="transmission">Transmission</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('transmission_box',value,'transmission')" name="transmission" id="transmission">
            <option value="">Select Transmission</option>
            <option value="Other">Other</option>
            <option value="Manual">Manual</option>
            <option value="Automatic">Automatic</option>
            <option value="Semi-Automatic">Semi-Automatic</option>
        </select>
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
            <option value="">Select Condition</option>
            <option value="Other">Other</option>
            <option value="New">New</option>
            <option value="Used">Used</option>
            <option value="Certified Pre-Owned">Certified Pre-Owned</option>

        </select>
    </div>
    <input type="hidden" id="features_value" name="features">
    <div class="row" id="features">
        <span >Features</span>
        <script>
            var features=['Bodywork/Fairing','Headlights','Paint Job','Windshield','Handlebars/Clip Ons','Mirrors','Rear lights/Indicators','Anti-Lock Brakes','Immobiliser','Seat cover/Solo seat','Steering Damper','Case/Topcase','Rolling bars/Frame sliders','Security Alarm','Brakes upgrade','Special Exhaust/Slip on','Suspension','Tuned Engine'];

            for(let index in features){
                var feature = '<div class="form-check col-lg-3 col-sm-1">\
                    <input class="form-check-input" type="checkbox" id="'+features[index]+'" value="'+features[index]+'" onclick="checkListUpdater(\'features_value\', this.value, this.checked)">\
                    <label class="form-check-label" for="'+features[index]+'">\
                    '+features[index]+'\
                </label>\
            </div>'
                document.getElementById('features').innerHTML = document.getElementById('features').innerHTML+feature;
            }

        </script>

    </div>
</div>

<script defer>
    valueAdder('make', "{{ isset($ad_info->make)?$ad_info->make:'' }}");
    valueAdder('model', "{{ isset($ad_info->model)?$ad_info->model:'' }}");
    valueAdder('year', "{{ isset($ad_info->year)?$ad_info->year:'' }}");
    valueAdder('mileage', "{{ isset($ad_info->mileage)?$ad_info->mileage:'' }}");
    valueAdder('transmission', "{{ isset($ad_info->transmission)?$ad_info->transmission:'' }}");
    valueAdder('fuel', "{{ isset($ad_info->fuel)?$ad_info->fuel:'' }}");
    valueAdder('condition', "{{ isset($ad_info->condition)?$ad_info->condition:'' }}");
    let features = ['Bodywork/Fairing','Headlights','Paint Job','Windshield','Handlebars/Clip Ons','Mirrors','Rear lights/Indicators','Anti-Lock Brakes','Immobiliser','Seat cover/Solo seat','Steering Damper','Case/Topcase','Rolling bars/Frame sliders','Security Alarm','Brakes upgrade','Special Exhaust/Slip on','Suspension','Tuned Engine'];
    let value_list = "{{ $ad_info->features }}".split(',');
    for(let index in features) {
        let id = document.getElementById(features[index]);
        for(let inner_index in value_list){
            if(value_list[inner_index] === id.value){
                id.checked = true;
            }
        }
    }
</script>
