@extends('admin.include.master')
@section('title', 'Website Header')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Manage Website Header</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
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

                                <input type="hidden" class="form-control" name="type" value="header_setup" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Header Logo </strong></label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="header_logo">
                                            @if(fetch_business_setting_value('header_setup', 'header_logo') != null)
                                                <div style="background-color:#ccc;">
                                                    <img src="{{ asset('public/'.fetch_business_setting_value('header_setup', 'header_logo')) }}" height=100 width="auto">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="header_phone" required>
                                            <input type="text" class="form-control" name="values[]" pattern="+91[7-9]{1}[0-9]{9}" value="{{ fetch_business_setting_value('header_setup', 'header_phone') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="header_email" required>
                                            <input type="email" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'header_email') }}">
                                        </div>
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>WhatsApp</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="whatsapp" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'whatsapp') }}">
                                        </div>
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Skype</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="skype" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'skype') }}">
                                        </div>
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Header Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="header_address" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'header_address') }}">
                                        </div>
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Header Website</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="header_website" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'header_website') }}">
                                        </div>
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Header Hr Enquiry</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="header_hr" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'header_hr') }}">
                                        </div>
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
