<div class="ui modal" id="modaly">
  <i class="close icon"></i>

  <div class="header">Create New Role</div>

  <div class="content">
	<form class="ui form" method="post" id="createRoleForm" action="{{ route('admin.roles.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="fields">
	        <div class="eight wide field">
		        <label for="name">Name</label>
		        <input type="text" name="name" placeholder="Role Name...">
	        </div>

	        <div class="eight wide field">
		        <label for="name">Slug</label>
		        <input type="text" name="slug" placeholder="Role Slug...">
	        </div>
	    </div>

	    <div class="fields">

	        <div class="eight wide field">
		        <label for="name">Description</label>
		        <input type="text" name="description" placeholder="Enter Description">
	        </div>

	        <div class="four wide field">
	        	<label for="color">Color</label>
		        <input type="text" name="color" placeholder="Blue, Red, Green...">
	        </div>

	        <div class="four wide field">
	        	<label for="icon">Icon</label>
		        <input type="text" name="icon" placeholder="Semantic UI Icon name">
	        </div>	 
        </div>
    </form>
	<br>
	<h3>Preview Label</h3>
    <div class="ui left preview"></div>
  </div>
  <div class="actions">
	
    <div class="ui positive right labeled icon button submitForm">
      Create New Role
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>


