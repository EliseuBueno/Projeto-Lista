<?php
	include_once("../conexao.php");
	
	$id = $_GET['id'];
	
	$result_categoria_cliente = "DELETE FROM categoria_cliente WHERE id_categoria = '$id'";
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
					alert(\"Categoria Excluída com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi Excluída.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>