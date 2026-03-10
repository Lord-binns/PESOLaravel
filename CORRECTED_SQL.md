# Corrected SQL for Job Archive Insert

## The Problem with Your Original SQL

Your original SQL had several issues:
1. Missing required field `establishment_id` 
2. Missing required field `original_job_id`
3. Missing required field `original_status`
4. Missing required field `archived_reason`
5. Missing required field `archived_at`
6. Syntax error with empty values: `, ,`

## Corrected SQL Statement

```
sql
INSERT INTO job_archive (
    original_job_id,
    establishment_id,
    position_title,
    job_description,
    nature_of_work,
    place_of_work,
    salary,
    vacancy_count,
    education_level,
    course,
    work_experience,
    license_eligibility,
    certification,
    language_spoken,
    other_qualifications,
    accepts_pwd,
    accepts_ofw,
    posting_date,
    valid_until,
    original_status,
    archived_reason,
    archived_at,
    created_at,
    updated_at
) VALUES (
    NULL,
    1,
    'Software Developer',
    'Responsible for developing and maintaining web applications.',
    'permanent',
    'Manolo Fortich, Bukidnon',
    '25000',
    3,
    'Bachelor''s Degree',
    'Information Technology / Computer Science',
    '1-2 years experience in web development',
    'None required',
    'Programming Certificate',
    'English, Filipino',
    'Knowledge in Laravel, MySQL, and Git',
    1,
    1,
    '2026-03-10',
    '2026-04-10',
    'active',
    'manual',
    NOW(),
    NOW(),
    NOW()
);
```

## Important Notes

1. **establishment_id must exist**: The `establishment_id` (set to 1 in this example) MUST exist in your `establishments` table. If you don't have an establishment yet, you need to create one first:

```
sql
-- First create an establishment if none exists
INSERT INTO establishments (
    business_name, 
    trade_name, 
    tin, 
    employer_type, 
    workforce_size, 
    owner_name, 
    contact_person, 
    contact_position, 
    mobile, 
    email
) VALUES (
    'Your Company Name',
    'Trade Name',
    '123-456-789',
    'private',
    'small',
    'Owner Name',
    'Contact Person',
    'HR Manager',
    '09123456789',
    'email@company.com'
);
```

2. **nature_of_work must be valid**: Must be one of: `permanent`, `contractual`, `project`, `internship`, `parttime`, `workfromhome`

3. **Run this to fix existing data**: If you already have bad data in the archive table, you can fix it with:

```
sql
-- Fix missing establishment_id (assuming establishment ID 1 exists)
UPDATE job_archive SET establishment_id = 1 WHERE establishment_id IS NULL OR establishment_id = 0;

-- Fix missing original_job_id
UPDATE job_archive SET original_job_id = NULL WHERE original_job_id IS NULL;

-- Fix missing original_status
UPDATE job_archive SET original_status = 'active' WHERE original_status IS NULL OR original_status = '';

-- Fix missing archived_reason
UPDATE job_archive SET archived_reason = 'manual' WHERE archived_reason IS NULL OR archived_reason = '';

-- Fix missing archived_at
UPDATE job_archive SET archived_at = NOW() WHERE archived_at IS NULL;

-- Fix invalid nature_of_work values
UPDATE job_archive 
SET nature_of_work = 'contractual' 
WHERE nature_of_work NOT IN ('permanent', 'contractual', 'project', 'internship', 'parttime', 'workfromhome');
```

## After Fixing - Restore Should Work

Once your archive data is correct, the restore function will:
1. Validate the establishment exists
2. Check all required fields are present
3. Handle missing optional fields with defaults
4. Restore the job to active status
5. Remove it from the archive
