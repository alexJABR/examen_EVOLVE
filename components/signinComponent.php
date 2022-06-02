<?php
$COLORES = (new Colores())->getColores();
?>
<div>
	<h3>Registro</h3>
	<form method="POST" action="backend.php?action=signin">
		<input type="email" name="email" placeholder="Correo electronico" required>
		<input type="password" name="password" placeholder="Contraseña" required>
		<label>Color</label>
		<select required name="color">
			<?php
			foreach ($COLORES as $key => $value) {
				echo '<option value="'.$value['id_color'].'">'.$value['color'].'</option>';
			}
			?>
		</select>
		<input type="submit" value="Registrar">
	</form>
	<a href="index.php">Iniciar sesión</a>
</div>