@extends('admin.layout.app')
@section('content')


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Editor</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Editor</li>
            </ol>
            <a href="{{ route('user.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                  class="fa fa-plus-circle"></i> Create New</a>
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
                <h3 class="m-b-0 text-dark">Edit Editor</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update',$user->id) }}" method="POST" class="floating-labels"
                  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">

                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                            <span class="bar"></span>
                            <label for="name">Editor name</label>
                        </div>

                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                            <span class="bar"></span>
                            <label for="email">Editor email</label>
                        </div>
                        <div class="form-group m-b-40">
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="bar"></span>
                            <label for="password">New user password</label>
                        </div>





                        <div class="form-group row pt-3">
                            <div class="col-12">
                                <h5>permissions</h5>
                                @foreach ($permissions as $permission)

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                      id="customCheck{{ $permission->id }}" name="permissions[]"
                                      value="{{ $permission->id }}" {{ in_array($permission->id, $userPermissions) ?
                                    'checked' : '' }}>
                                    <label class="form-check-label position-relative"
                                      for="customCheck{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>

                                @endforeach

                            </div>

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
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 500,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });


     $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
     })
</script>
@endsection

@endsection
