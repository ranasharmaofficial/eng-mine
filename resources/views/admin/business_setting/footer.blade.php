@extends('admin.include.master')
@section('title', 'Website Footer')
@section('content')



<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Manage Website Footer</h4>
                    </div>
                </div>
            </div>
        </div>

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

        <!-- Manage Footer Logo  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">


                                <input type="hidden" class="form-control" name="type" value="footer_setup" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Footer Logo </strong></label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="footer_logo">
                                            @if(fetch_business_setting_value('footer_setup', 'footer_logo') != null)
                                                <img src="{{ static_asset(fetch_business_setting_value('footer_setup', 'footer_logo')) }}" height=100 >
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Footer Description</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="footer_description" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'footer_description') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Copyright Widget</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="copyright_widget" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'copyright_widget') }}" pattern="+91[7-9]{1}[0-9]{9}">
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

        <!-- Manage Contact Info  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">
                                <input type="hidden" class="form-control" name="type" value="footer_setup" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_address" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'contact_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_phone" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'contact_phone') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_email" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'contact_email') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Working Hours</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_working_hr" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'contact_working_hr') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Corporate Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="corporate_address" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'corporate_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Corporate Address Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="corporate_address_phone" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'corporate_address_phone') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Corporate Address Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="corporate_address_email" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'corporate_address_email') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Registered Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="registered_address" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'registered_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Registered Address Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="registered_address_phone" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'registered_address_phone') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Registered Address Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="registered_address_email" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'registered_address_email') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Tollfree</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="tollfree" required>
                                            <input class="form-control" name="values[]" row="6" col="50" value="{{ fetch_business_setting_value('footer_setup', 'tollfree') }}"  />
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Local Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="local" required>
                                            <input class="form-control" name="values[]" row="6" col="50" value="{{ fetch_business_setting_value('footer_setup', 'local') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Skype Id</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="skype" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'skype') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Telegram</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="telegram" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'telegram') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>WhatsApp</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="whatsapp" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'whatsapp') }} </textarea>
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

        <!-- Manage Widget One  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_type1" value="footer_widget_one_lable" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget One Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lable" value="widget_one_name" required>
                                            <input type="text" class="form-control" name="widget_name" value="{{ fetch_business_setting_value('footer_widget_one_lable', 'widget_one_name') }}" >
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="widget_type2" value="footer_widget_one_links">
                                @php
                                    $widget_one_data = fetch_business_setting_data('footer_widget_one_links');
                                @endphp

                                @if($widget_one_data)
                                    @foreach(json_decode($widget_one_data->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{json_decode($widget_one_data->value)[$key]}}">
                                                <div class="input-group-prepend mx-1">
                                                    <button class="btn btn-danger"
                                                        id="DeleteRow" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div id="new_widget_one_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_one_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Widget Two  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_type1" value="footer_widget_two_lable" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget Two Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lable" value="widget_two_name" required>
                                            <input type="text" class="form-control" name="widget_name" value="{{ fetch_business_setting_value('footer_widget_two_lable', 'widget_two_name') }}" >
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="widget_type2" value="footer_widget_two_links">
                                @php
                                    $widget_two_data = fetch_business_setting_data('footer_widget_two_links');
                                @endphp

                                @if($widget_two_data)
                                    @foreach(json_decode($widget_two_data->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{json_decode($widget_two_data->value)[$key]}}">
                                                <div class="input-group-prepend mx-1">
                                                    <button class="btn btn-danger"
                                                        id="DeleteRow" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div id="new_widget_two_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_two_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Widget Three  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_type1" value="footer_widget_three_lable" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget Three Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lable" value="widget_three_name" required>
                                            <input type="text" class="form-control" name="widget_name" value="{{ fetch_business_setting_value('footer_widget_three_lable', 'widget_three_name') }}" >
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="widget_type2" value="footer_widget_three_links">
                                @php
                                    $widget_three_data = fetch_business_setting_data('footer_widget_three_links');
                                @endphp
                                @if($widget_three_data)
                                    @foreach(json_decode($widget_three_data->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{json_decode($widget_three_data->value)[$key]}}">
                                                <div class="input-group-prepend mx-1">
                                                    <button class="btn btn-danger"
                                                        id="DeleteRow" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div id="new_widget_three_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_three_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
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

<script type="text/javascript">

    function addNewRow(append_id){
        newRowAdd =
            '<div class="row my-2 w-100" id="row"><div class="col-md-12 d-flex">'+
            '<input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable">'+
            '<input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link">'+
            '<div class="input-group-prepend mx-1">'+
            '<button class="btn btn-danger" id="DeleteRow" type="button">'+
            '<i class="fa fa-trash"></i> </button>'+
            '</div></div></div>';

        $(append_id).append(newRowAdd);
    }

    $("#widget_one_row_adder").click(function () {
        addNewRow("#new_widget_one_input");
    });

    $("#widget_two_row_adder").click(function () {
        addNewRow("#new_widget_two_input");
    });

    $("#widget_three_row_adder").click(function () {
        addNewRow("#new_widget_three_input");
    });

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script>


	</div>

	<script>
        $(document).ready(function() {
            toastr.options.timeOut = 5000;
                    });

    </script>

@endsection
