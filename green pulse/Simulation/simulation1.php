<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulation1</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

    <script>
        $(document).ready(function() {
            // استرداد الرمز المميز من localStorage
            const token = sessionStorage.getItem('localStorageToken');
            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'green pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }

            $.ajax({
                url: "http://localhost:8000/api/indexMaps",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {
                    var yearSource = $("#user-year-template").html(); // استخدام الهوية الجديدة
                    var yearTemplate = Handlebars.compile(yearSource);
                    var yearHtml = yearTemplate({ year: data["year"] });

                    $("#user-year-container").html(yearHtml);

                    var userSource = $("#user-login-template").html(); // استخدام الهوية الجديدة
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({ user: data["user login"] });

                    $("#user-login-container").html(userHtml);
                },
                error: function() {
                    alert("Error API");
                    window.location.href = 'http://localhost/GreenInnoSphere/green%20pulse/main.php';
                }
            });


        });
        </script>

<script>


function handleButtonClick() {

        const token = sessionStorage.getItem('localStorageToken');
        console.log(token);

        var selectedYearId = $("#yearOptions").val();
        console.log(selectedYearId);

        // أرسل الـ ID إلى الـ API باستخدام AJAX
        fetch(`http://localhost:8000/api/indexMap/${selectedYearId}`, {
                    method: 'get',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        "Authorization": "Bearer " + token,
                        // يمكنك إضافة رأس التوثيق هنا إذا كان ذلك مطلوبًا
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // هنا يمكنك التعامل مع الاستجابة من الـ API إذا كنت بحاجة إلى ذلك
                    console.log('Up vote successful:', data);

                    var mapSource = $("#user-map-template").html(); // استخدام الهوية الجديدة
                    var mapTemplate = Handlebars.compile(mapSource);
                    var mapHtml = mapTemplate({ map: data["year"] });
                    console.log(mapHtml);
                    console.log(data["year"]);

                    $("#user-map-container").html(mapHtml);

                })
                .catch(error => {
                    console.error('Up vote error:', error);
                });
            }

  </script>
  </head>
  <body>

     <!-- header starts -->
     <div class="header">
      <div class="header__left">
        <img
          src="img/Icon_svg.svg" alt=""
        />
        <div class="header__input">
          <span class="material-icons"> search </span>
          <input type="text" id="searchInput" placeholder="Search in Green Pulse" onkeydown="handleKeyPress(event)" />
        </div>
      </div>

      <div class="header__middle">

        <div class="header__option ">
          <span class="material-icons"> subscriptions </span>
        </div>
        <div class="header__option">
          <span class="material-icons"> chat </span>
        </div>
        <div class="header__option">
          <span class="material-icons"> people </span>
        </div>
      </div>

      <div class="header__right">
        <div id="user-login-container"></div>
        <script id="user-login-template" type="text/x-handlebars-template">

            {{#each user}}

                <div class="header__info">
                <span class="user__avatar post__avatar" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; display: inline-block;">
              <img src="http://localhost/GreenInnoSphere/storage/app/{{image}}" alt="User Avatar" style="width: 100%; height: 100%; object-fit: cover;">
           </span>
                    <h4>{{ name }}</h4>
                </div>
            {{/each}}
        </script>
        <div class="header__icons">
        <span class="material-icons"> add </span>
        <span class="material-icons"> forum </span>
        <span class="material-icons"> notifications_active </span>
        <span class="material-icons"> expand_more </span>
        </div>
      </div>
    </div>
    <!-- header ends -->

    <!-- main body starts -->
    <div class="main__body">
  <!-- sidebar starts -->
  <div class="sidebar" >


    <div class="sidebarRow" style="position: fixed; ">
      <span class="material-icons"> control_point </span>
      <h4>Add a Story</h4>
    </div><br><br>
    <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_posts/index.php">
    <div class="sidebarRow" style="position: fixed; top: 160px; ">
      <span style="color:#bab99c;" class="material-icons"> burst_mode </span>
      <h4>Posts</h4>
    </div></a>
    <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_asks/index.php">
    <div class="sidebarRow" style="position: fixed; top: 210px;">
      <span style="color:#bab99c;" class="material-icons"> record_voice_over </span>
      <h4>Ask the community</h4>
    </div></a>
    <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_reports/index.php">
    <div class="sidebarRow" style="position: fixed; top: 270px;">
      <span style="color: #bab99c ;"class="material-icons"> announcement </span>
      <h4>Report an issue</h4>
    </div></a><br><br><br>
    <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_calc/calculator.php">
    <div class="sidebarRow" style="position: fixed; top: 330px;">
      <span style="color:#bab99c;"class="material-icons"> exposure </span>
      <h4>Calculator</h4>
    </div></a><br><br><br>

    <div class="sidebarRow" style="position: fixed; top: 390px;">
      <span style="color: #bab99c;"class="material-icons"> laptop_windows </span>
      <h4>Simulation Map</h4>
    </div><br><br><br>

    <a href="http://localhost/GreenInnoSphere/green%20pulse/Simulation/Simulation2.php">
        <div class="sidebarRow" style="position: fixed; top: 450px;">
          <span style="color: #bab99c;"class="material-icons"> laptop_windows </span>
          <h4>Simulation Pictures</h4>
        </div></a> <br><br><br>

    <div class="sidebarRow" style="position: fixed; top: 510px;">
      <span class="material-icons"> expand_more </span>
      <h4>More</h4>
    </div><br><br>

  </div>
  <!-- sidebar ends -->
      <div style="margin-top: 30px; display: flex; flex-direction: column; align-items: center;" class="simulation">
      <div id="user-year-container"></div>
        <script id="user-year-template" type="text/x-handlebars-template">
        <!-- Year Options Container -->
        <div style="margin-bottom: 10px; margin-right: 380px;">
          <label for="yearOptions"><h3>Explore sea level rise and coastal flood threats through the years:</h3></label>
          <select id="yearOptions" style="color: black;">
          {{#each year}}
            <option style="color: black;" value="{{id}}" id="yearOptions">{{year}}</option>
            {{/each}}
          </select>
          <button id="myButtonSearch" class="myButtonSearch" style="color:black; " onclick="handleButtonClick()">Search</button>
        </div>
    </script>


        <!-- Container for Map and Facebook Widget -->

        <div style="display: flex; justify-content: space-between; width: 100%;">
        <div id="user-map-container"></div>
          <script id="user-map-template" type="text/x-handlebars-template">

          <!-- Map Container -->

          <div style="flex: 0.66; margin-right: 10px;">

          {{#each map}}
          <iframe allow="fullscreen 'src'" frameBorder="0" src="{{this.code}}" width="1000" height="550" title="Climate Central | Land projected to be below annual flood level in 2050"></iframe>
          {{/each}} </div>
        </script>


          <!-- Facebook Widget Container -->
          <div style="flex: 0.33;">
            <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="300" data-height="1000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
              <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
                <a href="https://www.facebook.com/facebook">Facebook</a>
              </blockquote>
            </div>
          </div>
        </div>
      </div>

    <!-- main body ends -->

    <div id="fb-root"></div>
    <script
      async
      defer
      crossorigin="anonymous"
      src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0"
      nonce="zUxEq08J"
    ></script>




  </body>
</html>
