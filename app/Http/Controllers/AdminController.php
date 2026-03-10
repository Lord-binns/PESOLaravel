<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show admin dashboard
    public function dashboard()
    {
        // Get pending job posts (status = 'pending')
        $pendingJobs = DB::table('job_posts')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
            
        // Get active job posts count
        $activeJobsCount = DB::table('job_posts')
            ->where('status', 'active')
            ->where('valid_until', '>=', now()->toDateString())
            ->count();
            
        // Get pending job posts count
        $pendingJobsCount = DB::table('job_posts')
            ->where('status', 'pending')
            ->count();
            
        // Get total establishments count
        $establishmentsCount = DB::table('establishments')->count();
            
        // Get archived jobs count
        $archivedCount = DB::table('job_archive')->count();
        
        return view('admin.dashboard', compact('pendingJobs', 'activeJobsCount', 'pendingJobsCount', 'establishmentsCount', 'archivedCount'));
    }
    
    // Approve a job post
    public function approveJob($id)
    {
        try {
            $job = DB::table('job_posts')->where('id', $id)->first();
            
            if (!$job) {
                return redirect()->back()->with('error', 'Job not found!');
            }
            
            DB::table('job_posts')
                ->where('id', $id)
                ->update([
                    'status' => 'active',
                    'updated_at' => now()
                ]);
            
            return redirect()->route('dashboard')->with('success', 'Job approved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error approving job: ' . $e->getMessage());
        }
    }
    
    // Reject a job post
    public function rejectJob(Request $request, $id)
    {
        try {
            $job = DB::table('job_posts')->where('id', $id)->first();
            
            if (!$job) {
                return redirect()->back()->with('error', 'Job not found!');
            }
            
            DB::table('job_posts')
                ->where('id', $id)
                ->update([
                    'status' => 'rejected',
                    'updated_at' => now()
                ]);
            
            return redirect()->route('dashboard')->with('success', 'Job rejected!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error rejecting job: ' . $e->getMessage());
        }
    }
    
    // Show all job posts for management - redirect to dashboard
    public function manageJobs()
    {
        return redirect()->route('dashboard')->with('info', 'Job management is available on the dashboard.');
    }
    
    // Show pending jobs page - redirect to dashboard
    public function pendingJobs()
    {
        return redirect()->route('dashboard');
    }
    
    // View job details - redirect to dashboard
    public function viewJob($id)
    {
        return redirect()->route('dashboard');
    }
}
