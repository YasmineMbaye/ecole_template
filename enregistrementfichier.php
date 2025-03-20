<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include("connexion-BD.php");
    function executeSQL($sql){    
        $execution=mysqli_query(getConnexion(), $sql);   
        return $execution;                              
        }

        function addServeur ($prenom, $nom, $email, $cni, $formation_id){
            $sql= "INSERT INTO user VALUES(NULL, '$prenom','$nom','$email','$cni','$formation_id')";
            
        return executeSQL($sql);                        
       }
    
    //harge le fichier d'autoload pour PhpSpreadsheet. Les fichiers d'autoload sont utilisés pour charger automatiquement les classes et les fichiers nécessaires lorsque vous en avez besoin, sans que vous deviez les inclure manuellement.
    //toutes les classes sont généralement stockées dans un répertoire appelé vendor/. Le fichier autoload.php dans ce répertoire prend en charge le chargement automatique de ces classes.

    require 'vendor/autoload.php';

   //Cette partie permet de déclarer que vous souhaitez utiliser la classe Spreadsheet de la bibliothèque PhpSpreadsheet et use permet de rendre cette classe disponible sans utiliser son nom complet.
   //Cela rend le code plus lisible et plus facile à écrire. Par exemple, au lieu d'écrire \PhpOffice\PhpSpreadsheet\Spreadsheet, vous pouvez simplement écrire Spreadsheet. 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Writer\Csv;
    use PhpOffice\PhpSpreadsheet\Style\Alignment;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    
    // Vérifie si un bouton d'exportation a été cliqué
    if(isset($_POST['export_excel_btn'])){
        //Récupère le format de fichier choisi (Excel ou CSV).
        $file_ext_name = $_POST['export_file'];
        ////Définit un nom par défaut pour le fichier exporté.
        $filename = "user-sheet";

    //Objectifs: Ce code génère un fichier (Excel ou CSV) à partir des données stockées dans une table user de la base de données. Les données sont stylisées et organisées dans un tableur pour être téléchargées.
        $sql = "SELECT * FROM user";
        $execution = executeSQL($sql);
    
        if(mysqli_num_rows($execution) > 0){
            //Spreadsheet est une classe de la bibliothèque PhpSpreadsheet (une bibliothèque PHP qui permet de travailler avec des fichiers Excel, CSV, etc.).
            //new Spreadsheet() : Cela crée un nouveau fichier Excel vide en mémoire. On peut ensuite y ajouter des données, des styles, des feuilles, etc.
            //Un fichier Excel peut contenir plusieurs feuilles (les onglets en bas du fichier Excel, comme "Feuille1", "Feuille2").
            //Par défaut, lorsque vous créez un nouveau fichier Excel, une seule feuille est créée (généralement nommée "Sheet1" ou "Feuille1").
            //getActiveSheet() : Cela retourne la feuille active du fichier Excel.
            //Une feuille active est la feuille actuellement ouverte ou prête à être modifiée.
            //et la j'avait donnai un exemple au lieu d'utiliser spreadsheet j'ai utiliser yass donc j'ai une feuille excel stocker dans la varible yass et l'autre permet de définir que c'est ce fichier qui est active c'est sa qu'on doit faire des modification on peut aussi crée plusieurs feuilles et l'activer pour y faire des modifications
            // $yass = new Spreadsheet();
            //$activeWorksheet = $yass->getActiveSheet();
            $spreadsheet = new Spreadsheet();
            $activeWorksheet = $spreadsheet->getActiveSheet();
    
            // Appliquer des styles aux en-têtes
            $headerStyle = [
                //Police : Grasse et blanche.
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 12,
                ],
                //Fond : Vert (#4CAF50).
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4CAF50'],
                ],
                //Alignement : Centré horizontalement et verticalement.
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                //Bordures : Fines et noires.
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ];
    
            // Appliquer des styles aux données
            $dataStyle = [
                //Alignement : Aligné à gauche.
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                //Bordures : Fines et noires.
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ];
    
            // Définir les en-têtes
            $activeWorksheet->setCellValue('A1', 'Prenom');
            $activeWorksheet->setCellValue('B1', 'Nom');
            $activeWorksheet->setCellValue('C1', 'Email');
            $activeWorksheet->setCellValue('D1', 'Cni');
    
            // Appliquer le style des en-têtes
            //Applique le style défini dans $headerStyle à la plage des cellules A1:D1.
            $activeWorksheet->getStyle('A1:D1')->applyFromArray($headerStyle);
    
            // Remplir les données
            //initialise un compteur de ligne à 2, ce qui signifie que les données commenceront à être insérées dans la deuxième ligne de la feuille Excel (la ligne 1 étant réservée aux en-têtes).
            $rowcount = 2;
           // foreach ($execution as $data) : Cette boucle parcourt chaque ligne des données récupérées depuis la base de données (en utilisant la variable $execution).
           //À chaque itération, $data contient une ligne de la table, et vous accédez à chaque colonne de cette ligne (par exemple, $data['prenom'], $data['nom'], etc.).
           //$activeWorksheet->setCellValue('A' . $rowcount, $data['prenom']); : Cela insère la valeur du prénom dans la colonne A de la ligne en cours.
           //$rowcount++ : Cette ligne incrémente la valeur de $rowcount de 1 après chaque itération, pour passer à la ligne suivante de la feuille Excel. 
           foreach ($execution as $data) {
                $activeWorksheet->setCellValue('A' . $rowcount, $data['prenom']);
                $activeWorksheet->setCellValue('B' . $rowcount, $data['nom']);
                $activeWorksheet->setCellValue('C' . $rowcount, $data['email']);
                $activeWorksheet->setCellValue('D' . $rowcount, $data['cni']);
    
                $rowcount++;
            }
    
            // Appliquer le style aux données
            //getStyle('A2:D' . ($rowcount - 1)) : Cette méthode sélectionne une plage de cellules dans la feuille active pour leur appliquer un style.
            //A2:D' représente une plage de cellules allant de la colonne A, ligne 2, jusqu'à la colonne D. ($rowcount - 1) est utilisé pour calculer dynamiquement la dernière ligne de la plage.
            //Par exemple : Si $rowcount = 5, l'expression devient 'A2:D4' (car 5 - 1 = 4). Cela garantit que le style est appliqué uniquement aux cellules contenant des données.
            //applyFromArray($dataStyle) : Cette méthode applique un style défini dans un tableau PHP ($dataStyle) à la plage de cellules sélectionnée. $dataStyle contient des propriétés de style, comme l'alignement du texte, les bordures, ou d'autres formats.
            $activeWorksheet->getStyle('A2:D' . ($rowcount - 1))->applyFromArray($dataStyle);
    
            // Redimensionner automatiquement les colonnes
            //range('A', 'D') Crée une plage de lettres correspondant aux colonnes Excel (A, B, C, D). Si le tableau avait plus de colonnes (par exemple E, F, etc.), il suffirait d'ajuster la plage, comme range('A', 'F').
            //foreach (range('A', 'D') as $columnID) Parcourt chaque lettre de la plage (A, B, C, D). À chaque itération, $columnID représente une colonne (A, puis B, etc.).
            //getColumnDimension($columnID) : Accède aux dimensions (largeur) de la colonne spécifiée.
            //setAutoSize(true) : Active un ajustement automatique de la largeur de la colonne en fonction de son contenu.
            //Si une cellule contient du texte long, la largeur de la colonne sera ajustée pour que tout le texte soit visible.Cela améliore la lisibilité du fichier généré.
            foreach (range('A', 'D') as $columnID) {
                $activeWorksheet->getColumnDimension($columnID)->setAutoSize(true);
            }
    
            // Générer le fichier selon l'extension choisie
            if($file_ext_name == 'xlsx'){
                //Crée un fichier Excel (format .xlsx).
                $writer = new Xlsx($spreadsheet);
                //$contentType : Définit le type MIME correspondant au fichier Excel pour que le navigateur sache comment traiter le fichier lors du téléchargement.
                //application : Indique qu'il s'agit d'un fichier d'application (par opposition à un fichier texte, image, etc.).
                //vnd.openxmlformats-officedocument.spreadsheetml.sheet : Désigne un fichier Excel au format OpenXML. Ce format est utilisé pour les fichiers Excel modernes (.xlsx), introduits avec Microsoft Excel 2007.
                $contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                //$final_filename : Ajoute l'extension .xlsx au nom du fichier ($filename) pour que le fichier téléchargé ait le bon format.
                $final_filename = $filename . '.xlsx';
            } elseif($file_ext_name == 'csv') {
                $writer = new Csv($spreadsheet);
                $contentType = 'text/csv';
                $final_filename = $filename . '.csv';
            } else {
                die("Format de fichier non supporté.");
            }
    
            // Télécharger le fichier
            ob_clean();
            header('Content-Type: ' . $contentType);
            header('Content-Disposition: attachment; filename="' . $final_filename . '"');
            $writer->save('php://output');
            exit();
        } else {
            echo "Aucune donnée trouvée dans la table `user`.";
        }
    }
    


    if(isset($_POST['save_excel_data'])){
        //$_FILES est une superglobale qui contient les informations sur les fichiers téléchargés.
        //['import_file']['name'] récupère le nom du fichier, par exemple example.xlsx ou data.csv et stocke ce nom dans la variable $fileName.
        $fileName = $_FILES['import_file']['name'];
        //Déterminer l'extension du fichier téléchargé pour vérifier si elle est parmi les extensions autorisées (xls, csv, xlsx).
        //pathinfo($fileName, PATHINFO_EXTENSION) extrait l'extension du fichier à partir de son nom. Cela renvoie juste l'extension (xlsx, csv, etc.).
        //PATHINFO_EXTENSION est une constante qui retourne uniquement l'extension du fichier, sans le point (.) devant.
        $file_ext= pathinfo($fileName, PATHINFO_EXTENSION);
        //allowed_ext est un tableau qui contient les extensions de fichiers autorisées. Dans ce cas, les fichiers xls, csv, et xlsx sont autorisés pour l'importation. Cette vérification est importante pour garantir que seuls les fichiers conformes peuvent être traités.
        $allowed_ext = ['xls', 'csv', 'xlsx'];
        //Vérifier si l'extension du fichier téléchargé se trouve dans le tableau des extensions autorisées.
        if(in_array($file_ext, $allowed_ext)){
            //ontient le chemin temporaire vers le fichier uploadé. Avant d'utiliser le fichier pour une quelconque opération, il faut déplacer ou utiliser ce fichier à partir de ce chemin temporaire.
            //$inputFileNamePATH est une variable qui stocke ce chemin temporaire.
            $inputFileNamePATH = $_FILES['import_file']['tmp_name'];;

           //$inputFileNamePATH devient la source des données Excel temporaires qui peuvent être manipulées ou transformées avant d'être intégrées dans une base de données ou utilisées pour d'autres opérations.
           //Si le fichier est valide, il est chargé dans un objet Spreadsheet de PhpSpreadsheet à l'aide de IOFactory::load().
           //\PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePATH) : Cette fonction charge le fichier Excel en utilisant la classe IOFactory de PhpSpreadsheet. Elle retourne un objet Spreadsheet qui représente le fichier Excel. 
           $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePATH);
           //$data stocke toutes les données du fichier sous forme de tableau.
           //getActiveSheet()->toArray() : Cette méthode permet de convertir la feuille active du fichier Excel (et le fichier excel maintenant est le $spreadsheet car on l'a convertit tout a l'heure) en un tableau multidimensionnel, où chaque ligne correspond à une ligne de données dans le fichier.
            $data= $spreadsheet->getActiveSheet()->toArray();

            //Objectif : Traiter chaque ligne du fichier pour l'importer dans la base de données.
            //$count est utilisé pour éviter d'importer l'en-tête du fichier. Il commence par 0 et devient 1 lorsque la boucle commence à traiter les données.
            $count = "0";
            //foreach est une structure de boucle en PHP utilisée pour parcourir un tableau (array) ou une structure similaire. Elle permet de traiter chaque élément du tableau, un par un.
            //$data : C'est un tableau (array) contenant plusieurs éléments. Dans votre cas, $data représente les lignes d'un fichier Excel ou CSV importé.
            //$row : À chaque itération, $row contient une seule ligne de données extraite de $data. Cela peut être un sous-tableau contenant les colonnes de cette ligne.

            foreach($data as $row){
                if($count>0){
            //Dans chaque ligne ($row), vous accédez à une colonne grâce à son index : $row[0] : Première colonne (Prénom); $row[1] : Deuxième colonne (Nom); $row[2] : Troisième colonne (Email) ect...  
                    $prenome= $row['0'];
                    $nome=  $row['1'];
                    $emaile= $row['2'];
                    $cnie= $row['3'];
                    $mdpe= $row['4'];
                  //Appelle la fonction addServeur (définie précédemment) pour insérer les données de cette ligne dans la table user de la base de données.
                    addServeur($prenome, $nome, $emaile, $cnie, $mdpe);
                    $_SESSION['message-import']=" Importé avec succés";
                    header("location:ecole.php");
                    
                }
                else{
                    $count = "1";
                }
                
              
            }
           
        }
        else{
            $_SESSION['message']='invalid file';
            
            header('location:ecole.php');
            exit();
        }
        
    }
    ?>
</body>
</html>