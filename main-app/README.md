<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Driver Payable Time Application

## Project Description

This project implements a system for calculating and displaying the time spent by drivers with passengers. The project includes a Laravel backend for data processing and an HTML, CSS, jQuery, and DataTables frontend for interactive data display.

## Installation and Setup

### Step 1: Clone the Repository

```bash
git clone https://github.com/your-repo/driver-payable-time.git
cd driver-payable-time
```
### Step 2: Backend Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=TripsTableSeeder
php artisan serve
```

### Usage

Open your browser and go to http://localhost:8000.
Click the Calculate Payable Time button to load and display the trips and drivers report.

### Functionality
> Trips Table: Displays all trips with the ability to search and sort by columns.

> Drivers Report Table: Displays driver IDs and time spent with passengers, with search and sort capabilities.

> Calculate Payable Time Button: Upon clicking, calculates the time spent by drivers with passengers, and the results are displayed in the respective table.

### Technologies
- Backend: Laravel
- Frontend: HTML, CSS, jQuery, DataTables
- Database: MySQL
- Styling: Bootstrap

### Tests
- Backend: [TripsTableSeederTest.php](tests%2FFeature%2FTripsTableSeederTest.php)
- Frontend: [main.spec.js](spec%2Fmain.spec.js)


## Example Data
The trips.csv file contains data about trips with columns:
- id: Trip identifier
- driver_id: Driver identifier
- pickup: Passenger pickup time
- dropoff: Passenger drop-off time

## Contacts
For questions or suggestions, please contact:
GitHub: https://github.com/ange120

## License
This project is licensed under the MIT License. See the LICENSE file for details.
