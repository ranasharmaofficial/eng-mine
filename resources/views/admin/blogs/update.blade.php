@extends('admin.include.master')
@section('title', 'Update Blog')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Update</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.blogs.update',$blog->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row formtype">
                                <div class="col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type </label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="">Select Type</option>
                                            <option value="blog" @if($blog->type == "blog") selected @endif>Blog</option>
                                            <option value="news" @if($blog->type == "news") selected @endif>News</option>
                                            <option value="event" @if($blog->type == "event") selected @endif>Event</option>
                                            <option value="case_study" @if($blog->type == "case_study") selected @endif>Case Study</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category </label>
                                        <select class=" form-control" name="category_id" id="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories AS $category)
                                                <option value="{{$category->id}}" @if($category->id == $blog->category_id) selected @endif>{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <input type="text" class="form-control" name="title" value="{{$blog->title}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="4" name="description" id="editor">{{$blog->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Image </label>
                                        <input class="form-control" type="file" name="blog_image">
                                        @if($blog->blog_image)
                                            <img src="{{ static_asset($blog->blog_image)}}" class="mt-2 rounded" width="80" height="50">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Country </label>
                                        <select class=" form-control" name="country">
                                            <option value="">Select Country</option>
                                            @foreach($countries AS $country)
                                                <option value="{{$country->id}}" @if($country->id == $blog->country) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class=" form-control" name="status" required>
                                            <option value="1" @if($blog->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($blog->status == 2) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tags </label>
                                        <input class="form-control" type="text" data-role="tagsinput" name="tags" value="{{ implode(",", json_decode($blog->tags)) }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title </label>
                                        <input type="text" class="form-control" name="meta_title" value="@if($blog->meta_title) {{$blog->meta_title}} @else {{$blog->title}} @endif">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Tag </label>
                                        <input type="text" class="form-control" name="meta_tag" value="{{$blog->meta_tag}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description </label>
                                        <textarea class="form-control" name="meta_description">{!! $blog->meta_description !!}</textarea>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')

<script>

  ClassicEditor.create(document.querySelector('#editor'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor2'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor3'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor4'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor5'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor6'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor7'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor8'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });



</script>
    <script>
        // tinymce.init({
        //     selector: 'textarea#description',
        // });

        $(document).ready(function () {
            /** Get category list on change on type */
            $('#type').on('change', function () {
                var idType = this.value;
                $("#category_id").html('');

                $.ajax({
                    url: "{{url('admin/blogs/fetch_category')}}",
                    type: "POST",
                    data: {
                        type: idType,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function (result) {
                        $('#category_id').html('<option value="">Choose Catyegory</option>');

                        $.each(result.categories, function (key, value) {
                            $("#category_id").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });
        });

    </script>
@endsection
