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
                    <h4 class="card-title">Update Project</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('updateProject')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" value="{{$project->project_title}}" class="form-control form-control-lg" placeholder="Title" required>
                                <input type="hidden" name="id" value="{{$project->id}}" class="form-control form-control-lg" placeholder="Title" required>
                                <input type="hidden" name="staff_id" value="{{$project->staff_ID}}" class="form-control form-control-lg" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">URL</label>
                            <div class="col-md-10">
                                <input type="text" name="link" value="{{$project->project_link}}" class="form-control" placeholder="Link" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Color</label>
                            <div class="col-md-10">
                                {{-- <input type="text" name="color" class="form-control" placeholder="#ffa500" required> --}}

                                    <label for="favcolor">Select color:</label>
                                    <input type="color" id="favcolor" name="color" value="{{$project->project_color}}"><br><br>

                            </div>
                        </div>

                        <div class="form-group mb-0 row">
                            <label class="col-form-label col-md-2">Logo</label>
                            <div class="col-md-10">
                                <img src="{{ asset('/core/public/post/'. $project->project_logo) }}" alt="User Image" height="50">
                                <h4 style="font-size: 14px;">{{$project->project_logo}}</h4>
                                <input class="form-control" name="logo" type="file" required>
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

@include('partials.script')

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>
