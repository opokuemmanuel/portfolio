<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

@include('partials.head')


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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Staff ID</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Contact</th>
                                            <th>Account Status</th>
                                            <th>Date Registered</th>
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        @foreach($staff as $users)
                                            <?php
                                            $temp_created = explode(' ',$users->created_at);
                                            $temp_updated = explode(' ',$users->updated_at);
                                            ?>
                                        <tbody>
                                        <tr>
                                          <td>{{$users->staff_id}}</td>
                                          <td>{{$users->name}}</td>
                                          <td>{{$users->role}}</td>
                                          <td>{{$users->contact}}</td>
                                          <td>{{$users->account_status}}</td>
                                          <td>{{$temp_created[0]}}</td>
                                          <td>{{$users->updated_at}}</td>

                                         <td><a href="{{url('/EditStaffs/'.$users->id)}}" class="fa fa-edit btn btn-success"></a> <a href="{{url('/deleteStaff/'.$users->staff_id)}}" id="delete" class="fa fa-trash btn btn-danger" style="color: white;"></a></td>
                                        </tr>
                                        </tbody>
                                                <input type="hidden" id="ids" value="{{$users->id}}" style="margin-top: 90px;">
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->



{{--<script type="text/javascript">--}}

{{--    var deleteBtn = document.getElementById('delete');--}}


{{--    deleteBtn.addEventListener('click',function(event){--}}
{{--        alert('hey');--}}

{{--             var ids = $('#ids').val();--}}
{{--            $.ajax({--}}
{{--                url:'http://localhost/CSE1/api/deleteStaff/' + ids,--}}
{{--                type: "POST",--}}
{{--                data: {--}}
{{--                    'id': ids,--}}
{{--                },--}}
{{--                dataType: 'json',--}}
{{--                processData: true,--}}
{{--                // beforeSend: function() {--}}
{{--                //     output.css('background-color', 'blue');--}}
{{--                //     output.css('color', 'white');--}}
{{--                //     output.css('font-size', '18px');--}}
{{--                //     output.html('Processing... Please Wait');--}}
{{--                //     output.show();--}}
{{--                // },--}}
{{--                success: function(response) {--}}
{{--                    if (response.status == 200) {--}}

{{--                        Swal.fire({--}}
{{--                            title: 'Details deleted',--}}
{{--                            text: "Click on Ok to refresh page",--}}
{{--                            confirmButtonText: 'Ok',--}}

{{--                        }).then((result) => {--}}
{{--                            if (result.isConfirmed) {--}}
{{--                                location.reload();--}}
{{--                            }--}}
{{--                        })--}}


{{--                    }  else if (response.status == 404) {--}}
{{--                        Swal.fire({--}}
{{--                            icon: 'error',--}}
{{--                            title: 'Ooops',--}}
{{--                            text: 'Operation not successful',--}}

{{--                        })--}}
{{--                    }--}}
{{--                },--}}

{{--            })--}}


{{--    });--}}

{{--</script>--}}
@include('partials.script')

</body>


</html>
