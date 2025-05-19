# Building Custom User Registration Flow in Laravel

A comprehensive guide and implementation of a secure user registration system in Laravel using middleware and custom email verification.



<p align="center">
<img src="https://miro.medium.com/v2/resize:fit:700/1*VePsYwjvm9aAaDa07od94g.png" alt="Login Page" />
</p>


## Overview

This project demonstrates how to implement a custom user registration flow in Laravel that:
- Secures the registration process using middleware
- Implements custom email verification
- Manages user registration status
- Handles token-based verification
- Provides a flexible and secure registration system

## Features

- Custom email verification system
- Token-based registration flow
- Middleware protection for registration routes
- Status tracking for registration process
- Configurable token expiration
- Comprehensive user information collection
- Transaction-safe database operations

## Prerequisites

- PHP 8.1 or higher
- Composer
- Laravel 10.x
- MySQL or another database system
- Mail server configuration

## Installation

1. Clone the repository:
```bash
git clone <your-repository-url>
cd <your-project-directory>
```

2. Install dependencies:
```bash
composer install
```

3. Configure your environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your mail settings in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

5. Run migrations:
```bash
php artisan migrate
```

## 👥 Author

For questions, suggestions, or collaboration:
- **Author**: Murilo Livorato
- **GitHub**: [murilolivorato](https://github.com/murilolivorato)
- **linkedIn**: https://www.linkedin.com/in/murilo-livorato-80985a4a/

## 📸 Screenshots

<p align="center">
  <strong>Receiving E-mail Confirmation</strong><br><br>
  <img src="https://miro.medium.com/v2/resize:fit:700/1*o5bk_DGsP99s0yfD6HT-JQ.png" alt="Laravel on Google Cloud Run" width="600"/><br>
</p>

<p align="center">
  <strong>Postman</strong><br><br>
  <img src="https://miro.medium.com/v2/resize:fit:700/1*FYR_oDkSFmTRbEjIFUhkMg.png" alt="Laravel on Google Cloud Run" width="600"/><br>
</p>


<div align="center">
  <h3>⭐ Star This Repository ⭐</h3>
  <p>Your support helps us improve and maintain this project!</p>
  <a href="https://github.com/murilolivorato/user-registration-with-two-step-with-email-notification/stargazers">
    <img src="https://img.shields.io/github/stars/murilolivorato/user-registration-with-two-step-with-email-notification?style=social" alt="GitHub Stars">
  </a>
</div>

