<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $controllerName = "dashboard";
    public function index()
    {
        return view('admin.index');
    }
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }
}
?>