<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <!-- Add our styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link rel='stylesheet' href='../green_pulse_profile/boot.css'>
    <link rel="stylesheet" href="friends.css" />
    <link rel="stylesheet" href="../green_pulse_posts/style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
    <script>
        $(document).ready(function() {
            // استرداد الرمز المميز من localStorage
            const token = sessionStorage.getItem('localStorageToken');
            console.log(token);
            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'green pulse/main.php'; // Replace 'login.html' with the actual login page URL
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

                    var userSource = $("#user-login-template").html(); // استخدام الهوية الجديدة
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({ user: data["user"] });

                    $("#user-login-container").html(userHtml);
                },
                error: function() {
                    alert("Error API");

                }
            });


        });
        </script>

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
                url: "http://localhost:8000/api/indexConnections",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {
                    // var source = $("#posts-template").html();
                    // var template = Handlebars.compile(source);
                    // var html = template({ posts: data["data of posts"] });
                    // $("#posts-container").html(html);


                    var userSource = $("#user-nonfriends-template").html();
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({ user: data["data of posts"] });
                    console.log(data);

                    $("#user-nonfriends-container").html(userHtml);
                },
                error: function() {
                    alert("Error API");
                    
                }
            });


        });
        </script>
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
                url: "http://localhost:8000/api/indexRequests",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {
                    console.log(data);


                    var userSource = $("#user-request-template").html();
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({ user: { data_of_posts: data["data of posts"] } });
                    console.log(data);

                    $("#user-request-container").html(userHtml);
                },
                error: function() {
                    alert("Error API");
                    window.location.href = 'main.php';
                }
            });


        });
        </script>

    <script>

        $(document).ready(function() {

            const token = sessionStorage.getItem('localStorageToken');

            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'green pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }
            $.ajax({
                url: "http://localhost:8000/api/indexStory",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {
                    var storyOptionsSource = $("#story-template").html();
                    var storyOptionsTemplate = Handlebars.compile(storyOptionsSource);
                    var storyOptionsHtml = storyOptionsTemplate({ user: data["data of stories"] });
                    $("#user-story-container").html(storyOptionsHtml);


                },
                error: function() {
                    alert("Error API");
                }
            });
        });
    </script>

<script>
            $(document).ready(function () {
                const token = sessionStorage.getItem('localStorageToken');

            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'green pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }
            $("#choosePostButton").click(function () {
                console.log("ss");

                var formData = {
                "which": $('#choosePostButton').val(),
                "description": $("#postInput").val(),
                "image": $("#imageInput").val(),
                };
                var formDataJSON = JSON.stringify(formData);
                console.log(formDataJSON);


                $.ajax({
                    url: "http://localhost:8000/api/post", // استبدل هذا بعنوان نقطة نهاية التسجيل الفعلية
                    type: "POST",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + token
                    },
                    data: formDataJSON,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#successMessage").text("shared successful!");
                        reloadSecondFunction();
                    },
                    error: function (error) {
                        console.error("shared error:", error);
                    }
                });
            });
            function reloadSecondFunction() {
        // Load the second function again
                    $.ajax({
                        url: "http://localhost:8000/api/index/posts",
                        type: "GET",
                        headers: {
                            "Authorization": "Bearer " + token
                        },
                        success: function (data) {
                            var source = $("#posts-template").html();
                            var template = Handlebars.compile(source);
                            var html = template({ posts: data["data of posts"] });
                            $("#posts-container").html(html);

                            // var userSource = $("#user-login-template").html();
                            // var userTemplate = Handlebars.compile(userSource);
                            // var userHtml = userTemplate({ user: data["user login"] });

                            // $("#user-login-container").html(userHtml);
                        },
                        error: function () {
                            alert("Error API");
                            window.location.href = 'main.php';
                        }
                    });
                }
            });

</script>

<script>
            $(document).ready(function () {
                const token = sessionStorage.getItem('localStorageToken');

            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'green pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }
            $("#chooseIdeaButton").click(function () {
                console.log("ss");

                var formData = {
                "which": $('#chooseIdeaButton').val(),
                "description": $("#postInput").val(),
                // "image": $("#fileInput").val(null),
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
                    url: "http://localhost:8000/api/post", // استبدل هذا بعنوان نقطة نهاية التسجيل الفعلية
                    type: "POST",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + token
                    },
                    data: formDataJSON,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log("Registration successful:", response);
                        // هنا يمكنك التعامل مع الاستجابة بشكل مناسب (على سبيل المثال، إظهار رسالة نجاح)
                        $("#successMessage").text("shared successful!");

                    },
                    error: function (error) {
                        console.error("shared error:", error);
                        // هنا يمكنك التعامل مع الخطأ بشكل مناسب (على سبيل المثال، إظهار رسالة خطأ)
                    }
                });
            });

            });
</script>
<script>
     function handleKeyPress(event) {
                const token = sessionStorage.getItem('localStorageToken');
            console.log(token);
            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'green pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }
            if (event.key === 'Enter') {
                alert('Perform search for: ' + document.getElementById('searchInput').value);
                var formData = {

                "keyword": $('#searchInput').val(),

                };
                var formDataJSON = JSON.stringify(formData);

                $.ajax({
                    url: "http://localhost:8000/api/posts/search", // استبدل هذا بعنوان نقطة نهاية التسجيل الفعلية
                    type: "POST",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + token
                    },
                    data: formDataJSON,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log("Search successful:", response);
                        // Handle the response appropriately

                        // Update the posts-container with the new search results
                        var source = $("#posts-template").html();
                        var template = Handlebars.compile(source);
                        var html = template({ posts: response["data of posts"] });

                        $("#posts-container").html(html);
                    },
                    error: function (error) {
                        console.error("Search error:", error);
                        // Handle the error appropriately
                    }
                });
            }
        };
    </script>
    <script>
        function upVote(upDiv) {
    const token = sessionStorage.getItem('localStorageToken');

    // احصل على الـ post ID من السمة data
    const postId = upDiv.dataset.postId;

    // قم بإرسال الـ post ID إلى الـ API
    fetch(`http://localhost:8000/api/follow/${postId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            "Authorization": "Bearer " + token,
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log('Up vote successful:', data);
        reloadSecondFunction();
        reloadSecondFunction2();
    })
    .catch(error => {
        console.error('Up vote error:', error);
    });
}

function reloadSecondFunction() {
    const token = sessionStorage.getItem('localStorageToken');
    $.ajax({
        url: "http://localhost:8000/api/indexConnections",
        type: "GET",
        headers: {
            "Authorization": "Bearer " + token
        },
        success: function(data) {
            var userSource = $("#user-nonfriends-template").html();
            var userTemplate = Handlebars.compile(userSource);
            var userHtml = userTemplate({ user: data["data of posts"] });
            $("#user-nonfriends-container").html(userHtml);
        },
        error: function() {
            alert("Error API");
            window.location.href = 'main.php';
        }
    });
}

function reloadSecondFunction2() {
    const token = sessionStorage.getItem('localStorageToken');
    $.ajax({
        url: "http://localhost:8000/api/indexRequests",
        type: "GET",
        headers: {
            "Authorization": "Bearer " + token
        },
        success: function(data) {
            var userSource = $("#user-request-template").html();
            var userTemplate = Handlebars.compile(userSource);
            var userHtml = userTemplate({ user: data["data of posts"] });
            $("#user-request-container").html(userHtml);
        },
        error: function() {
            alert("Error API");
            window.location.href = 'main.php';
        }
    });

    $.ajax({
        url: "http://localhost:8000/api/indexConnections",
        type: "GET",
        headers: {
            "Authorization": "Bearer " + token
        },
        success: function(data) {
            var userSource = $("#user-nonfriends-template").html();
            var userTemplate = Handlebars.compile(userSource);
            var userHtml = userTemplate({ user: data["data of posts"] });
            $("#user-nonfriends-container").html(userHtml);
        },
        error: function() {
            alert("Error API");
            window.location.href = 'main.php';
        }
    });
}
    </script>
    <script>
        function accept(upDiv) {
            const token = sessionStorage.getItem('localStorageToken');
            console.log(token);

                const postId = upDiv.dataset.postId;

                fetch(`http://localhost:8000/api/storeAccept/${postId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        "Authorization": "Bearer " + token,
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Up vote successful:', data);
                    reloadSecondFunction()

                })
                .catch(error => {
                    console.error('Up vote error:', error);
                });
            } function reloadSecondFunction() {
                const token = sessionStorage.getItem('localStorageToken');
        // Load the second function again
        $.ajax({

                url: "http://localhost:8000/api/indexRequests",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {

                    var userSource = $("#user-request-template").html();
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({ user: data["data of posts"] });
                    console.log(data);

                    $("#user-request-container").html(userHtml);
                },
                error: function() {
                    alert("Error API");
                    window.location.href = 'main.php';
                }
            });
                }
    </script>
</head>
<body>
        <!-- header starts -->
        <div class="header">
            <div class="header__left">
              <img
                src="../green_pulse_posts/img/Icon_svg.svg" alt=""
              />
              <div class="header__input">
                <span class="material-icons" style="color: white;"> search </span>
                <input type="text" id="searchInput" placeholder="Search in CircleSync" onkeydown="handleKeyPress(event)" />
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
                    <img src="http://localhost/CircleSync/storage/app/{{image}}" alt="User Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                    </span>
                          <h4>{{ name }}</h4>
                      </div>
                  {{/each}}
              </script>
              <div class="header__icons">
              <a href = "http://localhost/CircleSync/green%20pulse/green_pulse_profile/prof.php">
              <span class="material-icons"> add </span>
              </a>
              <span class="material-icons"> forum </span>
              <span class="material-icons"> notifications_active </span>
              <a href = "http://localhost/CircleSync/green%20pulse/main.php">
              <span class="material-icons"> logout </span>
              </a>
              </div>
            </div>
          </div>
          <!-- header ends -->



        <div class="container profile-page" style="margin-top: 30px;">

        <div id="user-request-container"></div>
<script id="user-request-template" type="text/x-handlebars-template">
    <div class="row">
        {{#each user.data_of_posts as |request|}}
            <div class="col-xl-6 col-lg-7 col-md-12">
                <div class="card profile-header">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="profile-image float-md-right">
                                    <img src="http://localhost/CircleSync/storage/app/{{request.user.image}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-12">
                                <h4 class="m-t-0 m-b-0"><strong>{{request.user.name}}</strong></h4>
                                <span class="job_post">{{request.user.about}}</span>
                                <p>{{request.user.career}}</p>
                                <div>
                                    <button class="btn btn-primary btn-round" data-post-id="{{request.id}}" onclick="accept(this)">accept</button>
                                    <button class="btn btn-primary btn-round btn-simple">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{/each}}
    </div>
</script>

            <div class="card social-prof">
                <div class="card-body">
                    <div class="wrapper" style="margin-top: 20px;">
                        <p style="text-align:center; font-size:larger; font-weight:bold;">People You May Know</p>
                    </div>
                </div>
            </div>
                    <div id="user-nonfriends-container"></div>
                    <script id="user-nonfriends-template" type="text/x-handlebars-template">
                    <div class="row">
                    {{#each user}}
                        <div class="col-xl-6 col-lg-7 col-md-12">

                            <div class="card profile-header">
                                <div class="body">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="profile-image float-md-right"> <img src="http://localhost/CircleSync/storage/app/{{image}}" alt=""> </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <h4 class="m-t-0 m-b-0"><strong>{{ name }}</strong></h4>
                                            <span class="job_post">{{ about }}</span>
                                            <p>{{ career }}</p>
                                            <div>
                                                <button class="btn btn-primary btn-round" data-post-id="{{id}}" onclick="upVote(this)">Follow</button>
                                                <button class="btn btn-primary btn-round btn-simple">Message</button>
                                            </div>
                                            <!-- block of social
                                            <p class="social-icon m-t-5 m-b-0">
                                                <a title="Twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                                <a title="Facebook" href="javascript:void(0);"><i class="fa fa-facebook" ></i></a>
                                                <a title="Google-plus" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                                <a title="Behance" href="javascript:void(0);"><i class="fa fa-behance"></i></a>
                                                <a title="Instagram" href="javascript:void(0);"><i class="fa fa-instagram "></i></a>
                                            </p>
        -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        {{/each}}
                    </div>
                    </script>


                                                                      <!-- Facebook widget -->
                 <div style="flex: 0.33;margin-top:-40%; margin-right: 5px; margin-left:105%; width: 100px" class="widgets">
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


            </div>

        </div>
             <!-- sidebar starts -->
             <div class="sidebar"  >


                <div class="sidebarRow" style="position: fixed;top: 110px; ">
                  <span class="material-icons"> control_point </span>
                  <h4>Add a Story</h4>
                </div><br><br>
                <a href = "http://localhost/CircleSync/green%20pulse/green_pulse_posts/index.php">
                <div class="sidebarRow" style="position: fixed; top: 160px; ">
                  <span class="material-icons"> burst_mode </span>
                  <h4>Posts</h4>
                </div>
                </a>
                <a href = "http://localhost/CircleSync/green%20pulse/green_pulse_asks/index.php">
                <div class="sidebarRow" style="position: fixed; top: 210px;">
                  <span class="material-icons"> record_voice_over </span>
                  <h4>Ask the community</h4>
                </div>
                </a>
                <a href="http://localhost/CircleSync/green%20pulse/green_pulse_reports/index.php">
                <div class="sidebarRow" style="position: fixed; top: 270px;">
                  <span class="material-icons"> bookmark_add </span>
                  <h4>Saved</h4>
                </div></a><br><br><br>

                <div class="sidebarRow" style="position: fixed; top: 330px;">
                  <span class="material-icons"> expand_more </span>
                  <h4>More</h4>
                </div><br><br>

              </div>
              <!-- sidebar ends -->

            </div>
    <!-- main body ends -->

            <script
            async
            defer
            crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0"
            nonce="zUxEq08J"
            ></script>

            </body>
</html>
