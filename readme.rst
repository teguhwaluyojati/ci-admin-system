###################
About This Website
###################

This is a website intended for admin activities. Can set the user level, manage menu access, and have full control over existing data.

*******************
Required Software
*******************
- MySQL.
- Text Editor.
- Web Server (XAMPP, Laragon, others)*I'm using laragon.
- Browser.
- PHP 5.6 or newer.

**************************
How to Running This Program?
**************************

- Download or Clone this repository.
- Prepare your database, then import the db.sql file into the database you have created.
- Open the code using a text editor. Enter the application/config/config.php folder. Then in $config['base_url'], adjust it to your localhost address, for example 'http://localhost/ci-admin-system/';
- Open the database.php folder, then adjust it to your database (username, password, database name).
- Congratulations, the application can be run in your browser.

********
IMPORTANT
********
For activate register and forgot password, you need to configuring smtp user and password.
You can check my video how to configuring smtp : https://youtu.be/iuy2YUcGiGQ

****
Note
****

You need to reset code code for error_404.php which is in the folder views/errors/html/error_404.php
Adjust the href value with each of your localhost links for "Back to Dashboard"
For example href ="http://localhost/ci-admin-system/"

You can contact me via email if you still have questions
My email: teguhwaluyojati14@gmail.com

Thank you!