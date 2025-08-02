document.addEventListener("livewire:navigated", function () {
    // Sundanese Wedding Theme JavaScript
    
    // Initialize theme animations and effects
    initializeSundaneseTheme();
    
    // Add Sundanese greeting animation
    animateSundaneseGreeting();
    
    // Initialize ornamental decorations
    addOrnamentalDecorations();
    
    // Add traditional sound effects (optional)
    initializeSoundEffects();
    
    // Initialize responsive behaviors
    handleResponsiveFeatures();
});

function initializeSundaneseTheme() {
    // Add theme-specific CSS classes
    document.body.classList.add('sundanese-theme');
    
    // Add batik pattern backgrounds to slides
    const slides = document.querySelectorAll('.swiper-slide');
    slides.forEach((slide, index) => {
        if (index % 2 === 0) {
            const patternDiv = document.createElement('div');
            patternDiv.className = 'sundanese-pattern';
            slide.appendChild(patternDiv);
        }
    });
    
    // Add fade-in animation to elements
    const animatedElements = document.querySelectorAll('.couple-info, .event-card, .story-item');
    animatedElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.2}s`;
        element.classList.add('fade-in-sundanese');
    });
}

function animateSundaneseGreeting() {
    // Animate the Sundanese greeting text
    const greetingElement = document.querySelector('.sundanese-greeting');
    if (greetingElement) {
        greetingElement.style.opacity = '0';
        greetingElement.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            greetingElement.style.transition = 'all 1s ease-out';
            greetingElement.style.opacity = '1';
            greetingElement.style.transform = 'translateY(0)';
        }, 500);
    }
}

function addOrnamentalDecorations() {
    // Add ornamental decorations to specific slides
    const targetSlides = [
        '.slide_opening',
        '.slide_quote',
        '.slide_couple',
        '.slide_closing'
    ];
    
    targetSlides.forEach(slideSelector => {
        const slide = document.querySelector(slideSelector);
        if (slide) {
            // Only add ornaments if they don't already exist
            if (!slide.querySelector('.sundanese-ornament')) {
                addOrnamentsToSlide(slide);
            }
        }
    });
}

function addOrnamentsToSlide(slide) {
    const ornamentPositions = [
        'ornament-top-left',
        'ornament-top-right',
        'ornament-bottom-left',
        'ornament-bottom-right'
    ];
    
    ornamentPositions.forEach(position => {
        const ornament = document.createElement('div');
        ornament.className = `sundanese-ornament ${position}`;
        slide.style.position = 'relative';
        slide.appendChild(ornament);
    });
}

function initializeSoundEffects() {
    // Optional: Add traditional Sundanese music or sound effects
    // This would require audio files in the assets directory
    
    const soundToggle = document.createElement('button');
    soundToggle.innerHTML = '🎵';
    soundToggle.className = 'sound-toggle';
    soundToggle.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        background: var(--secondary-green);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    `;
    
    let isPlaying = false;
    soundToggle.addEventListener('click', function() {
        if (isPlaying) {
            // Stop background music
            soundToggle.innerHTML = '🎵';
            soundToggle.style.opacity = '0.7';
        } else {
            // Start background music
            soundToggle.innerHTML = '🔇';
            soundToggle.style.opacity = '1';
        }
        isPlaying = !isPlaying;
    });
    
    // Only add sound toggle if audio files are available
    // document.body.appendChild(soundToggle);
}

function handleResponsiveFeatures() {
    // Handle responsive design features
    function adjustForMobile() {
        const isMobile = window.innerWidth <= 768;
        
        if (isMobile) {
            // Adjust ornament sizes for mobile
            const ornaments = document.querySelectorAll('.sundanese-ornament');
            ornaments.forEach(ornament => {
                ornament.style.transform += ' scale(0.7)';
            });
            
            // Simplify animations for better performance
            const animatedElements = document.querySelectorAll('.fade-in-sundanese');
            animatedElements.forEach(element => {
                element.style.animationDuration = '0.5s';
            });
        }
    }
    
    // Initial adjustment
    adjustForMobile();
    
    // Adjust on window resize
    window.addEventListener('resize', debounce(adjustForMobile, 250));
}

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Enhanced photo frame interactions
function enhancePhotoFrames() {
    const photoFrames = document.querySelectorAll('[id*="photo"]');
    photoFrames.forEach(frame => {
        frame.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        
        frame.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.boxShadow = '0 10px 25px rgba(139, 195, 74, 0.3)';
        });
        
        frame.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });
}

// Initialize enhanced interactions
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(enhancePhotoFrames, 1000);
});

// Add traditional pattern overlay effect
function addTraditionalPatterns() {
    const slides = document.querySelectorAll('.swiper-slide');
    slides.forEach((slide, index) => {
        // Add different patterns for different slides
        const patterns = ['batik', 'songket', 'tenun', 'ukiran'];
        const patternType = patterns[index % patterns.length];
        
        slide.classList.add(`traditional-pattern-${patternType}`);
    });
}

// Custom countdown animation for Sundanese theme
function enhanceCountdown() {
    const countdown = document.querySelector('.countdown, [class*="countdown"]');
    if (countdown) {
        countdown.style.fontFamily = 'Playfair Display, serif';
        countdown.style.color = 'var(--earth-brown)';
        countdown.style.textShadow = '2px 2px 4px rgba(0,0,0,0.1)';
        
        // Add golden border
        const countdownItems = countdown.querySelectorAll('.countdown-item, [class*="countdown"] > div');
        countdownItems.forEach(item => {
            item.style.border = '2px solid var(--accent-gold)';
            item.style.borderRadius = '10px';
            item.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
            item.style.margin = '5px';
            item.style.boxShadow = '0 3px 10px rgba(0,0,0,0.1)';
        });
    }
}

// Initialize all enhancements when the page loads
document.addEventListener('livewire:navigated', function() {
    setTimeout(() => {
        addTraditionalPatterns();
        enhanceCountdown();
    }, 500);
});

// Add special effects for couple names
function enhanceCoupleNames() {
    const coupleNames = document.querySelectorAll('.couple-nickname, [class*="couple-name"]');
    coupleNames.forEach(name => {
        // Add golden glow effect
        name.style.textShadow = '0 0 10px rgba(255, 215, 0, 0.5)';
        
        // Add hover effect
        name.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.textShadow = '0 0 15px rgba(255, 215, 0, 0.8)';
            this.style.transition = 'all 0.3s ease';
        });
        
        name.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.textShadow = '0 0 10px rgba(255, 215, 0, 0.5)';
        });
    });
}