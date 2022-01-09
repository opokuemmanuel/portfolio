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
                                <h4 class="card-title">Log List</h4>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Table Name</th>
                                            <th>Description</th>
                                            <th>Subject ID</th>
                                            <th>Date</th>
                                            <th>Properties</th>

                                        </tr>
                                        </thead>
                                        @foreach($log as  $history)
                                            <tbody>
                                            <tr>
                                                <td> <a>{{$history->log_name}}</a> </td>
                                                <td> <a>{{$history->description}}</a> </td>
                                                <td> <a>{{$history->subject_id}}</a> </td>
                                                <td> <a>{{$history->created_at}}</a> </td>
                                                <td> <a>{{$history->properties}}</a> </td>

                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>

                            </div>
                        </div>
                        <nav aria-label="Page navigation example" class="float-right">
                            <ul class="pagination">
                                {{$log->links()}}
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
