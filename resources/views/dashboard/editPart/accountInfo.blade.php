<section class="bg-white dark:bg-gray-900">
	<div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
		<div class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
			<h2 class="mb-4 text-xl text-center text-capitalize font-bold text-gray-900 dark:text-white">Update profile</h2>
			<p class="mb-8 lg:mb-16 text-base font-normal text-gray-500 dark:text-gray-400 sm:text-xl">Update your account information and email address.</p>
			<form action="{{ route('verification.send') }}" method="post" id="send_verify">
				@csrf
			</form>
			<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('patch')
				<div class="grid grid-cols-4 gap-4 sm:grid-cols-2 sm:gap-6">
					<!-- Account Info -->
					<div>
						<x-edit-forms.input-form id="name" name="name" type="text" placehold="Karina Kurniwati" value="name"
							default="{{ $user->name }}" error="name" required autocomplete="name">Your
							Name</x-edit-forms.input-form>
					</div>
					<div>
						<x-edit-forms.input-form id="email" name="email" type="email" placehold="name@company.com"
						value="email" default="{{ $user->email }}" error="email" required autocomplete="email">Your email</x-edit-forms.input-form>
						@if (! $user->hasVerifiedEmail())
							<p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
								Your email address is unverified.								
								<button form="send_verify" id="verify" class="underline text-sm text-yellow-600 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-yellow-800">Click here to re-send the verification email.</button>
								</p>
							@endif
					</div>
					<div>
						<x-edit-forms.input-form id="username" name="username" type="text" placehold="katarina12"
							value="username" default="{{ $user->username }}" error="username" required
							autocomplete="username">Username</x-edit-forms.input-form>
					</div>
					<div>
						<x-edit-forms.input-image-form id="profile_picture" name="profile_picture" value="profile_picture" default="{{ $user->profile_picture }}" alter="{{ $user->username }}" error="profile_picture" onchange="imgPreview()">Profile Picture</x-edit-forms.input-image-form>
					</div>
				</div>
				<button type="submit"
					class="text-white my-4 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
					Update profile
				</button>
				<p class="text-md text-green-600 dark:text-green-400 space-y-1" id="account" style="display: none;">Change saved</p>
			</form>
		</div>
	</div>
</section>