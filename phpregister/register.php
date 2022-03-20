<?php
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "belltree";

        if(!$surname & !$name & !$email)
        {
            echo "Tout les champs doivent être complétés !";
        }
        else
            if(!$name)
            {
                echo "Entrez votre nom.";
            }
            else
                if(!$email)
                {
                   echo "Email requis.";
                }
                else
                { 
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "INSERT INTO usagers(mail, nom, prenom) VALUES ('$email', '$name', '$surname')";

                    if ($conn->query($sql) === TRUE) {

                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                            echo "Lien de téléchargement envoyé par mail !";

                            $header="MIME-Version: 1.0\r\n";
                            $header.='From:"Equipe Bell Tree"<ryanleho17@gmail.com>'."\n";
                            $header.='Content-Type:text/html; charset="uft-8"'."\n";
                            $header.='Content-Transfer-Encoding: 8bit';
                            $message='
                                <html>
                                    <body>
                                    <div align="center">
                                        <p>Bonjour Mr.'.$name.', nous vous remercions pour le téléchargement de notre extension ! 
                                        <p>
                                    
                                    
                                    </div>
                                    </body>
                                </html>
                                ';
                            Mail($email, "Téléchargement de Bell Tree", $message, $header);

                        } else {
                            echo "L'adresse email '$email' est invalide.";
                        }
                            

                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                }
            
        

?>