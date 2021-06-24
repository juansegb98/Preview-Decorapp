<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

//    public function login (Request $request) {
//
//        $input = $request->all();
//
//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//        
//        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
//        {
//            if ($request->returnId == true){                    
//                return auth()->user();
//            }
//            else {
//                if(auth()->user()->is_admin == 1) {
//                    return redirect()->route('admin.home');
//                }
//                else {
//                    return redirect('/');
//                }
//            }
//        }else {
//            return redirect()->route('login')
//            ->with('error', 'Email and Password are wrong.');
//        }
//
//    }

    public function username() {
        return 'user_email';
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    // ? new JsonResponse([], 204)
                    ? auth()->user()
                    : redirect()->intended($this->redirectPath());
    }
    public function logout()
    {
        Auth::logout();
        return redirect('https://avisp.co');
    }

}
