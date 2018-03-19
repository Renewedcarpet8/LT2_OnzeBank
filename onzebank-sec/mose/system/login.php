<?php
class Login
{
	public $id;
	public $name;
	public $password;
	public $sessionid;
	public $changed;
	public $loggedin;

	function __construct()
	{
                session_start();
		$this->sessionid = md5(session_id());
		$sql = db_query(	 " SELECT "
					." 	* "
					." FROM "
					." 	users "
					." WHERE "
					." 	sessionid='" . $this->sessionid . "'"
					);
		$this->loggedin = false;
		$this->changed = false;
		if($sql && (db_num_rows($sql) == 1))
		{
			$row = db_fetch_array($sql);
			$this->loggedin = true;

			$this->id = $row["id"];
			$this->name = $row["name"];
			$this->password = $row["password"];
			if(isset($_REQUEST["logout"]))
			{
				$this->sessionid = "";
				$this->id = "";
				$this->name = "";
				$this->password = "";
				$this->changed 	= true;
				$this->loggedin = false;
			}
		} else if(isset($_REQUEST["login"]))
		{
			$name = $_REQUEST["name"];
			$password = md5($_REQUEST["password"]);

			$sql = db_query(	 " SELECT "
						." 	* "
						." FROM "
						." 	users "
						." WHERE "
						." 	name='" . $name . "' "
						." AND "
						." 	password='" . $password . "'"
						);

			if($sql && (db_num_rows($sql) == 1) && ($row = db_fetch_array($sql)))
			{
				if($row["password"] == $password)
				{
					$this->password = $row["password"];
					$this->name = $row["name"];
					$this->id = $row["id"];
					$this->changed = true;
					$this->loggedin = true;
				}
			} else 
			{
				// mysql_error();
			}
		}
	}

	function __destruct()
	{
		if($this->changed == true)
		{
			db_query(	 " UPDATE users "
					." SET "
					."	sessionid='" . $this->sessionid . "', "
					."	name='" . $this->name . "', "
					."	password='" . $this->password . "' "
					." WHERE "
					."	id='" . $this->id ."'"
					);
		}
	}
	function link()
	{
		if($this->loggedin)
			$GLOBALS["menu"]->addLink("<a href=\"?logout=1\">Logout</a>");
		else
			$GLOBALS["menu"]->addLink("<a href=\"?logform=1\">Login</a>");
	}
	function draw()
	{
		$this->form();
	}
	function form()
	{
		$login = <<<LOGIN
			<form action="?" method="POST">
				<label for="name">Naam</label><input type="text" id="name" name="name" value=""><br />
				<label for="password">Wachtwoord</label><input type="password" id="password" name="password" value=""><br />
				<input type="submit" name="knop" value="Inloggen..">
				<input type="hidden" name="login" value="1">
			</form>
LOGIN;
		return $login;
	}
}
$GLOBALS["login"] = new Login();
if(!$GLOBALS["login"]->loggedin)
{	
	$GLOBALS["mose"]->addDrawItem($GLOBALS["login"]);
	$GLOBALS["stop"] = true;
}
$GLOBALS["login"]->link();
?>