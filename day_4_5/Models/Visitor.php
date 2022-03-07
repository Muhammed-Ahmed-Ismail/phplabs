<?php
class Visitor
{
    private $visitorCookie;

    public function __construct($newvisitorCookie)
    {
        $this->visitorCookie=$newvisitorCookie;
    }

    public function getVisitorCookie()
    {
        return $this->visitorCookie;
    }

    public function registerLog()
    {
        $logfile=fopen(logfile,"a+");
        fwrite($logfile,$this->visitorCookie.PHP_EOL);
        fclose($logfile);
    }
    public static function authenticateVisitor($username,$password)
    {
      $users=file(users);
        echo $username;
        echo $password;
        print_r($users);
        var_dump($_POST);
        foreach ($users as $user)
        {
            $userData=explode(",",$user);
            var_dump($userData);

            if($username==trim($userData[0]) && $password==trim($userData[1]))
            {
                return true;
            }

        }
        echo "false";
        return false;
        /*$usersDbConnector=new UsersDbConnector();
        $connection=$usersDbConnector->getUdbc();
        $user=$connection->table("appuserstbl")->where("username","=",$username)->get();
        echo $user->username;*/
        }

}