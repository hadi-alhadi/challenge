<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Project Name

This is a PHP project that:
1. Provides a command-line tool for converting a CSV file to a JSON file. The tool reads the CSV file and writes the data to a JSON file in the same directory as the CSV file. The CSV file should have a header row with column names (id,name, image, discount_percentage). 
2. provides an API for managing discounts. The project uses Laravel as the main framework and PHPUnit for testing.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 8.3
- Composer
- Docker

### Installation

1. Clone the repository
```bash
git clone https://github.com/hadi-alhadi/project-name.git
```
2. Navigate to the project directory
```bash
cd project-name
```
3. Install PHP dependencies
```bash
composer install
```
4. Build and run the Docker container
```bash
docker build -t project-name .
docker run -p 9000:9000 project-name
```

### Usage
The project provides an API endpoint for fetching and filtering discounts. The discounts data is stored in a JSON file.

- Convert a CSV file to a JSON file: 
```bash
php artisan convert:csv-to-json {file}
```
- Fetch all discounts: GET /api/discounts 
- Filter discounts by name: GET /api/discounts?name={name} 
- Filter discounts by discount percentage: GET /api/discounts?discount_percentage={percentage}

### Running the tests
The project uses PHPUnit for testing. To run the tests, use the following command:
```bash
php artisan test
```

### Built With
- [PHP](https://www.php.net) - The programming language used
- [Laravel](https://laravel.com) - The PHP framework used
- [PHPUnit](https://phpunit.de) - Testing framework for PHP

### Authors
Hadi Alhadi - Initial work - [hadi-alhadi](https://github.com/hadi-alhadi)


## License
This project is licensed under the MIT License - see the [LICENSE.md](https://choosealicense.com/licenses/mit/) file for details

