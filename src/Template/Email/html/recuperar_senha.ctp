Olá <?= $name?>,<br><br>
Vimos que você solicitou a alteração de senha.<br>
Estamos enviando o link para a redefinição de senha abaixo. Se você não solicitou, ignore, pois, sua senha permanecerá a mesma.<br><br>
<?= "<a href='".$host_name."/users/atuualizar-senha".$recuperar_senha."'>Confirmar e-mail</a>"; ?> <!--No href, usa-se o começo o domínio e as configs, ex:https://localhost/cakenovo/admin/users/login-->
Usuário: <?= $username ?> <br><br>