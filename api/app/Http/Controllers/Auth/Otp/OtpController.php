<?php

namespace App\Http\Controllers\Auth\Otp;

use Google2FA;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $user->update([
            'google2fa_secret' => $secret = Google2FA::generateSecretKey(),
        ]);

        dd($secret);
    }
}
