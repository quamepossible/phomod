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


///////////////SCRIPT TO DELETE PICTURE////////////////
// var getDel = document.querySelectorAll(".delete");
// for(var m = 0; m < getDel.length; m++){  
//     getDel[m].addEventListener("click",function(){
//         var getForm = $(this).parents('form');
//         swal.fire({
//         title: 'Delete!',
//         text: 'Do you want to delete this picture',
//         icon: 'error',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Yes',
//         // dangerMode: true
        
//         }).then((feed) => {
//         if (feed.value) {
//             swal.fire(
//             'Deleted!',
//             'Picture deleted successfully',
//             'success'
//             )
//             setTimeout(function(){
//             getForm.submit();
//             },2000);
//         }
//         })
//     })
// }
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
                        $.getScript('dash/anmt.js', releaseHold); 
                        }
                    })
                })}
            })
        })
    })
}