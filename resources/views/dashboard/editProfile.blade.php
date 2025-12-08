<x-layouts.app>
	<x-slot:title>{{ $title }}</x-slot:title>

	<section class="bg-white dark:bg-gray-900">
		<div class="flex flex-col justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
			<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ $title }}</h2>
			<div class="overflow-y-scroll">
				<form action="{{ route('appearance.update', ['user' => $user['username']]) }}" class="space-y-4 md:space-y-6" method="post" onsubmit="buttonDisable()">
					@csrf
					@method('put')
					<div class="grid grid-cols-2 gap-3 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
						<div class="sm:col-span-2">
							<label for="bio" class="block mb-2.5 text-sm font-medium text-heading">Biodata</label>
							<textarea name="bio" id="bio" cols="3" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Introduce yourself" required autocomplete="on">{{ old('bio', $user['bio']) }}</textarea>
						</div>
						<div class="sm:col-span-2">
							<x-edit-forms.input-form id="skills" name="skills" type="text" placehold="Branding, art director,....." value="skills" default="{{ $user['skills'] }}" error="skills" required autocomplete="on">Your sills</x-edit-forms.input-form>
						</div>
						<div class="w-4/5">
							<x-edit-forms.input-form id="place_of_birth" name="place_of_birth" type="text" placehold="Surabaya" value="place_of_birth" default="{{ $user['place_of_birth'] }}" error="place_of_birth" required autocomplete="address-level2">PLace of birth</x-edit-forms.input-form>
						</div>
						<div class="w-2/5">
							<x-edit-forms.input-form id="date_of_birth" name="date_of_birth" type="date" placehold="" value="date_of_birth" default="{{ $user['date_of_birth'] }}" error="date_of_birh" required autocomplete="bday">Date of birth</x-edit-forms.input-form>
						</div>
						<div class="w-1/5">
							<x-edit-forms.input-select-form id="gender" name="gender" :options="['male' => 'Male', 'female' => 'Female']" value="gender" default="{{ $user['gender'] }}" error="gender" required>Gender</x-edit-forms.input-select-form>
						</div>
						<div class="w-2/5">
							<x-edit-forms.input-form id="phone_number" name="phone_number" type="tel" placehold="123456789012" value="phone_number" default="{{ $user['phone_number'] }}" error="phone_number" required autocomplete="tel">Phone Number</x-edit-forms.input-form>
						</div>
						<div id="socialLinks" class="w-2/5">
							@foreach (json_decode($user->social_links, true) as $socials)
								<div class="socials mb-3">
									<div>
										<x-edit-forms.input-select-form id="social_links_{{ $loop->index }}_platform" name="social_links[{{ $loop->index }}][platform]" :options="['github' => 'GitHub', 'linkedin' => 'LinkedIn', 'x' => 'X']" value="sosial_links.{{ $loop->index }}.platform" default="{{ $socials['platform'] }}" error="sosial_links.{{ $loop->index }}.platform" required>Sosial Links platform {{ $loop->iteration }}</x-edit-forms.input-select-form>
									</div>
									<div class="mt-3">
										<x-edit-forms.input-form id="social_links_{{ $loop->index }}_link" name="social_links[{{ $loop->index }}][link]" type="link" placehold="http://maryadi.biz.id/" value="social_links.{{ $loop->index }}.link" default="{{ $socials['link'] }}" error="social_links.{{ $loop->index }}.link" required autocomplete="url">Sosial links {{ $loop->iteration }}</x-edit-forms.input-form>
									</div> 
								</div>
							@endforeach
							<div class="flex items-center space-x-4">
								<x-forms.new-input-form id="socialLinksBtn" onclick="socialLinkPlatform()">New social links</x-forms.new-input-form>
								<x-forms.remove-new-input-form id="socialLinksRemoveBtn" onclick="RemoveButtons('socialLinksRemoveBtn', 'socialLinks', '.socials')">Remove sosial Links</x-forms.remove-new-input-form>	
							</div>
						</div>
						<div class="sm:col-span-2">
							<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
							<textarea id="address" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jln. kebangki..." required autocomplete="street-address">{{ old('address', $user['address']) }}</textarea>
						</div>
						<div id="educations" class="w-3/5">
							@foreach (json_decode($user->educations, true) as $educations)
								<div class="educations mb-3">
									<div>
										<x-edit-forms.input-form id="educations_{{ $loop->index }}_institution" name="educations[{{ $loop->index }}][institution]" type="text" placehold="SMAN 70 Surabaya" value="educations.{{ $loop->index }}.institution" default="{{ $educations['institution'] }}" error="educations.{{ $loop->index }}" required autocomplete="on">Institutions of education {{ $loop->iteration }}</x-edit-forms.input-form>
									</div>
									<div class="mt-3">
										<x-edit-forms.input-list-form id="educations_{{ $loop->index }}_degree" name="educations[{{ $loop->index }}][degree]" placehold="bachelor" value="educations.{{ $loop->index }}.degree" default="{{ $educations['degree'] }}" error="educations.{{ $loop->index }}.degree" required autocomplete="on">Academic title {{ $loop->iteration }}</x-edit-forms.input-list-form>
									</div>
									<div class="mt-3">
										<x-edit-forms.input-form id="educations_{{ $loop->index }}_start" name="educations[{{ $loop->index }}][start_date]" type="month" placehold="" value="educations.{{ $loop->index }}.start_date" default="{{ $educations['start_date'] }}" error="educations.{{ $loop->index }}.start_date" required>Educations Start {{ $loop->iteration }}</x-edit-forms.input-form>
									</div>
									<div class="mt-3">
										<x-edit-forms.input-form id="educations_{{ $loop->index }}_end" name="educations[{{ $loop->index }}][end_date]" type="month" placehold="" value="educations.{{ $loop->index }}.end_date" default="{{ $educations['end_date'] }}" error="educations.{{ $loop->index }}.end_date" required>Educations End {{ $loop->iteration }}</x-edit-forms.input-form>
									</div>
									<div class="mt-3">
										<x-edit-forms.input-form id="educations_{{ $loop->index }}_website" name="educations[{{ $loop->index }}][link]" type="link" placehold="http://prakasa.tv/et-fugit-qui-explicabo-maiores-qui-aut-corporis-autem.html" value="educations.{{ $loop->index }}.link" default="{{ $educations['link'] }}" error="educations.{{ $loop->index }}.link" autocomplete="url">Institution website {{ $loop->iteration }}</x-edit-forms.input-form>
									</div>
								</div>
								@endforeach
								<datalist id="degree">
									<option value="none">None</option>
									<option value="bachelor">Bachelor</option>
									<option value="master">Master</option>
									<option value="professor">Professor</option>
							</datalist>
							<div class="flex items-center space-x-4">
								<x-forms.new-input-form id="educationsDataBtn" onclick="educationsData()">New educations</x-forms.new-input-form>
								<x-forms.remove-new-input-form id="educationsRemoveDataBtn" onclick="RemoveButtons('educationsRemoveDataBtn', 'educations', '.educations')">Remove educations</x-forms.remove-new-input-form>
							</div>
						</div>
						<div id="works">
							@foreach (json_decode($user->work_experiences, true) as $works)
								<div class="works mt-3">
									<x-edit-forms.input-form id="works_{{ $loop->index }}_company" name="work_experiences[{{ $loop->index }}][company]" type="text" placehold="company name or workplace" value="work_experiences.{{ $loop->index }}.company" default="{{ $works['company'] }}" error="work_experiences.{{ $loop->index }}.company" required autocomplete="organization">Workplace {{ $loop->iteration }}</x-edit-forms.input-form>
								</div>
								<div class="mt-3">
									<x-edit-forms.input-form id="works_{{ $loop->index }}_position" name="work_experiences[{{ $loop->index }}][position]" type="text" placehold="Senior Accountant" value="work_experiences.{{ $loop->index }}.position" default="{{ $works['position'] }}" error="work_experiences.{{ $loop->index }}.position" required autocomplete="organization-title">Work position {{ $loop->iteration }}</x-edit-forms.input-form>
								</div>
								<div class="mt-3">
									<x-edit-forms.input-form id="works_{{ $loop->index }}_start" name="work_experiences[{{ $loop->index }}][start_date]" type="month" placehold="" value="work_experiences.{{ $loop->index }}.start_date" default="{{ $works['start_date'] }}" error="work_experiences.{{ $loop->index }}.start_date" required>Work start {{ $loop->iteration }}</x-edit-forms.input-form>
								</div>
								<div class="mt-3">
									<x-edit-forms.input-form id="works_{{ $loop->index }}_end" name="work_experiences[{{ $loop->index }}][end_date]" type="month" placehold="" value="work_experiences.{{ $loop->index }}.end_date" default="{{ $works['end_date'] }}" error="work_experiences.{{ $loop->index }}.end_date" required>Work end {{ $loop->iteration }}</x-edit-forms.input-form>
								</div>
								<div class="mt-3">
									<x-edit-forms.input-form id="works_{{ $loop->index }}_description" name="work_experiences[{{ $loop->index }}][description]" type="text" placehold="Senior Accountant" value="work_experiences.{{ $loop->index }}.description" default="{{ $works['description'] }}" error="work_experiences.{{ $loop->index }}.description" required autocomplete="organization-title">Work description {{ $loop->iteration }}</x-edit-forms.input-form>
								</div>
							@endforeach
							<div class="flex items-center space-x-4">
								<x-forms.new-input-form id="worksDataBtn" onclick="worksData()">New work experiences</x-forms.new-input-form>
								<x-forms.remove-new-input-form id="workRemoveDataBtn" onclick="RemoveButtons('workRemoveDataBtn', 'works', '.works')">Remove work experiences</x-forms.remove-new-input-form>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" id="submit" class="text-white my-4 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
					Update profile
				</button>
				<button disabled type="button" id="loader" style="display:none;" disabled class="w-full cursor-not-allowed text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
						Loading...
				</button>
				</form>
			</div>
		</div>
	</section>

	@push('scripts')
		<!-- Addisional js -->
		<script src="{{ asset('js/editProfile.js') }}" defer></script>
		
		@if (session()->has('errors'))
			<!-- We use vanila javascript to repopulated input field -->
			<script>
				// get old value and error bags
				const old_socials = @json(old('social_links', []));
				const error_social = @json($errors->get('social_links.*'));
				let count_socials = document.querySelectorAll('.socials').length;

				const old_educations = @json(old('educations', []));
				const error_educations = @json($errors->get('educations.*'));
				let count_educations = document.querySelectorAll('.educations').length;

				const old_works = @json(old('work_experiences', []));
				const error_works = @json($errors->get('work_experiences.*'));
				const count_works = document.querySelectorAll('.works').length;

				// Skip rendered input
				const socials = old_socials.slice(count_socials);
				const educations = old_educations.slice(count_educations);
				const works = old_works.slice(count_works);

				function formSocials(social, index) {
					const socials_container = document.getElementById('socialLinks');
					const new_div = document.createElement('div');
					new_div.classList.add('socials');
					new_div.classList.add('mt-3');

					// Add new inputs
					new_div.innerHTML = `
						<div class="mt-3">
							<label for="social_links_${index + 1}_platform" class="block mb-2.5 text-sm font-medium text-heading">Social links platform ${index + 2}</label>
							<select id="social_links_${index + 1}_platform" name="social_links[${index + 1}][platform]" required class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
								<option value="" selected disabled>Social links platform</option>
								<option value="github" ${social['platform'] == 'github' ? 'selected' : ''}>GitHub</option>
								<option value="linkedin" ${social['platform'] == 'linkedin' ? 'selected' : ''}>LinkedIn</option>
								<option value="x" ${social['platform'] == 'x' ? 'selected' : ''}>X</option>
							</select>
							${error_social[`social_links.${index + 1}.platform`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_social[`social_links.${index + 1}.platform`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="social_links_${index + 1}_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Social links link ${index + 2}</label>
							<input type="link" name="social_links[${index + 1}][link]" id="social_links_${index + 1}_link" value="${social['link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://maryadi.biz.id/" required>
							${error_social[`social_links.${index + 1}.link`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_social[`social_links.${index + 1}.link`]}</p>` : ``}
						</div>`;
					
					socials_container.insertAdjacentElement('beforeend', new_div);
				}

				function formEducations(education, index) {
					const educations_container = document.getElementById('educations');
					const new_div = document.createElement('div');
					new_div.classList.add('educations');
					new_div.classList.add('mt-3');

					// Add new inputs
					new_div.innerHTML = `
						<div class="mt-3">
							<label for="educations_${index + 1}_institution" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution of educations ${index + 2}</label>
							<input type="text" name="educations[${index + 1}][institution]" id="educations_${index + 1}_institution" value="${education['institution']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="SAMAN 70 Surabaya" required>
							${error_educations[`educations.${index + 1}.institution`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_educations[`educations.${index + 1}.institution`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_degree" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution of educations ${index + 2}</label>
							<input type="link" name="educations[${index + 1}][degree]" id="educations_${index + 1}_degree" value="${education['degree']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="bachelor">
							${error_educations[`educations.${index + 1}.degree`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_educations[`educations.${index + 1}.degree`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations start ${index + 2}</label>
							<input type="month" name="educations[${index + 1}][start_date]" id="educations_${index + 1}_start" value="${education['start_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							${error_educations[`educations.${index + 1}.start_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_educations[`educations.${index + 1}.start_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations end ${index + 2}</label>
							<input type="month" name="educations[${index + 1}][end_date]" id="educations_${index + 1}_end" value="${education['end_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							${error_educations[`educations.${index + 1}.emd_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_educations[`educations.${index + 1}.emd_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution website ${index + 2}</label>
							<input type="link" name="educations[${index + 1}][link]" id="educations_${index + 1}_link" value="${education['link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://prakasa.tv/et-fugit-qui-explicabo-maiores-qui-aut-corporis-autem.html">
							${error_educations[`educations.${index + 1}.link`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_educations[`educations.${index + 1}.link`]}</p>` : ``}
						</div>`;
					
					educations_container.insertAdjacentElement('beforeend', new_div);
				}

				function formWorks(work, index) {
					const works_container = document.getElementById('works');
					const new_div = document.createElement('div');
					new_div.classList.add('works');
					new_div.classList.add('mt-3');

					// Add new inputs
					new_div.innerHTML = `
						<div class="mt-3">
							<label for="works_${index + 1}_company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Workplace ${index + 2}</label>
							<input type="text" name="work_experiences[${index + 1}][company]" id="works_${index + 1}_company" value="${work['company']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="company name or workplace" required>
							${error_works[`works.${index + 1}.company`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_works[`works.${index + 1}.company`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work position ${index + 2}</label>
							<input type="text" name="work_experiences[${index + 1}][position]" id="works_${index + 1}_position" value="${work['position']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Senior Accountant" required>
							${error_works[`works.${index + 1}.position`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_works[`works.${index + 1}.position`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work start ${index + 2}</label>
							<input type="month" name="work_experiences[${index + 1}][start_date]" id="works_${index + 1}_start" value="${work['start_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							${error_works[`works.${index + 1}.start_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_works[`works.${index + 1}.start_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work end ${index + 2}</label>
							<input type="month" name="work_experiences[${index + 1}][end_date]" id="works_${index + 1}_end" value="${work['end_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							${error_works[`works.${index + 1}.end_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_works[`works.${index + 1}.end_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work description ${index + 2}</label>
							<input type="text" name="work_experiences[${index + 1}][description]" id="works_${index + 1}_description" value="${work['description']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="computer technician training........" required>
							${error_works[`works.${index + 1}.description`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${error_works[`works.${index + 1}.description`]}</p>` : ``}
						</div>`;

					works_container.insertAdjacentElement('beforeend', new_div);
				}

				// Rerender inputs form
				socials.forEach(formSocials);
				educations.forEach(formEducations);
				works.forEach(formWorks);

				// Enable submit buttons
				const btn_origin = document.getElementById('submit');
				const btn_target = document.getElementById('loader');
				
				btn_origin.style.display = 'block';
				btn_target.disabled = true;
				btn_target.style.display = 'none';
			</script>
		@endif
	@endpush

</x-layouts.app>