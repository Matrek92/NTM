		<h3>Liste des professeurs</h3>
		
		<form method="post">
			Filtrer par : <input type="text" name="mot"><input type="submit" name="Filtrer" value="Filtrer">
		</form>

		<br>

		<table border='1'>
			<tr>
				<td>Id professeur </td>
				<td> Nom </td>
				<td>Prenom</td>
				<td>Diplôme</td>
			</tr>
		
		<?php
		foreach ($lesProfs as $unProf) 
		{
			echo "<tr>";
			echo"<td>".$unProf['idprofesseur']."</td>";
			echo"<td>".$unProf['nom']."</td>";
			echo"<td>".$unProf['prenom']."</td>";
			echo"<td>".$unProf['diplome']."</td>";
			echo"<td>
				<a href='index.php?page=3&action=sup&idprofesseur=".$unProf['idprofesseur']."'><img src='images/supp.png' height='40' width='40'></a>

				<a href='index.php?page=2&action=edit&idprofesseur=".$unProf['idprofesseur']."'><img src='images/edit.png' height='40' width='40'></a>
				</td>

			";




			echo "</tr>";
		}
		?>
		</table>