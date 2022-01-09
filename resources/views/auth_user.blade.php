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
                <div class="card-header">
                    <h4 class="card-title">Auth Info</h4>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Staff ID</label>
                            <div class="col-md-10">
                                <input type="text" name="staff_id" value="{{$auth_user->staff_id}}" class="form-control form-control-lg" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="link" class="form-control"  value="{{$auth_user->name}}" placeholder="Link" >
                            </div>
                        </div>

                        <div class="form-group mb-0 row">
                            <label class="col-form-label col-md-2">Contact</label>
                            <div class="col-md-10">
                                <input class="form-control" name="logo" type="text" value="{{$auth_user->contacts}}">
                            </div>
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
