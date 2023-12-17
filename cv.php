    <?php
    require_once __DIR__ . '/vendor/autoload.php';
    require_once 'class.php';
    use Dompdf\Options;

    echo 'test1';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    function getCVData($db) {
        $query = $db->query('SELECT * FROM cv_data ORDER BY id DESC LIMIT 1');
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    try {
        // Connect to SQLite database
        $pdo = new PDO("sqlite:db.sqlite");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    echo 'test2';

    // Create table if not exists
    if (isset($pdo)) {
        $sql = "CREATE TABLE IF NOT EXISTS cv_data (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            fullname TEXT,
            profession TEXT,
            picture TEXT,
            objective TEXT,
            address TEXT,
            mobile TEXT,
            email TEXT,
            lien1 TEXT,
            lien2 TEXT,
            langue1 TEXT,
            langue2 TEXT,
            info1 TEXT,
            info2 TEXT,
            competences TEXT,
            formation TEXT,
            experience TEXT,
            hobbies TEXT,
            certificate1 TEXT,
            certificate2 TEXT,
            certificate3 TEXT
        )";
        $pdo->exec($sql);
    }

    echo 'test3';

    if (isset($_POST['btn'])) {
        // Personal Information
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : ''; // Modification ici
        $profession = $_POST['profession'];
        $picture = $_FILES['picture']['name'];
        $tmp_name = $_FILES['picture']['tmp_name'];
        $folder = "images/" . $picture;
        move_uploaded_file($tmp_name, $folder);
        $objective = $_POST['objective'];

        // Contact Information
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $lien1 = $_POST['lien1'];
        $lien2 = $_POST['lien2'];

        // Language Information
        $langue1 = $_POST['langue1'];
        $langue2 = $_POST['langue2'];

        // Other Information
        $info1 = $_POST['info1'];
        $info2 = $_POST['info2'];

        // Skills Information
        $competences = $_POST['competences'];

        // Education Information
        $formation = $_POST['formation'];

        // Experience Information
        $experience = $_POST['experience'];

        // Hobbies Information
        $hobbies = $_POST['hobbies'];

        // Certifications Information
        $certificate1 = $_POST['certificate1'];
        $certificate2 = $_POST['certificate2'];
        $certificate3 = $_POST['certificate3'];

        // Connexion à la base de données SQLite
        $db = new PDO('sqlite:' . __DIR__ . '/db.sqlite');

        $banner = new Banner($fullname, $profession, $picture);
        $sidebar = new Sidebar($objective);
        $container = new Container($competences, $formation, $experience, $hobbies, $certificate1, $certificate2, $certificate3);
        $footer = new Footer($mobile, $email);


        // Insertion des données dans la table cv_data
        $insertQuery = $db->prepare('INSERT INTO cv_data (fullname, profession, picture, objective, address, mobile, email, lien1, lien2, langue1, langue2, info1, info2, competences, formation, experience, hobbies, certificate1, certificate2, certificate3) VALUES (:fullname, :profession, :picture, :objective, :address, :mobile, :email, :lien1, :lien2, :langue1, :langue2, :info1, :info2, :competences, :formation, :experience, :hobbies, :certificate1, :certificate2, :certificate3)');

        $insertQuery->bindParam(':fullname', $fullname);
        $insertQuery->bindParam(':profession', $profession);
        $insertQuery->bindParam(':picture', $picture);
        $insertQuery->bindParam(':objective', $objective);
        $insertQuery->bindParam(':address', $address);
        $insertQuery->bindParam(':mobile', $mobile);
        $insertQuery->bindParam(':email', $email);
        $insertQuery->bindParam(':lien1', $lien1);
        $insertQuery->bindParam(':lien2', $lien2);
        $insertQuery->bindParam(':langue1', $langue1);
        $insertQuery->bindParam(':langue2', $langue2);
        $insertQuery->bindParam(':info1', $info1);
        $insertQuery->bindParam(':info2', $info2);
        $insertQuery->bindParam(':competences', $competences, PDO::PARAM_STR);
        $insertQuery->bindParam(':formation', $formation);
        $insertQuery->bindParam(':experience', $experience);
        $insertQuery->bindParam(':hobbies', $hobbies);
        $insertQuery->bindParam(':certificate1', $certificate1);
        $insertQuery->bindParam(':certificate2', $certificate2);
        $insertQuery->bindParam(':certificate3', $certificate3);

        $insertQuery->execute();

        echo 'test4';
        echo $fullname; // est renvoyé donc ça marche la recup de donnée

        // Récupérer les données après l'insertion
        $cvData = getCVData($db);

        require_once 'vendor/autoload.php';

    // Charger le fichier cv.css
        $style = file_get_contents('cv.css');

    // Load the HTML content from cv_html.php
        ob_start();
        include 'cvhtml.php'; // Assurez-vous que le chemin d'inclusion est correct
        $html = ob_get_clean();

    // Instancie les options de Dompdf
        $options = new Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

// Output the generated PDF to Browser
        $dompdf->stream('MyCV.pdf');

        echo 'test6';

    }