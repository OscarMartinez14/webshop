
<div class="row">

	<div class="col s4">
		<ul id="sidebar" class="sidenav sidenav-fixed">
			<li><a href="http://sellit.local"><i class="material-icons">grain</i>Categories</a></li>
			<li><div class="divider"></div></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=1"><i
					class="material-icons electronics">computer</i>Electronics</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=2"><i
					class="material-icons">weekend</i>Furniture</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=3"><i
					class="material-icons">pets</i>Pet</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=4"><i
					class="material-icons">color_lens</i>Toy</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=5"><i
					class="material-icons">watch</i>Jewellery</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=6"><i
					class="material-icons">live_tv</i>Movies</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=7"><i
					class="material-icons">golf_course</i>Sport</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=8"><i
					class="material-icons">drive_eta</i>Automobile</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=9"><i
					class="material-icons">child_friendly</i>Baby</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=10"><i
					class="material-icons">business_center</i>Business</a></li>
			<li><a class="waves-effect" href="/CategoriePages/?categorieId=11"><i
					class="material-icons">beach_access</i>Holidays</a></li>

		</ul>
	</div>
	<h1><?= $meinFancyTitle ?></h1>

	<?php foreach ($products as $product) { ?>
	  <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src= "/<?= $product ->picture1;?>" alt = "CustomImage" >
          <span class="card-title"><?= $product->productName;?></span>
        </div>
        
        <div class="card-content">
          <p><?= $product->beschriebungSmall;?>
          <span class = "Price"> <?= $product->preis;?> Fr</span>
          </p>
        </div>
        <div class="card-action">
          <a href="/shoppingcart/add?productId=<?= $product->id ?>" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }?>