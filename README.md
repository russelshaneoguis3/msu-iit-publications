<p align="center"><a href="https://www.msuiit.edu.ph/" target="_blank"><img src="public/assets/img/web-logo.png" width="200" alt="MSU-IIT Logo"></a></p>


## About MSU-IIT Researchers Repository

This web application, developed using the Laravel Framework and MySQL DBMS, is designed to assist researchers in efficiently storing and managing publications, research papers, presentations, and other documents. The project team is listed below:

- [Prof. Daisy Lou Polestico, Ph.D (Project Leader)](https://www.researchgate.net/lab/Daisy-Lou-Lim-Polestico-Lab).
- [Assoc. Prof. Johniel Babiera (Project Member)](https://ph.linkedin.com/in/johniel-babiera).
- [Adam Russel Shane Oguis (Web Developer)](https://www.linkedin.com/in/ars-oguis/).
- [Andrei Gabrielle Adlawan (Team)](https://www.linkedin.com/in/andrei-gabrielle-adlawan-237b55299/).
- [Dinah Dumaguing (Team)](https://www.youtube.com/watch?v=e_04ZrNroTo).


## How to setup the web application

    1. Download and setup your MySQL DBMS.
    2. Import the sql file **research.sql** (see project folder) and name the database as `research`.
    3. You can also manually setup the database by creating a database and name it `research`, then using console you can manually code the tables, triggers, etc. Just follow the **SQL guide.txt** file. 
    4. Download Php, just follow tutorials in [Youtube](https://www.youtube.com/).
    5. Download Composer, just follow tutorials in [Youtube](https://www.youtube.com/).
    6. Create a Folder inside C:\xampp\htdocs and after you create a folder, create another folder inside of it.
    7. You can also follow tutorials on [Youtube](https://www.youtube.com/) on how to setup Laravel Framework.
    8. After successfully installed dependencies, you can now import the laravel web application from this github repository.
    9. If you encounter errors especially in the app_key inside the .env file. You can generate new app_key by doing this commands in the CMD or terminal of the project ( php artisan key:generate ).
    10. Inside in the .env, you can also setup the database host, password, ports, and etc.

## Debug, Errors, Problems,

- If you encounter error from downloading composer **composer global require laravel/install** 
    solution:
    1. Open your **php.ini** file located at C:\Program Files\php-8.3.something\php.ini
    2. Look for a line **;extension=zip** and then remove the semicolon (;) then hit save (ctrl + s).
    3. Restart the terminal and retry **composer global require laravel/install**.

- Extensions needed (remove the semicolon of this lines)
    1. ;extension=fileinfo
    2. ;extension=pdo_mysql


