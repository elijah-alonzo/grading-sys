# Grading Sheet Monitoring System (MVP)

## Purpose
A web-based system designed to help the Registrar’s Office efficiently monitor, track, and evaluate faculty grading sheet submissions per semester, ensuring compliance with academic deadlines.

---

## User Roles

### Registrar Head (Admin)
- Full access to all system data, analytics, and reports
- Sets grading sheet submission deadlines
- Manages Registrar Officer accounts
- Reviews compliance and generates official summaries

### Registrar Officer (Staff)
- Encodes and updates grading sheet submission records
- Monitors and validates faculty submissions
- Views summaries to assist the Registrar Head

---

## Core Functionalities

### 1. Authentication and User Management
- Secure login using assigned user accounts
- Role-based access control
  - Registrar Head: full system access
  - Registrar Officer: limited access
- Registrar Head can:
  - Add, edit, and delete officer accounts
- Users can:
  - Update passwords
  - Manage basic profile information

---

### 2. Faculty and Subject Management
- Store and manage faculty information:
  - Full name
  - Employment type (Full-Time / Part-Time)
  - Department
  - Contact information
- Assign subjects to faculty with the following details:
  - Course code
  - Course title
  - Room
  - Schedule
  - Teaching load
- Allows updating and deleting of faculty and subject records
- Helps monitor faculty assignments and subject coverage per semester

---

### 3. Grading Sheet Tracking
- Records grading sheet submission status per faculty, subject, and semester
- Displays:
  - Subject details
  - Teacher name
  - Submission date
  - Submission status:
    - Submitted
    - Not Submitted
    - Late
- Organizes grading sheets by semester and subject for easy reference

---

### 4. Deadline and Compliance Monitoring
- Registrar Head sets submission deadlines per semester or subject
- System automatically compares submission dates with deadlines
- Submission status is categorized as:
  - Submitted on Time
  - Late Submission
  - Not Yet Submitted
- Enables quick identification of compliant and non-compliant faculty

---

### 5. Analytics Dashboard
- Provides visual summaries for monitoring performance
- Displays submission compliance rate:
  - Percentage submitted on time
  - Percentage submitted late
  - Percentage not yet submitted

---

## MVP Scope
This MVP focuses on essential features for grading sheet tracking, deadline monitoring, and compliance reporting to support the Registrar’s Office operations.
