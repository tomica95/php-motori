<?php 
  //branimo mu da ode na registraciju kad je ulogovan
  if(isset($_SESSION['user'])){

    Header("Location:index.php?page=index");
  }


?>
<?php include "php/registration.php" ?>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>U koliko zelite da ostavite komentar morate se registrovati! Za prava admina morate kontaktirati administratora</p>
         
          
          
          <form name="sentMessage" id="contactForm" method="POST" action="<?=$_SERVER['PHP_SELF']?>?page=registration" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" id="tbUsername" name="tbUsername">
                <p class="help-block" id="mistake-username"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="tbEmail" required name="tbEmail">
                <p class="help-block " id="mail-mistake"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" id="tbPassword" required name="tbPassword">
                <p class="help-block " id="mistake-password"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Ponovite Password</label>
                <input type="password" class="form-control" placeholder="Ponovite password" id="tbPassword2" required name="tbPassword2">
                <p class="help-block " id="mistake-password2"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton" name="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <hr>
    <script src="js/registration.js"></script>

   