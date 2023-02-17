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
                <li class="breadcrumb-item active">Contact Settings</li>
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
                <h3 class="m-b-0 text-dark">Edit contact</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('contact.update',$contact->id) }}" method="POST" class="floating-labels"
                  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="phone" id="phone"
                              value="{{ $contact->phone }}">
                            <span class="bar"></span>
                            <label for="phone">contact phone</label>
                        </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="email" id="email"
                              value="{{ $contact->email }}">
                            <span class="bar"></span>
                            <label for="email">contact email</label>
                        </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="address" id="address"
                              value="{{ $contact->address }}">
                            <span class="bar"></span>
                            <label for="address">contact address</label>
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
