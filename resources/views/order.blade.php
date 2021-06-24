@extends('base')
@section('title')
Checkout
@endsection
@section('headings')
<link rel="stylesheet" href="{{ asset('css/miniDesign.css') }}">

<script src="{{ asset('js/orderPage.js') }}"> </script>
@endsection
@section('content')
<style type="text/css">




</style>
<div class="container">
    <div class="row px-4 m-4" >
        <div class="col">
            <img class="mt-3" src="{{asset('/storage/decoratv_logo.png')}}" style="object-fit: contain;" alt="">
        </div>
        <div class="mx-auto">
            <img src="{{asset('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
        </div>
        <h1>Order</h1>
    </div>

    <div class="table-responsive-sm">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="text-align: center;" class="">Design</th>
                    <th scope="col" class="">MSRP</th>
                    <th scope="col" class="">Royalty Fee</th>
                    <th scope="col" class=""><span style="font-size: 1.3em;">Total</span></th>
                </tr>
            </thead>
            <tbody>
                <tr >
                    <td scope="row">
                        <div class="design-container">
                            @if ($frame)
                            <div class="frame"><img src="{{asset('storage/frames/'.$frame->frame_src)}}" width="100%" height="100%" alt=""></div>
                            @endif
                            @if($liner)
                            <div class="liner"><img src="{{asset('storage/liners/'.$liner->liner_src)}}" width="100%" height="100%" alt=""></div>
                            @endif
                            @if ($art == "custom")
                            <div class="art"><img src="{{asset('storage/temporaryArts/'.$userImagePath)}}" width="100%" height="100%" alt=""></div>
                            @elseif($art)
                            <div class="art"><img src="{{asset('storage/arts/'.$art->art_src)}}" width="100%" height="100%" alt=""></div>
                            @endif
                        </div>
                    </td>
                    @switch($tvSize)
                        @case(45)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$3,942.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$4,688.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$5,633.00</span></td>
                            @endif
        
                            @break
        
                        @case(50)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$4,376.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$5,208.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$6,257.00</span></td>
                            @endif
        
                            @break
        
                        @case(55)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$4,868.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$5,784.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$6,947.00</span></td>
                            @endif
        
                            @break
        
                        @case(60)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$5,350.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$6,371.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$7,647.00</span></td>
                            @endif
        
                            @break
        
                        @case(65)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$5,888.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$7,004.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$8,412.00</span></td>
                            @endif
        
                            @break
        
                        @case(75)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$6,475.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$7,703.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$9,252.00</span></td>
                            @endif
        
                            @break
        
                        @case(85)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$7,118.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$8,468.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$10,169.00</span></td>
                            @endif
        
                            @break
        
                        @case(95)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$7,836.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$9,319.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$11,189.00</span></td>
                            @endif
        
                            @break
        
                        @case(103)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$8,610.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$10,255.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$12,305.00</span></td>
                            @endif
        
                            @break
                        @default
                            <td class="align-middle">$8.610,00</td>
                    @endswitch
                    <td class="align-middle"><span id="royaltyFee">{{$royaltyFee}}</span></td>
                    <td class="align-middle"><span id="total" style="font-size: x-large;" ></span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr>

    <h5>Product: </h5>
    <div class="row col-md-12">
        <div class="col">TV Diagonal: {{$tvSize}}"</div>
        @if($externalSpeakers == "true")
        <div class="col">External Speakers: Yes</div>
        @else
        <div class="col">External Speakers: No</div>
        @endif
    </div>

    <hr>

    <h5>Frame:</h5>
    <div class="row col-md-12">
        <div class="col-md-4">Group: {{$frame->frame_group}}</div>
        <div class="col-md-4">P/N: {{$frame->frame_pn}}</div>
        <div class="col-md-4">Description: {{$frame->frame_description}}</div>        
    </div>

    <hr>

    <h5>Liner:</h5>
    <div class="row col-md-12">
        <div class="col-md-4">Group: {{$frame->frame_group}}</div>
        <div class="col-md-4">P/N: {{$liner->liner_pn}}</div>
        <div class="col-md-4">Description: {{$liner->liner_description}}</div>        
    </div>

    <hr>

    <h5>Art:</h5>
    <div class="row col-md-12 mb-5">
    @if($art == "custom")
        <div class="col-md-4">Gallery: Your own art</div>
        <div class="col-md-4">P/N: N/A</div>
    @else
        <div class="col-md-4">Gallery: {{$art->art_gallery}}</div>
        <div class="col-md-4">P/N: {{$art->art_pn}}</div>
        <div class="col-md-4">Description: {{$art->art_description}}</div>
    @endif
    </div>

    <form action="{{url('order_mail')}}" method="POST" id="checkout" class="needs-validation" novalidate>
        @if($externalSpeakers=="true")
        <h3>Speaker</h3>
        <div class="form-group align-items-center">
            <div class="row">
                <div class="col-md-6 my-2">
                    <label for="speakerBrand">* Enter the brand of your speaker</label>
                    <input type="text" class="form-control" name="speakerBrand" id="speakerBrand" placeholder="Speaker's Brand" required>
                </div>
                
                <div class="col-md-6 my-2">
                    <label for="speakerReference">* Select the reference of your speaker</label>
                    <input type="text" class="form-control" name="speakerModel" id="speakerModel" placeholder="Speaker's Model" required>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="speakerLocation">* Select the location of your speaker</label>
                    <select name="speakerLocation" class="custom-select mr-sm-2 " id="speakerLocation" required>
                        <option selected value="">Choose Location</option>
                        <option value="Top">Top</option>
                        <option value="Bottom">Bottom</option>
                        <option value="Sides">Sides</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="grill">* Select a grill cloth cover for your speaker</label>
                    <select name="grill" class="custom-select mr-sm-2 " id="grill" required>
                        <option selected value="null">No grill</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="grey">Grey</option>
                    </select>
                </div>
            </div>
            <hr>
        </div>
        @endif

        <div class="form-group">
            <h3>Additional Information</h3>
            <div class="row">
                <div class="col-md-4">
                * Select Mounting <br>
                    <div class=" form-check form-check-inline">
                        <input type="radio" class=" form-check-input" id="mounting1" name="mounting" value="Recessed" required>
                        <label class=" form-check-label" for="mounting1">Recessed</label>
                    </div>
                    <div class=" mb-3 form-check-inline form-check">
                        <input type="radio" class="form-check-input" id="mounting2" name="mounting" value="Surface" required>
                        <label class="form-check-label" for="mounting2">Surface</label>
                    </div>                    
                </div>
                <div class="col-md-4">
                * Control System
                    <select name="controlSystem" class="custom-select mr-sm-2 mb-sm-2 " id="controlSystem" required>
                        <option value="">Choose your control system</option>
                        <option value="IR">IR</option>
                        <option value="RF">RF</option>
                        <option value="Wall Switch">Wall Switch</option>
                        <option value="Relay">Relay</option>
                        <option value="None">None</option>
                    </select>
                </div>
                <div class="col-md-4">
                * Voltage <br> 
                    <div class=" form-check form-check-inline">
                        <input type="radio" class=" form-check-input" id="voltage1" name="voltage" value="110" required>
                        <label class=" form-check-label" for="voltage1">110V </label>
                    </div>
                    <div class=" mb-3 form-check-inline form-check">
                        <input type="radio" class="form-check-input" id="voltage2" name="voltage" value="220" required>
                        <label class="form-check-label" for="voltage2">220V</label>
                    </div>
                    
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="poNumber" class="col-form-label">PO # </label> <span style="font-style: italic">If you do not have a PO#, we will assign one for you.</span>
                    <input name="poNumber" class="form-control" id="notes"></input>
                </div>
                <div class="form-group col-md-6">
                    <label for="notes"class="col-form-label">Notes</label>
                    <textarea name="notes" class="form-control" id="notes" rows="2"></textarea>
                </div>
            </div>

            <hr>
            <h3>Shipping Address</h3>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="name">* Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="email">* Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">* Phone #</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone #" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="address">* Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="city">* City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="city">State</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="State" >
                </div>
            </div>
            <div class="form-row mb-3">                
                <div class="form-group col-md-6">
                    <label for="zip">Zip Code</label>
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code" >
                </div>
                <div class="form-group col-md-6">
                    <label for="country">* Country</label>
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
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                * Address Type <br>
                <div class=" form-check form-check-inline">
                        <input type="radio" class=" form-check-input" id="addressType1" name="addressType" value="Commercial" required>
                        <label class=" form-check-label" for="addressType1">Commercial</label>
                    </div>
                    <div class=" mb-3 form-check-inline form-check">
                        <input type="radio" class="form-check-input" id="addressType2" name="addressType" value="Residencial" required>
                        <label class="form-check-label" for="addressType2">Residencial</label>
                    </div>
                </div>
                <div class="form-group col-md-5">
                * Liftgate <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="liftgate1" name="liftgate" value="Yes" required>
                        <label for="liftgate1" class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="liftgate2" name="liftgate" value="No" required>
                        <label for="liftgate2" class="form-check-label">No</label>
                    </div>
                </div>
                <div class="hidden-input">
                @if($art == "custom")
                <input type="text" name="objDesignArt" value="{{$art}}">
                @else
                <input type="text" name="objDesignArt" value="{{$art->art_id}}">
                @endif
                <input type="text" name="objDesignFrame" value="{{$frame->frame_id}}">
                <input type="text" name="objDesignLiner" value="{{$liner->liner_id}}">
                <input type="text" name="userImagePath" value="{{$userImagePath}}">
                <input type="text" name="msrp" id="form-msrp">
                <input type="text" name="royaltyFee" id="form-royaltyFee">
                <input type="text" name="totalPrice" id="form-totalPrice">
                <input type="text" name="tvSize" value="{{$tvSize}}">
                <input type="text" name="externalSpeakers" value="{{$externalSpeakers}}">

                </div>
            </div>
        </div>

    <div class="card bg-light mb-3 col-12 mx-auto px-0" >
        <div class="card-header">Important information</div>
        <div class="card-body">
            <!-- <h5 class="card-title">Important information</h5> -->
            <ul>
                @if($externalSpeakers == "true")
                <li>DECORATV EXTRA prices are in USD and include Control System & Freight within Continental USA. Freight prepaid only applies for orders shipped complete in one shipment. Partial shipments or parts do NOT include freight.</li>
                @else
                <li>DECORATV BASIC prices are in USD and include Control System & Freight within Continental USA. Freight prepaid only applies for orders shipped complete in one shipment. Partial shipments or parts do NOT include freight.</li>
                @endif
                <li>Some 3D TVs have dynamic contrast control function that adjusts the brightness according to the room's ambient light.  The DECORATV system will not allow this function to work.</li>
                <li>DECORATV is a CUSTOM PRODUCT. It CANNOT BE CANCELLED. It CANNOT BE RETURNED.</li>
                <li>All orders require 50% deposit before production and 50% before shipping.</li>
                <li>The estimated ship date is APPROXIMATELY 15 business days after the confirmation and payment are received. This may be subject to change.</li>
            </ul>
            <div class="row">
                <div class="col offset-md-7">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            * Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>

    <button type="submit" class="offset-6 col-3 btn btn-dark mb-4" form="checkout">Confirm</button>



    


</div>



@endsection