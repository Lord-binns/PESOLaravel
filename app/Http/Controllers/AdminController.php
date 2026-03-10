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
            
            return redirect()->route('admin.dashboard')->with('success', 'Job approved successfully!');
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
            
            return redirect()->route('admin.dashboard')->with('success', 'Job rejected!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error rejecting job: ' . $e->getMessage());
        }
    }
    
    // Show all job posts for management
    public function manageJobs()
    {
        $jobs = DB::table('job_posts')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.manage-jobs', compact('jobs'));
    }
    
    // Show pending jobs page
    public function pendingJobs()
    {
        $pendingJobs = DB::table('job_posts')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.pending-jobs', compact('pendingJobs'));
    }
    
    // View job details
    public function viewJob($id)
    {
        $job = DB::table('job_posts')
            ->where('id', $id)
            ->first();
            
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found!');
        }
        
        // Get establishment info
        $establishment = DB::table('establishments')
            ->where('id', $job->establishment_id)
            ->first();
        
        return view('admin.view-job', compact('job', 'establishment'));
    }
}
