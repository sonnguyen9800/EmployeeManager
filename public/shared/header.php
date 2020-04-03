<?php
if (!isset($page_title)){
    $page_title = "INDEX";
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?php echo $page_title; ?></title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" media="all" href="<?php echo ROOT . 'styles/header.css'; ?>">

</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse ">
	<div class="container-fluid">
	    <div class="navbar-header">
		<a class="navbar-brand" href="#"><?php echo $page_title ?></a>
	    </div>
	    <ul class="nav navbar-nav">
		<a href="<?php echo ROOT . '/index.php' ?>" class="btn btn-dark" type="button" >Home</a>
		<a href="<?php echo ROOT . '/public/Employees/new.php' ?>" class="btn btn-dark" type="button" >New Employee</a>
		<a href="<?php echo ROOT . '/public/about.php' ?>" class="btn btn-dark" type="button" >About</a>
		<a href="<?php echo ROOT . '/public/contact.php' ?>" class="btn btn-dark" type="button" >Contact</a>
	    </ul>
	</div>
    </nav>




   