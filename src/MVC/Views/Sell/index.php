<h1 class="YourAccountTitile">Sell</h1>

<form class="form-horizontal" action="/sell/doCreate" method="post"
	enctype="multipart/form-data">
	<div class="component" data-html="true">
		<div class="form-group">
			<label class="col-md-2 control-label" for="productName">Productname</label>
			<div class="col-md-4">
				<input id="productName" name="productName" type="text"
					placeholder="" class="form-control input-md">
			</div>
		</div>

		<div class="input-field col s12">
			<select name="category_id">
				<option disabled selected>Choose your category</option>
				<option value="1">Electronics</option>
				<option value="2">Furniture</option>
				<option value="3">Pet</option>
				<option value="4">Toy</option>
				<option value="5">Jewellery</option>
				<option value="6">Movies</option>
				<option value="7">Sport</option>
				<option value="8">Automobile</option>
				<option value="9">Baby</option>
				<option value="10">Business</option>
				<option value="11">Holidays</option>
			</select>
		</div>




		<div class="form-group">
			<label class="Textstyle col-md-2 control-label"
				for="beschriebungSmall">Description</label>
			<div class="col-md-4">
				<input class="textarea form-control input-md" id="beschriebungSmall"
					name="beschriebungSmall" type="text"
					placeholder=" Describe your product here in one sentence.">
					
			</div>
		</div>
		<div class="form-group">
			<label class="Textstyle col-md-2 control-label"
				for="beschriebungBig">Description</label>
			<div class="col-md-4">
				<input class="textarea form-control input-md" id="beschriebungBig" name="beschriebungBig"
					type="text"
					placeholder="Describe your Product in Detail."
					>
			</div>
		</div>


		<div class="file-field input-field">
			<div class="btn">
				<span>File</span> <input type="file" multiple>
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" id="picture1" name="picture1"
					type="file" >
			</div>
		</div>

		<div class="row">
			<div class="col s12">
				<label> Auction </label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<input id="preis" type="number" name="preis"> <label for="preis">Fix
					price</label>
			</div>
		</div>

		<div class="row">

			<div class="col s1">
				<div class="switch">
					<label> Off <input id="checkboxIsStartingPrice" type="checkbox"> <span
						class="lever"></span> On
					</label>
				</div>
			</div>

			<div class=" col s11">
				<label for="textboxStartingPrice">Auction</label> <input disabled
					value="" id="textboxStartingPrice" placeholder="Starting Price"
					type="text" class="validate">
			</div>

			<button id="submit" class="btn waves-effect waves-light"
				type="submit" name="action">
				Submit <i class="material-icons right">send</i>
			</button>
		</div>
	</div>

</form>
