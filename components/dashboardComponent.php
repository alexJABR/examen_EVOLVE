<?php
$USER = USER;
$USERS = (new Users())->getUsers();
$CONTEO = (new Colores())->getConteoColores();
?>

<a href="backend.php?action=logout">Salir (<?=$USER['EMAIL']  ?>)</a>
<br>
<div style="width:60%; transform: translate(30%);">
  <canvas id="myChart"></canvas>
</div>
<hr>
<table border="1" style="width:60%; transform: translate(30%);">
	<thead>
		<tr>
			<th>Correo</th>
			<th>Color</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($USERS as $key => $user) {
			echo '<tr style="color:'.$user['color_en'].'"><td>'.$user['email'].'</td><td>'.$user['color'].'</td></tr>';
		}
		?>
	</tbody>
</table>



<script>
	<?php echo "const datasets = ". json_encode($CONTEO).";\n "; ?>

  const data = {
    labels: ['COLORES'],
    datasets: datasets
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>