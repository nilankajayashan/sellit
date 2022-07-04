@extends('template.app')
@section('content')
    <?php $sub=0; ?>
    <script>
        function load_sub(value,cat){
            if (value == 'other_items'){
                load_form(value)
            }else{
                var sub = document.getElementById('sub');
                sub.innerHTML='';
                sub.innerHTML = '<option selected disabled>Sub Categories</option>';
                //new sub
                for(var i = 0;i<cat.length;i++) {
                    if (cat[i].parent_id == value) {
                        var option = document.createElement('option');
                        option.setAttribute('value', cat[i].name);
                        option.innerText = CapitalEach(cat[i].name.replace(/_/g, " "));
                        sub.appendChild(option);

                    }
                }
            }
            //var all = document.createElement()
        }
        function load_form(value,form_name){
            $("#postform").load( 'http://127.0.0.1:8000/post_form?name='+value);
        }
    </script>
<div class="container mt-3">
    <h4> Post Your Ad </h4>
    <select class="form-select form-select mb-3" aria-label=".form-select-lg example" onchange="load_sub(value,{{$categories}})">
        <option selected disabled>Main Categories</option>
        @foreach($categories as $cat)
            @if($cat->parent_id == 0)
                 <option value="{{$cat->category_id }}" >{{ ucwords(str_replace('_', ' ', $cat->name)) }}</option>
            @endif
        @endforeach
        <option value="other_items">Other Items</option>
    </select>
    <select class="form-select form-select" aria-label=".form-select-sm example" id="sub" onchange="load_form(value)" >
        <option selected disabled>Sub Categories</option>
    </select>
    <div id="postform" class="mt-3"></div>
</div>
@endsection

