<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DecoraTV</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="js/main.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
    <style>
        label {
            color: #676868 !important;
        }
        .questionary{
            transition: background-color 0.5s ease;
        }
        .questionary:hover {
            background-color: #0372c0 !important;
        }
        #white-button {
            background-color: white;
            border: 1px #0372c0 solid;
            height: 50px;
            font-size: 25px;
        }
        #white-button:hover {
            background-color:#0372c0;
        }
    </style>
    <script type="text/javascript" > 
    var BASE_URL = "{{ url('/') }}";
    </script>
</head>
<body>
        <div class="row col-12 mx-0 " style="background-color: white;">
            <div class="col">
                <a href="https://avisp.co"><img width="150px" class="ml-2" src="/storage/av_logo_color.jpg" alt=""></a>
            </div>        
        </div>
<div class="container-fluid pt-5" style="background-color: #f1f1f1">
    <div class="row justify-content-center">

        <div class="rounded p-3 col-md-7 mb-4" style="background-color: #e2e6eb;">
            <form method="POST" id="register-form" action="{{ route('register') }}">
                @csrf
                @if(isset($registerOrigine))
                <input type="text" id="registerOrigin" class="hidden-input" name="registerOrigin" value="app">
                @else
                <input type="text" id="registerOrigin" class="hidden-input" name="registerOrigin" value="avisp">
                @endif
                <div class="form-group">


                    <label for="name">{{ __('Name') }}*</label>

                    
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}*</label>

                    
                    <input id="email-register" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}*</label>

                    
                    <input id="password-register" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}*</label>

                    
                    <input id="password-register-confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    
                </div>

                <div class="form-group">
                    <label for="phone">Phone number *</label>
                    
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="address">Street *</label>
                    
                    <input id="address" type="text" class="form-control" name="address" required>
                    
                </div>


                <div class="form-group">
                    <label for="state">State</label>
                    
                    <input id="state" type="text" class="form-control" name="state">
                    
                </div>

                <div class="form-group">
                    <label for="city">City *</label>
                    
                    <input id="city" type="text" class="form-control" name="city" required>
                    
                </div>

                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    
                    <input id="zip" type="text" class="form-control" name="zip">
                    
                </div>
                <div class="form-group">
                    <label for="country">Country *</label>
                    
                    <input type="text" name="country" class="form-control mr-sm-2" list="country-list" id="country" value="United States of America" required>
                    <datalist id="country-list">
                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America" selected>United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </datalist>
                    
                </div>
                <div class="form-group">
                    <label for="zip">Company Name</label>
                    
                    <input id="companyName" type="text" class="form-control" name="companyName">
                </div>

                    <label for="">How did you hear about us? *</label>

                <div class="row px-4">
                    <div class=" col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="radio" class="col-12 userReference" id="internetSearch" name="reference" value="Internet Search" required>
                        <label for="internetSearch" class="col-12 mx-auto" style="text-align:center">Internet Search</label>
                    </div>
                    <div class=" col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="radio" class="col-12" id="tradeShow" name="reference" value="Trade Show">
                        <label for="tradeShow" class="col-12 mx-auto" style="text-align:center">Trade Show</label>
                    </div>
                    <div class=" col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="radio" class="col-12 userReference" id="questionEmail" name="reference" value="Email">
                        <label for="questionEmail" class="col-12 mx-auto" style="text-align:center">Email</label>
                    </div>
                    <div class=" col-md-4 col-lg-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="radio" class="col-12 userReference" id="recommendation" name="reference" value="Recommendation">
                        <label for="recommendation" class="col-12 mx-auto" style="text-align:center">Recommendation</label>
                    </div>
                    <div class=" col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="radio" class="col-12 userReference" id="refOther" name="reference" value="Other">
                        <label for="other" class="col-12 mx-auto" style="text-align:center">Other</label>
                    </div>
                </div>
                <div class="form-group" id="otherTextDiv" style="display:none">
                    <label for="zip">Which Other?</label>
                    
                    <input id="otherText" type="text" class="form-control" name="refOtherText">
                </div>
                <div class="form-group company-form" id="" style="display:none">
                <h3 class="mt-3">Company Info</h3>
                    <label for="dateCompany">Date Established</label>
                    
                    <input id="dateCompany" type="date" class="form-control" name="dateCompany">
                </div>
                <div class="form-group company-form" id="" style="display:none">
                    <label for="taxId">Tax ID</label>
                    
                    <input id="taxId" type="text" class="form-control" name="taxId">
                </div>
                <div class="form-group company-form" id="" style="display:none">
                    <label for="directorName">Managing Director Name</label>
                    
                    <input id="directorName" type="text" class="form-control" name="directorName">
                </div>

                <label class="company-form" style="display: none;" for="">Type of business: *</label>

                <div class="company-form-checklist row px-4" style="display: none;">
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 companyType" id="companyTCommercialAV" name="companyType[]" value="Commercial AV">
                        <label for="companyTCommercialAV" class="col-12 mx-auto" style="text-align:center">Commercial AV</label>
                    </div>
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 companyType" id="companyTHomeTheater" name="companyType[]" value="Home Theater">
                        <label for="companyTHomeTheater" class="col-12 mx-auto" style="text-align:center">Home Theater</label>
                    </div>
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 companyType" id="companyTOther" name="companyType[]" value="Other">
                        <label for="companyTOther" class="col-12 mx-auto" style="text-align:center">Other</label>
                    </div>
                </div>
                <div class="form-group" id="cTOtherTextDiv" style="display:none">
                    <label for="cTOtherText">Which Other?</label>
                    
                    <input id="cTOtherText" type="text" class="form-control" name="cTOtherText">
                </div>

                <label class="company-form" style="display: none;" for="">Showroom: *</label>

                <div class="company-form-checklist row px-4" style="display: none;">
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="radio" class="col-12" id="showroomYes" name="showroom" value="Yes">
                        <label for="showroomYes" class="col-12 mx-auto" style="text-align:center">Yes</label>
                    </div>
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="radio" class="col-12" id="showroomNo" name="showroom" value="No">
                        <label for="showroomNo" class="col-12 mx-auto" style="text-align:center">No</label>
                    </div>
                </div>

                <label class="company-form" style="display: none;" for="">Member of a trade organization: *</label>

                <div class="company-form-checklist row px-4" style="display: none;">
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 tradeOrg" id="tradeOrgCedia" name="tradeOrg[]" value="CEDIA">
                        <label for="tradeOrgCedia" class="col-12 mx-auto" style="text-align:center">CEDIA</label>
                    </div>
                    <div class="col-md-4 col-lg-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 tradeOrg" id="tradeOrgAvixia" name="tradeOrg[]" value="AVIXA">
                        <label for="tradeOrgAvixia" class="col-12 mx-auto" style="text-align:center">AVIXA/InfoComm</label>
                    </div>
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 tradeOrg" id="tradeOrgIse" name="tradeOrg[]" value="ISE">
                        <label for="tradeOrgIse" class="col-12 mx-auto" style="text-align:center">ISE</label>
                    </div>
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 tradeOrg" id="tradeOrgOther" name="tradeOrg[]" value="Other">
                        <label for="tradeOrgOther" class="col-12 mx-auto" style="text-align:center">Other</label>
                    </div>
                    <div class="col-md-3 p-1 m-1 rounded questionary" style="background-color: #d0dee8;">
                        <input type="checkbox" class="col-12 tradeOrg" id="tradeOrgNone" name="tradeOrg[]" value="None">
                        <label for="tradeOrgOther" class="col-12 mx-auto" style="text-align:center">None</label>
                    </div>
                </div>
                <div class="form-group" id="tradeOrgOtherTextDiv" style="display:none">
                    <label for="zip">Which Other?</label>
                    
                    <input id="tradeOrgOtherText" type="text" class="form-control" name="tradeOrgOtherText">
                </div>
                <button type="submit" class="col-12 mt-3 btn" id="white-button">
                    Submit
                </button>
                
                
                
                
            </form>
        </div>
    </div>
</div>
</body>

<script>
$('#companyName').on('propertychange input', function(){
    if($(this).val() ==""){
        $('.company-form').css('display','none')
        $('.company-form-checklist').css('display','none')
        $('#companyTCommercialAV').prop('required', false)
        $('#showroomYes').prop('required', false)
        $('#tradeOrgCedia').prop('required', false)
    }else {
        $('.company-form').css('display','block')
        $('.company-form-checklist').css('display','flex')
        $('#companyTCommercialAV').prop('required', true)
        $('#showroomYes').prop('required', true)
        $('#tradeOrgCedia').prop('required', true)
    }
})
$(".userReference").change(
    function(){
        if ($('#refOther').is(':checked')) {
            $("#otherTextDiv").css('display','block')
        } else {
            $("#otherTextDiv").css('display','none')
        }
});
$(".companyType").change(
    function(){
        if ($('#companyTOther').is(':checked')) {
            $("#cTOtherTextDiv").css('display','block')
        } else {
            $("#cTOtherTextDiv").css('display','none')
        }
});
$(".tradeOrg").change(
    function(){
        if ($('#tradeOrgOther').is(':checked')) {
            $("#tradeOrgOtherTextDiv").css('display','block')
        } else {
            $("#tradeOrgOtherTextDiv").css('display','none')
        }
});
$('#register-form').on('change', 'input[type=checkbox][name$="[]"]', e => {
    const $inputs = $('input[type=checkbox][name="' + e.target.name + '"]');
    // const $targetInp = $inputs.filter('[required]');
    const $targetInp = $inputs.first();
    if($inputs.filter(':checked').length) {
        $targetInp.removeAttr('required');
    } else {
        $targetInp.prop('required', true);
    }
});

</script>
</html>