## Laravel Project for Summer Training Course

This is a simple laravel project demonstrates very basic features of the laravel framework such as web routes, controllers, blade template engine, views, form validation, requests, responses, .etc.  

## How to Install

Please follow these steps to install the project:

1. Clone or download the source code.
    1. clone using the following command.
    
        ```console
        git clone https://github.com/sharif-alagha/summer-training.git       
        ```    
    2. or download using the following link, https://github.com/sharif-alagha/summer-training/archive/master.zip        
2. Install project dependencies by issuing the following command within project directory.
    ```console
    composer install  
    ```
3. make a copy of the ``` .env.example ``` file and rename it to ``` .env ``` and change the database connection parameters including the name of the database ``` DB_DATABASE ```.
 
4. run the following commands to generate an application key, and to create the users table from migrations.
    ```console
   php artisan key:generate
   php artisan migrate
    ```
   
**Please submit the required task to the following email [sagha@gov.ps](mailto:sagha@gov.ps), deadline is 17/8/2020.**          
