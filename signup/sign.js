
var phone = document.getElementById("validationServerPhone");
var passOne = document.getElementById("validationServerPassOne");
var passTwo = document.getElementById("validationServerPassTwo");
var selc = document.getElementsByTagName("select");
var allSelc = selc.length;

var inputs = document.getElementsByTagName("input");
var inpLen = inputs.length;

function validate(){
   
    for(var i = 0; i < (inpLen-1); i++){

        if((i >= 3 && i <= 5) || (i == 11) || (i == 12)){
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

    for(var m = 0; m < allSelc; m++){
        if(selc[m].value.length == 0){
            selc[m].classList.add('is-invalid');
        }

        else{
            selc[m].classList.remove('is-invalid');
        }
    }

    var getErr = document.getElementsByClassName("is-invalid");
    var errLen = getErr.length;
    console.log(errLen);
    console.log(getErr);
    console.log(selc.length);
    console.log(inputs[13]);

    var notMatch = document.getElementById("pass");
    var notMa = document.getElementById("passOn");
    if(passTwo.value !== passOne.value){
        inputs[7].classList.remove('is-valid');
        inputs[8].classList.remove('is-valid');
        inputs[7].classList.add('is-invalid');
        inputs[8].classList.add('is-invalid');

        notMa.innerHTML = 'Passwords do not match';
        notMatch.innerHTML = 'Passwords do not match';
        return false;
    }

    var inPhone = document.getElementById("phone");
    if(isNaN(phone.value) || phone.value.length < 9){
        phone.classList.remove('is-valid');
        phone.classList.add('is-invalid');
        inPhone.innerHTML = "Please enter a valid phone number";
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
    }  
}


