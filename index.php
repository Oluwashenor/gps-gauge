<!DOCTYPE html>
<html lang="en">
<?php
include ('dbcon.php');
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
</head>

<body>
<?php
        $ref_table = "fuel";
        $fetchData = $database->getReference($ref_table)->getValue();
        if($fetchData > 0){
        $firstKey = key($fetchData);
        $firstValue = $fetchData[$firstKey];
        $firstReadingValue = $firstValue['reading'];
        } 
        ?>
  <div class="flex items-center justify-center min-h-screen bg-rose-50 border-2">
    <!-- Card Container -->
    <div
      class="relative flex h-[600px] flex-col m-6 space-y-10 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0 md:m-0">
      <!-- Left Side -->
      <div class="p-6 w-[950px]">
        <iframe class="w-full h-full" src="//maps.google.com/maps?q=7.3665,5.1066&z=15&output=embed"></iframe>
      </div>

      <!-- Right Side -->
      <div class="flex w-[350px] items-start justify-center pt-6">
        <!-- Scorer 2 Starts -->
        <div class="layout-align">
          <div id="score-meter-2" class="layout-align">
            </span>
            <div id="tick" class="scorer-2-tick">
            </div>
          </div>
        </div>
        <div class="absolute flex">
          <span class="font-bold" style="display: inline-flex;font-size: larger; text-align: center;">Fuel Level : &nbsp;</span>
          <span id="gaugevalue" style="display: inline-flex;font-size: larger; text-align: center;"> </span>
          <span style="display: inline-flex;font-size: larger; text-align: center;"> %</span>
        </div>
        <br />
      </div>
    </div>
  </div>
</body>


  <script>
    const tick = document.getElementById("tick");
    const gaugeValue = document.getElementById("gaugevalue");
    const gaugebackground = document.getElementById("score-meter-2");

    function generateKeyframes(value) {
      const result = (value / 100) * 180;
      console.log(result);
      var keyframes = `
          @keyframes ticker-mover-2 {
              0% {
                  transform-origin: right center;
                  transform: rotate(0deg);
              }
              100% {
                  transform-origin: right center;
                  transform: rotate(${result}deg);
              }
          }
      `;
      return keyframes;
    }

    function applyKeyframes(keyframes) {
      // Check if style already exists
      var style = document.getElementById('dynamic-styles');
      if (!style) {
        // If not, create a new one
        style = document.createElement('style');
        style.id = 'dynamic-styles';
        style.type = 'text/css';
        document.head.appendChild(style);
      }
      style.innerHTML = keyframes;
    }
    const fuelReading =<?php echo json_encode($firstReadingValue); ?>;
    var keyframes = generateKeyframes(fuelReading);
    applyKeyframes(keyframes);
    gaugeValue.innerText = fuelReading;

    if(fuelReading < 20){
      gaugebackground.style.border = "140px solid #FFCA3D";
      gaugebackground.style.borderBottom = "0";
    }
    else if(fuelReading > 20 && fuelReading < 50){
      gaugebackground.style.border = "140px solid #FFCA3D";
      gaugebackground.style.borderBottom = "0";
    }
    else{
      gaugebackground.style.border = "140px solid #A3CD3B";
      gaugebackground.style.borderBottom = "0";
    }

  </script>

</html>