<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'save_design',
        'register',
        'quote_page',
        'order_page',
        'print_page',
        'save_custom_image',
        'quote_mail',
        'login',
        'registerPage',
        'order_mail',
        'checkout_frames_sample',
        'mail_sample_frames'
    ];
}
