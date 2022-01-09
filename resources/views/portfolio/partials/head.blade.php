<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSE</title>

    <link href="{{asset('assets1/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets1/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets1/font/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./assets/css/font-awesome.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script type="text/javascript" src="{{asset('./assets1/js/script.js')}}"></script> --}}
     <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets2/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets2/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets2/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />
  <style>





.loader {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 150px;
        height: 150px;
    margin-left: -39px;
    margin-top: -78px;
}

    .loaderContainer {

        left: 0px;
        top: 0px;
        width: 100%;
        height: 100vh;
        z-index: 9999;
        background-color: rgb(0, 0, 0, 0.9);
          }

    svg {
        width: 90%;
        fill: none;
    }

    .load {
        transform-origin: 50% 50%;
        stroke-dasharray: 570;
        stroke-width: 20px;
    }

    .load.one {
        stroke: #554d73;
        animation: load 1.5s infinite;
    }

    .load.two {
        stroke: #a496a4;
        animation: load 1.5s infinite;
        animation-delay: 0.1s;
    }

    .load.three {
        stroke: #a5a7bb;
        animation: load 1.5s infinite;
        animation-delay: 0.2s;
    }

    .point {
        animation: bounce 1s infinite ease-in-out;
    }

    .point.one {
        fill: #a5a7bb;
        animation-delay: 0s;
    }

    .point.two {
        fill: #a496a4;
        animation-delay: 0.1s;
    }

    .point.three {
        fill: #554d73;
        animation-delay: 0.2s;
    }

    @keyframes bounce {
        0%,
        100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes load {
        0% {
            stroke-dashoffset: 570;
        }
        50% {
            stroke-dashoffset: 530;
        }
        100% {
            stroke-dashoffset: 570;
            transform: rotate(360deg);
        }
    }
    .loading {
  overflow: hidden;
  height: 100vh;
}

#preloader {
  overflow: hidden;
  background:   rgb(42, 44, 57, 0.2);;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: fixed;
   color: #30271c;
   height: 100vh;
   width: 100%;
  z-index: 5000;
   text-align: center;

 }


.loader {
  height: 100px;
  width: 100px;
  position: absolute;
  left: 50%;
  margin-left: -20px;
  top: 50%;
  margin-top: -20px;
  }

</style>
</head>
