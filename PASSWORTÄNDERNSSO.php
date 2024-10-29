<?php
$tpl_text = '' . (!empty($fill['update_error']) ? '
<p class="alert alert-danger">' . nl2br($fill['update_error']) . '</p>
' : '') . '
<div class="myonline-login-page-form-container col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">
    <form name="my_newpass" id="my_newpass" class="form-horizontal myonline-login-page-form " role="form" action="" method="post">
        <input name="code" value="' . $fill['code'] . '" type="hidden">
        <input name="pid" value="9_1" type="hidden">
        <div class="myonline-login-page-form-password input-group margin-bottom-10">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" maxlength="50" size="11" name="my_pass" id="my_pass" value="" placeholder="Passwort">
        </div>
        <div class="myonline-login-page-form-password input-group margin-bottom-40">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" maxlength="50" size="11" name="my_pass2" id="my_pass2" value="" placeholder="neues Passwort wiederholen test">
        </div>
        <div class="form-group myonline-login-page-form-login">
            <button type="button" class="btn btn-primary center-block" onclick="mydaten_check();">Absenden</button>
        </div>
        <input type="submit" class="hidden" />
    </form>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    function mydaten_check()
    {
        var objForm = jQuery("#my_newpass");
        var objNewPass = jQuery("#my_pass");
        var objNewPass2 = jQuery("#my_pass2");

        if(objNewPass.val() == "") {
            alert("Bitte tragen Sie Ihr gewünschtes Passwort ein!");
            objNewPass.focus();
            return false;
        }

        if(objNewPass2.val() == "") {
            alert("Bitte tragen Sie Ihr gewünschtes Passwort in Wiederholfeld ein!");
            objForm.find("#my_pass2").focus();
            return false;
        }

        if (objNewPass.val() != objNewPass2.val()) {
            alert("Die eingegebenen Passwörter stimmen nicht überein!");
            objNewPass.focus();
            return false;
        }

        var bolPassError = false,
        strPassword = objNewPass.val();

        jQuery.ajax({
            url: "/_em_cms/globals/ajax_password.php",
            dataType: "jsonp",
            async: false,
            crossDomain: true,
            data: {"strPassCheck":strPassword},
            success: function(objRequest) {
                if (!objRequest.success) {
                    alert(objRequest.notice);
                    objNewPass.focus();
                } else {
                    objForm.submit();
                }
            }
        });
        return false;
    }
</script>';