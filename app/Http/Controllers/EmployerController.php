<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    // Show post job form
    public function showPostJob()
    {
        return view('employer.post-job');
    }
    
    // Store job post
    public function storeJobPost(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'tin' => 'required|string|max:50',
            'employer_type' => 'required|in:public,private',
            'workforce_size' => 'required|in:micro,small,medium,large',
            'position_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'nature_of_work' => 'required|in:permanent,contractual,project,internship,parttime,workfromhome',
            'place_of_work' => 'required|string|max:255',
            'salary' => 'required|string|max:100',
            'vacancy_count' => 'required|integer|min:1',
            'posting_date' => 'required|date',
            'valid_until' => 'required|date|after:posting_date',
        ]);
        
        try {
            // First, create or get establishment
            $establishmentId = DB::table('establishments')->insertGetId([
                'business_name' => $request->business_name,
                'trade_name' => $request->trade_name,
                'acronym' => $request->acronym,
                'establishment_type' => $request->establishment_type ?? 'main',
                'tin' => $request->tin,
                'employer_type' => $request->employer_type,
                'is_national_gov' => $request->is_national_gov ?? 0,
                'is_lgu' => $request->is_lgu ?? 0,
                'is_gocc' => $request->is_gocc ?? 0,
                'is_suc' => $request->is_suc ?? 0,
                'is_direct_hire' => $request->is_direct_hire ?? 0,
                'is_local_recruit' => $request->is_local_recruit ?? 0,
                'is_overseas_recruit' => $request->is_overseas_recruit ?? 0,
                'is_do174' => $request->is_do174 ?? 0,
                'workforce_size' => $request->workforce_size,
                'line_of_business' => $request->line_of_business,
                'street' => $request->street,
                'barangay' => $request->barangay,
                'municipality' => $request->municipality,
                'province' => $request->province,
                'owner_name' => $request->owner_name ?? '',
                'contact_person' => $request->contact_person,
                'contact_position' => $request->contact_position,
                'telephone' => $request->telephone,
                'mobile' => $request->mobile,
                'fax' => $request->fax,
                'email' => $request->email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Create job post
            DB::table('job_posts')->insert([
                'establishment_id' => $establishmentId,
                'position_title' => $request->position_title,
                'job_description' => $request->job_description,
                'nature_of_work' => $request->nature_of_work,
                'place_of_work' => $request->place_of_work,
                'salary' => $request->salary,
                'vacancy_count' => $request->vacancy_count,
                'education_level' => $request->education_level,
                'course' => $request->course,
                'work_experience' => $request->work_experience,
                'license_eligibility' => $request->license_eligibility,
                'certification' => $request->certification,
                'language_spoken' => $request->language_spoken,
                'other_qualifications' => $request->other_qualifications,
                'accepts_pwd' => $request->accepts_pwd ?? 0,
                'accepts_ofw' => $request->accepts_ofw ?? 0,
                'posting_date' => $request->posting_date,
                'valid_until' => $request->valid_until,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return redirect()->route('employer.dashboard')->with('success', 'Job posted successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error posting job: ' . $e->getMessage())->withInput();
        }
    }
    
    // Show dashboard with job posts
    public function dashboard()
    {
        // Get active job posts
        $activeJobs = DB::table('job_posts')
            ->where('status', 'active')
            ->where('valid_until', '>=', now()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();
            
        // Get archived jobs (for display on dashboard)
        $archivedJobs = DB::table('job_archive')
            ->orderBy('archived_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get archived jobs count
        $archivedCount = DB::table('job_archive')->count();
        
        return view('employer.dashboard', compact('activeJobs', 'archivedJobs', 'archivedCount'));
    }
    
    // Show archive page
    public function showArchive()
    {
        // Get archived jobs from archive table
        $archivedJobs = DB::table('job_archive')
            ->orderBy('archived_at', 'desc')
            ->get();
        
        return view('employer.archive', compact('archivedJobs'));
    }
    
    // Archive a job post (move to archive table and delete from job_posts)
    public function archiveJob($id)
    {
        try {
            // Get the job post first
            $job = DB::table('job_posts')->where('id', $id)->first();
            
            if (!$job) {
                return redirect()->back()->with('error', 'Job not found!');
            }
            
            // Insert into archive table
            DB::table('job_archive')->insert([
                'original_job_id' => $job->id,
                'establishment_id' => $job->establishment_id,
                'position_title' => $job->position_title,
                'job_description' => $job->job_description,
                'nature_of_work' => $job->nature_of_work,
                'place_of_work' => $job->place_of_work,
                'salary' => $job->salary,
                'vacancy_count' => $job->vacancy_count,
                'education_level' => $job->education_level,
                'course' => $job->course,
                'work_experience' => $job->work_experience,
                'license_eligibility' => $job->license_eligibility,
                'certification' => $job->certification,
                'language_spoken' => $job->language_spoken,
                'other_qualifications' => $job->other_qualifications,
                'accepts_pwd' => $job->accepts_pwd,
                'accepts_ofw' => $job->accepts_ofw,
                'posting_date' => $job->posting_date,
                'valid_until' => $job->valid_until,
                'original_status' => $job->status,
                'archived_reason' => 'manual',
                'archived_at' => now(),
            ]);
            
            // Delete from job_posts table
            DB::table('job_posts')->where('id', $id)->delete();
                
            return redirect()->route('employer.archive')->with('success', 'Job archived successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error archiving job: ' . $e->getMessage());
        }
    }
    
    // Restore a job from archive
    public function restoreJob($id)
    {
        try {
            // Get the archived job
            $archivedJob = DB::table('job_archive')->where('id', $id)->first();
            
            if (!$archivedJob) {
                return redirect()->back()->with('error', 'Archived job not found!');
            }
            
            // Restore to job_posts table
            DB::table('job_posts')->insert([
                'establishment_id' => $archivedJob->establishment_id,
                'position_title' => $archivedJob->position_title,
                'job_description' => $archivedJob->job_description,
                'nature_of_work' => $archivedJob->nature_of_work,
                'place_of_work' => $archivedJob->place_of_work,
                'salary' => $archivedJob->salary,
                'vacancy_count' => $archivedJob->vacancy_count,
                'education_level' => $archivedJob->education_level,
                'course' => $archivedJob->course,
                'work_experience' => $archivedJob->work_experience,
                'license_eligibility' => $archivedJob->license_eligibility,
                'certification' => $archivedJob->certification,
                'language_spoken' => $archivedJob->language_spoken,
                'other_qualifications' => $archivedJob->other_qualifications,
                'accepts_pwd' => $archivedJob->accepts_pwd,
                'accepts_ofw' => $archivedJob->accepts_ofw,
                'posting_date' => $archivedJob->posting_date,
                'valid_until' => $archivedJob->valid_until,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Delete from archive table
            DB::table('job_archive')->where('id', $id)->delete();
                
            return redirect()->route('employer.archive')->with('success', 'Job restored successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error restoring job: ' . $e->getMessage());
        }
    }
    
    // Permanently delete a job from archive
    public function deleteArchivedJob($id)
    {
        try {
            DB::table('job_archive')->where('id', $id)->delete();
            return redirect()->route('employer.archive')->with('success', 'Job permanently deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting job: ' . $e->getMessage());
        }
    }
}
