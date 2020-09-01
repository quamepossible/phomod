function valpass(){
    var regE = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/;
    var codeReg = /^(?=.*\d).{6,}$/;
    var verCode = document.querySelector('.cod-inp');
    var passOne = document.querySelector('.pas-one');
    var passTwo = document.querySelector('.pas-two');
    var errOne = document.querySelector('.ver-err');
    var errTwo = document.querySelector('.pass-one-err');
    var errThree = document.querySelector('.pass-two-err');
    var inputF = document.querySelectorAll('input');
    var errs = document.querySelectorAll('.err');


    for(let i = 1; i < 4; i++){
        if(inputF[i].value.length == 0){
            errs[i-1].innerHTML = "This field is required";
        }
    }

    if(codeReg.test(verCode.value) && !isNaN(verCode.value) && verCode.value.length > 0){
        verCode.style.border = "none";
        verCode.style.boxShadow = "0 0 5px rgba(124, 123, 123, 0.726)";
        errOne.innerHTML = "";
        verCode.classList.remove('invalid');
    }
    else{
        verCode.style.border = "1px solid red";
        verCode.style.boxShadow = "none";
        errOne.innerHTML = "Invalid code entered";
        verCode.classList.add('invalid');
        
    }

    if(regE.test(passOne.value)){
        if(passOne.value == passTwo.value){
            passOne.style.border = "2px solid green";
            passTwo.style.border = '2px solid green';
            passOne.style.boxShadow = "none";
            passTwo.style.boxShadow = "none";
            errTwo.innerHTML = '';
            errThree.innerHTML = '';
            passOne.classList.remove('invalid');
            passTwo.classList.remove('invalid');
        }
        else{
            passOne.style.border = "1px solid red";
            passTwo.style.border = '1px solid red';
            passOne.style.boxShadow = "none";
            passTwo.style.boxShadow = "none";
            errTwo.innerHTML = 'Passwords do not match';
            errThree.innerHTML = 'Passwords do not match';
            passTwo.classList.add('invalid');
        }
    }
    else{
        passOne.style.border = "1px solid red";
        passOne.style.boxShadow = "none";
        errTwo.innerHTML = 'Password must contain at least one upper and lower case letter, a number, and must be at least 6 characters long';
        passOne.classList.add('invalid');
        
    }

    return true;
}