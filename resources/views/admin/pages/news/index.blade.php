@extends('admin.layout.app')
@section('content')


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">news</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">news</li>
            </ol>
            <a href="{{ route('news.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
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
                <h4 class="card-title">All news </h4>
                <form action="{{ route('news.index') }}" method="GET">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $selectedCategory ? 'selected' : ''
                                }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Subcategory</label>
                        <select class="form-control" id="subcategory" name="subcategory">
                            <option value="">All</option>
                            @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $selectedSubcategory ?
                                'selected' : '' }}>{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <select class="form-control" id="tag" name="tag">
                            <option value="">All</option>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $tag->id == $selectedTag ? 'selected' : '' }}>{{
                                $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>


                {{-- <script>
                    $(document).ready(function() {
                      $('#tags').select2({
                        placeholder: 'Select Tags',
                        allowClear: true,
                        tags: true,
                        tokenSeparators: [',', ' ']
                      });
                    });
                </script> --}}

                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Title</th>
                                <th>summary</th>
                                <th>Thumbnail</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th>Tag Name</th>
                                <th>Source URL</th>
                                <th>Creator Name</th>
                                <th>Views</th>


                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($news as $item)
                            <tr>
                                <td>{{ $item->status }}</td>
                                <td>

                                    <a class="btn btn-primary waves-effect btn-circle waves-light"
                                      href="{{ route('news.edit',$item->id) }}">
                                        <i class="fa fa-edit"></i> </a>
                                    <form hidden action="{{ route('news.delete',$item->id) }}" method="POST"
                                      id="form{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button class="btn btn-danger waves-effect btn-circle waves-light"
                                      onclick="deleteItem({{ $item->id }});" type="button">
                                        <i class="fa fa-trash"></i> </button>
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->summary }}</td>
                                <td><img src="{{ $item->thumbnail }}" alt="{{ $item->title }}" width="100"></td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->subcategory->name }}</td>
                                <td>{{ $item->tag->name }}</td>
                                <td>{{ $item->source_url }}</td>
                                <td>{{ $item->creator->name }}</td>
                                <td>{{ $item->views }}</td>




                            </tr>

                            @endforeach


                    </table>



                    </tbody>
                    <div class="pagination">
                        <div class="page-info">
                            Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of
                            {{ $news->total() }} items
                        </div><br>

                        <ul>
                            @if ($news->currentPage() > 1)
                            <li><a href="{{ $news->previousPageUrl() }}">Previous</a></li>
                            @endif

                            @for ($i = 1; $i <= $news->lastPage(); $i++)
                                <li class="{{ ($news->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $news->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor

                                @if ($news->currentPage() < $news->lastPage())
                                    <li><a href="{{ $news->nextPageUrl() }}">Next</a></li>
                                    @endif
                        </ul>
                    </div>
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