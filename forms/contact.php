<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];  
    // Hapa unaweza kufanya chochote na data uliopokea, kama vile kutuma barua pepe au kuokoa kwenye database.
    
    // Kwa mfano, unaweza kutuma barua pepe:
    $to = "bluefaceshaibu@gmail.com";
    $subject = "Ujumbe kutoka kwenye Fomu ya Tovuti";
    $body = "Jina: $name\n\nBarua pepe: $email\n\nUjumbe:\n$message";
    mail($to, $subject, $body);

    // Unaweza kupeleka mtumiaji kwa ukurasa mwingine baada ya kumaliza usindikaji:
    header("Location: contact.html");
    exit;
}
?>
