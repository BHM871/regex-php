
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
	<h1>Regex - Metalinguagem</h1>

	<h3>Padrões</h3>

	<ul>
		<li>[abc] - Encontre um ou muitos dos caracteres dentro dos colchetes</li>
		<li>[^abc] - Encontre qualquer caractere NÃO entre parênteses</li>
		<li>[A-z] - Encontre qualquer caractere em ordem alfabética entre duas letras</li>
		<li>[123] - Encontre um ou muitos dos dígitos dentro dos colchetes</li>
		<li>[3-8] - Encontre quaisquer dígitos entre os dois números</li>
	</ul>

	<?php

		$resultados = array();

		array_push($resultados, [
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/[oab]/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/[^abco]/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/[a-c]/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/[A-z]/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/[0-4]/"
		]);

		mostrar_resultado($resultados);

	?>





	<h3>Metacaracteres</h3>

	<ul>
		<li>| - Encontre uma correspondência para qualquer um dos padrões separados por | como em: gato|cachorro|peixe</li>
		<li>. - Encontre qualquer personagem</li>
		<li>^ - Encontra uma correspondência como o início de uma string como em: ^Olá</li>
		<li>$ - Encontra uma correspondência no final da string como em: World$</li>
		<li>\d - Encontre quaisquer dígitos</li>
		<li>\D - Encontre qualquer não-dígito</li>
		<li>\s - Encontre qualquer caractere de espaço em branco</li>
		<li>\S - Encontre qualquer caractere que não seja espaço em branco</li>
		<li>\w - Encontre qualquer letra alfabética (a a Z) e dígito (0 a 9)</li>
		<li>\W - Encontre qualquer caractere não alfabético e não dígito</li>
	</ul>

	<?php

		$resultados = array();

		array_push($resultados, [
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/T|,/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/o./"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/^Ola/i"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/89$/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/\d/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/\D/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/\s/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/\S/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/\w/"
		]
		,[
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/\W/"
		]);

		mostrar_resultado($resultados);

	?>





	<h3>Quantificadores</h3>

	<ul>
		<li>x<b>+</b> - Corresponde a qualquer string que contenha pelo menos um x</li>
		<li>x<b>*</b> - Corresponde a qualquer string que contenha zero ou mais ocorrências de x</li>
		<li>x<b>?</b> - Corresponde a qualquer string que contenha zero ou uma ocorrência de x</li>
		<li>x<b>{3}</b> - Corresponde a qualquer string que contenha uma sequência de 3 x's</li>
		<li>x<b>{2,6}</b> - Corresponde a qualquer string que contenha uma sequência de pelo menos 2, mas não mais do que 5 x's</li>
		<li>x<b>{5,}</b> - Corresponde a qualquer string que contenha uma sequência de pelo menos 3 x's</li>
	</ul>

	<?php

		$resultados = array();

		array_push($resultados, [
			'texto' => "Olaaaaaa mundo, como foi seu dia? Tudo bem, oiiii.",
			'regex' => "/a+/"
		]
		,[
			'texto' => "Olaaaaaa mundo, como foi seu dia? Tudo bem, oiiii.",
			'regex' => "/o*/"
		]
		,[
			'texto' => "Olaaaaaa mundo, como foi seu dia? Tudo bem, oiiii.",
			'regex' => "/[a-z] ?/"
		]
		,[
			'texto' => "Olaaaaaa mundo, como foi seu dia? Tudo bem, oiiii.",
			'regex' => "/i{3}/"
		]
		,[
			'texto' => "Olaaaaaa mundo, como foi seu dia? Tudo bem, oiiii.",
			'regex' => "/a{1,6}/"
		]
		,[
			'texto' => "Olaaaaaa mundo, como foi seu dia? Tudo bem, oiiii.",
			'regex' => "/a{5,}/"
		]);

		mostrar_resultado($resultados);

	?>





	<h3>Agrupador</h3>

	<ul>
		<li>(  ) - podem ser usados para selecionar partes do padrão para serem usadas como	correspondência.</li>
	</ul>

	<?php
		
		$resultados = array();

		array_push($resultados, [
			'texto' => "Ola mundo, como foi seu dia? Tudo bem, ola. 1234567890",
			'regex' => "/(\w\s)|(\s\w)/"
		]);

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
				$result = preg_replace_callback(
					$value['regex'],
					function ($matches) {
						return "<span style='background: red'>".$matches[0]."</span>";
					},
					$value['texto']
				);

				echo 		"<tr>";
				echo 			"<td>".$value['texto']."</td>";
				echo 			"<td>\"".$value['regex']."\"</td>";
				echo 			"<td>".$result."</td>";
				echo 		"</tr>";

			}

			echo 	"</tbody>";
			echo "</table>";
		}
	?>





</body>
</html>