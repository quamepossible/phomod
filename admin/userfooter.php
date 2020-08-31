    
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title text-center text-warning" id="editModalLongTitle">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body text-light">
            <p id="show"></p>
            <form method="POST" action="update.php" id="myForm">   

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationServerName">Full name*</label>
                    <input value="<?php echo $name;?>" name="fullname" type="text" class="form-control" id="validationServerName" placeholder="Full name">
                    <div class="invalid-feedback">
                        Enter full name.
                    </div>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="validationServerUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input value="<?php echo $username;?>" name="username" type="text" class="form-control" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3" readonly>
                        
                    </div>
                    </div>


                    <div class="col-md-4 mb-3">
                    <label for="validationServerPhone">Phone*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3">+233</span>
                        </div>
                        <input value="<?php echo $phone;?>" name="phone" type="text" class="form-control" id="validationServerPhone" placeholder="Phone number" aria-describedby="inputGroupPrepend3">
                        <div class="invalid-feedback" id="phone">
                        Enter phone number.
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
                        <input value="<?php echo $whatsapp;?>" name="whatsapp" type="text" class="form-control" id="validationServerWhatsapp" placeholder="Whatsapp number" aria-describedby="inputGroupPrepend3">
                    
                    </div>
                    </div>


                    <div class="col-md-4 mb-3">
                    <label for="validationServerInsta">Instagram</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="logo-instagram" class="ico insta"></ion-icon></span>
                        </div>
                        <input value="<?php echo $instagram;?>" name="instagram" type="text" class="form-control" id="validationServerInsta" placeholder="www.instagram.com/username" aria-describedby="inputGroupPrepend3">
                        
                    </div>
                    </div>


                    <div class="col-md-4 mb-3">
                    <label for="validationServerWebsite">Website</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="globe" class="ico web"></ion-icon></span>
                        </div>
                        <input value="<?php echo $website;?>" name="website" type="text" class="form-control" id="validationServerWebsite" placeholder="www.yourwebsite.com" aria-describedby="inputGroupPrepend3">
                    
                    </div>
                    </div>
                </div>

                <!-- SECOND ROW ------SOCIAL LINKS -->

                <!-- EMAIL AND PASS -->
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationServerEmail">Email*</label>
                    <input value="<?php echo $email;?>" name="email" type="email" class="form-control" id="validationServerEmail" placeholder="user@mail.com">
                    <div class="invalid-feedback">
                    Enter a valid email.
                    </div>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="validationServerRegion">Region*</label>
                    <input value="<?php echo $region;?>" name="region" type="text" class="form-control" id="validationServerRegion" placeholder="Eg; Greater Accra, Ashanti, Northern">
                    <div class="invalid-feedback">
                    Enter a valid Region.
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationServerTown">City/Town*</label>
                    <input value="<?php echo $city;?>" name="city" type="text" class="form-control" id="validationServerTown" placeholder="Eg; Kumasi, Tema, Abuakwa, Mankesim">
                    <div class="invalid-feedback">
                    Enter a valid city/town.
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationServerCompany">Company Name</label>
                    <input value="<?php echo $company;?>" name="company" type="text" class="form-control" id="validationServerCompany" placeholder="Eg; A+ photography">
                    
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="validationServerType">Lancer type</label>
                    <input value="<?php echo $type;?>" name="lancer" type="text" class="form-control" value="Photographer" readonly>
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationServerCategory">Categories (separate with comma)*</label>
                    <input value="<?php echo $category;?>" name="category" type="text" class="form-control" id="validationServerCategory" placeholder="Eg; Wedding, graduation, portrait">
                    <div class="invalid-feedback">
                    Enter a valid category.
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationServerDays">Working days*</label>
                    <input value="<?php echo $days;?>" name="days" type="text" class="form-control" id="validationServerDays" placeholder="Eg; Mon - Fri, Mon - Sun">
                    <div class="invalid-feedback">
                    Enter working days.
                    </div>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="validationServerTrav">Available for travel</label>
                    <input value="<?php echo $travel;?>" name="travel" type="text" class="form-control" id="validationServerTrav" readonly>
                        
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="customFile">Choose profile picture*</label><br>
                        <input name="pic" type="file" id="customFile" id="validationServerImage"  accept="image/x-png,image/gif,image/jpeg">
                    </div>

                </div>

                <button class="btn btn-primary signup" id="save">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" style="margin-left: 10px">Cancel</button>
            </form>
        </div>
        
    </div>
  </div>
</div>
<!-- MODAL -->

<script src="rev.js" defer></script>

<script>
$("#myForm").keypress(function(e) {
  //Enter key
  if (e.which == 13) {
    return false;
  }
});
</script>
    
</body>
</html>
   