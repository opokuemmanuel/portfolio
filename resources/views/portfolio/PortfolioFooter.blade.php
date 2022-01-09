<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSE</title>
    @include('portfolio.partials.head')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".icon0").addClass("highlight0");
            $(".links0").click(function() {

                $(".icon0").removeClass("highlight0");
                $(".icon1").removeClass("highlight1");
                $(".icon2").removeClass("highlight2");
                $(".icon3").removeClass("highlight3");
                $(".icon4").removeClass("highlight4");
                $(".icon5").removeClass("highlight5");
                $(".icon6").removeClass("highlight6");

                $(".icon0").addClass("highlight0");
            });

            $(".links1").click(function() {

                $(".icon0").removeClass("highlight0");
                $(".icon1").removeClass("highlight1");
                $(".icon2").removeClass("highlight2");
                $(".icon3").removeClass("highlight3");
                $(".icon4").removeClass("highlight4");
                $(".icon5").removeClass("highlight5");
                $(".icon6").removeClass("highlight6");

                $(".icon1").addClass("highlight1");
            });

            $(".links2").click(function() {

                $(".icon0").removeClass("highlight0");
                $(".icon1").removeClass("highlight1");
                $(".icon2").removeClass("highlight2");
                $(".icon3").removeClass("highlight3");
                $(".icon4").removeClass("highlight4");
                $(".icon5").removeClass("highlight5");
                $(".icon6").removeClass("highlight6");

                $(".icon2").addClass("highlight2");
            });


            $(".links3").click(function() {

                $(".icon0").removeClass("highlight0");
                $(".icon1").removeClass("highlight1");
                $(".icon2").removeClass("highlight2");
                $(".icon3").removeClass("highlight3");
                $(".icon4").removeClass("highlight4");
                $(".icon5").removeClass("highlight5");
                $(".icon6").removeClass("highlight6");

                $(".icon3").addClass("highlight3");
            });

            $(".links4").click(function() {

                $(".icon0").removeClass("highlight0");
                $(".icon1").removeClass("highlight1");
                $(".icon2").removeClass("highlight2");
                $(".icon3").removeClass("highlight3");
                $(".icon4").removeClass("highlight4");
                $(".icon5").removeClass("highlight5");
                $(".icon6").removeClass("highlight6");

                $(".icon4").addClass("highlight4");
            });

            $(".links5").click(function() {

                $(".icon0").removeClass("highlight0");
                $(".icon1").removeClass("highlight1");
                $(".icon2").removeClass("highlight2");
                $(".icon3").removeClass("highlight3");
                $(".icon4").removeClass("highlight4");
                $(".icon5").removeClass("highlight5");
                $(".icon6").removeClass("highlight6");

                $(".icon5").addClass("highlight5");
            });

            $(".links6").click(function() {

                $(".icon0").removeClass("highlight0");
                $(".icon1").removeClass("highlight1");
                $(".icon2").removeClass("highlight2");
                $(".icon3").removeClass("highlight3");
                $(".icon4").removeClass("highlight4");
                $(".icon5").removeClass("highlight5");
                $(".icon6").removeClass("highlight6");

                $(".icon6").addClass("highlight6");
            });


        });
    </script>

</head>

<body>
<nav class="bottomNav">


    <a class="links1" href="http://192.168.100.2/sidlogdev/" target="myFrame"><i class="icon1 las la-pen-nib" id="aarr1" ></i></a>
    <a class="links2" href="http://www.j100coders.org/" target="myFrame"><i class="icon2 las la-eye"  ></i></a>

    <a class="links3" href="tymlog.html" target="myFrame"><i class="icon3 las la-stopwatch" ></i></a>

    <a class="links0" href="home.html" target="myFrame"><i class="icon0 las la-home"></i></a>

    <a class="links4" href="https://www.google.com" target="myFrame"><i class="icon4 las la-stream" ></i></a>

    <a class="links5" href="http://www.codlogic.com/" target="myFrame"><i class="icon5 las la-atom" ></i></a>

    <a class="links6" href="qulog.html" target="myFrame"><i class="icon6 las la-layer-group"></i></a>


</nav>


<section>
    <iframe src="@include('portfolio.portfolio')" id="frame" name="myFrame" style="width: 100%;height: 90vh;"></iframe>
</section>





</body>

</html>
