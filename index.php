
<?php
  $size = 25;
  $from = 0;
  if(isset($_GET['location'])){
    //get location from the textbox
    $loc= $_GET['location'];
    $url = "https://epc.opendatacommunities.org/api/v1/display/search?address=".$loc."&size=".$size."&from=".$from."";


  }
  else{
    //default
    $loc = null;
    $url = "https://epc.opendatacommunities.org/api/v1/display/search?address=&size=".$size."&from=".$from."";

  }
  //connect to API
    include('conn/api.php');
    $rows = count($json['rows']);


?>
 <!DOCTYPE html>
 <html>
 <head>
   <link rel="stylesheet" href="scss/style.css">
 <title>Title of the document</title>
 </head>
 <body>
      <div class="container">
        <form action="#">
          <input type="text" placeholder="Search.." name="location">
          <button type="submit">Search</button>
        </form>

        <div class="data">
          <h1><?php if($loc != null){echo $loc ;}?></h1>
          <table>

              <tr>
                <th>Address</th>
                <th>Operational rating</th>
                <th>Operational rating Band</th>
              </tr>
              <?php
              if($json['rows']!=null){
                //echo $season_data;
                  foreach ($json['rows'] as $element) {
                    echo '<tr>
                          <td><a href="certificate.php?id='.$element['lmk-key'].'">'.$element['address'].'</a></td>
                          <td style="width: 10%">'.$element['current-operational-rating'].'</td>
                          <td style="width: 10%">'.$element['operational-rating-band'].'</td>
                          </tr>';
                  //echo $element['address'] . '<br />';
                }
                echo "</table>";
              }else {
                print "no data";
              }
              ?>
          </table>

        </div>
      </div>
 </body>

 </html>
