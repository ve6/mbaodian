$(function(){
    //验证注册
    var flag=false;
    $('#username').blur(function(){
        var username=$(this).val();
        if(username=='') {
            $('#name_sp').html('用户名非空');
            return flag;
        }else{
            $('#name_sp').html("<font color='blue'>√</font>");
            return flag=true;
        }
    })
    var pwdflag=false;
    $('#pwd').blur(function(){
        var pwd=$(this).val();
        var reg=/^\w{6,}$/;
        if(pwd=='') {
            $('#sp_pwds').html('密码非空');
            return pwdflag;
        }else if(!reg.test(pwd)){
            $('#sp_pwds').html("密码格式不正确");
            return pwdflag;
        }else{
            $('#sp_pwds').html("<font color='blue'>√</font>");
            return pwdflag=true;
        }
    })
    var emailflag=false;
    $('#email').blur(function(){
        var email=$("#email").val();
        var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if(reg.test(email)){
            $("#email_sp").html("<font color='blue'>√</font>");
            return emailflag=true;
        }else if(email==""){
            $("#email_sp").html('email非空');
            return emailflag;
        }else{
            $("#email_sp").html('格式错误');
            return emailflag;
        }
    })
    var phoneflag=false;
    $("#phone").blur(function(){
        var phone=$("#phone").val();
        var reg = /^1\d{10}$/;
        if(reg.test(phone)){
            $("#phone_sp").html("<font color='blue'>√</font>");
            return phoneflag=true;
        }else if(phone==""){
            $("#phone_sp").html('手机非空');
            return phoneflag;
        }else{
            $("#phone_sp").html('格式错误');
            return phoneflag;
        }
    })
    //验证注册****
    $('.signup-form').submit(function(e){
        if(!flag||!phoneflag||!emailflag||!pwdflag){
            e.preventDefault()
            //alert(emailflag)
        }
    })


    function show(){
        if(this.aa.password.type='password'){
            box.innerHTML = "<input type='text' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='hid();'>隐藏密码</a>";
        }
    }
    function hid(){
        if(this.aa.password.type='text'){
            box.innerHTML = "<input type='password' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='show();'>显示密码</a>";
        }
    }

    /*jQuery 验证登陆*/
    $("#sub").click(function(){
        var u_name = $('#u_name').val();
        var password = $('#password').val();
        if(u_name=='' || password==''){
            $('#region').html('请确认登陆信息');
            return false;
        }else{
            $.post("region", { name: u_name, pwd: password},
                function(data){
                    //alert(data);
                    if(data==1){
                       alert('登陆成功');window.location.reload();
                    }else{
                        alert('登陆失败');
                    }
                }
            );
        }

    })


})