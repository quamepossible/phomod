
<div class="sec-title">
    <p class="feat-text">SIGN UP AS A FREELANCER</p>
</div>

<div class="myform">
<img src="../logo.png" class="log" alt="" width="100px" style="display:block;margin:auto;margin-bottom:20px;border-radius:50%">

<form action="proc.php" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
<?php if(isset($_GET['err'])):?>
    <p class="errnot" style="color:orange;font-weight:bold">Please check the following errors</p>
    <?php $errMes = $_GET['err']?>
        <p style="color:red"><?php echo $errMes?></p>
        
<?php endif?>

<?php if(isset($_GET['det'])):?>
  <?php 
    $details = $_GET['det'];
  ?>
  <?php else:?>
    <?php 
      for($i = 0; $i < 11; $i++){
          $details[$i] = '';
      }
    ?>
<?php endif?>

<div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationServerName">Full name*</label>
      <input name="fullname" value="<?php echo $details[0]?>" type="text" class="form-control" id="validationServerName" placeholder="Full name">
      <div class="invalid-feedback">
          Please enter your full name.
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationServerUsername">Username*</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
        </div>
        <input name="username" value="<?php echo $details[1]?>" type="text" class="form-control" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3">
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>


    <div class="col-md-4 mb-3">
      <label for="validationServerPhone">Phone*</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">+233</span>
        </div>
        <input name="phone" value="<?php echo $details[2]?>" type="text" class="form-control" id="validationServerPhone" placeholder="Phone number" aria-describedby="inputGroupPrepend3">
        <div class="invalid-feedback" id="phone">
          Please enter phone number.
        </div>
      </div>
    </div>
</div>

<!-- SECOND ROW ------SOCIAL LINKS -->
<div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationServerWhatsapp">Whatsapp</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="logo-whatsapp" class="ico whats"></ion-icon></span>
        </div>
        <input name="whatsapp" value="<?php echo $details[3]?>" type="text" class="form-control" id="validationServerWhatsapp" placeholder="Whatsapp number" aria-describedby="inputGroupPrepend3">
      
      </div>
    </div>


    <div class="col-md-4 mb-3">
      <label for="validationServerInsta">Instagram</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="logo-instagram" class="ico insta"></ion-icon></span>
        </div>
        <input name="instagram" value="<?php echo $details[4]?>" type="text" class="form-control" id="validationServerInsta" placeholder="www.instagram.com/username" aria-describedby="inputGroupPrepend3">
        
      </div>
    </div>


    <div class="col-md-4 mb-3">
      <label for="validationServerWebsite">Website</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="globe" class="ico web"></ion-icon></span>
        </div>
        <input name="website" value="<?php echo $details[5]?>" type="text" class="form-control" id="validationServerWebsite" placeholder="www.yourwebsite.com" aria-describedby="inputGroupPrepend3">
       
      </div>
    </div>
</div>

<!-- SECOND ROW ------SOCIAL LINKS -->

<!-- EMAIL AND PASS -->
<div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationServerEmail">Email*</label>
      <input name="email" value="<?php echo $details[6]?>" type="email" class="form-control" id="validationServerEmail" placeholder="user@mail.com">
      <div class="invalid-feedback">
        Please provide a valid email.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServerPassOne">Password*</label>
      <input autocomplete="new-password" name="pass" type="password" class="form-control" id="validationServerPassOne" placeholder="*****">
      <div class="invalid-feedback" id="passOn">
        Please provide a valid password.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServerPassTwo">Confirm password*</label>
      <input type="password" class="form-control" id="validationServerPassTwo" placeholder="*****">
      <div class="invalid-feedback" id="pass">
        Please provide a valid password.
      </div>
    </div>
  </div>

  <!-- EMAIL AND PASS -->



<!-- THIRD ROW ------LOCATION -->
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationServerRegion">Region*</label>
      <input name="region" value="<?php echo $details[7]?>" type="text" class="form-control" id="validationServerRegion" placeholder="Eg; Greater Accra, Ashanti, Northern">
      <div class="invalid-feedback">
        Please provide a valid Region.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServerTown">City/Town*</label>
      <input name="city" value="<?php echo $details[8]?>" type="text" class="form-control" id="validationServerTown" placeholder="Eg; Kumasi, Tema, Abuakwa, Mankesim">
      <div class="invalid-feedback">
        Please provide a valid city/town.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServerCompany">Company Name</label>
      <input name="company" value="<?php echo $details[9]?>" type="text" class="form-control" id="validationServerCompany" placeholder="Eg; A+ photography">
      
    </div>
  </div>

  <!-- THIRD ROW ------LOCATION -->



  
<!-- WORK TYPE -->
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationServerType">Lancer type</label>
      <select name="lancer" type="text" class="custom-select">
          <option value="" selected>Who are you?</option>
          <option value="photographer">I'm a Photographer</option>
          <option value="model">I'm a Model</option>
      </select>
      <div class="invalid-feedback">
        Please select profession.
      </div>
    </div>
    
    <div class="col-md-4 mb-3">
      <label for="validationServerCategory">Categories (separate with comma)*</label>
      <select name="category[]" class="form-control drop-cat" id="validationServerCategory" multiple="multiple">
          <option value='Photography' selected>Photography</option>
          <option value='Modelling'>Modelling</option>
          <option value='Matriculation'>Matriculation</option>
          <option value='Wedding'>Wedding</option>
      </select>
      <div class="invalid-feedback">
        Please enter category.
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationServerDays">Working days*</label>
      <input name="days" value="<?php echo $details[10]?>" type="text" class="form-control" id="validationServerDays" placeholder="Eg; Mon - Fri, Mon - Sun">
      <div class="invalid-feedback">
        Please provide a valid working days.
      </div>
    </div>
  </div>

  <!-- WORK TYPE -->

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationServerTrav">Available for travel</label>
      <select name="travel" class="custom-select" id="validationServerTrav">
          <option value='' selected>Select one</option>
          <option value='yes'>YES</option>
          <option value='no'>NO</option>
      </select>
      <div class="invalid-feedback">
        Please select availability to travel
      </div>
    </div>

    <div class="col-md-8 mb-3">
        <label for="customFile">Choose profile picture*</label><br>
        <input name="pic" type="file" id="customFile" id="validationServerImage"  accept="image/x-png,image/gif,image/jpeg">
    </div>

  </div>


<!-- TERMS AND CONDITIONS -->
  <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck3">
      <label class="form-check-label" for="invalidCheck3">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div> -->

  <button class="btn btn-primary signup" type="submit">Sign up</button>
</form>
</div>
