<!doctype html>
<html lang="en">
@include('component/header')
<body class="bg-light">
<div class="fullContent">
    <div>
        @include('component/top_nav')
    </div>
    <main class="container p-0">

        @yield('content')

    </main>
</div>
<div>
    @include('component/footer')
</div>
<a class="btn float-right" onclick="topFunction()" id="myBtnTop"><i class="fa fa-arrow-up text-white"></i></a>
</body>
<script>
   let mybutton = document.getElementById("myBtnTop");

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
</html>

