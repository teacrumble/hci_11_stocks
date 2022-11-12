<?php
//PROBEERT DE DATABANK TE MAKEN EN MOGELIJK TE VULLEN 
try {
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec("DROP TABLE IF EXISTS stocks");
  $res = $db->exec(
    "CREATE TABLE IF NOT EXISTS stocks (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      name TEXT, 
      sectors TEXT, 
      course_difference_6M REAL,
      esg REAL,
      country TEXT,
      continent TEXT
    )"
  );
  

  //for every stock (meta as example)
  //----------------------------------------------------------

  //set query with variables
  $stmt = $db->prepare(
    "INSERT INTO stocks (name, sectors, course_difference_6M, esg, country, continent) 
      VALUES (:name, :sector, :course_diff, :esg, :country, :continent)"
  );
  
  // Bind values directly to statement variables
  $stmt->bindValue(':name', 'META', SQLITE3_TEXT);
  $stmt->bindValue(':sector', 'Tech', SQLITE3_TEXT);
  $stmt->bindValue(':course_diff', -40.9, SQLITE3_FLOAT);
  $stmt->bindValue(':esg', 34.5, SQLITE3_FLOAT);
  $stmt->bindValue(':country', 'USA', SQLITE3_TEXT);
  $stmt->bindValue(':continent', 'NA', SQLITE3_TEXT);
  
  // Format unix time to timestamp
  //$formatted_time = date('Y-m-d H:i:s');
  //$stmt->bindValue(':time', $formatted_time, SQLITE3_TEXT);
   
  // Execute statement
  $stmt->execute();
  //----------------------------------------------------------

  
  // Garbage collect db
  $db = null;
} catch (PDOException $ex) {
  echo $ex->getMessage();
}


//SETTINGS GEEFT INFORMATIE DOOR NAAR DE RECOMMENDER
class Settings{
    public $profile;
    public $parameters;

    public function __construct($prof, $param){
        $this->profile = $prof;
        $this->parameters = $param;
    }
}


//FUNCTION 1: GIVEN A PROFILE, LOAD THEIR STOCKS INTO THE TABLE, RETURN THE TABLE IN HTML
function loadStocks(int $profile){
    try {
        $db = new PDO('sqlite:database.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
        $first = true;
        $stocks = $db->query("SELECT name, sectors, course_difference_6M as \"course (6 Mo)\", esg, country, continent FROM stocks ORDER BY id ASC");
        while($row = $stocks->fetch(\PDO::FETCH_ASSOC)){
          if ($first){
            echo '<thead> <tr>';
            echo '<th> </th>';
            foreach($row as $key=>$value){
              echo "<th>$key</th>";
            }
            echo '</tr> </thead>';
            echo '<tbody>';
            $first = false;
          }

          echo '<tr>';
          echo '<td><input type="checkbox"/></td>';
          foreach($row as $key=>$value){
            $col = '';
            $postfix = '';
            if ($key == "course (6 Mo)"){
                $postfix = '%';
                if($value > 25){
                    $col = 'very_good';
                }
                else if ($value > 0){
                    $col = 'good';
                }
                else if($value < -25){
                    $col = 'very_bad';
                }
                else if($value < 0){
                    $col = 'bad';
                }
            }
            else if($key == "esg"){
                if($value <= 10){
                    $col = 'very_good';
                }
                else if ($value <= 20){
                    $col = 'good';
                }
                else if($value <= 30){
                    $col = 'neutral';
                }
                else if($value <= 40){
                    $col = 'bad';
                }
                else{
                    $col = 'very_bad';
                }
            }
            echo "<td class=\"$col\"> $value $postfix</td>";
          }
          echo '</tr>';
        }
        echo '</tbody>';

        $db = null;
      }catch (PDOException $ex) {
        echo $ex->getMessage();
      }
}


//FUNCTION 2: GIVEN A COLLECTION OF SETTINGS: GIVE THE TOP X RECOMMENDATIONS. RETURN IN HTML
function loadRecommendedStocks(Settings $settings){
    foreach($settings->parameters as $k=>$v){
        echo "$k : $v\t";
    }
}
?>