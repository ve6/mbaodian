$(function(){
    var flag=false;
    $('#username').blur(function(){
        var username=$(this).val();
        if(username=='') {
            $('#name_sp').html('用户名非空');
            return flag;
        }else{
            $('#name_sp').html('');
            flag=true;
            return flag;
        }
    })
    var pwdflag=false
    $('#pwd').blur(function(){
        // alert(123);
        var pwd=$(this).val();
        if(pwd=='') {
            $('#sp_pwd').html('密码非空');
            return pwdflag;
        }else{
            $('#sp_pwd').html('');
            pwdflag=true;
            return pwdflag;
        }
    })
    var emailflag=false;
    $('#email').blur(function(){
        var email=$("#email").val();
        var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if(reg.test(email)){
            $("#email_sp").html('')
            emailflag=true;
            return emailflag;
        }else{
            $("#email_sp").html('格式错误')
            return emailflag;
        }
    })
    var phoneflag=false;
    $("#phone").blur(function(){
        var phone=$("#phone").val();
        var reg = /^1[3|5|8]\d{9}$/;
        if(reg.test(phone)){
            $("#phone_sp").html('')
            phoneflag=true;
            return phoneflag;
        }else{
            $("#phone_sp").html('格式错误');
            return phoneflag;
        }
    })
    $('.signup-form').submit(function(e){
        if(!flag||!phoneflag||!emailflag||!pwdflag){
            e.preventDefault()
            alert(emailflag)
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



    //$("#u_name").blur(function() {
    //    var u_name = $("#u_name").val();
    //    var reg = /^1\d{10}$/;
    //    var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    //    if (reg.test(u_name)) {
    //        $.post('name', {
    //            u_name: u_name
    //        }, function (data) {
    //            alert(data)
    //            if (data == 1) {
    //                $("#sp_name").html('')
    //            } else if (data == 2) {
    //                $("#sp_name").html('不存在')
    //            }
    //        })
    //
    //    } else if (email_reg.test(u_name)) {
    //        $.post('email', {
    //            u_name: u_name
    //        }, function (data) {
    //            alert(data)
    //            if (data == 1) {
    //                $("#sp_name").html('')
    //            } else if (data == 2) {
    //                $("#sp_name").html('不存在')
    //            }
    //        })
    //    } else {
    //        $("#sp_name").html('格式错误')
    //    }
    //})
    //$("#password").keyup(function() {
    //
    //    var u_name = $("#u_name").val()
    //    var u_pwd = $("#password").val()
    //    var reg = /^1\d{10}$/;
    //    var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    //    if (reg.test(u_name)) {
    //        $.post('name_pwd', {
    //            u_name: u_name,
    //            u_pwd: u_pwd
    //        }, function (data) {
    //            if (data == 3) {
    //                $("#sp_pwd").html('')
    //            } else if (data == 4) {
    //                $("#sp_pwd").html('密码错误');
    //            }
    //        })
    //    } else if (email_reg.test(u_name)) {
    //        $.post('email_pwd', {
    //            u_name: u_name,
    //            u_pwd: u_pwd
    //        }, function (data) {
    //            if (data == 3) {
    //                $("#sp_pwd").html('')
    //            } else if (data == 4) {
    //                $("#sp_pwd").html('密码错误');
    //            }
    //        })
    //    }
    //})
    $("#sub").click(function(){
        var u_name=$("#u_name").val()
        var u_pwd=$("#password").val()
        var reg = /^1\d{10}$/;
        var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if (reg.test(u_name)) {
            $.post('name_deng',{
                u_name:u_name,
                u_pwd:u_pwd
            },function(data){
                if(data==5){
                    location.href='index';
                }else if(data==6){
                    alert('用户名或密码错误');location.href='login';
                }
            })
        }else if(email_reg.test(u_name)){
            $.post('email_deng',{
                u_name:u_name,
                u_pwd:u_pwd
            },function(data){
                if(data==5){
                    location.href='index';
                }else if(data==6){
                    alert('用户名或密码错误');location.href='login';
                }
            })
        }
    })
})