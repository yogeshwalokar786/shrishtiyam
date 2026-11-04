# NovaAdmin – Laravel 12 Enterprise Admin Portal

This application is built with **Laravel 12**, **MySQL (XAMPP / phpMyAdmin)**, and a **Vanilla CSS design system**.

---

## 1. Quick Access & Credentials

- **Server URL**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
- **Login URL**: [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)
- **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin) (Database: **`new_db`**)

### Default Admin Credentials:
| Field | Value |
| :--- | :--- |
| **Email** | `admin@admin.com` |
| **Password** | `admin123` |

- **Theme**: **Light Theme Only** (Crisp pure white surfaces, slate accents, subtle borders, high contrast typography)

---

## 2. Implemented Features

### 🔐 Authentication System
- **Login Screen**: Glassmorphic dark card, password visibility toggle (show/hide), demo auto-fill button, and rate-limiting protection.
- **Session Management**: Session regeneration, remember-me token handling, and secure logout.

### 📊 Admin Dashboard (`/admin/dashboard`)
- **Welcome Banner**: Dynamic greeting with admin name and active MySQL database indicator.
- **KPI Summary Cards**:
  - Registered Accounts (dynamic live user count from MySQL)
  - Database Engine (`MySQL 3306` on `new_db`)
  - System Reliability (Uptime metrics)
  - Framework Stack (Laravel 12 & PHP 8.2)
- **Interactive SVG Vector Chart**: Weekly throughput/traffic spline curve with ambient glow.
- **System Activity Feed**: Timeline of migrations, database events, and security audits.
- **Live Users Management Table**: Lists registered users directly from MySQL with role and verification badges.
- **Quick Action Cards**: Shortcuts for Changing Password and opening phpMyAdmin.

### 📁 Media Manager (`/admin/media`)
- **Asset Handling**: Manage Photos (JPG, PNG, WEBP, GIF, SVG), Videos (MP4, WEBM, MOV), and Documents (PDF, DOCX, XLSX, TXT, ZIP).
- **Drag & Drop Upload**: Upload single or multiple files with client-side chip previews and up to 50MB per file support.
- **Filtering & Search**: Instant category filter tabs (*All Assets*, *Photos*, *Videos*, *Documents*) with live counts and real-time name searching.
- **Interactive Preview Modal**: Full-size image viewer, HTML5 video player, direct asset URL copy-to-clipboard, and download actions.
- **Storage Metrics**: Live metrics tracking total storage used and asset counts by media category.

### 👤 Admin Profile Management (`/admin/profile`)
- **Profile Details Form**: Edit Full Name, Email Address (with unique email validation), Phone Number, Designation / Role Title, and Professional Bio.
- **Profile Overview Card**: Dynamic user avatar with initials, role badge, email verification status, and database record metadata (`ID`, `created_at`, `updated_at`).
- **Seamless Navigation**: Accessible from both the Sidebar navigation ("Admin Profile") and the Top Nav user dropdown ("Edit Profile").

### 🛡️ Security / Change Password (`/admin/change-password`)
- **Current Password Validation**: Validates existing password against MySQL database hash.
- **Real-Time Password Strength Meter**: Checks length (min 8), uppercase, numbers, and special characters.
- **Password Confirmation Matcher**: Instant visual feedback if confirmation matches.
- **Security Best Practices Card**: Corporate security checklist and Bcrypt encryption details.

### 📐 Layout & 100% Responsiveness ("All Screen Width Sized")
- **Sidebar**:
  - Collapsible slide-over drawer on mobile (< 768px) with backdrop overlay and ESC key closing.
  - Fixed sleek sidebar on desktop and tablets.
  - Active route highlighting and live status pills.
- **Top Navigation**:
  - Mobile hamburger toggle button.
  - Dynamic breadcrumbs.
  - Search input with keyboard shortcut hint (`⌘K`).
  - Notifications bell indicator.
  - User profile button with dropdown menu (Dashboard, Change Password, Logout).
- **Footer**:
  - Live pulsing MySQL health beacon.
  - Framework & PHP version pills.
  - Direct link to phpMyAdmin.

---

## 3. Running the Server

Make sure **MySQL** is running in your **XAMPP Control Panel**, then run:

```powershell
php artisan serve
```

Run test suite:
```powershell
php artisan test --filter=AdminAuthTest
```
