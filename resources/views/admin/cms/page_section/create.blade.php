@extends('admin.include.master')
@section('title', 'Add New Page Scetion')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add New Page Scetion</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.page_sections.store') }}" enctype="multipart/form-data">
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
                                        <select class="form-control" name="page_id">
                                            <option value="0">No Parent</option>
                                            @foreach($cms_pages AS $menu)
                                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Section Name </label>
                                        <input type="text" class="form-control" name="section_name"> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="title"> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea class="form-control" name="description" id="editor" style="display: none;"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="image">
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

                            </div>	
                            <button type="submit" class="btn btn-primary buttonedit1">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



 
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
 
 
 
@endsection

