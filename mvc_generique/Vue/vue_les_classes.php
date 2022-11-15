		<h3>Liste des classes</h3>
		
		<form method="post">
			Filtrer par : <input type="text" name="mot"><input type="submit" name="Filtrer" value="Filtrer">
		</form>

		<br>

		<table border='1'>
			<tr>
				<td>Id classe </td>
				<td> Nom </td>
				<td>Salle de cours</td>
				<td>Diplôme préparé</td>
				<?php 
				if(isset($_SESSION['role']) && $_SESSION['role']=='admin')
				{
					echo "<td>Opérations </td>";
				}
				?>
			</tr>
		
		<?php
		foreach ($lesClasses as $uneClasse) 
		{
			echo "<tr>";
			echo"<td>".$uneClasse['idclasse']."</td>";
			echo"<td>".$uneClasse['nom']."</td>";
			echo"<td>".$uneClasse['salle']."</td>";
			echo"<td>".$uneClasse['diplome']."</td>";
			if(isset($_SESSION['role']) && $_SESSION['role']=='admin')
	{
			echo"<td>
				<a href='index.php?page=1&action=sup&idclasse=".$uneClasse['idclasse']."'><img src='images/supp.png' height='40' width='40'></a>

				<a href='index.php?page=1&action=edit&idclasse=".$uneClasse['idclasse']."'><img src='images/edit.png' height='40' width='40'></a>
				</td>

			";
	}
			echo "</tr>";
		}
		?>
		</table>
		<br/><br/>