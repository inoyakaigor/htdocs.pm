<?PHP
require "head.htm";
?>

<form id="addform" action="addhandler.php" >
	<h1>Добавление или обновление данных</h1>
	<input name="name" title="Название проекта" placeholder="Название проекта" value="<?PHP print @$_GET["project"] ?>" required><br>
	<input name="type" title="Тип аутентификационных данных: FTP, SSH etc." placeholder="Тип аутентификационных данных: FTP, SSH etc." required><br>
	<input name="URL" title="URL доступа" placeholder="URL доступа"><br>
	<input name="login" title="Логин" placeholder="Логин" required><br>
	<input name="password" title="Пароль" placeholder="Пароль" required><br>
	<textarea name="description" title="Примечание" placeholder="Примечание"></textarea><br>
	<input type="submit" value="Добавить!">
</form>