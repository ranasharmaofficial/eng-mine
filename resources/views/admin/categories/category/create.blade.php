@extends('admin.include.master')
@section('title', 'Add New Category')
@section('content')
<style>.loading-spinner {	display: none;}.loading-spinner.active {	display: inline-block; // or whatever is appropriate to display it nicely     }</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add New Category</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" id="blog-categories-form" action="{{ route('admin.categories.store') }}">
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
                                </div>																<div style="display:none;" id="show-form-error" class="alert alert-danger col-md-12">									<ul>										<div class="errorMsgntainer"></div>									</ul>								</div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="title" required> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="">Select Type</option>
                                            <option value="blog">Blog</option>
                                            <option value="news">News</option>
                                            <option value="event">Event</option>
                                            <option value="case_study">Case Study</option>
                                        </select> 
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span> </label>
                                        <select class=" form-control" id="status" name="status" required>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select> 
                                    </div>
                                </div>

                            </div>	
                            <button type="button" class="btn btn-primary buttonedit1 save_blogcategory"><i class="fa fa-spinner loading-spinner" aria-hidden="true"></i> Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div><script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><script src="https://code.jquery.com/jquery-3.4.1.js"></script><script type="text/javascript">    $(document).on('click', '.save_blogcategory', function(e) {        e.preventDefault();        var formData = new FormData(document.getElementById("blog-categories-form"));        $.ajaxSetup({            headers: {                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')            }        });				$('.loading-spinner').toggleClass('active');		        $.ajax({            type: "POST",			url: "{{ route('admin.categories.store') }}",			data: formData,			processData: false,			contentType: false,			dataType: "JSON",			success: function(data) {                if (data.status == true) {                    toastr.success('Added Successfully.');                    setTimeout(function() {                        window.location = "{{ url('admin/categories') }}"                    }, 2000);                } else {                    toastr.error('Something went wrong.');                }				$('.loading-spinner').toggleClass('active');            },			error: function(err) {				$('.loading-spinner').removeClass('active');                document.getElementById('show-form-error').style = "display: block";				let error = err.responseJSON;                $.each(error.errors, function(index, value) {                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');                });            }        });    });      </script>

@endsection
