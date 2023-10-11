@extends('admin_dashboard.layouts.master')
@section('content')
    <style>
        .customer_records,
        .remove {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .tabsBox {
            padding: 20px;
        }

        div.tabsContent {
            margin-top: 20px;
        }

        button#pillsProductTab,
        button#pillsVariationTab,
        button#pillsStockTab,
        button#pillsTagsTab,
        button#pillsImageTab {
            border: none;
            padding: 10px 30px;
            color: #000000;
            font-size: 14px;
            background-color: #c1c1c194;
            margin-right: 10px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #ff2446 !important;
            color: #fff !important;
        }

        .upload__btn p {
            margin-bottom: 0px;
        }

        .upload__btn {
            display: inline-block;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .uploadImage {
            width: 65px;
            height: 45px;
            border-radius: 6px;
            overflow: hidden;
        }

        .uploadImage img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

        .upload__img-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 65%;
            margin: 16px 0px;
        }

        button.startUploadButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        button.cancelUploadButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #7e7e7e8f;
            border-color: #c1c1c194;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        button.imageDeleteButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        .smallButton {
            min-width: 75px !important;
            font-size: 12px !important;
            line-height: 20px !important;
        }

        .form-select {
            background-image: unset !important;
        }

        form.quantityBox {
            display: flex !important;
            align-items: center !important;
            gap: 20px !important;
            margin: 24px 0px;
        }
    </style>
    <style>
        .customer_records,
        .remove {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .tabsBox {
            padding: 20px;
        }

        div.tabsContent {
            margin-top: 20px;
        }

        button#pillsProductTab,
        button#pillsVariationTab,
        button#pillsStockTab,
        button#pillsTagsTab,
        button#pillsImageTab,
        button.cstm_buttons {
            border: none;
            padding: 10px 30px;
            color: #000000;
            font-size: 14px;
            background-color: #c1c1c194;
            margin-right: 10px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #ff2446 !important;
            color: #fff !important;
        }

        .active_btn {
            background-color: #ff2446 !important;
            color: #fff !important;
        }

        .upload__btn p {
            margin-bottom: 0px;
        }

        .upload__btn {
            display: inline-block;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .uploadImage {
            width: 65px;
            height: 45px;
            border-radius: 6px;
            margin-right: 16px;
            overflow: hidden;
        }

        .uploadImage img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

        .upload__img-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 65%;
            margin: 16px 0px;
        }

        button.startUploadButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        button.cancelUploadButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #7e7e7e8f;
            border-color: #c1c1c194;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        button.imageDeleteButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        .smallButton {
            min-width: 75px !important;
            font-size: 12px !important;
            line-height: 20px !important;
        }

        .form-select {
            background-image: unset !important;
        }

        form.quantityBox {
            display: flex !important;
            align-items: center !important;
            gap: 20px !important;
            margin: 24px 0px;
        }

        #next {
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
            width: 100%;
        }

        .review-img-box .remove {
            display: block;
            color: #ff2446;
            text-align: center !important;
            font-size: 20px;
        }

        /* updated Work */

        .uploadImageSave {
            display: flex;
            align-items: center;
            justify-content: end;
            width: 65%;
            margin: 16px 0px;
        }

        .editImages {
            width: 50%;
            height: 50%;
            overflow: hidden;
        }

        .editImages img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .editImagesBox {
            display: flex;
            gap: 20px;
        }

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

        .plusButton {
            padding: 6px 16px !important;
        }

        .addForm {
            padding: 1rem;
            background-color: #f3f3f3;
            box-shadow: 0px 0px 19px -4px #a0a8ee;
            margin-bottom: 24px;
        }

        /* update work */

        .addForm h6 {
            margin-bottom: 16px;
        }

        .form-check-input[type=checkbox] {
            border-radius: 0px !important;
        }

        .form-check-input:checked {
            background-color: #ff2446 !important;
            border-color: #ff2446 !important;
        }

        .form-check-input:focus {
            box-shadow: unset !important;
        }

        .form-check-label a {
            color: #000000;
        }

        .selectButtons {
            display: flex;
            justify-content: space-between;
        }

        .saveRedBtn {
            background-color: #ff2446 !important;
            border-color: #ff2446 !important;
        }

        .accordion-button:focus {
            border-color: 1px solid #ffffff !important;
            box-shadow: unset !important;
        }

        .accordion-button:not(.collapsed) {
            color: #000000 !important;
            background-color: #ffffff !important;
            border: 1px solid #c1c1c194 !important;
        }

        .accordion-button {
            border: 1px solid #c1c1c194 !important;
            padding: 10px !important;
        }

        .form-group a span {
            color: #000000;
        }


        .removeBtn a {
            color: red;
            font-size: 14px !important;
        }

        .accordion-item:first-of-type .accordion-button {
            border-radius: 0px !important;
        }

        .accordion-header button {
            border: 1px solid #c1c1c194 !important;
        }

        button.removeBtn {
            display: flex;
            padding: 11.7px 1.25rem;
            border: 1px solid #c1c1c194 !important;

        }

        .accordion-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .selectDropdown select {
            padding: 9.5px 1.25rem;
            width: 120px;
            border-radius: 0px !important;
            font-size: 14px;
        }

        .uploadImage {
            width: 60px;
            height: 60px;
            overflow: hidden;
            border-radius: 10px;
        }

        .uploadImage img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .select-dropdown.selectDropdown {
            margin-right: 6px !important;
        }

        .saveAndCancel {
            display: flex;
            gap: 10px;
        }



        .imageWrapper {
            width: 65px;
            height: 65px;
            overflow: hidden;
            border-radius: 10px;
        }

        .imageWrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        button.file-upload {
            border: none;
            margin: 20px 0px;
            padding: 0px;
        }

        input.file-input {
            background-color: #6860612e !important;
            color: #fff !important;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            width: 120px;
            font-size: 12px;
            cursor: pointer;
        }

        .schedule {
            color: #ff2446;
            text-decoration: underline;
            cursor: pointer;
        }

        ::-webkit-file-upload-button {
            display: none;
        }

        .validation-product {
            display: none;
        }

        .create-attribute-product {
            display: none;
        }

        .select2.select2-container.select2-container--default.select2-container--below {
            height: 100% !important;
            border: 1px solid #ced4da;
            outline: none;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: none !important;
        }
    </style>
    <style>
        .for-ctm-height {
            max-height: 200px !important;
            min-height: 200px !important;
        }

        .cke_contents.cke_reset {
            max-height: 200px !important;
            min-height: 200px !important;
        }

        .image_container {
            height: 60px;
            width: 100px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
            color: #d82e6b;
        }

        .image_container img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .image_container span {
            top: -14px;
            right: 3px;
            color: red;
            font-size: 26px;
            font-weight: 700;
            cursor: pointer;
        }

        .mutipleimages {
            color: red;
            font-size: 11px;
        }

        span.btn.btn-success.addeventmore {
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 10px;
        }

        span.btn.btn-danger.removeeventmore {
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
        }

        .is-error {
            border: solid 1px red;
            color: red;
        }

        .close-img {
            position: relative;
            width: 120px;
            height: 80px;
            margin-right: 1rem;
            margin-bottom: 1rem;
        }

        .close-img .close-img-btn {
            position: absolute;
            background: transparent;
            right: 0px;
            top: -4px;
            border: none;
            outline: none;
        }

        .close-img .close-img-btn i {
            background: #d82e6b;
            padding: 3px 6px;
            font-size: 14px;
            font-weight: 900;
            color: #fff;
            border-radius: 50px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card tabsBox" id="tabs_id">
                    <form method="POST" action="{{ route('update-product', ['id' => $products->id]) }}"
                        enctype="multipart/form-data" id="product" class="myform product_val">
                        @csrf
                        <div class="tab-content tabsContent" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pillsProduct" role="tabpanel"
                                aria-labelledby="pillsProductTab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Product Image.*</label>
                                                <input type="file" name="image" id="image" class="form-control"
                                                    onchange="loadFile(event)">
                                                <img id="output" width="55px" class="mt-3"
                                                    src="{{ asset('products/' . $products->image) }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Product Gallery.*</label>
                                                <input type="file" name="multiple_image[]" class="myfrm form-control"
                                                    id="product_image" multiple onchange="image_select()">
                                                <div class=" d-flex flex-wrap justify-content-start"
                                                    id="display_product_image">

                                                    @if (count(json_decode($products->multiple_image)) > 0)
                                                        @foreach (json_decode($products->multiple_image) as $key => $image)
                                                            {{-- <div class="image_container d-flex justify-content-center position-relative">
                                                    <img src="{{ asset('products/'.$image) }}" alt="Image">
                                                    <span class="position-absolute" >&times;</span>
                                                </div> --}}

                                                            <div class="mt-2 close-img display_none_{{ $key }}">

                                                                <img src="{{ asset('products/' . $image) }}" alt="image"
                                                                    style="width:80px;" class="delete-image">
                                                                <button type="button"
                                                                    class="deleteImage close-img-btn display_none_{{ $key }}"
                                                                    id="del-image{{ $products->id }}"
                                                                    data-key="{{ $key }}"
                                                                    data-id="{{ $products->id }}"
                                                                    data-src="{{ $image }}"><i class="fa fa fa-times"
                                                                        aria-hidden="true"></i></button>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Product Name.*</label>
                                                <input class="form-control" id="product_name" type="text"
                                                    placeholder="Enter Product Title" data-bs-original-title=""
                                                    title="" name="product_name"
                                                    value="{{ $products->product_name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Select Category.*</label>
                                                <select id="parent_category_id" name="category"
                                                    for="exampleFormControlInput10" class="form-control btn-square type">
                                                    <option value="" disabled selected>Choose Category</option>
                                                    <option value="Dummy Category">Dummy Category</option>
                                                    {{-- @foreach ($parent_categories as $parents)
                                                        <option id="parent_category_id" value="{{ $parents->id }}"
                                                            class="form-control btn-square" {{ $parents->id == $products->parent_category_id ? 'selected' : '' }}>
                                                            {{ $parents->parent_category_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="row mt-4 mb-4" id="discounted_id">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput10">Regular price.*</label>
                                                <input type="number" class="form-control regularPrice salePrice"
                                                    placeholder="Regular price" id="regular_price" name="regular_price"
                                                    value="{{ $products->price }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput10">Sale price.</label>
                                                <input type="number" class="form-control salePrice"
                                                    placeholder="Sale price" id="sale_price" name="sale_price"
                                                    value="{{ $products->discount_price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Product Description.*</label>
                                                <textarea class="form-control editor" name="description" id="description" cols="30" rows="10">{{ $products->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit"
                                                    class="btn btn-success cstm_buttons active_btn remove-tag"
                                                    id="save_next_btn">Save</button>
                                            </div>
                                        </div>
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
    </div>
@endsection
@push('scripts')
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        // discount date
        $(".salePrice").keyup(function(e) {
            var num = this.value.match(/^\d+$/);

            if (num === null || num == 0) {
                this.value = "";
            }
        });
        $(".quantity").keyup(function(e) {
            var num = this.value.match(/^\d+$/);

            if (num === null || num == 0) {
                this.value = "";
            }
        });


        $(".salePrice").change(function(e) {
            var regular_price = $("#regular_price").val();
            var sale_price = $("#sale_price").val();

            if (parseInt(sale_price) >= parseInt(regular_price)) {
                toastr.error('Sorry, sale price must be less than regular price.');
                $(".salePrice").val("");
                $(".salePrice").focus();
            }
        });



        $(".salePrice").keyup(function(e) {
            var regular_price = $("#regular_price").val();
            var sale_price = $("#sale_price").val();

            if (parseInt(sale_price) >= parseInt(regular_price)) {
                toastr.error('Sorry, sale price must be less than regular price.');
                $(".salePrice").val("");
                $(".salePrice").focus();
            }
        });


        var images = [];

        function image_select() {

            var image = document.getElementById('product_image').files;
            if (image.length > 5) {
                $('#product_image').val("");
                toastr.error('You can upload only 5 images!');
                return false;

            }
            for (i = 0; i < image.length; i++) {

                images.push({

                    "name": image[i].name,
                    "url": URL.createObjectURL(image[i]),
                    "file": image[i],
                })
            }

            document.getElementById('display_product_image').innerHTML = image_show();

        }

        function image_show() {

            var image = "";

            // var imgCount = document.images.length;
            if (images.length < 6) {

                images.forEach((i) => {
                    console.log(images.length);
                    image += `<div class="image_container d-flex justify-content-center position-relative">
              <img src="` + i.url + `" alt="Image">
              <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span>
          </div>`;

                });


                return image;

            } else {
                // var images.length = "";
                toastr.error('Please select 5 images at once!');
                $('#product_image').val("");
                location.reload();
                return null;
            }


        }

        function delete_image(e) {
            images.splice(e, 1);
            document.getElementById('display_product_image').innerHTML = image_show();
            const dt = new DataTransfer()
            const input = document.getElementById('product_image')
            const {
                files
            } = input

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (e !== i)
                    dt.items.add(file);
            }

            input.files = dt.files;
            console.log(document.getElementById('product_image').files);
        }
    </script>
    <script>
        $(document).ready(function() {


            $('.deleteImage').on('click', function(event) {

                let id = $(this).attr("data-id");
                let img = $(this).attr("data-src");
                let key = $(this).attr("data-key");

                $.ajax({
                    type: "GET",
                    url: "{{ route('remove_image') }}",
                    data: {
                        img: img,
                        id: id,
                        product_type: 1,
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            location.reload(true);
                            $(".display_none_" + key).addClass("display_none");
                            toastr.success(res.msg)

                        }
                    }
                });
            });

        });
    </script>

    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#sale_start').attr('min', today);
        $('#sale_end').attr('min', today);



        $('.js-example-basic-multiple').select2({
            placeholder: 'Select Product Color',
            allowClear: true
        });
        $('.js-example-basic-multiple1').select2({
            placeholder: 'Select Length Size',
            allowClear: true
        });
    </script>
@endpush
