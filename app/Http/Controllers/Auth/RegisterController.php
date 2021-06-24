<?php

namespace App\Http\Controllers\Auth;

use App\User;
use stdClass;
use App\EmemberUser;
use App\EmemberMetaUser;
use App\Mail\RegisteredUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use MikeMcLin\WpPassword\Facades\WpPassword;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\AVISolutionsPlusUserMailRegistration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'https://avisp.co';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:wp_users,user_email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' =>['required', 'string', 'min:7', 'max:14']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  new User;
        $user->user_nicename = $data['name'];
        $user->user_login = $data['email'];
        $user->user_email = $data['email'];
        $user->display_name = $data['name'];
        $user->user_pass = WpPassword::make($data['password']);
        $user->user_registered = date('Y-m-d H:i:s');
        

        $userEmember = new EmemberUser;
        $userEmember->user_name = $user->user_login;
        $userEmember->first_name = $user->user_nicename;
        $userEmember->password = $user->user_pass;
        $userEmember->email = $user->user_email;
        $userEmember->phone = $data['phone'];
        $userEmember->address_street =$data['address'];
        $userEmember->country = $data['country'];
        $userEmember->address_state = $data['state'];
        $userEmember->address_city = $data['city'];
        $userEmember->address_zipcode = $data['zip'];
        $userEmember->member_since = date('Y-m-d');
        $userEmember->membership_level = 4;
        $userEmember->last_accessed = date('Y-m-d H:i:s');
        $userEmember->last_accessed_from_ip = $this->getIp();
        $userEmember->account_state = "active";
        $userEmember->expiry_1st = date('Y-m-d');
        $userEmember->expiry_2nd = date('Y-m-d');
        if (isset($data['companyName'])) {
            $userEmember->company_name = $data['companyName'];
            
            $dateCompany = (isset($data['dateCompany'])) ? $data['dateCompany'] : "";
            $taxId = (isset($data['taxId'])) ? $data['taxId'] : "";
            $directorName = (isset($data['directorName'])) ? $data['directorName'] : "";
            if(isset($data['companyType'])){

                $companyType = null;
                foreach ($data['companyType'] as $type){
                    if($type !== "Other"){
                        $companyType .= $type.', ';
                    } 
                }
                if(isset($data['cTOtherText'])) {
                    $companyType .= 'Other: '.$data['cTOtherText'].'.';
                }
                // if ($data['companyType'] == "Other" && isset($data['cTOtherText'])){
                //     $companyType = $data['cTOtherText'];
                // } else {
                //     $companyType = $data['companyType'];        
                // }
            } else {
                $companyType = "";
            }
            
            $showroom = (isset($data['showroom'])) ? $data['showroom'] : "";
            if(isset($data['tradeOrg'])){

                $tradeOrg = null;
                foreach($data['tradeOrg'] as $tradeOrgType){
                    if($tradeOrgType !== "Other"){
                        $tradeOrg .= $tradeOrgType.', ';
                    }
                }
                if (isset($data['tradeOrgOtherText'])) {
                    $tradeOrg .= 'Other: '.$data['tradeOrgOtherText'].'.';
                }
                // if ($data['tradeOrg'] == "Other" && isset($data['tradeOrgOtherText'])){
                //     $tradeOrg = $data['tradeOrgOtherText'];
                // } else {
                //     $tradeOrg = $data['tradeOrg'];        
                // }
            } else {
                $tradeOrg = "";
            }
        } else {
            $dateCompany = "";
            $taxId = "";
            $directorName = "";
            $companyType = "";
            $tradeOrg = "";
            $showroom = "";
        }
        if(isset($data['reference'])){
            if ($data['reference'] == "Other" && isset($data['refOtherText'])){
                $reference = $data['refOtherText'];
            } else {
                $reference = $data['reference'];
            }
        } else {
            $reference = "";
        }  
        $user->save();
        $userEmember->save();
        $userMetaEmember = new EmemberMetaUser;
        $userMetaEmember->user_id = $userEmember->member_id;

        $meta_reference = "a:7:{s:26:\"How_Did_you_hear_about_us_\";s:".strlen($reference).":\"".$reference."\";"; 
        $meta_dateCompany = "s:16:\"Date_established\";s:".strlen($dateCompany).":\"".$dateCompany."\";";
        $meta_taxId = "s:6:\"Tax_ID\";s:".strlen($taxId).":\"".$taxId."\";";
        $meta_directorName = "s:22:\"Managing_Director_Name\";s:".strlen($directorName).":\"".$directorName."\";";
        $meta_companyType = "s:16:\"Type_of_business\";s:".strlen($companyType).":\"".$companyType."\";";
        $meta_showroom = "s:8:\"Showroom\";s:".strlen($showroom).":\"".$showroom."\";";
        $meta_tradeOrg = "s:30:\"Member_of_a_trade_organization\";s:".strlen($tradeOrg).":\"".$tradeOrg."\";}";
        
        $meta_value = $meta_reference.$meta_dateCompany.$meta_taxId.$meta_directorName.$meta_companyType.$meta_showroom.$meta_tradeOrg;

        // $meta_value = "a:7:{s:26:\"How_Did_you_hear_about_us_\";s:"+strlen($reference)+":\""+$reference+"\";s:16:\"Date_established\";s:"+strlen($dateCompany)+":\""+$dateCompany+"\";s:6:\"Tax_ID\";s:"+strlen($taxId)+":\""+$taxId+"\";s:22:\"Managing_Director_Name\";s:"+strlen($directorName)+":\""+$directorName+"\";s:16:\"Type_of_business\";s:"+strlen($companyType)+":\""+$companyType+"\";s:8:\"Showroom\";s:"+strlen($showroom)+":\""+$showroom+"\";s:30:\"Member_of_a_trade_organization\";s:"+strlen($tradeOrg)+":\""+$tradeOrg+"\";}";

        $userMetaEmember->meta_value = $meta_value;
        $userMetaEmember->save();
        
        $userMeta = new stdClass();
        $userMeta->reference = $reference;
        $userMeta->dateCompany = $dateCompany;
        $userMeta->taxId = $taxId;
        $userMeta->directorName = $directorName;
        $userMeta->companyType = $companyType;
        $userMeta->showroom = $showroom;
        $userMeta->tradeOrg = $tradeOrg;

        $this->sendRegisterMail($userEmember,$userMeta);
        $this->sendUserRegisterMail($userEmember);
        Session::flash('message','Registered with success! Please return to your design and try to submit it again');
        Session::flash('status','Registered with success');
        if($data['registerOrigin'] == "app"){
            $this->redirectTo = '/';
        }
        return $user;
        
    }
    public function getIp (){
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
          } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
          } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
          } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
          } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
          } else {
            // Método por defecto de obtener la IP del usuario
            // Si se utiliza un proxy, esto nos daría la IP del proxy
            // y no la IP real del usuario.
            $ip = $_SERVER['REMOTE_ADDR'];
          }
          return $ip;
    }
    public function sendRegisterMail($userEmember, $userMeta){
        Mail::to('mike@avisp.co')->send(new RegisteredUser($userEmember, $userMeta));
    }
    public function sendUserRegisterMail($userEmember){
        Mail::to($userEmember->email)->send(new AVISolutionsPlusUserMailRegistration());
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? $user->user_id
                    : redirect($this->redirectPath('/'));
    }
}
