A simple Laravel guest book application.  
There is a form to add new messages and a table displaying the messages.  
10 messages per page and they can be sorted by username and the time.  
I added the jenssegers/agent package to acquire user browser information.  
I added the biscolab/laravel-recaptcha package to use Google's recaptcha.  
Another package added is kyslik/column-sortable to make columns sortable in the messages table.  
The project is running on Laravel 8 and PHP 7.4.  
The template engine used ir Blade and TailwindCSS for css.
Messages use the Laravel eloquent model and are stored in the database. The messages have the following data:  
- username
- email
- URL (can be empty, is nullable)
- message text (up to 255 characters)
- user IP address
- user browser name and version

To use the application:
- clone this repository in the directory of your choice
- run composer install to install dependancies
- setup Tailwind CSS https://tailwindcss.com/docs/guides/laravel using this tutorial.
- add your site and secret keys from Google's recaptcha website https://developers.google.com/recaptcha/intro to the .env file (examples in .env.example in the bottom)
- setup your Database connection (MySQL) in the .env file and run **php artisan migrate** to create the database tables.
- to try the application out just type: **php artisan serv** in your terminal.
