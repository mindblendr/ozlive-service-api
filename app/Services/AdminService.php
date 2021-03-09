<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminService extends Service
{
	public function login(Request $request)
	{
		$credentials = $request->only(['username', 'password']);
		$token = auth('admin')->attempt($credentials);
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
		Admin::create([
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
