<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portfolio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Typing Animation Styles -->
        <style>
            .typing-cursor::after {
                content: '|';
                animation: blink 1s infinite;
                color: #4f46e5; /* Indigo color */
            }
            
            @keyframes blink {
                0%, 50% { opacity: 1; }
                51%, 100% { opacity: 0; }
            }
            
            .typing-text {
                overflow: hidden;
                white-space: nowrap;
                border-right: 2px solid #4f46e5;
                animation: typing-complete 0.5s steps(1) forwards;
                animation-delay: var(--typing-duration);
            }
            
            @keyframes typing-complete {
                to {
                    border-right: none;
                }
            }
            
            /* Fade-in animation for description */
            .fade-in {
                opacity: 0;
                transition: opacity 0.8s ease-in-out;
            }
            
            .fade-in.show {
                opacity: 1;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col bg-gray-100">
            <!-- Navigation Bar - Added sticky positioning -->
            <nav class="bg-white shadow-md sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="#top" id="logo-link" class="scroll-link text-xl font-bold text-gray-800">Portfolio</a>
                            </div>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
                            <a href="#about" class="scroll-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">About</a>
                            
                            <a href="#projects" class="scroll-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Projects</a>
                            
                            <a href="#contact" class="scroll-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Contact</a>
                            
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Log in</a>
                                @endauth
                            @endif
                        </div>
                        
                        <!-- Mobile menu button -->
                        <div class="flex items-center sm:hidden">
                            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Add an ID for the top of the page -->
            <div id="top"></div>

            <!-- Content -->
            <div class="py-6 flex-grow">  <!-- Changed py-12 to py-6 to reduce padding -->
                <!-- Hero Section -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:flex lg:items-center lg:justify-between">
                        <!-- Big Picture Placeholder - Adjusted size -->
                        <div class="lg:w-2/5">  <!-- Changed from lg:w-1/2 to lg:w-2/5 to make it smaller -->
                            <div class="rounded-lg overflow-hidden shadow-xl">
                                <img 
                                    src="{{ $hero && $hero->image ? asset('storage/' . $hero->image) : asset('storage/images/placeholder.png') }}"
                                    alt="Portfolio Hero Image" 
                                    class="w-full h-auto object-cover" 
                                    style="min-height: 350px;" 
                                >
                            </div>
                        </div>
                        
                        <!-- Text Content - Adjusted to balance the smaller image -->
                        <div class="mt-8 lg:mt-0 lg:ml-8 lg:w-3/5">  <!-- Changed from lg:w-1/2 to lg:w-3/5 -->
                            <h1 id="typing-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl typing-cursor" data-text="{{ $hero ? $hero->title : 'Welcome to My Portfolio' }}">
                            </h1>
                            <p id="typing-description" class="mt-4 text-lg text-gray-500 fade-in" data-text="{{ $hero ? $hero->description : 'Passionate developer creating elegant solutions to complex problems.' }}">
                                {{ $hero ? $hero->description : 'Passionate developer creating elegant solutions to complex problems.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div id="about" class="py-16 bg-gray-50">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center">
                            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                About Me
                            </h2>
                            <p class="max-w-2xl mx-auto mt-4 text-xl text-gray-500">
                                Passionate developer creating elegant solutions to complex problems.
                            </p>
                        </div>
                        
                        <div class="mt-12">
                            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">My Background</h3>
                                    <div class="mt-3 text-base text-gray-500">
                                        @if($background)
                                            {!! $background->content !!}
                                        @else
                                            <p class="mt-3 text-base text-gray-500">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent varius dolor purus, et eleifend lectus congue id. Quisque eu metus sit amet augue rutrum ullamcorper. Ut vitae odio tincidunt, lobortis est vitae, venenatis odio. Aliquam hendrerit semper est, et luctus eros ornare quis.
                                            </p>
                                            <p class="mt-3 text-base text-gray-500">
                                                Praesent dignissim hendrerit pulvinar. Integer consectetur rutrum tortor, non fermentum metus finibus et. Nullam vitae arcu at orci porta tempus nec a sem. Donec vel justo ut erat malesuada volutpat pellentesque non lectus.
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Skills section -->
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">Skills & Expertise</h3>
                                    <ul class="mt-3 space-y-3">
                                        @forelse($skills as $skill)
                                            <li class="flex items-center">
                                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="ml-2 text-base text-gray-500">{{ $skill->name }}</span>
                                            </li>
                                        @empty
                                            <li class="flex items-center">
                                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="ml-2 text-base text-gray-500">PHP & Laravel Development</span>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Projects Section - Reduce bottom padding/margin even more -->
                <div id="projects" class="py-12 pb-0 bg-gray-50"> <!-- Changed pb-6 to pb-0 -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center">
                            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                My Projects
                            </h2>
                            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                                Check out some of my recent work
                            </p>
                        </div>

                        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                            @forelse($projects as $project)
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="relative pb-2/3">
                                        <div class="h-48 bg-gray-200 rounded-t-lg overflow-hidden">
                                            @if($project->image)
                                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-gray-500">
                                                    No Image
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $project->title }}</h3>
                                        <p class="mt-2 text-base text-gray-500">{{ $project->description }}</p>
                                        <div class="mt-4 flex items-center justify-between">
                                            <div class="text-sm text-gray-500">{{ $project->technologies }}</div>
                                            @if($project->url)
                                                <a href="{{ $project->url }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">View Project</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 text-center py-12">
                                    <p class="text-gray-500">No projects available yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div> <!-- End of main content div -->

            <!-- Footer - Apply negative margin to pull it closer -->
            <footer class="bg-white border-t border-gray-200 pt-0 mt-[-1rem]"> <!-- Changed mt-0 to mt-[-1rem] for negative margin -->
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">  <!-- Changed py-8 to py-4 to reduce vertical padding -->
                    <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                        <!-- Company Info -->
                        <div class="space-y-4 xl:col-span-1">  <!-- Changed space-y-8 to space-y-4 -->
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 tracking-wider uppercase">Portfolio</h3>
                                <p class="mt-2 text-sm text-gray-500">Creating elegant solutions to complex problems.</p>
                            </div>
                            <div class="flex space-x-6">
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Twitter</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">GitHub</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">LinkedIn</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div id="contact" class="mt-8 xl:mt-0 xl:col-span-2">
                            <h3 class="text-sm font-semibold text-gray-500 tracking-wider uppercase">Contact Information</h3>
                            <div class="mt-4 space-y-4">
                                @forelse($contacts as $contact)
                                    <p class="text-base text-gray-500">
                                        <span class="font-medium">{{ $contact->getTypeLabel() }}:</span> {{ $contact->value }}
                                    </p>
                                @empty
                                    <p class="text-base text-gray-500">
                                        <span class="font-medium">Email:</span> contact@example.com
                                    </p>
                                    <p class="text-base text-gray-500">
                                        <span class="font-medium">Phone:</span> +1 (555) 123-4567
                                    </p>
                                    <p class="text-base text-gray-500">
                                        <span class="font-medium">Address:</span> 123 Developer Way, Coding City, 98765
                                    </p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <div class="flex justify-between">
                            <div class="text-sm text-gray-500">
                                &copy; {{ date('Y') }} Portfolio. All rights reserved.
                            </div>
                            <div class="text-sm text-gray-500">
                                Built with Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Update JavaScript for smooth scrolling and typing animation -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Typing Animation for title only
                const typingTitle = document.getElementById('typing-title');
                const typingDescription = document.getElementById('typing-description');
                const titleText = typingTitle.getAttribute('data-text');
                const titleTypingSpeed = 60; // milliseconds per character for title
                
                // Clear initial content for title only
                typingTitle.textContent = '';
                
                let titleIndex = 0;
                let titleComplete = false;
                
                function typeTitle() {
                    if (titleIndex < titleText.length) {
                        typingTitle.textContent += titleText.charAt(titleIndex);
                        titleIndex++;
                        setTimeout(typeTitle, titleTypingSpeed);
                    } else {
                        titleComplete = true;
                        typingTitle.classList.remove('typing-cursor');
                        // Start description fade-in after title is complete
                        setTimeout(() => {
                            typingDescription.classList.add('show');
                        }, 300); // Small delay before starting fade-in
                    }
                }
                
                // Start only the title typing animation initially
                setTimeout(() => {
                    typingTitle.classList.add('typing-cursor');
                    typeTitle();
                }, 500);

                // Get all the scroll links
                const scrollLinks = document.querySelectorAll('.scroll-link');
                const navbarHeight = document.querySelector('nav').offsetHeight;
                
                // Add click event to each link
                scrollLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Get the target section ID
                        const targetId = this.getAttribute('href');
                        const targetSection = document.querySelector(targetId);
                        
                        // Check if the target is #top (special case)
                        if (targetId === '#top') {
                            // Scroll to the very top of the page
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            
                            // Update URL hash without jumping
                            history.pushState(null, null, targetId);
                            return;
                        }
                        
                        // Check if the target section exists
                        if (targetSection) {
                            // Scroll smoothly to the section, accounting for sticky navbar
                            window.scrollTo({
                                top: targetSection.offsetTop - navbarHeight, // Dynamic offset based on navbar height
                                behavior: 'smooth'
                            });
                            
                            // Update URL hash without jumping
                            history.pushState(null, null, targetId);
                        }
                    });
                });
                
                // Check if there's a hash in the URL on page load
                if (window.location.hash) {
                    // If hash is #top, scroll to top
                    if (window.location.hash === '#top') {
                        setTimeout(() => {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }, 300);
                    } else {
                        const targetSection = document.querySelector(window.location.hash);
                        if (targetSection) {
                            // Delay to ensure page is fully loaded
                            setTimeout(() => {
                                window.scrollTo({
                                    top: targetSection.offsetTop - navbarHeight,
                                    behavior: 'smooth'
                                });
                            }, 300);
                        }
                    }
                }
            });
        </script>
    </body>
</html>