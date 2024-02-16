<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <!-- Add our styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link rel='stylesheet' href='boot.css'>
    <link rel="stylesheet" href="prof.css" />
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
                url: "http://localhost:8000/api/index/user",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {
                    var source = $("#posts-template").html();
                    var template = Handlebars.compile(source);
                    var html = template({ posts: data["data of posts"] });
                    $("#posts-container").html(html);




                    var userSource = $("#user-login-template").html(); // استخدام الهوية الجديدة
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({ user: data["user login"] });

                    $("#user-login-container").html(userHtml);

                            var userprofile = $("#user-profile-template").html();
                            var userTemplateprofile = Handlebars.compile(userprofile);
                            var userHtmlprofile = userTemplateprofile({ user: data["user login"] });

                            $("#user-profile-container").html(userHtmlprofile);

                            var userdetails = $("#user-details-template").html();
                            var userTemplatedetails = Handlebars.compile(userdetails);
                            var userHtmldetails= userTemplatedetails({ user: data["user login"] });

                            $("#user-details-container").html(userHtmldetails);
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
            console.log(token);
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
            console.log(token);
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
                        // هنا يمكنك التعامل مع الاستجابة بشكل مناسب (على سبيل المثال، إظهار رسالة نجاح)
                        $("#successMessage").text("shared successful!");
                        reloadSecondFunction();
                    },
                    error: function (error) {
                        console.error("shared error:", error);
                        // هنا يمكنك التعامل مع الخطأ بشكل مناسب (على سبيل المثال، إظهار رسالة خطأ)
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

                            var userSource = $("#user-login-template").html();
                            var userTemplate = Handlebars.compile(userSource);
                            var userHtml = userTemplate({ user: data["user login"] });


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
            console.log(token);
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
            console.log(token);

                // احصل على الـ post ID من السمة data
                const postId = upDiv.dataset.postId;

                // قم بإرسال الـ post ID إلى الـ API
                fetch(`http://localhost:8000/api/posts/ups/${postId}`, {
                    method: 'POST',
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

                    // قم بتحديث العداد في واجهة المستخدم إذا كان ذلك ضروريًا
                    const upCounter = upDiv.querySelector('.post__bottom p');
                    if (upCounter) {
                        upCounter.innerText = `${data.ups} Like`;
                    }
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
              <span class="material-icons"> add </span>
              <span class="material-icons"> forum </span>
              <span class="material-icons"> notifications_active </span>
              <a href = "http://localhost/CircleSync/green%20pulse/main.php">
              <span class="material-icons"> logout </span>
              </a>
              </div>
            </div>
          </div>
          <!-- header ends -->


        <div class="container" >

            <div class="row">
                <div class="col-md-12">
                    <div class="top-breadcrumb" style="margin-top: 10px;">
                        <nav aria-label="breadcrumb">
                        </nav>
                    </div>
                </div>
            </div>


            <div class="card social-prof">

            <div id="user-profile-container"></div>
                <script id="user-profile-template" type="text/x-handlebars-template">
                <div class="card-body">

                {{#each user}}
                    <div class="wrapper" style="margin-top: 20px;">
                        <img src="http://localhost/CircleSync/storage/app/{{image}}" alt="" class="user-profile">
                        <h3>{{ name }}</h3>
                        <p>{{ career }}</p>
                    </div>
                    {{/each}}
                    <div class="row ">
                        <div class="col-lg-12">
                            <ul class=" nav nav-tabs justify-content-center s-nav">
                                <li><a class="active" href="#">Timeline</a></li>
                                <li><a href="http://localhost/CircleSync/green%20pulse/green_pulse_friends/friends.php">Friends</a></li>
                                <li><a href="http://localhost/CircleSync/green%20pulse/green_pulse_friends/connections.php">Connections</a></li>

                            </ul>
                        </div>
                    </div>


                </div>
                </script>
            </div>



            <div class="row">

                <div class="col-lg-3">
                <div id="user-details-container"></div>
                <script id="user-details-template" type="text/x-handlebars-template">
                    <div class="card">
                    {{#each user}}
                        <div class="card-body">
                            <div class="h5 text-blue">@{{ name }}</div>
                            <div class="h7 "><strong>Name :</strong> {{ name }}</div>
                            <div class="h7"><strong>About :</strong> {{ about }}
                            </div>
                            <div class="h7 "><strong>Date of Birth :</strong> {{ birthdate }}</div>
                            <div class="h7 "><strong>Country :</strong> {{ country }}</div>
                            <div class="h7 "><strong>Interests :</strong> {{ intersts }}</div>
                        </div>
                        {{/each}}

                        <!--
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="h6 text-muted">Followers</div>
                                <div class="h5">5.2342</div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted">Following</div>
                                <div class="h5">6758</div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted">Themes</div>
                                <div class="h5">6758</div>
                            </li>
                        </ul>
                        -->
                    </div>
                    </script>
                </div>


                <div class="col-lg-6 gedf-main">
                    <!-- post starts -->
                    <div class= "posts-container" id="posts-container"></div>
                            <script id="posts-template" type="text/x-handlebars-template">
                                {{#each posts}}
                            <div class="post">
                            <div class="post__top">
                            <span class="user__avatar post__avatar" style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden; display: inline-block;">
                                <img src="http://localhost/CircleSync/storage/app/{{user.image}}" alt="User Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                            </span>
                                <div class="post__topInfo">
                                <h3 style="color: black; font-size: large;">{{user.name}}</h3>
                                <p>{{created_at}}</p>
                                </div>
                            </div>

                            <div class="post__bottom">
                                <p>{{ description }}</p>
                            </div>

                            <div class="post__image">
                                <img
                                src="http://localhost/CircleSync/storage/app/{{image}}"
                                alt=""

                                />
                            </div>
                            <div class="post__options">
                            <div class="post__option" data-post-id="{{id}}" onclick="upVote(this)">
                                <span class="material-icons">favorite_border</span>
                                <div class="post__bottom">
                                    <p>{{ups}} Like</p>
                                </div>
                                </div>

                                <div class="post__option">
                                <span class="material-icons" onclick="showCommentBox(this)"> chat_bubble_outline </span>
                                <div class="post__bottom">
                                    <p>Comment</p>
                                    </div>
                                </div>
                            </div>
                                <!-- Container for comments -->
                                <div class="comments-container"></div>
                            </div>
                            {{/each}}
                            </script>
                            <!-- post ends -->
                        </div>
                                                  <!-- Facebook widget -->
                 <div style="flex: 0.33;margin-top:-75%; margin-right: 15px; margin-left:100%;" class="widgets">
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
              <script>
        function showCommentBox(icon) {
      // Get the parent post element
      var post = icon.closest('.post');

      // Get the comments container within the post
      var commentsContainer = post.querySelector('.comments-container');

      // Check if the comments container is already present
      if (commentsContainer) {
        // If present, remove the comments container
        commentsContainer.parentNode.removeChild(commentsContainer);
      } else {
        // Create comments container
        var newCommentsContainer = document.createElement('div');
        newCommentsContainer.className = 'comments-container';

        // Create textarea element
        var textarea = document.createElement('textarea');
        textarea.placeholder = 'Write a comment';

        // Create button element
        var button = document.createElement('button');
        button.textContent = 'comment';
        button.onclick = function () {
          // Handle posting comment (you can customize this part)
          var commentText = textarea.value;
          alert('Comment posted: ' + commentText);

          // Remove the comments container after posting comment
          newCommentsContainer.parentNode.removeChild(newCommentsContainer);
        };

        // Append the textarea and button to the comments container
        newCommentsContainer.appendChild(textarea);
        newCommentsContainer.appendChild(button);

        // Append the new comments container to the post
        post.appendChild(newCommentsContainer);

        // Focus on the newly created textarea
        textarea.focus();
      }
    }

    </script>
            </body>
</html>
