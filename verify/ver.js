$('.myform').submit(function(e){
    $('.h-one').css('visibility', 'visible');
    e.preventDefault();
    var email = $('.email').val();
    var code = $('.c-field').val();
    $.ajax({
        method : "POST",
        url : "ver.php",
        data : {
            email : email,
            vercode : code
        },
        success : function(data){
            if(data == 'valid'){
                $('.err').html('verified');
                $('.err').css('color', 'green')
                setTimeout(() => {
                    window.history.back();                    
                },2000)
            }
            else{
                $('.err').html('Invalid code entered');
                $('.err').css('color', 'red')
            }
            $('.h-one').css('visibility', 'hidden');
            console.log(data)
        }
    })
})

$('.cod-form').submit(function(event){
    $('.h-two').css('visibility', 'visible');
    event.preventDefault();
    var email = $('.re-mail').val();
    $.ajax({
        method : "GET",
        url : "resen.php",
        data : {email : email},
        success : function(data){
            console.log(data)
            if(data == 'sent'){
                $('.err').html('Code sent');
                $('.err').css('color', 'green');
            }

            else{
                $('.err').html('There was an error, try again');
                $('.err').css('color', 'red')
            }
            $('.h-two').css('visibility', 'hidden');
        }
    })
})