

<?php
include_once 'model/Pathologie.php';
/*$id = "idp"
$mer = "mer";
$typeP = "typeP";
$desc = "desc";


$conn = new mysqli($idp, $desc, $typeP, $password, $mer);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT idp, mer, typeP, desc FROM patho";
$result = $conn->query($sql);*/



/*
$dsn = "mysql:host=192.168.56.101;  dbname=tidal";

$sql =  'SELECT mer, type desc FROM patho ';
foreach  ($conn->query($sql) as $row) {
    print $row['name'] . "\t";
    print  $row['color'] . "\t";
    print $row['calories'] . "\n";
    //creer un objet a chaque iteration
}*/



$user='postgres';
$pass='1234567890';
$dbh = new PDO('pgsql:host=localhost;dbname=tidal', $user, $pass);

function getPatho(){
    $query = $dbh->prepare("SELECT * FROM patho");
    $query->execute();
    $result = $dbh->query("SELECT * FROM patho");

    $tab = array();
    

    foreach($result as $row){
        /*var_dump($row['idp']. "\t");
        var_dump($row['mer'] . "\t");
        var_dump($row['type'] . "\t");
        var_dump($row['desc'] . "\n");*/
        $test=new Pathologie($row['idp'], $row['mer'], $row['type'], $row['desc']);
        array_push($tab, $test);
    }

    print_r($tab);
    return $tab;
}

?>





