

<html>
<head>
    <title> contact form </title>


</head>

<body>
<h3> Contact Form </h3>
<div id="after_submit">
    <?php
    session_start();
    //print_r($_SESSION);
    $Messages="";
    $Success_message="<p> thank you we recieved your message </p>";
    $Name="";
    $Email="";
    $Sent_Message="";
    if(!isset($_SESSION["visited_befor"]))
    {
        $_SESSION["visited_befor"]=true;
        $_SESSION["count"]=1;
        echo "<h4> welcome for your first time in our site</h4>";
    }else{
        echo "<h4> You have visited this site for".$_SESSION["count"]." times</h4>";
        $_SESSION["count"]++;
    }
    //print_r($_POST);
    if(isset($_POST["submit"])) {

        if (strlen(trim($_POST["name"])) == 0) {
            $Messages .= "<p style='color: red'> name is required</p>";
        }else{$Name=$_POST["name"];}
        if(strlen($_POST["name"])>100)
        {
            $Messages.="<p style='color: red'>Name can not be more than 100 charachters</p>";
        }
        if ( strlen(trim($_POST["email"])) == 0)
        {
            echo "d";
            $Messages .= "<p style='color: red'> email is required</p>";
        }else{$Email=$_POST["email"];}
        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
        {
            $Messages .="<p style='color: red'>Invalid mail</p>";
        }

        if (strlen(trim($_POST["message"])) == 0) {
            $Messages .= "<p style='color: red'> message is required</p>";
        }else{$Sent_Message=$_POST["message"];}
        if(strlen($_POST["message"])>255)
        {
            $Messages.="<p style='color: red'> message length cannot be more than 255 charachters</p>";
        }

        if (!empty($Messages)) {
            echo $Messages;
        } else {
            $log_file=fopen("logs.txt","a+");
            $log_arr=array();
            $log_arr["date"]=date("F d Y g:i a");
            $log_arr["ip"]=$_SERVER['REMOTE_ADDR'].",";
            $log_arr["name"]=$_POST["name"].",";
            $log_arr["email"]=$_POST["email"].",";
            $log_arr["count"]=$_SESSION["count"];
            $log_line="";
            foreach ($log_arr as $logdata)
            {
                $log_line.=$logdata;
            }
            $log_line.=PHP_EOL;
            fwrite($log_file,$log_line);
            fclose($log_file);
           /* $Success_message.="</br>";
            $Success_message.="<h3  style='color: green'>your name is :<h3></br><p>".$_POST["name"]."</p>  ";
            $Success_message.="<h3  style='color: green'>your email is :<h3></br><p>".$_POST["email"]."</p>  ";
            $Success_message.="<h3  style='color: green'>your meaaage  is :<h3></br><p>".$_POST["message"]."</p> ";*/
            die($Success_message);}
    }
    ?>
</div>
<form id="contact_form" action="validation.php" method="POST" enctype="multipart/form-data">

    <div class="row">
        <label class="required" for="name">Your name:</label><br />
        <input id="name" class="input" name="name" type="text" value="<?php
        echo $Name;
        ?>" size="30" /><br />

    </div>
    <div class="row">
        <label class="required" for="email">Your email:</label><br />
        <input id="email" class="input" name="email" type="text" value="<?php
        echo $Email;
        ?> "size="30" /><br />

    </div>
    <div class="row">
        <label class="required" for="message">Your message:</label><br />
        <textarea id="message" class="input" name="message" rows="7" cols="30">
            <?php
            echo $Sent_Message;
            ?>
        </textarea><br />

    </div>

    <input id="submit" name="submit" type="submit" value="Send email" />
    <input id="clear" name="clear" type="reset" value="clear form" />

</form>
</body>

</html>
