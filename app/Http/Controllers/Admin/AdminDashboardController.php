<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;
// use App\Models\Transaction;
// use App\Models\Kapster;
// use App\Models\Service;
use App\Models\User;
use App\Models\Jobs\Job;

// use App\Models\TransactionLog;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class AdminDashboardController extends Controller
{
    public function index()
    {
        
        $userCount = User::count();
        $jobCount = Job::count();
        return view('admin.index',compact('userCount','jobCount'));
        
        
    }

}
