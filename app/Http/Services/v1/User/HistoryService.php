<?php

namespace App\Http\Services\v1\User;

use App\Http\Resources\v1\User\History\HistoryCollection;
use App\Models\History;
use App\Traits\ApiResponder;

class HistoryService
{
    use ApiResponder;

    public function index($user)
    {
        $histories = $user->histories()->orderByDesc('created_at')->get();

        return $this->successResponse('Successfully retrived histories', new HistoryCollection($histories));
    }

    public function create($user, $songId)
    {
        $playlist = History::where('song_id', $songId)->first();

        if (empty($playlist)) {
            History::create([
                'song_id' => $songId,
                'user_id' => $user->id,
            ]);
        }
        return $this->successResponseWithMessageOnly('Successfully create history');
    }
}
