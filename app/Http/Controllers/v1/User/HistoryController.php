<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\v1\User\Song\SongRequest;
use App\Http\Services\v1\User\HistoryService;

class HistoryController extends ApiController
{
    public function index(HistoryService $historyService)
    {
        return $historyService->index($this->user());
    }

    public function create(SongRequest $request, HistoryService $historyService)
    {
        return $historyService->create($this->user(), $request->id);
    }
}
