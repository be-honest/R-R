<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To do list</title>
	<link rel="stylesheet" href="todolist.css">

</head>
<body>

<div class="header" id="myDiv">
	<h2>Activity List</h2>
	<input type="text" id="activity" placeholder="Add an activity" />
	<span onclick="newElement()" class="addBtn">Add</span>
</div>
<ul id="list">
	<li class="checked">moutain climbing</li>
	<li>singing contest</li>
	<li>sight seeing</li>
</ul>	

	<script src="todolist.js"></script>
</body>
</html>