<?php require_once('../common/head.php'); 
	require_once('../common/database.php');
	require_once($admins.'check_admin.php'); ?>
<body>
	<?php
		require_once($common."navbar.php");
		$unit_query = 'SELECT unit_id, plural_5pcs FROM units';
		$unit_result = $connection->query($unit_query);
		$difficulty_query = 'SELECT * FROM difficulties';
		$difficulty_result = $connection->query($difficulty_query);
		echo '<div id="content">
		<div>
			<form class="form_with_table" name="add_recipe" method="post" action="add_recipe.php">
					<table id="ingredients_list_add_recipe">	
					<th colspan=3> Lista składników </th>
					<tr> 
					<td> <label> Składnik <input type=text name="ingredients[]"> </input> </label> </td> 
					<td> <label> Liczba <input type=text name="how_many[]"> </label> </input> </td> 
					<td> <label> Jednostka <select name="units_ids[]">';
					while ($row = $unit_result->fetch_assoc() )
						echo '<option value='.$row['unit_id'].'> '.$row['plural_5pcs'].' </option>';
					echo '</select> </label> </td> </tr></table>
					<input type="button" id="add_row" onclick="add_row_to_table(\'ingredients_list_add_recipe\')" value="Dodaj wiersz">  </input>
					<input type="button" id="remove_row" onclick="remove_row_from_table(\'ingredients_list_add_recipe\')" value="Usuń wiersz">  </input>
				<br>
				<label> Opis <br> <textarea name="description"></textarea> </label>';
				if (check_admin($_SESSION['user_id']))
					echo '<br> <label> Zaakceptuj <input type="checkbox" name="accepted"> </input> </label>';
				echo '<input type=hidden name="title" value="'.$_POST['title'].'"> </input> <br>
				<input type=hidden name="meal_id" value="'.$_POST['meal_id'].'"> </input> <br>
				<input type=hidden name="category_id" value="'.$_POST['category_id'].'"> </input> <br>
				<input type=hidden name="difficulty_id" value="'.$_POST['difficulty_id'].'"> </input> <br>
				<input type=hidden name="portions" value="'.$_POST['portions'].'"> </input> <br>
				<input type=hidden name="prepare_time" value="'.$_POST['prepare_time'].'"> </input> <br>
			<input type="submit" value="Dodaj przepis">
			</form>
			</div>
		</div>';
		require_once($common."footer.php");
	?>	
</body>
</html>