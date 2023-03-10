@extends('admin.layout.app')
@section('content')


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">category</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">category</li>
            </ol>
            <a href="{{ route('category.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
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
        <!-- table responsive -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All category </h4>
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Sub category name</th>
                                <th>category name</th>
                                <th>order</th>
                                <th>thumbnail</th>


                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($subcategories as $item)
                            <tr>

                                <td>

                                    <a class="btn btn-primary waves-effect btn-circle waves-light"
                                      href="{{ route('subcategory.edit',$item->id) }}">
                                        <i class="fa fa-edit"></i> </a>
                                    <form hidden action="{{ route('subcategory.destroy',$item->id) }}" method="POST"
                                      id="form{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button class="btn btn-danger waves-effect btn-circle waves-light"
                                      onclick="deleteItem({{ $item->id }});" type="button">
                                        <i class="fa fa-trash"></i> </button>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category ? $item->category->name : ''}}</td>
                                <td>{{ $item->order }}</td>
                                <td><img src="{{ asset('public/subcategory/'.$item->thumbnail) }}" height="100px"></td>



                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- ///table responsive ///-->
    </div>
</div>
<!-- ============================================================== -->
<!-- End Info box -->
<!-- ============================================================== -->
@section('script')
<script>
    function deleteItem(id) {
    //  console.log(id);

    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    console.log('ok');
    document.getElementById(`form${id}`).submit();
  }
})

    }
</script>

@endsection

@endsection
