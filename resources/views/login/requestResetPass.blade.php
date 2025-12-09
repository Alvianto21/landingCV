<x-layouts.app>
	<x-slot:title>{{ $title }}</x-slot:title>

	
	<section class="bg-gray-50 dark:bg-gray-900">
		<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
			<div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
				<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
					<!-- Session status -->
					<x-auth-session-status class="mb-4" :status="session('status')" />
					<h2 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
						{{ $title }}
					</h2>
					<p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
					<form class="space-y-4 md:space-y-6" action="{{ route("password.email") }}" method="post">
						@csrf
						<div>
							<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
							<input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required autocomplete="email">
							<x-input-error :messages="$errors->get('email')" class="mt-2" />
						</div>
						<button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" id="submit">Email Password Reset Link</button>
						<button disabled type="button" id="loader" style="display:none;" disabled class="w-full cursor-not-allowed text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
						Loading...
					</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	@push('scripts')
		<script>
			// disable submit button on click
			function buttonDisable() {
				const btn_origin = document.getElementById('submit');
				const btn_target = document.getElementById('loader');
				
				btn_origin.style.display = 'none';
				btn_origin.disabled = true;
				btn_target.style.display = 'block';
			}

			document.querySelector('form').addEventListener('submit', buttonDisable);
		</script>
	@endpush

</x-layouts.app>