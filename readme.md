Prioris homework project


For the project I used only the phpdotenv external library, for loading variables from . env file.
I tried to give a structure to the project, in the short time (4 hours), I created an MVC-like structure.

The index.php file is the entry-point for the app.
The Prioris.php is used for URI routing. All files from this use namespacing.
AuthMiddleware.php is used for user authentication. The route can be protected or not.
Controller folder contains controller classes for the pages, API endpoints.
Model folder contains database connection and queries.
The view folder contains the View class, used to display HTML files.
The static folder contains files like HTML, CSS, JS and image(s).
Because the time was limited, I used HTTP Basic Authentication. It is not very secure, and is used rarely today, but can be implemented in short time.
I also created a registration page, to register new users, and a Users list page, to showcase some basic JS usage.
JS is implemented with OOP, using classes.

I timed my work. I finished it in 3h:57m. Unfortunately no time left for additional features and to add some fancy CSS.
Sorry for the basic "design"!
Some additional time was used to write this file.
I uploaded the project to gitHub after I finished it, so there are no commits.


To try my app:

Create a new MySQL database with an arbitrary name.
The project uses data from the .env file for database connection.
    Copy/rename .env.example to .env
    Fill the fields in the .env file.
    Run the prioris.sql to create the database schema.

I used the Apache web server during the development.
I provided an .htaccess file to setup PHP routing, and to protect sensitive files.
Additional settings needed:

    "hosts" file (the IP address can be different), add:
        127.0.0.7       mimi.prioris.com


    "httpd-vhosts.conf" file, add:
        <VirtualHost mimi.prioris.com:80>
            DocumentRoot "/opt/lampp/htdocs/prioris"
            DirectoryIndex index.php
            ErrorLog prioris_error.log
            <Directory "/opt/lampp/htdocs/prioris">
                Options All
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>

    Replace "/opt/lampp/htdocs/prioris" with the location of the project.

Restart Apache, and the app is usable at: mimi.prioris.com

You can find the database dump in the database.dump file.

Thank You, for the opportunity!
Best regards: Imre Moskovits (MiMi)
