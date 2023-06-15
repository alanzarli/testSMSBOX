
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
        $ch = curl_init();
        $cfile = new CURLFile($audio["tmp_name"],$audio["type"], $audio["name"]);
        /* $cfile = curl_file_create($audio["name"],$audio["type"],$audio["name"]); */

        $headers = [
             "Authorization: App pub-533278fa1c8055ca13d216348907a8cd-496efc19-8a6e-41d9-94a1-36b54fcc8748",
             "Content-Type: multipart/form-data;"
        ];
        $data = array('file' => $cfile);
        var_dump($data);
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.smsbox.net/vmm/1.0/xml/import",
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true
            

        ]);
        
        $finalData = curl_exec($ch);
        var_dump($finalData);

        curl_close($ch);

        

       
    ?>






</body>
</html>
