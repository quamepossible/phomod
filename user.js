function rateg(){
    var rateNum = $('.votnum').val();
    if(rateNum.length == 0){
        return false;
    }

    else{
        return true;
    }
}

//CHECK IF STAR FORM IS AVAILABLE
var starForm = $('.rat-form');
if(starForm.length > 0){
    //THEN USER IS LOGGED IN
    $('.rate-btn').click(function(){
        $(this).hide();
        $('.rat-form').css('display', 'block');
    })

}

else{
    $('.rate-btn').click(function(){
        alert('please login to rate');
    })
}




$(document).ready(function(){
    $('.main').css('display', 'block');
    $('.grand').css('display', 'none');
    var holder = document.querySelector('.dp');
    var childer = document.querySelector('.hold-a');
    holder.addEventListener("mouseover", function(){
        childer.style.visibility = "visible";
    })

    holder.addEventListener("mouseout", function(){
        childer.style.visibility = "hidden";
    })

    //UPLOAD DP AJAX

    $('.dp-form').submit(function(event){
        event.preventDefault();


        // var username = $('.username').val();
        // console.log(file)

        $.ajax({
            method : 'POST',
            url : 'upload.php',
            processData : false,
            contentType : false,
            data : new FormData(this),
            success : function(res){
                console.log("success");
                console.log(res);
                location.reload();
            },
            error : function(data){
                console.log("failed")
                console.log(data)

            }
        })
    });

    //GALLERY UPLOAD
    $('.gal-upl').submit(function(event){
        event.preventDefault();
        var getForm = $('.muluser').parents('form');
        var nameInp = getForm[0].getElementsByTagName('input')[1].value;
        console.log(nameInp)
        $.ajax({
            method : 'POST',
            url : 'multimg.php',
            processData : false,
            contentType : false,
            data : new FormData(this),
            success : function(data){
                if(data == 'no file'){
                    swal.fire({
                        title: 'Please upload a picture',
                        icon: 'info'
                    })
                }
                else{
                    console.log(data);
                    $('.files').val('');
                    $('#galleryModal').modal('toggle');
                    swal.fire({
                        title: 'Uploaded',
                        icon: 'success'
                    })
                    $('.pho-gal').load('load.php', {
                        username : nameInp
                    });
                    $.holdReady(true);                            
                    function releaseHold() { $.holdReady(false); }
                    $.getScript('dash/anmt.js', releaseHold); 
                }
            },
            error : function(){
                console.log(data)
            }
        })
    })

    var getStars = document.querySelectorAll('.ico-ns');
    var starLen = getStars.length;
    var starID;
    for(x = 0; x < starLen; x++){
      getStars[x].addEventListener('click', function(){
        starID = this.innerHTML;
        console.log(starID)
        for(y = 0; y < starID; y++){
          getStars[y].style.color = 'rgb(255, 208, 0)';
          getStars[y].setAttribute('name', 'star');
        }
        for(z = starID; z < starLen; z++){
            getStars[z].style.color = 'rgba(255, 255, 255, 0.795)';
            getStars[z].setAttribute('name', 'star-outline');     
        }
        $('.votnum').val(starID);
      })
    }     

    //AJAX RATE
    $('.rat-form').submit(function(e){
        e.preventDefault();
        var lancerr = $('.lance').val();
        var rater = $('.rater').val();
        var starl = $('.votnum').val();

        $.ajax({
            method : "POST",
            url : "dash/rate.php",
            data : {
                lancer : lancerr,
                rater : rater,
                votnum : starl
            },
            success : function(data){
                if(data == 'empty'){
                    alert('Please rate');
                }
                else{
                    // alert('done');
                    $('.fet-rev').load('dash/rev.php',{user : lancerr});
                }
                console.log(data);
            }
        })
    })
    if($('.mark-rate').length > 0){
        $('.rate-btn').css('background', 'green');
        $('.rate-btn>span').html("You've rated");
        $('.thumb-ico').attr('name', 'checkmark-done-outline');
    }
    // if(starForm.length > 0){
    //     console.log($('.mark-rate').html().length)
    //     if($('.mark-rate').html().length > 0){
    //         $('.rate-btn').css('background', 'green');
    //     }
    // }
    Chocolat(document.querySelectorAll('.chocolat-image'));

})