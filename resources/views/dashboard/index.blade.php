<x-layouts.app>
	<x-slot:title>{{ $title }}</x-slot:title>
	<section class="bg-white dark:bg-gray-900">
		<div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
			<div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
				<h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Welcome back</h2>
				<p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Have a nice day, {{ $user->name }}</p>
			</div> 

			<div class="my-3">
				<x-alerts.verify></x-alerts.verify>
				<x-alerts.appearance></x-alerts.appearance>
			</div>

			<div class="bg-neutral-primary-soft block max-w-screen-md items-center p-6 border border-default rounded-base shadow-xs">
				<img class="rounded-base block mx-auto mb-2 text-sm font-medium text-gray-900 dark:text-white" src="{{ asset('storage/'. $user->profile_picture) }}" alt="{{ $user->username }}" width="300">
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Name: <span class="text-body">{{ $user->name }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Username: <span class="text-body">{{ $user->username }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Email: <span class="text-body">{{ $user->email }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Gender: <span class="text-body">{{ $user->gender }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Phone: <span class="text-body">{{ $user->phone_number }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Place of birth: <span class="text-body">{{ $user->place_of_birth }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Date of birth: <span class="text-body">{{ Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y') }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Address: <span class="text-body">{{ $user->address }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Bio: <span class="text-body">{{ $user->bio }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Skills: <span class="text-body">{{ $user->skills }}</span></p>
				<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Educations:</p>
				<div class="grid auto-cols-auto">
					@foreach (json_decode($user->educations, true) as $education)
					<div class="text-center mb-4">
						<p class="mt-6 mb-2 text-xl font-normal tracking-tight text-heading">{{ $education['institution'] }}</span></p>
						<p class="mb-4 text-body">From {{ Carbon\Carbon::parse($education['start_date'])->format('d-m-Y') }} to {{ Carbon\Carbon::parse($education['end_date'])->format('d-m-Y') }}</p>
						@if (!empty($education['link']))
							<a href="{{ $education['link'] }}" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium rounded-base text-sm px-4 py-2.5 focus:outline-none">
								Read more
							</a>
						@endif					
					</div>
					@endforeach
					<p class="mt-6 mb-2 text-2xl font-normal tracking-tight text-heading">Work Experiences:</p>
					@foreach (json_decode($user->work_experiences, true) as $work)
						<div class="text-center mb-3">
							<p class="mt-6 mb-2 text-xl font-medium tracking-tight text-heading">{{ $work['position'] }}</p>
							<p class="mt-4 mb-2  text-xl font-normal tracking-tight text-heading">{{ $work['company'] }}</p>
							<p class="mt-4 mb-2  text-base font-normal tracking-tight text-heading">{{ $work['description'] }}</p>
							<p class="text-body">From {{ Carbon\Carbon::parse($work['start_date'])->format('d-m-Y') }} to {{ Carbon\Carbon::parse($work['end_date'])->format('d-m-Y') }}</p>
						</div>
					@endforeach
				</div>
				<ul class="flex space-x-4 sm:mt-0 mb-4">
					@foreach (json_decode($user->social_links, true) as $link)
						@if ($link['platform'] == 'x')
							<li>
								<a href="{{ $link['link'] }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
									<svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/></svg>
								</a>
							</li>							
						@elseif ($link['platform'] == 'github')
							<li>
								<a href="{{ $link['link'] }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
									<svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.006 2a9.847 9.847 0 0 0-6.484 2.44 10.32 10.32 0 0 0-3.393 6.17 10.48 10.48 0 0 0 1.317 6.955 10.045 10.045 0 0 0 5.4 4.418c.504.095.683-.223.683-.494 0-.245-.01-1.052-.014-1.908-2.78.62-3.366-1.21-3.366-1.21a2.711 2.711 0 0 0-1.11-1.5c-.907-.637.07-.621.07-.621.317.044.62.163.885.346.266.183.487.426.647.71.135.253.318.476.538.655a2.079 2.079 0 0 0 2.37.196c.045-.52.27-1.006.635-1.37-2.219-.259-4.554-1.138-4.554-5.07a4.022 4.022 0 0 1 1.031-2.75 3.77 3.77 0 0 1 .096-2.713s.839-.275 2.749 1.05a9.26 9.26 0 0 1 5.004 0c1.906-1.325 2.74-1.05 2.74-1.05.37.858.406 1.828.101 2.713a4.017 4.017 0 0 1 1.029 2.75c0 3.939-2.339 4.805-4.564 5.058a2.471 2.471 0 0 1 .679 1.897c0 1.372-.012 2.477-.012 2.814 0 .272.18.592.687.492a10.05 10.05 0 0 0 5.388-4.421 10.473 10.473 0 0 0 1.313-6.948 10.32 10.32 0 0 0-3.39-6.165A9.847 9.847 0 0 0 12.007 2Z" clip-rule="evenodd"/></svg>
								</a>
							</li>
						@elseif ($link['platform'] == 'linkedin')
							<li>
								<a href="{{ $link['link'] }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
									<svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/><path d="M7.2 8.809H4V19.5h3.2V8.809Z"/></svg>
								</a>
							</li>
						@endif
					@endforeach
                </ul>
				<a href="{{ route('profile.edit') }}" class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
					Edit account
				</a>
				<a href="{{ route('appearance.edit', ['user' => $user->username]) }}" class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
					Edit profile
				</a>
			</div>
		</div>
	</section>
</x-layouts.app>