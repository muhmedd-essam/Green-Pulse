<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CircleSync</title>
    <link rel="stylesheet" href="style.css" />
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
                    var source = $("#posts-template").html();
                    var template = Handlebars.compile(source);
                    var html = template({ posts: data["data of posts"] });
                    $("#posts-container").html(html);




                    var userSource = $("#user-login-template").html(); // استخدام الهوية الجديدة
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({ user: data["user login"] });

                    $("#user-login-container").html(userHtml);
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

                            $("#user-login-container").html(userHtml);
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
          src="img/Icon_svg.svg" alt=""
        />
        <div class="header__input">
          <span class="material-icons" style="color:white;"> search </span>
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

    <!-- main body starts -->
    <div class="main__body">
      <!-- sidebar starts -->
      <div class="sidebar" >


        <div class="sidebarRow" style="position: fixed; ">
          <span class="material-icons"> control_point </span>
          <h4>Add a Story</h4>
        </div><br><br>

        <div class="sidebarRow" style="position: fixed; top: 160px; ">
          <span class="material-icons"> burst_mode </span>
          <h4>Posts</h4>
        </div>
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

      <!-- feed starts -->
      <div class="feed">
        <div class="storyReel">
        <!-- story starts -->
          <div id="user-story-container" style="display: flex; flex-direction: row;"></div>
          <script id="story-template" type="text/x-handlebars-template" >
          {{#each user}}

            <div
              style="
                background-image: url('http://localhost/CircleSync/storage/app/{{image}}');
              "
              class="story"
            >
              <img
                class="user__avatar story__avatar"
                style="
                background-image: url('http://localhost/CircleSync/storage/app/{{user.image}}');
              "
                alt=""
              />
              <h4>{{user.name}}</h4>
            </div>

            {{/each}}
          </script>
            <!-- story ends -->
          </div>

        <!-- message sender starts -->
        <div class="messageSender">
          <div class="messageSender__top">
            <img
              class="user__avatar"
              src=""
              alt=""
            />
            <form>
              <input class="messageSender__input" id="postInput" placeholder="What's on your mind?" type="text" />
            </form>
          </div>

          <div class="messageSender__bottom">
            <div class="messageSender__option" >
                <span style="color: red" class="material-icons" > videocam </span>
              <div class="input_post">
                <h3>Live</h3>
              </div>
            </div>

            <div class="messageSender__option">
              <label for="fileInput">
                <span style="color: rgb(32, 90, 167);" class="material-icons"> photo_library </span>
              </label>
              <input type="file" id="fileInput" style="display: none" accept="image/*">
                <div class="input_post">
                <h3>Photo</h3>
              </div>
            </div>

            <div class="messageSender__option">
              <span style="color: orange" class="material-icons"> insert_emoticon </span>
              <div class="input_post">
                <h3>Feeling</h3>
              </div>
            </div>
        <!-- Start of Confirmation pop up -->
        <!-- Add the modal-->
        <div id="confirmationModal" class="form_container">
          <i id="closeConfirmationModal" class="uil uil-times form_close"></i>
          <div class="form confirmation_form">
            <h2>Post or Idea?</h2>
            <div class="questionconfirm">
              <p>What do you want to share?</p>
            </div>
            <div class="questionAnswersButtons">
              <button id="choosePostButton" class="button" onclick="chooseType('post')" value="post">Post</button>
              <button id="chooseIdeaButton" class="button" onclick="chooseType('idea')" value="idea">Idea</button>
            </div>
          </div>
        </div>

         <!-- Add the post button with the emoticon icon-->
            <div class="messageSender__option">
               <span style="color: green" class="material-icons"> done_all </span>
                 <button class="postButton" onclick="openConfirmationModal()"><h3>Post</h3></button>
               </div>
          </div>
        </div>
        <!-- End of Confirmation pop up -->
        <!-- message sender ends -->
    <div class= "PostCont">
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
    </div>
      <!-- feed ends -->

      <div style="flex: 0.33;margin-top: 22px; margin-right: 15px" class="widgets">
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
        button.textContent = 'Comment';
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
    <script>
      function openConfirmationModal() {
        document.getElementById("confirmationModal").style.display = "block";
      }

      function closeConfirmationModal() {
        document.getElementById("confirmationModal").style.display = "none";
      }

      function chooseType(type) {
        // Handle the user's choice (type can be 'post' or 'idea')
        if (type === 'post' || type === 'idea') {
          // Handle the confirmation, e.g., proceed with the post or idea
          alert(type.charAt(0).toUpperCase() + type.slice(1) + " shared successfully!");
          // Close the modal
          closeConfirmationModal();
        }
      }

      // Attach click event listener to close button
      document.getElementById("closeConfirmationModal").addEventListener("click", closeConfirmationModal);
    </script>



  </body>
</html>
