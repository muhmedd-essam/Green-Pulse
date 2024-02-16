<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Green Pulse</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
      <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="green2assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="green2assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="main.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('http://localhost:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.token) {
                            console.log('Login successful!');
                            sessionStorage.setItem('localStorageToken', data.token);
                            window.location.href = 'green_pulse_posts/index.php';
                        } else {
                            console.error('Login failed:', data.message || 'Unknown error');
                            errorMessage.textContent = 'Incorrect. Please try again.';
                        }
                    })
                    .catch(error => {
                        console.error('Unexpected error:', error);
                    });
                });
            });

            $(document).ready(function () {

            $("#signupButton").click(function () {
                console.log("ss");

                var formData = {
                "email": $('#emailInput').val(),
                "name": $("#usernameInput").val(),
                "password": $("#passwordInput").val(),
                "image": $("#profilePicture").val(),
                "career": $("#careerInput").val(),
                "phone": $("#phoneInput").val(),
                "country": $("#countryInput").val(),
                "intersts": $("#interstsInput").val(),
                "about": $("#aboutInput").val(),
                "birthdate": $("#birthdateInput").val(),
                };
                var formDataJSON = JSON.stringify(formData);
                console.log(formDataJSON);

                for (var key in formData) {
                    if (formData.hasOwnProperty(key) && formData[key] === "") {
                        console.error("Error: Empty value for key " + key);
                        return; // قم بإيقاف التنفيذ إذا كانت هناك قيمة فارغة
                    }
                }

                $.ajax({
                    url: "http://localhost:8000/api/register", // استبدل هذا بعنوان نقطة نهاية التسجيل الفعلية
                    type: "POST",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                    },
                    data: formDataJSON,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log("Registration successful:", response);
                        // هنا يمكنك التعامل مع الاستجابة بشكل مناسب (على سبيل المثال، إظهار رسالة نجاح)
                        $("#successMessage").text("Registration successful!");
                    },
                    error: function (error) {
                        console.error("Registration error:", error);
                        // هنا يمكنك التعامل مع الخطأ بشكل مناسب (على سبيل المثال، إظهار رسالة خطأ)
                    }
                });
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: "http://localhost:8000/api/options",
                type: "GET",
                success: function(data) {
                    console.log("Data from API:", data);

                    var careerOptionsSource = $("#career-template").html();
                    var careerOptionsTemplate = Handlebars.compile(careerOptionsSource);
                    var careerOptionsHtml = careerOptionsTemplate({ user: data["career"] });
                    $("#user-options-container").html(careerOptionsHtml);

                    var interstsOptionsSource = $("#intersts-template").html();
                    var interstsOptionsTemplate = Handlebars.compile(interstsOptionsSource);
                    var interstsOptionsHtml = interstsOptionsTemplate({ user: data["intersts"] });
                    $("#career-options-container").html(interstsOptionsHtml);


                    var countrytOptionsSource = $("#country-template").html();
                    var countryOptionsTemplate = Handlebars.compile(countrytOptionsSource);
                    var countryOptionsHtml = countryOptionsTemplate({ user: data["countries"] });
                    $("#country-options-container").html(countryOptionsHtml);
                },
                error: function() {
                    alert("Error API");
                }
            });
        });

  </script>


  </head>
  <body>

    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <img src="/GreenInnoSphere/green pulse/green2assets/img/Icon_svg.svg" alt="Green Pulse Logo" width="50" height="50"> <strong style="color: rgb(61, 203, 61);margin-top: 4px; margin-right: 650px; font-size: xx-large" >Green Pulse</strong></a>

        <!-- <ul class="nav_items">
          <li class="nav_item" style="margin-bottom: 0px;margin-top: 15px;">
            <a href="#" class="nav_link">Home</a>

            <a href="#" class="nav_link">Services</a>
            <a href="#" class="nav_link">Contact</a>
          </li>
        </ul> -->

        <button class="buttonMain" id="form-open">Join Us Now!</button>
      </nav>
    </header>
    <section class="home">
        <div class="form_container">
          <i class="uil uil-times form_close"></i>
          <!-- Login From -->
          <div class="form login_form">
          <form action="#" id="loginForm">
            <h2>Login</h2>

            <div class="input_box">
            <input type="email" id="email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
            <input type="password" id="password" placeholder="Enter your password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>

            <br>

            </div>

            <div class="option_field">
            <span class="checkbox">
              <input type="checkbox" id="check" />
              <label for="check">Remember me</label>
            </span>
            <a href="#" class="forgot_pw">Forgot password?</a>
            </div>

            <span id="errorMessage" style="color: red;"></span>
            <button  type="submit" class="button" value="Login" id="submit" name="submit">Login</button>
            </form>

            <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
          </form>
          </div>

          <!-- Signup From -->
          <div class="form signup_form">
          <form id="signupForm" action="#" enctype="multipart/form-data">
            <h2>Signup</h2>

            <div class="input_box">
            <input type="email" placeholder="Enter your email"  id="emailInput" required />
            <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
            <input type="email" placeholder="Enter your about"  id="aboutInput" required />
            <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
            <input type="date" placeholder="Enter your birthdate"  id="birthdateInput" required />
            <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
            <i class="uil uil-user "></i>
            <input type="username" placeholder="Enter your username"  id="usernameInput" required />



            </div>
            <div class="input_box">
            <i class="uil uil-search-alt "></i>
            <input type="number" placeholder="phone" id="phoneInput" />

            </div>
            <div class="input_box">
            <label for="profilePicture">Upload Profile Picture</label>
            <input type="file" id="profilePicture" name="profilePicture" accept="image/*" />
             <!-- Add this div for the success message -->
             <div id="successMessage"></div>
            </div>

            <div id="country-options-container"></div>
            <script id="country-template" type="text/x-handlebars-template">
            <div class="input_box">
            <i class="uil uil-award-alt"></i>
            <select  id="countryInput" required>
              <option value="" disabled selected>Select your country</option>
              {{#each user}}
              <option value="{{this}}">{{this}}</option>
              {{/each}}
            </select>
            </div>
            </script>

            <div id="user-options-container"></div>
            <script id="career-template" type="text/x-handlebars-template">

            <div class="input_box">
            <i class="uil uil-award-alt"></i>
            <select  id="careerInput" required>
              <option value="" disabled selected>Select your career</option>
              {{#each user}}
              <option value="{{this}}">{{this}}</option>
              {{/each}}
              <!-- Add more options as needed -->
            </select>
            </div>
            </script>

            <div id="career-options-container"></div>
            <script id="intersts-template" type="text/x-handlebars-template">
            <div class="input_box">
                <i class="uil uil-award-alt"></i>

                <select id="interstsInput" required multiple size="5">
                    <option value="" disabled>Select your interests</option>
                    {{#each user}}
                        <option value="{{this}}">{{this}}</option>
                    {{/each}}
                </select>
            </div>

            <div id="country-options-container"></div>
            <script id="country-template" type="text/x-handlebars-template">
            <div class="input_box">
            <i class="uil uil-award-alt"></i>
            <select  id="countryInput" required>
              <option value="" disabled selected>Select your country</option>
              {{#each user}}
              <option value="{{this}}">{{this}}</option>
              {{/each}}
            </select>
            </div>
            </script>



          <div class="input_box" id="verificationUploadContainer" style="display: none;">

            <label for="verificationDocument">Upload Verification Document</label>
            <input type="file" id="verificationDocument" name="verificationDocument" accept="image/*" />
            <div id="verificationSuccessMessage"></div>
          </div>
            <div class="input_box">
            <input type="password" placeholder="Create password" id="passwordInput" required/>
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
            <input type="password" placeholder="Confirm password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <!-- Inside your signup form -->



            <button type="button" class="button" id="signupButton">Signup</button>
            <div id="successMessage"></div>

            <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
          </form>
          </div>
        </div>
        </section>
            <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(/GreenInnoSphere/green%20pulse/green2assets/img/slide/bg.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span style="color: rgb(70, 240, 70);">Green Pulse</span> Community</h2>
              <h3 class="animate__animated animate__fadeInDown" style="color: aliceblue;"><strong>Connect.Innovate.Change</strong></h3>
              <br>
              <p class="animate__animated animate__fadeInUp" style="text-align: justify;"><em>Step into a world where sustainability meets community, as we unite under the banner of 'Green Pulse.' Here, we foster change, inspire eco-conscious living, and amplify our collective efforts for a greener, more sustainable future.</em></p>


            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(/GreenInnoSphere/green%20pulse/green2assets/img/slide/slide-4.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Our Mission</h2>
              <br>
              <p class="animate__animated animate__fadeInUp"><em>Empowering a global community dedicated to sustainable living, our mission at <span style="color: rgb(70, 240, 70);"><strong>Green Pulse</strong></span> is to foster <span style="color: rgb(70, 240, 70);">connection</span>, inspire <span style="color: rgb(70, 240, 70);">innovation</span>, and drive positive <span style="color: rgb(70, 240, 70);">change</span>. Through collaborative efforts, we aim to create a greener, healthier planet for current and future generations. Join us on this transformative journey towards a sustainable and harmonious world.</em></p>

            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(/GreenInnoSphere/green%20pulse/green2assets/img/slide/slide-8.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">About Us</h2>
              <p class="animate__animated animate__fadeInUp" style="text-align: justify;"><em>Empowering global climate action, we unite individuals worldwide on our dynamic platform. Through user-friendly features, members can create posts, seek expert advice, and report environmental concerns anonymously. We leverage collective innovation, aiming to mobilize billions in building a sustainable future. Together, let's amplify diverse ideas and be the catalyst for impactful change in the fight against climate change.</em></p>

            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
    <script src="green2assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="green2assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="green2assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="green2assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="green2assets/vendor/php-email-form/validate.js"></script>
  </section><!-- End Hero -->
  <main id="main">
        <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services section-bg">
          <div class="container">

            <div class="row no-gutters">
              <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-laptop"></i></div>
                  <h4 class="title"><a href="">Simulation</a></h4>
                  <p class="description" style="text-align: justify;">Dive into the future with our interactive simulation, where users can explore the evolving threat of sea-level rise and coastal floods. Witness the impact over the years through dynamic maps and vivid visuals, providing a compelling experience to comprehend the potential consequences of climate change on coastal areas.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-briefcase"></i></div>
                  <h4 class="title"><a href="">Post, Ask and Report</a></h4>
                  <p class="description" style="text-align: justify;">Post your ideas and discoveries to inspire a global community, ask experts for solutions to climate challenges, and report environmental concerns anonymously, contributing to a collective effort for a sustainable future.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                  <h4 class="title"><a href="">Calculate your carbon footprint </a></h4>
                  <p class="description" style="text-align: justify;">A user-friendly tool that allows you to effortlessly track and understand your daily carbon emissions. Gain insights into your environmental impact, make informed choices, and contribute to a greener world with personalized suggestions for reducing your carbon footprint.</p>
                </div>
              </div>
            </div>

          </div>
   </section><!-- End Featured Services Section -->


 <!-- Vendor JS Files -->

    <script src="script.js"></script>
    <script src="/GreenInnoSphere/green pulse/greenjs/main.js"></script>
  </body>
</html>
