<div id= "content">
	<?php
		echo "<hr><table border='0.9' width='1000px' align='center'><tr><td>p_name</td><td>p_adviser</td><td>p_leader_name</td></tr>";
		foreach($detail as $value)
		{
			echo "<tr>";
			echo "<td>" .$value['p_name'] . "</td>";                                
			echo "<td>" . $value['p_adviser'] . "</td>";
			echo "<td>" . $value['p_leader_name'] . '</td>';
			echo "</tr>";
		}
		echo "</table><hr>";
	?>

</div>