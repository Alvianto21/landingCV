<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Landing CV">
    <meta name="author" content="Vonsensius Alvianto">

    <!-- Tailwind css -->
    @vite('resources/css/app.css', 'resources/js/app.js')

    <title>{{ $title }} | LandingCV</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        <x-header>{{ $title }}</x-header>
    </div>
    
    <!-- Main content -->
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Flowbite js -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>