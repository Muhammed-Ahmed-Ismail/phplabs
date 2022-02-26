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

        foreach ($users as $user)
        {
            $userData=explode(",",$user);

            if($username==$userData[0] && $password==$userData[1])
            {
                return true;
            }

        }
        return false;
    }

}