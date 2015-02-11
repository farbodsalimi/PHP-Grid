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
define("_DB_HOST_", "localhost");
define("_DB_USER_", "root");
define("_DB_PASS_", "password");
define("_DB_CHAR_", "utf8");
```
###2. Create and fill a demo database
Import SQL statement file from the PHP-Grid/_sql/php-grid.sql.

###3. That's it
Go to http://127.0.0.1 or http://localhost and have a look. 

#Example 1
```php
use PHPGrid\Database as DB;
use PHPGrid\Grid as GridClass;

$data_db = array(
  'database' => 'php-grid',
  'table' => 'users' );
$grid1 = new GridClass\Grid($data_db);

$grid1 = $grid1->compile();
```

#Example 2
```php
use PHPGrid\Database as DB;
use PHPGrid\Grid as GridClass;

$data_db = array(
  'database' => 'php-grid',
  'table' => 'users',
  'condition' => '`users` INNER JOIN emails ON `u_email` = `e_id`' );

$data_fields = array(
  'u_id' => 'ID',
  'u_first_name' => 'First Name',
  'u_last_name' => 'Last Name',
  'e_email'		=> 'Email',
  'u_phone'		=> 'Phone');
	
$grid2 = new GridClass\Grid($data_db);
$grid2->set_fields($data_fields);
```


## License

This project is licensed under the MIT License.
This means you can use and modify it for free in private or commercial projects.
