

$(document).ready(function () {
    $('#table_id').DataTable({
        paging: false,
        select: true
    });
    $('.grand').css('display', 'none');
    $('.top-nav').css('display', 'block');
    $('.main-scr').css('display', 'block');



    var downUsers = document.querySelector('.down-users');
    var downVerify = document.querySelector('.down-verify');
    var downAction  = document.querySelector('.down-action');
    var users = document.querySelector('.users');
    var verify = document.querySelector('.verify');
    var action = document.querySelector('.action');
    var icoOne = document.querySelector('.rig-ico-one');
    var icoTwo = document.querySelector('.rig-ico-two');
    var icoThree = document.querySelector('.rig-ico-three');

    users.addEventListener('click', function(){
        downUsers.classList.toggle('drop');
        icoOne.classList.toggle('usico-down');
    })


    verify.addEventListener('click', function(){
        downVerify.classList.toggle('drop');
        icoTwo.classList.toggle('usico-down');
    })


    action.addEventListener('click', function(){
        downAction.classList.toggle('drop');
        icoThree.classList.toggle('usico-down');
    })


    // var clic = document.querySelectorAll('.cli');
    // var cliLen = clic.length;
    // for(var i = 0; i < cliLen; i++){
    //     clic[i].addEventListener('click', function(){
    //         var geCla = document.querySelectorAll('.hold-items');
    //         geCla[1].classList.toggle('drop');
    //     })
    // }



    var navBtn = document.querySelector('.nav-btn');
    var lefNav = document.querySelector('.left-nav');
    var rigNav = document.querySelector('.user-interface');

    navBtn.addEventListener('click', function(){
        lefNav.classList.toggle('hidelef');
        rigNav.classList.toggle('fullrig');
    })

    var pes = document.querySelectorAll('.ye-p');
    var pesLen = pes.length;
    for(var q = 0; q < pesLen; q++){
        pes[q].addEventListener('mouseover', function(){
            this.classList.toggle('un-p');
        })
        pes[q].addEventListener('mouseout', function(){
            this.classList.toggle('un-p');
        })
    }


    $('.sta').on('click',function(){
        var featForm = $(this).parents('form');
        swal({
            title: 'Feature Freelancer',
            text: 'Do you want to feature this freelancer',
            icon: 'warning',
            buttons: true
        }).then((result)=>{
                if(result){
                    swal({
                        title: 'Featured',
                        text: 'Freelancer featured',
                        icon: 'success'
                    })
                    setTimeout(function(){
                        featForm.submit();
                    },2000)
                }
        })

    })


    $('.staa').on('click',function(){
        var featForm = $(this).parents('form');
        swal({
            title: 'Unfeature Freelancer',
            text: 'Do you want to unfeature this freelancer',
            icon: 'error',
            buttons: true,
            dangerMode: true
        }).then((result)=>{
                if(result){
                    swal({
                        title: 'Unfeatured',
                        text: 'Freelancer unfeatured',
                        icon: 'success'
                    })
                    setTimeout(function(){
                        featForm.submit();
                    },2000)
                }
        })

    })


});