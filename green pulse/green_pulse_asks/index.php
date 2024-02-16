<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GreenPulse</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
    <script>

        $(document).ready(function() {
            const token = sessionStorage.getItem('localStorageToken');
            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'http://localhost/GreenInnoSphere/green%20pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }
            $.ajax({
                url: "http://localhost:8000/api/options",
                type: "GET",
                success: function(data) {
                    // console.log("Data from API:", data);

                    var careerOptionsSource = $("#career-template").html();
                    var careerOptionsTemplate = Handlebars.compile(careerOptionsSource);
                    var careerOptionsHtml = careerOptionsTemplate({ career: data["career"] });
                    $("#user-options-container").html(careerOptionsHtml);

                    var interstsOptionsSource = $("#intersts-template").html();
                    var interstsOptionsTemplate = Handlebars.compile(interstsOptionsSource);
                    var interstsOptionsHtml = interstsOptionsTemplate({ interst: data["intersts"] });
                    $("#career-options-container").html(interstsOptionsHtml);

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
                url: "http://localhost:8000/api/index/asks",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(data) {

                    var careerAsksSource = $("#asks-template").html();
                    var careerAsksTemplate = Handlebars.compile(careerAsksSource);
                    var careerAsksHtml = careerAsksTemplate({ asks: data["data of asks in your career"] });
                    $("#posts-container").html(careerAsksHtml);

                    var careerAsksSource = $("#other-asks-template").html();
                    var careerAsksTemplate = Handlebars.compile(careerAsksSource);
                    var careerAsksHtml = careerAsksTemplate({ otherAsks: data["data of asks in others career"] });
                    $("#other-posts-container").html(careerAsksHtml);

                    console.log(data);
                    var userSource = $("#user-login-template").html();
                    var userTemplate = Handlebars.compile(userSource);
                    var userHtml = userTemplate({login: data['User'] });
                    console.log(userHtml);
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
                    console.log("Data from API:", data);
                    var storyOptionsSource = $("#story-template").html();
                    var storyOptionsTemplate = Handlebars.compile(storyOptionsSource);
                    var storyOptionsHtml = storyOptionsTemplate({ story: data["data of stories"] });
                    $("#user-story-container").html(storyOptionsHtml);


                },
                error: function() {
                    alert("Error API");
                }
            });
        });
    </script>

<script>$(document).ready(function() {
            $("#postButton").click(function() {

                const token = sessionStorage.getItem('localStorageToken');
            if (!token) {
                // Redirect to the login page if no token is found
                window.location.href = 'green pulse/main.php'; // Replace 'login.html' with the actual login page URL
                return;
            }
                console.log("ss");

                var formData = {
                "description": $('#postInput').val(),
                "image": $("#fileInput").val(),
                "who_will_answer": $("#careerInput").val(),
                };
                var formDataJSON = JSON.stringify(formData);
                console.log( $("#careerInput").val());

                $.ajax({
                    url: "http://localhost:8000/api/ask", // استبدل هذا بعنوان نقطة نهاية التسجيل الفعلية
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
                        reloadSecondFunction();
                    },
                    error: function (error) {
                        console.error("shared error:", error);
                        console.log("Error details:", error.responseJSON);
                        // هنا يمكنك التعامل مع الخطأ بشكل مناسب (على سبيل المثال، إظهار رسالة خطأ)
                    }
                });
            });
            function reloadSecondFunction() {
                const token = sessionStorage.getItem('localStorageToken');
                                        //   Load the second function again
                    $.ajax({
                        url: "http://localhost:8000/api/index/asks",
                        type: "GET",
                        headers: {
                            "Authorization": "Bearer " + token
                        },
                        success: function (data) {
                            var careerAsksSource = $("#asks-template").html();
                            var careerAsksTemplate = Handlebars.compile(careerAsksSource);
                            var careerAsksHtml = careerAsksTemplate({ asks: data["data of asks in your career"] });
                            $("#posts-container").html(careerAsksHtml);

                            var careerAsksSource = $("#other-asks-template").html();
                            var careerAsksTemplate = Handlebars.compile(careerAsksSource);
                            var careerAsksHtml = careerAsksTemplate({ otherAsks: data["data of asks in others career"] });
                            $("#other-posts-container").html(careerAsksHtml);
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
                    url: "http://localhost:8000/api/asks/search", // استبدل هذا بعنوان نقطة نهاية التسجيل الفعلية
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
                        var careerAsksSource = $("#asks-template").html();
                            var careerAsksTemplate = Handlebars.compile(careerAsksSource);
                            var careerAsksHtml = careerAsksTemplate({ asks: response["data of asks in your career"] });
                            $("#posts-container").html(careerAsksHtml);
                    },
                    error: function (error) {
                        console.error("Search error:", error);
                        console.log("Error details:", error.responseJSON);

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
                fetch(`http://localhost:8000/api/asks/ups/${postId}`, {
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
                        upCounter.innerText = `${data.ups} Up`;
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
            {{#each this}}
                <div class="header__info">
                <span class="user__avatar post__avatar" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; display: inline-block;">
              <img src="http://localhost/GreenInnoSphere/storage/app/{{image}}" alt="User Avatar" style="width: 100%; height: 100%; object-fit: cover;">
           </span>
                    <h4>{{name}}</h4>
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
        </div> </a>
        <a href="http://localhost/GreenInnoSphere/green%20pulse/green_pulse_asks/index.php">
        <div class="sidebarRow" style="position: fixed; top: 210px;">
          <span style="color:#bab99c;"class="material-icons" > record_voice_over </span>
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
        </div></a> <br><br><br>
        <a href="http://localhost/GreenInnoSphere/green%20pulse/Simulation/Simulation1.php">
        <div class="sidebarRow" style="position: fixed; top: 390px;">
          <span style="color: #bab99c;"class="material-icons"> laptop_windows </span>
          <h4>Simulation Map</h4>
        </div></a><br><br><br>
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

      <!-- feed starts -->
      <div class="feed">
        <div class="storyReel">
        <!-- story starts -->
          <div id="user-story-container" style="display: flex; flex-direction: row;"></div>
          <script id="story-template" type="text/x-handlebars-template" >
          {{#each story}}
            <div style="background-image: url('http://localhost/GreenInnoSphere/storage/app/{{image}}');"class="story">
              <img
                class="user__avatar story__avatar"
                style="background-image: url('http://localhost/GreenInnoSphere/storage/app/{{user.image}}');" alt=""/>
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
            <div class="messageSender__option">
                <span style="color: red" class="material-icons"> videocam </span>
              <div class="input_post">
                <h3>Live</h3>
              </div>
            </div>

            <div class="messageSender__option">
              <label for="fileInput">
                <span style="color: rgb(32, 90, 167);" class="material-icons"> photo_library </span>
              </label>
              <input type="file" id="fileInput" style="display: none" accept="/*">
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
            <h2>Inquiry Info</h2>
            <div class="questionconfirm">
              <p>Choose the career and field you want to ask in.</p>
            </div>
            <div class="questionAnswersButtons">

            <div id="user-options-container"></div>
            <script id="career-template" type="text/x-handlebars-template">

            <div class="input_box">
            <i class="uil uil-award-alt"></i>
            <select class = "careerStyle" id="careerInput" required>
              <option value="" disabled selected>Career related to your inquiry</option>
              {{#each career}}
              <option class = "careerStyle" value="{{this}}" >{{this}}</option>
              {{/each}}

            </select>

            </div>

            </script>
            <script>
                function openConfirmationModal() {
                    document.getElementById("confirmationModal").style.display = "block";
                }

                function closeConfirmationModal() {
                    document.getElementById("confirmationModal").style.display = "none";
                }

                function postInquiry() {
                    // Get the selected career and interests
                    var selectedCareer = document.getElementById("careerInput").value;
                    var selectedInterests = document.getElementById("interstsInput").value;

                    // Check if both career and interests are selected
                    if (selectedCareer && selectedInterests) {
                        // Perform the post action here (you can customize this part)
                        alert(`Posting with Career: ${selectedCareer} and Interests: ${selectedInterests}`);
                        // Close the modal after posting
                        closeConfirmationModal();
                    } else {
                        alert("Please select both Career and Interests before posting.");
                    }
                }

                // Attach click event listener to close button
                document.getElementById("closeConfirmationModal").addEventListener("click", closeConfirmationModal);



            </script>
                        <!-- Interests -->
            <div  id="career-options-container"></div>
            <script id="intersts-template" type="text/x-handlebars-template">
            <div class="input_box">
            <i class="uil uil-award-alt"></i>

            <select class = "interestStyle" id="interstsInput" required>
              <option value="" disabled selected >Interests related your inquiry</option>
              {{#each interst}}
              <option class = "interestStyle" id="interestInput" value="{{this}}">{{this}}</option>
              {{/each}}

            </select>

            </div>
            </script>
            <button class = "inquiryButton" id="postButton" onclick="closeConfirmationModal()">Post</button>
            </div>
          </div>
        </div>

         <!-- Add the post button with the emoticon icon-->
            <div class="messageSender__option">
               <span style="color: green" class="material-icons"> done_all </span>
                 <button class="postButton"  onclick="openConfirmationModal()"><h3>Post</h3></button>
               </div>
          </div>
        </div>
        <!-- End of Confirmation pop up -->
        <!-- message sender ends -->

        <!-- post starts -->
        <div class= "posts-container" id="posts-container"></div>
        <script id="asks-template" type="text/x-handlebars-template">
            {{#each asks}}
        <div class="post">
          <div class="post__top">
          <span class="user__avatar post__avatar" style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden; display: inline-block;">
              <img src="http://localhost/GreenInnoSphere/storage/app/{{user.image}}" alt="User Avatar" style="width: 100%; height: 100%; object-fit: cover;">
           </span>
            <div class="post__topInfo">
              <h3 style="color: black; font-size: large;">{{user.name}}</h3>
              <h3 style="color: black; font-size: small;">{{who_will_answer}}</h3>
              <p>{{created_at}}</p>
            </div>
          </div>

          <div class="post__bottom">
            <p>{{description}}</p>
          </div>

          <div class="post__image">
            <img
              src="http://localhost/GreenInnoSphere/storage/app/{{image}}"
              alt=""

            />
          </div>

          <div class="post__options">
           <div class="post__option" data-post-id="{{id}}" onclick="upVote(this)">
            <span class="material-icons">keyboard_capslock</span>
            <div class="post__bottom">
                <p>{{ups}} Up</p>
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

        <!-- post starts -->
        <div class= "other-posts-container" id="other-posts-container" style="width: 100%; margin-right: 120px;"></div>
        <script id="other-asks-template" type="text/x-handlebars-template">
            {{#each otherAsks}}
        <div class="post">
          <div class="post__top">
          <span class="user__avatar post__avatar" style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden; display: inline-block;">
              <img src="http://localhost/GreenInnoSphere/storage/app/{{user.image}}" alt="User Avatar" style="width: 100%; height: 100%; object-fit: cover;">
           </span>
            <div class="post__topInfo">
              <h3 style="color: black; font-size: large;">{{user.name}}</h3>
              <h3 style="color: black; font-size: small;">{{who_will_answer}}</h3>
              <p>{{created_at}}</p>
            </div>
          </div>

          <div class="post__bottom">
            <p>{{description}}</p>
          </div>

          <div class="post__image">
            <img
              src="http://localhost/GreenInnoSphere/storage/app/{{image}}"
              alt=""

            />
          </div>

          <div class="post__options">
          <div class="post__option" data-post-id="{{id}}" onclick="upVote(this)">
            <span class="material-icons">keyboard_capslock</span>
            <div class="post__bottom">
                <p>{{ups}} Up</p>
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
      <!-- feed ends -->

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
        button.textContent = 'Post Comment';
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
