@extends('admin.include.master')
@section('title', 'Add New Product Section')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add New Product Section</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.product_sections.store') }}" enctype="multipart/form-data">
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
                                        <select class="form-control" name="section_name">
                                            <option value="">---Select Section---</option>
                                            <option value="about_section">About Us Section</option>
                                            <option value="left_image_section">About Left Image Section</option>
                                            <option value="right_image_section">About Right Image Section</option>
                                            <option value="solution_section">Solution Built Section (Black Background)</option>
                                            <option value="pricing_section">Pricing Section</option>
                                            <option value="our_supported_section">Our Supported Section (Black Background)</option>
                                            <option value="private_cloud_section">Private Cloud Section</option>
                                            <option value="key_points_section_1">Key Point Section 1 (Black Background)</option>
                                            <option value="feature_section">Feature Section</option>
                                            <option value="middle_section_1">Middle Section 1</option>
                                            <option value="middle_section_2">Middle Section 2</option>
                                            <option value="choose_section">Choose Us Section (Black Background)</option>
                                            <option value="testimonial">Testimonial Section</option>
                                            <option value="faq_section">FAQ Section</option>
                                            <option value="clients_section">Client Section</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>

                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <textarea class="form-control" name="title" id="description"></textarea>
                                    </div>
                                </div> --}}

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea class="form-control" name="description" id="description"></textarea>
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

@endsection

@section('script')
    <script>
        tinymce.init({
            selector: 'textarea#description',
        });

    </script>
@endsection
