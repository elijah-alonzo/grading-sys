# Phase 1: Foundation Setup (MVP)

## Phase Overview
Phase 1 focuses on establishing the core foundation of the system. This phase includes user authentication, role-based access, and basic reference data. These features are simple to implement, have minimal dependencies, and are required for all succeeding phases.

---

## Objectives
- Enable secure system access
- Define user roles and permissions
- Establish base reference data for academic structure
- Prepare the system for relational data in later phases

---

## Included Resources
- User Management
- Department Management

---

## 1. User Management

### Descriptive Overview
User Management allows the Registrar’s Office to control who can access the system and what actions they are allowed to perform. The Registrar Head has full administrative control, while Registrar Officers have limited access based on their role. This ensures security, accountability, and proper segregation of duties.

### Technical Overview
- Uses Laravel’s built-in authentication system
- Role-based access control implemented via a `role` field in the `users` table
- Only the Registrar Head can create, edit, or delete user accounts
- Registrar Officers can only access assigned modules
- Password hashing handled by Laravel
- Filament `UserResource` used for CRUD operations

### Key Data Fields
- Name
- Email
- Password
- Role (`head`, `officer`)

### Technical Notes
- Authorization enforced using Filament policies or `canViewAny()` methods
- Default Filament authentication guards are sufficient for MVP
- Future-ready for expansion to role-permission packages if needed

---

## 2. Department Management

### Descriptive Overview
Department Management centralizes academic departments within the institution. This ensures consistency in faculty assignment, simplifies filtering and reporting, and prevents data duplication. Departments serve as a foundational reference for faculty records.

### Technical Overview
- Standalone CRUD module with no dependencies
- Managed through a Filament `DepartmentResource`
- Departments are referenced via foreign keys in the faculty table
- Supports future extensions such as department heads or codes

### Key Data Fields
- Department name

### Technical Notes
- Enforce unique department names to avoid duplication
- Use select dropdowns when assigning departments to faculty
- Index `department_id` for performance

---

## Phase 1 Deliverables
- Fully functional login and authentication system
- Role-based user access implemented
- Department CRUD interface available in admin panel
- Foundation prepared for Faculty and Subject resources

---

## Phase 1 Completion Criteria
- Users can log in based on assigned roles
- Registrar Head can manage user accounts
- Departments can be created, updated, and deleted
- Department data is available for relational use in Phase 2

---

## Dependencies
- Laravel framework
- Filament Admin Panel
- MySQL or PostgreSQL database

---

## Next Phase
**Phase 2: Core Academic Data Management**
- Faculty Management
- Subject Management
