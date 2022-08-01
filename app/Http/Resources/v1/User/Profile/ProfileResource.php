<?php

namespace App\Http\Resources\v1\User\Profile;

use App\Utilities\Format\ConvertUtility;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'addressOne' => $this->address_one,
            'addressTwo' => $this->address_two,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'state' => $this->state,
            'emailVerified' => ConvertUtility::convertBoolean($this->email_verified),
        ];
    }
}
