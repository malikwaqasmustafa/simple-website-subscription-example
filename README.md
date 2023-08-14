# Subscription Platform Test Application

Welcome to the Subscription Platform Test Application! This is a simple application that demonstrates a subscription platform where users can subscribe to various websites and receive email notifications when new posts are published.

## Installation

Follow these steps to set up and run the application:

1. **Clone the Repository:**
   
   ```
   git clone https://github.com/your-username/subscription-platform.git
   cd subscription-platform
   ```

2. **Run Composer install for dependency installations:**
   ```
   Composer install
   ```
3. **Database Configuration:**
 
   Create a copy of the .env.example file and name it .env.
   Configure the database connection settings in the .env file.

5. **Migrate and Seed Database:**
   ```
   php artisan migrate
   ```

  Run seeds
   ```
   php artisan db:seed --class=WebsitesTableSeeder
   ```
   ```
   php artisan db:seed --class=SubscribersTableSeeder
   ```

5. **Usage**
   ```
   php artisan serve
   ```
**Access the API documentation:**

**Open your web browser and navigate to http://localhost/request-docs.**

The API documentation is generated using *OpenAPI 3.0, providing detailed information about the available endpoints and their usage.
