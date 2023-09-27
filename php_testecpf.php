<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Calcula a fórmula de Bhaskara</title>
 		<link rel="stylesheet" href="php_testecpf.css"/>
		<link rel="icon" type="image/png" href="php_testecpf.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript">
			function formatar_mascara(src, mascara){
			    let tamanho_src = src.value.length
			    let tamanho_mascara = mascara.length
			    let atual_src = 0
			    let atual_mascara = 0
			    let acumulador = ""
			    let valor = ""
			    let temp = ""
			    for(let i=0; i < tamanho_src; i++){
			        temp = src.value.substring(i, i+1)
			        if((!isNaN(Number(temp))) && temp != "-") valor += temp
			    }
			    while(true){
			        if(tamanho_src == atual_src || tamanho_mascara == atual_mascara){
			            break
			        }
			        if(mascara.substring(atual_mascara, atual_mascara + 1) == "9"){
			            acumulador += valor.substring(atual_src, atual_src + 1)
			            atual_src ++
			        } else{
			            acumulador += mascara.substring(atual_mascara, atual_mascara + 1)
			        }
			        atual_mascara ++
			    }
			    src.value = acumulador
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
			<p>CPF: <input type="text" maxlength="14" name="cpf" style="width: 100px" value="<?php echo htmlspecialchars( $cpf, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "ISO-8859-1"); ?>" oninput="formatar_mascara( this, '999.999.999-99')" onchange="formatar_mascara( this, '999.999.999-99')" onkeypress="formatar_mascara( this, '999.999.999-99')" autofocus></p>
			<p><input type="submit" name="validar" value="Validar"></p>
		</form>

		<br><p>Resultado: <?php echo $resultado; ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_testecpf">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>