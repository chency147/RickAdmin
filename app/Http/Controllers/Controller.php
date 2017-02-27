<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorHandler;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
	protected $errorHandler = null;
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * 构造方法
	 */
	public function __construct() {
		$this->errorHandler = ErrorHandler::getInstance();
	}
}
