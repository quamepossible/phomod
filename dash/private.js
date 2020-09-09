var getSpans = document.querySelectorAll(".span-1-of-3");
    var getOver = document.querySelectorAll(".over");
    var allSpans = getSpans.length;

    for(var i = 0; i < allSpans; i++){
        getSpans[i].addEventListener("mouseover", function(){
            e = this.getElementsByTagName("div");
            e[0].style.visibility = "visible";
        })

        getSpans[i].addEventListener("mouseout", function(){
            e = this.getElementsByTagName("div");
            e[0].style.visibility = "hidden";
    })
}

$(document).ready(function(){
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

    //UPLOAD GALLERY PICTURES
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
                    $.getScript('dash/private.js', releaseHold); 
                }
            },
            error : function(){
                console.log(data)
            }
        })
    })

    //DELETE GALLERY PICTURES
    var allDel = $('.delete');
    var totDel = allDel.length;
    for(i = 0; i < totDel; i++){
        allDel[i].addEventListener('click',function(){
            var curForm = $(this).parents('form');
            inps = curForm[0].getElementsByTagName('input');
            // console.log(inps[1].value)
            curForm.submit(function(event){
                event.preventDefault();

                var getUsername = inps[0].value;
                var getLink = inps[1].value;

                swal.fire({
                    title: 'Delete!',
                    text: 'Do you want to delete this picture',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes',
                    showLoaderOnConfirm: true,
                    preConfirm: function(){
                        return new Promise(function(){
                        
                        $.ajax({
                            method : 'POST',
                            url : 'dash/delete.php',
                            data : {
                                username : getUsername,
                                link : getLink
                            },
                            success : function(){
                            swal.fire(
                                'Deleted!',
                                'Picture deleted successfully',
                                'success'
                            )
                            $('.pho-gal').load('load.php', {
                                username : getUsername
                            });
                            $.holdReady(true);                            
                            function releaseHold() { $.holdReady(false); }
                            $.getScript('dash/private.js', releaseHold); 
                            }
                        })
                    })}
                })
            })
        })
    }

})
 

