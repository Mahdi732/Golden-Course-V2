# Golden Course V2

A lightweight PHP MVC project for a course platform. Routing is handled through `Core`, controllers live in `app/controllers`, models in `app/models`, and views under `app/views`. Uses PostgreSQL via PDO and ships with Bootstrap-based front-end assets.

## Tech Stack
- PHP 8+ with PDO (PostgreSQL driver)
- Apache with `mod_rewrite`
- PostgreSQL
- Bootstrap (public/css/bootstrap.min.css) and custom styling (public/css/style.css)
- Vanilla JS helpers (public/js/main.js)

## Project Layout
```
app/
  config/config.php      # App + DB config
  controllers/           # Page and auth controllers
  libraries/             # Core, Controller base, Database wrapper
  models/                # Domain models (User, Admin)
  views/                 # Blade-free PHP views
public/
  index.php              # Front controller
  css/, js/, img/, lib/  # Static assets
.htaccess                # Routes root URL to public/
```

## Prerequisites
- PHP 8.x with `pdo_pgsql`
- PostgreSQL database
- Apache (or compatible) with `AllowOverride All` for `.htaccess`

## Configuration
Edit `app/config/config.php`:
- `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME` for your PostgreSQL instance.
- `URLROOT` for your base URL (defaults to `http://localhost/golden-course-mvc`).
- `SITENAME` for display purposes.

## Database
Create a database matching `DB_NAME` and add required tables (`users`, `courses`, `categories`, `enrollments`, etc.). Example minimum schema for auth:
```sql
CREATE TABLE users (
  user_id SERIAL PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password_hash TEXT NOT NULL,
  role VARCHAR(50) NOT NULL,
  is_active BOOLEAN DEFAULT TRUE
);
```

## Running Locally
1) Place the project in your web root (e.g., `htdocs/Golden-Course-V2`).
2) Ensure Apache `mod_rewrite` is enabled; `.htaccess` rewrites everything to `public/`.
3) Point your browser to `${URLROOT}` (default: `http://localhost/golden-course-mvc`).

## Key Flows
- Registration: handled via `UserController::RegisterEtudient` and `RegisterTeacher`, backed by `User::save` with duplicate-email checks and hashed passwords.
- Login: `UserController::loginWhitExistenceAccount` uses `User::login`, stores session data, and redirects to `Pages/index` on success.
- Admin stats: `Admin::getAllStatistique` aggregates courses, categories, enrollments, and top teachers for the admin view.

## Development Notes
- Sessions start in `app/load.php`; adjust session handling as needed.
- Routing is parsed in `Core`: URLs map to `/controller/method/param1/param2`.
- Keep model methods side-effect free (no redirects); controllers handle redirects and session messages.

## Troubleshooting
- 404s or plain text output: ensure `mod_rewrite` is on and `.htaccess` is honored.
- DB connection errors: verify `pdo_pgsql` is enabled and credentials in `config.php` are correct.
- Blank pages: check `error_log` for PHP errors; consider enabling display errors in your dev PHP ini.
