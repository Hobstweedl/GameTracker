<h3>Create New Role</h3>
	<form class="ui form" method="post" action="{{ route('admin.roles.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h4 class="no-top-margin">New Role</h4>
        <div class="fields">
	        <div class="four wide field">
		        <label for="name">Name</label>
		        <input type="text" name="name" placeholder="Role Name...">
	        </div>

	        <div class="four wide field">
		        <label for="name">Slug</label>
		        <input type="text" name="slug" placeholder="Role Slug...">
	        </div>

	        <div class="six wide field">
		        <label for="name">Description</label>
		        <input type="text" name="description" placeholder="Enter Description">
	        </div>

	        <div class="two wide field">
		        <label for="">&nbsp;</label>
		        <button type="submit" class="ui fluid button primary">Create</button>
	        </div>
        </div>
    </form>
