<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Regex</title>

	<style>
		table {
			margin: 30px;
		}
		th {
			border: 2px #000 solid;
			margin: 0;
		}
		td {
			border: 1px #000 solid;
			margin: 0;
		}
	</style>
</head>
<body>
	<h1>Regex - Funções</h1>

	<h3>preg_match - Retorna 1 se o padrão foi encontrado na string e 0 se não</h3>
	<p>Sintaxe: <b>preg_match(<i>regex</i>, <i>texto</i>)</b></p>
	<?php

		$resultados = array();

		array_push($resultados, 
			[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ola/i",
				'resultado' => function ($texto, $regex) {
					return preg_match($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/Ola/",
				'resultado' => function ($texto, $regex) {
					return preg_match($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ola/",
				'resultado' => function ($texto, $regex) {
					return preg_match($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/oLa/",
				'resultado' => function ($texto, $regex) {
					return preg_match($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/oLa/i",
				'resultado' => function ($texto, $regex) {
					return preg_match($regex, $texto);
				}
			]
		);

		mostrar_resultado($resultados);

	?>





	<h3>preg_match_all - Retorna o número de vezes que o padrão foi encontrado na string, que também pode ser 0</h3>
	<p>Sintaxe: <b>preg_match_all(<i>regex</i>, <i>texto</i>)</b></p>
	<?php

		$resultados = array();

		array_push($resultados, 
			[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ola/i",
				'resultado' => function ($texto, $regex) {
					return preg_match_all($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ola/",
				'resultado' => function ($texto, $regex) {
					return preg_match_all($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/Ola/",
				'resultado' => function ($texto, $regex) {
					return preg_match_all($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/oLa/",
				'resultado' => function ($texto, $regex) {
					return preg_match_all($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/oLa/i",
				'resultado' => function ($texto, $regex) {
					return preg_match_all($regex, $texto);
				}
			]
		);

		mostrar_resultado($resultados);

	?>





	<h3>preg_replace - Retorna uma nova string onde os padrões correspondentes foram substituídos por outra string</h3>
	<p>Sintaxe: <b>preg_replace(<i>regex</i>, <i>valor_substituto</i>, <i>texto</i>)</b></p>
	<?php

		$resultados = array();

		array_push($resultados, 
			[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ola/i",
				'resultado' => function ($texto, $regex) {
					return preg_replace($regex, "--", $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/o/i",
				'resultado' => function ($texto, $regex) {
					return preg_replace($regex, "--", $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ /i",
				'resultado' => function ($texto, $regex) {
					return preg_replace($regex, "--", $texto);
				}
			]
		);

		mostrar_resultado($resultados);

	?>






	<h3>preg_split Retorna um array de string, o qual é o resultado da divisão da string utilizando o regex como delimitador</h3>
	<p>Sintaxe: <b>preg_split(<i>regex</i>, <i>texto</i>)</b></p>
	<?php

		$resultados = array();

		array_push($resultados, 
			[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ola/i",
				'resultado' => function ($texto, $regex) {
					return preg_split($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/ /",
				'resultado' => function ($texto, $regex) {
					return preg_split($regex, $texto);
				}
			]
			,[
				'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola",
				'regex' => "/,/",
				'resultado' => function ($texto, $regex) {
					return preg_split($regex, $texto);
				}
			]
		);

		mostrar_resultado($resultados);

	?>





	<?php
		function mostrar_resultado($outs) {
			echo "<table>";
			echo 	"<thead>";
			echo 		"<tr>";
			echo 			"<th>Texto</th>";
			echo 			"<th>Expressão</th>";
			echo 			"<th>Resultado</th>";
			echo 		"</tr>";
			echo 	"</thead>";
			echo 	"<tbody>";

			foreach ($outs as $key => $value) {
				$result = $value['resultado']($value['texto'], $value['regex']);

				echo 		"<tr>";
				echo 			"<td>".$value['texto']."</td>";
				echo 			"<td>\"".$value['regex']."\"</td>";

				if(is_array($result)) {
					$line = "<td>";
					foreach ($result as $key => $value) {
						$line = $line."[$key] => $value<br>";
					}
					echo $line;
				} else
					echo 		"<td>".$result."</td>";

				echo 		"</tr>";

			}

			echo 	"</tbody>";
			echo "</table>";
		}
	?>





</body>
</html>