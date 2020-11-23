
$('.f-form').submit(function(e){
    e.preventDefault();
    var errLn = $('.is-invalid').length;
    console.log(errLn);

    if(errLn == 0){
        var fullName =  $('.fname').val();
        var userName =  $('.username').val();
        var phone =  $('.phone').val();
        var whatsapp =  $('.whatsapp').val();
        var insta =  $('.instagram').val();
        var website =  $('.website').val();
        var region =  $('.region').val();
        var town =  $('.city').val();
        var company =  $('.company').val();
        var category =  $('.category').val();
        var days =  $('.days').val();
        var travel =  $('.travel').val();

        $.ajax({
            method : 'POST',
            url : 'save.php',
            data : {
                fullname : fullName,
                username : userName,
                phone : phone,
                whatsapp : whatsapp,
                instagram : insta,
                website : website,
                region : region,
                city : town,
                company : company,
                category : category,
                days : days,
                travel : travel
            },
            success : function(data){
                data = $.trim(data);
                console.log(data);
                if(data == 'logout'){
                    swal.fire({
                        title: 'Error, please log in',
                        icon: 'error'
                    }).then(()=> {
                        location.reload();
                    })
                }
                else if(data == 'Empty fields'){
                    swal.fire({
                        title: 'please fill all fields',
                        icon: 'error'
                    })
                }

                else if(data == 'changed'){
                    swal.fire(
                        'Saved',
                        'Changes saved successfully',
                        'success'
                    )
                    $('.span-1-of-3').load('load.php');
                }

                else{
                    swal.fire(
                        'Error',
                        'There was an error, try again',
                        'error'
                    )
                }
            }
        })
    }
})

//DP UPLOAD AJAX
$('.up-form').submit(function(er){
    er.preventDefault();
    $.ajax({
        method : 'POST',
        url : '../upload.php',
        processData : false,
        contentType : false,
        data : new FormData(this),
        success : function(data){
            console.log(data)
            if(data == 'logout'){
                $('.dpimg').val('');
                $('#dpUploadModal').modal('toggle');
                swal.fire({
                    title: 'login to upload picture',
                    icon: 'error'
                }).then(()=> {
                    location.reload();
                })
            }
            else if (data == 'try again'){
                $('.dpimg').val('');
                $('#dpUploadModal').modal('toggle');
                swal.fire({
                    title: 'Error, try again',
                    icon: 'error'
                })
            }

            else if (data == 'not supported'){
                $('.dpimg').val('');
                swal.fire({
                    title: 'file not supported, upload an image',
                    icon: 'error'
                })
            }

            else if(data == 'empty'){
                swal.fire({
                    title: 'upload a picture',
                    icon: 'info'
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
                $('#upload-file-info').html('');
                $('#dpUploadModal').modal('toggle');
                swal.fire({
                    title: 'dp changed',
                    icon: 'success'
                })
                $('.span-1-of-3').load('load.php');
            }
        },
        error : function(data){
            console.log("failed")
            console.log(data)

        }
    })

})


//DP DELETE AJAX
$('.del-pic').submit(function(del){
    del.preventDefault();
    swal.fire({
        title: 'Delete!',
        text: 'Do you want to delete your profile pic',
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
                url : 'del.php',
                data : {},
                success : function(data){
                    if(data == 'done'){
                        swal.fire(
                            'Deleted!',
                            'Picture deleted successfully',
                            'success'
                        )
                        $('#upload-file-info').html('');
                        $('#dpUploadModal').modal('toggle');
                        $('.span-1-of-3').load('load.php');                        
                    }
                    else{
                        swal.fire(
                            'Error',
                            'There was an error, try again',
                            'error'
                        )
                    }
                    
                }
            })
        })}
    })
})