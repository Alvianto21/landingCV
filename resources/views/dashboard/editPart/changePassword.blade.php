<section class="bg-white dark:bg-gray-900">
	<div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
		<div class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
			<h2 class="mb-4 text-xl text-center text-capitalize font-bold text-gray-900 dark:text-white">Change Password</h2>
			<p class="mb-8 lg:mb-16 font-normal text-base text-gray-500 dark:text-gray-400 sm:text-xl">Ensure your account is using a long, random password to stay secure.</p>
			<form action="{{ route('password.update') }}" method="post" id="changePassword">
				@csrf
				@method('put')
				<div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
					<div class="sm:col-span-2">
						<x-forms.input-form id="current_password" name="current_password" type="password" placehold="••••••••" value="" error="current_password" autocomplete="current_password">Current password</x-forms.input-form>
					</div>
					<div class="sm:col-span-2">
						<x-forms.input-form id="update_password" name="password" type="password" placehold="••••••••" error="password" value="" error="password" autocomplete="new-password">New password</x-forms.input-form>
					</div>
					<div class="sm:col-span-2">
						<x-forms.input-form id="update_password_confirmation" name="password_confirmation" type="password" placehold="••••••••" value="" error="password_confirmation" autocomplete="new-password">Confirm password</x-forms.input-form>
					</div>
				</div>
				<button type="submit" id="passwordChange" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
					Save password
				</button>
				<p class="text-md text-green-600 dark:text-green-400 space-y-1" id="passwordUpdate" style="display: none;">Change saved</p>
			</form>
		</div>
	</div>
</section>