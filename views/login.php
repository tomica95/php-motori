<?php 
  if(isset($_SESSION['user'])){


    Header('Location:index.php');
  }

?>
<?php include"php/login.php"?>
 <!-- Main Content -->
 <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Ukoliko ste registrovani molimo Vas da se ulogujete</p>
         
          
          
          <form name="sentMessage" id="contactForm" method="POST" action="<?=$_SERVER['PHP_SELF']?>?page=login" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Email" id="tbMail" name="tbMail">
                <p class="help-block" id="mistake-username"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" id="tbPassword" required name="tbPassword">
                <p class="help-block " id="mistake-password"></p>
              </div>
            </div>
            </br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton" name="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <hr>