<form class="form-horizontal" action="/user/doChangeEmail" method="post"
	enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input id = "new_email" placeholder="New Email" name="new_email" type="text" class="validate">
          <label for="new_email">New Email</label>
        </div>
<div class="row">
<div class="input-field col s12">
          <input id = "new_email_verification" placeholder="New Email" name="new_email_verification" type="text" class="validate">
          <label for="new_email_verification">Repeat new Email</label>
        </div>
        <button id="submit" class="btn waves-effect waves-light"
				type="submit" name="action">
				Submit <i class="material-icons right">send</i>
			</button>
      </div> 
      </div> 
      </form>