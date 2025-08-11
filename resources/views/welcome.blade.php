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
        
        <!-- Custom Styles with Color Palette -->
        <style>
            :root {
                --color-primary: #181C14;     /* Dark charcoal */
                --color-secondary: #3C3D37;   /* Dark olive */
                --color-tertiary: #697565;    /* Sage green */
                --color-accent: #ECDFCC;      /* Cream beige */
            }

            /* Enhanced typing cursor animation */
            .typing-cursor::after {
                content: '|';
                animation: blink 1s infinite;
                color: var(--color-accent);
            }
            
            @keyframes blink {
                0%, 50% { opacity: 1; }
                51%, 100% { opacity: 0; }
            }
            
            .typing-text {
                overflow: hidden;
                white-space: nowrap;
                border-right: 2px solid var(--color-accent);
                animation: typing-complete 0.5s steps(1) forwards;
                animation-delay: var(--typing-duration);
            }
            
            @keyframes typing-complete {
                to {
                    border-right: none;
                }
            }
            
            /* Enhanced fade-in animations */
            .fade-in {
                opacity: 0;
                transition: opacity 0.8s ease-in-out;
            }
            
            .fade-in.show {
                opacity: 1;
            }

            /* Slide-in animations */
            .slide-in-left {
                transform: translateX(-50px);
                opacity: 0;
                transition: all 0.8s ease-out;
            }

            .slide-in-right {
                transform: translateX(50px);
                opacity: 0;
                transition: all 0.8s ease-out;
            }

            .slide-in-bottom {
                transform: translateY(50px);
                opacity: 0;
                transition: all 0.8s ease-out;
            }

            .slide-in-top {
                transform: translateY(-50px);
                opacity: 0;
                transition: all 0.8s ease-out;
            }

            .slide-in-left.animate,
            .slide-in-right.animate,
            .slide-in-bottom.animate,
            .slide-in-top.animate {
                transform: translate(0);
                opacity: 1;
            }

            /* Floating animation for hero image */
            .float-animation {
                animation: float 6s ease-in-out infinite;
            }

            @keyframes float {
                0%, 100% {
                    transform: translateY(0px);
                }
                50% {
                    transform: translateY(-20px);
                }
            }

            /* Pulse animation for skills dots */
            .pulse-dot {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0%, 100% {
                    transform: scale(1);
                    opacity: 1;
                }
                50% {
                    transform: scale(1.2);
                    opacity: 0.7;
                }
            }

            /* Gradient background animation */
            .animated-gradient {
                background: linear-gradient(-45deg, var(--color-primary), var(--color-secondary), var(--color-primary), var(--color-tertiary));
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
            }

            @keyframes gradientShift {
                0%, 100% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
            }

            /* Stagger animation for cards */
            .stagger-animation {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease-out;
            }

            .stagger-animation.animate {
                opacity: 1;
                transform: translateY(0);
            }

            /* Enhanced hover effects */
            .hover-lift {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .hover-lift:hover {
                transform: translateY(-8px);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }

            /* Navigation entrance animation */
            .nav-entrance {
                transform: translateY(-100%);
                animation: slideDownNav 0.8s ease-out forwards;
            }

            @keyframes slideDownNav {
                to {
                    transform: translateY(0);
                }
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

            /* Enhanced hover effects */
            .hover-primary:hover { background-color: var(--color-primary); }
            .hover-secondary:hover { background-color: var(--color-secondary); }
            .hover-tertiary:hover { background-color: var(--color-tertiary); }
            .hover-accent:hover { background-color: var(--color-accent); }

            /* Navigation glass effect */
            .nav-glass {
                background: rgba(24, 28, 20, 0.95);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(236, 223, 204, 0.2);
            }

            /* Enhanced gradient backgrounds */
            .hero-gradient {
                background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 50%, var(--color-primary) 100%);
            }

            .section-gradient {
                background: linear-gradient(135deg, var(--color-accent) 0%, rgba(236, 223, 204, 0.7) 100%);
            }

            /* Enhanced card styles */
            .card-glass {
                background: rgba(236, 223, 204, 0.9);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(105, 117, 101, 0.3);
                transition: all 0.3s ease;
            }

            .card-glass:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }

            /* Smooth hover transitions */
            .transition-all {
                transition: all 0.3s ease;
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: var(--color-accent);
            }

            ::-webkit-scrollbar-thumb {
                background: var(--color-tertiary);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: var(--color-secondary);
            }

            /* Page load animation */
            .page-fade-in {
                opacity: 0;
                animation: pageFadeIn 1.5s ease-out forwards;
            }

            @keyframes pageFadeIn {
                to {
                    opacity: 1;
                }
            }
        </style>
    </head>
    <body class="antialiased bg-accent page-fade-in">
        <!-- Navigation Bar -->
        <nav class="nav-glass fixed top-0 left-0 right-0 z-50 nav-entrance">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="#top" id="logo-link" class="scroll-link text-xl font-bold text-accent hover:text-tertiary transition-all duration-300 hover:scale-110">Portfolio</a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
                        <a href="#about" class="scroll-link text-accent hover:text-tertiary px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:scale-105">About</a>
                        
                        <a href="#projects" class="scroll-link text-accent hover:text-tertiary px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:scale-105">Projects</a>
                        
                        <a href="#footer" class="scroll-link text-accent hover:text-tertiary px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:scale-105">Contact</a>
                        
                        {{-- @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="bg-tertiary text-accent hover:bg-secondary px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:scale-105">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="bg-tertiary text-accent hover:bg-secondary px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:scale-105">Log in</a>
                            @endauth
                        @endif --}}
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-accent hover:text-tertiary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-tertiary transition-all duration-300">
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
        <div class="flex-grow">
            <!-- Hero Section - Full screen height -->
            <div class="min-h-screen flex items-center justify-center animated-gradient">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="lg:flex lg:items-center lg:justify-between">
                        <!-- Image Section -->
                        <div class="lg:w-2/5 slide-in-left" id="hero-image">
                            <div class="rounded-lg overflow-hidden shadow-2xl border-4 border-tertiary float-animation">
                                <img 
                                    src="{{ $hero && $hero->image ? asset('storage/' . $hero->image) : asset('storage/images/placeholder.png') }}"
                                    alt="Portfolio Hero Image" 
                                    class="w-full h-auto object-cover transition-transform duration-500 hover:scale-105" 
                                    style="min-height: 350px;" 
                                >
                            </div>
                        </div>
                        
                        <!-- Text Content -->
                        <div class="mt-8 lg:mt-0 lg:ml-8 lg:w-3/5 slide-in-right" id="hero-text">
                            <h1 id="typing-title" class="text-3xl font-extrabold text-accent sm:text-4xl typing-cursor" data-text="{{ $hero ? $hero->title : 'Welcome to My Portfolio' }}">
                            </h1>
                            <p id="typing-description" class="mt-4 text-lg text-accent fade-in opacity-90" data-text="{{ $hero ? $hero->description : 'Passionate developer creating elegant solutions to complex problems.' }}">
                                {{ $hero ? $hero->description : 'Passionate developer creating elegant solutions to complex problems.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Section - Full screen height -->
            <div id="about" class="min-h-screen flex items-center justify-center section-gradient">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="text-center mb-12 slide-in-top" id="about-header">
                        <h2 class="text-3xl font-extrabold tracking-tight text-primary sm:text-4xl">
                            About Me
                        </h2>
                        <p class="max-w-2xl mx-auto mt-4 text-xl text-secondary">
                            Passionate developer creating elegant solutions to complex problems.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        <div class="card-glass rounded-lg p-6 shadow-lg transition-all hover:shadow-xl stagger-animation" id="background-card">
                            <h3 class="text-lg font-medium text-primary mb-4 border-b border-tertiary pb-2">My Background</h3>
                            <div class="text-base text-secondary text-justify leading-relaxed">
                                @if($background)
                                    {!! $background->content !!}
                                @else
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent varius dolor purus, et eleifend lectus congue id. Quisque eu metus sit amet augue rutrum ullamcorper. Ut vitae odio tincidunt, lobortis est vitae, venenatis odio. Aliquam hendrerit semper est, et luctus eros ornare quis.
                                    </p>
                                    <p>
                                        Praesent dignissim hendrerit pulvinar. Integer consectetur rutrum tortor, non fermentum metus finibus et. Nullam vitae arcu at orci porta tempus nec a sem. Donec vel justo ut erat malesuada volutpat pellentesque non lectus.
                                    </p>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Skills section -->
                        <div class="card-glass rounded-lg p-6 shadow-lg transition-all hover:shadow-xl stagger-animation" id="skills-card">
                            <h3 class="text-lg font-medium text-primary mb-4 border-b border-tertiary pb-2">Skills & Expertise</h3>
                            <ul class="space-y-3">
                                @forelse($skills as $skill)
                                    <li class="flex items-center p-2 rounded-md hover:bg-accent transition-all duration-300 hover:scale-105">
                                        <div class="w-3 h-3 bg-tertiary rounded-full mr-3 flex-shrink-0 pulse-dot"></div>
                                        <span class="text-base text-secondary">{{ $skill->name }}</span>
                                    </li>
                                @empty
                                    <li class="flex items-center p-2 rounded-md hover:bg-accent transition-all duration-300 hover:scale-105">
                                        <div class="w-3 h-3 bg-tertiary rounded-full mr-3 flex-shrink-0 pulse-dot"></div>
                                        <span class="text-base text-secondary">PHP & Laravel Development</span>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Section - Full screen height -->
            <div id="projects" class="min-h-screen bg-accent pt-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full">
                    <!-- Header at the top -->
                    <div class="text-center mb-8 slide-in-top" id="projects-header">
                        <h2 class="text-3xl font-extrabold tracking-tight text-primary sm:text-4xl">
                            My Projects
                        </h2>
                        <p class="mt-4 max-w-2xl mx-auto text-xl text-secondary">
                            Check out some of my recent work
                        </p>
                    </div>

                    <!-- Projects Grid - taking remaining space -->
                    <div class="flex-1 flex items-start justify-center">
                        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 w-full" id="projects-grid">
                            @forelse($projects as $project)
                                <div class="bg-white overflow-hidden shadow-xl rounded-lg border border-tertiary hover-lift transition-all duration-500 project-card">
                                    <div class="relative">
                                        <div class="h-48 bg-tertiary bg-opacity-20 rounded-t-lg overflow-hidden">
                                            @if($project->image)
                                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                            @else
                                                <div class="w-full h-full flex flex-col items-center justify-center text-secondary bg-gradient-to-br from-tertiary/20 to-tertiary/10">
                                                    <svg class="w-16 h-16 text-tertiary/60 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="text-sm text-tertiary/80 font-medium">No Image</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold text-primary mb-2">{{ $project->title }}</h3>
                                        <p class="text-base text-secondary mb-4 leading-relaxed">{{ $project->description }}</p>
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm text-secondary bg-accent px-3 py-1 rounded-full border border-tertiary">{{ $project->technologies }}</div>
                                            @if($project->url)
                                                <a href="{{ $project->url }}" target="_blank" class="text-primary hover:text-secondary font-medium text-sm bg-tertiary hover:bg-secondary text-accent px-4 py-2 rounded transition-all duration-300 hover:scale-105">View Project</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 text-center py-12 slide-in-bottom">
                                    <div class="text-tertiary mb-4">
                                        <svg class="w-24 h-24 mx-auto transition-transform duration-300 hover:scale-110" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-secondary text-lg">No projects available yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer" class="bg-primary border-t border-secondary pt-8 slide-in-bottom">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <!-- Company Info -->
                    <div class="space-y-6 xl:col-span-1">
                        <div>
                            <h3 class="text-sm font-semibold text-accent tracking-wider uppercase">Portfolio</h3>
                            <p class="mt-2 text-sm text-tertiary">Creating elegant solutions to complex problems.</p>
                        </div>
                        <div class="flex space-x-6">
                            {{-- <a href="#" class="text-tertiary hover:text-accent transition-all duration-300 p-2 rounded-full hover:bg-secondary hover:scale-110">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0"/>
                                </svg>
                            </a> --}}
                            <a href="https://github.com/ricojr3?tab=overview&from=2025-08-01&to=2025-08-11" target="_blank" class="text-tertiary hover:text-accent transition-all duration-300 p-2 rounded-full hover:bg-secondary hover:scale-110">
                                <span class="sr-only">GitHub</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/rico-jr-ceralbo-601a01350/" target="_blank" class="text-tertiary hover:text-accent transition-all duration-300 p-2 rounded-full hover:bg-secondary hover:scale-110">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="mt-8 xl:mt-0 xl:col-span-2">
                        <h3 class="text-sm font-semibold text-accent tracking-wider uppercase">Contact Information</h3>
                        <div class="mt-4 space-y-4">
                            @forelse($contacts as $contact)
                                <p class="text-base text-tertiary transition-all duration-300 hover:text-accent">
                                    <span class="font-medium text-accent">{{ $contact->getTypeLabel() }}:</span> {{ $contact->value }}
                                </p>
                            @empty
                                <p class="text-base text-tertiary transition-all duration-300 hover:text-accent">
                                    <span class="font-medium text-accent">Email:</span> ceralboricojr@gmail.com
                                </p>
                                <p class="text-base text-tertiary transition-all duration-300 hover:text-accent">
                                    <span class="font-medium text-accent">Phone:</span> 0915-747-1453
                                </p>
                                <p class="text-base text-tertiary transition-all duration-300 hover:text-accent">
                                    <span class="font-medium text-accent">Address:</span> Banisilan, North Cotabato, Philippines
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 border-t border-secondary pt-6">
                    <div class="flex justify-between">
                        <div class="text-sm text-tertiary">
                            &copy; {{ date('Y') }} Ceralbo Rico Jr. All rights reserved.
                        </div>
                        <div class="text-sm text-tertiary">
                            Built with Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JavaScript for smooth scrolling, typing animation, and scroll animations -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize intersection observer for scroll animations
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate');
                        }
                    });
                }, observerOptions);

                // Observe elements for animations
                const animatedElements = document.querySelectorAll('.slide-in-left, .slide-in-right, .slide-in-bottom, .slide-in-top, .stagger-animation');
                animatedElements.forEach(el => observer.observe(el));

                // Stagger animation for project cards
                const projectCards = document.querySelectorAll('.project-card');
                projectCards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.1}s`;
                    observer.observe(card);
                });

                // Trigger hero animations immediately
                setTimeout(() => {
                    document.getElementById('hero-image')?.classList.add('animate');
                }, 300);
                
                setTimeout(() => {
                    document.getElementById('hero-text')?.classList.add('animate');
                }, 600);

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
                }, 1000);

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

                // Parallax effect for hero section
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const heroImage = document.querySelector('.float-animation');
                    if (heroImage) {
                        heroImage.style.transform = `translateY(${scrolled * 0.1}px)`;
                    }
                });
            });
        </script>
    </body>
</html>