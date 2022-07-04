<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3" id="make_box">
        <label for="make">Make</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange=" OptionBox('make_box',value,'make') " name="make" id="make">
            <option value="" disabled selected>Select Make</option>
            <option value="Other">Other</option>
            <option value="Nissan">Nissan</option>
            <option value="Toyota">Toyota</option>
            <option value="Micro">Micro</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="Mercedes Benz">Mercedes Benz</option>
            <option value="Ford">Ford</option>
            <option value="Tata">Tata</option>
            <option value="Dimo">Dimo</option>
            <option value="Daihatsu">Daihatsu</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Mazda">Mazda</option>
            <option value="Altec">Altec</option>
            <option value="Ashok">Ashok</option>
            <option value="Bobcat">Bobcat</option>
            <option value="Capacity">Capacity</option>
            <option value="Case">Case</option>
            <option value="Caterpillar">Caterpillar</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Custom-Built">Custom-Built</option>
            <option value="Ditch Witch">Ditch Witch</option>
            <option value="Dodge">Dodge</option>
            <option value="Dorsey">Dorsey</option>
            <option value="Eagle">Eagle</option>
            <option value="FL">FL</option>
            <option value="Fontaine">Fontaine</option>
            <option value="Freightliner">Freightliner</option>
            <option value="Fruehauf">Fruehauf</option>
            <option value="Gmc">Gmc</option>
            <option value="Great Dane">Great Dane</option>
            <option value="Hino">Hino</option>
            <option value="Hudson">Hudson</option>
            <option value="Hyundai">Hyundai</option>
            <option value="International">International</option>
            <option value="Jcb">Jcb</option>
            <option value="Jlg">Jlg</option>
            <option value="John Deere">John Deere</option>
            <option value="Kenworth">Kenworth</option>
            <option value="Komatsu">Komatsu</option>
            <option value="Mack">Mack</option>
            <option value="Leyland">Leyland</option>
            <option value="Mitsubishi Fuso">Mitsubishi Fuso</option>
            <option value="Monon">Monon</option>
            <option value="Morgan">Morgan</option>
            <option value="Ottawa">Ottawa</option>
            <option value="Peterbilt">Peterbilt</option>
            <option value="Sterling">Sterling</option>
            <option value="Stoughton">Stoughton</option>
            <option value="Strick">Strick</option>
            <option value="Trail King">Trail King</option>
            <option value="Trailmobile">Trailmobile</option>
            <option value="Transcraft">Transcraft</option>
            <option value="U D">U D</option>
            <option value="Utility">Utility</option>
            <option value="Volvo">Volvo</option>
            <option value="Wabash">Wabash</option>
            <option value="Western">Western</option>
            <option value="Western Star">Western Star</option>
            <option value="White">White</option>
        </select>
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
            var features=['AM/FM Stereo Radio','Air Bags','Air Conditioning','CD Player','Center Console','Climate Control','Clock','Cruise Control','Front Bucket Seats','Heated Seats','Keyless Entry','Moon Roof','Navigation System','Power Brakes','Power Door Locks','Power Mirrors','Power Steering','Power Windows','Premium Wheels','Radial Tires','Reclining Seats','Roof Rack-Luggage','Running Boards','Sun Roof','Tachometer','Tilt Steering Wheel','Trailer Hitch','Trip Computer','Trip Odometerg'];

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
    valueAdder('year', "{{ isset($ad_info->year)?$ad_info->year:'' }}");
    valueAdder('mileage', "{{ isset($ad_info->mileage)?$ad_info->mileage:'' }}");
    valueAdder('transmission', "{{ isset($ad_info->transmission)?$ad_info->transmission:'' }}");
    valueAdder('color', "{{ isset($ad_info->color)?$ad_info->color:'' }}");
    valueAdder('condition', "{{ isset($ad_info->condition)?$ad_info->condition:'' }}");

    //check box
    let features = ['AM/FM Stereo Radio','Air Bags','Air Conditioning','CD Player','Center Console','Climate Control','Clock','Cruise Control','Front Bucket Seats','Heated Seats','Keyless Entry','Moon Roof','Navigation System','Power Brakes','Power Door Locks','Power Mirrors','Power Steering','Power Windows','Premium Wheels','Radial Tires','Reclining Seats','Roof Rack-Luggage','Running Boards','Sun Roof','Tachometer','Tilt Steering Wheel','Trailer Hitch','Trip Computer','Trip Odometerg'];
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
