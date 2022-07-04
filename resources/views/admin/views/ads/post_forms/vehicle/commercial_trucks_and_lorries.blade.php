<div class="row">
    <div class="col-lg-4 mt-3" id="make_box">
        <label for="make">Make</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange=" OptionBox('make_box',value,'make') " name="make" id="make">
            <option value="" disabled selected>Select Make</option>
            <option value="Other">Other</option>
            <option value="Altec">Altec</option>
            <option value="Ashok">Ashok</option>
            <option value="Bobcat">Bobcat</option>
            <option value="BENZ">BENZ</option>
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
            <option value="Ford">Ford</option>
            <option value="Freightliner">Freightliner</option>
            <option value="Fruehauf">Fruehauf</option>
            <option value="Gmc">Gmc</option>
            <option value="Great Dane">Great Dane</option>
            <option value="Hino">Hino</option>
            <option value="Hudson">Hudson</option>
            <option value="Hyundai">Hyundai</option>
            <option value="International">International</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Jcb">Jcb</option>
            <option value="Jlg">Jlg</option>
            <option value="John Deere">John Deere</option>
            <option value="Kenworth">Kenworth</option>
            <option value="Komatsu">Komatsu</option>
            <option value="Mack">Mack</option>
            <option value="Leyland">Leyland</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="Mitsubishi Fuso">Mitsubishi Fuso</option>
            <option value="Monon">Monon</option>
            <option value="Morgan">Morgan</option>
            <option value="Ottawa">Ottawa</option>
            <option value="Peterbilt">Peterbilt</option>
            <option value="Sterling">Sterling</option>
            <option value="Stoughton">Stoughton</option>
            <option value="Strick">Strick</option>
            <option value="TATA">TATA</option>
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
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('transmission_box',value,'transmission')" name="transmission">
            <option value="">Select Transmission</option>
            <option value="Other">Other</option>
            <option value="Manual">Manual</option>
            <option value="Automatic">Automatic</option>
            <option value="Semi-Automatic">Semi-Automatic</option>
        </select>
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
    <div class="col-lg-4 mt-3" id="color_box">
        <label for="color">Color</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('color_box',value,'color')" name="color">
            <option value="" disabled selected>Select Color</option>
            <option value="Other">Other</option>
            <option value="Beige">Beige</option>
            <option value="Black">Black</option>
            <option value="Blue">Blue</option>
            <option value="Brown">Brown</option>
            <option value="Burgundy| Maroon">Burgundy| Maroon</option>
            <option value="Cream| Pearl">Cream| Pearl</option>
            <option value="Gold">Gold</option>
            <option value="Green">Green</option>
            <option value="Grey">Grey</option>
            <option value="Orange">Orange</option>
            <option value="Purple">Purple</option>
            <option value="Red">Red</option>
            <option value="Silver">Silver</option>
            <option value="Turquoise| Teal">Turquoise| Teal</option>
            <option value="White">White</option>
            <option value="Yellow">Yellow</option>
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
</div>
