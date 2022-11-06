<?php 
/*
try {
  
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec(
    "CREATE TABLE IF NOT EXISTS messages (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      title TEXT, 
      message TEXT, 
      time INTEGER
    )"
  );
  
  $stmt = $db->prepare(
    "INSERT INTO messages (title, message, time) 
      VALUES (:title, :message, :time)"
  );
  
  // Bind values directly to statement variables
  $stmt->bindValue(':title', 'message title', SQLITE3_TEXT);
  $stmt->bindValue(':message', 'message body', SQLITE3_TEXT);
  
  // Format unix time to timestamp
  $formatted_time = date('Y-m-d H:i:s');
  $stmt->bindValue(':time', $formatted_time, SQLITE3_TEXT);
   
  // Execute statement
  $stmt->execute();
  
  $messages = $db->query("SELECT * FROM messages");
    
  // Garbage collect db
  $db = null;
} catch (PDOException $ex) {
  echo $ex->getMessage();
}
  */
?>

  
  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>stockmaster</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="script.js"></script>
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script>
  </head>
  <body>
  <div class='container'>
    <h1>Stockmaster 4000</h1>
    
    <span>
      <label for='simple'>
        <input type='radio' name='difficulty' id='simple' value='simple'>
        simple
      </label>

      <label for='medium'>
        <input type='radio' name='difficulty' id='medium' value='medium'>
        medium
      </label>

      <label for='advanced'>
        <input type='radio' name='difficulty' id='advanced' value='advanced'>
        advanced
      </label>
    </span>



    <main>

      <!-- PORTFOLIO SECTION: CHOOSE PROFILE AND SELECT STOCKS 

      checkbox name %12Months (green -> yellow -> red) 
      -->
      <section id='profile'>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Sector</th>
              <th>Eco</th>
              <th>Course(12M)</th>
            </tr>  
          </thead>
          <tbody>
            <?php

            //hier moet dan de nodige php code komen om de nodige files in te laden.
            
            ?>
          </tbody>
        </table>
      </section>



      <!-- DETAILS SECTION: ON HOVER OF STOCK, SHOW MORE DETAILS ON ASSETS -->
      <section id='details'>

      </section>

      
      <!-- PARAMETERS SECTION: 
      ON EASY NOT VISIBLE, 
      ON MEDIUM ONLY CHECKBOXES, 
      ON HARD CHECKBOXES AND SLIDERS  -->
      <section id='parameters'>
        <h2>Parameter preference weights</h2>
        <label for='i_region'>
          <input type='checkbox' id='select_region'>
          region: 
        </label>
        <input type='range' id='i_region' min=0 max=100>

        <label for='i_eco'>
          <input type='checkbox' id='select_eco'>
          eco:
        </label>
        <input type='range' id='i_eco' min=0 max=100>

        <label for='i_sector'>
          <input type='checkbox' id='select_sector'>
          sector:
        </label>
        <input type='range' id='i_sector' min=0 max=100>

        <label for='i_course'>
          <input type='checkbox' id='select_course'>
          course:
        </label>
        <input type='range' id='i_course' min=0 max=100>
        
      </section>


      <!-- RECOMMENDATION SECTION: SHOWS THE RECOMMENDATIONS -->
      <section id='recommendations'>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Sector</th>
              <th>Eco</th>
              <th>Course(12M)</th>
            </tr>  
          </thead>
          <tbody>
            <?php

            //hier moet dan de nodige php code komen om de nodige files in te laden.
            ?>
          </tbody>
        </table>
      </section>
    </main>


    <span class='review' hidden>
      <h2>Question X: ____</h2>
      <span>
        <input type='radio' name='difficulty' value='simple'>
        <label for='easy'>:)</label>

        <input type='radio' name='difficulty' value='medium'>
        <label for='easy'>:|</label>

        <input type='radio' name='difficulty' value='advanced'>
        <label for='easy'>:( </label>
      </span>
    </span>
  </div>
  <footer>
    This page was made by Group 11: Dries, Cas, Ruben, Jens &copy; rights reserved (?)
  </footer>
</body>
