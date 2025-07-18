<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('welcome') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                Preview Portfolio
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}
            
            <!-- Portfolio Content -->
            <!-- Hero Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-lg font-medium text-gray-900">Hero Section</h3>
                        <a href="{{ route('hero.edit') }}" class="px-2 py-1 text-xs font-medium text-indigo-700 hover:text-indigo-500 rounded border border-indigo-300 hover:border-indigo-500 transition-colors">
                            Edit
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <div class="h-48 bg-gray-200 rounded-md flex items-center justify-center text-gray-500 overflow-hidden">
                                @if($hero && $hero->image)
                                    <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}" class="w-full h-full object-cover">
                                @else
                                    Hero Image
                                @endif
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <h4 class="text-xl font-bold text-gray-800">
                                {{ $hero ? $hero->title : 'Welcome to My Portfolio' }}
                            </h4>
                            <p class="mt-2 text-gray-600">
                                {{ $hero ? $hero->description : 'Passionate developer creating elegant solutions to complex problems.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div id="about" class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
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
                                <!-- Added edit button to My Background section -->
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-lg font-medium text-gray-900">My Background</h3>
                                    <a href="{{ route('background.edit') }}" class="px-2 py-1 text-xs font-medium text-indigo-700 hover:text-indigo-500 rounded border border-indigo-300 hover:border-indigo-500 transition-colors">
                                        Edit
                                    </a>
                                </div>
                                <div class="mt-3 text-base text-gray-500">
                                    @if($background)
                                        {!! $background->content !!}
                                    @else
                                        <p>No background information available. <a href="{{ route('background.edit') }}" class="text-indigo-600 hover:text-indigo-900">Add background information</a></p>
                                    @endif
                                </div>
                            </div>
                            
                            <div>
                                <!-- Skills section -->
                                <div>
                                    <!-- Skills header with Add button -->
                                    <div class="flex justify-between items-center mb-3">
                                        <h3 class="text-lg font-medium text-gray-900">Skills & Expertise</h3>
                                        <a href="{{ route('skills.create') }}" class="px-2 py-1 text-xs font-medium text-indigo-700 hover:text-indigo-500 rounded border border-indigo-300 hover:border-indigo-500 transition-colors">
                                            Add Skill
                                        </a>
                                    </div>
                                    
                                    <ul class="mt-3 space-y-3">
                                        @forelse($skills as $skill)
                                            <li class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ml-2 text-base text-gray-500">{{ $skill->name }}</span>
                                                </div>
                                                
                                                <div class="flex space-x-1">
                                                    <a href="{{ route('skills.edit', $skill) }}" class="px-1.5 py-0.5 text-xs font-medium text-indigo-700 hover:text-indigo-500 rounded border border-indigo-300 hover:border-indigo-500 transition-colors">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('skills.toggle', $skill) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="px-1.5 py-0.5 text-xs font-medium {{ $skill->is_visible ? 'text-yellow-700 hover:text-yellow-500 border-yellow-300 hover:border-yellow-500' : 'text-green-700 hover:text-green-500 border-green-300 hover:border-green-500' }} rounded border transition-colors">
                                                            {{ $skill->is_visible ? 'Hide' : 'Show' }}
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-1.5 py-0.5 text-xs font-medium text-red-700 hover:text-red-500 rounded border border-red-300 hover:border-red-500 transition-colors">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="text-center py-4 text-gray-500">No skills added yet.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Section -->
            <div id="projects" class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-3xl font-extrabold text-gray-900">Projects</h2>
                            <p class="mt-2 text-lg text-gray-500">Manage your portfolio projects</p>
                        </div>
                        <div>
                            <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Add New Project
                            </a>
                        </div>
                    </div>

                    {{-- @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif --}}
                    
                    @if(session('success'))
                        <div id="notification" class="fixed top-4 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md z-50 transform transition-all duration-500 translate-x-0 opacity-100" role="alert">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm">{{ session('success') }}</p>
                                </div>
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button onclick="closeNotification()" class="inline-flex text-green-500 hover:text-green-600 focus:outline-none">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Auto-dismiss after 5 seconds
                            setTimeout(function() {
                                closeNotification();
                            }, 5000);

                            function closeNotification() {
                                const notification = document.getElementById('notification');
                                notification.classList.remove('translate-x-0', 'opacity-100');
                                notification.classList.add('translate-x-full', 'opacity-0');
                                
                                // Remove from DOM after animation completes
                                setTimeout(function() {
                                    notification.remove();
                                }, 500);
                            }
                        </script>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($projects as $project)
                            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                                <div class="p-6">
                                    <!-- Admin Buttons Row -->
                                    <div class="flex justify-end space-x-2 mb-3">
                                        <a href="{{ route('projects.edit', $project) }}" class="px-2 py-1 text-xs font-medium text-indigo-700 hover:text-indigo-500 rounded border border-indigo-300 hover:border-indigo-500 transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('projects.toggle', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="px-2 py-1 text-xs font-medium {{ $project->is_visible ? 'text-yellow-700 hover:text-yellow-500 border-yellow-300 hover:border-yellow-500' : 'text-green-700 hover:text-green-500 border-green-300 hover:border-green-500' }} rounded border transition-colors">
                                                {{ $project->is_visible ? 'Hide' : 'Show' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 text-xs font-medium text-red-700 hover:text-red-500 rounded border border-red-300 hover:border-red-500 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <div class="bg-gray-200 h-48 rounded-md mb-4 flex items-center justify-center text-gray-500 overflow-hidden">
                                        @if($project->image)
                                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                                        @else
                                            Project Image
                                        @endif
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900">{{ $project->title }}</h3>
                                    <p class="mt-2 text-sm text-gray-600">{{ $project->description }}</p>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="text-xs text-gray-500">{{ $project->technologies }}</div>
                                        @if($project->url)
                                            <a href="{{ $project->url }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View Details</a>
                                        @else
                                            <span class="text-gray-400 text-sm">No URL</span>
                                        @endif
                                    </div>
                                    
                                    @if(!$project->is_visible)
                                        <div class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Hidden
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-12 bg-gray-50 rounded-lg">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No projects yet</h3>
                                <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
                                <div class="mt-6">
                                    <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Add Project
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div id="contact" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                            Contact Information
                        </h2>
                        <a href="{{ route('contacts.create') }}" class="px-2 py-1 text-xs font-medium text-indigo-700 hover:text-indigo-500 rounded border border-indigo-300 hover:border-indigo-500 transition-colors">
                            Add Contact
                        </a>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($contacts as $contact)
                            <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                                <div>
                                    <span class="font-medium">{{ $contact->getTypeLabel() }}:</span>
                                    <span class="text-base text-gray-500">{{ $contact->value }}</span>
                                    @if(!$contact->is_visible)
                                        <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Hidden</span>
                                    @endif
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('contacts.edit', $contact) }}" class="px-2 py-1 text-xs font-medium text-indigo-700 hover:text-indigo-500 rounded border border-indigo-300 hover:border-indigo-500 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('contacts.toggle', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-2 py-1 text-xs font-medium {{ $contact->is_visible ? 'text-yellow-700 hover:text-yellow-500 border-yellow-300 hover:border-yellow-500' : 'text-green-700 hover:text-green-500 border-green-300 hover:border-green-500' }} rounded border transition-colors">
                                            {{ $contact->is_visible ? 'Hide' : 'Show' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this contact information?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 text-xs font-medium text-red-700 hover:text-red-500 rounded border border-red-300 hover:border-red-500 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">No contact information added yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>