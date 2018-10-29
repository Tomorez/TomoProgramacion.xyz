<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>TomoProgramación</title>
	<link rel="stylesheet" type="text/css" href="CSS/bs4/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.css">
	<style>
		.tag{
			border:1px solid black;
			font-size:0.75em;
		}
		body{
			background: #ccc;
		}
		.proyecto{
			background-color:white;
			padding: 1em;
			margin:1em;
    		box-shadow: 5px 5px;
    	}
    	.proyecto img{
    		height: 200px;
    		width: 200px;
    	}
	</style>
</head>
	
<body>
	<div class="container p-4">
	<div class="jumbotron">
		<h1>TomoProgramación.xyz</h1>
		<h2><em>De todo un poco,ademas de mucho por mejorar y optimizar.</em></h2>
	</div>

<?php 
	$folder = scandir("github");
		foreach ($folder as $key => $value) {

		if($value!=".." && $value!="." && !is_file("GitHub/".$value)){
		$xml = "github/".$value."/description.xml";
		$repositorio = simplexml_load_file($xml);
			?>
		
		<div class="proyecto">
			<img src="img\lang\<?=$repositorio->icono?>.png" class="float-left m-3" >
			<h2><?=$repositorio->titulo?></h2>
			<p><?=$repositorio->descripcion?>
			<hr><em>Creado: <?=date("F d Y H:i:s.", filectime($xml)) ?></em>
			</p>
			<p>
			<?php foreach($repositorio->categorias[0] as $item){ ?>
			<span class="tag p-1 mr-1" >
				<?=$item?>
			</span>
			<?php } ?>
			</p>
			<?php if($repositorio->demo=="true"){ ?>
			<a href="github/<?=$value?>/index.php" target="_blank" class="btn btn-info btn-sm">Ver demo</a> 
			<?php } ?>
			<a class="btn btn-success btn-sm" target="_blank" href="<?=$repositorio->repositorio ?>">Enlace GitHub</a>
			<a class="btn btn-warning btn-sm" href="<?=$repositorio->descarga ?>">Descargar</a>
			
			<div class="clearfix"></div>
		</div>		
		<?php }
		} ?>
	</div>
</body>
  <script src="JS\jquery-3.2.1.min.js"></script>

  <script src="JS\jquery-ui.js"></script>
  <script src="JS\bs4\tether.min.js"></script>
  <script src="JS\bs4\popper.min.js"></script>
  <script src="JS\bs4\bootstrap.min.js"></script>
  <script src="JS\script.js"></script>
</html>
