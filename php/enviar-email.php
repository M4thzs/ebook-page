<?php   
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];

  
    require_once "PHPMailer-master/PHPMailerAutoload.php"; 

    $mail = new PHPMailer(); 
    $mail->IsSMTP();// Método de envio  
    $mail->Host = "smtp.office365.com"; // Servidor SMTP do provedor
    $mail->Port = 587; // Endereço de SMTP do provedor 
    $mail->SMTPAuth = true; 

    // Usuário do servidor SMTP (meu email) 
    $mail->Username = 'meuemail@hotmail.com'; 
    $mail->Password = 'minhasenha123'; // Senha da minha conta de email 

    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

    $mail->From = "meuemail@hotmail.com"; // Remetente (meu e-mail)     
    $mail->FromName = "Nome Sobrenome";// Meu nome  

    $mail->AddAddress("$email", "$nome $sobrenome"); // Destinatário  

    $mail->IsHTML(true); 
    $mail->CharSet = 'UTF-8'; 

    $mail->Subject = "Obrigado por Baixar"; // Assunto do email 
    // Corpo do email 
    $mail->Body = "<h2>Olá, $nome $sobrenome</h2>
    <p>Agradecemos por baixar o nosso ebook</p>
    <p>Divirta-se!</p>
    <p>Caso o download não tenha sido feito <a href='https://drive.google.com/u/0/uc?id=1lLxk3zH-hP0BRs53ag8pp3jzfVY-QsdG&export=download' download='ebook.pdf'>Clique aqui</a></p>
    "; 
    $enviado = $mail->Send(); // Envio do email


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../favicon/ebook-icone.png" type="image/x-icon">

    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        h1{
            font-size: 35px;
        }

        a:link{
            color:white;
        }
        a:visited{
            color:#FAFAFA;
        }

    </style>
</head>
<body>

    <h1>Agradecemos por baixar o nosso ebook!</h1>
    <p>caso o Download não comece automaticamente <a href="https://drive.google.com/u/0/uc?id=1lLxk3zH-hP0BRs53ag8pp3jzfVY-QsdG&export=download" download="ebook.pdf" id="baixar">Clique aqui</a></p>
    <script src="../js/baixar.js"></script>
    
</body>
</html>