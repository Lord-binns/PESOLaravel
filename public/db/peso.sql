-- PESO Manolo Fortich Database Schema
-- Job Post Registration Tables

-- Establishments Table
CREATE TABLE IF NOT EXISTS establishments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_name VARCHAR(255) NOT NULL,
    trade_name VARCHAR(255),
    acronym VARCHAR(50),
    establishment_type ENUM('main', 'branch') DEFAULT 'main',
    tin VARCHAR(50) NOT NULL,
    employer_type ENUM('public', 'private') NOT NULL,
    is_national_gov TINYINT(1) DEFAULT 0,
    is_lgu TINYINT(1) DEFAULT 0,
    is_gocc TINYINT(1) DEFAULT 0,
    is_suc TINYINT(1) DEFAULT 0,
    is_direct_hire TINYINT(1) DEFAULT 0,
    is_local_recruit TINYINT(1) DEFAULT 0,
    is_overseas_recruit TINYINT(1) DEFAULT 0,
    is_do174 TINYINT(1) DEFAULT 0,
    workforce_size ENUM('micro', 'small', 'medium', 'large') NOT NULL,
    line_of_business VARCHAR(255),
    street VARCHAR(255),
    barangay VARCHAR(100),
    municipality VARCHAR(100),
    province VARCHAR(100),
    owner_name VARCHAR(255) NOT NULL,
    contact_person VARCHAR(255) NOT NULL,
    contact_position VARCHAR(100) NOT NULL,
    telephone VARCHAR(50),
    mobile VARCHAR(50) NOT NULL,
    fax VARCHAR(50),
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Job Posts Table
CREATE TABLE IF NOT EXISTS job_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    establishment_id INT NOT NULL,
    position_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    nature_of_work ENUM('permanent', 'contractual', 'project', 'internship', 'parttime', 'workfromhome') NOT NULL,
    place_of_work VARCHAR(255) NOT NULL,
    salary VARCHAR(100) NOT NULL,
    vacancy_count INT NOT NULL DEFAULT 1,
    education_level VARCHAR(100),
    course VARCHAR(255),
    work_experience VARCHAR(100),
    license_eligibility VARCHAR(255),
    certification VARCHAR(255),
    language_spoken VARCHAR(255),
    other_qualifications TEXT,
    accepts_pwd TINYINT(1) DEFAULT 0,
    pwd_types TEXT,
    accepts_ofw TINYINT(1) DEFAULT 0,
    posting_date DATE NOT NULL,
    valid_until DATE NOT NULL,
    status ENUM('pending', 'active', 'closed', 'expired') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (establishment_id) REFERENCES establishments(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Job Applicants Table
CREATE TABLE IF NOT EXISTS job_applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_post_id INT NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100),
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    address TEXT,
    education TEXT,
    work_experience TEXT,
    skills TEXT,
    resume_path VARCHAR(255),
    status ENUM('pending', 'screening', 'interview', 'hired', 'rejected') DEFAULT 'pending',
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (job_post_id) REFERENCES job_posts(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Interview Schedule Table
CREATE TABLE IF NOT EXISTS interviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_id INT NOT NULL,
    scheduled_date DATE NOT NULL,
    scheduled_time TIME NOT NULL,
    location VARCHAR(255),
    interview_type ENUM('phone', 'video', 'face_to_face') DEFAULT 'face_to_face',
    status ENUM('scheduled', 'completed', 'cancelled', 'no_show') DEFAULT 'scheduled',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (applicant_id) REFERENCES job_applicants(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample establishment data
INSERT INTO establishments (business_name, trade_name, acronym, establishment_type, tin, employer_type, workforce_size, owner_name, contact_person, contact_position, mobile, email) VALUES
('PESO Manolo Fortich', 'Public Employment Service Office', 'PESO', 'main', '123-456-789', 'public', 'medium', 'John Doe', 'Jane Smith', 'Manager', '09123456789', 'peso@manolofortich.gov.ph');

-- Insert sample job post data
INSERT INTO job_posts (establishment_id, position_title, job_description, nature_of_work, place_of_work, salary, vacancy_count, education_level, posting_date, valid_until, status) VALUES
(1, 'Senior Software Developer', 'We are looking for an experienced software developer to join our team.', 'permanent', 'Manolo Fortich, Bukidnon', '₱45,000 - ₱60,000', 2, 'College Graduate', '2025-01-10', '2025-02-10', 'active'),
(1, 'Graphic Designer', 'Create stunning visual designs for our organization.', 'permanent', 'Manolo Fortich, Bukidnon', '₱25,000 - ₱35,000', 1, 'College Graduate', '2025-01-12', '2025-02-12', 'active');
