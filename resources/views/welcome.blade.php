<html>
<title>Laravel Testing</title>
<head></head>
<body>

<?php
print_r($errors->name);
?>

	  
	<form id="post_form" method="post" action="add-user">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="text" id="name" name="name" placeholder="Enter name"/> 
		<input type="submit" value="submit">
	</form>
</body>
</html>
