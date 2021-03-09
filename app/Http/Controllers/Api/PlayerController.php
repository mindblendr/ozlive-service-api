<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
	private $playerService;

	public function __construct()
	{
		$this->playerService = new PlayerService();
	}

	public function login(Request $request)
	{
		return $this->playerService->login($request);
	}

	public function create(Request $request)
	{
		return $this->playerService->create($request);
	}

	public function me(Request $request)
	{
		return $this->playerService->me($request);
	}
}
