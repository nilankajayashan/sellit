
function OptionBox(boxid,value,name){
    var box = document.getElementById(boxid);
    if(value == 'Other' && box.childElementCount <= 2){
        var make_input = document.createElement('input');
        make_input.setAttribute('id',toString(value)+'_option');
        make_input.setAttribute('placeholder','Type your option here...');
        make_input.setAttribute('name', name);
        make_input.setAttribute('class','form-control');
        make_input.setAttribute('type','text');
        box.appendChild(make_input);
    }else if(box.childElementCount >= 3){
        box.removeChild(document.getElementById(toString(value)+'_option'));
    }
}

function CapitalEach(words) {
    var separateWord = words.toLowerCase().split(' ');
    for (var i = 0; i < separateWord.length; i++) {
        separateWord[i] = separateWord[i].charAt(0).toUpperCase() +
            separateWord[i].substring(1);
    }
    return separateWord.join(' ');
}

function valueAdder(id, valueToSelect) {
    let element = document.getElementById(id);
    element.value = valueToSelect

}
function valuechecker(id, valueToSelect) {
    let element = document.getElementById(id);
    if(element.value == valueToSelect){
        element.checked = true;
    }

}

function selectedSubFilterRemover(id){
    document.getElementById(id).remove();
    document.getElementById('selected-sub-filters-form').submit();
}

function checkListUpdater(id,value, checked){
    let value_holder = document.getElementById(id);
    if(checked){
        if (value_holder.value === ''){
            value_holder.value = value;
        }else{
            value_holder.value += ',' + value;
        }
    }else{
        let value_list = value_holder.value.split(',');
        value_holder.value = '';
        for(let index = 0; index<value_list.length; index++){
            if(value_list[index] !== value){
                //delete feature_list[index];
                if (value_holder.value === ''){
                    value_holder.value = value_list[index];
                }else{
                    value_holder.value += ',' + value_list[index];
                }
            }
        }
    }
}

function mainImageAdder(value){
    var ids = document.querySelectorAll("[id*='main_image-']"), i = 0;
    for (; i < ids.length; i++){
        if(i === value ){
            document.getElementById('main_image-'+i).checked=true;
            document.getElementById('main_image').value = i;
        }
    }

}
function packageChanger(value){
    let packages = value;
    packages = JSON.stringify(packages);
    if(packages.includes("highlighted")){
        document.getElementById('highlighted').checked = true;
    }else{
        document.getElementById('highlighted').checked = false;
    }
    if(packages.includes("priority")){
        document.getElementById('priority').checked = true;
    }else{
        document.getElementById('priority').checked = false;
    }
    if(packages.includes("urgent")){
        document.getElementById('urgent').checked = true;
    }else{
        document.getElementById('urgent').checked = false;
    }
}
function textElementValue(id, userValue){

    document.getElementById(id).value = userValue;
}


// image crop



    $(document).ready(function(){
    $("body").on("change", "#file", function (e) {
        $('.singleImageCanvasContainer').remove();
        $('#post_img_data').val('');
    });
})


    //Multiple image cropper and preview on creating post
    var c;
    var galleryImagesContainer = document.getElementById('galleryImages');
    var imageCropFileInput = document.getElementById('file');
    var cropperImageInitCanvas = document.getElementById('cropperImg');
    var cropImageButton = document.getElementById('cropImageBtn');
    // Crop Function On change
    function imagesPreview(input) {
    var cropper;
    //cropImageButton.className = 'show';
    var img = [];
    if (input.files.length) {
    var i = 0;
    var index = 0;
    for (let singleFile of input.files) {
    var reader = new FileReader();
    reader.onload = function(event) {
    var blobUrl = event.target.result;
    img.push(new Image());
    img[i].onload = function(e) {
    // Canvas Container
    var singleCanvasImageContainer = document.createElement('div');
    singleCanvasImageContainer.id = 'singleImageCanvasContainer'+index;
    singleCanvasImageContainer.className = 'singleImageCanvasContainer col-lg-4 col-12';
        // <input className="form-check-input ms-1" type="checkbox" role="switch" id="priority" name="priority"
        //        onChange="calPriority()">
        //     <label className="form-check-label fs-5" htmlFor="ad_option">Priority</label>
    var main_toggle = document.createElement('input');
    main_toggle.setAttribute('class', 'form-check-input ms-1');
    main_toggle.setAttribute('type', 'radio');
    main_toggle.setAttribute('role', 'switch');
    main_toggle.setAttribute('name', 'main_image');
    main_toggle.setAttribute('id', 'image'+index);
    var main_toggle_label = document.createElement('label');
    main_toggle_label.setAttribute('class', 'form-check-label ms-3');
    main_toggle_label.setAttribute('for', 'image'+index);
    main_toggle_label.innerText='Mark as Main Image'
    singleCanvasImageContainer.appendChild(main_toggle);
    singleCanvasImageContainer.appendChild(main_toggle_label);
    document.getElementById('main_image').value = index;
    // Canvas Close Btn
    var singleCanvasImageCloseBtn = document.createElement('button');
    var singleCanvasImageCloseBtnText = document.createTextNode('X');
    // var singleCanvasImageCloseBtnText = document.createElement('i');
    // singleCanvasImageCloseBtnText.className = 'fa fa-times';
    singleCanvasImageCloseBtn.id = 'singleImageCanvasCloseBtn'+index;
    singleCanvasImageCloseBtn.className = 'singleImageCanvasCloseBtn';
    singleCanvasImageCloseBtn.classList.add("btn", "btn-sm");
    singleCanvasImageCloseBtn.onclick = function() {
    removeSingleCanvas(this)
};
    singleCanvasImageCloseBtn.appendChild(singleCanvasImageCloseBtnText);
    singleCanvasImageContainer.appendChild(singleCanvasImageCloseBtn);
    // Image Canvas
    var canvas = document.createElement('canvas');
    canvas.id = 'imageCanvas'+index;
    canvas.className = 'imageCanvas singleImageCanvas';
    canvas.width = e.currentTarget.width;
    canvas.height = e.currentTarget.height;
    canvas.onclick = function() {cropInit(canvas.id);};
    singleCanvasImageContainer.appendChild(canvas)
    // Canvas Context
    var ctx = canvas.getContext('2d');
    ctx.drawImage(e.currentTarget,0,0);
    // galleryImagesContainer.append(canvas);
    galleryImagesContainer.appendChild(singleCanvasImageContainer);
    // while (document.querySelectorAll('.singleImageCanvas').length == input.files.length) {
    //     var allCanvasImages = document.querySelectorAll('.singleImageCanvas')[0].getAttribute('id');
    //     console.log(allCanvasImages);
    //     //commented by sam
    //     //cropInit(allCanvasImages);
    //     break;
    // };
    urlConversion();
    index++;
};
    img[i].src = blobUrl;
    i++;
}
    reader.readAsDataURL(singleFile);
}
}
}

    imageCropFileInput.addEventListener("change", function(event){

    $('#cropperModal').modal('show');
    var mediaValidation = validatePostMedia(event.target.files);
    if(!mediaValidation){
    var $el = $('#file');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    return false;
}

    $('#mediaPreview').empty();
    $('.singleImageCanvasContainer').remove();
    if(cropperImageInitCanvas.cropper){
    cropperImageInitCanvas.cropper.destroy();
    cropperImageInitCanvas.width = 0;
    cropperImageInitCanvas.height = 0;
    cropImageButton.style.display = 'none';
}
    imagesPreview(event.target);
});
    // Initialize Cropper
    function cropInit(selector) {
    c = document.getElementById(selector);

    if(cropperImageInitCanvas.cropper){
    cropperImageInitCanvas.cropper.destroy();
}
    var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
    for (let element of allCloseButtons) {
    element.style.display = 'block';
}
    c.previousSibling.style.display = 'none';
    // c.id = croppedImg;
    var ctx=c.getContext('2d');
    var imgData=ctx.getImageData(0, 0, c.width, c.height);
    var image = cropperImageInitCanvas;
    image.width = c.width;
    image.height = c.height;
    var ctx = image.getContext('2d');
    ctx.putImageData(imgData,0,0);

    cropper = new Cropper(image, {
    aspectRatio: 16/9,
    viewMode: 4,
    preview: '.img-preview',
    crop: function(event) {
    cropImageButton.style.display = 'block';
}
});

}

    function image_crop() {
    if(cropperImageInitCanvas.cropper){
    var cropcanvas = cropperImageInitCanvas.cropper.getCroppedCanvas({
    width: 250, height: 150
});
    // document.getElementById('cropImages').appendChild(cropcanvas);
    var ctx=cropcanvas.getContext('2d');
    var imgData=ctx.getImageData(0, 0, cropcanvas.width, cropcanvas.height);
    // var image = document.getElementById(c);
    c.width = cropcanvas.width;
    c.height = cropcanvas.height;
    var ctx = c.getContext('2d');
    ctx.putImageData(imgData,0,0);
    cropperImageInitCanvas.cropper.destroy();
    cropperImageInitCanvas.width = 0;
    cropperImageInitCanvas.height = 0;
    cropImageButton.style.display = 'none';
    var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
    for (let element of allCloseButtons) {
    element.style.display = 'block';
}
    urlConversion();
} else {
    alert('Please select any Image you want to crop');
}
}
    cropImageButton.addEventListener("click", function(){
    image_crop();
});
    // Image Close/Remove
    function removeSingleCanvas(selector) {
    selector.parentNode.remove();
    urlConversion();
}

    function urlConversion() {
    var allImageCanvas = document.querySelectorAll('.singleImageCanvas');
    var convertedUrl = '';
    canvasLength = allImageCanvas.length;
    for (let element of allImageCanvas) {
    convertedUrl += element.toDataURL('image/jpeg');
    convertedUrl += 'img_url';
}
    document.getElementById('post_img_data').value = convertedUrl;
}

    function validatePostMedia(files){

    $('#imageValidate').empty();
    let err = 0;
    let ResponseTxt = '';
    if(files.length > 10){
    err += 1;
    ResponseTxt += '<p> You can select maximum 10 files. </p>';
}
    $(files).each(function(index, file) {
    if(file.size > 9048576){
    err +=  1;
    ResponseTxt += 'File : '+file.name + ' is greater';
}
});

    if(err > 0){
    $('#imageValidate').html(ResponseTxt);
    return false;
}
    return true;

}
// end image crop

