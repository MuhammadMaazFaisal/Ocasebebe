@extends('admin_dashboard.layouts.master')
@section('content')
    <style>
        .footer {
            margin-left: -20px !important;
        }

        .gender-full-width select {
            width: 100%;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('user-update', $users->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{-- <input id="hidden" type="hidden" name="hidden"> --}}
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <input type="hidden" name="prev_password" value="{{ $users->password }}">
                                <div class="row">
                                    {{-- <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">User Profile Image </label>
                                            <input class="form-control" type="file"
                                                placeholder="Enter Business Information" data-bs-original-title=""
                                                title="" name="profile_image">
                                        </div>
                                    </div> --}}
                                    @if (!empty($users->profile_image))
                                        <img src="{{ url('public/profiles/' . $users->profile_image) }}" alt=""
                                            height="100px" width="100px"><br><br><br>
                                    @endif
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" placeholder="Enter First Name"
                                                data-bs-original-title="" title="" name="first_name"
                                                value="{{ $users->first_name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Last Name"
                                                data-bs-original-title="" title="" name="last_name"
                                                value="{{ $users->last_name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" placeholder="Enter Email"
                                                data-bs-original-title="" title="" name="email"
                                                value="{{ $users->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Mobile Number</label>
                                            <input class="form-control" id="adminphone2" type="tel"
                                                placeholder="Enter Contact" data-bs-original-title="" title=""
                                                name="contact" value="{{ $users->contact }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            {{-- <label>D.O.B</label>
                                            <input class="form-control" type="date" placeholder="Enter D.O.B"
                                                data-bs-original-title="" title="" name="date_of_birth"
                                                value="{{ $users->date_of_birth }}"> --}}
                                            <div class="gender-full-width mt2">
                                                <label for="">Birthday</label>
                                                <!-- <input type="text" placeholder="Email"> -->
                                                <div class="d-flex justify-content-between">
                                                    <div class="custom-select">
                                                        <select name="month" id="month">
                                                            <option value="none" selected="">Month</option>
                                                            <option {{ $users->month == '01' ? 'selected' : '' }} value="01">
                                                                January</option>
                                                            <option {{ $users->month == '02' ? 'selected' : '' }} value="02">
                                                                February</option>
                                                            <option {{ $users->month == '03' ? 'selected' : '' }} value="03">
                                                                March</option>
                                                            <option {{ $users->month == '04' ? 'selected' : '' }} value="04">
                                                                April</option>
                                                            <option {{ $users->month == '05' ? 'selected' : '' }} value="05">
                                                                May</option>
                                                            <option {{ $users->month == '06' ? 'selected' : '' }} value="06">
                                                                June</option>
                                                            <option {{ $users->month == '07' ? 'selected' : '' }} value="07">
                                                                July</option>
                                                            <option {{ $users->month == '08' ? 'selected' : '' }} value="08">
                                                                August</option>
                                                            <option {{ $users->month == '09' ? 'selected' : '' }} value="09">
                                                                September</option>
                                                            <option {{ $users->month == '10' ? 'selected' : '' }} value="10">
                                                                October</option>
                                                            <option {{ $users->month == '11' ? 'selected' : '' }} value="11">
                                                                November</option>
                                                            <option {{ $users->month == '12' ? 'selected' : '' }} value="12">
                                                                December</option>
                                                        </select>
                                                        <span class="custom-arrow"></span>
                                                    </div>
                                                    <div class="custom-select selector-width">
                                                        <select name="day" id="day">
                                                            <option value="none" selected="">Day</option>
                                                            <option {{$users->day == '01' ? 'selected' : '' }} value="01">01
                                                            </option>
                                                            <option {{$users->day == '02' ? 'selected' : '' }} value="02">02
                                                            </option>
                                                            <option {{$users->day == '03' ? 'selected' : '' }} value="03">03
                                                            </option>
                                                            <option {{$users->day == '04' ? 'selected' : '' }} value="04">04
                                                            </option>
                                                            <option {{$users->day == '05' ? 'selected' : '' }} value="05">05
                                                            </option>
                                                            <option {{$users->day == '06' ? 'selected' : '' }} value="06">06
                                                            </option>
                                                            <option {{$users->day == '07' ? 'selected' : '' }} value="07">07
                                                            </option>
                                                            <option {{$users->day == '08' ? 'selected' : '' }} value="08">08
                                                            </option>
                                                            <option {{$users->day == '09' ? 'selected' : '' }} value="09">09
                                                            </option>
                                                            <option {{$users->day == '10' ? 'selected' : '' }} value="10">10
                                                            </option>
                                                            <option {{$users->day == '11' ? 'selected' : '' }} value="11">11
                                                            </option>
                                                            <option {{$users->day == '12' ? 'selected' : '' }} value="12">12
                                                            </option>
                                                            <option {{$users->day == '13' ? 'selected' : '' }} value="13">13
                                                            </option>
                                                            <option {{$users->day == '14' ? 'selected' : '' }} value="14">14
                                                            </option>
                                                            <option {{$users->day == '15' ? 'selected' : '' }} value="15">15
                                                            </option>
                                                            <option {{$users->day == '16' ? 'selected' : '' }} value="16">16
                                                            </option>
                                                            <option {{$users->day == '17' ? 'selected' : '' }} value="17">17
                                                            </option>
                                                            <option {{$users->day == '18' ? 'selected' : '' }} value="18">18
                                                            </option>
                                                            <option {{$users->day == '19' ? 'selected' : '' }} value="19">19
                                                            </option>
                                                            <option {{$users->day == '20' ? 'selected' : '' }} value="20">20
                                                            </option>
                                                            <option {{$users->day == '21' ? 'selected' : '' }} value="21">21
                                                            </option>
                                                            <option {{$users->day == '22' ? 'selected' : '' }} value="22">22
                                                            </option>
                                                            <option {{$users->day == '23' ? 'selected' : '' }} value="23">23
                                                            </option>
                                                            <option {{$users->day == '24' ? 'selected' : '' }} value="24">24
                                                            </option>
                                                            <option {{$users->day == '25' ? 'selected' : '' }} value="25">25
                                                            </option>
                                                            <option {{$users->day == '26' ? 'selected' : '' }} value="26">26
                                                            </option>
                                                            <option {{$users->day == '27' ? 'selected' : '' }} value="27">27
                                                            </option>
                                                            <option {{$users->day == '28' ? 'selected' : '' }} value="28">28
                                                            </option>
                                                            <option {{$users->day == '29' ? 'selected' : '' }} value="29">29
                                                            </option>
                                                            <option {{$users->day == '30' ? 'selected' : '' }} value="30">
                                                                30</option>
                                                            <option {{$users->day == '31' ? 'selected' : '' }} value="31">
                                                                31</option>

                                                        </select>
                                                        <span class="custom-arrow"></span>
                                                    </div>

                                                    <div class="custom-select">
                                                        <select name="year" id="year">
                                                            <option value="none" selected="">Year</option>
                                                            <option {{ $users->year == '2030' ? 'selected' : '' }}
                                                                value="2030">2030</option>
                                                            <option {{ $users->year == '2029' ? 'selected' : '' }}
                                                                value="2029">2029</option>
                                                            <option {{ $users->year == '2028' ? 'selected' : '' }}
                                                                value="2028">2028</option>
                                                            <option {{ $users->year == '2027' ? 'selected' : '' }}
                                                                value="2027">2027</option>
                                                            <option {{ $users->year == '2026' ? 'selected' : '' }}
                                                                value="2026">2026</option>
                                                            <option {{ $users->year == '2025' ? 'selected' : '' }}
                                                                value="2025">2025</option>
                                                            <option {{ $users->year == '2024' ? 'selected' : '' }}
                                                                value="2024">2024</option>
                                                            <option {{ $users->year == '2023' ? 'selected' : '' }}
                                                                value="2023">2023</option>
                                                            <option {{ $users->year == '2022' ? 'selected' : '' }}
                                                                value="2022">2022</option>
                                                            <option {{ $users->year == '2021' ? 'selected' : '' }}
                                                                value="2021">2021</option>
                                                            <option {{ $users->year == '2020' ? 'selected' : '' }}
                                                                value="2020">2020</option>
                                                            <option {{ $users->year == '2019' ? 'selected' : '' }}
                                                                value="2019">2019</option>
                                                            <option {{ $users->year == '2018' ? 'selected' : '' }}
                                                                value="2018">2018</option>
                                                            <option {{ $users->year == '2017' ? 'selected' : '' }}
                                                                value="2017">2017</option>
                                                            <option {{ $users->year == '2016' ? 'selected' : '' }}
                                                                value="2016">2016</option>
                                                            <option {{ $users->year == '2015' ? 'selected' : '' }}
                                                                value="2015">2015</option>
                                                            <option {{ $users->year == '2014' ? 'selected' : '' }}
                                                                value="2014">2014</option>
                                                            <option {{ $users->year == '2013' ? 'selected' : '' }}
                                                                value="2013">2013</option>
                                                            <option {{ $users->year == '2012' ? 'selected' : '' }}
                                                                value="2012">2012</option>
                                                            <option {{ $users->year == '2011' ? 'selected' : '' }}
                                                                value="2011">2011</option>
                                                            <option {{ $users->year == '2010' ? 'selected' : '' }}
                                                                value="2010">2010</option>
                                                            <option {{ $users->year == '2009' ? 'selected' : '' }}
                                                                value="2009">2009</option>
                                                            <option {{ $users->year == '2008' ? 'selected' : '' }}
                                                                value="2008">2008</option>
                                                            <option {{ $users->year == '2007' ? 'selected' : '' }}
                                                                value="2007">2007</option>
                                                            <option {{ $users->year == '2006' ? 'selected' : '' }}
                                                                value="2006">2006</option>
                                                            <option {{ $users->year == '2005' ? 'selected' : '' }}
                                                                value="2005">2005</option>
                                                            <option {{ $users->year == '2004' ? 'selected' : '' }}
                                                                value="2004">2004</option>
                                                            <option {{ $users->year == '2003' ? 'selected' : '' }}
                                                                value="2003">2003</option>
                                                            <option {{ $users->year == '2002' ? 'selected' : '' }}
                                                                value="2002">2002</option>
                                                            <option {{ $users->year == '2001' ? 'selected' : '' }}
                                                                value="2001">2001</option>
                                                            <option {{ $users->year == '2000' ? 'selected' : '' }}
                                                                value="2000">2000</option>
                                                            <option {{ $users->year == '1999' ? 'selected' : '' }}
                                                                value="1999">1999</option>
                                                            <option {{ $users->year == '1998' ? 'selected' : '' }}
                                                                value="1998">1998</option>
                                                            <option {{ $users->year == '1997' ? 'selected' : '' }}
                                                                value="1997">1997</option>
                                                            <option {{ $users->year == '1996' ? 'selected' : '' }}
                                                                value="1996">1996</option>
                                                            <option {{ $users->year == '1995' ? 'selected' : '' }}
                                                                value="1995">1995</option>
                                                            <option {{ $users->year == '1994' ? 'selected' : '' }}
                                                                value="1994">1994</option>
                                                            <option {{ $users->year == '1993' ? 'selected' : '' }}
                                                                value="1993">1993</option>
                                                            <option {{ $users->year == '1992' ? 'selected' : '' }}
                                                                value="1992">1992</option>
                                                            <option {{ $users->year == '1991' ? 'selected' : '' }}
                                                                value="1991">1991</option>
                                                            <option {{ $users->year == '1990' ? 'selected' : '' }}
                                                                value="1990">1990</option>
                                                            <option {{ $users->year == '1989' ? 'selected' : '' }}
                                                                value="1989">1989</option>
                                                            <option {{ $users->year == '1988' ? 'selected' : '' }}
                                                                value="1988">1988</option>
                                                            <option {{ $users->year == '1987' ? 'selected' : '' }}
                                                                value="1987">1987</option>
                                                            <option {{ $users->year == '1986' ? 'selected' : '' }}
                                                                value="1986">1986</option>
                                                            <option {{ $users->year == '1985' ? 'selected' : '' }}
                                                                value="1985">1985</option>
                                                            <option {{ $users->year == '1984' ? 'selected' : '' }}
                                                                value="1984">1984</option>
                                                            <option {{ $users->year == '1983' ? 'selected' : '' }}
                                                                value="1983">1983</option>
                                                            <option {{ $users->year == '1982' ? 'selected' : '' }}
                                                                value="1982">1982</option>
                                                            <option {{ $users->year == '1981' ? 'selected' : '' }}
                                                                value="1981">1981</option>
                                                            <option {{ $users->year == '1980' ? 'selected' : '' }}
                                                                value="1980">1980</option>
                                                            <option {{ $users->year == '1979' ? 'selected' : '' }}
                                                                value="1979">1979</option>
                                                            <option {{ $users->year == '1978' ? 'selected' : '' }}
                                                                value="1978">1978</option>
                                                            <option {{ $users->year == '1977' ? 'selected' : '' }}
                                                                value="1977">1977</option>
                                                            <option {{ $users->year == '1976' ? 'selected' : '' }}
                                                                value="1976">1976</option>
                                                            <option {{ $users->year == '1975' ? 'selected' : '' }}
                                                                value="1975">1975</option>
                                                            <option {{ $users->year == '1974' ? 'selected' : '' }}
                                                                value="1974">1974</option>
                                                            <option {{ $users->year == '1973' ? 'selected' : '' }}
                                                                value="1973">1973</option>
                                                            <option {{ $users->year == '1972' ? 'selected' : '' }}
                                                                value="1972">1972</option>
                                                            <option {{ $users->year == '1971' ? 'selected' : '' }}
                                                                value="1971">1971</option>
                                                            <option {{ $users->year == '1970' ? 'selected' : '' }}
                                                                value="1970">1970</option>


                                                        </select>
                                                        <span class="custom-arrow"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="gender-full-width">
                                                <label for="">Gender</label>
                                                <div class="custom-select">
                                                    <select name="gender" id="gender">
                                                        <option value="none" selected>Select</option>
                                                        <option {{$users->gender == '1' ? 'selected' : ''}} value="1">Male</option>
                                                        <option {{$users->gender == '2' ? 'selected' : ''}} value="2">Female</option>
                                                        <option {{$users->gender == '3' ? 'selected' : ''}} value="3">other</option>
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Address</label>
                                            <input class="form-control" type="text" placeholder="Address"
                                                name="address" value="{{ $users->address }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="gender-full-width">
                                                <label for="">Country</label>
                                                <div class="custom-select">
                                                    <select name="country" id="country-dropdown">
                                                        <option value="" selected>Select</option>
                                                        @foreach ($countries as $country)
                                                            <option
                                                                {{ !empty($user_address) && $user_address->country_id == $country->id ? 'selected' : '' }}
                                                                value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="gender-full-width mt2">
                                                <label for="">State</label>
                                                <div class="custom-select">
                                                    <select name="state" id="state">
                                                        <option value="" disabled>Select State</option>
                                                        @foreach ($states as $state)
                                                            <option
                                                                {{ !empty($user_address) && $user_address->state_id == $state->id ? 'selected' : '' }}
                                                                value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="gender-full-width">
                                                <label for="">City</label>
                                                <div class="custom-select">
                                                    <select name="city" id="city">
                                                        @foreach ($cities as $city)
                                                            <option
                                                                {{ !empty($user_address) && $user_address->city_id == $city->id ? 'selected' : '' }}
                                                                value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="create-form-input mt2">
                                                <label for="">Zip Code</label>
                                                <input class="form-control" type="text" placeholder="Zip Code"
                                                    name="zip_code" value="{{$users->zip_code}}">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Cosmetology License Number</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Business License" data-bs-original-title=""
                                                title="" name="cosmetology_license_number"
                                                value="{{$users->cosmetology_license_number}}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" placeholder="Enter Password"
                                                data-bs-original-title="" title="" name="password"
                                                value="{{ old('password') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Confirm Password</label>
                                            <input class="form-control" type="password" placeholder="Enter Password"
                                                data-bs-original-title="" title="" name="confirm_password">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Download User Extension Certification</label>
                                            <a href="{{('$testimonialedit->extension_certification_image')}}" download>
                                                fsfkshfk
                                              </a>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Upload Extension Certification ?</label>
                                            <input class="form-control" type="file"
                                                placeholder="Enter Business Information" data-bs-original-title=""
                                                title="" name="extension_certification_image"
                                                value="{{ old('extension_certification_image') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="">Professional Details</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Business Information" data-bs-original-title=""
                                                title="" name="professional_details"
                                                value="{{$users->professional_details}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <button type="submit" class="btn btn-success me-3">Update</button>
                                        <a class="btn btn-danger" href="{{ route('user-index') }}"
                                            data-bs-original-title="" title="">Cancel</a>
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

    <script>
        // country city state | start
        $('#country-dropdown').on('change', function() {
            var id = $(this).val();
            //   alert(id);
            $.ajax({
                type: "GET",
                url: "{{ route('fetch-state') }}",
                data: {
                    'id': id
                },
                beforeSend: function() {
                    $("#preloader").show()
                },
                success: function(response) {
                    $("#preloader").hide()
                    // $("#state-dropdown option:first").attr('selected','selected');
                    $('#state').html('');
                    $('#city').html('');
                    if (response.status == 200) {
                        $.each(response.states, function(value, i) {
                            $('#state').append('<option value ="' + i.id + '">' + i.name +
                                '</option>');
                            if (value == 0) {
                                // console.log(i.id);
                                $.ajax({
                                    type: "GET",
                                    url: "{{ route('fetch-city') }}",
                                    data: {
                                        'id': i.id
                                    },
                                    success: function(response) {
                                        if (response.status == 200) {
                                            // alert("200")
                                            // console.log(response)
                                            $('#city').html('');
                                            $.each(response.cities, function(index,
                                                val) {
                                                $('#city').append(
                                                    '<option value="' +
                                                    i.id + '">' + i
                                                    .name +
                                                    '</option>');

                                            });
                                        } else {
                                            $('#city').html('');
                                            $('#city').append(
                                                '<option>City Not Found!</option>'
                                            );
                                        }
                                    }
                                });
                            }
                        });


                    } else {
                        $("#state").html("");
                        $('#state').append('<option>State Not Found</option>');
                    }
                }
            });
        });

        $('#state').on('change', function() {
            var id = $(this).val();
            // $("#state-dropdown").click();

            $.ajax({
                type: "GET",
                url: "{{ route('fetch-city') }}"

                    ,
                data: {
                    'id': id
                },
                beforeSend: function() {
                    $("#preloader").show()
                },
                success: function(response) {
                    $("#preloader").hide();

                    if (response.status == 200) {
                        // alert("200")
                        // console.log(response)
                        $('#city').html('');
                        $.each(response.cities, function(value, i) {
                            // console.log(response);
                            $('#city').append('<option value ="' + i.id + '">' + i.name +
                                '</option>');
                        });
                    } else {
                        $('#city').html('');
                        $('#city').append('<option>City Not Found!</option>');
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>
@endsection
