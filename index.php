<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Proyecto vacío</title>
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
		<h1>Tomoprogramación.xyz</h1>
		<h2><em>De todo un poco</em></h2>
	</div>
<?php 
	$folder = scandir("github");
		foreach ($folder as $key => $value) {

		if($value!=".." && $value!="." && !is_file("GitHub/".$value)){
		$xml = "github/".$value."/description.xml";
		$proyecto = simplexml_load_file($xml);
			?>
		
		<div class="proyecto">
			<img src="img\java.png" class="float-left">
			<h2><?=$proyecto->titulo?></h2>
			<p><?=$proyecto->descripcion?>
			<hr><em>Editado ultima vez: <?=date("F d Y H:i:s.", filectime($xml)) ?></em>
			</p>
			<p>
			<?php foreach($proyecto->categorias[0] as $item){ ?>
			<span class="tag p-1 mr-1" >
				<?=$item?>
			</span>
			<?php } ?>
			</p>
			<a href="#" class="btn btn-info btn-sm">Ver mas</a> <a class="btn btn-success btn-sm" href="<?=$proyecto->repositorio ?>">Enlace GitHub</a>
			
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
