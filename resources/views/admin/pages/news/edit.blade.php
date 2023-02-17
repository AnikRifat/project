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
        <div class="card">
            <div class="card-header">
                <h3 class="m-b-0 text-dark">Edit news</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                    </div>
                    <div class="form-group">
                        <label for="summary">summary</label>
                        <input type="text" class="form-control" id="summary" name="summary"
                          value="{{ $news->summary }}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id === $news->category_id) selected
                                @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sub_category_id">Sub Category</label>
                        <select class="form-control" id="sub_category_id" name="sub_category_id">
                            <option value="">-- Select sub category --</option>
                            @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" @if ($subCategory->id === $news->sub_category_id)
                                selected @endif>{{ $subCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tag_ids">Tags</label>
                        <select class="form-control select2" data-placeholder="-- Select tags --" id="tag_id"
                          name="tag_id">
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @if ($tag->id === $news->tag_id)
                                selected @endif>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="source_url">Source URL</label>
                        <input type="text" class="form-control" id="source_url" name="source_url"
                          value="{{ $news->source_url }}">
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="dropify" id="thumbnail" name="thumbnail"
                          data-default-file="{{ $news->thumbnail ? asset('storage/' . $news->thumbnail) : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="summernote" name="content"
                          required>{!! $news->content !!}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
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