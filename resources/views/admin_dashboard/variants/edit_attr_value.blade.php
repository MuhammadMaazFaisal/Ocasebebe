@extends('admin_dashboard.layouts.master')
@section('content')

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {

position: unset !important;
border-right: unset !important
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover,
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus {
background-color: #7366ff;
color: #fff;
}

/* update work 8 */
.select-dropdown,
.select-dropdown * {
position: relative;
}

.select-dropdown {
position: relative;
color: grey;

}

.select-dropdown select {
background-color: transparent;
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
color: grey;
}

.select-dropdown select:active,
.select-dropdown select:focus {
outline: none;
box-shadow: none;
color: grey;
}

.select-dropdown:after {
content: "";
position: absolute;
top: 50%;
right: 8px;
width: 0;
height: 0;
margin-top: -2px;
border-top: 5px solid #aaa;
border-right: 5px solid transparent;
border-left: 5px solid transparent;

}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Attribute {{$attr_value->variant ?? ''}} </h5>
                    {{-- <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                            href="{{ route('variants.create') }}">Add</a></div> --}}

                </div>
                <div class="card-body">
                    <div class="form theme-form">
                        <form id="" action="{{route('attribute-value.update',$edit_val->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="variants_id" value="{{$attr_value->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Attribute Value.*</label>
                                        <input class="form-control" type="text" placeholder="Enter Attribute Value" data-bs-original-title="" title="" name="attribute_value" value="{{$edit_val->attribute_value}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Pick Color.*</label>
                                        <input class="form-control" type="color" name="color_code" value="{{ $edit_val->color_code }}" >
                                    </div>
                                </div>
                            </div>
                            {{-- update work 13 --}}
                            {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Attribute Value.*</label>
                                        <select class="form-control js-example-tokenizer" name="attribute_value[]"
                                        id="attribute_value" multiple="multiple">
                                        <option selected="selected"></option>

                                    </select>
                                        <input class="form-control" type="text" placeholder="Enter Attribute Value" data-bs-original-title="" title="" name="variation_value" value="{{old('variation_value')}}" >
                                    </div>
                                </div>
                            </div> --}}
                            {{-- update work 13 --}}
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <button type="submit" id="" class="btn btn-success me-3">Update</button>
                                        <a class="btn btn-danger" href="{{route('variants.index')}}" data-bs-original-title="" title="">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- {{-- script start --}} -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
</script>
<script>
    $(document).ready(function(){
    $('#parent_category_id').on('change', function(){
        var id = $(this).val();
        $.ajax({
        type: "GET",
        url: '{{route('get_main_category')}}',
        "dataSrc": "",
        data:  {'id':id},
        // dataType: 'json',
        //  cache: false,
        success: function(response) {
            // console.log(response.clients);
            // $("#pageloader").hide();
            $('#main-category_id').html('');
            // $("#main-category_id").append(`<optgroup label="Please Select Parent Category">`);
            if(response!='') {
                $.each(response.maincategory, function(value,i) {
                    $('#main-category_id').append(`<option  value ="${i.id}" >${i.main_category_name}</option>`);
                });
                }else
                {
                    $('#main-category_id').append('<h3>No Category Found</h3>');
                }
             }
        });
    });
});
</script>
<script>
        var id = ($('select[name="parent_category_id"]').val());
        $.ajax({
        type: "GET",
        url: '{{route('get_main_category')}}',
        data:  {'id':id},
        success: function(response) {
            // console.log(response.clients);
            $('#main-category_id').html('');
            if(response!='') {
                $.each(response.maincategory, function(value,i) {
                    var select = (i.id == i.main_category_name ? 'selected="selected"' : '');
                    // console.log(test);
                    $('#main-category_id').append(`<option  value ="${i.id}" ${select}>${i.main_category_name}</option>`);

                });
                }else
                {
                    $('#main-category_id').append('<h3>No Category Found</h3>');
                }
            }
        });
    </script>
    @endpush
@endsection

