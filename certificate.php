<?php
  if(isset($_GET['id']))
  {
    $id_key = $_GET['id'];
    $url= "https://epc.opendatacommunities.org/api/v1/display/certificate/".$id_key."";
    //echo $url.'<br/>';

    include('conn/api.php');
    $json_array= $json['rows'];
    //print_r ($json_array);
    

  }

  function colorode($rating_band){
    if($rating_band == "A")
    { $background_color= "#028054";}
    if($rating_band == "B")
    { $background_color= "#299425";}
    if($rating_band == "C")
    { $background_color= "#98c60b";}
    if($rating_band == "D")
    { $background_color= "#f6ef02";}
    if($rating_band == "E")
    { $background_color= "#e9bc00";}
    if($rating_band == "F")
    { $background_color= "#dc7516";}
    if($rating_band == "G")
    { $background_color= "#c3091d";}
    //echo $background_color;
    return $background_color;
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="scss/style.css">
    <title>Certificate</title>
  </head>
  <body>
    <main>
      <div class="container">
        <article class="certificate">
          <header class="cert_title">
            <h1><?php echo $json_array[0]['address']; ?></h1>
          </header>
          <div class = "section">
            <h3>Display Energy Certificate</h3>
            <div class ="chart">
              <img src="images/energy_efficiency_rating.jpg">
              <h4>Current Rating</h4>
              <?php 
                $color_rating = colorode($json_array[0]['operational-rating-band']);
              ?>
              <div class="current" style ="background-color:<?php echo $color_rating ?>" >
                <?php echo $json_array[0]['operational-rating-band'];?>
                <p>(<?php echo $json_array[0]['current-operational-rating']; ?>)</p>
              </div>
            </div>
          </div>

          <div class="section">
            <h3>Certificate Details</h3>
            <div class="contain">
              <div class="field">
                <div class="attribute">Inspection date</div>
                <div class="value"> <?php echo $json_array[0]['inspection-date']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Lodgement date</div>
                <div class="value"> <?php echo $json_array[0]['lodgement-date']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Current Operating Rating</div>
                <div class="value"> <?php echo $json_array[0]['current-operational-rating']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Operational Rating Band</div>
                <div class="value"> <?php echo $json_array[0]['operational-rating-band']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Main Heating Fuel</div>
                <div class="value"> <?php echo $json_array[0]['main-heating-fuel']; ?> </div>
              </div>
            </div>
          </div>

          <div class="section">
            <h3>Property Details</h3>
            <div class="contain">
              <div class="field">
                <div class="attribute">Address</div>
                <div class="value"> <?php echo $json_array[0]['address']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Postcode</div>
                <div class="value"> <?php echo $json_array[0]['postcode']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">county</div>
                <div class="value"> <?php echo $json_array[0]['county']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Post Town</div>
                <div class="value"> <?php echo $json_array[0]['posttown']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Local Authority</div>
                <div class="value"> <?php echo $json_array[0]['local-authority-label']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Constituency</div>
                <div class="value"> <?php echo $json_array[0]['constituency']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Property Type</div>
                <div class="value"> <?php echo $json_array[0]['property-type']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Building Reference Number</div>
                <div class="value"> <?php echo $json_array[0]['building-reference-number']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Total Floor Area</div>
                <div class="value"> <?php echo $json_array[0]['total-floor-area']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Building Category</div>
                <div class="value"> <?php echo $json_array[0]['building-category']; ?> </div>
              </div>
              <div class="field">
                <div class="attribute">Occupancy Level</div>
                <div class="value"> <?php echo $json_array[0]['occupancy-level']; ?> </div>
              </div>
            </div>
          </div>

        </article>
      </div>
    </main>
  </body>
</html>
