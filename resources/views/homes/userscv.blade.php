<x-layouts.landing>
	<x-slot:title>{{ $title }}</x-slot:title>

    <!-- Profile -->
	<section class="bg-gray-200 dark:bg-gray-700">
		<div class="py-8 px-4 mx-auto max-w-screen-xl text-center justify-items-center lg:py-16">
			<img src="{{ asset('storage/' . $user->photo_profile) }}" alt="{{ $user->username }}" width="300" class="rounded-circle">
			<h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl dark:text-white">{{ $user->name }}</h1>
			<p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">{{ $user->place_of_birth }}, {{ Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y') }}</p>
		</div>
	</section>

    <!-- About -->
	<section class="bg-white dark:bg-gray-900">
        <div class="py-8 mx-auto max-w-screen-xl p-8 md:p-12 justify-items-center lg:py-16">
            <div class="max-w-screen-lg text-gray-500 text-center sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">About</h2>
                <p class="mb-4 font-medium">{{ $user->bio }}</p>
                <p class="mb-4 font-medium">My skills is {{ $user->skills }}</p>
            </div>
        </div>
	</section>

    <!-- Work Experiences -->
    <section class="bg-gray-50 dark:bg-gray-800 border text-center border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12" id="experiences">
        <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Work Experiences</h2>
        @foreach ($works as $work)
            <h3 class="text-gray-900 dark:text-white text-3xl font-medium mb-3">{{ $work['position'] }}</h3>
            <p class="text-lg font-medium text-gray-500 dark:text-gray-400 mb-4">{{ $work['company'] }}</p>
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">{{ $work['description'] }}</p>                
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">{{ Carbon\Carbon::parse($work['start_date'])->format('d-m-Y') }} to {{ Carbon\Carbon::parse($work['end_date'])->format('d-m-Y') }}</p>                
        @endforeach
    </section>

    <!-- Educations -->
    <section class="bg-white dark:bg-gray-900">
    <div class="py-8 mx-auto max-w-screen-xl text-center justify-items-center lg:py-16" id="educations">
        <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">Educations</h2>
            @foreach ($educations as $education)
                <p class="mb-4 font-medium">{{ $education['institution'] }}</p>
                <p class="mb-4 font-light">{{ Carbon\Carbon::parse($education['start_date'])->format('d-m-y') }} to {{ Carbon\Carbon::parse($education['end_date'])->format('d-m-Y') }}</p>
                @if (!empty($education['link']))
                    <a href="{{ $education['link'] }}" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-700 mb-4">
                        Learn more
                    </a>                                  
                @endif
            @endforeach
        </div>
    </div>
    </section>

    <!-- Social links -->
    <section class="bg-gray-50 dark:bg-gray-800 border justify-items-center text-center border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12" id="socials">
        <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Social Links</h2>
        <div class="w-48 text-sm flex justify-center-safe font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @foreach ($links as $link)
                @if ($link['platform'] == 'x')
                    <a href="{{ $link['url'] }}" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                        </svg>
                    </a>                  
                @elseif ($link['platform'] == 'linkedin')
                    <a href="{{ $link['url'] }}" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                            <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                        </svg>
                    </a>                   
                @elseif ($link['platform'] == 'github')
                    <a href="{{ $link['url'] }}" class="block w-full px-4 py-2 rounded-b-lg cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.006 2a9.847 9.847 0 0 0-6.484 2.44 10.32 10.32 0 0 0-3.393 6.17 10.48 10.48 0 0 0 1.317 6.955 10.045 10.045 0 0 0 5.4 4.418c.504.095.683-.223.683-.494 0-.245-.01-1.052-.014-1.908-2.78.62-3.366-1.21-3.366-1.21a2.711 2.711 0 0 0-1.11-1.5c-.907-.637.07-.621.07-.621.317.044.62.163.885.346.266.183.487.426.647.71.135.253.318.476.538.655a2.079 2.079 0 0 0 2.37.196c.045-.52.27-1.006.635-1.37-2.219-.259-4.554-1.138-4.554-5.07a4.022 4.022 0 0 1 1.031-2.75 3.77 3.77 0 0 1 .096-2.713s.839-.275 2.749 1.05a9.26 9.26 0 0 1 5.004 0c1.906-1.325 2.74-1.05 2.74-1.05.37.858.406 1.828.101 2.713a4.017 4.017 0 0 1 1.029 2.75c0 3.939-2.339 4.805-4.564 5.058a2.471 2.471 0 0 1 .679 1.897c0 1.372-.012 2.477-.012 2.814 0 .272.18.592.687.492a10.05 10.05 0 0 0 5.388-4.421 10.473 10.473 0 0 0 1.313-6.948 10.32 10.32 0 0 0-3.39-6.165A9.847 9.847 0 0 0 12.007 2Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                @endif
            @endforeach
        </div>
    </section>

</x-layouts.landing>