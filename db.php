<?php
    include_once './util.php';	
    class DBConnector {
        var $pdo;
        function __construct(){
                $dsn= "mysql:host=". Util::$SERVER_NAME . ";dbname=" . Util::$DB_NAME ."";
                $options = [ 
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false,
                        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
                        ];
                try{
                        $this->pdo = new PDO($dsn, Util::$DB_USER, Util::$DB_USER_PASS, $options);		
                        //echo "DB connection success";		
                }catch (PDOException $e){
                        echo $e->getMessage();
                }			
        }
        public function connectToDB(){
                return $this->pdo;
        } 			
        public function closeDB(){
                $this->pdo = null;
        }
    }



//include_once 'menu.php';
function opencon(){
 $servername = "localhost:3306";
 $username = "root";
 $password = "";
 $db_name = "ussdsms";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password,$db_name);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}
function savetracker($startdate,$enddate,$nextdate){
$conn = opencon();
  


        $sql = "INSERT INTO periodtracker (`StartDate`, `EndDate`, `NextDate`) VALUES ('$startdate','$enddate','$nextdate')";
        if ($conn->query($sql) === TRUE) {
           //
        }
      

            $conn->close();
}
  
function save_Session($sessionId, $level){
        $conn = opencon();
      
        $sql = "SELECT * FROM ussdsession WHERE sessionId='$sessionId'";
      $result = $conn->query($sql);
      if($result->num_rows>0){
          //
          }
          else{
                $sql = "INSERT INTO ussdsession (`sessionId`, `ussdLevel`) VALUES ('$sessionId','$level')";
                if ($conn->query($sql) === TRUE) {
                   //
                }
              }
    
                    $conn->close();
      }
?>