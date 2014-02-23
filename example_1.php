<?php namespace PHPGrid\Example\One;

//-------------------[Including MgGrid Class]-------------------
require_once "config.php";
require_once "class.db.php";
require_once "class.grid.php";

//---------------------[Using MgGrid Class]---------------------
use PHPGrid\Database as DB;
use PHPGrid\Grid as GridClass;

//---------------------[Example 1 (Without Option And Condition)]---------------------
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
		'table' => 'users' );
	$grid1 = new GridClass\Grid($data_db);

	/**
	* 	Compiling Our Grid
	*
	*	$HTML = $var_grid->compile(); #--Result is HTML
	*/
	# Compiling Our Grid
	$example_1 = $grid1->compile();
	unset($grid1);
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
				<h3 class="panel-title">Example 1 (Without Option And Condition)</h3>
			</div>

			<div class="panel-body"><?=@$example_1;?></div>
		
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