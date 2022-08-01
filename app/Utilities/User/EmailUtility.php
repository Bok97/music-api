<?php

namespace App\Utilities\User;

use App\Jobs\v1\Email\SendVerificationCode;
use App\Models\User;
use App\Utilities\Format\ConvertUtility;

class EmailUtility
{
    public static function sendVerificationCode($email)
    {
        $user = User::where('email', $email)->first();

        if ($user->email_verification_code == null) {
            $user->email_verification_code = ConvertUtility::random6DigitCode();
            $user->save();
        }

        SendVerificationCode::dispatch($user, 'verification');
    }

    public static function sendUpdateEmailVerificationCode($user)
    {
        if ($user->email_verification_code == null) {
            $user->email_verification_code = ConvertUtility::random6DigitCode();
            $user->email_verified = false;
            $user->save();
        }
        SendVerificationCode::dispatch($user, 'verification');
    }

    public static function sendForgotPassword($email)
    {
        $user = User::where('email', $email)->first();

        if ($user->reset_verification_code == null) {
            $user->reset_verification_code = ConvertUtility::random6DigitCode();
            $user->save();
        }

        SendVerificationCode::dispatch($user, 'reset');
    }

    public static function sendResendVerificationCode($params)
    {
        $type = $params->type;
        $email = $params->email;

        $user = User::where('email', $email)->first();

        if ($type == 'register') {
            EmailUtility::sendVerificationCode($email);
        } elseif ($type == 'updateEmail') {
            EmailUtility::sendUpdateEmailVerificationCode($user);
        } else if ($type == 'forgotPassword') {
            EmailUtility::sendForgotPassword($email);
        }
    }
}
