<?php require_once("head.php") ?>
<?php require_once("database.php") ?>
<body>
	<?php require_once("navbar.php");
		$last_add_query = 'SELECT * FROM recipes_last_added LIMIT 5';
		$last_add_result = $connection->query($last_add_query);
		$highest_rated_query = 'SELECT * FROM recipes_highest_rated LIMIT 5';
		$highest_rated_result = $connection->query($highest_rated_query);
	?>
	<main>
	<div id="content">
		<div id="last_added"> 
			<h2 class="header"> Ostatnio dodane </h2>
		<?php
			while ($row = $last_add_result->fetch_assoc())
			{
				echo '<div class="tile"> 
					<a href="'.$recipes.'recipe.php?recipe_id='.$row['recipe_id'].'"> 
						<p class="small_header"> '.$row['title'].' </p>
						<p class="text"> '.$row['description'].' </p> 
					</a>
				</div>';
			}
		?>
			<div style="clear: both;"> </div>
		</div>
		
		<div id="highest_rated"> 
			<h2 class="header"> Najwyżej oceniane </h2>
		<?php
			while ($row = $highest_rated_result->fetch_assoc())
			{
				echo '<div class="tile"> 
				<a href="'.$recipes.'recipe.php?recipe_id='.$row['recipe_id'].'"> 
					<p class="small_header"> '.$row['title'].' </p>
					<p class="text"> '.$row['description'].' </p> 
				</a>
				</div>';
			}
		?>
		<div style="clear: both;"> </div>
		</div>
	</div> </main>
</body>
</html>