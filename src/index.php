<?
include_once("web.config.php");
session_start();

//var_dump($_POST);

//StartOfAuthorisation
if($_POST && isset($_POST["post_action"]) && $_POST["post_action"]==="login") 
{
	$post_username = $_POST["post_username"];//"gppaul";
	$post_password = md5($_POST["post_password"]);//md5("testpassword");
	foreach($global_users as $user)
	{
		list($u, $p) = explode(":", $user);
		if($u===$post_username && $p===$post_password)
		{
			$_SESSION["global_is_authentificated"]=$post_username;
		}
	}
}
//logout
if(isset($_GET["logout"]) && $_GET["logout"]==="true")
{
	if(isset($_SESSION["global_is_authentificated"]))
	unset($_SESSION["global_is_authentificated"]);
}
if(!isset($_SESSION["global_is_authentificated"]))
{
	include("login.php");
	exit();
}//EndOfAuthorisation

include("main.php");

?>
