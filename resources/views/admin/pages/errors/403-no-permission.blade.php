@extends('admin.layout.app')
@section('content')




<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1>403</h1>
            <h3 class="text-uppercase">Forbiddon Error!</h3>
            <p class="text-muted m-t-30 m-b-30">YOU DON'T HAVE PERMISSION TO ACCESS ON THIS SERVER.</p>
            <a href="{{ url()->previous() }}"
              class="btn btn-info btn-rounded waves-effect waves-light m-b-40 text-white">Back to
                home</a>
        </div>

    </div>
</section>
@endsection