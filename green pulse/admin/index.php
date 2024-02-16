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

            $.ajax({
                url: "http://localhost:8000/api/index/admin",
                type: "GET",
                headers: {

                },
                success: function(data) {
                    var source = $("#posts-template").html();
                    var template = Handlebars.compile(source);
                    var html = template({ posts: data["data of posts"] });
                    $("#posts-container").html(html);

                },
                error: function() {
                    alert("Error API");
                    window.location.href = 'main.php';
                }
            });


        });
        </script>

<script>
     function handleKeyPress(event) {

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

      <!-- sidebar ends -->

      <!-- feed starts -->
      <div class="sidebarRow" style="position: fixed; top: 160px; ">

      <h4 style="font-size: 100px;">Posts</h4>
      <!-- feed ends -->


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




  </body>
</html>
