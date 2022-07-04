@include('component/header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossOrigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossOrigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.5/cropper.min.js"
        integrity="sha512-E4KfIuQAc9ZX6zW1IUJROqxrBqJXPuEcDKP6XesMdu2OV4LW7pj8+gkkyx2y646xEV7yxocPbaTtk2LQIJewXw=="
        crossOrigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.5/cropper.min.css"
      integrity="sha512-Aix44jXZerxlqPbbSLJ03lEsUch9H/CmnNfWxShD6vJBbboR+rPdDXmKN+/QjISWT80D4wMjtM4Kx7+xkLVywQ=="
      crossOrigin="anonymous" referrerpolicy="no-referrer"/>
<script>
    function total(operation,value){
        let total_price = document.getElementById('total_price');
        if(operation === 'add'){
            document.getElementById('total').value = parseInt(document.getElementById('total').value) + parseInt(value);
        }else if(operation === 'sub'){
            document.getElementById('total').value = parseInt(document.getElementById('total').value) - parseInt(value);
        }
        total_price.innerText = document.getElementById('total').value;
    }
    function calHighlighted() {
        let finalize_table_body = document.getElementById('finalize_table_body');
        let highlighted = document.getElementById('highlighted').checked;
        if(highlighted){
            let row = document.createElement('tr');
            row.setAttribute('id','highlighted_row');
            let row_head = document.createElement('th');
            row_head.innerText='Highlighted';
            let row_data = document.createElement('td');
            row_data.innerText= 'Rs.500/='
            row.appendChild(row_head);
            row.appendChild(row_data);
            finalize_table_body.appendChild(row);
            total('add',500);
        }else{
            document.getElementById('highlighted_row').remove();
            total('sub',500);
        }
    }


    function calPriority() {
        let finalize_table_body = document.getElementById('finalize_table_body');
        let priority = document.getElementById('priority').checked;
        if(priority){
            let row = document.createElement('tr');
            row.setAttribute('id','priority_row');
            let row_head = document.createElement('th');
            row_head.innerText='Priority';
            let row_data = document.createElement('td');
            row_data.innerText= 'Rs.0/='
            row.appendChild(row_head);
            row.appendChild(row_data);
            finalize_table_body.appendChild(row);
            total('add',0);
        }else{
            document.getElementById('priority_row').remove();
            total('sub',0);
        }
    }

    function calUrgent() {
        let finalize_table_body = document.getElementById('finalize_table_body');
        let urgent = document.getElementById('urgent').checked;
        if(urgent){
            let row = document.createElement('tr');
            row.setAttribute('id','urgent_row');
            let row_head = document.createElement('th');
            row_head.innerText='Urgent';
            let row_data = document.createElement('td');
            row_data.innerText= 'Rs.500/='
            row.appendChild(row_head);
            row.appendChild(row_data);
            finalize_table_body.appendChild(row);
            total('add',500);
        }else{
            document.getElementById('urgent_row').remove();
            total('sub',500);
        }
    }

    $("#specific").load( 'http://127.0.0.1:8000/admin_specific_form?name={{ Request::get('name') }}');
</script>
<script>
    function change_town(value){
            towns = [];
            switch (value) {
                case 'Ampara':
                    towns=["Akkarepattu","Ampara","Kalmunai","Sainthamaruthu"];
                    break;
                case 'Anuradhapura':
                    towns=["Anuradhapura","Eppawala","Galenbindunuwewa","Galnewa","Habarana","Kekirawa","Medawachchiya","Mihintale","Nochchiyagama","Talawa","Tambuttegama"];
                    break;
                case 'Badulla':
                    towns=["Badulla","Bandarawela","Diyatalawa","Ella","Hali Ela","Haputale","Mahiyanganaya","Passara","Welimada"];
                    break;
                case 'Batticaloa':
                    towns=["Batticaloa"];
                    break;
                case 'Colombo':
                    towns=["Angoda","Athurugiriya","Avissawella","Battaramulla","Boralesgamuwa","Colombo 1","Colombo 10","Colombo 11","Colombo 12","Colombo 13","Colombo 14","Colombo 15","Colombo 2","Colombo 3","Colombo 4","Colombo 5","Colombo 6","Colombo 7","Colombo 8","Colombo 9","Dehiwala","Hanwella","Homagama","Kaduwela","Kesbewa","Kohuwala","Kolonnawa","Kottawa","Kotte","Maharagama","Malabe","Moratuwa","Mount Lavinia","Nawala","Nugegoda","Padukka","Pannipitiya","Piliyandala","Rajagiriya","Ratmalana","Talawatugoda","Wellampitiya"];
                    break;
                case 'Galle':
                    towns=["Ahangama","Ambalangoda","Baddegama","Batapola","Bentota","Elpitiya","Galle","Hikkaduwa","Karapitiya"];
                    break;
                case 'Gampaha':
                    towns=["Delgoda","Divulapitiya","Gampaha","Ganemulla","Ja-Ela","Kadawatha","Kandana","Katunayake","Kelaniya","Kiribathgoda","Minuwangoda","Mirigama","Negombo","Nittambuwa","Ragama","Veyangoda","Wattala"];
                    break;
                case 'Hambantota':
                    towns=["Ambalantota","Beliatta","Hambantota","Tangalla","Tissamaharama"];
                    break;
                case 'Jaffna':
                    towns=["Chavakachcher","Jaffna","Nallur"];
                    break;
                case 'Kalutara':
                    towns=["Alutgama","Bandaragama","Beruwala","Horana","Ingiriya","Kalutara","Matugama","Panadura","Wadduwa"];
                    break;
                case 'Kandy':
                    towns=["Akurana","Ampitiya","Digana","Galagedara","Gampola","Gelioya","Kadugannawa","Kandy","Katugastota","Kundasale","Madawala Bazaar","Nawalapitiya","Peradeniya","Pilimatalawa","Wattegama"];
                    break;
                case 'Kegalle':
                    towns=["Dehiowita","Deraniyagala","Galigamuwa","Kegalle","Kitulgala","Mawanella","Rambukkana","Ruwanwella","Warakapola","Yatiyantota"];
                    break;
                case 'Kilinochchi':
                    towns=["Kilinochchi"];
                    break;
                case 'Kurunegala':
                    towns=["Alawwa","Bingiriya","Galgamuwa","Giriulla","Hettipola","Ibbagamuwa","Kuliyapitiya","Kurunegala","Mawathagama","Narammala","Nikaweratiya","Pannala","Polgahawela","Wariyapola",];
                    break;
                case 'Mannar':
                    towns=["Mannar"];
                    break;
                case 'Matale':
                    towns=["Dambulla","Galewela","Matale","Palapathwela","Rattota","Sigiriya","Ukuwela","Yatawatta"];
                    break;
                case 'Matara':
                    towns=["Akuressa","Deniyaya","Dikwella","Hakmana","Kamburugamuwa","Kamburupitiya","Kekanadurra","Matara","Weligama"];
                    break;
                case 'Matara':
                    towns=["Akuressa","Deniyaya","Dikwella","Hakmana","Kamburugamuwa","Kamburupitiya","Kekanadurra","Matara","Weligama"];
                    break;
                case 'Moneragala':
                    towns=["Bibile","Buttala","Kataragama","Moneragala","Wellawaya"];
                    break;
                case 'Mullativu':
                    towns=["Mullativu City"];
                    break;
                case 'Nuwara Eliya':
                    towns=["Ginigathena","Hatton","Madulla","Nuwara Eliya"];
                    break;
                case 'Polonnaruwa':
                    towns=["Hingurakgoda","Kaduruwela","Medirigiriya","Polonnaruwa"];
                    break;
                case 'Puttalam':
                    towns=["Chilaw","Dankotuwa","Marawila","Nattandiya","Puttalam","Wennappuwa"];
                    break;
                case 'Ratnapura':
                    towns=["Balangoda","Eheliyagoda","Embilipitiya","Kuruwita","Pelmadulla","Ratnapura"];
                    break;
                case 'Trincomalee':
                    towns=["Kinniya","Trincomalee"];
                    break;
                case 'Vavuniya':
                    towns=["Vavuniya"];
                    break;
                default:
                    towns = [];
                    break;
            }
            var town_select = document.getElementById('town_option');
            town_select.innerHTML='';
            town_select.innerHTML = '<option selected disabled>Select Town</option>';
            for( let index in towns){
                var option = document.createElement('option');
                option.setAttribute('value', towns[index]);
                option.innerText = towns[index];
                town_select.appendChild(option);
            }
    }
</script>
<form method="POST" action="{{ route('admin_submit_post') }}" enctype="multipart/form-data">
{{--    common--}}
@csrf
    <input type="hidden" name="category" value="{{ Request::get('name') }}">
    <div class="alert alert-primary" role="alert">Ad Description</div>
    <div class="form-group">
        <label for="tittle">Tittle</label>
        <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Ad tittle">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

{{--    specific--}}
    <div class="alert alert-primary mt-3" role="alert">Ad Information</div>
    <div class="row">
        <div class="col">
            <label for="price">Price [Sri Lanka Rupee]</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="col">
            <label for="city">City</label>
            <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" onchange="change_town(value)" name="city">
                <option value="">Select City</option>
                <option value="Ampara">Ampara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>
                <option value="Matara">Matara</option>
                <option value="Moneragala">Moneragala</option>
                <option value="Mullativu">Mullativu</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavuniya">Vavuniya</option>
            </select>
        </div>
        <div class="col">
            <label for="town">Town</label>
            <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="town" id="town_option">
                <option selected disabled>Select City First</option>
            </select>
        </div>
    </div>

    <span id="specific"></span>


        <div class="alert alert-primary mt-3" role="alert">User Information</div>
        <div class="row">
            <div class="col-lg-6">
                <label for="guest_first_name">Guest: </label>
                <input type="radio" name="user" value="guest">
                <div class="form-floating">
                    <select class="form-select" id="guest" aria-label="Guest User" name="guest">
                        <option selected disabled>Select Guest User</option>
                        @foreach($guests as $guest)
                            <option value="{{ $guest->user_id }}">{{ $guest->user_id.' | '.$guest->user_name.' | '.$guest->email }}</option>
                        @endforeach
                    </select>
                    <label for="guest">User ID | Name | Email</label>
                </div>
            </div>
            <div class="col-lg-6">
                <label for="guest_first_name">Users: </label>
                <input type="radio" name="user" value="user" checked="true">
                <div class="form-floating">
                    <select class="form-select" id="guest" aria-label="Guest User" name="registered">
                        <option selected disabled>Select Guest User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->user_id }}">{{ $user->user_id.' | '.$user->user_name.' | '.$user->email }}</option>
                        @endforeach
                    </select>
                    <label for="guest">User ID | Name | Email</label>
                </div>
            </div>
        </div>

    <div class="alert alert-primary mt-3" role="alert">Ad Photos</div>
    <input type="file" name="file" id="file" accept="image/*" multiple />

    <input type="hidden" id="post_img_data" name="image_data_url">

        <div class="img-preview mt-2"></div>
        <div id="galleryImages"></div>
        <div id="cropper">
            <canvas id="cropperImg" width="0" height="0"></canvas>
            <button type="button" class="cropImageBtn btn btn-danger col-12 mt-2" style="display:none;" id="cropImageBtn">Crop</button>
        </div>
        <div id="imageValidate" class="text-danger"></div>
    <input type="hidden" name="main_image" value="0" id="main_image">
    <div class="alert alert-primary mt-3" role="alert">Extra Options</div>
    <div class="row justify-content-lg-evenly">
        <div class="col-lg-3 card bg-white shadow border border-success text-center form-check form-switch ">
                <input class="form-check-input ms-1" type="checkbox" role="switch" id="highlighted" name="highlighted" onchange="calHighlighted()">
                <label class="form-check-label fs-5" for="ad_option">Highlighted</label>
                <p>Your ad will be colored differently to be more visible.</p>
                <h3><span class="badge bg-success">Price: Rs.500/=</span></h3>
        </div>
        <div class="col-lg-3 card bg-white shadow border border-primary text-center form-check form-switch">
            <input class="form-check-input ms-1" type="checkbox" role="switch" id="priority" name="priority" onchange="calPriority()">
            <label class="form-check-label fs-5" for="ad_option">Priority</label>
            <p>Your ad will be placed on top of search pages.</p>
            <h3><span class="badge bg-primary">Price: Rs.0/=</span></h3>
        </div>
        <div class="col-lg-3 card bg-white shadow border border-danger text-center form-check form-switch">
            <input class="form-check-input ms-1" type="checkbox" role="switch" id="urgent" name="urgent" onchange="calUrgent()">
            <label class="form-check-label fs-5" for="ad_option">Urgent</label>
            <p>Show your ad with an Urgent tag.</p>
            <h3><span class="badge bg-danger">Price: Rs.500/=</span></h3>
        </div>
    </div>

    <div class="alert alert-primary mt-3" role="alert">Finalize</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Plan</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody id="finalize_table_body">

        </tbody>
        <span>
            <tr>
                <th>Total</th>
                <td>Rs. <span id="total_price">0</span> /=</td>
            </tr>
            <input type="hidden" name="total" id="total" value="0">
        </span>
    </table>
    <div class="form-group mt-3 mb-5">
        <button type="submit" value="submit" class="btn btn-primary flex col-12">POST AD</button>
    </div>
</form>

