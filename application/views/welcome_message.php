<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<div id="container">
	<form method="post" action="<?php base_url('vehicle_add/add') ?>">
        <label>Name</label><input name="name" type="text"/>
        <label>SID</label><input name="SID" type="text"/>
        <label>Type</label><input name="vehicle_type_ID" type="text"/>
        <button type="submit"></button>
	</form>
</div>

</body>
</html>