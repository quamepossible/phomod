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
    

    Chocolat(document.querySelectorAll('.chocolat-image'));

})