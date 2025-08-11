<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $project->title }} - Portfolio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Custom Styles with Color Palette -->
        <style>
            :root {
                --color-primary: #181C14;     /* Dark charcoal */
                --color-secondary: #3C3D37;   /* Dark olive */
                --color-tertiary: #697565;    /* Sage green */
                --color-accent: #ECDFCC;      /* Cream beige */
            }

            /* Custom color classes */
            .bg-primary { background-color: var(--color-primary); }
            .bg-secondary { background-color: var(--color-secondary); }
            .bg-tertiary { background-color: var(--color-tertiary); }
            .bg-accent { background-color: var(--color-accent); }
            
            .text-primary { color: var(--color-primary); }
            .text-secondary { color: var(--color-secondary); }
            .text-tertiary { color: var(--color-tertiary); }
            .text-accent { color: var(--color-accent); }

            .border-primary { border-color: var(--color-primary); }
            .border-secondary { border-color: var(--color-secondary); }
            .border-tertiary { border-color: var(--color-tertiary); }
            .border-accent { border-color: var(--color-accent); }

            /* Navigation glass effect */
            .nav-glass {
                background: rgba(24, 28, 20, 0.95);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(236, 223, 204, 0.2);
            }

            /* Enhanced card styles */
            .card-glass {
                background: rgba(236, 223, 204, 0.9);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(105, 117, 101, 0.3);
                transition: all 0.3s ease;
            }

            .fade-in {
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.8s ease-out forwards;
            }

            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Fully Transparent Carousel Styles */
            .carousel-container {
                position: relative;
                overflow: hidden;
                background: transparent;
            }

            .carousel-track {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }

            .carousel-slide {
                min-width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: transparent;
                padding: 0;
            }

            .carousel-slide img {
                max-width: 100%;
                max-height: 500px;
                object-fit: contain;
                transition: opacity 0.3s ease;
            }

            .carousel-slide img:hover {
                opacity: 0.9;
            }

            .carousel-slide video {
                max-width: 100%;
                max-height: 500px;
            }

            .carousel-indicators {
                display: flex;
                justify-content: center;
                gap: 8px;
                margin-top: 20px;
            }

            .indicator {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background: var(--color-tertiary);
                cursor: pointer;
                transition: all 0.3s ease;
                opacity: 0.5;
            }

            .indicator.active {
                background: var(--color-primary);
                opacity: 1;
                transform: scale(1.2);
            }

            .media-counter {
                position: absolute;
                top: 20px;
                right: 20px;
                background: rgba(24, 28, 20, 0.8);
                color: var(--color-accent);
                padding: 8px 12px;
                border-radius: 20px;
                font-size: 14px;
                font-weight: 500;
                z-index: 10;
                backdrop-filter: blur(10px);
            }

            /* Full screen modal */
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.95);
                backdrop-filter: blur(5px);
            }

            .modal-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                max-width: 90vw;
                max-height: 90vh;
                object-fit: contain;
                border-radius: 8px;
            }

            .modal-close {
                position: absolute;
                top: 20px;
                right: 30px;
                color: #fff;
                font-size: 40px;
                font-weight: bold;
                cursor: pointer;
                z-index: 1001;
                transition: all 0.3s ease;
            }

            .modal-close:hover {
                color: var(--color-accent);
                transform: scale(1.1);
            }

            /* Technology tags */
            .tech-tag {
                background: linear-gradient(135deg, var(--color-secondary), var(--color-tertiary));
                color: var(--color-accent);
                padding: 8px 16px;
                border-radius: 25px;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.3s ease;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .tech-tag:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            }

            /* Link button styling */
            .link-button {
                background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
                color: var(--color-accent);
                padding: 10px 20px;
                border-radius: 25px;
                font-size: 16px;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .link-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            }

            .not-deployed {
                background: var(--color-tertiary);
                color: var(--color-accent);
                padding: 10px 20px;
                border-radius: 25px;
                font-size: 16px;
                font-weight: 500;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                opacity: 0.7;
            }

            /* Carousel navigation buttons */
            .carousel-nav-buttons {
                display: flex;
                justify-content: center;
                gap: 16px;
                margin-top: 20px;
            }

            .nav-btn {
                background: linear-gradient(135deg, var(--color-secondary), var(--color-tertiary));
                color: var(--color-accent);
                border: none;
                padding: 12px 20px;
                border-radius: 25px;
                font-size: 14px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                min-width: 100px;
                justify-content: center;
            }

            .nav-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            }

            .nav-btn:disabled {
                opacity: 0.5;
                cursor: not-allowed;
                transform: none;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .nav-btn:disabled:hover {
                transform: none;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                background: linear-gradient(135deg, var(--color-secondary), var(--color-tertiary));
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .media-counter {
                    top: 15px;
                    right: 15px;
                    padding: 6px 10px;
                    font-size: 12px;
                }

                .carousel-slide {
                    padding: 0;
                }

                .nav-btn {
                    padding: 10px 16px;
                    font-size: 12px;
                    min-width: 80px;
                }

                .carousel-nav-buttons {
                    gap: 12px;
                }
            }
        </style>
    </head>
    <body class="antialiased bg-accent">
        <!-- Navigation Bar -->
        <nav class="nav-glass fixed top-0 left-0 right-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ url('/') }}" class="text-xl font-bold text-accent hover:text-tertiary transition-all duration-300 hover:scale-110">Portfolio</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ url('/') }}" class="text-accent hover:text-tertiary px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:scale-105">Back to Home</a>
                        <a href="{{ url('/#projects') }}" class="text-accent hover:text-tertiary px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:scale-105">All Projects</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="pt-20 min-h-screen">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Project Header -->
                <div class="text-center mb-12 fade-in">
                    <h1 class="text-4xl font-bold text-primary mb-4">{{ $project->title }}</h1>
                    
                    <!-- Project Link or Status -->
                    <div class="mb-4">
                        @if($project->url)
                            <a href="{{ $project->url }}" target="_blank" class="link-button">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                View Live Project
                            </a>
                        @else
                            <div class="not-deployed">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Not Yet Deployed
                            </div>
                        @endif
                    </div>
                    
                    {{-- <div class="inline-block bg-tertiary text-accent px-4 py-2 rounded-full text-sm font-medium">
                        {{ $project->technologies }}
                    </div> --}}
                </div>

                <!-- Media Carousel -->
                @php
                    $mediaItems = collect();
                    
                    // Add video first if exists
                    if($project->video) {
                        $mediaItems->push([
                            'type' => 'video',
                            'src' => asset('storage/' . $project->video),
                            'alt' => $project->title . ' Video'
                        ]);
                    }
                    
                    // Add main image if exists
                    if($project->image) {
                        $mediaItems->push([
                            'type' => 'image',
                            'src' => asset('storage/' . $project->image),
                            'alt' => $project->title
                        ]);
                    }
                    
                    // Add screenshots
                    if($project->screenshots && count($project->screenshots) > 0) {
                        foreach($project->screenshots as $index => $screenshot) {
                            $mediaItems->push([
                                'type' => 'image',
                                'src' => asset('storage/' . $screenshot),
                                'alt' => $project->title . ' Screenshot ' . ($index + 1)
                            ]);
                        }
                    }
                @endphp

                @if($mediaItems->count() > 0)
                    <div class="mb-12 fade-in">
                        <div class="carousel-container">
                            <!-- Media Counter -->
                            @if($mediaItems->count() > 1)
                                <div class="media-counter">
                                    <span id="current-slide">1</span> / {{ $mediaItems->count() }}
                                </div>
                            @endif

                            <!-- Carousel Track -->
                            <div class="carousel-track" id="carousel-track">
                                @foreach($mediaItems as $index => $media)
                                    <div class="carousel-slide">
                                        @if($media['type'] === 'video')
                                            <video controls class="w-full" style="max-height: 500px;" onclick="openModal(this)">
                                                <source src="{{ $media['src'] }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{ $media['src'] }}" 
                                                 alt="{{ $media['alt'] }}" 
                                                 class="cursor-pointer"
                                                 onclick="openModal(this)">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        @if($mediaItems->count() > 1)
                            <div class="carousel-nav-buttons">
                                <button class="nav-btn" id="prev-btn" onclick="previousSlide()">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Previous
                                </button>
                                <button class="nav-btn" id="next-btn" onclick="nextSlide()">
                                    Next
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif

                        <!-- Indicators -->
                        @if($mediaItems->count() > 1)
                            <div class="carousel-indicators">
                                @foreach($mediaItems as $index => $media)
                                    <div class="indicator {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Combined Project Details -->
                <div class="max-w-4xl mx-auto fade-in">
                    <div class="card-glass rounded-lg p-8">
                        <h2 class="text-2xl font-semibold text-primary mb-6 border-b border-tertiary pb-3">Project Details</h2>
                        
                        <!-- Description Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-secondary mb-3">Description</h3>
                            <p class="text-gray-700 leading-relaxed text-lg">{{ $project->description }}</p>
                        </div>

                        <!-- Technologies Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-secondary mb-4">Technologies Used</h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach(explode(',', $project->technologies) as $tech)
                                    <span class="tech-tag">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full Screen Modal -->
        <div id="mediaModal" class="modal">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <div id="modalContent"></div>
        </div>

        <script>
            let currentSlideIndex = 0;
            const totalSlides = {{ $mediaItems->count() }};

            // Add fade-in animation on load
            document.addEventListener('DOMContentLoaded', function() {
                const fadeElements = document.querySelectorAll('.fade-in');
                fadeElements.forEach((el, index) => {
                    el.style.animationDelay = `${index * 0.2}s`;
                });

                // Initialize button states
                updateNavigationButtons();
            });

            // Carousel functionality
            function updateCarousel() {
                const track = document.getElementById('carousel-track');
                const currentCounter = document.getElementById('current-slide');
                const indicators = document.querySelectorAll('.indicator');
                
                if (track) {
                    track.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
                }
                
                if (currentCounter) {
                    currentCounter.textContent = currentSlideIndex + 1;
                }
                
                // Update indicators
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentSlideIndex);
                });

                // Update navigation buttons
                updateNavigationButtons();
            }

            function updateNavigationButtons() {
                const prevBtn = document.getElementById('prev-btn');
                const nextBtn = document.getElementById('next-btn');
                
                if (prevBtn && nextBtn) {
                    // Disable previous button on first slide
                    prevBtn.disabled = currentSlideIndex === 0;
                    
                    // Disable next button on last slide
                    nextBtn.disabled = currentSlideIndex === totalSlides - 1;
                }
            }

            function nextSlide() {
                if (currentSlideIndex < totalSlides - 1) {
                    currentSlideIndex++;
                    updateCarousel();
                }
            }

            function previousSlide() {
                if (currentSlideIndex > 0) {
                    currentSlideIndex--;
                    updateCarousel();
                }
            }

            function goToSlide(index) {
                currentSlideIndex = index;
                updateCarousel();
            }

            // Keyboard navigation
            document.addEventListener('keydown', function(event) {
                if (totalSlides > 1) {
                    if (event.key === 'ArrowRight') {
                        nextSlide();
                    } else if (event.key === 'ArrowLeft') {
                        previousSlide();
                    }
                }
                
                if (event.key === 'Escape') {
                    closeModal();
                }
            });

            // Modal functionality
            function openModal(element) {
                const modal = document.getElementById('mediaModal');
                const modalContent = document.getElementById('modalContent');
                
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
                
                if (element.tagName === 'VIDEO') {
                    const video = document.createElement('video');
                    video.src = element.querySelector('source').src;
                    video.controls = true;
                    video.className = 'modal-content';
                    video.autoplay = true;
                    modalContent.innerHTML = '';
                    modalContent.appendChild(video);
                } else {
                    const img = document.createElement('img');
                    img.src = element.src;
                    img.alt = element.alt;
                    img.className = 'modal-content';
                    modalContent.innerHTML = '';
                    modalContent.appendChild(img);
                }
            }

            function closeModal() {
                const modal = document.getElementById('mediaModal');
                const modalContent = document.getElementById('modalContent');
                
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                modalContent.innerHTML = '';
            }

            // Close modal when clicking outside content
            document.getElementById('mediaModal').addEventListener('click', function(event) {
                if (event.target === this) {
                    closeModal();
                }
            });

            // Touch/swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            document.querySelector('.carousel-container')?.addEventListener('touchstart', function(event) {
                touchStartX = event.changedTouches[0].screenX;
            });

            document.querySelector('.carousel-container')?.addEventListener('touchend', function(event) {
                touchEndX = event.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
                        updateCarousel();
                    } else {
                        currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
                        updateCarousel();
                    }
                }
            }
        </script>
    </body>
</html>