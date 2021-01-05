<form class="form-horizontal" action="/user/doChangeUsername" method="post"
	enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input  id = "new_username" placeholder="New Username" name="new_username" type="text" class="validate">
          <label for="new_username">New Username</label>
        </div>
<div class="row">
<div class="input-field col s12">
          <input id = "new_username_verification" placeholder= "New Username" name="new_username_verification" type="text" class="validate">
          <label for="new_username_verification">Repeat new Username</label>
        </div>
        <button id="submit" class="btn waves-effect waves-light"
				type="submit" name="action">
				Submit <i class="material-icons right">send</i>
			</button>
      </div> 
      </div> 
      </form>
      
      
      