# Mini twitter

In this project I created a mini representation of twitter using laravel.

## Instalation

1. You will need some sort of a database managing application(**MySQL Workbench recommended**).
1. Clone or download and extract the repository.
1. Import **schema** directoy into MySQL Workbench. In MySQL Workbench select **Server** -> **Data Import** -> Locate the **schema** directory in **root/database/** directory -> **Start Import**.
1. Open the terminal in the root directory and run **composer install** or **php composer.phar install** if you don't have it installed globally.
1. In terminal run **php artisan storage:link**. (_This isn't necessary, but if you want to play with the profile picture option, it will be_).
1. In the terminal run **php artisan serve**.

## Usage

1. Navigate to the local development server uri(specified in the terminal once you run _php artisan serve_) in your browser.
1. You will find a test account in **users.json**.
1. Log in and that's it!.
