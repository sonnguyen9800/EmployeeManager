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
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Icon Style -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <!-- My Own Style -->
    <link rel="stylesheet" media="all" href="<?php echo '/stylesheets'; ?>">
    <link rel="stylesheet" media="all" href="<?php echo '/Assignment1/public/styles/styles.css'; ?>">

    <!-- Header -->
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse ">
	<div class="container-fluid">
	    <div class="navbar-header">
		<a class="navbar-brand" href="#"><?php echo $page_title ?></a>
	    </div>	    
	    <ul class="nav navbar-nav">
		<!-- Search Bar -->

		<!-- <div class="searchbar">
		     <input class="search_input" type="text" name="" placeholder="Enter employee name...">
		     <a href="/Assignment1/index.php" class="search_icon"><i class="fas fa-search"></i></a>
		     </div> -->


		
		<a href="<?php echo "/"; ?>" class="btn btn-dark" type="button" style="vertical-align: middle; display: table-cell;" >Home</a>
		<a href="<?php echo "/extra"; ?>" class="btn btn-dark" type="button" style="vertical-align: middle; display: table-cell;" >Extra</a>
		<a href="<?php echo "/Employees/new" ?>" class="btn btn-dark" type="button" >New Employee</a>
		<a href="<?php echo  '/about' ?>" class="btn btn-dark" type="button" >About</a>
		<a href="<?php echo  '/contact' ?>" class="btn btn-dark" type="button" >Contact</a>
	    </ul>

	    
	    <!-- <ul class="nav navbar-nav">
		 <a href="<?php //echo "/Assignment1/index.php"; ?>" class="btn btn-dark" type="button" >Home</a>
		 <a href="<?php //echo "/Assignment1/public/Employees/new.php" ?>" class="btn btn-dark" type="button" >New Employee</a>
		 <a href="<?php //echo  '/Assignment1/public/about.php' ?>" class="btn btn-dark" type="button" >About</a>
		 <a href="<?php //echo  '/Assignment1/public/contact.php' ?>" class="btn btn-dark" type="button" >Contact</a>
		 </ul> -->

	    

	</div>
    </nav>

</head>







   
