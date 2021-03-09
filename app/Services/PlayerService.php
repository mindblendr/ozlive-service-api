<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerService extends Service
{
	public function login(Request $request)
	{
		$credentials = $request->only(['username', 'password']);
		$token = auth('player')->attempt($credentials);
		if ($token) {
			return [
				'token' => $token,
				'status' => 1
			];
		} else {
			return ['status' => 0];
		}
	}

	public function create(Request $request)
	{
		Player::create([
			'username' => $request->username,
			'password' => Hash::make($request->password)
		]);
	}

	public function me()
	{
		$user = auth()->user();
		return response()->json(['user' => $user]);
	}
}
