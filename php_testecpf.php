<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Calcula a fórmula de Bhaskara</title>
 		<link rel="stylesheet" href="php_testecpf.css"/>
		<link rel="icon" type="image/png" href="php_testecpf.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);

			$resultado = '';
			$cpf = '';

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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

		<form action="php_testecpf.php" method="POST" style="border: 0px">
			<p>CPF: <input type="text" name="cpf" style="width: 100px" value="<?php echo $cpf; ?>"></p>
			<p><input type="submit" name="validar" value="Validar"></p>
		</form>

	    <script type="text/javascript">
	    $("#cpf").mask("000.000.000-00");
	    </script>

		<br><p>Resultado: <?php echo $resultado; ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_testecpf">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>