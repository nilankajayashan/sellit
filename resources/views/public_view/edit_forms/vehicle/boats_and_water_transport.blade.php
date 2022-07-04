<div class="row">
    <?php $ad_info = isset($ad)?json_decode(json_encode($ad->ad_info)):null; ?>
    <div class="col-lg-4 mt-3" id="make_box">
        <label for="make">Make</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange=" OptionBox('make_box',value,'make') " name="make" id="make">
            <option value="" disabled selected>Select Make</option>
            <option value="Other">Other</option>
            <option value="Albermarle">Albermarle</option>
            <option value="Albin">Albin</option>
            <option value="Alumacraft">Alumacraft</option>
            <option value="Aquasport">Aquasport</option>
            <option value="Azimut">Azimut</option>
            <option value="Baja">Baja</option>
            <option value="Bavaria">Bavaria</option>
            <option value="Bayliner">Bayliner</option>
            <option value="Bayliner Trophy">Bayliner Trophy</option>
            <option value="Beneteau">Beneteau</option>
            <option value="Bertram">Bertram</option>
            <option value="Boston Whaler">Boston Whaler</option>
            <option value="Carver">Carver</option>
            <option value="Cape Horn">Cape Horn</option>
            <option value="Catalina">Catalina</option>
            <option value="Centurion">Centurion</option>
            <option value="Century">Century</option>
            <option value="Chaparral">Chaparral</option>
            <option value="Checkmate">Checkmate</option>
            <option value="Chris Craft">Chris Craft</option>
            <option value="Cigarette">Cigarette</option>
            <option value="Cobalt">Cobalt</option>
            <option value="Cobia">Cobia</option>
            <option value="Contender">Contender</option>
            <option value="Cranchi">Cranchi</option>
            <option value="Crestliner">Crestliner</option>
            <option value="Crownline">Crownline</option>
            <option value="Cruisers">Cruisers</option>
            <option value="Donzi">Donzi</option>
            <option value="Doral">Doral</option>
            <option value="Duck Boats">Duck Boats</option>
            <option value="Dufour">Dufour</option>
            <option value="Egg Harbor">Egg Harbor</option>
            <option value="Elan">Elan</option>
            <option value="Fairline">Fairline</option>
            <option value="Ferretti">Ferretti</option>
            <option value="Fiesta">Fiesta</option>
            <option value="Fisher">Fisher</option>
            <option value="Formula">Formula</option>
            <option value="Fountain">Fountain</option>
            <option value="Fountaine Pajot">Fountaine Pajot</option>
            <option value="Four Winns">Four Winns</option>
            <option value="Glastron">Glastron</option>
            <option value="Grady White">Grady White</option>
            <option value="Grand Banks">Grand Banks</option>
            <option value="Grand Soleil">Grand Soleil</option>
            <option value="Hatteras">Hatteras</option>
            <option value="Honda">Honda</option>
            <option value="Hunter">Hunter</option>
            <option value="Hurricane">Hurricane</option>
            <option value="Hydra Sports">Hydra Sports</option>
            <option value="Hydroplane">Hydroplane</option>
            <option value="Island Packet">Island Packet</option>
            <option value="Jon Boats">Jon Boats</option>
            <option value="Jet Boats">Jet Boats</option>
            <option value="Jeanneau">Jeanneau</option>
            <option value="Kawasaki">Kawasaki</option>
            <option value="Key West">Key West</option>
            <option value="Larson">Larson</option>
            <option value="Lowe">Lowe</option>
            <option value="Luhrs">Luhrs</option>
            <option value="Lund">Lund</option>
            <option value="Mainship">Mainship</option>
            <option value="Mako">Mako</option>
            <option value="Malibu">Malibu</option>
            <option value="Mariah Boats">Mariah Boats</option>
            <option value="Mastercraft">Mastercraft</option>
            <option value="Maxum">Maxum</option>
            <option value="Meridian">Meridian</option>
            <option value="Monterey">Monterey</option>
            <option value="Moomba">Moomba</option>
            <option value="Moody">Moody</option>
            <option value="Morgan">Morgan</option>
            <option value="Nitro">Nitro</option>
            <option value="Pearson">Pearson</option>
            <option value="Pershing">Pershing</option>
            <option value="Pontoon Boat">Pontoon Boat</option>
            <option value="Polaris">Polaris</option>
            <option value="Princess">Princess</option>
            <option value="Proline">Proline</option>
            <option value="Pursuit">Pursuit</option>
            <option value="Ranger">Ranger</option>
            <option value="Regal">Regal</option>
            <option value="Renken">Renken</option>
            <option value="Repo Boats">Repo Boats</option>
            <option value="Rinker">Rinker</option>
            <option value="Riva">Riva</option>
            <option value="Riviera">Riviera</option>
            <option value="Robalo">Robalo</option>
            <option value="Scout">Scout</option>
            <option value="Sea Doo">Sea Doo</option>
            <option value="Sea Pro">Sea Pro</option>
            <option value="Sea Ray">Sea Ray</option>
            <option value="Sealine">Sealine</option>
            <option value="Seaswirl">Seaswirl</option>
            <option value="Shamrock">Shamrock</option>
            <option value="Shrimp Boats">Shrimp Boats</option>
            <option value="Silverton">Silverton</option>
            <option value="Skeeter">Skeeter</option>
            <option value="Stamas">Stamas</option>
            <option value="Starcraft">Starcraft</option>
            <option value="Stingray">Stingray</option>
            <option value="Stratos">Stratos</option>
            <option value="Sun Tracker">Sun Tracker</option>
            <option value="Sunseeker">Sunseeker</option>
            <option value="Supra">Supra</option>
            <option value="Tahoe">Tahoe</option>
            <option value="Tiara">Tiara</option>
            <option value="Tigershark">Tigershark</option>
            <option value="Tollycraft">Tollycraft</option>
            <option value="Tracker">Tracker</option>
            <option value="Triton">Triton</option>
            <option value="Trojan">Trojan</option>
            <option value="Trophy">Trophy</option>
            <option value="Viking">Viking</option>
            <option value="Wellcraft">Wellcraft</option>
            <option value="Westerly">Westerly</option>
            <option value="Yamaha">Yamaha</option>
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
    <div class="col-lg-4 mt-3" id="fuel_box">
        <label for="fuel">Fuel</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('fuel_box',value,'fuel')" name="fuel">
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
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('condition_box',value,'condition')" name="condition">
            <option value="" selected disabled>Select Condition</option>
            <option value="Other">Other</option>
            <option value="New">New</option>
            <option value="Used">Used</option>
            <option value="Certified Pre-Owned">Certified Pre-Owned</option>

        </select>
    </div>
    <div class="col-lg-4 mt-3" id="type_box">
        <label for="type">Type</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('type_box',value,'type')" name="type">
            <option value="" selected disabled>Select Type</option>
            <option value="Other">Other</option>
            <option value="Power Boats">Power Boats</option>
            <option value="Sail Boats">Sail Boats</option>
            <option value="Fishing Boats">Fishing Boats</option>
            <option value="House Boats">House Boats</option>
            <option value="Motor Yachts">Motor Yachts</option>
            <option value="Speed Boats">Speed Boats</option>
            <option value="Personal Watercraft">Personal Watercraft</option>
            <option value="Boat Accessories">Boat Accessories</option>
        </select>
    </div>
    <div class="col-lg-4 mt-3">
        <label for="length">Length-(M)</label>
        <input type="text" class="form-control" id="length" name="length">
    </div>
    <div class="col-lg-4 mt-3" id="hull_type_box">
        <label for="hull_type">Hull Type</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('hull_type_box',value,'hull_type')" name="hull_type" id="hull_type">
            <option value="" selected disabled>Select Hull Type</option>
            <option value="Other">Other</option>
            <option value="Aluminum">Aluminum</option>
            <option value="Ferro-Cement">Ferro-Cement</option>
            <option value="Fiberglass/Composite">Fiberglass/Composite</option>
            <option value="Fiberglass Reinforced">Fiberglass Reinforced</option>
            <option value="Hypalon">Hypalon</option>
            <option value="Inflatable">Inflatable</option>
            <option value="PVC">PVC</option>
            <option value="Plastic">Plastic</option>
            <option value="Rigid Inflatable">Rigid Inflatable</option>
            <option value="Steel">Steel</option>
            <option value="Wood">Wood</option>
        </select>
    </div>
</div>
<script defer>
    valueAdder('make', "{{ isset($ad_info->make)?$ad_info->make:'' }}");
    valueAdder('model', "{{ isset($ad_info->model)?$ad_info->model:'' }}");
    valueAdder('year', "{{ isset($ad_info->year)?$ad_info->year:'' }}");
    valueAdder('fuel', "{{ isset($ad_info->fuel)?$ad_info->fuel:'' }}");
    valueAdder('condition', "{{ isset($ad_info->condition)?$ad_info->condition:'' }}");
    valueAdder('type', "{{ isset($ad_info->type)?$ad_info->type:'' }}");
    valueAdder('length', "{{ isset($ad_info->length)?$ad_info->length:'' }}");
    valueAdder('hull_type', "{{ isset($ad_info->hull_type)?$ad_info->hull_type:'' }}");
</script>
