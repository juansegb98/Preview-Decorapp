<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;
    public function username() {
        return 'user_email';
    }
    public function sendResetLinkEmail(Request $request)
{
    $this->validateEmail($request);

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $response = $this->broker()->sendResetLink(
        $request->only('user_email')
    );
    // dump(Password::RESET_LINK_SENT);
    return $response == Password::RESET_LINK_SENT
        ? $this->sendResetLinkResponse($request, $response)
        : $this->sendResetLinkFailedResponse($request, $response);
}

protected function sendResetLinkResponse(Request $request, $response)
{
    return back()->with('status', trans($response));
}

protected function validateEmail(Request $request)
{
    $this->validate($request, ['user_email' => 'required|email']);

}

}
