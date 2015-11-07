
<?php 
$tela=isset($_GET['tela']);
$branco=isset($_GET['branco']);
$confirma=isset($_GET['confirma']);


if($tela && isset($_GET['numero'])){
	$voto = $_GET['tela'];

	$num = $_GET['numero'];

	$voto .= $num;
}else{
	$voto = null;
}
?>
<?php
if($confirma =='confirma' && $_GET['tela']!=13 && $_GET['tela'] !=24 && $_GET['tela']!=45 && $_GET['tela']!=50){  
   $arquivo="urna_votos_nulos.txt";    
   $conteudo="nulo,";
   $abertura=fopen("$arquivo","a+");
   $gravacao=fwrite($abertura,$conteudo);
   fseek($abertura,0);
   $leitura=fread($abertura,filesize($arquivo));
   fclose($abertura);
}else{
   $arquivo="urna_votos_validos.txt";    
   $conteudo="$_GET[campo],";
   $abertura=fopen("$arquivo","a+");
   $gravacao=fwrite($abertura,$conteudo);
   fseek($abertura,0);
   $leitura=fread($abertura,filesize($arquivo));
   fclose($abertura);
   //echo"<br>conteudo do arquivo:$leitura";
}

?>
<?php 
  if($branco =='branco'){
   $arquivo="votos_brancos.txt";
   $conteudo="voto branco,";
   $abertura=fopen("$arquivo","a+");
   $gravacao=fwrite($abertura,$conteudo);
   fseek($abertura,0);
   $leitura=fread($abertura,filesize($arquivo));
   fclose($abertura);
}else
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="get">
	
	<div>
	<table border='5' height="3" width="3">
	<tr>
        <input type="text" name="tela" id="tela" value="<?php echo $voto; ?>" />		
	</tr>
	
	<tr>
        <td><input type="submit"  name="numero" value="1" /> </td>
		<td><input type="submit"  name="numero" value="2" /></td>
		<td><input type="submit"  name="numero" value="3" /></td>
	</tr>
	<tr>
		<td><input type="submit" name="numero"  value="4" /></td>
		<td><input type="submit" name="numero"  value="5" /></td>
		<td><input type="submit" name="numero"  value="6" /></td>
	</tr>
	<tr>
		<td><input type="submit" name="numero"  value="7" /></td>
		<td><input type="submit" name="numero"  value="8" /></td>
		<td><input type="submit" name="numero"  value="9" /></td>
	</tr>
	    <td><input type="submit" name="numero"  value="0" /></td>
	<tr>
		<td><input type="submit" name="cancelar"  value="cancelar" /></td>
		<td><input type="submit" name="branco"  value="branco" /></td>
		<td><input type="submit" name="confirma" value="confirmar" /></td>
	</tr>
	</table>
	</div>
	</form>
	<div>
		<h2>Legenda</h2>
		<p>13-Dilma</p>
        <p>24-Leandro</p>
		<p>45-Aecio</p>
		<p>50-Joaquim</p>
	</div>
</body>
</html>
