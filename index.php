<?php ?>

<!DOCTYPE html>
<html >
<head>
<title>Filter</title>
<link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
<h2>Filter reviews</h2>
<form action="filter.php" method="post">
<label for="rating">Order by rating:</label><br>
<select name="rating" id="rating">
	<option value="high">Highest First</option>
	<option value="low">Lowest First</option>
</select><br>
<label for="minimumRating">Minimum rating:</label><br>
<select name="minimumRating" id="minimumRating">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select><br>
<label for="dateSort">Order by date:</label><br>
<select name="dateSort" id="dateSort">
	<option value="old">Oldest First</option>
	<option value="new">Newest First</option>
</select><br>
<label for="sortByText">Prioritize by text:</label><br>
<select name="sortByText" id="sortByText">
	<option value="true">Yes</option>
	<option value="false">No</option>
</select><br><br>
 <input type="submit" value="Filter">
 </form>

</body>
</html>