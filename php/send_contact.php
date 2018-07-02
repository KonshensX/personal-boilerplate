<?php
require_once('codage.php');

if (isset($_POST['email']) &&
    isset($_POST['nom']) && 
    isset($_POST['prenom']) && 
    isset($_POST['telephone']) &&
    isset($_POST['msg_subject']) &&
    isset($_POST['message'])) {
    require_once "Zend/Mail.php";
    $bodyHtmlTEXT = '
<html>
<head>
</head>
<body>

<p><strong>' . $_POST["nom"] . $_POST["prenom"] . '</strong> a posé une question à partir du formulaire du site. Voici les details qu\'il a fournis:</p>

<p>

- <strong>Nom</strong> : ' . $_POST["nom"] . ' <br/>  
- <strong>Prénom</strong> : ' . $_POST["prenom"] . ' <br/>  
- <strong>Email</strong> : ' . $_POST["email"] . ' <br/>
- <strong>Téléphone</strong> : ' . $_POST["telephone"] . ' <br/>
- <strong>Sujet</strong> : ' . $_POST["msg_subject"] . ' <br/>
</p>

--------------
<p>

<strong>' . $_POST["message"] . '</strong>
</p>

</body>
</html>
    ';

    $mail = new Zend_Mail();
    $mail->setBodyHtml(ReplaceSpecialChar($bodyHtmlTEXT));
    $mail->setFrom($_POST["email"], $_POST["nom"] . $_POST["prenom"]);
    $mail->addTo('lorestmabeaute@gmail.com', 'L\'Or Est Ma Beauté');
    $mail->setSubject("{$_POST["msg_subject"]}");
    @$mail->send();

    header('Location: https://.fr/');
}
