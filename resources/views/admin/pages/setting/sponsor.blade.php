@extends('admin.layout.app')
@section('content')


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard 1</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">sponsor Settings</li>
            </ol>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Info box -->
<!-- ============================================================== -->
<div class="row g-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="m-b-0 text-dark">Edit sponsor</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('sponsor.update',$sponsor->id) }}" method="POST" class="floating-labels"
                  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="top_link" id="top_link"
                              value="{{ $sponsor->top_link }}">
                            <span class="bar"></span>
                            <label for="top_link">sponsor top link</label>
                        </div>
                        <div class="form-group m-b-60">
                            <h4 class="card-title">sponsor top</h4>
                            <input type="file" id="top" name="top" class="dropify" data-max-file-size="500k"
                              data-default-file="{{ $sponsor->top }}" />
                        </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="side_1_link" id="side_1_link"
                              value="{{ $sponsor->side_1_link }}">
                            <span class="bar"></span>
                            <label for="side_1_link">sponsor side 1 link</label>
                        </div>
                        <div class="form-group m-b-60">
                            <h4 class="card-title">sponsor side 1</h4>
                            <input type="file" id="side_1" name="side_1" class="dropify" data-max-file-size="500k"
                              data-default-file="{{ $sponsor->side_1 }}" />
                        </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="side_2_link" id="side_2_link"
                              value="{{ $sponsor->side_2_link }}">
                            <span class="bar"></span>
                            <label for="side_2_link">sponsor side 2 link</label>
                        </div>
                        <div class="form-group m-b-60">
                            <h4 class="card-title">sponsor side 2</h4>
                            <input type="file" id="side_2" name="side_2" class="dropify" data-max-file-size="500k"
                              data-default-file="{{ $sponsor->side_2 }}" />
                        </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="bottom_link" id="bottom_link"
                              value="{{ $sponsor->bottom_link }}">
                            <span class="bar"></span>
                            <label for="bottom_link">sponsor bottom link</label>
                        </div>
                        <div class="form-group m-b-60">
                            <h4 class="card-title">sponsor bottom</h4>
                            <input type="file" id="bottom" name="bottom" class="dropify" data-max-file-size="500k"
                              data-default-file="{{ $sponsor->bottom }}" />
                        </div>
                        <div class="form-group m-b-60">
                            <h4 class="card-title">sponsor social</h4>
                            <input type="file" id="social" name="social" class="dropify" data-max-file-size="500k"
                              data-default-file="{{ $sponsor->social }}" />
                        </div>


                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i>
                            Save</button>
                        {{-- <button type="button" class="btn btn-inverse">Cancel</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Info box -->
<!-- ============================================================== -->

@section('script')
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
     })
</script>
@endsection

@endsection
