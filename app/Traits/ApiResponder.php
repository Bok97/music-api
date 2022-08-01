<?php

namespace App\Traits;

trait ApiResponder
{
    protected function successsResponseWithToken($message = null, $data, $token = null, $code = 200, $userType = 'user')
    {
        return response()->json([
            'message' => $message,
            'success' => true,
            'data' => [
                'authToken' => $token,
                $userType => $data,
            ],
        ], $code);
    }

    protected function successsResponseWithOnlyToken($message = null, $token = null, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'success' => true,
            'data' => [
                'authToken' => $token,
            ],
        ], $code);
    }

    protected function successResponseWithMessageOnly($message, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'success' => true,
        ], $code);
    }

    protected function successResponse($message = null, $data, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'success' => true,
            'data' => $data,
        ], $code);
    }

    protected function successResetResponse($message = null, $token, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'success' => true,
            'data' => [
                'authToken' => $token,
            ],
        ], $code);
    }

    protected function badRequestResponse($message = null, $code = 400)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }

    protected function unauthorizedResponse($message = null, $code = 401)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }

    protected function forbiddenResponse($message = null, $code = 403)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }

    protected function notFoundResponse($message = null, $code = 404)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }

    protected function errorResponse($message = null, $code = 404)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }

    protected function notAcceptableResponse($message = null, $code = 406)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }

    protected function conflictResponse($message = null, $code = 409)
    {
        return response()->json([
            'message' => $message,
            'error' => false,
        ], $code);
    }

    protected function errorUnprocessableEntity($message = null, $code = 422)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }

    protected function internalServerError($message = null, $code = 500)
    {
        return response()->json([
            'message' => $message,
            'success' => false,
        ], $code);
    }
}
