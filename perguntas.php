<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Regex</title>

	<style>
		body {
			overflow: hidden;
		}
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

		#questions {
			width: 100vw;
			display: grid;
			grid-template-columns: repeat(500, 100%);
			grid-template-rows: max-content;
			transition: 1.5s;
		}
		.question {
			width: 100%;
			display: flex;
			flex-direction: column;
			align-items: center;

		}
		.question > p, .answers {
			width: 100%;
			padding: 0 0 0 100px;
			font-size: 1.15rem
		}
		.code {
			width: 50vw;
			padding: 15px 35px;
			font-size: 1.2rem;
			background: #252525;
			border-radius: 20px;
		}
		.code > p {
			color: #bfbfbf;
		}
		var {
			color: #ad5eee;
		}
		.string {
			color: #c98443;
		}
		.regex {
			color: #e43535;
		}
		samp {
			color: #2f5bec;
		}
		.answers > li {
			margin: 25px;
		}
		.answers > li:hover {
			cursor: pointer;
			color: #989898;
		}
		.input {
			width: 80%;
			display: flex;
			justify-content: space-evenly;
			margin-top: 100px;
		}
		input {
			width: 20vw;
		}
		.buttons {
			width: 100%;
			display: flex;
			justify-content: space-evenly;
			margin-top: 30px;
		}
		button {
			font-size: 1.15rem;
			padding: 10px 25px;
			border-radius: 20px;
			border: 1px #252525 solid;
		}
	</style>
</head>
<body>

	<h1>Regex - Perguntas</h1>

	<section id="questions">
		<div class="question">
			<p>01 - Quero dividir o texto em uma lista de frutas, quais valores melhor preenchem as lacunas?</p>
			
			<div class="code">
				<p><var>$texto</var> = <span class="string">"Banana; Maça; Melancia; Manga"</span>;</p>
				<p><var>$regex</var> = <span class="string">"<span class="regex">/___________/</span>"</span>;</p>
				<p><samp>echo</samp> __________(<var>$regex</var>, <var>$texto</var>);<p>
			</div>

			<ol class="answers" type="A">
				<li>[ ]? - preg_match</li>
				<li class="ok">;\s - preg_split</li>
				<li>; {2,} - preg_split</li>
				<li>;? - preg_replace</li>
			</ol>

			<div class="buttons">
				<button class="back">Voltar</button>
				<button class="front">Avançar</button>
			</div>
		</div>

		<div class="question">
			<p>02 - Qual dos RegEx abaixo sempre pode encontrar uma string que começa com uma vogal e também termina com uma vogal</p>

			<ol class="answers" type="A">
				<li>/^[a-z][a-z]$</li>
				<li>/^\w.{1,}\w$/</li>
				<li>/^[aeiou][\w\s]*[^aeiou]$/i</li>
				<li class="ok">/^[aeiou].*[aeiou]$/i</li>
			</ol>

			<div class="buttons">
				<button class="back">Voltar</button>
				<button class="front">Avançar</button>
			</div>
		</div>

		<div class="question">
			<p>03 - Crie uma Expressão Regular que valide se uma string segue o padrão de números de telefone com os seguintes formatos: <br><br>
				<b>(XX) XXXX-XXXX</b><br>
				<b>(XX) XXXXX-XXXX</b>
			</p>

			<div class="answers input">
				<input type="text" id="regex-input" placeholder="Regex sem o delimitador"/>
				<button id="validate-input">Validar</button>
			</div>

			<div class="buttons">
				<button class="back">Voltar</button>
				<button class="front">Avançar</button>
			</div>
		</div>
	</section>
</body>

		<script type="text/javascript">
			const questions = document.getElementById("questions");
			const question_list = document.querySelectorAll("div.question");

			const answers = document.querySelectorAll("ol.answers li");
			const input = document.getElementById("regex-input");
			const validate = document.getElementById("validate-input");

			const back_btns = document.querySelectorAll("button.back");
			const front_btns = document.querySelectorAll("button.front");

			answers.forEach((ele) => {
				ele.addEventListener("click", function (e) {
					if(!ele.classList.contains("ok")) {
						ele.style.color = "red";
						return;
					}

					ele.style.color = "green";

					const actual = Number(questions.style.transform.replace(/translateX\(/, '').replace(/vw\)/, ''));

					if (actual != 0) {
						back_btns.forEach((ele) => {
							ele.style.opacity = "1";
						});
					}
					
					if (actual * -1 != question_list.length * 100 - 100) {
						front_btns.forEach((ele) => {
							ele.style.opacity = "1";
						});
					}
				});
			});

			input.addEventListener("input", () => {
				input.style.borderColor = "black";
			});

			validate.addEventListener("click", function (e) {
				let regex = input.value;

				const cellphone = [
					'(01) 12345-1234',
					'(11) 2345-2134',
					'(01)12345-1234',
					'() 1234-1344',
					'(5) 1234-1344',
					'(6) 123d4-1344',
					'(08)1234-1344'
				];

				for (let i = 0; i < cellphone.length; i++) {
					let result1 = cellphone[i].match(regex);
					let result2 = cellphone[i].match(/^\(\d{2}\) \d{4,5}-\d{4}$/);
					if ((result1 == null && result2 != null) || (result1 != null && result2 == null) || (result1 != null && result2 != null && result1.length != result2.length)) {
						input.style.borderColor = "red";
						return;
					}
				}

				input.style.borderColor = "green";

				const actual = Number(questions.style.transform.replace(/translateX\(/, '').replace(/vw\)/, ''));
				if (actual != 0) {
					back_btns.forEach((ele) => {
						ele.style.opacity = "1";
					});
				}
				
				if (actual * -1 != question_list.length * 100 - 100) {
					front_btns.forEach((ele) => {
						ele.style.opacity = "1";
					});
				}
			});

			back_btns.forEach((ele) => {
				ele.style.opacity = "0";
			});
			front_btns.forEach((ele) => {
				ele.style.opacity = "0";
			});

			back_btns.forEach((ele) => {
				ele.addEventListener("click", function (e) {
					if (ele.style.opacity == 0) return;

					const actual = questions.style.transform.replace(/translateX\(/, '').replace(/vw\)/, '');
					const num = (Number(actual) + 100);
					questions.style.transform = "translateX(" + num +"vw)"

					if (num == 0) {
						back_btns.forEach((ele) => {
							ele.style.opacity = "0";
						});
					}
				});
			});

			front_btns.forEach((ele) => {
				ele.addEventListener("click", function (e) {
					if (ele.style.opacity == 0) return;

					const actual = questions.style.transform.replace(/translateX\(/, '').replace(/vw\)/, '');
					const num = (Number(actual) - 100);
					questions.style.transform = "translateX(" + num +"vw)";

					back_btns.forEach((ele) => {
						ele.style.opacity = "0";
					});
					front_btns.forEach((ele) => {
						ele.style.opacity = "0";
					});
				});
			});

		</script>

</html>