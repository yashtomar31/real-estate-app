# Real Estate API Project

## Project Overview

This project is a RESTful API for managing real estate properties. It allows users to list, create, show, update, and delete real estate properties. The project is built using Laravel, a PHP framework known for its elegant syntax and robust features.

### Why Laravel?

Laravel was chosen for this project due to its:

- Comprehensive ecosystem and a rich set of features.
- Strong ORM (Eloquent) which simplifies database interactions.
- MVC architecture which organizes the codebase efficiently.
- Built-in support for RESTful APIs.

## Features

- **List Properties**: Fetch a list of all properties with limited details (ID, name, type, city, and country).
- **Show Property**: View detailed information about a specific property.
- **Create Property**: Add a new property to the database.
- **Update Property**: Modify details of an existing property.
- **Delete Property**: Soft delete a property, making it unavailable in the general list but still stored in the database.

## Technology Stack

- **Backend**: Laravel (PHP)
- **Database**: MySQL
- **Testing**: PHPUnit for feature testing.

## Installation and Setup

1. **Clone the Repository**

   ```sh
   git clone https://github.com/your-username/real-estate-api.git
   cd real-estate-api

2. **Install Dependencies
**

   ```sh
   composer install

3. **Set Up Environment
**

   ```sh
   cp .env.example .env

4. **Generate Application Key
**

   ```sh
   php artisan key:generate

5. **Run Migrations
**

   ```sh
   php artisan migrate

6. **Seed the Database (Optional)
**

   ```sh
   php artisan db:seed

7. **Running the Project
  ** 
	```sh
   php artisan serve



