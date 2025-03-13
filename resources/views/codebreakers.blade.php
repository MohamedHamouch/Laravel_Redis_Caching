<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Breakers Team</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .card-image-container {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
        }
        
        .card-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .role-badge {
            display: block;
            width: fit-content;
            margin: 0 auto;
            font-size: 1rem; /* Slightly bigger than default */
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen pt-3 px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Code Breakers</h1>
                <p class="mt-2 text-lg text-gray-600">Meet our amazing team members</p>
            </div>
            <a href="{{ route('cb.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Add New Member
            </a>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-6">
            @foreach ($users as $user)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-108">
                    <!-- Image Container with fixed ratio -->
                    <div class="card-image-container">
                        <img src="{{ Storage::url($user->image) }}" 
                             alt="{{ $user->name }}"
                             class="card-image">
                    </div>
                    <!-- Content Container -->
                    <div class="p-5 text-center"> <!-- Added text-center here -->
                        <h2 class="text-lg font-bold text-gray-900 mb-3">{{ $user->name }}</h2>
                        <div class="role-badge px-3 py-1.5 rounded-3xl font-semibold
                                  bg-gradient-to-r from-indigo-500 to-purple-600 text-white
                                  shadow-sm">
                            {{ $user->role }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($users->isEmpty())
            <div class="text-center py-12 bg-white rounded-lg shadow-md">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No team members</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by adding a new team member.</p>
            </div>
        @endif
    </div>
</body>
</html>