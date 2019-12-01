<?php
        $db = MySQL::Database();
        $RecoveryEmail = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
		$RecoveryEmail->execute(array($_SESSION['account']['sso']));
		$fetchRecoveryEmail = $RecoveryEmail->fetch();
        ?>
<html><head></head><body><form method="POST" name="frm" action="https://panel.ryzeheberg.fr/auth/login">
<input name="user" id="LoginForm_name" type="hidden" maxlength="128" value="<?php echo $fetchRecoveryEmail['username'];?>">
<input name="password" id="LoginForm_password" type="hidden" maxlength="128" value="<?php echo $fetchRecoveryEmail['password_pterodactyl'];?>">
<noscript><input type="submit" value="Cliquez ici si vous n'êtes pas redirigé."/></noscript>
</form>
<script type="text/javascript">
document.frm.submit();</script></body></html>