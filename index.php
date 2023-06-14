
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="index.php" method="POST" enctype="multipart/form-data" >

        <label for="audio">Mettez votre message</label>
        <input type="file" name="audio" id="audio" accept="audio/*">

        
        <input type="submit" value="Envoyer">

    </form>
        
    </div>
    <?php 

        $audio = $_FILES["audio"];
        var_dump($audio);
        $ch = curl_init();

        $headers = [
             "Authorization: App pub-f0c260396dc6c766a1fa41a18f579767-224819af-657a-45c6-990f-781634762f11",
             "Content-Type: multipart/form-data;"
        ];
        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URL => "https://api.smsbox.net/vmm/1.0/xml/import",
            CURLOPT_RETURNTRANSFER => true,

        ]);
        
        $data = curl_exec($ch);
     
        curl_close($ch);

        var_dump($data);


       
    ?>






</body>
</html>
