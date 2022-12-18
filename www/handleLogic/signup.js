//xử lý kiểm tra form đăng ký
function handleSignUpFrom() {
    const submitBtn = document.getElementById("submitBtn");
    submitBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const fullName = document.getElementById("typeFullNameX")
        const userName = document.getElementById("typeNameX")
        const email = document.getElementById("typeEmailX")
        const password = document.getElementById("typePasswordX")
        const confirmPassword = document.getElementById("typeConfirmPasswordX")
        const nameMess = document.getElementById("errorFirstName")
        const userNameMess = document.getElementById("errorName")
        const emailMess = document.getElementById("errorEmail")
        const passwordMess = document.getElementById("errorPassword")
        const confirmPasswordMess = document.getElementById("errorConfirmPassword")
        console.log([fullName])
        fullName.oninput=(e)=>{
            nameMess.innerHTML = ''
        }
        userName.oninput=(e)=>{
            userNameMess.innerHTML = ''
        }
        email.oninput=(e)=>{
            emailMess.innerHTML = ''
        }
        password.oninput=(e)=>{
            passwordMess.innerHTML = ''
        }
        confirmPassword.oninput=(e)=>{
            confirmPasswordMess.innerHTML = ''
        }

        if (fullName.value == "") {
            nameMess.innerHTML = "Please enter your name!";
            return false
        }

        if (userName.value == "") {
            userNameMess.innerHTML = "Please enter your user name!";
            return false
        }

        
        
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (email.value == "") {
            emailMess.innerHTML = "Please enter your email!";
        }
        
        else if (re.test(email.value) == false) {
            emailMess.innerHTML = "Your email is not correct!";
            return false;
        }
        
        if (password.value == "") {
            passwordMess.innerHTML = "Please enter your password!";
            return false
        }
        
        else if (password.value.length < 6) {
            passwordMess.innerHTML = "Your password must contain at least 6 characters"
            return false
        }
        
        if (confirmPassword.value == "") {
            confirmPasswordMess.innerHTML= "Please enter your confirm password!";
            return false
        }

        if(password.value != confirmPassword.value) {
            confirmPasswordMess.innerHTML = 'Your confirm password is incorrect!'
            return false
        }
        $.post('./Api/addUser.php',  {
            userName:userName.value,
            fullName: fullName.value,
            email: email.value,
            pw: password.value,
        }, function(data) {
            alert('Chúc mừng bạn đã đăng kí tài khoản thành công')
        }, 'json')
        
    })
}

//xử lý kiểm tra form đăng nhập
function check2(){
    var frm = document.forms['frm']
    var pws = frm.psw;
    var reps = frm.reps;
    if(pws.value != reps.value){
        alert("Mật khẩu không trùng khớp");
        pwr.focus();
        return false;
    }
    alert("Đăng ký thành công!");
        return true;
}

handleSignUpFrom()