<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Calcula a fórmula de Bhaskara</title>
 		<link rel="stylesheet" href="php_testecpf.css"/>
		<link rel="icon" type="image/png" href="php_testecpf.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript">
			function formatar_mascara(src, mascara)
			{
				var campo = src.value.length;
				var saida = mascara.substring(0,1);
				var texto = mascara.substring(campo);
				if(texto.substring(0,1) != saida)
				{
					src.value += texto.substring(0,1);
				}
			}
		</script>
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);

			$resultado = '';
			$cpf = '';
			$cpf2= '';

			if( isset( $_POST[ 'validar']))
			{
				require_once( 'cpf.php');
				$classe_cpf = new \jacknpoe\CPF();

				$cpf = $_POST["cpf"];
				// mágica
				if( $classe_cpf->validaCPF( $cpf))
				{
					$resultado = "válido";
				} else {
					$resultado = "inválido";
				}
			}
		?>
		<h1>Valida CPF<br></h1>

		<form action="php_testecpf.php" method="POST" style="border: 0px">
			<p>CPF: <input type="text" maxlength="14" name="cpf" style="width: 100px" value="<?php echo $cpf; ?>" onkeypress="formatar_mascara( this, '###.###.###-##')" autofocus></p>
			<p><input type="submit" name="validar" value="Validar"></p>
		</form>

		<br><p>Resultado: <?php echo $resultado; ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_testecpf">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>