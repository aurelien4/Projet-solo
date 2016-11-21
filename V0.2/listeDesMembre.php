<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include_once "include/connexion_base.php" ?>
		<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- bootstap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php  $admin = $dbh->prepare('SELECT * FROM super_users WHERE ID_user = ?');
		$admin->execute(array($_SESSION['ID']));
		$donnee = $admin->fetch();
include_once "include/header.php"; ?>
<?php $membre = $dbh->query('SELECT ID_user, email, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription_fr FROM users ORDER BY ID_user');
	 ?>

	 <div class="container">
	 	<div class="row">
	 		<div class="col-md-offset-2 col-md-8 tableM col-xs-12">
	 		<div class="col-md-3">
	 			Membres
	 		</div>
	 		<div class="col-md-3">
	 			Pseudo
	 		</div>
	 		<div class="col-md-3">
	 			Date d'inscription
	 		</div>
	 		</div>	
	 	</div>
	 	<?php while($data = $membre->fetch()){ ?>

	 	<div class="row ">
	 		<div class="col-md-offset-2 col-md-8 tableM col-xs-12">
		 		<div class="col-md-3">
		 			<?php echo $data['email']; ?>
		 		</div>
		 		<div class="col-md-3">
		 			<?php echo $data['pseudo']; ?>
		 		</div>
		 		<div class="col-md-3">
		 			<?php echo $data['date_inscription_fr']; ?>
		 		</div>
		 		<?php if($data['email'] != $_SESSION['mail']){ ?>
		 		<div class="col-md-2">
		 			<!-- Split button -->
						<div class="btn-group">
						  <button type="button" class="btn btn-danger">ban</button>
						  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="caret"></span>
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu">
						  <form action="bantempo.php?azef=<?php echo $data['ID_user'] ?>" method="POST">
						    <li><input style="color:black" type="time" id="fattest" name="heure"></li>
						    <li><input style="color:black" type="date" name="date"></li>
						    <li role="separator" class="divider"></li>
						    <li><button>suspendre</button></li>
						  </form>
						  </ul>
						</div>
		 			 		</div>
		 		<div class="col-md-1">
		 			<a href="ban.php?azee=<?php echo $data['ID_user']; ?>">bannir</a>
		 		</div>
		 		<?php } ?>
	 		</div>	
	 	</div>
	 	<?php } ?>
	 </div>

<script type="text/javascript" src="script/script.js"></script>
	 <script type="text/javascript" src="script/scriptajax.js"></script>
</body>
</html>