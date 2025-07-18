@extends('layouts.main')

@section('title', 'Sample Projects - Portfolio')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Sample Projects</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Project 1 -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <div class="bg-gray-200 h-48 rounded-md mb-4 flex items-center justify-center text-gray-500">Project Image</div>
                <h3 class="text-lg font-medium text-gray-900">Project Title 1</h3>
                <p class="mt-2 text-sm text-gray-600">A brief description of the project and what technologies were used.</p>
                <div class="mt-4 flex items-center justify-between">
                    <div class="text-xs text-gray-500">PHP, Laravel, MySQL</div>
                    <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View Details</a>
                </div>
            </div>
        </div>

        <!-- Project 2 -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <div class="bg-gray-200 h-48 rounded-md mb-4 flex items-center justify-center text-gray-500">Project Image</div>
                <h3 class="text-lg font-medium text-gray-900">Project Title 2</h3>
                <p class="mt-2 text-sm text-gray-600">A brief description of the project and what technologies were used.</p>
                <div class="mt-4 flex items-center justify-between">
                    <div class="text-xs text-gray-500">React, Node.js, MongoDB</div>
                    <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View Details</a>
                </div>
            </div>
        </div>

        <!-- Project 3 -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <div class="bg-gray-200 h-48 rounded-md mb-4 flex items-center justify-center text-gray-500">Project Image</div>
                <h3 class="text-lg font-medium text-gray-900">Project Title 3</h3>
                <p class="mt-2 text-sm text-gray-600">A brief description of the project and what technologies were used.</p>
                <div class="mt-4 flex items-center justify-between">
                    <div class="text-xs text-gray-500">Vue.js, Firebase</div>
                    <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection