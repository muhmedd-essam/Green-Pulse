<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Clone</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
    <script>
        $(document).ready(function() {
            // استرداد الرمز المميز من localStorage
            const token = sessionStorage.getItem('localStorageToken');
            console.log(token);
            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'http://localhost/GreenInnoSphere/green%20pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }

            $.ajax({
                url: "http://localhost:8000/api/index/posts",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {
                    console.log(data);
                    var userSource = $("#user-login-template").html();
                    var userTemplate = Handlebars.compile(userSource);
                    console.log(userTemplate);

                    var userHtml = userTemplate({ user: data["user login"] });
                    console.log(userHtml);

                    $("#user-login-container").html(userHtml);
                },
                error: function() {
                    alert("Error API");
                    window.location.href = 'http://localhost/GreenInnoSphere/green%20pulse/main.php';
                }
            });

        });
        </script>

<style>
    /* قم بإزالة الزخرفة (underlining) من الروابط */
    a {
        text-decoration: none;
    }
</style>
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
          <input type="text" placeholder="Search in Green Pulse" />
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
        <span class="material-icons"> add </span>
        <span class="material-icons"> forum </span>
        <span class="material-icons"> notifications_active </span>
        <span class="material-icons"> expand_more </span>
      </div>
    </div>
    <!-- header ends -->

    <!-- main body starts -->
    <div class="main__body">
      <!-- sidebar starts -->
      <div class="sidebar">


        <div class="sidebarRow">
          <span class="material-icons"> control_point </span>
          <h4>Add a Story</h4>
        </div>


        <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_posts/index.php">
        <div class="sidebarRow">
          <span style="color:#bab99c;" class="material-icons"> burst_mode </span>
          <h4>Posts</h4>
        </div>
        </a>
        <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_asks/index.php">
        <div class="sidebarRow">
          <span style="color:#bab99c;"class="material-icons"> record_voice_over </span>
          <h4>Ask the community</h4>
        </div></a>

        <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_reports/index.php">
        <div class="sidebarRow">
          <span style="color: #bab99c ;"class="material-icons"> announcement </span>
          <h4>Report an issue</h4>
        </div></a>
        <a href="http://localhost/GreenInnoSphere/green%20pulse/Simulation/Simulation1.php">
        <div class="sidebarRow">
          <span style="color:#bab99c;"class="material-icons"> exposure </span>
          <h4>Calculator</h4>
        </div></a>

        <a href="http://localhost/GreenInnoSphere/green%20pulse/Simulation/Simulation1.php">
        <div class="sidebarRow" style="position: fixed; top: 390px;">
          <span style="color: #bab99c;"class="material-icons"> laptop_windows </span>
          <h4>Simulation Map</h4>
        </div></a><br><br><br>
        <a href="http://localhost/GreenInnoSphere/green%20pulse/Simulation/Simulation2.php">
        <div class="sidebarRow" style="position: fixed; top: 460px;">
          <span style="color: #bab99c;"class="material-icons"> laptop_windows </span>
          <h4>Simulation Pictures</h4>
        </div></a> <br><br><br>
        <div class="sidebarRow" style="position: fixed; top: 510px;">
          <span class="material-icons"> expand_more </span>
          <h4>More</h4>
        </div><br><br>
      </div>
      <div class = "calc">
      <iframe width="910" height="1300" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" src="https://calculator.carbonfootprint.com/calculator.aspx"></iframe>
      </div>

      <div style="flex: 0.33;margin-top: 22px;" class="widgets">
        <div
          class="fb-page"
          data-href="https://www.facebook.com/facebook"
          data-tabs="timeline"
          data-width="500"
          data-height="1000"
          data-small-header="false"
          data-adapt-container-width="true"
          data-hide-cover="false"
          data-show-facepile="true"
        >
          <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/facebook">Facebook</a>
          </blockquote>
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
