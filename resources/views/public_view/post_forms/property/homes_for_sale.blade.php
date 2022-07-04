<div class="row">
    <div class="col-lg-4 mt-3" id="property_type_box">
        <label for="property_type">Property Type</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('property_type_box',value,'property_type')" name="property_type">
            <option value="" selected disabled>Select Property Type</option>
            <option value="Other">Other</option>
            <option value="Apartment">Apartment</option>
            <option value="Building">Building</option>
            <option value="Bungalow">Bungalow</option>
            <option value="Business">Business</option>
            <option value="Commercial">Commercial</option>
            <option value="Cottage">Cottage</option>
            <option value="Double Storey">Double Storey</option>
            <option value="General	Godown">General	Godown</option>
            <option value="Maisonette">Maisonette</option>
            <option value="Office">Office</option>
            <option value="Redevelopment">Redevelopment</option>
            <option value="Residential">Residential</option>
            <option value="Town-House">Town-House</option>
        </select>
    </div>
    <div class="col-lg-4 mt-3">
        <label for="bed_rooms">Bed Rooms</label>
        <input type="text" class="form-control" id="bed_rooms" name="bed_rooms">
    </div>
    <div class="col-lg-4 mt-3">
        <label for="bath_rooms">Bath Rooms</label>
        <input type="text" class="form-control" id="bath_rooms" name="bath_rooms">
    </div>
    <div class="col-lg-4 mt-3">
        <label for="area">Area -(m<sup>2</sup>)</label>
        <input type="text" class="form-control" id="area" name="area">
    </div>
    <div class="col-lg-4 mt-3">
        <label for="year_built">Year Built</label>
        <input type="text" class="form-control" id="year_built" name="year_built">
    </div>
    <div class="col-lg-4 mt-3" id="condition_box">
        <label for="condition">Condition</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('condition_box',value,'condition')" name="condition">
            <option value="" selected disabled>Select Condition</option>
            <option value="Other">Other</option>
            <option value="Resale">Resale</option>
            <option value="New">New</option>
            <option value="Pre-Construction">Pre-Construction</option>
        </select>
    </div>
    <input type="hidden" id="amenities_value" name="amenities">
    <div class="row" id="amenities">
        <span >Amenities</span>
        <script>
            var amenities=['Air Conditioned','Basement','Dining Room','Elevator','Fireplace','Furnished','Garage','Garden','Loft','New Construction','Parking','Playground','Pool','Security Features'];

            for(let index in amenities){
                var amenitie = '<div class="form-check col-lg-3 col-sm-1  ">\
                    <input class="form-check-input" type="checkbox" id="'+amenities[index]+'" value="'+amenities[index]+'" onclick="checkListUpdater(\'amenities_value\', this.value, this.checked)" >\
                    <label class="form-check-label" for="'+amenities[index]+'">\
                    '+amenities[index]+'\
                </label>\
            </div>'
                document.getElementById('amenities').innerHTML = document.getElementById('amenities').innerHTML+amenitie;
            }

        </script>

    </div>
    <input type="hidden" id="communityamenities_value" name="community_amenities">
    <div class="row mt-3" id="communityamenities">
        <span >Community Amenities</span>
        <script>
            var communityamenities=['Near School','Near Kindergarden','Near Shop','Near Transit','Mounten View','City View','Ocean View','Water View'];

            for(let index in communityamenities){
                var communityamenitie = '<div class="form-check col-lg-3 col-sm-1  ">\
                    <input class="form-check-input" type="checkbox" id="'+communityamenities[index]+'" value="'+communityamenities[index]+'"onclick="checkListUpdater(\'communityamenities_value\', this.value, this.checked)" >\
                    <label class="form-check-label" for="'+communityamenities[index]+'">\
                    '+communityamenities[index]+'\
                </label>\
            </div>'
                document.getElementById('communityamenities').innerHTML = document.getElementById('communityamenities').innerHTML+communityamenitie;
            }

        </script>

    </div>

</div>
