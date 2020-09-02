
    function logVal(){
        var email = document.getElementById("mail-inp");
        var pwd = document.getElementById("pwd-inp");
        var err = document.querySelector(".err");

        var logBtn = document.querySelector('.log-btn');

        if(email.value.length == 0 || pwd.value.length == 0){
            err.innerHTML = "Please fill all fields"; 
            return false;
        }
    }

$(document).ready(function(){
    $('.mn-ppga').css('display', 'block');
    $('.grand').css('display', 'none');

    var searchInput = document.querySelector("#search");
    var buttonn = document.getElementById("browserr");

    var searchIcon = document.querySelector(".search-ico");

    searchInput.addEventListener("mouseover", function(){
        searchIcon.style.color = "orangered";
    })

    searchInput.addEventListener("mouseout", function(){
        searchIcon.style.color = "black";
    })

    buttonn.addEventListener("mouseover", function(){
        searchIcon.style.color = "orangered";
    })

    buttonn.addEventListener("mouseout", function(){
        searchIcon.style.color = "black";
    })


    var spans = document.querySelectorAll('.spans');
    var spanlen = spans.length;
    var btn = document.querySelector('.btn-tog');
    var navv = document.querySelector('nav');

    count = 0;
    btn.addEventListener('click', function(){
        count++;
        if(count % 2 == 1){
            navv.style.overflow = 'visible';
            for(var j = 0; j < spanlen; j++){
                if(j == 1){
                    spans[j].style.transform = "rotate(-40deg)";
                }

                else if(j == 2){
                    spans[j].style.transform = "rotate(40deg)";
                }

                else{
                    spans[j].style.transform = "scale(0)";
                }
            }
        }

        else{
            navv.style.overflow = 'hidden';

            for(var i = 0; i < spanlen; i++){
                if(i == 0 || i == 3){
                    spans[i].style.transform = "scale(1)";
                }
                else{
                    spans[i].style.transform = "rotate(0deg)";
                }
            }
        }
    })

    $('#log-form').submit(function(e){
        e.preventDefault();

        var email = $('#mail-inp').val();
        var pass = $('#pwd-inp').val();

        if(email.length > 0){
            $.ajax({
                method : 'POST',
                url : 'login.php',
                data : {
                    email : email,
                    pwd : pass
                },
                success : function(data){

                    if(data == 'empty fields'){
                        $('.err').html('Please fill all fields')
                    }

                    else{
                        if(data == 'logged in'){
                            $('.err').html('Logged in');
                            $('.err').css('color', 'green');
                            setTimeout(function(){
                                $('#loginModal').modal('toggle');
                                window.location.replace('/');
                            },1500);
                        }

                        else if(data == 'Invalid'){
                            $('.err').html("Email and password don't match");
                        }
                        else{
                            $('.err').html('No user found with this email');
                        }
                    }
                }
            })
        }
    }) 

})