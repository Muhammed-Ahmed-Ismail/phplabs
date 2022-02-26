<?php
class Counter
{

    static function checkVisitor($newVisitor)
    {

           $visitor=new Visitor($newVisitor);
           $isNewUser=true;
           $loggedInUsers=file(logfile);
           foreach($loggedInUsers as $loggedInUser)
           {
               if(strcmp(trim($loggedInUser),trim($newVisitor))==0)
               {
                   $isNewUser=false;
                   break;
               }
           }
           if($isNewUser==true){
               $visitor->registerLog();
           }

    }
    static function echoVisitorsNumber()
    {
        $numberOfVisitors=count(file(logfile));
        echo "<h1> count of unique  visitors= <b> $numberOfVisitors</b> </h1>";
    }
}