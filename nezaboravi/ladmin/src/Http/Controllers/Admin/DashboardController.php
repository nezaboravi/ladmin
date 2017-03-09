<?php

namespace Nezaboravi\Ladmin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController
 *
 * @package VBlog\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        dd('Dashoboard');
    	return view('admin::dashboard');
    }
}
