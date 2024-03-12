<?php
include("template/front/header.php");
include("template/front/navbar.php");
include("config/database.php");
?>

<?php
// Fetch the latest popup (you can modify this query as needed)
$statement = $conn->query('SELECT * FROM popups ORDER BY id DESC LIMIT 1');
$popup = $statement->fetch(PDO::FETCH_ASSOC);

$i = 1;
$statement = $conn->prepare('SELECT * FROM about ORDER BY about_id DESC');
$statement->execute();
$about = $statement->fetchAll(PDO::FETCH_ASSOC);
$sNo  = 1;
foreach ($about as $about);

$statement = $conn->query('SELECT st.*, m.file_name as music_file FROM stories_text_music_image st INNER JOIN music m ON st.music_id = m.id ORDER BY upload_time DESC LIMIT 10');
$stories = $statement->fetchAll(PDO::FETCH_ASSOC);

// Increment views and update the database
foreach ($stories as $story) {
    $storyId = $story['id'];
    $conn->query("UPDATE stories_text_music_image SET views = views + 1 WHERE id = $storyId");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for SEO and social media -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sujan Gautam from Gorkha, Nepal. Freelancer.">
    <meta property="og:title" content="Sujan Gautam - Freelancer from Gorkha, Nepal">
    <meta property="og:description" content="Hi, I am Sujan Gautam, a freelancer from Gorkha, Nepal. Hire me for your projects.">
    <meta property="og:image" content="https://sujan1919.com.np/storage/logo/logo-file-1699237881.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sujan Gautam - Freelancer from Gorkha, Nepal">
    <meta name="twitter:description" content="Hello, I'm Sujan Gautam, a dedicated freelancer based in Gorkha, Nepal. If you're looking for professional and reliable services for your projects, I'm here to help. Let's work together to bring your ideas to life!">
    <meta name="twitter:image" content="https://sujan1919.com.np/storage/logo/logo-file-1699237881.png">
    <title>Sujan Gautam - Freelancer from Gorkha, Nepal</title>
    <link rel="stylesheet" href="assets/css/latest.css">
    <link rel="stylesheet" href="assets/css/tracker.css">
    <link rel="stylesheet" href="assets/css/story.css">
    <link rel="stylesheet" href="assets/css/ai.css">
</head>
<body>


<!-- STORIES SECTION STARTS -->
<!-- <section class="stories-section title-stories">
    <h2 class="stories-header">STORIES:</h2>
</section>
<section class="stories-section">
    <div id="stories-container" class="stories-container">
        <?php
        // Check if there are any stories
        foreach ($stories as $story) {
            $imageSrc = "storage/story/{$story['image_file_name']}";
            $bgColor = $story['bg_color'];
            $imageExists = file_exists($imageSrc) && $story['image_file_name'] !== 'default.png';
        ?>
        <div class="story" 
            data-story-id="<?php echo $story['id']; ?>" 
            data-bg-color="<?php echo $story['bg_color']; ?>" 
            data-text-color="<?php echo $story['text_color']; ?>" 
            data-music-url="storage/music/<?php echo $story['music_file']; ?>" 
            data-image-file="<?php echo $story['image_file_name']; ?>" 
            data-image-exists="<?php echo $imageExists ? 'true' : 'false'; ?>">
            <div class="outer-layer" style="background-color: transparent; color: <?php echo $story['text_color']; ?>;">
                <?php if ($imageExists) { ?>
                    <img class="story-image" src="<?php echo $imageSrc; ?>" alt="Story Image" data-src="<?php echo $imageSrc; ?>">
                <?php } ?>
                <div class="story-views">
                    <i class="fas fa-eye"></i>
                    <span class="view-count" data-story-id="<?php echo $story['id']; ?>">
                        <?php echo $story['views']; ?>
                    </span>
                </div>
                <p class="story-text"><?php echo $story['story_text']; ?></p>
            </div>
        </div>
        <?php
        } 
        ?>
    </div>
    <div id="selected-story-container">
        <div class="story-overlay">
            <div class="close-btn" id="close-btn"><i class="fas fa-times"></i></div>
            <div class="swipe-btn left" id="swipe-left"><i class="fas fa-chevron-left"></i></div>
            <p id="selected-story-text" class="textt" style="color: white;
                height: fit-content;
                min-width: 250px;
                max-width: 350px;
                min-height: fit-content;
                padding: 4px;
                border-radius: 5px;
                text-align: center;
                display: flex;
                justify-content: center;
                vertical-align: middle;
                align-items: center;
                font-size: 24px;"></p> -->

            <!-- Display views with icon in the 200x250px box -->
           
            <!-- <div class="view-count-selected">
                <i class="fas fa-eye"></i>
                <span id="selected-view-count">0</span>
            </div>
            <div class="swipe-btn right" id="swipe-right"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</section>
<script src="assets/js/story.js"></script> -->
<!-- STORIES SECTION STOPS -->


<!-- TRACKER STARTS HERE -->
    <!-- Circle at bottom right -->
    <div id="circleTracker">
        <i id="eyeIcon" class="fa-regular fa-eye-slash"></i>
        <div id="betaTextTracker">BETA</div>
    </div>

    <!-- Popup for displaying visitor information -->
    <div id="popupTracker">
        <span id="closeBtnTracker" onclick="closeTrackerPopup()">&times;</span>
        <h2>Your Information :</h2>
        <p id="popupContentTracker" class="info-containerTracker"></p>
    </div>
        <script src="assets/js/tracker.js"></script>
        <!-- TRACKER CONTENT ENDS  -->
        
         <!-- SHREE AI CONTENT STARTS  -->

<!-- SHREE AI CONTENT STARTS  -->
    
 <div class="ai-floating-btn" id="ai-floatingBtn">
    <br><br>
        <!-- <img src="ai.png" alt="Shree" id="ai-floatingMain" class="ai-floatingMain"> -->
        <!-- <img src="shree.jpg" alt="Shree" id="ai-shreeProfileImage" class="ai-profile-image"> -->
    </div>
        
    <pk class="beta_text">Click to start convo!</pk>
    <div class="ai-popup-overlay" id="ai-popupOverlay">
        <div class="ai-popup" id="ai-popup">
            <span class="ai-close-btn" id="ai-closeBtn">&times;</span>
            <div class="ai-message-container">
                <div id="ai-shreeProfile" class="ai-profile">
                    <img src="assets/img/ai/shree.jpg" alt="Shree" id="ai-popupProfileImage" class="ai-profile-image">
                </div>
                <h2>shree</h2>
            </div>
            <div class="ai-infobox">
                <p id="ai-infoBox">
                    <img src="assets/img/ai/shree.jpg" alt="" class="ai-infoBoxImage">
                    start with hii,hello or hey shree !!!
                </p>
            </div>
            <button id="ai-startButton">Start Conversation</button>
            <p id="ai-response"></p>
            <p id="ai-answered" style="display: none;font-family:monospace;font-size:18px; color: green; text-align: center;">Answered.</p>
            <button id="ai-newQuestionButton" style="display: none;">➕ Ask New Question</button>
            <button id="ai-dismissButton" style="display: none;">❌ End Conversation</button>
        </div>
    </div>
    <style>
        body.not-authorized {
            display: none;
        }
        .ai-floating-btn {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.ai-floating-btn p .beta_text{
  margin-top: 10px; /* Adjust the top margin to create space between the button and the text */
}
pk{
    color: white;
    font-size:14px;
  position: fixed;
  background-color:black;
  border: 1px solid white;
  cursor:pointer;
  padding: 10px 15px;
  border-radius:25px;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
}

    </style>
<!--<script>-->
    <!-- // Prompt the user for the access code -->
<!--    var accessCode = prompt("Enter the access code:");-->

    <!-- // Check if the access code is correct -->
<!--    if (accessCode === "Sujan1919") {-->
        <!-- // The access code is correct, show the content -->
<!--        document.body.classList.remove("not-authorized");-->
<!--    } else {-->
        <!-- // The access code is incorrect, show an error message and hide the content -->
<!--        alert("Access denied! Incorrect access code.");-->
<!--        document.body.classList.add("not-authorized");-->
<!--    }-->
<!--</script>-->

    <script src="assets/js/shreeAI.js"></script>
    <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
    <script src="https://cdn.rawgit.com/zhuker/lamejs/9df36d04/lame.all.js"></script>
    <!-- SHREE AI CONTENT ENDS  -->
    <?php include("template/front/navbar.php"); ?>

  
</body>

</html>