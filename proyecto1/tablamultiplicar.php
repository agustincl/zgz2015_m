<table border=1>
<tr>
	<td>1</td>
	<td>2</td>
	<td>3</td>
</tr>
<tr>
	<td>4</td>
	<td>5</td>
	<td>6</td>
</tr>
<tr>
	<td>7</td>
	<td>8</td>
	<td>9</td>
</tr>
</table>

<?php
$filas = 4;
$columnas = 6;
echo "<table border=1>";
for($a=0;$a<=$filas;$a++)
{
    echo "<tr>";
        for ($b=0;$b<=$columnas;$b++)
        {
            if($a==0)
            {
                echo "<td>".$b."</td>";
            }
            elseif($b==0)
            {
                echo "<td>".$a."</td>";                
            }
            else
                echo "<td>".$a*$b."</td>";
        }
    echo "</tr>";    
}
echo "</table>";
?>










