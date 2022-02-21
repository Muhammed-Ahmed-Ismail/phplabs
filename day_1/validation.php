

<html>
<head>
    <title> contact form </title>


</head>

<body>
<h3> Contact Form </h3>
<div id="after_submit">
    <?php
    $Messages="";
    $Success_message="<p> thank you we recieved your message </p>";
    $Name="";
    $Email="";
    $Sent_Message="";

    if(isset($_POST["submit"])) {
        if (empty($_POST["name"])) {
            $Messages .= "<p> name is required</p>";
        }else{$Name=$_POST["name"];}
        if(strlen($_POST["name"])>100)
        {
            $Messages.="<p>Name can not be more than 100 charachters";
        }
        if (empty($_POST["email"]))
        {
            $Messages .= "<p> email is required</p>";
        }else{$Email=$_POST["email"];}
        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
        {
            $Messages.="<p>Invalid mail</p>";
        }

        if (empty($_POST["message"])) {
            $Messages .= "<p> message is required</p>";
        }else{$Sent_Message=$_POST["message"];}
        if(strlen($_POST["message"])>255)
        {
            $Messages.="<p> message length cannot be more than 255 charachters";
        }

        if (!empty($Messages)) {
            echo $Messages;
        } else {
            $Success_message.="</br>";
            $Success_message.="<p> your name is :".$_POST["name"]."</p> </br> ";
            $Success_message.="<p> your mail is :".$_POST["email"]."</p> </br> ";
            $Success_message.="<p> your message is :".$_POST["message"]."</p> </br> ";
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
