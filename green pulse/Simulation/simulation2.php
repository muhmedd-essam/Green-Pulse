<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulation2</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
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
      <a href = "#"><span style="color:#bab99c;" class="material-icons"> record_voice_over </span></a>
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
  <div class="set1 ">

    <div class="gallery" onclick="openLightbox(event)">
        <img src="img/ARE__0__Dubai__Burj_Khalifa__L13__header__labels__percent50__left1p5C__right3C.jpg"
            alt="Image 1">
        <img src="img/MAR__0__Casablanca__Hassan_II_Mosque__L13__header__labels__percent50__left1p5C__right3C.jpg"
            alt="Image 2">
        <img src="img/EGY__0__Alexandria__Abu_al_Abbas_al_Mursi_Mosque__L13__header__labels__percent50__left1p5C__right3C.jpg"
            alt="Image 3">
        <img src="img/PER__0__Lima__Fortaleza_del_Real_Felipe__L13__header__labels__percent50__left1p5C__right3C.jpg"
            alt="Image 4">
    </div>

    <!-- Lightbox container -->
    <div id="lightbox">
        <!-- Close button -->
        <span id="close-btn" onclick="closeLightbox()">&times;</span>

        <!-- Main lightbox image -->
        <img id="lightbox-img" src="" alt="lightbox image">

        <!-- Thumbnails container -->
        <div id="thumbnail-container">
            <!-- Thumbnails will be added dynamically using JavaScript -->
        </div>

        <!-- Previous and Next buttons -->
        <button id="prev-btn" onclick="changeImage(-1)">&lt; Prev</button>
        <button id="next-btn" onclick="changeImage(1)">Next &gt;</button>
    </div>
  </div>
  <div class="set2 ">
    <div class="gallery" onclick="openLightbox(event)">
      <img src="img/CAN__0__Victoria__Legislative_Assembly_of_British_Columbia__L13__header__labels__percent50__left1p5C__right3C.jpg"
          alt="Image 1">
      <img src="img/IND__0__Mumbai__Chhatrapati_Shivaji_Maharaj_Vastu_Sangrahalaya__L13__header__labels__percent60__left1p5C__right3C.jpg"
          alt="Image 2">
      <img src="img/BGD__0__Dhaka__Lalbagh_Fort__L13__header__labels__percent50__left1p5C__right3C.jpg"
          alt="Image 3">
      <img src="img/CUB__0__Havana__Plaza_de_la_Catedral__L13__header__labels__percent50__left1p5C__right3C.jpg"
          alt="Image 4">
  </div>

  <!-- Lightbox container -->
  <div id="lightbox">
      <!-- Close button -->
      <span id="close-btn" onclick="closeLightbox()">&times;</span>

      <!-- Main lightbox image -->
      <img id="lightbox-img" src="" alt="lightbox image">

      <!-- Thumbnails container -->
      <div id="thumbnail-container">
          <!-- Thumbnails will be added dynamically using JavaScript -->
      </div>

      <!-- Previous and Next buttons -->
      <button id="prev-btn" onclick="changeImage(-1)">&lt; Prev</button>
      <button id="next-btn" onclick="changeImage(1)">Next &gt;</button>
  </div>
  </div>
  <div class="set3 ">
    <div class="gallery" onclick="openLightbox(event)">
      <img src="img/AUS__0__Adelaide__Adelaide_Airport__L13__header__labels__percent50__left1p5C__right3C.jpg"
          alt="Image 1">
      <img src="img/JPN__0__Sapporo__Moerenuma_Park__L13__header__labels__percent50__left1p5C__right3C.jpg"
          alt="Image 2">
      <img src="img/USA__TX__Beaumont__Art_Museum_of_Southeast_Texas__L13__header__labels__percent50__left1p5C__right3C.jpg"
          alt="Image 3">
      <img src="img/ARG__0__La_Plata__Tolosa__L13__header__labels__percent50__left1p5C__right3C.jpg"
          alt="Image 4">
  </div>

  <!-- Lightbox container -->
  <div id="lightbox">
      <!-- Close button -->
      <span id="close-btn" onclick="closeLightbox()">&times;</span>

      <!-- Main lightbox image -->
      <img id="lightbox-img" src="" alt="lightbox image">

      <!-- Thumbnails container -->
      <div id="thumbnail-container">
          <!-- Thumbnails will be added dynamically using JavaScript -->
      </div>

      <!-- Previous and Next buttons -->
      <button id="prev-btn" onclick="changeImage(-1)">&lt; Prev</button>
      <button id="next-btn" onclick="changeImage(1)">Next &gt;</button>
  </div>
</div>
    <script>
let currentIndex = 0;
        const images = document.querySelectorAll('.gallery img');
        const totalImages = images.length;

        // Open the lightbox
        function openLightbox(event) {
            if (event.target.tagName === 'IMG') {
                const clickedIndex = Array.from(images).indexOf(event.target);
                currentIndex = clickedIndex;
                updateLightboxImage();
                document.getElementById('lightbox').style.display = 'flex';
            }
        }

        // Close the lightbox
        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }

        // Change the lightbox image based on direction (1 for next, -1 for prev)
        function changeImage(direction) {
            currentIndex += direction;
            if (currentIndex >= totalImages) {
                currentIndex = 0;
            } else if (currentIndex < 0) {
                currentIndex = totalImages - 1;
            }
            updateLightboxImage();
        }

        // Update the lightbox image and thumbnails
        function updateLightboxImage() {
            const lightboxImg = document.getElementById('lightbox-img');
            const thumbnailContainer = document.getElementById('thumbnail-container');

            // Update the main lightbox image
            lightboxImg.src = images[currentIndex].src;

            // Clear existing thumbnails
            thumbnailContainer.innerHTML = '';

            // Add new thumbnails
            images.forEach((image, index) => {
                const thumbnail = document.createElement('img');
                thumbnail.src = image.src;
                thumbnail.alt = `Thumbnail ${index + 1}`;
                thumbnail.classList.add('thumbnail');
                thumbnail.addEventListener('click', () => updateMainImage(index));
                thumbnailContainer.appendChild(thumbnail);
            });

            // Highlight the current thumbnail
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails[currentIndex].classList.add('active-thumbnail');
        }

        // Update the main lightbox image when a thumbnail is clicked
        function updateMainImage(index) {
            currentIndex = index;
            updateLightboxImage();
        }

        // Add initial thumbnails
        updateLightboxImage();


        // To add keyboard navigation (left/right arrow keys)
        document.addEventListener('keydown', function (e) {
            if (document.getElementById('lightbox').style.display === 'flex') {
                if (e.key === 'ArrowLeft') {
                    changeImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeImage(1);
                }
            }
        });
    </script>

          <!-- Facebook Widget Container -->
          <div style="flex: 0.33;margin-top: 30px; margin-left: 10px; ">
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
