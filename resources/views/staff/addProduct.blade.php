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
                    <div class="card-header">
                        <h4 class="card-title">Add Project</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('addProjectStaff')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Title</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Title">
                                    <input type="hidden" name="staff_id" value="{{Auth::user()->staff_id}}" class="form-control form-control-lg" >
                                    <span class="error" style="color: red">
                                        @if ($errors->has('title'))
                                            <h5 style="font-size: 15px">Project title required</h5>
                                        @endif
                                    </span>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">URL</label>
                                <div class="col-md-10">
                                    <input type="text" name="link" class="form-control" placeholder="Link" >
                                    <span class="error" style="color: red">
                                        @if ($errors->has('link'))
                                            <h5 style="font-size: 15px">Project link required</h5>
                                       @endif
                                    </span>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Color</label>
                                <div class="col-md-10">
                                    <label for="favcolor">Select color:</label>
                                    <input type="color" id="favcolor" name="color" value="#ffa500"><br><br>
                                </div>
                            </div>

                            <div class="form-group mb-0 row">
                                <label class="col-form-label col-md-2">Logo</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="logo" type="file" >
                                    <span class="error" style="color: red">
                                        @if ($errors->has('logo'))
                                            <h5 style="font-size: 15px">Project logo required</h5>
                                        @endif
                                    </span>

                                </div>
                            </div>

                            <div style="margin-top: 10px">
                                <button class="btn btn-primary float-right">Upload</button>
                            </div>

                        </form>
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
