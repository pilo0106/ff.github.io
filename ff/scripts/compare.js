
function on_submit(){
    var pwd=document.getElementById("pw");
    var repwd=document.getElementById("checkpw");
    if(pwd.value!=repwd.value){
        alert("兩次密碼不一致");
        pwd.value="";
        repwd.value="";
        pwd.focus();
        return false;
    }
}


