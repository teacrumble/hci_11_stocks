<?php 
include("stocks.php");
?>
  
  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>stockmaster</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <div class='container'>
    <h1>Stockmaster 4000</h1>
    <main>
      <div id="pager">
        <label for="page1" >
          <input type="radio" name="page" value="1" id="page1" checked> stock selection
        </label>
        <label for="page2" >
          <input type="radio" name="page" value="2" id="page2"> parameters & recommendations
        </label>
      </div>
      <!-- PORTFOLIO SECTION: CHOOSE PROFILE AND SELECT STOCKS  -->
      <section id='profile' class='p1'>
        <table>
            <?php
            loadStocks(1);
            ?>
        </table>
      </section>



      <!-- DETAILS SECTION: ON HOVER OF STOCK, SHOW MORE DETAILS ON ASSETS -->
      <section id='details' class='p1'>

      </section>

      
      <!-- PARAMETERS SECTION: 
      ON EASY NOT VISIBLE, 
      ON MEDIUM ONLY CHECKBOXES, 
      ON HARD CHECKBOXES AND SLIDERS  -->
      <section id='parameters' class='p2 sleep'>
        <h2>Parameter preference weights</h2>
        <label for='i_region'>
          <input type='checkbox' id='select_region'>
          region: 
        </label>
        <input type='range' id='i_region' min=0 max=100>

        <label for='i_eco'>
          <input type='checkbox' id='select_eco'>
          ESG:
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
      <section id='recommendations' class='p2 sleep'>
        <table>
          <?php
          $sets = new Settings(2, ['lol'=>2, 'esg'=>3]);
          loadRecommendedStocks($sets);
          ?>
        </table>
      </section>
    </main>


    <span class='review' hidden>
    </span>
  </div>
  <footer>
    <script src="script.js"></script>
    This page was made by Group 11: Dries, Cas, Ruben, Jens &copy; rights reserved (?)
  </footer>
</body>
