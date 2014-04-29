<?php namespace PHPGrid\Example\Two;

//-------------------[Including MgGrid Class]-------------------
require_once "config.php";
require_once "class.db.php";
require_once "class.grid.php";

//---------------------[Using MgGrid Class]---------------------
use PHPGrid\Database as DB;
use PHPGrid\Grid as GridClass;

//---------------------[Example 2 (With Option And Condition)]---------------------
	/**
	*	$array_name = array(
	*		'database'	=> 'Your Database',
	*		'table'		=> 'Your Table',
	*		'condition'		=> 'WHERE `id` > 10 ORDER BY `id` DESC LIMIT `10`' ); #Conditinal Query
	*
	*	$var_grid = new GridClass\Grid($array_name);
	*/
	$data_db = array(
		'database' => 'php-grid',
		'table' => 'users',
		'condition' => '`users` INNER JOIN emails ON `u_email` = `e_id`' );
	$grid2 = new GridClass\Grid($data_db);


	/**
	* 	#--Setting our fields that we want to show in the grid
	*	$array_name = array(
	*	'Table Field Name 1' => 'Caption 1',
	*	'Table Field Name 2' => 'Caption 2',
	*	'Table Field Name 3' => 'Caption 3', ...
	*
	*	$var_grid->set_fields($array_name);
	*/
	$data_fields = array(
		'u_id'			=> 'ID',
		'u_first_name'	=> 'First Name',
		'u_last_name'	=> 'Last Name',
		'e_email'		=> 'Email',
		'u_phone'		=> 'Phone');
	
	$grid2->set_fields($data_fields);

	/**
	* 	#--Setting our option
	*	$array_name = array(
	*		'css-class' => 'CSS Class Name',
	*		'id' => 'Identification Field Of Table', #--This is required for making links
	*		'link' => array(
	*			'Edit'	=> '?edit&user_id=',
	*			'Delete'=> '?delete&user_id='));
	*
	*	$var_grid->set_option($array_name);
	*/
	$data_option = array(
		'css-class' => 'table table-striped table-hover',
		'id' => 'u_id',
		'link' => array(
			'Edit'	=> '?edit&user_id=',
			'Delete'=> '?delete&user_id=',
			'View'=> './view/user_id=')
		);
	
	$grid2->set_option($data_option);

	/**
	* 	Compiling Our Grid
	*
	*	$HTML = $var_grid->compile(); #--Result is HTML
	*/
	$example_2 = $grid2->compile();
	unset($grid2);
//
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name = "compileport" content = "initial-scale = 1, user-scalable = no">
	<meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="asset/css.css">
<title>PHP-Grid</title>
</head>

<body>
<div class="container main-section">
	<div class="page-header"><h1>PHP-Grid</h1></div>

	<div class="row">
		<div class="col-lg-12">
		<div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title">Example 2 (With Option And Condition)</h3>
			</div>

			<div class="panel-body"><?=@$example_2;?></div>
		
		</div>
		</div>
	</div>

	<hr/>

	<div class="row">
		<div class="col-lg-12">
			<a href="http://www.farbod-salimi.com/">Farbod Salimi</a> , <a href="mailto:info@farbod-salimi.com">info@farbod-salimi.com</a> (2014).
		</div>
	</div>
</div>
</body>

</html>
