<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
@include('staff.partials.head')
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

@include('staff.partials.header')

@include('staff.partials.sidebar')

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
                                <h4 class="card-title">Project List</h4>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>URL</th>
                                            <th>Color</th>
                                            <th>Logo</th>
                                            <th>Staff ID</th>


                                            <th>Date Uploaded</th>
                                            <th>Last Update</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>

                                        <?php
                                        $temp_created = explode(' ',$search_results->created_at);
                                        $temp_update = explode(' ',$search_results->updated_at);
                                        ?>
                                            <tbody>
                                            <tr>
                                                <td> <a>{{$search_results->project_title}}</a> </td>
                                                <td> <a>{{$search_results->project_link}}</a> </td>
                                                <td> <div style="height: 20px;width:20px;background-color:{{$search_results->project_color}}"></div> </td>
                                                <td>
                                                    <img src="{{ asset('/core/public/post/'. $search_results->project_logo) }}" alt="User Image" height="50" >
                                                </td>
                                                <td> <a>{{$search_results->staff_ID}}</a> </td>
                                                <td> <a>{{$temp_created[0]}}</a> </td>
                                                <td> <a>{{$temp_update[0]}}</a> </td>

                                                <td><a href="{{url('/EditProjectStaff/'.$search_results->id)}}" class="fa fa-edit btn btn-success"></a> <a href="{{url('/DeleteProject/'.$search_results->id)}}" class="fa fa-trash btn btn-danger"></a></td>

                                            </tr>
                                            </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>

                        <!-- /Recent Orders -->

                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

@include('staff.partials.script')

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>
