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
		$sql = mysql_query(	 " SELECT "
					." 	* "
					." FROM "
					." 	users "
					." WHERE "
					." 	sessionid='" . $this->sessionid . "'"
					);
		$this->loggedin = false;
		$this->changed = false;
		if($sql && (mysql_num_rows($sql) == 1))
		{
			$row = mysql_fetch_array($sql);
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

			$sql = mysql_query(	 " SELECT "
						." 	* "
						." FROM "
						." 	users "
						." WHERE "
						." 	name='" . $name . "' "
						." AND "
						." 	password='" . $password . "'"
						);

			if($sql && (mysql_num_rows($sql) == 1) && ($row = mysql_fetch_array($sql)))
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
			mysql_query(	 " UPDATE users "
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
	function form()
	{
		$login = <<<LOGIN
			<form action="?" method="POST">
				<input type="text" name="name" value=""><br />
				<input type="password" name="password" value=""><br />
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
	$GLOBALS["content"]->write(  $GLOBALS["login"]->form() );
	$GLOBALS["stop"] = true;
}
$GLOBALS["login"]->link() . "\n\r";
?>