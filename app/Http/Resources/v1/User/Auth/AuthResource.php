<?php

namespace App\Http\Resources\v1\User\Auth;

use App\Utilities\Format\ConvertUtility;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'emailVerified' => ConvertUtility::convertBoolean($this->email_verified),
        ];
    }
}
