<?php

class LoginController extends BaseController {

    /**
    *
    * Drive the Login Process, online or offline depending on config variable
    *
    */
    public static function GitHubLogin()
    {
	if(Config::get('oauth.online'))
	{
	    echo "<script type='text/javascript'>alert('Starting Login Process');</script>";
	    $gitHubLogin = new Login();
	    $gitHubLogin->processUser();
	}
	else
	{
	    $userName = Config::get('oauth.offlineUserName');
	    $userId = Config::get('oauth.offlineTableId');
	    $token = Config::get('oauth.offlineToken');
	    
	    Session::put('uid', $userName);
	    Session::put('tableId', $userId);
	    Session::put('token', $token);
	    
	    //Route to Projects Page
	}
    }
}