@extends('admin.include.master')
@section('title', 'Add New CMS Page')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mb-0 pt-3">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="breadcrumb "><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard</a> / CMS</div>
                    </div>
                    <div class="col">
                        <a href="cms_pages.php" class="btn btn-info float-right veiwbutton ">Back</a>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card1">
                                <div class="row gutters-5 align-items-center">
                                    <div class="col pr-0">
                                        <h5 class="mb-md-0 h6">Add Pages</h5>
                                    </div>

                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                            <hr>
							


                            <form method="post" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
                                @csrf
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
                                            <label>Select Parent <span class="text-danger">*</span> </label>
                                            <select class="form-control" name="parent_id">
                                                <option value="0">No Parent</option>
                                                @foreach ($categories as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status <span class="text-danger">*</span></label>
                                            <select class=" form-control" name="status">
                                                <option value="1" selected>Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="title" class="col-form-label">Page URL <star>*</star></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="page_url" class="form-control" placeholder="slug"
                                                id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="card-header px-0">
                                    <h6 class="fw-900 fw-bold mb-0">Seo Fields</h6>
                                </div>

                                <div class="card-body px-0">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-from-label" for="name">Meta Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Title" name="meta_title"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-from-label" for="name">Meta description</label>
                                        <div class="col-sm-10">
                                            <textarea class="resize-off form-control" placeholder="Description" name="meta_description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-from-label" for="name">Keywords</label>
                                        <div class="col-sm-10">
                                            <textarea class="resize-off form-control" placeholder="Keyword, Keyword" name="meta_tag"></textarea>
                                            <small class="text-muted">Separate with coma</small>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save Page</button>
                                    </div>
                                </div>
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
        tinymce.init({
            selector: 'textarea#description',
        });
    </script>
@endsection
