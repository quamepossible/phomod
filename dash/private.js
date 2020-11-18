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

    //COVER PIC UPLOAD AJAX

    $('.cov-form').submit(function(event){
        event.preventDefault();
        $.ajax({
            method : 'POST',
            url : 'coverupload.php',
            processData : false,
            contentType : false,
            data : new FormData(this),
            success : function(data){
                console.log(data)
                if(data == 'logout'){
                    $('#covff').val('');
                    $('#coverModal').modal('toggle');
                    swal.fire({
                        title: 'login to upload cover picture',
                        icon: 'error'
                    }).then(()=> {
                        location.reload();
                    })
                }
                else if (data == 'try again'){
                    $('#covff').val('');
                    $('#coverModal').modal('toggle');
                    swal.fire({
                        title: 'Error, try again',
                        icon: 'error'
                    })
                }

                else if (data == 'not supported'){
                    $('#covff').val('');
                    swal.fire({
                        title: 'file not supported, upload an image',
                        icon: 'error'
                    })
                }

                else if(data == 'empty'){
                    swal.fire({
                        title: 'upload a picture',
                        icon: 'error'
                    })
                }

                else if (data == 'max'){
                    $('#coverModal').modal('toggle');
                    swal.fire({
                        title: 'Error, image is too big',
                        icon: 'error'
                    })
                }

                else{
                    $('#coverModal').modal('toggle');
                    swal.fire({
                        title: 'cover pic changed',
                        icon: 'success'
                    }).then(()=> {
                        location.reload();
                    })
                }
            },
            error : function(data){
                console.log("failed")
                console.log(data)

            }
        })
    });


    //UPLOAD DP AJAX

    $('.dp-form').submit(function(event){
        event.preventDefault();
        $.ajax({
            method : 'POST',
            url : 'upload.php',
            processData : false,
            contentType : false,
            data : new FormData(this),
            success : function(data){
                console.log(data)
                if(data == 'logout'){
                    $('#file').val('');
                    $('#dpUploadModal').modal('toggle');
                    swal.fire({
                        title: 'login to upload picture',
                        icon: 'error'
                    }).then(()=> {
                        location.reload();
                    })
                }
                else if (data == 'try again'){
                    $('#file').val('');
                    $('#dpUploadModal').modal('toggle');
                    swal.fire({
                        title: 'Error, try again',
                        icon: 'error'
                    })
                }

                else if (data == 'not supported'){
                    $('#file').val('');
                    swal.fire({
                        title: 'file not supported, upload an image',
                        icon: 'error'
                    })
                }

                else if(data == 'empty'){
                    swal.fire({
                        title: 'upload a picture',
                        icon: 'error'
                    })
                }

                else if (data == 'max'){
                    $('#dpUploadModal').modal('toggle');
                    swal.fire({
                        title: 'Error, image is too big',
                        icon: 'error'
                    })
                }

                else{
                    $('#dpUploadModal').modal('toggle');
                    swal.fire({
                        title: 'dp changed',
                        icon: 'success'
                    }).then(()=> {
                        location.reload();
                    })
                }
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
        $.ajax({
            method : 'POST',
            url : 'multimg.php',
            processData : false,
            contentType : false,
            data : new FormData(this),
            success : function(data){

                if(data == 'logout'){
                    $('.files').val('');
                    $('#galleryModal').modal('toggle');
                    swal.fire({
                        title: 'login to upload picture',
                        icon: 'error'
                    }).then(()=> {
                        location.reload();
                    })
                }

                else if(data == 'max'){
                    swal.fire({
                        title: 'Upload up to 5 files',
                        icon: 'error'
                    })
                }

                else{
                    if(data == 'no file'){
                        swal.fire({
                            title: 'Please upload a picture',
                            icon: 'info'
                        })
                    }

                    else if(data > 0){
                        $('.files').val('');
                        swal.fire({
                            title: 'The file(s) you uploaded is not supported, please choose another file',
                            icon: 'error' 
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
                        $('.pho-gal').load('load.php');
                        $.holdReady(true);                            
                        function releaseHold() { $.holdReady(false); }
                        $.getScript('dash/private.js', releaseHold); 
                    }
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
 
function openWin(){
    var link = document.querySelector('#resid');
    link.getAttribute('href');
    window.open(link, '_self');
    return false;
}