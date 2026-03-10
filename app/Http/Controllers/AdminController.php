<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show admin dashboard - shows all active jobs
    public function dashboard()
    {
        // Get all active job posts
        $activeJobs = DB::table('job_posts')
            ->where('status', 'active')
            ->where('valid_until', '>=', now()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();
            
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
            
        // Get archived jobs count (includes rejected)
        $archivedCount = DB::table('job_archive')->count();
        
        // Get recent notifications - approved jobs (last 5)
        $approvedNotifications = DB::table('job_posts')
            ->where('status', 'active')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
            
        // Get recent notifications - rejected jobs (last 5)
        $rejectedNotifications = DB::table('job_archive')
            ->where('archived_reason', 'rejected_by_admin')
            ->orderBy('archived_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'activeJobs',
            'pendingJobs', 
            'activeJobsCount', 
            'pendingJobsCount', 
            'establishmentsCount', 
            'archivedCount',
            'approvedNotifications',
            'rejectedNotifications'
        ));
    }
    
    // Show pending jobs page
    public function pendingJobs()
    {
        // Get pending job posts
        $pendingJobs = DB::table('job_posts')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
            
        $pendingJobsCount = DB::table('job_posts')
            ->where('status', 'pending')
            ->count();
            
        $activeJobsCount = DB::table('job_posts')
            ->where('status', 'active')
            ->where('valid_until', '>=', now()->toDateString())
            ->count();
            
        $establishmentsCount = DB::table('establishments')->count();
        $archivedCount = DB::table('job_archive')->count();
        
        // Get notifications
        $approvedNotifications = DB::table('job_posts')
            ->where('status', 'active')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
            
        $rejectedNotifications = DB::table('job_archive')
            ->where('archived_reason', 'rejected_by_admin')
            ->orderBy('archived_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'pendingJobs',
            'activeJobs',
            'activeJobsCount', 
            'pendingJobsCount', 
            'establishmentsCount', 
            'archivedCount',
            'approvedNotifications',
            'rejectedNotifications'
        ));
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
            
            return redirect()->back()->with('success', 'Job approved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error approving job: ' . $e->getMessage());
        }
    }
    
    // Reject a job post - archive it and set status to 'rejected'
    public function rejectJob(Request $request, $id)
    {
        try {
            $job = DB::table('job_posts')->where('id', $id)->first();
            
            if (!$job) {
                return redirect()->back()->with('error', 'Job not found!');
            }
            
            // First, insert into archive table
            DB::table('job_archive')->insert([
                'original_job_id' => $job->id,
                'establishment_id' => $job->establishment_id,
                'position_title' => $job->position_title,
                'job_description' => $job->job_description,
                'nature_of_work' => $job->nature_of_work,
                'place_of_work' => $job->place_of_work,
                'salary' => $job->salary,
                'vacancy_count' => $job->vacancy_count,
                'education_level' => $job->education_level ?? null,
                'course' => $job->course ?? null,
                'work_experience' => $job->work_experience ?? null,
                'license_eligibility' => $job->license_eligibility ?? null,
                'certification' => $job->certification ?? null,
                'language_spoken' => $job->language_spoken ?? null,
                'other_qualifications' => $job->other_qualifications ?? null,
                'accepts_pwd' => $job->accepts_pwd ?? 0,
                'accepts_ofw' => $job->accepts_ofw ?? 0,
                'posting_date' => $job->posting_date,
                'valid_until' => $job->valid_until,
                'original_status' => 'rejected',
                'archived_reason' => 'rejected_by_admin',
                'archived_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Update the job status to rejected
            DB::table('job_posts')
                ->where('id', $id)
                ->update([
                    'status' => 'rejected',
                    'updated_at' => now()
                ]);
            
            return redirect()->back()->with('success', 'Job rejected and archived!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error rejecting job: ' . $e->getMessage());
        }
    }
}
