<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

/**
 * This controller handles requests related to the admin dashboard.
 */
class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.dashboard.index');
    }
}
