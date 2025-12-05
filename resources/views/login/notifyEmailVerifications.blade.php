<x-layouts.app>
	<x-slot:title>{{ $title }}</x-slot:title>

	<section class="bg-gray-50 dark:bg-gray-900">
	<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
		<x-alerts.notify></x-alerts.notify>
		<div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
					{{ $title }}
				</h1>
				<p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Thanks for signing up and using our website! Befoure you continue, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
				<div class="flex items-center justify-between">
					<form class="space-y-4 md:space-y-6" action="{{ route('verification.send') }}" method="post" id="renotif">
						@csrf
						<button type="submit" id="sender" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Resend verification email</button>
						<button disabled type="button" id="loaderEmail" style="display:none;" disabled class="w-full cursor-not-allowed text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
						Loading...
					</button>
					</form>
	
					<form class="space-y-4 md:space-y-6" action="{{ route('logout') }}" method="post" id="goOut">
						@csrf
						<button type="submit" id="authOut" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Log out</button>
						<button disabled type="button" id="loaderOut" style="display:none;" disabled class="w-full cursor-not-allowed text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
						Loading...
					</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</section>

	@push('scripts')
		<!-- Addisional js -->
		<script>
			// disable submit button on click
			function buttonDisable() {
				const btn_origin = document.getElementById('sender');
				const btn_target1 = document.getElementById('loaderEmail');
				const btn_sekunder = document.getElementById('authOut');
				const btn_target2 = document.getElementById('loaderOut');
				
				btn_origin.style.display = 'none';
				btn_sekunder.style.display = 'none';
				btn_origin.disabled = true;
				btn_sekunder.disabled = true;
				btn_target1.style.display = 'block';
				btn_target2.style.display = 'block';
			}

			document.querySelector('#renotif').addEventListener('submit', buttonDisable);
			document.querySelector('#goOut').addEventListener('submit', buttonDisable);
		</script>
	@endpush
</x-layouts.app>