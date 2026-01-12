v# Updated Phase 3: Teaching Load & Grading Sheet Assignment (MVP)

## Phase Overview
Phase 3 has been revised to better reflect real academic structures. This phase introduces **Sections** and refines **Subjects** as curriculum-based courses. A new central resource, **Teaching Load**, is used to assign faculty members to specific subjects and sections. This resource also serves as the primary entry point for grading sheet submission tracking.

---

## Objectives
- Model real-world academic structure using sections and subjects
- Assign faculty members to subjects and sections per semester
- Centralize teaching load and grading sheet submissions into one resource
- Prepare a single source of truth for compliance and analytics

---

## Included Resources
- Section Management
- Subject Management (Curriculum-based)
- Teaching Load Management (Faculty–Subject–Section)

---

## 1. Section Management

### Descriptive Overview
Sections represent all official class sections offered by the school (e.g., BSIT 4A, BSCS 2B). Each section belongs to a department and is used to group students under a specific academic program and year level. Sections are later used to accurately associate grading sheets with the correct class group.

### Technical Overview
- Implemented using a Filament `SectionResource`
- Each section belongs to one department
- Used as a required foreign key in Teaching Load assignments

### Key Data Fields
- Section name
- Department (foreign key reference)

### Technical Notes
- Enforce unique section names per department
- Use relationship dropdowns for department selection
- Index `department_id` for filtering and performance

---

## 2. Subject Management (Curriculum-Based)

### Descriptive Overview
Subjects represent all courses defined in the institution’s curriculum. These are not tied to specific sections or faculty by default. Instead, they act as master records that can be reused across semesters, sections, and faculty assignments.

### Technical Overview
- Implemented using a Filament `SubjectResource`
- Independent CRUD resource
- Referenced by the Teaching Load resource

### Key Data Fields
- Course code
- Course title
- (Optional) Units / description

### Technical Notes
- Enforce unique course codes
- Keep subjects independent of sections for flexibility
- Future-ready for curriculum versioning

---

## 3. Teaching Load Management (Core Resource)

### Descriptive Overview
The Teaching Load resource is the core operational module of the system. It assigns a faculty member to teach a specific subject for a specific section during a given semester. This same resource is also where grading sheet submissions are recorded and monitored.

Each record represents a real-world teaching responsibility and acts as the single source of truth for compliance tracking.

### Technical Overview
- Implemented using a Filament `TeachingLoadResource`
- Acts as a junction between:
  - Faculty
  - Subject
  - Section
- Stores grading sheet file submission data directly
- Eliminates the need for a separate grading submission table

### Key Data Fields
- Faculty (foreign key reference)
- Subject (foreign key reference)
- Section (foreign key reference)
- Semester
- Teaching load
- Submission date (nullable)
- Submission status (`submitted`, `late`, `not_submitted`)

### Technical Notes
- Enforce unique combinations of:
  - Faculty
  - Subject
  - Section
  - Semester
- Submission status can be:
  - Manually set (MVP)
  - Automatically computed in later phases using deadlines
- Nullable submission date represents “Not Yet Submitted”
- Index all foreign keys for performance

---

## Phase 3 Deliverables
- Section CRUD interface linked to departments
- Subject CRUD interface representing curriculum courses
- Teaching Load CRUD interface with integrated grading submission tracking
- Centralized data model for assignments and compliance

---

## Phase 3 Completion Criteria
- Sections can be created and linked to departments
- Subjects exist independently as curriculum records
- Faculty can be assigned to subjects and sections per semester
- Grading sheet submission data is recorded through Teaching Load
- Duplicate teaching assignments are prevented

---

## Dependencies
- Completed Phase 2 (Faculty & Subject Foundations)
- Departments properly configured
- Faculty records finalized

---

## Next Phase
**Phase 4: Deadline & Compliance Monitoring**
- Submission deadlines per semester or subject
- Automated late and on-time detection
- Compliance summaries and analytics
