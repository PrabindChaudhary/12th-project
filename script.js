document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.mood-btn');
    const resultContainer = document.getElementById('result-container');
    const content = document.getElementById('content');
    const loader = document.getElementById('loader');

    const refreshBtn = document.getElementById('refresh-btn');
    const prefButtons = document.querySelectorAll('.pref-btn');

    let currentMood = '';
    let currentType = 'all';

    // Preference Button Logic
    prefButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all
            prefButtons.forEach(b => b.classList.remove('active'));
            // Add to clicked
            btn.classList.add('active');
            // Update state
            currentType = btn.getAttribute('data-type');
        });
    });

    // UI Elements to update
    const recImage = document.getElementById('rec-image');
    const recType = document.getElementById('rec-type');
    const recTitle = document.getElementById('rec-title');
    const recArtist = document.getElementById('rec-artist');
    const recDesc = document.getElementById('rec-desc');
    const recLink = document.getElementById('rec-link');

    // Background shapes colors map
    const moodColors = {
        'happy': '#ff00cc',
        'sad': '#3333ff',
        'energetic': '#ff4500',
        'chill': '#00ffcc',
        'romantic': '#e91e63',
        'focus': '#2196f3',
        'party': '#ff9800'
    };

    // 3D Tilt Effect
    const card = document.querySelector('.glass-card');
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = ((y - centerY) / centerY) * -10; // Max rotation 10deg
        const rotateY = ((x - centerX) / centerX) * 10;

        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
    });

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            const mood = btn.getAttribute('data-mood');
            currentMood = mood; // Update state
            fetchRecommendation(mood);
            updateTheme(mood);
        });
    });

    // Refresh Button Logic
    if (refreshBtn) {
        refreshBtn.addEventListener('click', () => {
            if (currentMood) {
                // Add a small spin animation class temporarily
                const icon = refreshBtn.querySelector('i');
                icon.style.transform = 'rotate(360deg)';
                setTimeout(() => { icon.style.transform = ''; }, 500);

                fetchRecommendation(currentMood);
            }
        });
    }

    const moodGradients = {
        'happy': 'linear-gradient(to right, #ff9966, #ff5e62)',
        'sad': 'linear-gradient(to right, #20002c, #cbb4d4)',
        'energetic': 'linear-gradient(to right, #f12711, #f5af19)',
        'chill': 'linear-gradient(to right, #2193b0, #6dd5ed)',
        'romantic': 'linear-gradient(to right, #cc2b5e, #753a88)',
        'focus': 'linear-gradient(to right, #2c3e50, #4ca1af)',
        'party': 'linear-gradient(to right, #8E2DE2, #4A00E0)'
    };

    function updateTheme(mood) {
        // Change body background gradient
        if (moodGradients[mood]) {
            document.body.style.background = moodGradients[mood];
        }

        // Update shape colors to match
        const shape1 = document.querySelector('.shape-1');
        if (shape1 && moodColors[mood]) {
            shape1.style.background = moodColors[mood];
        }
    }

    function fetchRecommendation(mood) {
        // Show container and loader, hide content
        resultContainer.classList.remove('hidden');
        loader.classList.remove('hidden');
        content.style.opacity = '0';

        // Scroll to result
        resultContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        fetch(`recommend.php?mood=${mood}&type=${currentType}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                displayRecommendation(data);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert("Please ensure you are running this on a PHP server (localhost).");
                loader.classList.add('hidden');
            });
    }

    function displayRecommendation(data) {
        // Update DOM elements
        recImage.src = data.image;
        recType.textContent = data.type;
        recTitle.textContent = data.title;
        recArtist.textContent = data.artist;
        recDesc.textContent = data.description;
        recLink.href = data.link;

        // Hide loader, show content with fade in
        loader.classList.add('hidden');
        content.style.opacity = '1';
    }
});
