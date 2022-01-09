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
                    <div class="col-md-12">

                        <!-- Recent Orders -->
                        <div class="card card-table">
                            <div class="card-header">
                                <h4 class="card-title">Auth List</h4>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>authenticate id</th>
                                            <th>ip address</th>
                                            <th>user agent</th>
                                            <th>time logged-in</th>
                                            <th>time looged-out</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        @foreach($logs as  $auth_logs)
                                            <tbody>
                                            <tr>
                                                <td> <a>{{$auth_logs->authenticatable_id}}</a> </td>
                                                <td> <a>{{$auth_logs->ip_address}}</a> </td>
                                                <td> <a>{{$auth_logs->user_agent}}</a> </td>
                                                <td> <a>{{$auth_logs->login_at}}</a> </td>
                                                <td> <a>{{$auth_logs->logout_at}}</a> </td>
                                                <td><a href="{{url('/ViewUser/'.$auth_logs->authenticatable_id)}}" class="fa fa-edit btn btn-success"></a></td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example" class="float-right">
                            <ul class="pagination">
                                {{$logs->links()}}
                            </ul>
                        </nav>
                        <!-- /Recent Orders -->

                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

@include('partials.script')

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>
