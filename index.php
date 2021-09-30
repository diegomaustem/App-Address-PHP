<?php 



?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>App Pesquisa Endereço</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
		
		<nav class="navbar navbar-light bg-light mb-4">
			<div class="container">
				<div class="navbar-brand mb-0 h1">
					<h3>App Pesquisa Endereço</h3>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row form-group">
				<div class="col-sm-3">
					<input type="text" class="form-control" placeholder="CEP" onblur="getDadosEnderecoPorCep(this.value)" />
				</div>
				<div class="col-sm-9">
					<input type="text" id="end" class="form-control" placeholder="Endereço" readonly />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-sm-6">
					<input type="text" id="bairro" class="form-control" placeholder="Bairro" readonly />
				</div>
				<div class="col-sm-4">
					<input type="text" id="cidade" class="form-control" placeholder="Cidade" readonly />
				</div>

				<div class="col-sm-2">
					<input type="text" id="uf" class="form-control" placeholder="UF" readonly />
				</div>
			</div>
		</div>
	</body>
</html>

<script> 

	function getDadosEnderecoPorCep(cep){

		let url = 'https://viacep.com.br/ws/'+cep+'/json/unicode/'

		let xmlHttp = new XMLHttpRequest()
		xmlHttp.open('GET', url)

		xmlHttp.onreadystatechange = () => {
			if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
						
				let dadosJSONText = xmlHttp.responseText
				let dadosJSONobj = JSON.parse(dadosJSONText)
				showValuesFilds(dadosJSONobj)								
			}

			if(xmlHttp.readyState == 4 && xmlHttp.status == 404) {
				document.write('Arquivo não encontrado!');
			}
		}

		xmlHttp.send()

	}

	function showValuesFilds(dadosJSONobj){
		let dados = dadosJSONobj
		
		document.getElementById('end').value = dados.localidade
		document.getElementById('bairro').value = dados.bairro
		document.getElementById('cidade').value = dados.localidade
		document.getElementById('uf').value = dados.uf
	}

</script>