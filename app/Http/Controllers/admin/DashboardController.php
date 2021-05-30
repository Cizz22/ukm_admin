<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){

        $latest = ModelsRequest::latest()->get();

        $data = [
            'request_success' => ModelsRequest::where('status','selesai')->count(),
            'request_reject' => ModelsRequest::where('status','ditolak')->count(),
            'request_pending' => ModelsRequest::where('status','pending')->count(),
            'request_total' => ModelsRequest::count(),
            'latest' => $latest
        ];

        return view('admin.dashboard', $data);
    }
}
