<?php 
include("./conecta.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Monitor de tempos de resposta</title>
</head>
<body>
<?php


//Obtem hora atual para comparação com o último acesso.
$dataAtual = date("Ymd");
$horaAtual = date("His");   

//Obtem último acesso para comparação com hora atual

$sql="SELECT id, data, hora, id_cliente as cliente, id_canal as canal, id_dispositivo as dispositivo FROM `log` WHERE id_cliente=6 and id_canal=6 and id_dispositivo=4 order by 1 desc,2 desc limit 1";

//PHP 6
//$result = mysql_query($sql) or die("Error: " . mysql_error());

//PHP 7
$result = mysqli_query($link, $sql) or die("Error: " . mysqli_error());

//PHP 6
 //while ($row = mysql_fetch_assoc($result)) { 
while ($row = mysqli_fetch_assoc($result)) { 
            $id = $row['id'];
            $data = $row['data'];
            $hora = $row['hora'];
            $canal = $row['canal'];
            $cliente = $row['cliente'];
            $dispositivo = $row['dispositivo'];
        }

echo "<br>Data Atual: ".$dataAtual;
echo "<br>Hora Atual: ".$horaAtual;

echo "<hr>";

echo "<br>ID: ".$id;
echo "<br>CLIENTE: ".$cliente;
echo "<br>DISPOSITIVO: ".$dispositivo;
echo "<br>CANAL: ".$canal;
echo "<br>Data Acesso: ".$data;
echo "<br>Hora Acesso: ".$hora;

echo "<hr>";

$dif_data = $dataAtual - $data;
$dif_hora = $horaAtual - $hora;

echo "<br>Diferença de Tempo:";
echo "<br>DT Atual - DT: ".$dif_data." (dias)";
echo "<br>HR Atual - HR: ".$dif_hora." (segundos)";

echo "<hr>";

if($dif_hora > 10){

	if($dif_hora > 120){
		$msg = "ALERTA - Vídeo não rodou nos últimos ".$dif_hora." segundos. SMS ENVIADO.";
	}else{
		$msg = "ALERTA - Vídeo não rodou nos últimos ".$dif_hora." segundos.";	
	}
	
	
	echo $msg;

	echo "<script>";
	echo "console.log('$msg');";
	echo "</script>";	

}else{

	$msg = "Legal! Esse tempo de ".$dif_hora." segundos esta dentro do esperado.";

	echo $msg;

	echo "<script>";
	echo "console.log('$msg');";
	echo "</script>";	
}

?>	
</body>
</html>