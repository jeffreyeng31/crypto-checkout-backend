
# Crypto Checkout Backend

## Overview

This project implements a lightweight crypto checkout backend using CodeIgniter 3.x, including asynchronous webhook handling with a job queue.

## How to Run the Project

1. **Setup LAMP stack:**
The following requirement:
   - Linux
   - Apache 2.4
   - MySQL 8.0 /MariaDB 10.4
   - PHP 7.4
3.  **Clone the Repository:**
```
git clone <repository-url>
cd crypto-checkout-backend
```
4. **Setup CodeIgniter:**
Configure `application/config/config.php` with your local development environment. Line 26 `$config['base_url'] = '';`

5. **Configure Database:**
Update the database configuration in `application/config/database.php` with your database credentials.

6. **Create Database Tables:**
Run the provided SQL scripts to create the `transactions` and `jobs` tables.

7. **Run the Application:**
Start your web server (like Apache) and navigate to the application URL.

8. **Set Up Cron Job:**
Schedule the job processor to run every minute:
```
* * * * * php /path/to/your/app/index.php jobprocessor/process
```
## Assumptions Made

- The incoming webhook payload structure is predefined and consistent.
- The application is running in a suitable environment with PHP and necessary extensions installed.

## Future Improvements

If given more time, I would consider implementing the following enhancements:

- **Error Handling:** Improve error handling with detailed logs for failed transactions and webhook processing.
- **Signature Verification with JWT:** Add verification of webhook signatures using JSON Web Tokens (JWT) to ensure authenticity and prevent spoofing.
- **Retries for Failed Jobs:** Implement a retry mechanism for jobs that fail to process, perhaps with exponential backoff.
- **Dashboard for Monitoring:** Create a dashboard to monitor transaction statuses, job processing metrics, and errors.
- **Configurable Settings:** Allow configuration of webhook URLs and other settings through a configuration file.
- **CORS Setup for Security:** Implement Cross-Origin Resource Sharing (CORS) to enhance security by controlling which domains can access the API, thereby preventing unauthorized requests.
