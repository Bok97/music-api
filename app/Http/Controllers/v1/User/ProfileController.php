<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\v1\User\Profile\UpdateProfileRequest;
use App\Http\Resources\v1\User\Profile\ProfileResource;
use App\Http\Services\v1\User\ProfileService;
use App\Traits\ApiResponder;

class ProfileController extends ApiController
{
    use ApiResponder;

    public function index()
    {
        return $this->successResponse('Successfully retrieved user', new ProfileResource($this->user()));
    }

    public function update(UpdateProfileRequest $request, ProfileService $profileService)
    {
        return $profileService->update($this->user(), $request);
    }
}
