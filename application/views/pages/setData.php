<div id= "content">
	<?php

		echo "<hr><table border='0.9' width='1000px' align='center'><tr><td>Station</td><td>Destination</td><td>UpdateTime</td></tr>";		
		
		foreach($mrt as $row) 
		{
			
				echo "<tr>";
				echo "<td>" .$row->Station . "</td>";                                
				echo "<td>" .$row->Destination . "</td>";
				echo "<td>" .$row->UpdateTime . "</td>";
				echo "<td>" . "is exist" . '</td>';
				echo "</tr>";				
			

		}
		echo "</table><hr>";
	?>