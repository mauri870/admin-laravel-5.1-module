<?php
namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use Prologue\Alerts\Facades\Alert;

class AdminController extends Controller {

	private $app;

	public function __construct(){
		$this->app = [
			'name'=> env('APP_NAME',null),
			'version'=> env('APP_VERSION',null)
		];
	}
	
	public function index()
	{
		return view('admin::index')->with('app',$this->app);
	}
	
}