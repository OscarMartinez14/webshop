<h1 class="YourAccountTitile">Your Account</h1>
<article class="hreview open special">
<?php if (empty($users)) { ?>
		<div class="dhd">
			<h2 class="item title"></h2>
		</div>
	<?php } else { ?>
<?php { ?>
		
<div class="accoubtBox">
<div class="section">
	<h5>Username</h5>
	<p><?= $_SESSION["LoggedInUser"][1];?></p>
</div>
<div class="divider"></div>
<div class="section">
	<h5>Firstname</h5>
	<p><?= $_SESSION["LoggedInUser"][2];?></p>
</div>
<div class="divider"></div>
<div class="section">
	<h5>Lastname</h5>
	<p><?= $_SESSION["LoggedInUser"][3];?></p>
</div>
<div class="divider"></div>
<div class="section">
	<h5>Email</h5>
	<p><?= $_SESSION["LoggedInUser"][4];?></p>
</div>
<div class="divider"></div>
<div class="section">
	<h5>Birthday</h5>
	<p><?= $_SESSION["LoggedInUser"][5];?></p>
</div>
<div class="divider"></div>
<div class="section">
	<h5>Kanton</h5>
	<p><?= $_SESSION["LoggedInUser"][6];?></p>
</div>
<div class="divider"></div>
<div class="section">
	<h5>Ort</h5>
	<p><?= $_SESSION["LoggedInUser"][7];?></p>
</div>
<div class="divider"></div>
<div class="section">    
	<h5>PLZ</h5>
	<p><?= $_SESSION["LoggedInUser"][8];?></p>
</div>
<div class="divider"></div>
<?php } ?>
	<?php } ?>
	</div>
<div class="fixed-action-btn">
  <a class="btn-floating btn-large black">
    <i class="large material-icons">edit</i>
  </a>
  <ul>
    <li><a href = "/User/changeUsername" class="btn-floating black"><i class="material-icons"> sms</i></a></li>
    <li><a href = "/User/changeEmail" class="btn-floating black darken-1"><i class="material-icons">email</i></a></li>
    <li><a href = "/User/changePassword" class="btn-floating black"><i class="material-icons">lock_outline</i></a></li>
  </ul>
</div>
      
</article>