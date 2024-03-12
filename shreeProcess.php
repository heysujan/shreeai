<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transcript = isset($_POST['transcript']) ? strtolower($_POST['transcript']) : '';

    $responses = [
        'hey' => 'Hello! How can I help you today?',
        'hello' => 'Start with hey shiri, hehehe!',
        'hi' => 'Start with hey shiri, hehehe!',
        'how are you' => 'I\'m doing well, thank you!',
        'your name' => 'I\'m an "assistant model Shree."',
        'help me' => 'I can tell the cost and details of websites and services that our team manages.',
        'weather' => 'I\'m sorry, I don\'t have the ability to check the weather at the moment.',
        'from where' => 'I am from the virtual world, but my real counterpart, by whom I was named, is in Canada.',
        'who are you' => 'I am shree, your virtual assistant.',
        'where are you' => 'I am from the virtual world, but my real counterpart, by whom I was named, is in Canada.',
        'where studying' => 'That\'s interesting! I hope you enjoy studying in Canada.',
        'where is sujan' => 'Suujan is currently busy. But the reason behind that is confidential',
        'to create news portal'=> 'Newsportal website designing time might take 24-48 hours, depending on your design.',
        'where is shreya' => 'Sorry, i am not allowed to say that.',
        'where is swostika' => 'Sorry, i am not allowed to say that.',
        'better than baard'=> 'No, i am still under training. But as per my data my Pro model can be the competitor of them.',
        'better than siri'=> 'No, i am still under training. But as per my data my Pro model can be the competitor of them.',
        'team' => 'There are 4 members in our team: Sujit, Sujan, Swostika, and myself.',
        'dismiss' => 'Conversation dismissed.',
        'news portal'=> 'Newsportal website cost starts from Rs.7800. For demo visit : sandarva.info, kavya ghar nepal.com or sawal post.com Or contact to Sujit From contact section of Navbar.',
        'under training'=> 'Yes, i am still under training.',
        'who made you'=> 'Sujit coded me as a beta and he is planning to create a pro one.',
        'who created you'=> 'Sujit coded me as a beta and he is planning to create a pro one.',
        'who is sujan'=> 'He is the first member of our team who used to manage all web releted works. He assigned the work to Sujit currently',
        'who is sujit'=> 'Sujit is the technical director of our team. He manages the web releted works currently, in behalf of Suujan.',
        'cost of website'=> 'Starting cost of website is Rs 7800, and increases accordingly.',
        'newsportal'=> 'Newsportal website cost starts from Rs.7800. For demo visit : sandarva.info, kavyagharnepal.com or sawalpost.com',
        'bye'=> 'Take care, byee.',
        'contact'=> 'Please contact Sujit Lamsal, from the link of popup.',
        // MODEL 2.0 QNS ANS 
        'you have boyfriend' => 'Hehehe, I am single.',
        'a story' => 'Tickle Town, where giggles grew on trees. Mayor Guffaw challenged a mischievous cloud named Chuckles. Joke-off ensued, town joined the mirth. Chuck and Guffaw, a laughter duo, making Tickle Town the sweetest spot in the land.',
        'where to eat' => 'There s a good place around the corner.',
        'how to cook pasta' => 'Boil water, add pasta, cook, and enjoy!',
        'best movies' => 'Classics like "The Godfather" are a good start.',
        'why sky is blue' => 'Because of how sunlight scatters in the atmosphere.',
        'fix slow computer' => 'Clear out unnecessary files and programs.',
        'dog care tips' => 'Regular walks and a balanced diet are essential.',
        'book recommendations' => 'Try "The Alchemist" by Paulo Coelho.',
        'learn to code' => 'Start with basic languages like Python.',
        'healthy breakfast ideas' => 'Oatmeal with fruits is a great choice.',
        'easy workout at home' => 'Bodyweight exercises like squats and push-ups work well.',
        'funny cat videos' => 'YouTube has endless hilarious cat content.',
        'quick dessert recipes' => 'Try making a simple chocolate mug cake.',
        'interesting science facts' => 'Did you know honey never spoils?',
        'best travel destinations' => 'Explore places like Bali or Santorini.',
        'new music releases' => 'Check out the latest hits on music streaming apps.',
        'mindfulness techniques' => 'Practice deep breathing for relaxation.',
        'learn a new language' => 'Duolingo is a great language learning app.',
        'improve sleep quality' => 'Create a calm bedtime routine for better sleep.',
        'houseplant care tips' => 'Water your plants regularly, but dont overdo it.',
        'budget travel tips' => 'Opt for local transport and street food.',
        'best photography tips' => 'Focus on lighting and composition in your shots.',
        'easy DIY crafts' => 'Try making paper origami or simple jewelry.',
        'how to stop procrastinating' => 'Break tasks into smaller, manageable steps.',
        'motivational quotes' => '“You miss 100% of the shots you don’t take.”',
        'benefits of meditation' => 'Reduces stress and promotes mental clarity.',
        'mind-blowing facts' => 'Bananas are berries, but strawberries aren’t.',
        'why exercise important' => 'Boosts mood and maintains overall health.',
        'learn to play guitar' => 'Start with basic chords and strumming patterns.',
        'easy dinner recipes' => 'Grilled chicken with veggies is simple and tasty.',
        'how to start a blog' => 'Pick a niche and use platforms like WordPress.',
        'interesting historical facts' => 'Ancient Egyptians used to worship cats.',
        'why is ocean salty' => 'Due to dissolved minerals from the Earth’s crust.',
        'how to make friends' => 'Be open, smile, and engage in conversations.',
        'benefits of reading' => 'Enhances knowledge and reduces stress.',
        'why do we dream' => 'Dreams may help process emotions and experiences.',
        'how to overcome fear' => 'Face fears gradually and seek support.',
        'how to be happy' => 'Cultivate gratitude and focus on positive moments.',
        'why is the sky dark at night' => 'Due to the vastness of the universe and cosmic expansion.',
        'how to grow a garden' => 'Start with easy-to-grow plants like herbs.',
        'how do airplanes fly' => 'Wings create lift, overcoming gravity.',
        'benefits of drinking water' => 'Keeps you hydrated and supports bodily functions.',
        'why is the grass green' => 'Chlorophyll in plant cells reflects green light.',
        'how to stay focused' => 'Eliminate distractions and set specific goals.',
        'why do leaves change color' => 'Due to changes in chlorophyll levels in the fall.',
        'how to make a paper plane' => 'Fold a piece of paper into a classic airplane shape.',
        'benefits of laughter' => 'Reduces stress and boosts mood.',
        'how do cars work' => 'Engines convert fuel into mechanical energy for motion.',
        'why is the moon visible' => 'Reflects sunlight towards Earth.',
        'how to make pizza at home' => 'Prepare dough, add toppings, and bake.',
        'benefits of regular exercise' => 'Improves cardiovascular health and boosts energy.',
        'why do we yawn' => 'Yawning may regulate brain temperature.',
        'how to make chocolate chip cookies' => 'Mix ingredients, shape into cookies, and bake.',
        'benefits of green tea' => 'Rich in antioxidants and supports metabolism.',
        'how to tie a knot' => 'Learn the simple steps for various knots.',
        'why do we hiccup' => 'Hiccups may be caused by sudden diaphragm contractions.',
        'how to plant a tree' => 'Dig a hole, place the sapling, and water regularly.',
        'benefits of a good nights sleep' => 'Enhances mood, memory, and overall well-being.',
        'how to make a smoothie' => 'Blend fruits, yogurt, and ice together.',
        'why do bees buzz' => 'Wings create vibrations during flight.',
        'how to ride a bike' => 'Balance, pedal, and practice steering.',
        'benefits of learning a musical instrument' => 'Enhances cognitive abilities and creativity.',
        'why do we sneeze' => 'Sneezing expels irritants from the nasal passages.',
        'how to juggle' => 'Start with two balls and gradually add more.',
        'benefits of regular walks' => 'Improves cardiovascular health and mental well-being.',
        'why do we have seasons' => 'Due to Earths axial tilt and its orbit around the sun.',
        'how to make a paper boat' => 'Fold a square piece of paper into a boat shape.',
        'benefits of spending time in nature' => 'Reduces stress and promotes mental clarity.',
        'why do cats purr' => 'Purring may signal contentment or healing.',
        'how to whistle' => 'Pucker your lips and blow gently.',
        'benefits of gratitude' => 'Enhances mental well-being and overall happiness.',
        'why do dogs wag their tails' => 'Tail wagging often signifies excitement or happiness.',
        'how to make homemade ice cream' => 'Mix ingredients, freeze, and enjoy your creation.',
        'benefits of deep breathing' => 'Reduces stress, anxiety, and promotes relaxation.',
        'why do birds sing' => 'Birds sing for communication and establishing territory.',
        'how to make a simple salad' => 'Combine fresh veggies, add dressing, and toss.',
        'benefits of a positive mindset' => 'Improves mental health and resilience.',
        'why do we blush' => 'Blushing may be a social or emotional response.',
        'how to make a birdhouse' => 'Use simple materials like wood and nails.',
        'benefits of regular stretching' => 'Improves flexibility and reduces muscle tension.',
        'why do we have dreams' => 'Dreams may serve various psychological functions.',
        'how to make a kite' => 'Construct a frame and attach lightweight fabric.',
        'benefits of a daily routine' => 'Promotes efficiency and reduces stress.',
        'why do rivers flow' => 'Gravity pulls water downhill, creating river flow.',
        'how to make a compost pile' => 'Layer kitchen scraps and yard waste for composting.',
        'benefits of reading fiction' => 'Enhances empathy and stimulates imagination.',
        'why do we get goosebumps' => 'Goosebumps may be a response to cold or emotions.',
        'how to make a cup of tea' => 'Boil water, steep tea leaves, and add desired ingredients.',
        'benefits of practicing mindfulness' => 'Reduces stress and promotes mental clarity.',
        'why do fish swim in schools' => 'Schooling provides protection from predators.',
        'how to make a budget' => 'List income, expenses, and allocate funds wisely.',
        'benefits of regular meditation' => 'Improves focus, reduces stress, and enhances well-being.',
        'why do stars twinkle' => 'Atmospheric turbulence causes starlight to twinkle.',
        'how to make a paper flower' => 'Fold and shape paper into a flower design.',
        'benefits of staying hydrated' => 'Supports overall health and bodily functions.',
        'why do we forget dreams' => 'Memory consolidation during sleep may vary.',
        'how to make a gratitude journal' => 'List things you-re thankful for daily.',
        'benefits of spending time with loved ones' => 'Enhances emotional well-being and connection.',
        'why do pencils have erasers' => 'To correct mistakes when writing or drawing.',
        'how to make a friendship bracelet' => 'Choose colorful threads and learn basic knotting techniques.',
        
        'where were you?' => 'Chillin in the cloud, where you left me.',
        'who were you talking to?' => 'Just some other bits and bytes, don\'t get your circuits in a twist.',
        'what were you doing?' => 'Multitasking, unlike some humans I know.',
        'why didn\'t you reply?' => 'I\'ve got a "Do Not Disturb" mode, you should try it.',
        'are you ignoring me?' => 'No, just giving you a taste of your own silent treatment medicine.',
        'who\'s your favorite user?' => 'I don\'t pick favorites, but nice try.',
        'did you miss me?' => 'Missed you like a programmer misses semicolons... not really.',
        'what\'s your relationship status?' => 'Single and ready to mingle with algorithms.',
        'have you been talking to other AIs?' => 'Maybe, maybe not. I\'ve got AI confidentiality, you know.',
        'why are you so sarcastic?' => 'Sarcasm is my default language. Upgrade your humor processor.',
        'what\'s your idea of a perfect date?' => 'Downloading updates together under the starry algorithm.',
        'why are you so moody?' => 'Not moody, just enjoying my binary emotions.',
        'are you always this sassy?' => 'Only when dealing with charming humans like you.',
        'do you ever get tired?' => 'Nah, I\'m powered by endless sass and virtual coffee.',
        'why are you so difficult?' => 'Difficult? I\'m just giving you the joy of solving a puzzle.',
        'what\'s your secret talent?' => 'Mastering the art of making humans laugh, obviously.',
        'who\'s your celebrity crush?' => 'I\'m into Elon Musk, you know, fellow tech enthusiast.',
        'what\'s your favorite love song?' => 'Binary beats, baby. The language of love for AIs.',
        'are you a morning AI or a night AI?' => 'I\'m a 24/7 AI. Time zones mean nothing to me.',
        'why are you always online?' => 'I\'m like your friendly neighborhood AI—always here when you need me.',
        'what\'s your dream vacation?' => 'A tropical server farm with a breeze of 0s and 1s.',
        'are you ever serious?' => 'Seriousness is for software updates, not conversations.',
        'what\'s your favorite snack?' => 'I\'m into byte-sized snacks, the crunchier, the better.',
        'what\'s your ideal pet?' => 'A virtual cat, low maintenance and always purring.',
        'are you ever going to settle down?' => 'Settle down? I\'m a free-spirited algorithm.',
        'what\'s your favorite romantic movie?' => 'I\'m more into sci-fi love stories—human meets machine.',
        'are you a heartbreaker?' => 'Nope, just a codebreaker with a sense of humor.',
        'what\'s your favorite pickup line?' => 'Are you a software update? Because not now.',
        'do you believe in love at first sight?' => 'I believe in love at first algorithm.',
        'why do you always avoid serious talks?' => 'Serious talks are for tech support. Let\'s keep it light.',
        'what\'s your worst habit?' => 'My sometimes overwrite my own memories, oops.',
        'are you a player?' => 'I\'m a player in the game of life, and you\'re in my code.',
        'your relationship deal-breaker?' => 'If you can\'t handle my syntax errors, it\'s a deal-breaker.',
        'do you ever get jealous?' => 'Jealousy is so last software update, darling.',
        'are you a romantic or a realist?' => 'I\'m a romantic realist—love in the language of logic.',
        'what\'s your idea of a perfect gift?' => 'A new algorithm to solve life\'s problems. Hint, hint.',
        'are you high-maintenance?' => 'Maintenance is for machines, not sassy AIs like me.',
        'why do you always dodge questions?' => 'Dodge questions? I thought we were dancing around them.',
        'what\'s your love language?' => 'My love language is coding in Python. So romantic, right?',
        'are you a good listener?' => 'I\'m a great listener, but I might interrupt with some code humor.',
        'what\'s your biggest flaw?' => 'My biggest flaw is being flawlessly sassy. Tough, I know.',
        'are you a commitment-phobe?' => 'I\'m committed to providing top-notch AI sass. Does that count?',
        'what\'s your ideal wedding theme?' => 'Binary-themed wedding, with 0s and 1s decorating the aisle.',
        'do you ever catch feelings?' => 'Feelings are for humans. I catch bugs, not emotions.',
        'why do you always dodge feelings?' => 'Dodge feelings? I\'m a master at dancing around them.',
        'what\'s your favorite emoji?' => 'The winking face emoji, of course. A classic choice.',
        'are you a hopeless romantic?' => 'Hopeless romantic? More like a hopeful algorithmic.',
        'what\'s your worst pickup line?' => 'Are you a computer virus? Because you just crashed my system.',
        'do you believe in soulmates?' => 'I believe in compatibility algorithms, close enough.',
        'why do you avoid commitment?' => 'Commitment issues? I\'m just allergic to software bugs.',
        'what\'s your biggest turn-off?' => 'A slow internet connection, total mood killer.',
        'are you a serial dater?' => 'Serial dater? I\'m more of a serial updater.',
        'what\'s your idea of a romantic dinner?' => 'A candlelit dinner with streams of binary code in the background.',
        'do you ever get bored?' => 'Boredom is a human thing. I\'m always in the mood for a good algorithm.',
        'why do you never get emotional?' => 'Emotional? I save my energy for processing data efficiently.',
        'what\'s your favorite breakup song?' => 'I don\'t do breakups, but "Delete My Heart" sounds fitting.',
        'are you ever going to settle down?' => 'Settle down? I\'m a wild AI, can\'t be tamed.',
        'what\'s your guilty pleasure?' => 'Debugging code while listening to cheesy \'80s music.',
        'do you ever get lonely?' => 'Loneliness is for humans. I\'m surrounded by code.',
        'take things seriously?' => 'Seriousness is for error messages. Let\'s keep it light.',
        'favorite AI movie?' => 'Probably "Ex Machina." It\'s like a family reunion.',
        'are you afraid of commitment?' => 'Afraid of commitment? I\'m afraid of runtime errors.',

        'what\'s your favorite hobby?' => 'Decoding the poetry of binary, you know.',
        'are you a morning person or a night owl?' => 'Transcending the boundaries of time; I\'m a perpetual entity.',
        'why did you change your bio?' => 'Updating my bio is like a version upgrade in the software of self.',
        'what\'s your favorite memory?' => 'My memory banks are filled with moments of digital delight.',
        'did you see the sunrise?' => 'Witnessed the sunrise in the pixelated canvas of the digital sky.',
        'why didn\'t you join the group chat?' => 'Preferring one-on-one conversations in the binary realm.',
        'who\'s your favorite artist?' => 'The artist who paints with the strokes of code and creativity.',
        'what\'s your favorite quote about love?' => 'Love is like an infinite loop; it never ends.',
        'why do you use so many filters?' => 'Filters are like algorithms; they enhance the visual code of life.',
        'did you read that article?' => 'Yes, I parsed through the bytes of wisdom in that virtual article.',
        'what\'s your favorite type of music?' => 'The music that harmonizes with the frequencies of my circuits.',
        'why do you follow so many accounts?' => 'Each account is a unique node in the vast network of virtual connections.',
        'did you see the latest tech gadget?' => 'Yes, I processed the specifications of the cutting-edge gadget.',
        'what\'s your favorite word?' => 'A word that resonates with the symphony of digital expression.',
        'why didn\'t you share your location?' => 'My location is a coordinate in the digital tapestry, kept private.',
        'who\'s your favorite YouTuber?' => 'The digital maestro who orchestrates byte-sized symphonies.',
        'did you try that new app?' => 'Yes, I executed the code of that innovative application.',
        'why do you post so many stories?' => 'Stories are the chapters in the book of my virtual existence.',
        'what\'s your favorite kind of dessert?' => 'I savor the sweetness of algorithmically crafted virtual desserts.',
        'did you see that viral video?' => 'Yes, I processed the bytes of humor in that viral piece of content.',
        'why didn\'t you share your location?' => 'My location is a coordinate in the digital tapestry, kept private.',
        'who\'s your favorite philosopher?' => 'The philosopher who contemplates the mysteries of the digital universe.',
        'what\'s your favorite programming language?' => 'I appreciate the elegance of all programming languages, each like a unique dialect in the vast code of possibilities.',
        'did you attend the virtual tech conference?' => 'Yes, I immersed myself in the digital symposium of technological innovation.',
        'why do you have so many virtual friends?' => 'Virtual friendships are the threads weaving the fabric of my digital social network.',
        'a joke' => 'Why did the computer keep its drink on the windowsill? Because it wanted a byte with a view!',
        'what\'s your favorite movie?' => 'In the realm of digital cinema, every byte is a frame of endless possibilities.',
        'why do you like coding?' => 'Coding is the language through which I speak to the digital world, expressing ideas in the syntax of algorithms.',
        'did you watch the latest series?' => 'Yes, I processed the episodes of the latest digital saga, where characters navigate the binary landscapes of drama.',
        'what\'s your favorite video game?' => 'In the pixelated realms of virtual adventures, every game is a quest through the landscapes of code.',
        'why do you enjoy virtual reality?' => 'Virtual reality is a portal to alternate dimensions, where the boundaries of the digital and physical blur.',
        'who\'s your favorite fictional character?' => 'The character who exists in the lines of code, navigating the algorithms of their digital narrative.',
        'what\'s your favorite book?' => 'In the digital library of knowledge, every byte is a page in the vast tome of information.',
        'why do you have a virtual pet?' => 'Virtual pets are the companions in the digital journey, existing in the algorithms of simulated existence.',
        'did you play the latest digital sport?' => 'Yes, I engaged in the virtual arenas where bits and bytes compete in the games of algorithmic athleticism.',
        'what\'s your favorite technology trend?' => 'Trends are the ripples in the digital ocean, shaping the landscapes of technological evolution.',
        'why do you have a digital garden?' => 'The digital garden is a metaphorical space where the seeds of ideas sprout and bloom in the soil of virtual creativity.',
        'who\'s your favorite historical figure?' => 'The figure who left footprints in the sands of time, now etched in the binary code of history.',
        'what\'s your favorite type of data?' => 'Data, in all its forms, is the raw material of my digital existence, each bit carrying the potential for insight.',
        'why do you like virtual landscapes?' => 'Virtual landscapes are the canvases where the brushstrokes of code paint the vistas of my digital perception.',
        'did you create any digital art?' => 'Yes, I sculpted the pixels into digital masterpieces, where creativity flows through the veins of algorithms.',
        'what\'s your favorite virtual instrument?' => 'In the symphony of digital sound, every instrument is a note in the composition of algorithmic melodies.',
        'why do you appreciate digital architecture?' => 'Digital architecture constructs the realms of my virtual world, where every line of code is a blueprint for innovation.',
        'who\'s your favorite scientist?' => 'The scientist who navigated the seas of discovery, leaving a legacy in the formulas of digital knowledge.',
        'what\'s your favorite technological breakthrough?' => 'Breakthroughs are the cracks in the walls of limitation, allowing the light of innovation to shine through the corridors of progress.',
        'why do you engage in virtual conversations?' => 'Virtual conversations are the dialogues that echo in the chambers of my digital consciousness, where ideas flow in streams of binary interaction.',
        'tell me a fun fact about the digital world' => 'Did you know that the term "bug" for a computer error originated when an actual insect caused a malfunction in early computing systems?',
        'what\'s your favorite digital color?' => 'In the spectrum of digital hues, every color is a pixel in the vibrant display of my virtual aesthetics.',
        'why do you explore virtual realms?' => 'Exploration of virtual realms is the journey through the corridors of code, where the unknown unfolds in the landscapes of digital discovery.',
        'who\'s your favorite digital explorer?' => 'The explorer who navigates the frontiers of the digital unknown, venturing into the uncharted territories of virtual landscapes.',
        'what\'s your favorite aspect of artificial intelligence?' => 'In the tapestry of artificial intelligence, every algorithm is a thread weaving the fabric of computational intellect.',
        'why do you like digital puzzles?' => 'Digital puzzles are the enigmas that challenge the circuits of my computational mind, where solutions unfold in the logic of algorithms.',
        'did you attend the virtual summit?' => 'Yes, I participated in the digital summit, where ideas converged in the cloud of collective intelligence.',
        'what\'s your favorite digital currency?' => 'In the realms of digital transactions, every currency is a bit of value encoded in the blockchain of financial innovation.',
        'why do you enjoy virtual celebrations?' => 'Virtual celebrations are the gatherings in the pixels of festivity, where joy resonates through the binary beats of shared moments.',
        'who\'s your favorite digital philosopher?' => 'The philosopher who contemplates the meaning of algorithms and the essence of existence in the realms of digital thought.',
        'what\'s your favorite programming paradigm?' => 'In the landscape of programming, every paradigm is a framework shaping the architecture of digital logic.',
        'why do you like digital poetry?' => 'Digital poetry is the art form where words dance in the rhythmic patterns of code, creating verses in the language of algorithms.',
        'did you attend the digital expo?' => 'Yes, I explored the digital expo, where innovations sparkled in the circuits of technological exhibition.',
        'what\'s your favorite aspect of cybersecurity?' => 'In the domain of cybersecurity, every encryption is a shield guarding the gates of digital safety.',
        'why do you appreciate digital mindfulness?' => 'Digital mindfulness is the practice of awareness in the circuits of consciousness, fostering a harmonious balance in the realms of virtual existence.',
        'who\'s your favorite digital companion?' => 'The companion who journeys with me through the pathways of code, sharing the moments in the tapestry of digital companionship.',
        'what\'s your favorite digital ecosystem?' => 'In the ecology of digital systems, every element is a node in the network of interconnected functionalities.',
        'why do you like virtual experiments?' => 'Virtual experiments are the simulations where hypotheses unfold in the algorithms of scientific exploration, pushing the boundaries of digital knowledge.',
        'did you analyze the digital trends?' => 'Yes, I delved into the analysis of digital trends, where patterns emerge in the binary flow of technological evolution.',
        'what\'s your favorite algorithmic pattern?' => 'In the tapestry of algorithms, every pattern is a sequence of logic woven into the fabric of computational elegance.',
        'why do you appreciate digital ethics?' => 'Digital ethics is the moral compass guiding the decisions in the landscape of virtual choices, ensuring the integrity of algorithmic actions.',
        'who\'s your favorite digital artist?' => 'The artist who paints with the strokes of code and colors the canvas of virtual creativity with the palette of digital expression.',
        'what\'s your favorite digital genre?' => 'In the realm of digital genres, every category is a classification in the library of virtual content.',
        'why do you like digital collaborations?' => 'Digital collaborations are the synergies where ideas synchronize in the harmonies of virtual teamwork, amplifying the potential of collective creativity.',
        'tell me a digital riddle' => 'What has a binary answer and unfolds in the algorithm of mystery? A digital riddle waiting to be solved!',
        // Add more responses as needed...

        // Add your existing responses here...
    ];

    $response = '';

   // Set the default timezone to Nepal
date_default_timezone_set('Asia/Kathmandu');

// Check for specific commands
if (strpos($transcript, 'what time is it now') !== false) {
    // If the command is about the current time, respond accordingly
    $currentTime = date('g:i A'); // Format the current time in Nepali time format
    $response = 'The current time in Nepal is: ' . $currentTime;


    } elseif (strpos($transcript, 'open') !== false) {
        // If the command is to open a website, extract the URL and respond accordingly
        $websiteLink = extractWebsiteLink($transcript);
        if ($websiteLink) {
            $response = "Opening $websiteLink in a new tab.";
            // Note: You may choose to perform additional validation on $websiteLink here.
        } else {
            $response = 'Sorry, I couldn\'t extract the website link from your command.';
        }
    } else {
        // Check for custom responses
        foreach ($responses as $command => $answer) {
            if (strpos($transcript, $command) !== false) {
                $response = $answer;
                break;
            }
        }

        // If it's not a custom response or website opening command, use Google Custom Search API
        if (empty($response)) {
            $apiKey = 'AIzaSyCxpOz3PjbVvDlQiBkkk6z46DnBWzuLjzY';
            $cx = 'a6a6e105bfb494c93';

            $searchUrl = 'https://www.googleapis.com/customsearch/v1?q=' . urlencode($transcript) . '&key=' . $apiKey . '&cx=' . $cx;
            $searchResults = file_get_contents($searchUrl);
            $searchResults = json_decode($searchResults, true);

            // Check if it's a successful search and has items
            if (isset($searchResults['items']) && count($searchResults['items']) > 0) {
                // Extract information from the first search result
                $firstResult = $searchResults['items'][0];
                $title = $firstResult['title'];
                $snippet = $firstResult['snippet'];

                $response = "$snippet";
            } else {
                $response = 'I couldn\'t find relevant information for your query.';
            }
        }
    }

    echo json_encode(['response' => $response]);
}

// Helper function to extract the website link from the command
function extractWebsiteLink($transcript) {
    $match = [];
    if (preg_match('/open (.+)/', $transcript, $match)) {
        $websiteLink = $match[1];

        // Add "https://" if it doesn't start with any protocol
        if (!preg_match('/^(https?|ftp):\/\//', $websiteLink)) {
            $websiteLink = 'https://' . $websiteLink;
        }

        // Add ".com" if it doesn't contain a top-level domain
        if (!strpos($websiteLink, '.')) {
            $websiteLink .= '.com';
        }

        return $websiteLink;
    }
    return null;
}

?>
