<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MPANUGAO EXAM</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
              $("li").click(function(){
                //alert('HELLO WORLD');
                selectedCity = $(this).attr("id");
                $.ajax({
                  url: "default",
                  type:"POST",
                  data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id:selectedCity,
                  },
                  error: function(xhr, status, error) {
                    
                    var err = JSON.parse(xhr.responseText);
                    alert(err.Message);
                },
                  success:function(response){
                    //alert(response.success['icon_weather']);
                    $("h5[name='date_today']").html(response.success['date_today']);
                    $("h5[name='time_today']").html(response.success['time_today']);
                    $("h3[name='city']").html(response.success['city']);
                    $("span[name='main_weather']").html(response.success['main_weather']);
                    $("span[name='humidity']").html(response.success['humidity']);
                    $("span[name='temperature']").html(response.success['temperature']);
                    $("span[name='wind_speed']").html(response.success['wind_speed']);
                    $("img[name='icon_weather']").prop('src',response.success['icon_weather']);
                    $("h2[name='temperature']").html(response.success['temperature']);
                  },
                 });
              });
            });
        </script>

        <style>
            body {
              background: #fff;
              color: #444;
              font-family: "Segoe UI", sans-serif;
              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
            }
            h1, h2, h3, h4, h5, h6 {
              margin: 0 0 15px 0;
              padding: 0;
              font-family: "Segoe UI", sans-serif;
              font-weight:700;
            }
            /*--------------------------------------------------------------
            # Weather Card
            --------------------------------------------------------------*/
            .weather__card {
              width: 800px;
              padding: 40px 30px;
              background-color: #a5c6fa;
              border-radius: 20px;
              color:#3C4048;
            }
            .weather__card h2 {
              font-size:120px;
              font-weight:700;
              color:#3C4048;
              line-height: .8;
            }
            .weather__card h3 {
              font-size: 40px;
              font-weight: 600;
              line-height: .8;
              color:#3C4048;
            }
            .weather__card h5 {
              font-size: 20px;
              font-weight: 400;
              line-height: .1;
              color:#9D9D9D;
            }
            .weather__card img {
              width: 100px;
              height: 100px;
            }
            .weather__card .weather__description {
              background-color: #fff;
              border-radius: 25px;
              padding: 5px 13px;
              border:0;
              outline: none;
              color:#7F8487;
              font-size: .956rem;
              font-weight: 400;
            }
            /*--------------------------------------------------------------
            # Weather Status
            --------------------------------------------------------------*/
            .weather__status img {
              height: 20px;
              width: 20px;
              vertical-align:middle;
            }
            .weather__status span {
              font-weight: 500;
              color: #3C4048;
              font-size: .9rem;
              padding-left: .5rem;
            }

            .dropdown_city {
                background-color: #a5c6fa;
            }

        </style>

    </head>

    <body>

       <div class="d-flex flex-row justify-content-center align-items-center"> 
            <div class="dropdown_city">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Select Japan City
              </button>
              <ul class="dropdown-menu">
                <li id="Tokyo" class="dropdown-item">Tokyo</li>
                <li id="Yokohama" class="dropdown-item">Yokohama</li>
                <li id="Kyoto" class="dropdown-item">Kyoto</li>
                <li id="Osaka" class="dropdown-item">Osaka</li>
                <li id="Sapporo" class="dropdown-item">Sapporo</li>
                <li id="Nagoya" class="dropdown-item">Nagoya</li>
              </ul>
            </div>
        </div>

        <!-- Weather -->
        <div class="container mt-5">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <div class="weather__card">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <div class="p-3">
                            <h2 name="temperature"><?php echo e($data['temperature']); ?>&deg;</h2>
                        </div>
                        <div class="p-3">
                            <img name="icon_weather" src="<?php echo e($data['icon_weather']); ?>">
                        </div>
                        <div class="p-3">
                            <h5 name="date_today"><?php echo e($data['date_today']); ?></h5>
                            <h5 name="time_today"><?php echo e($data['time_today']); ?></h5>
                            <h3 name="city"><?php echo e($data['city']); ?></h3>
                            <span name="main_weather" class="weather__description"><?php echo e($data['main_weather']); ?></span>
                        </div>
                    </div>
                    <div class="weather__status d-flex flex-row justify-content-center align-items-center mt-3">
                        <div class="p-4 d-flex justify-content-center align-items-center">
                            <img src="https://svgur.com/i/oHw.svg">
                            <span name="humidity"><?php echo e($data['humidity']); ?>%</span>
                        </div>
                        <div class="p-4 d-flex justify-content-center align-items-center">
                            <img src="https://svgur.com/i/oH_.svg">
                            <span name="temperature"><?php echo e($data['temperature']); ?>&deg;</span>
                        </div>
                        <div class="p-4 d-flex justify-content-center align-items-center">
                            <img src="https://svgur.com/i/oKS.svg">
                            <span name="wind_speed"><?php echo e($data['wind_speed']); ?> km/h</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
<?php /**PATH C:\Apache24\htdocs\mpanugao-exam\resources\views/default.blade.php ENDPATH**/ ?>