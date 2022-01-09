<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
@include('partials.head')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

@include('partials.header')

@include('partials.sidebar')

<!-- Page Wrapper -->
    <div class="page-wrapper">


        <div class="content container-fluid" >
            <div class="card">
                <div id="app">
                    @if(!empty($successMsg))
                        <div class="alert alert-success">
                            {{$successMsg}}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Staff ID</label>
                            <div class="col-md-10">
                                <input type="text" value="{{$showEdit->staff_id}}" id="staff" class="form-control form-control-lg" placeholder="Staff Id" required>
                                <input type="hidden" value="{{$showEdit->id}}" id="id" class="form-control form-control-lg" placeholder="Staff Id" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Name</label>
                            <div class="col-md-10">
                                <input type="text" value="{{$showEdit->name}}" id="name" class="form-control" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form-group mb-0 row"><br>
                            <label class="col-form-label col-md-2">Role</label>
                            <div class="col-md-10">
                                {{--                                <input class="form-control" id="role" type="text" placeholder="role" required>--}}
                                <select id="role" class="form-control">
                                    <option selected value="{{$showEdit->role}}">{{$showEdit->role}}</option>
                                    <option>Admin</option>
                                    <option>Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-0 row" style="padding-top: 20px;">
                            <label class="col-form-label col-md-2">Contact</label>
                            <div class="col-md-10">
                                <input class="form-control" value="{{$showEdit->contact}}" id="contact" name="contact" type="text" placeholder="contact" required>
                            </div>
                        </div>

                        <div class="form-group mb-0 row" style="padding-top: 20px;">
                            <label class="col-form-label col-md-2">Account Status</label>
                            <div class="col-md-10">
                                <select id="account" class="form-control">
                                    <option selected>{{$showEdit->account_status}}</option>
                                    <option>Active</option>
                                    <option>Suspended</option>
                                </select>
                            </div>
                        </div>

                        <div style="margin-top: 10px">
                            <button type="button" class="btn btn-primary float-right" id="save">Update</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>


    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

@include('partials.script')

<script type="text/javascript">

    const updateBtn = document.getElementById('save')

    updateBtn.addEventListener('click',function(event){
        var ids = $('#id').val();
        var staff = $('#staff').val();
        var name = $('#name').val();
        var contact = $('#contact').val();
        var role = $('#role').val();
        var account = $('#account').val();


        if (staff ==0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Staff ID required',

            })
        }if (name == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Name field required',

            })
        }if (contact == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Contact field required',

            })
        }if (role == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Role field required',

            })
        }
        if (account == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Account field required',

            })
        }
        else {
            $.ajax({
                url:'http://localhost/api/update',
                type: "POST",
                data: {
                    'id': ids,
                    'staff_id': staff,
                    'name': name,
                    'role': role,
                    'contact': contact,
                    'account_status': account,

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
                            icon: 'success',
                            title: 'success',
                            text: 'Update successful',

                        })
                    }  else if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ooops',
                            text: 'Operation not successful',

                        })
                    }
                },
                error: function(xhr, status) {
                    $('#results').css('background-color', 'red');
                    $('#results').css('color', 'white');
                    $('#results').css('font-size', '18px');
                    $('#results').html(status);
                    $('#results').show();
                }
            })
        }

    });

</script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>
