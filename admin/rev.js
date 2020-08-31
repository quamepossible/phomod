///////////////SCRIPT TO EDIT DATA IN TABLE////////////////
$(document).ready(function(){
  $('.main').css('display', 'block');
  $('.grand').css('display', 'none');
  $("#save").on("click", function(){

      //MAKE SURE NO INPUT FIELD IS LEFT EMPTY
      // var myError = false
      var phone = document.getElementById("validationServerPhone");
      var inputs = document.getElementsByTagName("input");
      var inpLen = inputs.length;

      for(var i = 2; i < (inpLen-1); i++){

          if((i >= 5 && i <= 7) || (i == 11)){
              continue;
          }
          if(inputs[i].value.length == 0){
              inputs[i].classList.add('is-invalid');
          }    
          if(inputs[i].value.length > 0){
              inputs[i].classList.remove('is-invalid');
              inputs[i].classList.add('is-valid');
          
          }
      }       

      var inPhone = document.getElementById("phone");
      if(isNaN(phone.value) || phone.value.length < 9){
          phone.classList.remove('is-valid');
          phone.classList.add('is-invalid');
          inPhone.innerHTML = "Enter a valid phone number";
          return false;
      }
      else{
          phone.classList.remove('is-invalid');
          phone.classList.add('is-valid');
          inPhone.classList.remove('invalid-feedback');
          inPhone.classList.add('valid-feedback');
          inPhone.innerHTML = '';
      }
              
      var getErr = document.getElementsByClassName("is-invalid");
      var errLen = getErr.length;
      if(errLen > 0){
          for(var j = 0; j < errLen; j++){
              if(getErr[j].value.length == 0){
                  return false;
              }        
          }
          myError = false;
      }

      else{
          myError = true;
      }
      
      if(myError){
          var form = $(this).parents('#myForm');
          swal({
              title: 'Do you want to save changes',
              icon: 'info',
              buttons: true,
              dangerMode: true          
              }).then((result) => {
              if (result) {
                  swal({
                      title: 'Changes saved successfully',
                      icon: 'success',
                      buttons: [false, true]
                  })

                  setTimeout(function(){
                  form.submit()
                  },2000);
      
              }
          })
          return false;
      }           
      
  })
    

  $('#verify').on('click', function(){
      var getForm = $(this).parents('form');
      swal({
        title: 'Verify!',
        text: 'Do you want to verify this freelancer',
        icon: 'info',
        buttons: true,
        dangerMode: true
      }).then((feed) => {
        if (feed) {
          swal(
            'Verified',
            'Freelancer Verified successfully',
            'success'
          )
          setTimeout(function(){
            getForm.submit();
          },2000);
        }
      })
      return false;
  })



  $('#unverify').on('click', function(){
      var getForm = $(this).parents('form');
      swal({
        title: 'Unverify!',
        text: 'Do you want to unverify this freelancer',
        icon: 'warning',
        buttons: true,
        dangerMode: true
      }).then((feed) => {
        if (feed) {
          swal(
            'Unverified',
            'Freelancer Unverified',
            'success'
          )
          setTimeout(function(){
            getForm.submit();
          },2000);
        }
      })
      return false;
  })
})

    // var getForm = $(this).parents('form');
    // swal({
    //   title: 'Verify!',
    //   text: 'Do you want to verify this student',
    //   icon: 'warning',
    //   buttons: true,
    //   dangerMode: true
      
    // }).then((feed) => {
    //   if (feed) {
    //     swal(
    //       'Deleted!',
    //       'Student deleted successfully',
    //       'success'
    //     )
    //     setTimeout(function(){
    //       getForm.submit();
    //     },2000);
    //   }
    // })