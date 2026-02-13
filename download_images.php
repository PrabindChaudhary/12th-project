<?php
// Script to download images from iTunes API
// Run this via command line: php download_images.php

$items = [
    // Happy
    'walter_mitty.jpg' => ['term' => 'The Secret Life of Walter Mitty', 'media' => 'movie'],
    'cant_stop_feeling.jpg' => ['term' => 'Can\'t Stop the Feeling Justin Timberlake', 'media' => 'music'],
    'paddington_2.jpg' => ['term' => 'Paddington 2', 'media' => 'movie'],
    'walking_sunshine.jpg' => ['term' => 'Walking on Sunshine Katrina', 'media' => 'music'],
    'ferris_bueller.jpg' => ['term' => 'Ferris Bueller\'s Day Off', 'media' => 'movie'],
    'happy_pharrell.jpg' => ['term' => 'Happy Pharrell Williams', 'media' => 'music'],
    'singin_rain.jpg' => ['term' => 'Singin\' in the Rain', 'media' => 'movie'],
    'dont_stop_me_now.jpg' => ['term' => 'Don\'t Stop Me Now Queen', 'media' => 'music'],

    // Sad
    'pursuit_happyness.jpg' => ['term' => 'The Pursuit of Happyness', 'media' => 'movie'],
    'fix_you.jpg' => ['term' => 'Fix You Coldplay', 'media' => 'music'],
    'soul.jpg' => ['term' => 'Soul Pixar', 'media' => 'movie'],
    'someone_like_you.jpg' => ['term' => 'Someone Like You Adele', 'media' => 'music'],
    'grave_fireflies.jpg' => ['term' => 'Grave of the Fireflies', 'media' => 'movie'],
    'night_we_met.jpg' => ['term' => 'The Night We Met Lord Huron', 'media' => 'music'],
    'manchester_sea.jpg' => ['term' => 'Manchester by the Sea', 'media' => 'movie'],
    'skinny_love.jpg' => ['term' => 'Skinny Love Bon Iver', 'media' => 'music'],

    // Energetic
    'mad_max.jpg' => ['term' => 'Mad Max Fury Road', 'media' => 'movie'],
    'eye_tiger.jpg' => ['term' => 'Eye of the Tiger Survivor', 'media' => 'music'],
    'baby_driver.jpg' => ['term' => 'Baby Driver', 'media' => 'movie'],
    'uptown_funk.jpg' => ['term' => 'Uptown Funk Bruno Mars', 'media' => 'music'],
    'john_wick.jpg' => ['term' => 'John Wick', 'media' => 'movie'],
    'stronger.jpg' => ['term' => 'Stronger Kanye West', 'media' => 'music'],
    'spider_verse.jpg' => ['term' => 'Spider-Man Into the Spider-Verse', 'media' => 'movie'],
    'level_up.jpg' => ['term' => 'Level Up Ciara', 'media' => 'music'],

    // Chill
    'lofi_girl.jpg' => ['term' => 'Lofi Girl', 'media' => 'music'], // Might fail, will fallback or use generic
    'spirited_away.jpg' => ['term' => 'Spirited Away', 'media' => 'movie'],
    'sunflower.jpg' => ['term' => 'Sunflower Post Malone', 'media' => 'music'],
    'lost_translation.jpg' => ['term' => 'Lost in Translation', 'media' => 'movie'],
    'weightless.jpg' => ['term' => 'Weightless Marconi Union', 'media' => 'music'],
    'her.jpg' => ['term' => 'Her Spike Jonze', 'media' => 'movie'],
    'location.jpg' => ['term' => 'Location Khalid', 'media' => 'music'],
    'totoro.jpg' => ['term' => 'My Neighbor Totoro', 'media' => 'movie'],

    // Romantic
    'lala_land.jpg' => ['term' => 'La La Land', 'media' => 'movie'],
    'perfect.jpg' => ['term' => 'Perfect Ed Sheeran', 'media' => 'music'],
    'notebook.jpg' => ['term' => 'The Notebook', 'media' => 'movie'],
    'all_of_me.jpg' => ['term' => 'All of Me John Legend', 'media' => 'music'],
    'pride_prejudice.jpg' => ['term' => 'Pride and Prejudice', 'media' => 'movie'],
    'just_way_you_are.jpg' => ['term' => 'Just the Way You Are Bruno Mars', 'media' => 'music'],

    // Focus
    'social_network.jpg' => ['term' => 'The Social Network', 'media' => 'movie'],
    'clair_de_lune.jpg' => ['term' => 'Clair de Lune Debussy', 'media' => 'music'],
    'limitless.jpg' => ['term' => 'Limitless', 'media' => 'movie'],
    'experience.jpg' => ['term' => 'Experience Einaudi', 'media' => 'music'],
    'imitation_game.jpg' => ['term' => 'The Imitation Game', 'media' => 'movie'],

    // Party
    'hangover.jpg' => ['term' => 'The Hangover', 'media' => 'movie'],
    'dynamite.jpg' => ['term' => 'Dynamite BTS', 'media' => 'music'],
    'project_x.jpg' => ['term' => 'Project X', 'media' => 'movie'],
    'gotta_feeling.jpg' => ['term' => 'I Gotta Feeling Black Eyed Peas', 'media' => 'music'],
    'superbad.jpg' => ['term' => 'Superbad', 'media' => 'movie'],
    'dont_start_now.jpg' => ['term' => 'Don\'t Start Now Dua Lipa', 'media' => 'music']
];

if (!file_exists('images')) {
    mkdir('images', 0777, true);
}

function fetch_image($term, $media)
{
    $url = "https://itunes.apple.com/search?term=" . urlencode($term) . "&media=" . $media . "&limit=1";
    $json = @file_get_contents($url);
    if ($json) {
        $data = json_decode($json, true);
        if ($data['resultCount'] > 0) {
            $artwork = $data['results'][0]['artworkUrl100'];
            // Upgrade to high res
            return str_replace('100x100bb', '600x600bb', $artwork);
        }
    }
    return null;
}

foreach ($items as $filename => $info) {
    if (file_exists('images/' . $filename) && filesize('images/' . $filename) > 0) {
        echo "Skipping $filename (already exists)\n";
        continue;
    }

    echo "Fetching $filename (" . $info['term'] . ")...\n";
    $imageUrl = fetch_image($info['term'], $info['media']);

    if ($imageUrl) {
        $content = @file_get_contents($imageUrl);
        if ($content) {
            file_put_contents('images/' . $filename, $content);
            echo "Success!\n";
        } else {
            echo "Failed to download image content.\n";
        }
    } else {
        echo "No image found on iTunes.\n";
        // Create a fallback colored square if failed
        $im = imagecreate(300, 300);
        $bg = imagecolorallocate($im, 50, 50, 50);
        $text_color = imagecolorallocate($im, 255, 255, 255);
        imagestring($im, 5, 10, 10, $info['term'], $text_color);
        imagejpeg($im, 'images/' . $filename);
        imagedestroy($im);
    }

    // Sleep to avoid rate limiting
    usleep(200000);
}

echo "Done!\n";
?>