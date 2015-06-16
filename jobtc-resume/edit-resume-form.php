<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/jobtc-3/wp-blog-header.php');

//Get the current user info
global $current_user;
get_currentuserinfo();

$name = $current_user->user_firstname . " " . $current_user->user_lastname;

//Get data from wp Resume
global $wpdb;
$user_id = wp_get_current_user();
$resume_table = $wpdb->prefix . 'resume';


$resume_sql = " SELECT 
                a.resume_id,
                a.user_id,	
                a.rate,	
                a.currency,	
                a.location,	
                a.email,	
                a.phone,	
                a.mobile,	
                a.skype,	
                a.resume_photo,	
                a.resume_doc,	
                a.additional_doc,	
                a.overall_average,
                a.transcripts,
                a.degree,	
                a.institution,	
                a.year_issued,	
                a.skills,	
                a.interview_video_link
        from $resume_table a WHERE user_id in (%d)";


$resume_prepared_statement = $wpdb->prepare($resume_sql, $user_id->ID);
$resume = $wpdb->get_results($resume_prepared_statement);

foreach ($resume as $resume_data) {

    $resume_id = $resume_data->resume_id;
    $user_id = $resume_data->user_id;
    $rate = $resume_data->rate;
    $currency = $resume_data->currency;
    $location = $resume_data->location;
    $email = $resume_data->email;
    $phone = $resume_data->phone;
    $mobile = $resume_data->mobile;
    $skype = $resume_data->skype;
    $resume_photo = $resume_data->resume_photo;
    $resume_doc = $resume_data->resume_doc;
    $additional_doc = $resume_data->additional_doc;
    $overall_average = $resume_data->overall_average;
    $transcripts = $resume_data->transcripts;
    $degree = $resume_data->degree;
    $institution = $resume_data->institution;
    $year_issued = $resume_data->year_issued;
    $skills = $resume_data->skills;
    $interview_video_link = $resume_data->interview_video_link;
}
?>

<div class="row">
    <div class="edit-resume-container col-md-12">
        <div class="section">

            <div class="section_content">
                <!--h1>Edit Resume</h1-->
                <form action="" method="post" enctype="multipart/form-data" id="submit_form" class="edit-resume-form submit_form main_form">
                    <fieldset>
                        <p class="optional">
                            <label for="desired_salary">Hourly Rate or Yearly Salary</label> 
                            <input type="text" class="text" name="rate" id="desired_salary" placeholder="e.g. 10" value="<?php echo $rate; ?>">
                        </p>
                        <p class="optional">
                            <label for="currency">Currency</label>
                            <select class="currency" name="currency"> 
                                <option value="PHP">Philippines Peso(PHP)</option>
                                <option value="ALL">Albania Lek(ALL)</option>
                                <option value="AFN">Afghanistan Afghani(AFN)</option>
                                <option value="ARS">Argentina Peso(ARS)</option>
                                <option value="AWG">Aruba Guilder(AWG)</option>
                                <option value="AUD">Australia Dollar(AUD)</option>
                                <option value="AZN">Azerbaijan New Manat(AZN)</option>
                                <option value="BSD">Bahamas Dollar(BSD)</option>
                                <option value="BBD">Barbados Dollar(BBD)</option>
                                <option value="BDT">Bangladeshi taka(BDT)</option>
                                <option value="BYR">Belarus Ruble(BYR)</option>
                                <option value="BZD">Belize Dollar(BZD)</option>
                                <option value="BMD">Bermuda Dollar(BMD)</option>
                                <option value="BOB">Bolivia Boliviano(BOB)</option>
                                <option value="BAM">Bosnia and Herzegovina Convertible Marka(BAM)</option>
                                <option value="BWP">Botswana Pula(BWP)</option>
                                <option value="BGN">Bulgaria Lev(BGN)</option>
                                <option value="BRL">Brazil Real(BRL)</option>
                                <option value="BND">Brunei Darussalam Dollar(BND)</option>
                                <option value="KHR">Cambodia Riel(KHR)</option>
                                <option value="CAD" selected="selected">Canadian Dollar(CAD)</option>
                                <option value="KYD">Cayman Islands Dollar(KYD)</option>
                                <option value="CLP">Chile Peso(CLP)</option>
                                <option value="CNY">China Yuan Renminbi(CNY)</option>
                                <option value="COP">Colombia Peso(COP)</option>
                                <option value="CRC">Costa Rica Colon(CRC)</option>
                                <option value="HRK">Croatia Kuna(HRK)</option>
                                <option value="CUP">Cuba Peso(CUP)</option>
                                <option value="CZK">Czech Republic Koruna(CZK)</option>
                                <option value="DKK">Denmark Krone(DKK)</option>
                                <option value="DOP">Dominican Republic Peso(DOP)</option>
                                <option value="XCD">East Caribbean Dollar(XCD)</option>
                                <option value="EGP">Egypt Pound(EGP)</option>
                                <option value="SVC">El Salvador Colon(SVC)</option>
                                <option value="EEK">Estonia Kroon(EEK)</option>
                                <option value="EUR">Euro Member Countries(EUR)</option>
                                <option value="FKP">Falkland Islands (Malvinas) Pound(FKP)</option>
                                <option value="FJD">Fiji Dollar(FJD)</option>
                                <option value="GHC">Ghana Cedis(GHC)</option>
                                <option value="GIP">Gibraltar Pound(GIP)</option>
                                <option value="GTQ">Guatemala Quetzal(GTQ)</option>
                                <option value="GGP">Guernsey Pound(GGP)</option>
                                <option value="GYD">Guyana Dollar(GYD)</option>
                                <option value="HNL">Honduras Lempira(HNL)</option>
                                <option value="HKD">Hong Kong Dollar(HKD)</option>
                                <option value="HUF">Hungary Forint(HUF)</option>
                                <option value="ISK">Iceland Krona(ISK)</option>
                                <option value="INR">India Rupee(INR)</option>
                                <option value="IDR">Indonesia Rupiah(IDR)</option>
                                <option value="IRR">Iran Rial(IRR)</option>
                                <option value="IMP">Isle of Man Pound(IMP)</option>
                                <option value="ILS">Israel Shekel(ILS)</option>
                                <option value="JMD">Jamaica Dollar(JMD)</option>
                                <option value="JPY">Japan Yen(JPY)</option>
                                <option value="JEP">Jersey Pound(JEP)</option>
                                <option value="KZT">Kazakhstan Tenge(KZT)</option>
                                <option value="KPW">Korea (North) Won(KPW)</option>
                                <option value="KRW">Korea (South) Won(KRW)</option>
                                <option value="KGS">Kyrgyzstan Som(KGS)</option>
                                <option value="LAK">Laos Kip(LAK)</option>
                                <option value="LVL">Latvia Lat(LVL)</option>
                                <option value="LBP">Lebanon Pound(LBP)</option>
                                <option value="LRD">Liberia Dollar(LRD)</option>
                                <option value="LTL">Lithuania Litas(LTL)</option>
                                <option value="MKD">Macedonia Denar(MKD)</option>
                                <option value="MYR">Malaysia Ringgit(MYR)</option>
                                <option value="MUR">Mauritius Rupee(MUR)</option>
                                <option value="MXN">Mexico Peso(MXN)</option>
                                <option value="MNT">Mongolia Tughrik(MNT)</option>
                                <option value="MZN">Mozambique Metical(MZN)</option>
                                <option value="NAD">Namibia Dollar(NAD)</option>
                                <option value="NPR">Nepal Rupee(NPR)</option>
                                <option value="ANG">Netherlands Antilles Guilder(ANG)</option>
                                <option value="NZD">New Zealand Dollar(NZD)</option>
                                <option value="NIO">Nicaragua Cordoba(NIO)</option>
                                <option value="NGN">Nigeria Naira(NGN)</option>
                                <option value="NOK">Norway Krone(NOK)</option>
                                <option value="OMR">Oman Rial(OMR)</option>
                                <option value="PKR">Pakistan Rupee(PKR)</option>
                                <option value="PAB">Panama Balboa(PAB)</option>
                                <option value="PYG">Paraguay Guarani(PYG)</option>
                                <option value="PEN">Peru Nuevo Sol(PEN)</option>
                                <option value="PLN">Poland Zloty(PLN)</option>
                                <option value="QAR">Qatar Riyal(QAR)</option>
                                <option value="RON">Romania New Leu(RON)</option>
                                <option value="RUB">Russia Ruble(RUB)</option>
                                <option value="SHP">Saint Helena Pound(SHP)</option>
                                <option value="SAR">Saudi Arabia Riyal(SAR)</option>
                                <option value="RSD">Serbia Dinar(RSD)</option>
                                <option value="SCR">Seychelles Rupee(SCR)</option>
                                <option value="SGD">Singapore Dollar(SGD)</option>
                                <option value="SBD">Solomon Islands Dollar(SBD)</option>
                                <option value="SOS">Somalia Shilling(SOS)</option>
                                <option value="ZAR">South Africa Rand(ZAR)</option>
                                <option value="LKR">Sri Lanka Rupee(LKR)</option>
                                <option value="SEK">Sweden Krona(SEK)</option>
                                <option value="CHF">Switzerland Franc(CHF)</option>
                                <option value="SRD">Suriname Dollar(SRD)</option>
                                <option value="SYP">Syria Pound(SYP)</option>
                                <option value="TWD">Taiwan New Dollar(TWD)</option>
                                <option value="THB">Thailand Baht(THB)</option>
                                <option value="TTD">Trinidad and Tobago Dollar(TTD)</option>
                                <option value="TRY">Turkey Lira(TRY)</option>
                                <option value="TRL">Turkey Lira(TRL)</option>
                                <option value="TVD">Tuvalu Dollar(TVD)</option>
                                <option value="UAH">Ukraine Hryvna(UAH)</option>
                                <option value="GBP">United Kingdom Pound(GBP)</option>
                                <option value="USD">United States Dollar(USD)</option>
                                <option value="UYU">Uruguay Peso(UYU)</option>
                                <option value="UZS">Uzbekistan Som(UZS)</option>
                                <option value="VEF">Venezuela Bolivar(VEF)</option>
                                <option value="VND">Viet Nam Dong(VND)</option>
                                <option value="YER">Yemen Rial(YER)</option>
                                <option value="ZWD">Zimbabwe Dollar(ZWD)</option>
                            </select>
                        </p> 

                        <h2>Your Contact Details</h2>
                        <p class="optional">
                            <label for="email">Email Address</label> 
                            <input type="text" class="text" name="email" value="<?php echo $email; ?>" id="email_address" placeholder="you@yourdomain.com">
                        </p>
                        <p class="optional">
                            <label for="tel">Telephone</label> 
                            <input type="text" class="text" name="phone" value="<?php echo $phone; ?>" id="tel" placeholder="Telephone including area code">
                        </p>
                        <p class="optional">
                            <label for="mobile">Mobile</label> 
                            <input type="text" class="text" name="mobile" value="<?php echo $mobile; ?>" id="mobile" placeholder="Mobile number">
                        </p>
                        <p class="optional">
                            <label for="mobile">Skype</label> 
                            <input type="text" class="text" name="skype" value="<?php echo $skype; ?>" id="skype" placeholder="Skype ID">
                        </p>
                        <br>
                        <br>
                        <h2>Resume Photo and Uploads</h2>
                        <p class="optional">
                            <label for="your-photo">Resume Photo</label> 
                            <input type="file" class="text" name="resume_photo" id="your-photo" value="<?php echo $resume_photo; ?>"></p>
                        <p class="optional">
                            <label for="your-resume">Resume(.doc or .docx)</label> 
                            <input type="file" class="text" name="resume_doc" id="your-resume" value="<?php echo $resume_doc; ?>">
                        </p>
                    </fieldset>
                    <br>
                    <br>
                    <h2>Applicant Location</h2>
                    <div id="geolocation_box">
                        <p>
                            <label>
                                <input id="geolocation-load" type="button" class="button geolocationadd submit" value="Find Address/Location">
                            </label>

                            <input type="text" class="text" name="location" id="geolocation-address" value="<?php echo $location; ?>">
                            <input type="hidden" class="text" name="location_latitude" id="geolocation-latitude" value="">
                            <input type="hidden" class="text" name="location_longitude" id="geolocation-longitude" value="">
                        </p>

                        <div id="map_wrap" style="border:solid 2px #ddd;"><div id="geolocation-map" style="width: 100%; height: 300px; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 117px; top: 50px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 373px; top: 50px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 373px; top: -206px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 117px; top: -206px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 117px; top: 306px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 373px; top: 306px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -139px; top: 50px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 629px; top: 50px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -139px; top: 306px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 629px; top: -206px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -139px; top: -206px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 629px; top: 306px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 117px; top: 50px;"><canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 373px; top: 50px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 373px; top: -206px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 117px; top: -206px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 117px; top: 306px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 373px; top: 306px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -139px; top: 50px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 629px; top: 50px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -139px; top: 306px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 629px; top: -206px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -139px; top: -206px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 629px; top: 306px;"></div></div></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden; width: 646px; height: 300px;"><img src="http://maps.googleapis.com/maps/api/js/StaticMapService.GetMapImage?1m2&amp;1i36491&amp;2i47566&amp;2e1&amp;3u9&amp;4m2&amp;1u646&amp;2u300&amp;5m5&amp;1e0&amp;5sen&amp;6sus&amp;10b1&amp;12b1&amp;token=77351" style="width: 646px; height: 300px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 117px; top: 50px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i9!2i143!3i186!2m3!1e0!2sm!3i298166353!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 373px; top: 50px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i9!2i144!3i186!2m3!1e0!2sm!3i298166353!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 373px; top: -206px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i9!2i144!3i185!2m3!1e0!2sm!3i298162755!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 117px; top: -206px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i9!2i143!3i185!2m3!1e0!2sm!3i298162755!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 117px; top: 306px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i9!2i143!3i187!2m3!1e0!2sm!3i298166353!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 373px; top: 306px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i9!2i144!3i187!2m3!1e0!2sm!3i298166353!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -139px; top: 50px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i9!2i142!3i186!2m3!1e0!2sm!3i298166353!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 629px; top: 50px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i9!2i145!3i186!2m3!1e0!2sm!3i298164918!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -139px; top: 306px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i9!2i142!3i187!2m3!1e0!2sm!3i298166353!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 629px; top: -206px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i9!2i145!3i185!2m3!1e0!2sm!3i298154114!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -139px; top: -206px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i9!2i142!3i185!2m3!1e0!2sm!3i298162755!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 629px; top: 306px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i9!2i145!3i187!2m3!1e0!2sm!3i298164918!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="http://maps.google.com/maps?ll=43.889014,-78.886168&amp;z=9&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 62px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google_white2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 161px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2015 Google</span></div></div></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 173px; top: 60px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2015 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2015 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; position: absolute; -webkit-user-select: none; right: 92px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a href="http://www.google.com/intl/en_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@43.8890139,-78.8861682,9z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint" draggable="false" controlwidth="32" controlheight="84" style="margin: 5px; -webkit-user-select: none; position: absolute; left: 0px; top: 0px;"><div controlwidth="32" controlheight="40" style="cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default; position: absolute; left: 0px; top: 0px;"><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -9px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is disabled" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -107px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is on top of the Map" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -58px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -205px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" controlwidth="0" controlheight="0" style="opacity: 0.6; display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 22px; height: 22px; overflow: hidden; position: absolute; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -38px; top: -360px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" controlwidth="20" controlheight="39" style="position: absolute; left: 6px; top: 45px;"><div style="width: 20px; height: 39px; overflow: hidden; position: absolute;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -39px; top: -401px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div title="Zoom in" style="position: absolute; left: 0px; top: 2px; width: 20px; height: 17px; cursor: pointer;"></div><div title="Zoom out" style="position: absolute; left: 0px; top: 19px; width: 20px; height: 17px; cursor: pointer;"></div></div></div><div class="gmnoprint" style="margin: 5px; z-index: 0; position: absolute; cursor: pointer; right: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 1px 6px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; border: 1px solid rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 24px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Map</div><div style="z-index: -1; padding-top: 2px; -webkit-background-clip: padding-box; border-width: 0px 1px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); border-left-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 17px; text-align: left; display: none; background-color: white; background-clip: padding-box;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 1px 6px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgba(0, 0, 0, 0.14902); border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 43px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Satellite</div><div style="z-index: -1; padding-top: 2px; -webkit-background-clip: padding-box; border-width: 0px 1px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); border-left-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 17px; text-align: left; display: none; background-color: white; background-clip: padding-box;"><div draggable="false" title="Zoom in to show 45 degree view" style="color: rgb(184, 184, 184); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; display: none; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(241, 241, 241); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">45°</label></div><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></div>
                    </div>

                    <h2>Skills and Educations</h2>

                    <legend>Overall Average, Last Year of Studies</legend>

                    <?php if ($overall_average == "below 70%") { ?>
                        <input type="radio" checked="checked" name="overall_average" value="below 70%">
                        <label class="overall_average">Below 70%</label>
                    <?php } else { ?>
                        <input type="radio" name="overall_average" value="below 70%">
                        <label class="overall_average">Below 70%</label>
                    <?php } ?>

                    <?php if ($overall_average == "70% - 80%") { ?>
                        <input type="radio" checked="checked" name="overall_average" value="70% - 80%">
                        <label class="overall_average">70% - 80%</label>
                    <?php } else { ?>
                        <input type="radio" name="overall_average" value="70% - 80%">
                        <label class="overall_average">70% - 80%</label>
                    <?php } ?>

                    <?php if ($overall_average == "80% - 90%") { ?>
                        <input type="radio" checked="checked" name="overall_average" value="80% - 90%">
                        <label class="overall_average">80% - 90%</label>
                    <?php } else { ?>
                        <input type="radio" name="overall_average" value="80% - 90%">
                        <label class="overall_average">80% - 90%</label>
                    <?php } ?>    

                    <?php if ($overall_average == "90% - 95%") { ?>
                        <input type="radio" checked="checked" name="overall_average" value="90% - 95%">
                        <label class="overall_average">90% - 95%</label>
                    <?php } else { ?>
                        <input type="radio" name="overall_average" value="90% - 95%">
                        <label class="overall_average">90% - 95%</label>
                    <?php } ?>        

                    <?php if ($overall_average == "95% - 100%") { ?>
                        <input type="radio" checked="checked" name="overall_average" value="95% - 100%">
                        <label class="overall_average">95% - 100%</label>
                    <?php } else { ?>
                        <input type="radio" name="overall_average" value="95% - 100%">
                        <label class="overall_average">95% - 100%</label>
                    <?php } ?>    
                    <br>
                    <label>&nbsp;&nbsp;I have transcripts</label>

                    <?php if ($transcripts == 'Yes') {
                        ?>
                        <input checked="checked" type="checkbox" name="transcripts" value="Yes">
                    <?php } else { ?>
                        <input type="checkbox" name="transcripts" value="Yes">
                    <?php } ?>
                    <br>
                    <p class="optional"><label for="degree">Degree</label> <input type="text" class="text" name="degree" id="degree" value="<?php echo $degree; ?>"></p>

                    <p class="optional"><label for="institution">Institution</label> 
                        <input type="text" class="text" name="institution" id="institution" value="<?php echo $institution; ?>">
                    </p>

                    <p class="optional">
                        <label for="year_issued">Year Issued</label>
                        <input class="text" type="text" name="year_issued" value="<?php echo $year_issued; ?>" id="degree_date_issued" placeholder="Year Issued">   
                    </p>

                    <p class="optional">
                        <label for="skills">Separated with a comma e.g. AutoCAD Advanced, Flash basics, Typing 80 WPM, Simply Accounting Advanced</label> 
                        <input type="text" class="text" data-separator="," name="skills" class="skills" placeholder="e.g. Public Speaking, Team Management" value="<?php echo $skills; ?>">
                    <p class="optional">
                        <label for="misc-documents">Document Uploads</label> 
                        <input type="file" class="text" name="additional_doc" id="misc-documents" value="<?php echo $additional_doc; ?>">
                    </p>

                    <h2>Career Map</h2>

                    <!--Reference 1-->   



                    <fieldset>
                        <h3>Most Recent</h3>
                        <input type="hidden" name="career_map_employment_1" value="Most Recent" />

                        <?php
                        
                        $user_id = wp_get_current_user();
                        $career_map_table = $wpdb->prefix . 'career_map';

                        $career_map_sql = "SELECT 
                a.career_map_id,
                a.user_id,	
                a.employment,	
                a.company,	
                a.position,	
                a.start_date,	
                a.end_date,	
                a.job_type,	
                a.city,	
                a.country,	
                a.reason_for_leaving,	
                a.salary_type,	
                a.starting_salary,
                a.final_salary,
                a.reference_name,	
                a.reference_email,	
                a.reference_phone_number,	
                a.reference_position,	
                a.notes FROM $career_map_table a WHERE user_id in (%d)";


                        $career_map_prepared_statement = $wpdb->prepare($career_map_sql, $user_id->ID);
                        $career_map = $wpdb->get_results($career_map_prepared_statement);
                        
                        $career_map_employment_1;
                        $career_map_company_1;
                        $career_map_position_1;
                        $career_map_start_date_1;
                        $career_map_end_date_1;
                        $career_map_job_type_1;
                        $career_map_city_1;
                        $career_map_country_1;
                        $career_map_reason_for_leaving_1;
                        $career_map_salary_type_1;
                        $career_map_starting_salary_1;
                        $career_map_final_salary_1;
                        $career_map_reference_name_1;
                        $career_map_reference_email_1;
                        $career_map_reference_phone_number_1;
                        $career_map_reference_position_1;
                        $career_map_reference_notes_1;
                        
                         $career_map_employment_2;
                        $career_map_company_2;
                        $career_map_position_2;
                        $career_map_start_date_2;
                        $career_map_end_date_2;
                        $career_map_job_type_2;
                        $career_map_city_2;
                        $career_map_country_2;
                        $career_map_reason_for_leaving_2;
                        $career_map_salary_type_2;
                        $career_map_starting_salary_2;
                        $career_map_final_salary_2;
                        $career_map_reference_name_2;
                        $career_map_reference_email_2;
                        $career_map_reference_phone_number_2;
                        $career_map_reference_position_2;
                        $career_map_reference_notes_2;
                        
                         $career_map_employment_3;
                        $career_map_company_3;
                        $career_map_position_3;
                        $career_map_start_date_3;
                        $career_map_end_date_3;
                        $career_map_job_type_3;
                        $career_map_city_3;
                        $career_map_country_3;
                        $career_map_reason_for_leaving_3;
                        $career_map_salary_type_3;
                        $career_map_starting_salary_3;
                        $career_map_final_salary_3;
                        $career_map_reference_name_3;
                        $career_map_reference_email_3;
                        $career_map_reference_phone_number_3;
                        $career_map_reference_position_3;
                        $career_map_reference_notes_3;

                        foreach ($career_map as $career_map_data) {

                            
                            if ($career_map_data->employment == "Most Recent") {
                                
                            $career_map_employment_1 = $career_map_data->employment;
                            $career_map_company_1 = $career_map_data->company;
                            $career_map_position_1 = $career_map_data->position;
                            $career_map_start_date_1 = $career_map_data->start_date;
                            $career_map_end_date_1 = $career_map_data->end_date;
                            $career_map_job_type_1 = $career_map_data->job_type;
                            $career_map_city_1 = $career_map_data->city;
                            $career_map_country_1 = $career_map_data->country;
                            $career_map_reason_for_leaving_1 = $career_map_data->reason_for_leaving;
                            $career_map_salary_type_1 = $career_map_data->salary_type;
                            $career_map_starting_salary_1 = $career_map_data->starting_salary;
                            $career_map_final_salary_1 = $career_map_data->final_salary;
                            $career_map_reference_name_1 = $career_map_data->reference_name;
                            $career_map_reference_email_1 = $career_map_data->reference_email;
                            $career_map_reference_phone_number_1 = $career_map_data->reference_phone_number;
                            $career_map_reference_position_1 = $career_map_data->reference_position;
                            $career_map_reference_notes_1 = $career_map_data->notes;
                            
                            }
                            
                            if ($career_map_data->employment == "2nd Last") {
                                
                            $career_map_employment_2 = $career_map_data->employment;
                            $career_map_company_2 = $career_map_data->company;
                            $career_map_position_2 = $career_map_data->position;
                            $career_map_start_date_2 = $career_map_data->start_date;
                            $career_map_end_date_2 = $career_map_data->end_date;
                            $career_map_job_type_2 = $career_map_data->job_type;
                            $career_map_city_2 = $career_map_data->city;
                            $career_map_country_2 = $career_map_data->country;
                            $career_map_reason_for_leaving_2 = $career_map_data->reason_for_leaving;
                            $career_map_salary_type_2 = $career_map_data->salary_type;
                            $career_map_starting_salary_2 = $career_map_data->starting_salary;
                            $career_map_final_salary_2 = $career_map_data->final_salary;
                            $career_map_reference_name_2 = $career_map_data->reference_name;
                            $career_map_reference_email_2 = $career_map_data->reference_email;
                            $career_map_reference_phone_number_2 = $career_map_data->reference_phone_number;
                            $career_map_reference_position_2 = $career_map_data->reference_position;
                            $career_map_reference_notes_2 = $career_map_data->notes;
                            
                            }
                            
                            if ($career_map_data->employment == "3rd Last") {
                                
                            $career_map_employment_3 = $career_map_data->employment;
                            $career_map_company_3 = $career_map_data->company;
                            $career_map_position_3 = $career_map_data->position;
                            $career_map_start_date_3 = $career_map_data->start_date;
                            $career_map_end_date_3 = $career_map_data->end_date;
                            $career_map_job_type_3 = $career_map_data->job_type;
                            $career_map_city_3 = $career_map_data->city;
                            $career_map_country_3 = $career_map_data->country;
                            $career_map_reason_for_leaving_3 = $career_map_data->reason_for_leaving;
                            $career_map_salary_type_3 = $career_map_data->salary_type;
                            $career_map_starting_salary_3 = $career_map_data->starting_salary;
                            $career_map_final_salary_3 = $career_map_data->final_salary;
                            $career_map_reference_name_3 = $career_map_data->reference_name;
                            $career_map_reference_email_3 = $career_map_data->reference_email;
                            $career_map_reference_phone_number_3 = $career_map_data->reference_phone_number;
                            $career_map_reference_position_3 = $career_map_data->reference_position;
                            $career_map_reference_notes_3 = $career_map_data->notes;
                            
                            }
                        }
                        ?>


                        <p class="optional">
                            <label for="career_map_position_1">Position</label> 
                            <input type="text" class="text" name="career_map_position_1" value="<?php echo $career_map_position_1; ?>"  placeholder="Position">
                        </p>

                        <p class="optional">
                            <label for="career_map_start_date_1">Start Date</label>
                            <input class="text" type="date" name="career_map_start_date_1" value="<?php echo $career_map_start_date_1; ?>" placeholder="Start Date">   
                        </p>

                        <p class="optional">
                            <label for="career_map_end_date_1">End Date</label>
                            <input class="text" type="date" name="career_map_end_date_1" value="<?php echo $career_map_end_date_1 ?>" placeholder="End Date">   
                        </p>


                        <p class="optional">
                            <label for="career_map_job_type_1">Job Type</label>
                            <select class="career_map_job_type_1" name="career_map_job_type_1"> 
                                <option>Full-Time</option>
                                <option>Part-Time</option>
                            </select>
                        </p>

                        <p class="optional"><label for="career_map_company_1">Company</label> 
                            <input type="text" class="text" name="career_map_company_1" value="<?php echo $career_map_company_1; ?>" placeholder="Company">
                        </p>

                        <p class="optional"><label for="career_map_city_1">City</label> 
                            <input type="text" class="text" name="career_map_city_1" value="<?php echo $career_map_city_1; ?>" placeholder="City">
                        </p>

                        <p class="optional">
                            <label for="career_map_country_1">Country</label> 
                            <input type="text" class="text" name="career_map_country_1" value="<?php echo $career_map_country_1; ?>" placeholder="Country">
                        </p>

                        <p class="optional">
                            <label for="career_map_reason_for_leaving_1">Reason for Leaving</label>
                            <select class="career_map_reason_for_leaving_1" name="career_map_reason_for_leaving_1"> 
                                <option selected="selected">Career change</option>
                                <option>Career growth</option>
                                <option>Change in career path</option>
                                <option>Company cut backs</option>
                                <option>Company downsized</option>
                                <option>Company went out of business</option>
                                <option>Family circumstances</option>
                                <option>Family reasons</option>
                                <option>Flexible schedule</option>
                                <option>Getting married</option>
                                <option>Hours reduced</option>
                                <option>Job was outsourced</option>
                                <option>Good career opportunity</option>
                                <option>Good reputation and opportunity at the new company</option>
                                <option>Laid off</option>
                                <option>Landed a higher paying job</option>
                                <option>Limited growth at company</option>
                                <option>Long commute</option>
                                <option>Looking for a new challenge</option>
                                <option>Needed a full-time position</option>
                                <option>New challenge</option>
                                <option>Not compatible with company goals</option>
                                <option>Not enough hours</option>
                                <option>Not enough work or challenge</option>
                                <option>Offered a permanent position</option>
                                <option>Personal reasons</option>
                                <option>Position eliminated</option>
                                <option>Position ended</option>
                                <option>Relocating</option>
                                <option>Reorganization or merger</option>
                                <option>Retiring</option>
                                <option>Seasonal position</option>
                                <option>Seeking a challenge</option>
                                <option>Seeking more responsibility</option>
                                <option>Staying home to raise a family</option>
                                <option>Summer job</option>
                                <option>Temporary job</option>
                                <option>Travel</option>
                                <option>Went back to school</option>
                                <option>About to get fired</option>
                                <option>Arrested</option>
                                <option>Bad company to work for</option>
                                <option>Bored at work</option>
                                <option>Childcare issues</option>
                                <option>Didn't get along with co-workers</option>
                                <option>Didn't like the schedule</option>
                                <option>Didn't want to work as many hours</option>
                                <option>Didn't want to work evening or weekends</option>
                                <option>Hated my boss</option>
                                <option>Hated my job</option>
                                <option>Injured</option>
                                <option>Job was too difficult</option>
                                <option>Let go for harassment</option>
                                <option>Let go for tardiness</option>
                                <option>Manager was stupid</option>
                                <option>My boss was a jerk</option>
                                <option>My mom made me quit</option>
                                <option>No transportation</option>
                                <option>Overtime was required</option>
                                <option>Passed over for promotion</option>
                                <option>Rocky marriage</option>
                            </select>
                        </p>
                        <p class="optional">
                            <label for="career_map_salary_type_1">Salary Type</label>
                            <select class="career_map_salary_type_1" name="career_map_salary_type_1"> 
                                <option>Per Hour</option>
                                <option>Per Month</option>
                            </select>
                        </p>

                        <p class="optional">
                            <label for="career_map_starting_salary_1">Starting Salary</label> 
                            <input type="text" class="text" name="career_map_starting_salary_1" value="<?php echo $career_map_starting_salary_1; ?>" placeholder="Starting Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_final_salary_1">Final Salary</label> 
                            <input type="text" class="text" name="career_map_final_salary_1" value="<?php echo $career_map_final_salary_1; ?>" placeholder="Final Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_name_1">Reference Name</label> 
                            <input type="text" class="text" name="career_map_reference_name_1" value="<?php echo $career_map_reference_name_1; ?>" placeholder="Reference Name">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_email_1">Reference Email</label> 
                            <input type="text" class="text" name="career_map_reference_email_1" value="<?php echo $career_map_reference_email_1; ?>" placeholder="Reference Email">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_phone_number_1">Reference Phone Number</label> 
                            <input type="text" class="text" name="career_map_reference_phone_number_1" value="<?php echo $career_map_reference_phone_number_1; ?>" placeholder="Reference Phone Number">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_position_1">Reference Position</label> 
                            <input type="text" class="text" name="career_map_reference_position_1" value="<?php echo $career_map_reference_position_1; ?>" placeholder="Reference Position">
                        </p>

                        <p class="optional"> 
                            <textarea style="width: 320px;" class="career_map_reference_notes_1" name="career_map_reference_notes_1" placeholder="Reference Additional Info"><?php echo $career_map_reference_notes_1; ?></textarea>
                        </p>
                    </fieldset>
                    <fieldset>
                        <h3>2nd Last</h3>
                        <input type="hidden" name="career_map_employment_1" value="2nd Last" />
                        <p class="optional">
                            <label for="career_map_position_2">Position</label> 
                            <input type="text" class="text" name="career_map_position_2" value="<?php echo $career_map_position_2; ?>"  placeholder="Position">
                        </p>

                        <p class="optional">
                            <label for="career_map_start_date_2">Start Date</label>
                            <input class="text" type="date" name="career_map_start_date_2" value="<?php echo $career_map_start_date_2; ?>" placeholder="Start Date">   
                        </p>

                        <p class="optional">
                            <label for="career_map_end_date_2">End Date</label>
                            <input class="text" type="date" name="career_map_end_date_2" value="<?php echo $career_map_end_date_2 ?>" placeholder="End Date">   
                        </p>


                        <p class="optional">
                            <label for="career_map_job_type_2">Job Type</label>
                            <select class="career_map_job_type_2" name="career_map_job_type_2"> 
                                <option>Full-Time</option>
                                <option>Part-Time</option>
                            </select>
                        </p>

                        <p class="optional"><label for="career_map_company_2">Company</label> 
                            <input type="text" class="text" name="career_map_company_2" value="<?php echo $career_map_company_2; ?>" placeholder="Company">
                        </p>

                        <p class="optional"><label for="career_map_city_2">City</label> 
                            <input type="text" class="text" name="career_map_city_2" value="<?php echo $career_map_city_2; ?>" placeholder="City">
                        </p>

                        <p class="optional">
                            <label for="career_map_country_2">Country</label> 
                            <input type="text" class="text" name="career_map_country_2" value="<?php echo $career_map_country_2; ?>" placeholder="Country">
                        </p>

                        <p class="optional">
                            <label for="career_map_reason_for_leaving_2">Reason for Leaving</label>
                            <select class="career_map_reason_for_leaving_2" name="career_map_reason_for_leaving_2"> 
                                <option selected="selected">Career change</option>
                                <option>Career growth</option>
                                <option>Change in career path</option>
                                <option>Company cut backs</option>
                                <option>Company downsized</option>
                                <option>Company went out of business</option>
                                <option>Family circumstances</option>
                                <option>Family reasons</option>
                                <option>Flexible schedule</option>
                                <option>Getting married</option>
                                <option>Hours reduced</option>
                                <option>Job was outsourced</option>
                                <option>Good career opportunity</option>
                                <option>Good reputation and opportunity at the new company</option>
                                <option>Laid off</option>
                                <option>Landed a higher paying job</option>
                                <option>Limited growth at company</option>
                                <option>Long commute</option>
                                <option>Looking for a new challenge</option>
                                <option>Needed a full-time position</option>
                                <option>New challenge</option>
                                <option>Not compatible with company goals</option>
                                <option>Not enough hours</option>
                                <option>Not enough work or challenge</option>
                                <option>Offered a permanent position</option>
                                <option>Personal reasons</option>
                                <option>Position eliminated</option>
                                <option>Position ended</option>
                                <option>Relocating</option>
                                <option>Reorganization or merger</option>
                                <option>Retiring</option>
                                <option>Seasonal position</option>
                                <option>Seeking a challenge</option>
                                <option>Seeking more responsibility</option>
                                <option>Staying home to raise a family</option>
                                <option>Summer job</option>
                                <option>Temporary job</option>
                                <option>Travel</option>
                                <option>Went back to school</option>
                                <option>About to get fired</option>
                                <option>Arrested</option>
                                <option>Bad company to work for</option>
                                <option>Bored at work</option>
                                <option>Childcare issues</option>
                                <option>Didn't get along with co-workers</option>
                                <option>Didn't like the schedule</option>
                                <option>Didn't want to work as many hours</option>
                                <option>Didn't want to work evening or weekends</option>
                                <option>Hated my boss</option>
                                <option>Hated my job</option>
                                <option>Injured</option>
                                <option>Job was too difficult</option>
                                <option>Let go for harassment</option>
                                <option>Let go for tardiness</option>
                                <option>Manager was stupid</option>
                                <option>My boss was a jerk</option>
                                <option>My mom made me quit</option>
                                <option>No transportation</option>
                                <option>Overtime was required</option>
                                <option>Passed over for promotion</option>
                                <option>Rocky marriage</option>
                            </select>
                        </p>
                        <p class="optional">
                            <label for="career_map_salary_type_2">Salary Type</label>
                            <select class="career_map_salary_type_2" name="career_map_salary_type_2"> 
                                <option>Per Hour</option>
                                <option>Per Month</option>
                            </select>
                        </p>

                        <p class="optional">
                            <label for="career_map_starting_salary_2">Starting Salary</label> 
                            <input type="text" class="text" name="career_map_starting_salary_2" value="<?php echo $career_map_starting_salary_2; ?>" placeholder="Starting Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_final_salary_2">Final Salary</label> 
                            <input type="text" class="text" name="career_map_final_salary_2" value="<?php echo $career_map_final_salary_2; ?>" placeholder="Final Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_name_2">Reference Name</label> 
                            <input type="text" class="text" name="career_map_reference_name_2" value="<?php echo $career_map_reference_name_2; ?>" placeholder="Reference Name">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_email_2">Reference Email</label> 
                            <input type="text" class="text" name="career_map_reference_email_2" value="<?php echo $career_map_reference_email_2; ?>" placeholder="Reference Email">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_phone_number_2">Reference Phone Number</label> 
                            <input type="text" class="text" name="career_map_reference_phone_number_2" value="<?php echo $career_map_reference_phone_number_2; ?>" placeholder="Reference Phone Number">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_position_2">Reference Position</label> 
                            <input type="text" class="text" name="career_map_reference_position_2" value="<?php echo $career_map_reference_position_2; ?>" placeholder="Reference Position">
                        </p>

                        <p class="optional"> 
                            <textarea style="width: 320px;" class="career_map_reference_notes_2" name="career_map_reference_notes_2" placeholder="Reference Additional Info"><?php echo $career_map_reference_notes_2; ?></textarea>
                        </p>

                    </fieldset>
                    <fieldset>
                        <h3>3rd Last</h3>
                        <input type="hidden" name="career_map_employment_1" value="3rd Last" />
                        <p class="optional">
                            <label for="career_map_position_3">Position</label> 
                            <input type="text" class="text" name="career_map_position_3" value="<?php echo $career_map_position_3; ?>"  placeholder="Position">
                        </p>

                        <p class="optional">
                            <label for="career_map_start_date_3">Start Date</label>
                            <input class="text" type="date" name="career_map_start_date_3" value="<?php echo $career_map_start_date_3; ?>" placeholder="Start Date">   
                        </p>

                        <p class="optional">
                            <label for="career_map_end_date_3">End Date</label>
                            <input class="text" type="date" name="career_map_end_date_3" value="<?php echo $career_map_end_date_3 ?>" placeholder="End Date">   
                        </p>


                        <p class="optional">
                            <label for="career_map_job_type_3">Job Type</label>
                            <select class="career_map_job_type_3" name="career_map_job_type_3"> 
                                <option>Full-Time</option>
                                <option>Part-Time</option>
                            </select>
                        </p>

                        <p class="optional"><label for="career_map_company_3">Company</label> 
                            <input type="text" class="text" name="career_map_company_3" value="<?php echo $career_map_company_3; ?>" placeholder="Company">
                        </p>

                        <p class="optional"><label for="career_map_city_3">City</label> 
                            <input type="text" class="text" name="career_map_city_3" value="<?php echo $career_map_city_3; ?>" placeholder="City">
                        </p>

                        <p class="optional">
                            <label for="career_map_country_3">Country</label> 
                            <input type="text" class="text" name="career_map_country_3" value="<?php echo $career_map_country_3; ?>" placeholder="Country">
                        </p>

                        <p class="optional">
                            <label for="career_map_reason_for_leaving_3">Reason for Leaving</label>
                            <select class="company_3_reason_for_leaving_3" name="career_map_reason_for_leaving_3"> 
                                <option selected="selected">Career change</option>
                                <option>Career growth</option>
                                <option>Change in career path</option>
                                <option>Company cut backs</option>
                                <option>Company downsized</option>
                                <option>Company went out of business</option>
                                <option>Family circumstances</option>
                                <option>Family reasons</option>
                                <option>Flexible schedule</option>
                                <option>Getting married</option>
                                <option>Hours reduced</option>
                                <option>Job was outsourced</option>
                                <option>Good career opportunity</option>
                                <option>Good reputation and opportunity at the new company</option>
                                <option>Laid off</option>
                                <option>Landed a higher paying job</option>
                                <option>Limited growth at company</option>
                                <option>Long commute</option>
                                <option>Looking for a new challenge</option>
                                <option>Needed a full-time position</option>
                                <option>New challenge</option>
                                <option>Not compatible with company goals</option>
                                <option>Not enough hours</option>
                                <option>Not enough work or challenge</option>
                                <option>Offered a permanent position</option>
                                <option>Personal reasons</option>
                                <option>Position eliminated</option>
                                <option>Position ended</option>
                                <option>Relocating</option>
                                <option>Reorganization or merger</option>
                                <option>Retiring</option>
                                <option>Seasonal position</option>
                                <option>Seeking a challenge</option>
                                <option>Seeking more responsibility</option>
                                <option>Staying home to raise a family</option>
                                <option>Summer job</option>
                                <option>Temporary job</option>
                                <option>Travel</option>
                                <option>Went back to school</option>
                                <option>About to get fired</option>
                                <option>Arrested</option>
                                <option>Bad company to work for</option>
                                <option>Bored at work</option>
                                <option>Childcare issues</option>
                                <option>Didn't get along with co-workers</option>
                                <option>Didn't like the schedule</option>
                                <option>Didn't want to work as many hours</option>
                                <option>Didn't want to work evening or weekends</option>
                                <option>Hated my boss</option>
                                <option>Hated my job</option>
                                <option>Injured</option>
                                <option>Job was too difficult</option>
                                <option>Let go for harassment</option>
                                <option>Let go for tardiness</option>
                                <option>Manager was stupid</option>
                                <option>My boss was a jerk</option>
                                <option>My mom made me quit</option>
                                <option>No transportation</option>
                                <option>Overtime was required</option>
                                <option>Passed over for promotion</option>
                                <option>Rocky marriage</option>
                            </select>
                        </p>
                        <p class="optional">
                            <label for="career_map_salary_type_3">Salary Type</label>
                            <select class="career_map_salary_type_3" name="career_map_salary_type_3"> 
                                <option>Per Hour</option>
                                <option>Per Month</option>
                            </select>
                        </p>

                        <p class="optional">
                            <label for="career_map_starting_salary_3">Starting Salary</label> 
                            <input type="text" class="text" name="career_map_starting_salary_3" value="<?php echo $career_map_starting_salary_3; ?>" placeholder="Starting Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_final_salary_3">Final Salary</label> 
                            <input type="text" class="text" name="career_map_final_salary_3" value="<?php echo $career_map_final_salary_3; ?>" placeholder="Final Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_name_3">Reference Name</label> 
                            <input type="text" class="text" name="career_map_reference_name_3" value="<?php echo $career_map_reference_name_3; ?>" placeholder="Reference Name">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_email_3">Reference Email</label> 
                            <input type="text" class="text" name="career_map_reference_email_3" value="<?php echo $career_map_reference_email_3; ?>" placeholder="Reference Email">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_phone_number_3">Reference Phone Number</label> 
                            <input type="text" class="text" name="career_map_reference_phone_number_3" value="<?php echo $career_map_reference_phone_number_3; ?>" placeholder="Reference Phone Number">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_position_3">Reference Position</label> 
                            <input type="text" class="text" name="career_map_reference_position_3" value="<?php echo $career_map_reference_position_3; ?>" placeholder="Reference Position">
                        </p>

                        <p class="optional"> 
                            <textarea style="width: 320px;" class="career_map_reference_notes_3" name="career_map_reference_notes_3" placeholder="Reference Additional Info"><?php echo $career_map_reference_notes_3; ?></textarea>
                        </p>

                    </fieldset>


                    <br>
                    <br>

                    <fieldset>
                        <iframe id="widget" frameborder="0" allowfullscreen="1" title="YouTube upload widget" width="640" height="428.8" src="https://www.youtube.com/upload_embed?enablejsapi=1&amp;origin=http%3A%2F%2Fvidhire.net"></iframe>
                        <div id="player"></div>
                        <div id="video_link">
                            <label>Interview Video Link</label>
                            <input id="interview_video" style="width: 640px;" name="interview_video" type="text" value="<?php echo $interview_video_link; ?>">
                        </div>	
                        <script type="text/javascript">
                            var tag = document.createElement('script');

                            tag.src = "https://www.youtube.com/iframe_api";
                            var firstScriptTag = document.getElementsByTagName('script')[0];
                            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                            var player1;

                            function onYouTubeIframeAPIReady() {

                                new YT.UploadWidget('widget', {
                                    events: {
                                        onStateChange: onWidgetStateChange,
                                        onUploadSuccess: onUploadSuccess,
                                        onProcessingComplete: onProcessingComplete
                                    }

                                });
                            }

                            function onWidgetStateChange(event) {
                                if (event.data.state == YT.UploadWidgetState.RECORDING) {

                                }

                            }

                            function onUploadSuccess(event) {
                                var text = document.getElementById('interview_video');
                                text.value = "https://www.youtube.com/embed/" + event.data.videoId;
                            }

                            function onProcessingComplete(event) {
                                /*  
                                 new YT.Player('player', {
                                 height: 300,
                                 width: 450,
                                 videoId: event.data.videoId,
                                 });*/
                                /*var text = document.getElementById('interview_video');
                                 text.value = "https://www.youtube.com/embed/" + event.data.videoId;*/

                            }
                        </script>

                        <div id="video-interview-questions">  
                            <label>Video Interview Instructions</label>

                            <ul>
                                <li>You cannot stop and start the video without losing your previous recording.</li>
                                <li>Once you click “allow” on the popup window the video will start.</li>
                                <li>Once you have finished, click “upload”.</li>
                                <li>It takes a few minutes to see the video due to processing.</li>
                                <li>If you are having issues, try another browser.</li>
                                <li>You can also record on your computer, upload to Youtube then paste the link above.</li>
                            </ul>
                            <label>Video Interview Questions</label>

                            <ol>
                                <li>Why did you choose this line of work?</li>
                                <li>What do you do in your spare time?</li>
                                <li>What are your greatest strengths?</li>
                                <li>What are you greatest weaknesses?</li>
                                <li>Do you have any health or personal issues that may affect job performance?</li>
                                <li>In your last job how many sick days did you take off?</li>
                                <li>Why should we hire you?</li>
                            </ol>
                        </div>
                    </fieldset>
                </form>
            </div><!-- end section_content -->
        </div>
    </div>
</div>