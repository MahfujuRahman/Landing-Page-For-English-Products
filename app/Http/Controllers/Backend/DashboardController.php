<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

class DashboardController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return view("Backend.index");
    }
}
