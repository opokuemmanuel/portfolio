
<!DOCTYPE html>
<html lang="en">
    @include('user.partials.head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background:url('{{ asset('/core/public/post/bg.jpg') }}') no-repeat center; background-size:cover">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-body">
                    <h4 class="font-weight-bolder">Sign Up</h4>
                  <form>
                    <input id="staff_id" placeholder="Enter Staff ID" type="text" class="form-control" style="border: whitesmoke solid 2px;">

                      <input id="name" type="text" placeholder="name" class="form-control" style="border: whitesmoke solid 2px; margin-top: 13px">

                      <input id="contact" placeholder="contact (+233....)" type="text" class="form-control" style="border: whitesmoke solid 2px; margin-top: 13px">

{{--                      <div id="recaptcha-container" style="margin-top: 13px"></div>--}}
{{--                      <div class="text-center" style="margin-top: 13px">--}}
{{--                          <button type="button" id="send_code" onclick="phoneAuth();"  class="btn btn-lg   btn-lg w-100 mt-4 mb-0"style="background-color: #222;">Send Code</button>--}}
{{--                      </div>--}}

{{--                      <input  id="verificationCode" placeholder="Enter verification code" type="text" class="form-control" style="border: whitesmoke solid 2px; margin-top: 13px">--}}

{{--                      <button type="button" onclick="codeverify();" id="code_verify"  class="btn btn-lg   btn-lg w-100 mt-4 mb-0"style="background-color: #222; margin-top: 13px">Verify code</button>--}}

{{--                      <input id="role" placeholder="role" type="text" class="form-control" style="border: whitesmoke solid 2px; margin-top: 13px">--}}


                      <input id="password" type="password" placeholder="password" class="form-control" style="border: whitesmoke solid 2px; margin-top: 13px">

                      <input id="c_password" type="password" placeholder="confirm password" class="form-control" style="border: whitesmoke solid 2px; margin-top: 13px">


                    <div class="text-center">
{{--                      <button type="button"  id="check_id" class="btn btn-lg   btn-lg w-100 mt-4 mb-0"style="background-color: #222;">Check ID</button>--}}
{{--                 --}}
                        <button type="button"  id="signup" class="btn btn-lg   btn-lg w-100 mt-4 mb-0"style="background-color: #222;">SignUp</button>


                    </div>

                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="{{route('showLogin')}}" class="text-gradient font-weight-bold" style="background-color: #222">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>



  <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
          apiKey: "AIzaSyBK-juZ6krPJCHHELQgOW9sFUXsS9h3wHI",
          authDomain: "fir-web-b823f.firebaseapp.com",
          databaseURL: "https://fir-web-b823f.firebaseio.com",
          projectId: "fir-web-b823f",
          storageBucket: "fir-web-b823f.appspot.com",
          messagingSenderId: "463332404757",
          appId: "1:463332404757:web:68d04d3fdeeb333f"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
  </script>

{{--  check firebase--}}
  <script type="text/javascript">

          window.onload=function () {
              render();
          };
          function render() {
              window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
              recaptchaVerifier.render();
          }

      function phoneAuth() {
          var verify = document.getElementById('recaptcha-container');
          verify.style.display = 'block';
          var contact =  document.getElementById('contact').value;
          //get the number
        //  var number=document.getElementById('numbe').value;
          //phone number authentication function of firebase
          //it takes two parameter first one is number,,,second one is recaptcha
          firebase.auth().signInWithPhoneNumber(contact,window.recaptchaVerifier).then(function (confirmationResult) {
              //s is in lowercase
              window.confirmationResult=confirmationResult;
              coderesult=confirmationResult;
              console.log(coderesult);
              Swal.fire({
                  title: 'Message Sent',
                  // text: "Click on Ok to refresh page",
                  confirmButtonText: 'Ok',

              }).then((result) => {
                  if (result.isConfirmed) {
                      var code_verify = document.getElementById('code_verify');
                      var verify_code = document.getElementById('verificationCode');
                      var verify = document.getElementById('recaptcha-container');
                      var send_code = document.getElementById('send_code');
                      send_code.style.display = 'none';
                      verify.style.display = 'none';
                      verify_code.style.display = 'block'
                      code_verify.style.display = 'block'

                  }
              })

          }).catch(function (error) {
              alert(error.message);
          });
      }
      function codeverify() {
          var code=document.getElementById('verificationCode').value;
          coderesult.confirm(code).then(function (result) {
              Swal.fire({
                  title: 'Contact Verified',
                  // text: "Click on Ok to refresh page",
                  confirmButtonText: 'Ok',

              }).then((result) => {
                  if (result.isConfirmed) {
                      var code_verify = document.getElementById('code_verify');
                      var verify_code = document.getElementById('verificationCode');
                      var password =  document.getElementById('password');
                      var btnSignUp = document.getElementById('signup');

                      var c_password =  document.getElementById('c_password');
                     var CheckBtn = document.getElementById('check_id')

                      code_verify.style.display = 'none';
                      verify_code.style.display = 'none';

                      btnSignUp.style.display = 'block';
                      CheckBtn.innerText = 'SIGNUP';
                      password.style.display = 'block';
                      c_password.style.display = 'block';

                  }
              })
              var user=result.user;
              console.log(user);
          }).catch(function (error) {
              alert(error.message);
          });
      }

  </script>


<script type="text/javascript">
        $(document).ready(function(){
        // var name =  document.getElementById('name');
        // var contact =  document.getElementById('contact');
        // var password =  document.getElementById('password');
        // var role =  document.getElementById('role');
        // var c_password =  document.getElementById('c_password');
        // var verify = document.getElementById('recaptcha-container');
        // var send_code = document.getElementById('send_code');
        // var verify_code = document.getElementById('verificationCode');
        // var code_verify = document.getElementById('code_verify');
        // var btnSignUp = document.getElementById('signup');


        btnSignUp.style.display = 'none';
        name.style.display = 'none';
        contact.style.display = 'none';
        password.style.display = 'none';
        role.style.display = 'none';
        c_password.style.display = 'none';
        verify.style.display = 'none';
        send_code.style.display = 'none';
        verify_code.style.display = 'none';
        code_verify.style.display = 'none';

    });

    // const CheckBtn = document.getElementById('check_id')
    //
    // CheckBtn.addEventListener('click',function(event){
    //
    //         var staff = $('#staff_id').val();
    //         var role =  document.getElementById('role');
    //         var contact =  document.getElementById('contact');
    //         var name =  document.getElementById('name');
    //         var send_code = document.getElementById('send_code');
    //
    //         if (staff==0){
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Ooops',
    //                 text: 'Staff ID required ',
    //
    //             })
    //         }else {
    //
    //             $.ajax({
    //                 url:'http://192.168.100.204/CSE1/api/checkID',
    //                 type: "GET",
    //                 data: {
    //                     'staff_id': staff,
    //                 },
    //                 dataType: 'json',
    //                 processData: true,
    //                 // beforeSend: function() {
    //                 //     output.css('background-color', 'blue');
    //                 //     output.css('color', 'white');
    //                 //     output.css('font-size', '18px');
    //                 //     output.html('Processing... Please Wait');
    //                 //     output.show();
    //                 // },
    //                 success: function(response) {
    //                     if (response.status == 200) {
    //
    //                         Swal.fire({
    //                             title: 'Staff ID exist',
    //                             // text: "Click on Ok to refresh page",
    //                             confirmButtonText: 'Ok',
    //
    //                         }).then((result) => {
    //                             if (result.isConfirmed) {
    //
    //                                 contact.style.display = 'block';
    //                                 name.style.display = 'block';
    //                                 send_code.style.display = 'block';
    //                                 CheckBtn.style.display = 'none';
    //
    //                             }
    //                         })
    //
    //
    //                     }  else if (response.status == 403) {
    //                         Swal.fire({
    //                             icon: 'error',
    //                             title: 'Ooops',
    //                             text: 'Staff ID does not exist ',
    //
    //                         })
    //                     }
    //                 },
    //
    //             })
    //         }
    // });


</script>

<script type="text/javascript">
    var BtnSignUp = document.getElementById('signup')

    BtnSignUp.addEventListener('click',function(event){

            var staff = $('#staff_id').val();
            var contact = $('#contact').val();
            var name = $('#name').val();
            var password = $('#password').val();
            var c_password = $('#c_password').val();

            if (staff == 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops',
                    text: 'Staff ID required',

                })
            }
            else if (contact == 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops',
                    text: 'Contact required',

                })
            }

            else if (name == 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops',
                    text: 'name  required',

                })
            }

           else if (password == 0 || c_password == 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops',
                    text: 'Password required ',

                })
            } else if (password != c_password){
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops',
                    text: 'Password does not match ',

                })
             }
            else {
                $.ajax({
                    url:'http://localhost/api/SignUpUser',
                    type: "POST",
                    data: {
                        'staff_id': staff,
                        'contacts': contact,
                        'name': name,
                        'password': password,
                    },
                    dataType: 'json',
                    processData: true,
                    // beforeSend: function() {
                    //     output.css('background-color', 'blue');
                    //     output.css('color', 'white');
                    //     output.css('font-size', '18px');
                    //     output.html('Processing... Please Wait');
                    //     output.show();
                    // },
                    success: function(response) {
                        if (response.status == 200) {

                                  Swal.fire({
                                        title: 'SignUp successful',
                                        // text: "Click on Ok to refresh page",
                                        confirmButtonText: 'Ok',

                                    })
                                      .then((result) => {
                                        if (result.isConfirmed) {
                                  document.getElementById('staff_id').value = '';
                                  document.getElementById('contact').value = '';
                                  document.getElementById('name').value = '';
                                  document.getElementById('password').value = '';
                                  document.getElementById('c_password').value = '';
                                        }
                                    })


                        }  else if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops',
                                text: 'Invalid staff id,name or Contact. Contact system administrator for support',

                            })
                        }else if (response.status == 405) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops',
                                text: 'Contact already taken. Contact system administrator for support',

                            })
                        }

                        else if (response.status == 500) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops',
                                text: 'Staff ID already taken',

                            })
                        }
                        else if (response.status == 403) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops',
                                text: 'Operation not successful',

                            })
                        }

                    },

                })
            }

    });


</script>

</body>



</html>
