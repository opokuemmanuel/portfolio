
<!DOCTYPE html>
<html lang="en">

    @include('user.partials.head')

<body class="bg-gray-200">

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100"  style="background: url('{{ asset('/core/public/post/bg.jpg') }}') no-repeat center; background-size:cover">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="border-radius-lg py-3 pe-1" style="box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px #000 !important; background-color:#222">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>

                </div>
              </div>
              <div class="card-body">
                <form action="{{route('loginUser')}}" method="post">
                    @csrf
                    <div id="app">
                        @if(!empty($successMsg))
                            <div class="alert alert-success" style="color: white">
                                {{$successMsg}}
                            </div>
                        @endif
                    </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="staff_id" placeholder="Staff ID" class="form-control">
                  </div>
                    <span class="error" style="color: red">
                          @if ($errors->has('staff_id'))
                            <h5 style="font-size: 15px; color: red">Staff ID required</h5>
                        @endif
                      </span>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                  </div>
                    <span class="error" style="color: red">
                          @if ($errors->has('password'))
                            <h5 style="font-size: 15px; color: red">Password required</h5>
                        @endif
                      </span>

                  <div class="text-center">
                    <button type="submit" class="btn w-100 my-4 mb-2" style="box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px #000 !important; background-color:#222">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a  id="show" href="{{route('SignupUser')}}" class="text-gradient font-weight-bold" style="background-color:#222">Sign up</a>
                  </p>
                 </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>


<script>
    {{--const CheckBtn = document.getElementById('show')--}}

    {{--CheckBtn.addEventListener('click',function(event){--}}
    {{--    window.location.href = "{{route('SignupUser')}}";--}}

    {{--});--}}

    {{--window.location.href = "{{route('SignupUser')}}";--}}


</script>
</body>

</html>
