PHP-Grid
========
This is a simple PHP grid class.
Have a look here: https://github.com/farbod-salimi/PHP-Grid


## Installation
First, copy this repo into a public accessible folder on your server.
Common techniques are : 

### One.
downloading and extracting the .zip / .tgz by hand

### Two.
cloning the repo with git (into var/www)

```
git clone https://github.com/farbod-salimi/PHP-Grid.git /var/www
```

## Configuration.
###1. Edit the *config.php*
change these lines
```php
define("_HOST_NAME_", "localhost");
define("_DB_USER_", "root");
define("_DB_PASS_", "password");
```
###2. Create and fill a demo database
Import SQL statement file from the PHP-Grid/_sql/php-grid.sql.

###3. That's it
Go to http://127.0.0.1 or http://localhost and have a look. 

## License

This project is licensed under the MIT License.
This means you can use and modify it for free in private or commercial projects.
