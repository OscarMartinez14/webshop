<form class="form-horizontal" action="/user/doChangePassword" method="post"
	enctype="multipart/form-data">
      <div class="row">
<!--              <div class="input-field col s12"> -->
<!--           <input placeholder="Old Password" name="old_password" type="password" class="validate"> -->
<!--           <label for="old_password">old password</label> -->
<!--         </div> -->
        <div class="input-field col s12">
          <input id = "new_password" placeholder="New Password" name="new_password" type="password" class="validate">
          <label for="new_password">New Password</label>
        </div>
<div class="row">
<div class="input-field col s12">
          <input id = "new_password_verification" placeholder="New Password" name="new_password_verification" type="password" class="validate">
          <label for="new_password_verification">Repeat new Password</label>
        </div>
        <button id="submit" class="btn waves-effect waves-light"
				type="submit" name="action">
				Submit <i class="material-icons right">send</i>
			</button>
      </div> 
      </div> 
      </form>
      
      
      