<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$mood = isset($_GET['mood']) ? strtolower($_GET['mood']) : '';

$data = [
    'happy' => [
        ['type' => 'Movie', 'title' => 'The Secret Life of Walter Mitty', 'artist' => 'Dir. Ben Stiller', 'image' => 'images/walter_mitty.jpg', 'description' => 'Escape reality and find your courage. A stunning visual journey about taking risks.', 'link' => 'https://www.imdb.com/title/tt0359950/'],
        ['type' => 'Song', 'title' => 'Can\'t Stop the Feeling!', 'artist' => 'Justin Timberlake', 'image' => 'images/cant_stop_feeling.jpg', 'description' => 'Pure sunshine in audio form. Try not to dance, we dare you.', 'link' => 'https://www.youtube.com/watch?v=ru0K8uYEZWw'],
        ['type' => 'Movie', 'title' => 'Paddington 2', 'artist' => 'Dir. Paul King', 'image' => 'images/paddington_2.jpg', 'description' => 'The kindest, warmest, and arguably best movie of the decade. A bear making the world better.', 'link' => 'https://www.imdb.com/title/tt4468740/'],
        ['type' => 'Song', 'title' => 'Walking on Sunshine', 'artist' => 'Katrina and the Waves', 'image' => 'images/walking_sunshine.jpg', 'description' => 'The ultimate dopamine hit from the 80s. Instant smile generator.', 'link' => 'https://www.youtube.com/watch?v=iPUmE-tne5U'],
        ['type' => 'Movie', 'title' => 'Ferris Bueller\'s Day Off', 'artist' => 'Dir. John Hughes', 'image' => 'images/ferris_bueller.jpg', 'description' => 'Life moves pretty fast. If you don\'t stop and look around once in a while, you could miss it.', 'link' => 'https://www.imdb.com/title/tt0091042/'],
        ['type' => 'Song', 'title' => 'Happy', 'artist' => 'Pharrell Williams', 'image' => 'images/happy_pharrell.jpg', 'description' => 'Clap along if you feel like a room without a roof. The universal anthem of joy.', 'link' => 'https://www.youtube.com/watch?v=ZbZSe6N_BXs'],
        ['type' => 'Movie', 'title' => 'Singin\' in the Rain', 'artist' => 'Dir. Gene Kelly', 'image' => 'images/singin_rain.jpg', 'description' => 'A glorious, colorful, and wildly funny technicolor masterpiece.', 'link' => 'https://www.imdb.com/title/tt0045152/'],
        ['type' => 'Song', 'title' => 'Don\'t Stop Me Now', 'artist' => 'Queen', 'image' => 'images/dont_stop_me_now.jpg', 'description' => 'Freddie Mercury at his absolute energetic peak. You\'re having a good time!', 'link' => 'https://www.youtube.com/watch?v=HgzGwKwLmgM']
    ],
    'sad' => [
        ['type' => 'Movie', 'title' => 'The Pursuit of Happyness', 'artist' => 'Dir. Gabriele Muccino', 'image' => 'images/pursuit_happyness.jpg', 'description' => 'Heartbreaking yet inspiring. Will Smith gives the performance of a lifetime.', 'link' => 'https://www.imdb.com/title/tt0454921/'],
        ['type' => 'Song', 'title' => 'Fix You', 'artist' => 'Coldplay', 'image' => 'images/fix_you.jpg', 'description' => 'When you try your best, but you don\'t succeed... lights will guide you home.', 'link' => 'https://www.youtube.com/watch?v=k4V3Mo61fJM'],
        ['type' => 'Movie', 'title' => 'Soul', 'artist' => 'Pixar', 'image' => 'images/soul.jpg', 'description' => 'A profound look at what it means to be alive, wrapped in beautiful jazz and animation.', 'link' => 'https://www.imdb.com/title/tt2948372/'],
        ['type' => 'Song', 'title' => 'Someone Like You', 'artist' => 'Adele', 'image' => 'images/someone_like_you.jpg', 'description' => 'The ultimate breakup anthem. Let the tears flow.', 'link' => 'https://www.youtube.com/watch?v=hLQl3WQQoQ0'],
        ['type' => 'Movie', 'title' => 'Grave of the Fireflies', 'artist' => 'Studio Ghibli', 'image' => 'images/grave_fireflies.jpg', 'description' => 'Warning: This will destroy you. A devastatingly beautiful war film.', 'link' => 'https://www.imdb.com/title/tt0095327/'],
        ['type' => 'Song', 'title' => 'The Night We Met', 'artist' => 'Lord Huron', 'image' => 'images/night_we_met.jpg', 'description' => 'Haunting, nostalgic, and utterly beautiful. "I had all and then most of you some and now none of you."', 'link' => 'https://www.youtube.com/watch?v=KtlgYxa6BMU'],
        ['type' => 'Movie', 'title' => 'Manchester by the Sea', 'artist' => 'Dir. Kenneth Lonergan', 'image' => 'images/manchester_sea.jpg', 'description' => 'A realistic, quiet, and painful exploration of grief and guilt.', 'link' => 'https://www.imdb.com/title/tt4042818/'],
        ['type' => 'Song', 'title' => 'Skinny Love', 'artist' => 'Bon Iver', 'image' => 'images/skinny_love.jpg', 'description' => 'Raw, lo-fi, and deeply emotional folk music.', 'link' => 'https://www.youtube.com/watch?v=ssdgFoHLwnk']
    ],
    'energetic' => [
        ['type' => 'Movie', 'title' => 'Mad Max: Fury Road', 'artist' => 'Dir. George Miller', 'image' => 'images/mad_max.jpg', 'description' => 'A 2-hour adrenaline shot. Shiny and chrome!', 'link' => 'https://www.imdb.com/title/tt1392190/'],
        ['type' => 'Song', 'title' => 'Eye of the Tiger', 'artist' => 'Survivor', 'image' => 'images/eye_tiger.jpg', 'description' => 'Rising up to the challenge of our rival! The gym essential.', 'link' => 'https://www.youtube.com/watch?v=btPJPFnesV4'],
        ['type' => 'Movie', 'title' => 'Baby Driver', 'artist' => 'Dir. Edgar Wright', 'image' => 'images/baby_driver.jpg', 'description' => 'Heist music synchronized to perfection. Fast cars and killer tracks.', 'link' => 'https://www.imdb.com/title/tt3890160/'],
        ['type' => 'Song', 'title' => 'Uptown Funk', 'artist' => 'Mark Ronson ft. Bruno Mars', 'image' => 'images/uptown_funk.jpg', 'description' => 'Too hot (hot damn). A funk masterpiece that demands you dance.', 'link' => 'https://www.youtube.com/watch?v=OPf0YbXqDm0'],
        ['type' => 'Movie', 'title' => 'John Wick', 'artist' => 'Dir. Chad Stahelski', 'image' => 'images/john_wick.jpg', 'description' => 'One man, one dog, and a whole lot of action. Pure kinetic energy.', 'link' => 'https://www.imdb.com/title/tt2911666/'],
        ['type' => 'Song', 'title' => 'Stronger', 'artist' => 'Kanye West', 'image' => 'images/stronger.jpg', 'description' => 'Work it, make it, do it. The ultimate power track.', 'link' => 'https://www.youtube.com/watch?v=PsO6ZnUZI0g'],
        ['type' => 'Movie', 'title' => 'Spider-Man: Into the Spider-Verse', 'artist' => 'Sony Animation', 'image' => 'images/spider_verse.jpg', 'description' => 'Visually groundbreaking and incredibly fast-paced. A comic book come to life.', 'link' => 'https://www.imdb.com/title/tt4633694/'],
        ['type' => 'Song', 'title' => 'Level Up', 'artist' => 'Ciara', 'image' => 'images/level_up.jpg', 'description' => 'High energy beats to make you feel invincible.', 'link' => 'https://www.youtube.com/watch?v=Dh-ULbQmmF8']
    ],
    'chill' => [
        ['type' => 'Song', 'title' => 'lofi hip hop radio', 'artist' => 'Lofi Girl', 'image' => 'images/lofi_girl.jpg', 'description' => 'The gold standard for relaxing. Study, sleep, or zone out.', 'link' => 'https://www.youtube.com/watch?v=jfKfPfyJRdk'],
        ['type' => 'Movie', 'title' => 'Spirited Away', 'artist' => 'Studio Ghibli', 'image' => 'images/spirited_away.jpg', 'description' => 'Get lost in a magical bathhouse. A mesmerizing and calming visual feast.', 'link' => 'https://www.imdb.com/title/tt0245429/'],
        ['type' => 'Song', 'title' => 'Sunflower', 'artist' => 'Post Malone, Swae Lee', 'image' => 'images/sunflower.jpg', 'description' => 'You\'re a sunflower... smooth, catchy, and impossible to hate.', 'link' => 'https://www.youtube.com/watch?v=ApXoWvfEYVU'],
        ['type' => 'Movie', 'title' => 'Lost in Translation', 'artist' => 'Dir. Sofia Coppola', 'image' => 'images/lost_translation.jpg', 'description' => 'Atmospheric nights in Tokyo. Quiet, contemplative, and beautiful.', 'link' => 'https://www.imdb.com/title/tt0335266/'],
        ['type' => 'Song', 'title' => 'Weightless', 'artist' => 'Marconi Union', 'image' => 'images/weightless.jpg', 'description' => 'Scientifically designed to slow your heart rate. Pure ambient bliss.', 'link' => 'https://www.youtube.com/watch?v=UfcAVejslrU'],
        ['type' => 'Movie', 'title' => 'Her', 'artist' => 'Dir. Spike Jonze', 'image' => 'images/her.jpg', 'description' => 'A gentle sci-fi romance with a soft, pastel color palette.', 'link' => 'https://www.imdb.com/title/tt1798709/'],
        ['type' => 'Song', 'title' => 'Location', 'artist' => 'Khalid', 'image' => 'images/location.jpg', 'description' => 'Send me your location... smooth R&B vibes.', 'link' => 'https://www.youtube.com/watch?v=by3yRdlQvzs'],
        ['type' => 'Movie', 'title' => 'My Neighbor Totoro', 'artist' => 'Studio Ghibli', 'image' => 'images/totoro.jpg', 'description' => 'The ultimate comfort movie. Flying cats and forest spirits.', 'link' => 'https://www.imdb.com/title/tt0096283/']
    ],
    'romantic' => [
        ['type' => 'Movie', 'title' => 'La La Land', 'artist' => 'Dir. Damien Chazelle', 'image' => 'images/lala_land.jpg', 'description' => 'A jazz pianist and an aspiring actress fall in love while pursuing their dreams in LA.', 'link' => 'https://www.imdb.com/title/tt3783958/'],
        ['type' => 'Song', 'title' => 'Perfect', 'artist' => 'Ed Sheeran', 'image' => 'images/perfect.jpg', 'description' => 'The modern classic slow dance song. "I found a love for me..."', 'link' => 'https://www.youtube.com/watch?v=2Vv-BfVoq4g'],
        ['type' => 'Movie', 'title' => 'The Notebook', 'artist' => 'Dir. Nick Cassavetes', 'image' => 'images/notebook.jpg', 'description' => 'If you\'re a bird, I\'m a bird. The epic love story that set the standard.', 'link' => 'https://www.imdb.com/title/tt0332280/'],
        ['type' => 'Song', 'title' => 'All of Me', 'artist' => 'John Legend', 'image' => 'images/all_of_me.jpg', 'description' => 'Pure piano romance. Ideal for starry nights.', 'link' => 'https://www.youtube.com/watch?v=450p7goxZqg'],
        ['type' => 'Movie', 'title' => 'Pride & Prejudice', 'artist' => 'Dir. Joe Wright', 'image' => 'images/pride_prejudice.jpg', 'description' => 'The hand flex scene. Need we say more? Classic Victorian romance.', 'link' => 'https://www.imdb.com/title/tt0414387/'],
        ['type' => 'Song', 'title' => 'Just the Way You Are', 'artist' => 'Bruno Mars', 'image' => 'images/just_way_you_are.jpg', 'description' => 'Make someone feel like they are the only person in the world.', 'link' => 'https://www.youtube.com/watch?v=LjhCEhWiKXk']
    ],
    'focus' => [
        ['type' => 'Movie', 'title' => 'The Social Network', 'artist' => 'Dir. David Fincher', 'image' => 'images/social_network.jpg', 'description' => 'Fast dialogue, hacking scenes, and pure ambition. Makes you want to build something.', 'link' => 'https://www.imdb.com/title/tt1285016/'],
        ['type' => 'Song', 'title' => 'Clair de Lune', 'artist' => 'Debussy', 'image' => 'images/clair_de_lune.jpg', 'description' => 'Timeless classical piano to clear your mind and sharpen your focus.', 'link' => 'https://www.youtube.com/watch?v=CvFH_6DNRCY'],
        ['type' => 'Movie', 'title' => 'Limitless', 'artist' => 'Dir. Neil Burger', 'image' => 'images/limitless.jpg', 'description' => 'What if you could access 100% of your brain? High-stakes intelligence.', 'link' => 'https://www.imdb.com/title/tt1219289/'],
        ['type' => 'Song', 'title' => 'Experience', 'artist' => 'Ludovico Einaudi', 'image' => 'images/experience.jpg', 'description' => 'Building, intense classical music that feels like a breakthrough.', 'link' => 'https://www.youtube.com/watch?v=hN_q-_nGv4U'],
        ['type' => 'Movie', 'title' => 'The Imitation Game', 'artist' => 'Dir. Morten Tyldum', 'image' => 'images/imitation_game.jpg', 'description' => 'Cracking the code. The story of Alan Turing and the Enigma machine.', 'link' => 'https://www.imdb.com/title/tt2084970/']
    ],
    'party' => [
        ['type' => 'Movie', 'title' => 'The Hangover', 'artist' => 'Dir. Todd Phillips', 'image' => 'images/hangover.jpg', 'description' => 'The ultimate wild night out gone wrong. Hilarious chaos.', 'link' => 'https://www.imdb.com/title/tt1119646/'],
        ['type' => 'Song', 'title' => 'Dynamite', 'artist' => 'BTS', 'image' => 'images/dynamite.jpg', 'description' => 'Light it up like dynamite! Infectiously poppy and fun.', 'link' => 'https://www.youtube.com/watch?v=gdZLi9oWNZg'],
        ['type' => 'Movie', 'title' => 'Project X', 'artist' => 'Dir. Nima Nourizadeh', 'image' => 'images/project_x.jpg', 'description' => 'The party movie to end all party movies. Absolute mayhem.', 'link' => 'https://www.imdb.com/title/tt1636826/'],
        ['type' => 'Song', 'title' => 'I Gotta Feeling', 'artist' => 'Black Eyed Peas', 'image' => 'images/gotta_feeling.jpg', 'description' => 'Tonight\'s gonna be a good night. The staple of every party since 2009.', 'link' => 'https://www.youtube.com/watch?v=uSD4vsh1zDA'],
        ['type' => 'Movie', 'title' => 'Superbad', 'artist' => 'Dir. Greg Mottola', 'image' => 'images/superbad.jpg', 'description' => 'High school seniors trying to get booze for a party. Awkward and legendary.', 'link' => 'https://www.imdb.com/title/tt0829482/'],
        ['type' => 'Song', 'title' => 'Don\'t Start Now', 'artist' => 'Dua Lipa', 'image' => 'images/dont_start_now.jpg', 'description' => 'Nu-disco perfection for the dance floor.', 'link' => 'https://www.youtube.com/watch?v=oygrmJFKYZY']
    ]
];

$type = isset($_GET['type']) ? strtolower($_GET['type']) : '';

if (array_key_exists($mood, $data)) {
    $recommendations = $data[$mood];

    // Filter by type if specified and not 'all'
    if ($type && $type !== 'all') {
        $filteredRecs = array_filter($recommendations, function ($item) use ($type) {
            return strtolower($item['type']) === $type;
        });

        // If we have matches, use them. Otherwise fallback to all (or error)
        if (!empty($filteredRecs)) {
            $recommendations = $filteredRecs;
        }
    }

    $randomItem = $recommendations[array_rand($recommendations)];
    echo json_encode($randomItem);
} else {
    echo json_encode(['error' => 'Mood not found. Try happy, sad, energetic, chill, romantic, focus, or party.']);
}
?>