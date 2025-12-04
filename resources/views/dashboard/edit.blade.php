<x-layouts.app>
	<x-slot:title>{{ $title }}</x-slot:title>

	<!-- Account Information -->
	@include('dashboard.editPart.accountInfo')
	
	<!-- Change password -->
	@include('dashboard.editPart.changePassword')

	<!-- Delete account -->
	@include('dashboard.editPart.deleteAccount')

	@push('scripts')
	<!-- Addisional js -->
	<script>
		let accountInfo = @json(session('status') === 'profile-updated');
		let passUpdate = @json(session('status') === 'password-updated')
		
		// If account info successfuly updated, display session message for 5 seconds
		if (accountInfo) {
			document.getElementById('account').style.display = 'inline';
			
			setTimeout(function() {
				document.getElementById('account').style.display = 'none';
			}, 5000);
		}

		// if password successfuly updated, display session message for 5 seconds
		if (passUpdate) {
			document.getElementById('passwordUpdate').style.display = 'inline';

			setTimeout(function () {
				document.getElementById('passwordUpdate').style.display = 'none';
			}, 5000);
		}

		// If user send email verifications, disable all buttons
		document.querySelector('#send_verify').addEventListener("submit", function () {
			const btns = document.querySelectorAll('button');
			btns.forEach(function(btn) {
				btn.disabled = true;
				btn.classList.add("cursor-not-allowed");				
			});
		});

		// If user confirm delete their account, disable all buttons
		document.querySelector('#deleteAccount').addEventListener('submit', function () {
			const btns = document.querySelectorAll('button');
			btns.forEach(function(btn) {
				btn.disabled = true;
				btn.classList.add("cursor-not-allowed");				
			});
		});
	</script>
	@endpush
</x-layouts.app>