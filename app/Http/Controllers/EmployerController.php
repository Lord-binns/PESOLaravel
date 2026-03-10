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
            
        // Get expired/closed jobs for archive
        $archivedJobs = DB::table('job_posts')
            ->where(function($query) {
                $query->where('status', 'closed')
                      ->orWhere('status', 'expired')
                      ->orWhere('valid_until', '<', now()->toDateString());
            })
            ->orderBy('valid_until', 'desc')
            ->get();
        
        return view('employer.dashboard', compact('activeJobs', 'archivedJobs'));
    }
    
    // Archive a job post
    public function archiveJob($id)
    {
        try {
            DB::table('job_posts')
                ->where('id', $id)
                ->update([
                    'status' => 'closed',
                    'updated_at' => now()
                ]);
                
            return redirect()->route('employer.dashboard')->with('success', 'Job archived successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error archiving job: ' . $e->getMessage());
        }
    }
}
