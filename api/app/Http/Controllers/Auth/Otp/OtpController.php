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

        return response(
            Google2FA::getQRCodeInline(
                'soft valley',
                $user->email,
                $user->google2fa_secret
            )
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'otp' => 'required',
        ]);

        $user = $request->user();

        if (!Google2FA::verifyKey($user->google2fa_secret, $request->otp)) {
            return response(null, 401);
        }

        $user->update([
            'google2fa_enabled' => true,
        ]);
    }
}
