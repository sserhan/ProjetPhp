<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="signup.css">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container">
    <h1 class="well">Inscription</h1>
	<div class="col-lg-12 well">
	<div class="row">
		{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal panel']) !!}

					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Nom</label>
								<input type="text" name="nom" placeholder="Entrez Votre Nom.." class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Prenom</label>
								<input type="text" name="prenom" placeholder="Entrez Prenom.." class="form-control">
							</div>
							<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
								{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
								{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
							</div>
							
						</div>
						<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="Upload photo">Photo de Profil</label>
  <div class="col-md-4">
    <input id="Upload photo" name="photo" class="input-file" type="file">
  </div>
</div>
						<div class="col-sm-6 form-group">
								<label>date de naissance</label>
								<input id="date"  name="date_naissance" type="date">
						</div>
						<div class="row">
						<div class="col-sm-4 form-group">
						<form>
						<label>Groupes</label>
						<select name="groupe" size="l">
						<option>Etudiant
						<option>Enseignant
						<option>Ex-Etudiant
						</select>
						<br></br>
						<div>
						<form>
						<label>Niveau d'etude</label>
						<select name="niveau" size="l">
						<option>L1
						<option>L2
						<option>L3
						<option>M1
						<option>M2
						</select>
						</div>
						</div></div>			
						<div class="col-sm-6 form-group">
						<label>Entreprise</label>
						<input type="text" name="entreprise" placeholder="Nom Entreprise.." class="form-control">
						</div>							
					<div class="form-group">
						<label>Numero de telephone</label>
						<input type="text" name="numero" placeholder="Entrez Votre Numero.." class="form-control">
					</div>		
					<div class="form-group">
						<label>Address Mail</label>
						<input type="text" name="email" placeholder="Entrez Votre Email.." class="form-control">
					</div>	
					<div class="form-group">
						<label>Linkedin</label>
						<input type="text" name="linkedin" placeholder="Entrez Votre Adresse Linkedin.." class="form-control">
					</div>

						<label>
							{!! Form::checkbox('admin', 1, null) !!} Administrateur
						</label>
					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
	</div>
	</div>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>