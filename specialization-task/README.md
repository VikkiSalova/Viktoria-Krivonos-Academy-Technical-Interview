# Syberry-Academy-Technical-Interview-Specialization-PHP


## Project setup 

### Symfony plugin

1. Go to `Settings` (Ctrl + Alt + S) > `Languages & Frameworks` > `Symfony`
2. Click on `Enable Plugin for this Project (change need restart)` checkbox
3. Restart your IDE

### Docker 

1. Go to Terminal (Alt + F12)
2. Type `cd docker`
3. Type `docker-compose up`
4. Confirm that docker images by seeing this in terminal

![Docker-compose](https://i.imgur.com/UBPe88f.jpg)

In case of typical error like 
`ERROR: for docker_database_1  Cannot start service database: Ports are not available: listen tcp 0.0.0.0:3306: bind: Only one usage of each socket address (protocol/network address/port) is normally permitted.`
You should turn off your local database server or other running docker containers.

1. Go to `Run` (Win + R)
2. Type `services.msc` and press `Enter`
3. Find MySQL57 (Or any other version of MySQL)
4. Right click on it
5. Chose `Stop` option
6. Re-try docker steps

## Compos project

### PHP (PHP-FPM)

1. Go to Terminal (Alt + F12)
2. Type `docker-compose run php-fpm composer install`
3. Confirm that composer ran successfully by seeing this in terminal

![Composer](https://i.imgur.com/zTJD0Ke.png)

4. Type `docker-compose run php-fpm php bin/console d:m:m` to Run migrations 
5. Type `y` on this Warning 
`WARNING! You are about to execute a database migration that could result in schema changes and data loss. Are you sure you wish to continue? (y/n)`
and press `Enter`
6. Confirm that migration applied by seeing this in terminal

![Migration](https://i.imgur.com/fxsDSFg.png)

7. Type `docker-compose run php-fpm php bin/console doctrine:fixtures:load` to apply fixtures
8. type `y` on this Warning
` Careful, database "symfony" will be purged. Do you want to continue? (yes/no) [no]:`
9. Confirm that fixture applied by seeing this in terminal 
 
![Fixtures](https://i.imgur.com/TA3LbaC.png)

1. Confirm that project composed by sending a GET request to `localhost`

Via browser 

![Browser](https://i.imgur.com/urHlpg0.png)

Via Postman 

![Browser](https://i.imgur.com/FQ0C7jZ.png) 

## Task

Main task: Bind application classes so that controller methods return the expected results:

1. The following `HomeController` methods must be implemented: `index`, `getLatestPost`.
2. To implement the `index` method, you must use default `findAll` method implementation from the `PostRepository.php` class as in the `index` method to return all `Posts` from database.
3. Implement the `findLast` method in `src/src/Repository/PostRepository.php` to return latest post (`Post` that has biggest `id` value).
4. To implement the `getLatestPost` method, you must use the `findLast` method from the `PostRepository.php` class as in the `getLatestPost` method.
5. You can use `browser` or `postman` to check your work. Controller methods are already marked with correct Routes.

### Result
1. `Get request` to `localhost` will display list of all posts with their `name` and `content`.
2. `Get request` to `localhost/recent` will display the latest post `name` and its `content`.

Note : Following classes should not be changed :
 * `src/src/Kernel.php`
 * `src/src/Entity/Post.php`
 * `src/src/Migrations/Version20191210174025.php`
 * `src/src/DataFixtures/AppFixtures.php`