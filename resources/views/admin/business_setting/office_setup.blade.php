@extends('admin.include.master')
@section('title', 'Website Footer')
@section('content')



<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Manage Corporate Office Start  -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Manage Corporate Office</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_office_setup') }}">
                            @csrf
                            <div class="row formtype align-items-end">

                                <input type="hidden" name="office_type" value="corporate_office_contact">
                                <input type="hidden" name="address_type" value="corporate_office_address">
                                @php 
                                    $corporate_office_contact = fetch_business_setting_data('corporate_office_contact');
                                    $corporate_office_address = fetch_business_setting_data('corporate_office_address');

                                @endphp 

                                @if($corporate_office_contact)
                                    @foreach(json_decode($corporate_office_contact->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="email[]" placeholder="Email" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="contact[]" placeholder="Contact" value="{{json_decode($corporate_office_contact->value)[$key]}}">
                                                <textarea class="form-control mx-1" name="address[]" col="20" row="3" placeholder="Address">{!! json_decode($corporate_office_address->field_name)[$key] !!}</textarea>
                                                <textarea class="form-control mx-1" name="timing[]" col="20" row="3" placeholder="Timing">{!! json_decode($corporate_office_address->value)[$key] !!}</textarea>
                                                
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
                                        Add New
                                    </button>
                                </div>
                            </div>	

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Manage Corporate Office End  -->

        <!-- Manage Global Office Start  -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Manage Global Office</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_office_setup') }}">
                            @csrf
                            <div class="row formtype align-items-end">

                                <input type="hidden" name="office_type" value="global_office_contact">
                                <input type="hidden" name="address_type" value="global_office_address">
                                @php 
                                    $global_office_contact = fetch_business_setting_data('global_office_contact');
                                    $global_office_address = fetch_business_setting_data('global_office_address');
                                @endphp 

                                @if($global_office_contact)
                                    @foreach(json_decode($global_office_contact->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="email[]" placeholder="Email" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="contact[]" placeholder="Contact" value="{{json_decode($global_office_contact->value)[$key]}}">
                                                <textarea class="form-control mx-1" name="address[]" col="20" row="3" placeholder="Address">{!! json_decode($global_office_address->field_name)[$key] !!}</textarea>
                                                <textarea class="form-control mx-1" name="timing[]" col="20" row="3" placeholder="Timing">{!! json_decode($global_office_address->value)[$key] !!}</textarea>
                                                
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
                                        Add New
                                    </button>
                                </div>
                            </div>	

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Manage Global Office End  -->
    </div>

    
</div>

<script type="text/javascript">

    function addNewRow(append_id){
        newRowAdd =
            '<div class="row my-2 w-100" id="row"><div class="col-md-12 d-flex">'+
            '<input type="text" class="form-control mx-1" name="email[]" placeholder="Email">'+
            '<input type="text" class="form-control mx-1" name="contact[]" placeholder="Contact">'+
            '<textarea class="form-control mx-1" name="address[]" col="20" row="3" placeholder="Address"></textarea>'+
            '<textarea class="form-control mx-1" name="timing[]" col="20" row="3" placeholder="Timing"></textarea>'+
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

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script>

@endsection
