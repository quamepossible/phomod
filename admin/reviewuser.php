<?php $title = 'REVIEW USER'?>
<?php include 'userheader.php'?>
<?php if($verified == 'YES'):?>
    <?php header('Location: freelancers.php?name='.$username)?>
<?php else:?>
    <section class="main bg-secondary">
        <div class="row">
            <div class="one-of-three"> 
                
                <div class="action">
                    <div class="row">
                        <div class="las-row">
                            <button class="edit btn btn-primary" data-toggle='modal' data-target='#editModal'>
                            <ion-icon name="create-outline" class="edi-ico"></ion-icon>
                            Edit
                            </button>
                        </div>

                        <div class="las-row">
                            <form action="verify.php" method="POST">
                                <input name="user" type="text" value="<?php echo $username?>" style="visibility:hidden;display:none;">
                                <input name="ver" type="text" value="<?php echo $verified?>" style="visibility:hidden;display:none;">
                                <button class="btn btn-success" id="verify"><ion-icon name="checkmark-done-outline" class="ver-ico"></ion-icon>Verify</button>
                            </form>
                        </div>


                        <div class="las-row">
                            <button class="delete btn btn-danger" onclick="swalfun()">
                            <ion-icon name="create-outline" class="del-ico"></ion-icon>
                                Delete
                            </button>
                        </div>                                                                                                
                    </div>                                       
                </div>

                <div class="pic" style="background:url('../profilepic/<?php echo $pic?>');background-position:center;background-size:cover;">

                </div>

            </div>

            <div class="two-of-three">
                <p class="title bg-secondary text-light">
                <ion-icon name="person-outline" class='user-ico'></ion-icon>User Details
                </p>

                <div class="details">
                    <div class="row">
                        <div class="card text-white bg-primary mb-5 text-light bg-dark">
                            <div class="card-header text-warning">Personal info</div>
                            <div class="card-body text-info">
                                <p class="info card-text"><b>NAME :</b><span class='info-span text-light'><?php echo $name?></span></p>
                                <p class="info card-text"><b>USERNAME :</b><span class='info-span text-light'><?php echo $username?></span></p>
                                <p class="info card-text"><b>PROFILE ID :</b><span class='info-span text-light'><?php echo $profid?></span></p>
                            </div>
                            
                        </div>

                        <div class="card text-white bg-primary mb-5 text-light bg-dark">
                            <div class="card-header text-warning">Address & Account</div>
                            <div class="card-body text-info">
                            <p class="info"><b>REGION :</b><span class='info-span text-light'><?php echo $region?></span></p>
                            <p class="info"><b>CITY :</b><span class='info-span text-light'><?php echo $city?></span></p>
                            <p class="info"><b>DATE CREATED :</b><span class='info-span text-light'><?php echo $date?></span></p>
                            <p class="info"><b>TIME :</b><span class='info-span text-light'><?php echo $time?></span></p>

                            </div>
                        </div>
                    
                        <div class="card text-white bg-primary mb-5 text-light bg-dark">
                            <div class="card-header text-warning">Contact details</div>
                            <div class="card-body text-info">
                                <p class="info"><b>PHONE :</b><span class='info-span text-light'><?php echo $phone?></span></p>
                                <p class="info"><b>WHATSAPP :</b><span class='info-span text-light'><?php echo $whatsapp?></span></p>
                                <p class="info"><b>WEBSITE :</b><span class='info-span text-light'><?php echo $website?></span></p>
                                <p class="info"><b>INSTAGRAM :</b><span class='info-span text-light'><?php echo $instagram?></span></p>
                                <p class="info"><b>EMAIL :</b><span class='info-span text-light'><?php echo $email?></span></p>
                            </div>
                        </div>
                        
                        <div class="card text-white bg-primary mb-5 text-light bg-dark">
                            <div class="card-header text-warning">Company</div>
                            <div class="card-body text-info">
                                <p class="info"><b>LANCER TYPE :</b><span class='info-span text-light'><?php echo $type?></span></p>
                                <p class="info"><b>COMPANY NAME :</b><span class='info-span text-light'><?php echo $company?></span></p>
                                <p class="info"><b>WORKING DAYS :</b><span class='info-span text-light'><?php echo $days?></span></p>
                                <p class="info"><b>CATEGORY :</b><span class='info-span text-light'><?php echo $category?></span></p>
                                <p class="info"><b>TRAVEL :</b><span class='info-span text-light'><?php echo $travel?></span></p>
                
                            </div>
                        </div>    
                        
                        <div class="card text-white bg-primary mb-12 text-light bg-dark">
                            <div class="card-body text-info">
                            <p class="info"><b>VERIFIED :</b><span class='info-span text-light'><?php echo $verified?></span></p>
                            <p class="info"><b>FEATURED :</b><span class='info-span text-light'><?php echo $featured?></span></p>

                            </div>
                        </div> 

                    </div>
                    
                
                </div>
            </div>
        </div>
    </section>
<?php endif?>


<?php include 'userfooter.php'?>