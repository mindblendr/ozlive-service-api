<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	private $adminService;

	public function __construct()
	{
		$this->adminService = new AdminService();
	}

	public function login(Request $request)
	{
		return $this->adminService->login($request);
	}

	public function create(Request $request)
	{
		return $this->adminService->create($request);
	}

	public function me(Request $request)
	{
		return $this->adminService->me($request);
	}
}
