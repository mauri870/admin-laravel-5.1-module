<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Offer;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\File;

/**
 * Class AdminController
 * @package Modules\Admin\Http\Controllers
 */
class AdminController extends Controller {

    /**
     * @var array
     */
    private $app;

    /**
     *
     */
    public function __construct(){
	}

    /**
     * @return $this
     */
    public function index()
	{
        $page_name = "Inicio";
		return view('admin::index')
            ->with('page_name',$page_name)
            ->with('user',Auth::user()->name);
	}
}