<!DOCTYPE html>
<html lang="en">

@include('portfolio.partials.head')

<body>

  <div id="preloader">
    <div class="loader" >
      <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <circle class="load one" cx="60" cy="60" r="40" />
        <circle class="load two" cx="60" cy="60" r="40" />
        <circle class="load three" cx="60" cy="60" r="40" />
        <g>
          <circle class="point one" cx="45" cy="70" r="5" />
          <circle class="point two" cx="60" cy="70" r="5" />
          <circle class="point three" cx="75" cy="70" r="5" />
        </g>
      </svg>
    </div>
  </div>


<?php
function luminance($hexcolor, $percent)
{
  if ( strlen( $hexcolor ) < 6 ) {
    $hexcolor = $hexcolor[0] . $hexcolor[0] . $hexcolor[1] . $hexcolor[1] . $hexcolor[2] . $hexcolor[2];
  }
  $hexcolor = array_map('hexdec', str_split( str_pad( str_replace('#', '', $hexcolor), 6, '0' ), 2 ) );

  foreach ($hexcolor as $i => $color) {
    $from = $percent < 0 ? 0 : $color;
    $to = $percent < 0 ? $color : 255;
    $pvalue = ceil( ($to - $from) * $percent );
    $hexcolor[$i] = str_pad( dechex($color + $pvalue), 2, '0', STR_PAD_LEFT);
  }

  return '#' . implode($hexcolor);
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
<section id="homeSection">

    @include('portfolio.partials.header')
    <section class="mainContent">
        <div class="container" style="margin-top: 100px;margin-bottom: 140px;">
            <div class="tiles row align-items-center">


                <div class="row mt-4">

                    @foreach($pro as $project)

                    <div class="col-lg-4 col-md-6 mt-4 mb-4">
                      <div class="card" onclick="buttonClick('iconId{{$project->id}}','{{$project->project_link}}')">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 bg-transparent">
                          <div class="border-radius-lg py-3 pe-1" style="background-color: <?php echo luminance($project->project_color, 0.8);?>;box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px #000 !important; }">
                            <div class="chart align-items-center">

                                <div style="height: 170px;text-align:center;">
                                  <div class="icon " style="  height:85%;width:85%;   text-align:center; background: url('{{ asset('/post/'. $project->project_logo) }}') no-repeat center;-webkit-background-size: contain;
                                    -moz-background-size: contain;
                                    -o-background-size: contain;
                                    background-size: contain;"
                                    >
                                  </div>
                                </div>

                                    {{-- <div class="icon-box6" style="height: 170px;text-align:center; " onclick="buttonClick('iconId{{$project->id}}','<?php echo luminance($project->project_color, 0.5);?>')" data-aos="zoom-in-left" data-aos-delay="500" id="tile6" style="border-style: none; background-color: <?php echo luminance($project->project_color, 0.8);?>">

                                         <h4 class="title"><a href="" style="text-decoration: none;color: {{$project->project_color}}">{{$project->project_title}}</a></h4>
                                    </div> --}}

                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h3 class="mb-0 ">{{$project->project_title}}</h3>
                           <hr class="dark horizontal">
                          <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> updated <?php

                           $date = $project->updated_at ."";

                           $_date = time_elapsed_string($date);

                            echo $_date =="1 day ago" ? "Yesterday": $_date?> </p>
                          </div>
                        </div>
                      </div>
                    </div>


                    @endforeach
                  </div>
                {{-- <div class="col-lg-4 mt-5">


                    <button class="icon-box6" onclick="buttonClick('iconId{{$project->id}}','<?php echo luminance($project->project_color, 0.5);?>')" data-aos="zoom-in-left" data-aos-delay="500" id="tile6" style="border-style: none; background-color: <?php echo luminance($project->project_color, 0.8);?>">

                        <div class="icon"> <img src="{{ asset('/core/public/post/'. $project->project_logo) }}" alt="User Image" height="50" ></div>
                        <h4 class="title"><a href="" style="text-decoration: none;color: {{$project->project_color}}">{{$project->project_title}}</a></h4>
                    </button>

                </div> --}}
            </div>

        </div>
    </section>

</section>

<section id="iframeSection" style=" position: relative; ">

 <div class="loaderContainer  text-center" style="text-align: center" id="loaderId">
  <div class="loader" >
    <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <circle class="load one" cx="60" cy="60" r="40" />
      <circle class="load two" cx="60" cy="60" r="40" />
      <circle class="load three" cx="60" cy="60" r="40" />
      <g>
        <circle class="point one" cx="45" cy="70" r="5" />
        <circle class="point two" cx="60" cy="70" r="5" />
        <circle class="point three" cx="75" cy="70" r="5" />
      </g>
    </svg>
  </div>
 </div>
    <iframe id="frame" name="myFrame" style="width: 100%;height: 100vh;"></iframe>
</section>


<nav class="bottomNav"  id="bottonNavId"  >



    {{$pro->links('vendor.pagination.custom')}}
    <a class="links0" href="" target="myFrame"><i class="icon0 las la-home" style="box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px #000 !important;"></i></a>

            @foreach($pro as $project)


              <div onclick="buttonClick('iconId{{$project->id}}','{{$project->project_link}}')" id="iconId{{$project->id}}" class="ics icon icon-lg icon-shape   shadow-dark text-center " style="margin-bottom:20px;height:45px;width:45px;margin-right:10px;box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px #000 !important;border-radius:50%;background-color: <?php echo luminance($project->project_color, 0.8);?>;">
                 <div class="material-icons opacity-10 px-3 py-3" style="background: url({{asset('/post/'.$project->project_logo)}}) no-repeat center; height:66%;width:66%;margin-top:17%; -webkit-background-size: contain;
                  -moz-background-size: contain;
                  -o-background-size: contain;
                  background-size: contain;">
                </div>
              </div>
            @endforeach
     {{$pro->links('vendor.pagination.custom2')}}





     {{-- <div onclick="floatClick()" class="px-3 py-2" style="background-color:grey;box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px #000 !important;border-radius:50%;float:right;margin-top:30px;margin-right:10px">
      <i class="material-icons py-2">settings</i>
     </div> --}}
    </nav>





<script type="text/javascript">

const iframeEle = document.getElementById('frame');
const loadingEle = document.getElementById('loaderId');

iframeEle.addEventListener('load', function() {
    // Hide the loading indicator
    loadingEle.style.display = 'none';

    // Bring the iframe back
    iframeEle.style.display = 'block';
    iframeEle.style.opacity = 1;
});

$(window).on('load', function(){
  setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
});
function removeLoader(){
    $( "#preloader" ).fadeOut(500, function() {
       $( "#preloader" ).remove(); //makes page more lightweight
  });
}
    $(document).ready(function(){
        // Set div display to none
        $(".link_project").click(function(){
            $("#content").css("display", "none");
            $("#myframe").css("display", "block");

        });

    });


</script>




<script>
    function buttonClick(plc, llink){

    var _iframe = document.getElementById("iframeSection");
    var _home = document.getElementById("homeSection");
    var _frame = document.getElementById("frame");
     var _iconId = document.getElementById(plc);
    var _iconClass = document.getElementsByClassName('ics');
    $(".icon0").removeClass("highlight0");


    _iframe.style.display = "block";
    _home.style.display = "none";


    var elements = document.getElementsByClassName('ics'); // get all elements
	for(var i = 0; i < elements.length; i++){
    elements[i].style.width = "45px";
         elements[i].style.height = "45px";
	}
     _iconId.style.width = "55px";
     _iconId.style.height = "55px";
    _frame.src = llink;


}
function floatClick(){

      var _bottomNav = document.getElementById("bottomNavId");


      _bottomNav.style.display = "none";



  }
$(document).ready(function(){
        $(".icon0").addClass("highlight0");
        var _frame = document.getElementById("frame");
        _frame.style.display = 'none';




$(".links0").click(function() {

    var _iframe = document.getElementById("iframeSection");
    var _home = document.getElementById("homeSection");
    _home.style.display = "block";
    _iframe.style.display = "none";


    var elements = document.getElementsByClassName('ics'); // get all elements
	for(var i = 0; i < elements.length; i++){
         elements[i].style.width = "45px";
         elements[i].style.height = "45px";
	}

    $(".icon0").addClass("highlight0");
});




    });

    function displayCurrentTime() {
        let currentTime = new Date();
        let hours = currentTime.getHours();
        let minutes = currentTime.getMinutes();
        let seconds = currentTime.getSeconds();
        let amOrPm = hours < 12 ? "AM" : "PM";
        hours = hours === 0 ? 12 : hours > 12 ? hours - 12 : hours;
        hours = addZero(hours);
        minutes = addZero(minutes);
        seconds = addZero(seconds);
        let timeString = `${hours} : ${minutes} : ${seconds} ${amOrPm}`;
        document.getElementById("clock").innerText = timeString;
        let timer = setTimeout(displayCurrentTime, 1000);
    }
    function addZero(component) {
        return component < 10 ? "0" + component : component;
    }
    displayCurrentTime();


    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    document.getElementById("date").innerHTML = date
</script>

</body>

</html>
