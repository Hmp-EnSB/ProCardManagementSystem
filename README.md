# ProCardManagementSystem

**Secure Professional Card Request Management System** — Developed during my internship at Ibn Tofail University (Pole of Digitalization).

A full-stack Laravel web platform that digitizes and streamlines the entire professional card application workflow for university staff and faculty. It replaces slow, paper-based processes with a modern, secure, and fully automated system.

![Status](https://img.shields.io/badge/status-complete-brightgreen) 
![Stack](https://img.shields.io/badge/stack-Laravel%20%7C%20PHP%20%7C%20MySQL-blue) 
![OAuth](https://img.shields.io/badge/auth-Google%20OAuth%202.0-success)

---

## Overview

The Professional Card Request Management System at Ibn Tofail University is a core digital transformation initiative. It eliminates manual administrative workflows by providing an end-to-end online platform for card applications — from submission and document upload to validation, real-time tracking, and secure card issuance.

Key highlights:
- Google OAuth 2.0 for secure, passwordless authentication
- Hierarchical role management (User / Admin)
- Tamper-resistant PDF generation for official cards and documents
- Real-time request status updates and notifications
- Clean separation between user and administrator interfaces

This project demonstrates production-grade security practices and institutional digitalization — perfectly aligned with my **Noesis** framework (AI + Cybersecurity + Human-centered systems).

---

## Features

- ✅ Secure Google OAuth 2.0 authentication
- ✅ Role-based access control (hierarchical permissions)
- ✅ Multi-step online application forms with file uploads
- ✅ Tamper-resistant PDF card generation
- ✅ Real-time request tracking dashboard
- ✅ Admin panel for validation and communication
- ✅ Responsive design for desktop and mobile

---

## Tech Stack

| Layer          | Technology                  |
|----------------|-----------------------------|
| Framework      | Laravel (PHP)               |
| Database       | MySQL                       |
| Authentication | Google OAuth 2.0            |
| PDF Generation | Laravel + tamper-resistant logic |
| Frontend       | Blade + Tailwind CSS        |

---

## Getting Started

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js (for frontend assets)

### Installation

```bash
git clone https://github.com/Hmp-EnSB/ProCardManagementSystem.git
cd ProCardManagementSystem

composer install
cp .env.example .env

# Configure your database and Google OAuth credentials in .env
php artisan key:generate
php artisan migrate
php artisan db:seed

php artisan serve