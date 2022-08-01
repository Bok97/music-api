<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\v1\User\Auth\EmailVerificationCodeRequest;
use App\Http\Requests\v1\User\Auth\ForgotPasswordRequest;
use App\Http\Requests\v1\User\Auth\LoginRequest;
use App\Http\Requests\v1\User\Auth\RegistrationRequest;
use App\Http\Requests\v1\User\Auth\ResendEmailVerificationCodeRequest;
use App\Http\Requests\v1\User\Auth\ResetPasswordRequest;
use App\Http\Services\v1\User\AuthService;

class AuthController extends ApiController
{
    public function register(RegistrationRequest $request, AuthService $authService)
    {
        return $authService->register($request);
    }

    public function login(LoginRequest $request, AuthService $authService)
    {
        return $authService->login($request);
    }

    public function emailVerificationCode(EmailVerificationCodeRequest $request, AuthService $authService)
    {
        return $authService->emailVerificationCode($this->user(), $request);
    }

    public function forgotPassword(ForgotPasswordRequest $request, AuthService $authService)
    {
        return $authService->forgotPassword($request->email);
    }

    public function resetPassword(ResetPasswordRequest $request, AuthService $authService)
    {
        return $authService->resetPassword($request);
    }

    public function resendVerificationCode(ResendEmailVerificationCodeRequest $request, AuthService $authService)
    {
        return $authService->resendVerificationCode($request);
    }

    public function logout(AuthService $authService)
    {
        return $authService->logout($this->user());
    }
}
