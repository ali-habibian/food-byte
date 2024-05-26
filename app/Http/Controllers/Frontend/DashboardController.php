<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Retrieves the view for the frontend dashboard index.
     *
     * @return \Illuminate\Contracts\View\View The view for the frontend dashboard index.
     */
    public function index(): View
    {
        return view('frontend.dashboard.index');
    }
}
