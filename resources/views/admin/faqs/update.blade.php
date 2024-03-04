@extends('admin.include.master')
@section('title', 'Update FAQ')
@section('content')

	<div class="page-wrapper">
      <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
          <div class="row align-items-center">
            <div class="col">
              <div class="breadcrumb "><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> /
                FAQs</div>
            </div>
            <div class="col">
              <a href="{{ url('admin/faqs') }}"
                class="btn btn-info float-right veiwbutton "><!-- <i class="fa fa-plus" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                back</a>
            </div>
          </div>
        </div>
        <hr>
        <hr>

        <div class="bg-white shadow p-3 mb-4 rounded position-relative">
          <div class="profile-menu">
            <ul class="nav nav-tabs nav-tabs-solid">
              <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                  href="#indian_cuisine">Edit FAQs Information</a> </li>
              <!-- <li class="nav-item"> <a class="nav-link border mx-1 rounded-top" data-toggle="tab" href="#indian_cuisine2">Edit Certified By Engineers </a> </li>
                     <li class="nav-item"> <a class="nav-link border mx-1 rounded-top" data-toggle="tab" href="#indian_cuisine3">Edit New Role</a> </li> -->
            </ul>
          </div>
          <div class="tab-content profile-tab-cont mt-1">
            <div class="tab-pane fade active show" id="indian_cuisine">
              <!-- <h6 class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">Edit Staff Information</h6> -->
				
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
				
			  <form class="form-horizontal" action="{{ route('admin.faqs.update',$faq->id) }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('put')
                <div class="card-body">
					<div class="row">
		  
						<div class="col-md-12">
							<div class="form-group">
								<label>Question <span class="text-danger">*</span> </label>
								<input type="text" class="form-control" value="{{$faq->question}}" name="question"> 
							</div>
						</div>

						 
						
						<div class="col-md-12">
							<div class="form-group row">
								<div class="col-sm-12">
									<label>Answer <span class="text-danger">*</span></label>
									<textarea class="" name="answer" id="editor" style="display: none;">{!! $faq->answer !!}</textarea>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Status <span class="text-danger">*</span></label>
								<select class=" form-control" name="status">
									<option value="1" @if($faq->status == 1) selected @endif>Active</option>
                                            <option value="2" @if($faq->status == 2) selected @endif>Inactive</option>
								</select> 
							</div>
						</div>
						<div class="col-md-12">
						  <button type="submit" class="btn btn-primary btn-icon-text">
							<i class="ti-file btn-icon-prepend"></i>
							UPDATE
						  </button>
						</div>
					</div>
				</div>
              </form>

            </div>
              
             
          </div>
        </div>
        @include('admin.include.topfoot')
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

@section('script')
    <script type="text/javascript">
        // tinymce.init({
        //     selector: 'textarea#answer',
        // });
		
		$(document).ready(function () {
            /** Get Sub category list on change on parent category */
            $('#faq_type').on('change', function () {
                var idPage = this.value;
				// alert(idPage);
                $("#faq_category").html('');
                $.ajax({
                    url: "{{ route('admin.fetch_faq_category')}}",
                    type: "POST",
                    data: {
                        faq_type: idPage,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function (result) {
						console.log(result);
                        $('#faq_category').html('<option value="">Choose Section</option>');
                        $.each(result.categories, function (key, value) {
                            $("#faq_category").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
        
    </script>
@endsection
