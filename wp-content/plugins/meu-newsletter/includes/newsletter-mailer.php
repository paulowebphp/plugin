<?php

if($_SERVER['REQUEST_METHOD'] === 'post')
{

    $name = strip_tags(trim($_POST['name']));

    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);

    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    
    echo "Mensagem: ";

    if(empty($name) || empty($email))
    {

        http_response_code(400);
        echo "Por favor, preencha todos os campos";
        exit;

    }

    $message = "Nome: $name\n";
    $message .= "E-mail: $email\n";
    $headers = "From: $name <$email>";

    if(mail($recipient, $subject, $message, $headers))
    {
        http_response_code(200);
        echo "Você está inscrito";

    }else
    {
        http_response_code(500);
        echo "Houve um problema. Tente novamente";

    }


}
else
{

    http_response_code(403);
    echo "Houve um problema. Tente novamente";

}


?>