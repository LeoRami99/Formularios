<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulario de solicitud</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 50px;
		}
		h1 {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
		}
		.label {
			display: inline-block;
			width: 150px;
			font-weight: bold;
			margin-bottom: 5px;
		}
		.input {
			display: inline-block;
			width: 300px;
			margin-bottom: 20px;
			border: none;
			border-bottom: 1px solid #999;
			padding: 5px;
		}
		.textarea {
			display: inline-block;
			width: 300px;
			height: 100px;
			margin-bottom: 20px;
			border: none;
			border-bottom: 1px solid #999;
			padding: 5px;
		}
		.signature {
			margin-top: 50px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.signature-label {
			font-weight: bold;
			margin-right: 20px;
		}
		.signature-input {
			border: none;
			border-bottom: 1px solid #999;
			padding: 5px;
		}
		.button-container {
			text-align: center;
		}
		.button {
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 4px;
			padding: 10px 20px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Formulario de solicitud</h1>
		<form>
			<div>
				<span class="label">Fecha:</span>
				<input type="text" class="input" name="fecha" value="...">
			</div>
			<div>
				<span class="label">Datos personales:</span>
			</div>
			<div>
				<span class="label">Aspiración:</span>
				<input type="text" class="input" name="aspiracion" value="...">
				<span class="label">Nombre y apellido:</span>
				<input type="text" class="input" name="nombre" value="...">
			</div>
			<div>
				<span class="label">Número de documento:</span>
				<input type="text" class="input" name="documento" value="...">
				<span class="label">Fecha de expedición:</span>
				<input type="text" class="input" name="expedicion" value="...">
				<span class="label">Ciudad expedición:</span>
				<input type="text" class="input" name="ciudad" value="...">
			</div>
			<div>
				<span class="label">Género:</span>
				<input type="text" class="input" name="genero" value="...">
			
                <div>
				<span class="label">Fecha de nacimiento:</span>
				<input type="text" class="input" name="nacimiento" value="...">
				<span class="label">Nivel de estudios:</span>
				<input type="text" class="input" name="estudios" value="...">
			</div>
			<div>
				<span class="label">Oficio:</span>
				<input type="text" class="input" name="oficio" value="...">
				<span class="label">Población:</span>
				<input type="text" class="input" name="poblacion" value="...">
			</div>
			<div>
				<span class="label">Número de celular:</span>
				<input type="text" class="input" name="celular" value="...">
				<span class="label">Correo electrónico:</span>
				<input type="text" class="input" name="correo" value="...">
			</div>
			<div>
				<span class="label">País:</span>
				<input type="text" class="input" name="pais" value="...">
				<span class="label">Departamento:</span>
				<input type="text" class="input" name="departamento" value="...">
				<span class="label">Municipio/Ciudad:</span>
				<input type="text" class="input" name="municipio" value="...">
			</div>
			<div>
				<span class="label">Dirección de residencia:</span>
				<textarea class="textarea" name="direccion">...</textarea>
				<span class="label">Localidad:</span>
				<input type="text" class="input" name="localidad" value="...">
			</div>
			<div class="signature">
				<div>
					<span class="signature-label">Firma aspirante:</span>
					<input type="text" class="signature-input" name="firma-aspirante" value="...">
				</div>
				<div>
					<span class="signature-label">Firma presidente departamental:</span>
					<input type="text" class="signature-input" name="firma-presidente" value="...">
				</div>
			</div>
			<div class="button-container">
				<button type="submit" class="button">Generar PDF</button>
			</div>
		</form>
	</div>
</body>
</html>
