<!DOCTYPE HTML>  
<html>
  <head>
  </head>
  <body>
    <h2>Zip Code Lookup</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      City: <input type="text" name="city" value="<?php echo $city;?>">
      <span class="error">* <?php echo $city;?></span>
      <br><br>
      State: <input type="text" name="state" value="<?php echo $state;?>">
      <span class="error">* <?php echo $state;?></span>
      <br><br>
      <input type="submit" name="search" value="Search">  
    </form>
    <?php
      // define variables and set to empty values
      $citiesSaved = [];
      $statesSaved = [];
      $searchResultsSaved = "";
      $cityErr = "";
      $stateErr = "";
      $authId = "bd2f1406-2ef4-13a1-c916-ecb254862719";
      $authToken = "lDCIHUjUvQ4Rnu7Tc9ow";
      $searchResults = "";
      $searchTimeout = strtotime("15 minutes");
      $currentTime = time();
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["city"])) {
          $cityErr = "City is required";
        } else {
          $city = inputTrim($_POST["city"]);
          if (empty($_POST["state"])) {
            $stateErr = "State is required";
          } else {
            $state = inputTrim($_POST["State"]);
            // Check if 15 minutes has passed
            if($currenTtime > time() - $searchTimeout) {
              // Do Nothin
              } else {
              $citiesSaved = [];
              $statesSaved = [];
              $searchTimeout = strtotime("15 minutes");
              }
            if (!in_array($_POST["city"], $citiesSaved) && !in_array($_POST["state"], $statesSaved)){
              $url="https://us-zipcode.api.smartystreets.com/lookup?".$authId."&auth-token=".$authToken."&city=".$_POST["city"]."&state=".$_POST["state"];
              array_push($citiesSaved, $_POST["city"]);
              array_push($statesSaved, $_POST["state"]);
              $result = file_get_contents($url);
              $searchResults = json_decode($result, true);
              $searchResultsSaved = $searchResults;
            } else {
              $searchResults = $searchResultsSaved;
            }
          }
        }
      }
      function inputTrim($data) {
        $data = trim($data);
        return $data;
      }
    ?>
    <?php
    echo "<h2>Zip Codes:</h2>";
    foreach ($searchResults as $key => $result) {
      echo['zipcodes'][$key]['zipcode'];
    }
    ?>
  </body>
</html>