<?php

namespace App\Http\Services\v1\User;

use App\Http\Resources\v1\User\Auth\AuthResource;
use App\Models\User;
use App\Traits\ApiResponder;
use App\Utilities\Format\DateTimeUtility;
use App\Utilities\User\EmailUtility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    use ApiResponder;

    public function register($params)
    {
        $user = User::create([
            'name' => $params->name,
            'email' => $params->email,
            'password' => Hash::make($params->password),
        ]);

        EmailUtility::sendVerificationCode($user->email);

        $token = $user->createToken('userToken', ['user'])->accessToken;

        return $this->successsResponseWithToken('Successfully send 6 digit code to your email', new AuthResource($user), $token);
    }

    public function login($params)
    {
        $user = User::where('email', $params->email)->first();

        if (Hash::check($params->password, $user->password)) {
            Auth::login($user);
            $token = $user->createToken('userToken', ['user'])->accessToken;
            return $this->successsResponseWithToken('Successfully logged in', new AuthResource($user), $token);
        }
        return $this->unauthorizedResponse('Invalid credentials');
    }

    public function emailVerificationCode($user, $params)
    {
        $correctVerificationCode = (int) $params->verificationCode === (int) $user->email_verification_code ? true : false;

        if ((bool) $correctVerificationCode === false) {
            return $this->unauthorizedResponse('Invalid verification code');
        } else {
            $user->email_verified = true;
            $user->email_verification_code = null;
            $user->save();
            return $this->successResponse('Successfully verified email', new AuthResource($user->fresh()));
        }
    }

    public function forgotPassword($email)
    {
        EmailUtility::sendForgotPassword($email);

        return $this->successResponseWithMessageOnly('Successfully send forgot password request');
    }

    public function resetPassword($params)
    {
        $user = User::where('email', $params->email)->first();

        $correctVerificationCode = (int) $params->verificationCode === (int) $user->reset_verification_code ? true : false;

        $resetDate = DateTimeUtility::formateCommonDateTime($user->updated_at);
        $latestDate = DateTimeUtility::formateCommonDateTime(now()->subMinutes(30));

        if ((bool) $correctVerificationCode === false) {
            return $this->unauthorizedResponse('Invalid verification code');
        } elseif ($resetDate <= $latestDate) {
            $user->reset_verification_code = null;
            $user->save();
            return $this->unauthorizedResponse('Your password has expired, please try again');
        } else {
            $user->password = Hash::make($params->password);
            $user->reset_verification_code = null;
            $user->save();
            return $this->successResponseWithMessageOnly('Successfully reset password');
        }
    }

    public function resendVerificationCode($params)
    {
        EmailUtility::sendResendVerificationCode($params);

        return $this->successResponseWithMessageOnly('Successfully resend verification code request');
    }

    public function logout($user)
    {
        $user->token()->revoke();

        return $this->successResponseWithMessageOnly('Successfully logged out');
    }
}
