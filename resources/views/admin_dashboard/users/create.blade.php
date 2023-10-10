@extends('admin_dashboard.layouts.master')
@section('content')
    <style>
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
                            <form id="" action="{{ route('user-store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" value="1">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" placeholder="Enter First Name"
                                                data-bs-original-title="" title="" name="name"
                                                value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Last Name"
                                                data-bs-original-title="" title="" name="last_name"
                                                value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" placeholder="Enter Email"
                                                data-bs-original-title="" title="" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Mobile Number</label>
                                            <input class="form-control" type="tel" id="adminphone1" placeholder="Enter Mobile Number"
                                                data-bs-original-title="" title="" name="contact"
                                                value="{{ old('contact') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            {{-- <label>Date</label>
                                            <input class="form-control" type="date" placeholder="Date"
                                                data-bs-original-title="" title="" name="date_of_birth"
                                                value="{{ old('date_of_birth') }}"> --}}
                                            <div class="gender-full-width mt2">
                                                <label for="">Birthday</label>
                                                <!-- <input type="text" placeholder="Email"> -->
                                                <div class="d-flex justify-content-between">
                                                    <div class="custom-select">
                                                        <select name="month" id="month">
                                                            <option value="none" selected="">Month</option>
                                                            <option value="01">
                                                                January</option>
                                                            <option value="02">
                                                                February</option>
                                                            <option selected="" value="03">
                                                                March</option>
                                                            <option value="04">
                                                                April</option>
                                                            <option value="05">
                                                                May</option>
                                                            <option value="06">
                                                                June</option>
                                                            <option value="07">
                                                                July</option>
                                                            <option value="08">
                                                                August</option>
                                                            <option value="09">
                                                                September</option>
                                                            <option value="10">
                                                                October</option>
                                                            <option value="11">
                                                                November</option>
                                                            <option value="12">
                                                                December</option>
                                                        </select>
                                                        <span class="custom-arrow"></span>
                                                    </div>
                                                    <div class="custom-select selector-width">
                                                        <select name="day" id="day">
                                                            <option value="none" selected="">Day</option>
                                                            <option value="01">01
                                                            </option>
                                                            <option value="02">02
                                                            </option>
                                                            <option value="03">03
                                                            </option>
                                                            <option value="04">04
                                                            </option>
                                                            <option value="05">05
                                                            </option>
                                                            <option value="06">06
                                                            </option>
                                                            <option value="07">07
                                                            </option>
                                                            <option value="08">08
                                                            </option>
                                                            <option value="09">09
                                                            </option>
                                                            <option value="10">10
                                                            </option>
                                                            <option value="11">11
                                                            </option>
                                                            <option value="12">12
                                                            </option>
                                                            <option value="13">13
                                                            </option>
                                                            <option value="14">14
                                                            </option>
                                                            <option selected="" value="15">15
                                                            </option>
                                                            <option value="16">16
                                                            </option>
                                                            <option value="17">17
                                                            </option>
                                                            <option value="18">18
                                                            </option>
                                                            <option value="19">19
                                                            </option>
                                                            <option value="20">20
                                                            </option>
                                                            <option value="21">21
                                                            </option>
                                                            <option value="22">22
                                                            </option>
                                                            <option value="23">23
                                                            </option>
                                                            <option value="24">24
                                                            </option>
                                                            <option value="25">25
                                                            </option>
                                                            <option value="26">26
                                                            </option>
                                                            <option value="27">27
                                                            </option>
                                                            <option value="28">28
                                                            </option>
                                                            <option value="29">29
                                                            </option>
                                                            <option value="30">
                                                                30</option>
                                                            <option value="31">
                                                                31</option>

                                                        </select>
                                                        <span class="custom-arrow"></span>
                                                    </div>

                                                    <div class="custom-select">
                                                        <select name="year" id="year">
                                                            <option value="none" selected="">Year</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option selected="" value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="1999">1999</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1980">1980</option>
                                                            <option value="1979">1979</option>
                                                            <option value="1978">1978</option>
                                                            <option value="1977">1977</option>
                                                            <option value="1976">1976</option>
                                                            <option value="1975">1975</option>
                                                            <option value="1974">1974</option>
                                                            <option value="1973">1973</option>
                                                            <option value="1972">1972</option>
                                                            <option value="1971">1971</option>
                                                            <option value="1970">1970</option>


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
                                                        <option value="none" selected="">Select</option>
                                                        <option selected="" value="1">
                                                            Male</option>
                                                        <option value="2">
                                                            Female</option>
                                                        <option value="3">
                                                            other</option>
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Address</label>
                                            <input class="form-control" type="text" placeholder="Address" name="address" value="tesrting">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="gender-full-width">
                                                <label for="">Country</label>
                                                <div class="custom-select">
                                                    <select name="country" id="country-dropdown">
                                                        <option value="none" selected="">Select</option>
                                                        <option value="1">Afghanistan</option>
                                                        <option value="2">Albania</option>
                                                        <option value="3">Algeria</option>
                                                        <option value="4">American Samoa</option>
                                                        <option value="5">Andorra</option>
                                                        <option value="6">Angola</option>
                                                        <option value="7">Anguilla</option>
                                                        <option value="8">Antarctica</option>
                                                        <option value="9">Antigua And Barbuda</option>
                                                        <option value="10">Argentina</option>
                                                        <option value="11">Armenia</option>
                                                        <option value="12">Aruba</option>
                                                        <option value="13">Australia</option>
                                                        <option value="14">Austria</option>
                                                        <option selected="" value="15">Azerbaijan</option>
                                                        <option value="16">Bahamas The</option>
                                                        <option value="17">Bahrain</option>
                                                        <option value="18">Bangladesh</option>
                                                        <option value="19">Barbados</option>
                                                        <option value="20">Belarus</option>
                                                        <option value="21">Belgium</option>
                                                        <option value="22">Belize</option>
                                                        <option value="23">Benin</option>
                                                        <option value="24">Bermuda</option>
                                                        <option value="25">Bhutan</option>
                                                        <option value="26">Bolivia</option>
                                                        <option value="27">Bosnia and Herzegovina</option>
                                                        <option value="28">Botswana</option>
                                                        <option value="29">Bouvet Island</option>
                                                        <option value="30">Brazil</option>
                                                        <option value="31">British Indian Ocean Territory</option>
                                                        <option value="32">Brunei</option>
                                                        <option value="33">Bulgaria</option>
                                                        <option value="34">Burkina Faso</option>
                                                        <option value="35">Burundi</option>
                                                        <option value="36">Cambodia</option>
                                                        <option value="37">Cameroon</option>
                                                        <option value="38">Canada</option>
                                                        <option value="39">Cape Verde</option>
                                                        <option value="40">Cayman Islands</option>
                                                        <option value="41">Central African Republic</option>
                                                        <option value="42">Chad</option>
                                                        <option value="43">Chile</option>
                                                        <option value="44">China</option>
                                                        <option value="45">Christmas Island</option>
                                                        <option value="46">Cocos (Keeling) Islands</option>
                                                        <option value="47">Colombia</option>
                                                        <option value="48">Comoros</option>
                                                        <option value="49">Congo</option>
                                                        <option value="50">Democratic Republic of the Congo</option>
                                                        <option value="51">Cook Islands</option>
                                                        <option value="52">Costa Rica</option>
                                                        <option value="53">Côte d'Ivoire</option>
                                                        <option value="54">Croatia (Hrvatska)</option>
                                                        <option value="55">Cuba</option>
                                                        <option value="56">Cyprus</option>
                                                        <option value="57">Czech Republic</option>
                                                        <option value="58">Denmark</option>
                                                        <option value="59">Djibouti</option>
                                                        <option value="60">Dominica</option>
                                                        <option value="61">Dominican Republic</option>
                                                        <option value="62">East Timor</option>
                                                        <option value="63">Ecuador</option>
                                                        <option value="64">Egypt</option>
                                                        <option value="65">El Salvador</option>
                                                        <option value="66">Equatorial Guinea</option>
                                                        <option value="67">Eritrea</option>
                                                        <option value="68">Estonia</option>
                                                        <option value="69">Ethiopia</option>
                                                        <option value="70">External Territories of Australia</option>
                                                        <option value="71">Falkland Islands</option>
                                                        <option value="72">Faroe Islands</option>
                                                        <option value="73">Fiji Islands</option>
                                                        <option value="74">Finland</option>
                                                        <option value="75">France</option>
                                                        <option value="76">French Guiana</option>
                                                        <option value="77">French Polynesia</option>
                                                        <option value="78">French Southern Territories</option>
                                                        <option value="79">Gabon</option>
                                                        <option value="80">Gambia The</option>
                                                        <option value="81">Georgia</option>
                                                        <option value="82">Germany</option>
                                                        <option value="83">Ghana</option>
                                                        <option value="84">Gibraltar</option>
                                                        <option value="85">Greece</option>
                                                        <option value="86">Greenland</option>
                                                        <option value="87">Grenada</option>
                                                        <option value="88">Guadeloupe</option>
                                                        <option value="89">Guam</option>
                                                        <option value="90">Guatemala</option>
                                                        <option value="91">Guernsey and Alderney</option>
                                                        <option value="92">Guinea</option>
                                                        <option value="93">Guinea-Bissau</option>
                                                        <option value="94">Guyana</option>
                                                        <option value="95">Haiti</option>
                                                        <option value="96">Heard and McDonald Islands</option>
                                                        <option value="97">Honduras</option>
                                                        <option value="98">Hong Kong S.A.R.</option>
                                                        <option value="99">Hungary</option>
                                                        <option value="100">Iceland</option>
                                                        <option value="101">India</option>
                                                        <option value="102">Indonesia</option>
                                                        <option value="103">Iran</option>
                                                        <option value="104">Iraq</option>
                                                        <option value="105">Ireland</option>
                                                        <option value="106">Israel</option>
                                                        <option value="107">Italy</option>
                                                        <option value="108">Jamaica</option>
                                                        <option value="109">Japan</option>
                                                        <option value="110">Jersey</option>
                                                        <option value="111">Jordan</option>
                                                        <option value="112">Kazakhstan</option>
                                                        <option value="113">Kenya</option>
                                                        <option value="114">Kiribati</option>
                                                        <option value="115">Korea North</option>
                                                        <option value="116">Korea South</option>
                                                        <option value="117">Kuwait</option>
                                                        <option value="118">Kyrgyzstan</option>
                                                        <option value="119">Laos</option>
                                                        <option value="120">Latvia</option>
                                                        <option value="121">Lebanon</option>
                                                        <option value="122">Lesotho</option>
                                                        <option value="123">Liberia</option>
                                                        <option value="124">Libya</option>
                                                        <option value="125">Liechtenstein</option>
                                                        <option value="126">Lithuania</option>
                                                        <option value="127">Luxembourg</option>
                                                        <option value="128">Macau S.A.R.</option>
                                                        <option value="129">Macedonia</option>
                                                        <option value="130">Madagascar</option>
                                                        <option value="131">Malawi</option>
                                                        <option value="132">Malaysia</option>
                                                        <option value="133">Maldives</option>
                                                        <option value="134">Mali</option>
                                                        <option value="135">Malta</option>
                                                        <option value="136">Isle of Man</option>
                                                        <option value="137">Marshall Islands</option>
                                                        <option value="138">Martinique</option>
                                                        <option value="139">Mauritania</option>
                                                        <option value="140">Mauritius</option>
                                                        <option value="141">Mayotte</option>
                                                        <option value="142">Mexico</option>
                                                        <option value="143">Micronesia</option>
                                                        <option value="144">Moldova</option>
                                                        <option value="145">Monaco</option>
                                                        <option value="146">Mongolia</option>
                                                        <option value="147">Montserrat</option>
                                                        <option value="148">Morocco</option>
                                                        <option value="149">Mozambique</option>
                                                        <option value="150">Myanmar</option>
                                                        <option value="151">Namibia</option>
                                                        <option value="152">Nauru</option>
                                                        <option value="153">Nepal</option>
                                                        <option value="154">Netherlands Antilles</option>
                                                        <option value="155">Netherlands The</option>
                                                        <option value="156">New Caledonia</option>
                                                        <option value="157">New Zealand</option>
                                                        <option value="158">Nicaragua</option>
                                                        <option value="159">Niger</option>
                                                        <option value="160">Nigeria</option>
                                                        <option value="161">Niue</option>
                                                        <option value="162">Norfolk Island</option>
                                                        <option value="163">Northern Mariana Islands</option>
                                                        <option value="164">Norway</option>
                                                        <option value="165">Oman</option>
                                                        <option value="166">Pakistan</option>
                                                        <option value="167">Palau</option>
                                                        <option value="168">Palestinian Territory Occupied</option>
                                                        <option value="169">Panama</option>
                                                        <option value="170">Papua new Guinea</option>
                                                        <option value="171">Paraguay</option>
                                                        <option value="172">Peru</option>
                                                        <option value="173">Philippines</option>
                                                        <option value="174">Pitcairn Island</option>
                                                        <option value="175">Poland</option>
                                                        <option value="176">Portugal</option>
                                                        <option value="177">Puerto Rico</option>
                                                        <option value="178">Qatar</option>
                                                        <option value="179">Reunion</option>
                                                        <option value="180">Romania</option>
                                                        <option value="181">Russia</option>
                                                        <option value="182">Rwanda</option>
                                                        <option value="183">Saint Helena</option>
                                                        <option value="184">Saint Kitts And Nevis</option>
                                                        <option value="185">Saint Lucia</option>
                                                        <option value="186">Saint Pierre and Miquelon</option>
                                                        <option value="187">Saint Vincent And The Grenadines</option>
                                                        <option value="188">Samoa</option>
                                                        <option value="189">San Marino</option>
                                                        <option value="190">Sao Tome and Principe</option>
                                                        <option value="191">Saudi Arabia</option>
                                                        <option value="192">Senegal</option>
                                                        <option value="193">Serbia</option>
                                                        <option value="194">Seychelles</option>
                                                        <option value="195">Sierra Leone</option>
                                                        <option value="196">Singapore</option>
                                                        <option value="197">Slovakia</option>
                                                        <option value="198">Slovenia</option>
                                                        <option value="199">Smaller Territories of the UK</option>
                                                        <option value="200">Solomon Islands</option>
                                                        <option value="201">Somalia</option>
                                                        <option value="202">South Africa</option>
                                                        <option value="203">South Georgia</option>
                                                        <option value="204">South Sudan</option>
                                                        <option value="205">Spain</option>
                                                        <option value="206">Sri Lanka</option>
                                                        <option value="207">Sudan</option>
                                                        <option value="208">Suriname</option>
                                                        <option value="209">Svalbard And Jan Mayen Islands</option>
                                                        <option value="210">Swaziland</option>
                                                        <option value="211">Sweden</option>
                                                        <option value="212">Switzerland</option>
                                                        <option value="213">Syria</option>
                                                        <option value="214">Taiwan</option>
                                                        <option value="215">Tajikistan</option>
                                                        <option value="216">Tanzania</option>
                                                        <option value="217">Thailand</option>
                                                        <option value="218">Togo</option>
                                                        <option value="219">Tokelau</option>
                                                        <option value="220">Tonga</option>
                                                        <option value="221">Trinidad And Tobago</option>
                                                        <option value="222">Tunisia</option>
                                                        <option value="223">Turkey</option>
                                                        <option value="224">Turkmenistan</option>
                                                        <option value="225">Turks And Caicos Islands</option>
                                                        <option value="226">Tuvalu</option>
                                                        <option value="227">Uganda</option>
                                                        <option value="228">Ukraine</option>
                                                        <option value="229">United Arab Emirates</option>
                                                        <option value="230">United Kingdom</option>
                                                        <option value="231">United States</option>
                                                        <option value="232">United States Minor Outlying Islands
                                                        </option>
                                                        <option value="233">Uruguay</option>
                                                        <option value="234">Uzbekistan</option>
                                                        <option value="235">Vanuatu</option>
                                                        <option value="236">Vatican City</option>
                                                        <option value="237">Venezuela</option>
                                                        <option value="238">Vietnam</option>
                                                        <option value="239">Virgin Islands(British)</option>
                                                        <option value="240">Virgin IslandsVirgin Islands(US)</option>
                                                        <option value="241">Wallis And Futuna Islands</option>
                                                        <option value="242">Western Sahara</option>
                                                        <option value="243">Yemen</option>
                                                        <option value="244">Yugoslavia</option>
                                                        <option value="245">Zambia</option>
                                                        <option value="246">Zimbabwe</option>
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
                                                        <option selected="" value="7239">
                                                            Ucar </option>

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
                                                        <option selected="" value="7239">
                                                            Ucar </option>
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
                                                <input class="form-control" type="text" placeholder="Zip Code" name="zip_code" value="1569">
                                                                                </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Cosmetology License Number</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Business License" data-bs-original-title=""
                                                title="" name="business_license"
                                                value="{{ old('business_license') }}">

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
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">Upload Extension Certification ?</label>
                                            <input class="form-control" type="file"
                                                placeholder="Enter Business Information" data-bs-original-title=""
                                                title="" name="business_license_copy"
                                                value="{{ old('business_copy') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="">Professional Details</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Business Information" data-bs-original-title=""
                                                title="" name="business_information"
                                                value="{{ old('business_information') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <button type="submit" id=""
                                            class="btn btn-success me-3">Add</button>
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

    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>
@endsection
