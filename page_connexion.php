<html>
<!DOCTYPE html>
  <head>
    <link rel="stylesheet" type="text/css" href="./css/pageconnexion.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>	
    	<meta charset="utf-8">
  </head>
  <?php $pas_present = false; ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Connexion</h5>
            <form method= "post" action="config.php" class="form-signin" >
              <div class="form-label-group">
                <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
                <label for="pseudo">Pseudo</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="pass" id="pass" placeholder="Mot de passe" class="form-control"  required>
                <label for="pass">Mot de passe</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1" onclick="afficher()">Afficher mot de passe</label>
              </div> 
              
              <button class="btn btn-danger btn-lg btn-block" id: "button" type="submit">Connexion</button>
               <script>
       function afficher() {
    	   var x = document.getElementById("pass");
    	   if (x.type === "password") {
    	     x.type = "text";
    	   } else {
    	     x.type = "password";
    	   }
    	 }
       </script>
       
 
 <?php 

if(($pas_present)== true)
{
 ?>
    
    <html>
    
    <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Mauvais pseudo ou mot de passe</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
    </div>
  </div>
</div>
    
    </html>
    
<?php 
}

?>



        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>