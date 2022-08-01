<?php

namespace App\Http\Services\v1\User;

use App\Http\Resources\v1\User\Profile\ProfileResource;
use App\Traits\ApiResponder;
use App\Utilities\User\EmailUtility;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    use ApiResponder;

    public function update($user, $params)
    {
        switch ($params->updateType) {
            case ('email'):
                if ($user->email == $params->email) {
                    return $this->errorUnprocessableEntity('Cannot be the same email address');
                }
                EmailUtility::sendUpdateEmailVerificationCode($user);

                $user->update([
                    'email' => $params->email,
                ]);

                $latestUserDetails = $user->fresh();

                return $this->successResponse('Successfully sent 6 digit verification code to your email', new ProfileResource($latestUserDetails));

                break;
            case ('name'):
                $user->update([
                    'name' => $params->name,
                ]);
                return $this->successResponse('Successfully updated name', new ProfileResource($user));
                break;
            case ('phone'):
                $user->update([
                    'phone' => $params->phone,
                ]);
                return $this->successResponse('Successfully updated phone number', new ProfileResource($user));
                break;
            case ('password'):
                if (Hash::check($params->currentPassword, $user->password)) {
                    $user->password = Hash::make($params->newPassword);
                    $user->save();
                    return $this->successResponse('Successfully updated password', new ProfileResource($user));
                }
                return $this->errorUnprocessableEntity('Invalid Current Password');
                break;
            case ('address'):
                $user->update([
                    'address_one' => $params->addressOne,
                    'address_two' => $params->addressTwo,
                    'city' => $params->city,
                    'state' => $params->state,
                    'postcode' => $params->postcode,
                ]);
                return $this->successResponse('Successfully updated address', new ProfileResource($user));
                break;
            default:
                return $this->notFoundResponse('Update Type not found');
        }
    }
}
