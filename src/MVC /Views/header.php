<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">

<title><?= $title; ?> | Bbc MVC</title>
</head>
<body>
	<header>
	
		<script>    var categoriesLink = "/CategoriePages/index"; </script>

		<ul id="slide-out_Account" class="sidenav">
		

			<li>
				<div class="user-view">
					<div class="background"></div>
					
			
						
<?php

if (! isset($_SESSION["IsLoggedIn"]) || $_SESSION["IsLoggedIn"] == false) {
    ?>	 <a href="http://sellit.local/"><img class="SellitPosition" alt ="Sellit"
						src="/Images/Sellit.png"
						style="margin-left: 70px; margin-top: 30px;"></a><?php } ?>
						
											 	
					 <a href="#name"><span
						class="white-text name">Filler</span></a> <a href="#name"><span
						class="white-text name">Filler</span></a>
				</div>
			</li>
   			
			<?php
if (isset($_SESSION["IsLoggedIn"]) && $_SESSION["IsLoggedIn"] == true) {
    ?>   <li><a href="/YourAccount"><i class="material-icons">account_circle</i>Your
					Account</a></li>
			<li><a href="#!"><i class="material-icons">local_shipping</i>Your
					Orders</a></li><?php } ?>
			
			<li><div class="divider"></div></li>
			<li><a class="subheader">Subheader</a></li>
		
			<?php

if (! isset($_SESSION["IsLoggedIn"]) || $_SESSION["IsLoggedIn"] == false) {
    ?>    <li><a class="waves-yeffect" href="/user/Login"> <i
					class="material-icons">account_box</i>LogIn
			</a></li>

			<li><a class="waves-effect" href="/user/create"> <i
					class="material-icons">account_box</i>Registration
			</a></li><?php } ?>
			<li><a class="waves-effect" href="/infoSite"> <i class="material-icons">info</i>Info
					
			</a></li>
			
            <?php  if (isset($_SESSION["IsLoggedIn"]) && $_SESSION["IsLoggedIn"] == true) { ?>
                <li><a class="waves-effect" href="/user/logout"> <i
					class="material-icons">exit_to_app</i>Logout
			</a></li>
             <?php  } ?>
		</ul>

		<ul id="slide-out_shopping_cart" class="sidenav">
			<li>
				<div class="user-view">
					<div class="background"></div>
					<a href="http://sellit.local/"><img class="SellitPosition" alt ="sellit"
						src="/Images/Sellit.png"
						style="margin-left: 70px; margin-top: 30px;"></a> <a href="#name"><span
						class="white-text name">Filler</span></a> <a href="#name"><span
						class="white-text name">Filler</span></a>
						
				</div>
			<li><div class="divider"></div></li>
			<li><a class="subheader"><i>ShoppingCart</i></a></li>	
		</ul>

		<nav>
			<div class="nav-wrapper">

				<a href="http://sellit.local/" class="brand-logo"><i
					class="material-icons">home</i>Sell it</a>

				<ul class="right hide-on-med-and-down">
     <?php 
if (isset($_SESSION["IsLoggedIn"]) && $_SESSION["IsLoggedIn"] == true) {
   ?> <li><a href = "/sell"><i class="material-icons">file_upload</i></a></li>
     <?php }?>
				<?php 
if (! isset($_SESSION["IsLoggedIn"]) || $_SESSION["IsLoggedIn"] == false) {
   ?> <li><a onclick = "alert('You have to be logged in to use this function')" ><i class="material-icons">file_upload</i></a></li>
     <?php }?>
     

					<li><a href = "/ShoppingCart" ><i class="material-icons">shopping_cart</i></a></li>
						
						
					<li><a href="#" data-target="slide-out_Account"
						class="sidenav-trigger"><i class="material-icons">account_circle</i></a></li>
				</ul>

				<div class="input-field">
					<input id="search" type="search" required> <label
						class="label-icon" for="search"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>

			</div>
		</nav>

	</header>

	<main class="container">
	<?php if (isset($_SESSION["infoMsg"])) { ?>
             <div class="msg msg-info z-depth-3" id="message"><?= $_SESSION["infoMsg"] ?></div>
      <?php unset($_SESSION["infoMsg"]);} ?>
	
	
	<?php if (isset($_SESSION["warnMsg"])) { ?>
            <div class="msg msg-alert z-depth-3" id="message"><?= $_SESSION["warnMsg"] ?></div>
      <?php unset($_SESSION["warnMsg"]);} ?>
      
      <?php if (isset($_SESSION["errorMsg"])) { ?>
            <div class="msg msg-error z-depth-3" id="message"><?= $_SESSION["errorMsg"] ?></div>
      <?php unset($_SESSION["errorMsg"]);} ?>