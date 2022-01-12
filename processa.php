<?php
	include_once("../conexao.php");
	$id_categoria = mysqli_real_escape_string($conn, $_POST['id_categoria']);
	$categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
	$id_loja = mysqli_real_escape_string($conn, $_POST['id_loja']);

	$result_categoria_cliente = "UPDATE categoria_cliente SET categoria = '$categoria', id_loja ='$id_loja' WHERE id_categoria = '$id_categoria'";	
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
					alert(\"Categoria alterada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi alterada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>