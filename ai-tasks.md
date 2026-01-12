# Phase 2: Core Academic Data Management (MVP)

## Phase Overview
Phase 2 focuses on managing the institution’s core academic data. This phase introduces faculty and subject records, which are essential for assigning teaching loads, tracking grading sheet submissions, and enforcing compliance in later phases.

---

## Objectives
- Store and manage faculty information
- Maintain accurate subject and course records
- Establish academic data required for assignment and tracking
- Prepare relationships for grading sheet monitoring

---

## Included Resources
- Faculty Management
- Subject Management

---

## 1. Faculty Management

### Descriptive Overview
Faculty Management maintains a centralized record of all teaching personnel. This module ensures that faculty members are properly categorized, assigned to departments, and available for subject assignment. Accurate faculty records are essential for reliable grading sheet tracking and compliance reporting.

### Technical Overview
- Implemented using a Filament `FacultyResource`
- Faculty records are linked to departments via a foreign key
- Employment type stored as an enumerated field
- Supports full CRUD operations

### Key Data Fields
- Full name
- Employment type (Full-Time / Part-Time)
- Department (foreign key reference)
- Contact information

### Technical Notes
- Department selection implemented using a relationship dropdown
- Enforce required fields for data integrity
- Index `department_id` for faster filtering and queries
- Future-ready for faculty status or rank expansion

---

## 2. Subject Management

### Descriptive Overview
Subject Management handles all course-related data offered by the institution. It allows the Registrar to maintain accurate subject details such as schedules and room assignments, which are later used to associate faculty and track grading submissions.

### Technical Overview
- Implemented using a Filament `SubjectResource`
- Independent CRUD module with no direct dependencies
- Supports use across multiple semesters

### Key Data Fields
- Course code
- Course title
- Room
- Schedule

### Technical Notes
- Enforce unique course codes to prevent duplication
- Schedule stored as text for MVP simplicity
- Can be expanded later to structured scheduling if needed

---

## Phase 2 Deliverables
- Faculty CRUD interface with department association
- Subject CRUD interface with complete course details
- Relational data ready for faculty–subject assignment

---

## Phase 2 Completion Criteria
- Faculty members can be created, updated, and deleted
- Faculty records are correctly linked to departments
- Subjects can be managed independently
- Data integrity enforced through foreign keys and validation

---

## Dependencies
- Completed Phase 1 (User & Department Management)
- Database relationships enabled

---

## Next Phase
**Phase 3: Faculty–Subject Assignment**
- Teaching load management
- Semester-based subject assignments
