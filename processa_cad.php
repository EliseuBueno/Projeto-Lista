<?php
	include_once("../conexao.php");
	
	$categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
	$id_loja = mysqli_real_escape_string($conn, $_POST['id_loja']);

	$result_categoria_cliente = "SELECT * FROM categoria_cliente";
	$resultado_categoria_cliente = mysqli_query($conn, $result_categoria_cliente);
		session_start();
	if(!empty($_SESSION['id'])){

	$usuario = $_SESSION['nome'];

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
		header("Location: login.php");	
	}
	

	$result_categoria_cliente = "INSERT INTO categoria_cliente (categoria, id_loja) SELECT '$categoria', 1 
		UNION ALL
		SELECT '$categoria', 2
		UNION ALL
		SELECT '$categoria', 3		
		UNION ALL
		SELECT '$categoria', 4
		UNION ALL
		SELECT '$categoria', 5
		UNION ALL
		SELECT '$categoria', 6
		UNION ALL
		SELECT '$categoria', 7
		UNION ALL
		SELECT '$categoria', 8 
		UNION ALL
		SELECT '$categoria', 9
		UNION ALL
		SELECT '$categoria', 10		
		UNION ALL
		SELECT '$categoria', 11
		UNION ALL
		SELECT '$categoria', 12
		UNION ALL
		SELECT '$categoria', 13
		UNION ALL
		SELECT '$categoria', 14
		UNION ALL
		SELECT '$categoria', 15 
		UNION ALL
		SELECT '$categoria', 16
		UNION ALL
		SELECT '$categoria', 17		
		UNION ALL
		SELECT '$categoria', 18
		UNION ALL
		SELECT '$categoria', 19
		UNION ALL
		SELECT '$categoria', 20
		UNION ALL
		SELECT '$categoria', 21
		UNION ALL
		SELECT '$categoria', 22		
		UNION ALL
		SELECT '$categoria', 23
		UNION ALL
		SELECT '$categoria', 24
		UNION ALL
		SELECT '$categoria', 25
		UNION ALL
		SELECT '$categoria', 26
		";
	$resultado_categoria_cliente = mysqli_query($conn, $result_categoria_cliente);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria Cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi encontrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>