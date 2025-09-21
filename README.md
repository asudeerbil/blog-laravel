# Blog (Laravel)

This is a **scalable and customizable Blog application** built with the **Laravel framework**.  
It is designed to demonstrate how to build a clean, maintainable content management system using **MVC architecture**, **Eloquent ORM**, and **Blade templates**.  
The application provides a **modern responsive user interface** powered by **Tailwind CSS** and follows Laravel’s best practices for routing, validation, and middleware.  


---

## Features

- **Post Management (CRUD)**  
  - Create, read, update, and delete blog posts with validation rules.  
  - Automatic slug generation for SEO-friendly URLs.  
- **Categories & Tags (Optional)**  
  - Organize posts into categories and add tags for easier navigation.
- **Comments & Questions**  
  - Visitors can leave comments or questions on posts.  
  - **Automatic email notifications sent to admin’s email** when a new comment/question is submitted.    
- **Search & Filtering**  
  - Search by post title or content, filter by category or tag.  
- **Pagination**  
  - Paginated post lists for performance and better UX.  
- **Authentication & Authorization (Optional)**  
  - Secure login system using Laravel Breeze or Sanctum.  
  - Role-based access control (admin, editor, user).  
- **Image Upload & Storage (Optional)**  
  - Upload post images with `storage:link` support.  
  - Serve optimized and organized images from the `storage` directory.  
- **Reusable Blade Templates**  
  - Master layout, partials (header, footer, navbar), and reusable components.  
- **Responsive Design**  
  - Tailwind CSS for mobile-first, cross-browser layouts.  
- **Validation & Middleware**  
  - Server-side request validation and middleware for secure access.  
- **Deployment-Ready**  
  - Environment-based configuration with `.env`.  
  - Compatible with MySQL, SQLite, or other relational databases.  

---

## Technologies Used

- **Backend Framework**: [Laravel](https://laravel.com/) – Routing, Controllers, Middleware, Validation, Config Management  
- **Templating Engine**: [Blade](https://laravel.com/docs/blade) – Layouts, Sections, Partials, Reusable Components  
- **ORM / Database Layer**: [Eloquent ORM](https://laravel.com/docs/eloquent) – Models, Relationships, Query Builder, Pagination
- **Mail System** — Laravel’s Mail API to send notifications to admin for comments/questions    
- **Styling**: [Tailwind CSS](https://tailwindcss.com/) – Utility-first responsive design, custom configs in `tailwind.config.js`  
- **Build Tools**: [Vite](https://vitejs.dev/) + npm – Asset bundling, hot reload, production builds  
- **Database**: MySQL / SQLite – with Migrations & Seeders for schema and sample data  
- **Dependency Managers**: Composer (PHP), npm (Frontend)  
- **Version Control**: Git & GitHub – Versioning, project tracking, collaboration  
- **Testing (Optional)**: PHPUnit for feature & unit testing of routes and models  

---
