<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?= asset("style.min.css"); ?>" />

	<link rel="icon" type="image/png" href="<?= asset("images/favicon.png"); ?>" />

	<title>COVID19 | <?= $title ?></title>

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light bg--navbar">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarToggler">
			<a class="navbar-brand" href="<?= site() ?>">
				<img class="brand--img--top" src="<?= asset("/images/favicon.png"); ?>" alt="LOGO">
			</a>
			
		</div>

	</nav>

	<div class="container">
		<?= $v->section("content"); ?>
	</div>

	<footer>
		<p>Todos os direitos reservados – COVID19 <?=date('Y')?></p>
		<p>Todas as marcas comerciais, nomes comerciais, marcas de serviço e logotipos aqui mencionados pertencem às suas respectivas empresas</p>
	</footer>

	<script src="<?= asset("/script.min.js"); ?>"></script>

	<?= $v->section("scripts"); ?>

</body>

</html>