# Comment Widget

Hi there! This is the **Comment Widget** I built using Laravel, jQuery, and vanilla JavaScript.
There is a database table seed I created that will populate the `Comments` table with 5 rows of dummy data, if needed.

# Development Environment

I chose to use **[Laravel Homestead](https://laravel.com/docs/7.x/homestead)** as my development environment because I would be able to hit the ground running due to the  out-of-the-box features that were already installed in the environment such as **PHP**, **MySQL**, **Laravel**, and **Nginx**. 

## Code Editor

For this project, I used **Visual Studio Code**. I have previously used **PHPStorm** for PHP development but have found Visual Studio Code to be much more lightweight and have better support when developing in JavaScript because of the extensions available.

# Main Files

Here are the main Laravel files I worked with during this project:

- **Model** (*app\Comment.php*)
 - **View** (*resources\views\home.blade.php*)
 - **Controller** (*app\Http\Controllers\CommentController.php*)
 - **jQuery and JavaScript** (*public\js\comment-widget.js*)
 - **Routing** (*routes\web.php*)
 - **Database Migration** (*database\migrations\2020_03_11_190943_create_comments_table.php*)
 - **Database Seed** (*database\seeds\CommentsTableSeeder.php*)

# To Improve
There were a couple of things that I thought could be improved if given the chance to work on it again:
1. Better use of custom styling (maybe flexbox or grid) without relying on Bootstrap.
2. Formal testing (using a testing framework such as PHPUnit and Selenium).
3. More thorough research input validations and cleansing.
4. Make use of a front-end framework such as Vue or React.
