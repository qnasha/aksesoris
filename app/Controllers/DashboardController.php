<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/index'); // Pastikan ini sesuai dengan struktur folder
    }
}
