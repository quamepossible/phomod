
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
                    $('.span-1-of-3').load('load.php', {uname : userName});
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


$('.up-form').submit(function(er){
    er.preventDefault();
    var Usernamer =  $('#validationServerUsername').val();
    $.ajax({
        method : 'POST',
        url : '../upload.php',
        processData : false,
        contentType : false,
        data : new FormData(this),
        success : function(data){
            console.log(data)
            if(data == 'empty'){
                swal.fire({
                    title: 'Please upload a picture',
                    icon: 'info'
                })
            }
            else if (data == 'not supported'){
                swal.fire({
                    title: 'File error',
                    text: 'Only image files are accepted',
                    icon: 'error'
                })
            }
            else if (data == 'file uploaded'){
                $('#upload-file-info').html('');
                $('#dpUploadModal').modal('toggle');
                swal.fire({
                    title: 'Uploaded',
                    icon: 'success'
                })
            
                $('.span-1-of-3').load('load.php', {uname : Usernamer});
            }
        }
    })

})

$('.del-pic').submit(function(del){
    del.preventDefault();

    var uName = $('.dpuser').val();

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
                data : {
                    user : uName
                },
                success : function(data){
                    if(data == 'done'){
                        swal.fire(
                            'Deleted!',
                            'Picture deleted successfully',
                            'success'
                        )
                        $('#upload-file-info').html('');
                        $('#dpUploadModal').modal('toggle');
                        $('.span-1-of-3').load('load.php', {
                            uname : uName
                        });
                        
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