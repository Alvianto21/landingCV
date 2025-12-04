<x-layouts.app>
	<x-slot:title>{{ $title }}</x-slot:title>

	<section class="bg-gray-50 dark:bg-gray-900">
		<div class="flex flex-col justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
			<h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
				Create an account
			</h1>
			<div class="overflow-y-scroll">
				<form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="grid grid-cols-4 gap-4 sm:grid-cols-2 sm:gap-6">
						<!-- Account info -->
						<div>
							<x-forms.input-form id="name" name="name" type="text" placehold="Karina Kurniwati" value="name" error="name" required autofocus>Your name</x-forms.input-form>
						</div>
						<div>
							<x-forms.input-form id="email" name="email" type="email" placehold="name@company.com" value="email" error="email" required>Your email</x-forms.input-form>
						</div>
						<div>
							<x-forms.input-form id="username" name="username" type="text" placehold="katarina12" value="username" error="username" required>Username</x-forms.input-form>
						</div>
						<div>
							<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
							<input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							<x-input-error :messages="$errors->get('password')" class="mt-2" />
						</div>
						<div>
							<label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
							<input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
						</div>
						<!-- Personal info -->
						<div>
							<img class="img-preview img-fluid img-thumbnail items-center" width="200">
							<x-forms.input-image-form id="profile_picture" name="profile_picture" value="profile_picture" error="profile_picture" required onchange="imgPreview()">Profile picture</x-forms.input-image-form>
						</div>
						<div class="sm:col-span-2">
							<label for="address" class="block mb-2.5 text-sm font-medium text-heading">Your address</label>
							<textarea id="address" name="address" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Jln. kebangki..." required>{{ old('address') }}</textarea>
							<x-input-error :messages="$errors->get('address')" class="mt-2" />
						</div>
						<div>
							<x-forms.input-select-form id="gender" name="gender" :options="['male' => 'Male', 'female' => 'Female']" value="gender" error="gender" required>Gender</x-forms.input-select-form>
						</div>
						<div>
							<x-forms.input-form id="phone_number" name="phone_number" type="tel" placehold="123456789012" value="phone_number" error="phone_number" required>Phone Number</x-forms.input-form>
						</div>
						<div>
							<x-forms.input-form id="place_of_birth" name="place_of_birth" type="text" placehold="Surabaya" value="place_of_birth" error="plce_of_birth" required>Place of birth</x-forms.input-form>
						</div>
						<div>
							<x-forms.input-form id="date_of_birth" name="date_of_birth" type="date" placehold="" value="date_of_birth" error="date_of_birth" required>Date of birth</x-forms.input-form>
						</div>
						<!-- Profesional info -->
						<div class="sm:col-span-2">
							<x-forms.input-form id="skills" name="skills" type="text" placehold="Branding, art director,....." value="skills" error="skills" required>Your skills</x-forms.input-form>
						</div>
						<div id="socialLinks">
							<div class="socials">
								<div>
									<x-forms.input-select-form id="social_links_0_platform" name="social_links[0][platform]" :options="['github' => 'GitHub', 'linkedin' => 'LinkedIn', 'x' => 'X']" value="social_links.0.platform" error="social_links.0.platform" required>Social links platform</x-forms.input-select-form>
								</div>
								<div class="mt-3">
									<x-forms.input-form id="social_links_0_link" name="social_links[0][link]" type="link" placehold="http://maryadi.biz.id/" value="social_links.0.link" error="social_links.0.link" required>Social Links</x-forms.input-form>
								</div>
							</div>
							<x-forms.new-input-form onclick="socialLinkPlatform()" id="socialLinksBtn">Add new social platforms</x-forms.new-input-form>
							<x-forms.remove-new-input-form onclick="RemoveButtons('socialLinksRemoveBtn', 'socialLinks', '.socials')" id="socialLinksRemoveBtn">Remove social links</x-forms.remove-new-input-form>
						</div>
						<div>
							<x-forms.input-form id="bio" name="bio" type="text" placehold="Introduce yourself" value="bio" error="bio" required>Biodata</x-forms.input-form>
						</div>
						<div id="educations">
							<div class="educations">
								<div>
									<x-forms.input-form id="educations_0_institution" name="educations[0][institution]" type="text" placehold="SMAN 70 Surabaya" value="educations.0.institution" error="educations.0.institution" required>Institutions of education</x-forms.input-form>
								</div>
								<div class="mt-3">
									<x-forms.input-list-form id="educations_0_degree" name="educations[0][degree]" :options="['none' => 'None', 'bachelor' => 'Bachelor', 'master' => 'Master', 'profesorr' => 'Professor']" placehold="bachelor" value="educations.0.degree" error="educations.0.degree" required>Academic title</x-forms.input-list-form>
								</div>
								<div class="mt-3">
									<x-forms.input-form id="educations_0_start" name="educations[0][start_date]" type="month" placehold="" value="educations.0.start_date" error="educations.0.start_date" required>Educations start</x-forms.input-form>
								</div>
								<div class="mt-3">							
									<x-forms.input-form id="educations_0_end" name="educations[0][end_date]" type="month" placehold="" value="educations.0.end_date" error="educations.0.end_date." required>Educations end</x-forms.input-form>
								</div>
								<div class="mt-3">
									<x-forms.input-form id="educations_0_institution_website" name="educations[0][link]" type="link" placehold="http://prakasa.tv/et-fugit-qui-explicabo-maiores-qui-aut-corporis-autem.html" value="educations.0.link" error="educations.0.link">Institution website</x-forms.input-form>
								</div>
							</div>
							<x-forms.new-input-form onclick="educationsData()" id="educationsDataBtn">Add new education data</x-forms.new-input-form>
							<x-forms.remove-new-input-form onclick="RemoveButtons('educattionsRemoveDataBtn', 'educations', '.educations')" id="educattionsRemoveDataBtn">Remove educations data</x-forms.remove-new-input-form>
						</div>
						<div id="works">
							<div class="works">
								<div>
									<x-forms.input-form id="works_0_company" name="work_experiences[0][company]" type="text" placehold="company name or workplace" value="work_experiences.0.company" error="work_experiences.0.company" required>Workplace</x-forms.input-form>
								</div>
								<div class="mt-3">
									<x-forms.input-form id="works_0_position" name="work_experiences[0][position]" type="text" placehold="Senior Accountant" value="work_experiences.0.position" error="work_experiences.0.position" required>Work positions</x-forms.input-form>
								</div>
								<div class="mt-3">
									<x-forms.input-form id="work_0_start" name="work_experiences[0][start_date]" type="month" placehold="" value="work_experiences.0.start_date" error="work_experiences.0.start_date" required>Work start</x-forms.input-form>
								</div>
								<div class="mt-3">							
									<x-forms.input-form id="work_0_end" name="work_experiences[0][end_date]" type="month" placehold="" value="work_experiences.0.end_date" error="work_experiences.0.end_date">Work end</x-forms.input-form>
								</div>
								<div class="sm:col-span-2 mt-3">
									<x-forms.input-form id="work_0_descriptions" name="work_experiences[0][description]" type="text" placehold="computer technician training........" value="work_experiences.0.description" error="work_experiences.0.description" required>Work description</x-forms.input-form>
								</div>
								<x-forms.new-input-form onclick="worksData()" id="worksDataBtn">Add new work experience</x-forms.new-input-form>
								<x-forms.remove-new-input-form onclick="RemoveButtons('workRemoveDataBtn', 'works', '.works')" id="workRemoveDataBtn">Remove work experience</x-forms.remove-new-input-form>
							</div>
						</div>
					</div>
					<button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" id="submit">Create an account</button>
					<button disabled type="button" id="loader" style="display:none;" disabled class="w-full cursor-not-allowed text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
						Loading...
					</button>
                	<p class="text-sm font-light text-gray-500 dark:text-gray-400">
						Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
					</p>
				</form>
			</div>
		</div>
	</section>

	@push('scripts')
		<!-- Addisional js -->
		<script src="{{ asset('js/register.js') }}" defer></script>
		
		@if (session()->has('errors'))
		<!--
			We use javacript to rerender the rederred form by 
			javascript, repopulating them, get error bags if 
			available, and enable back submit button after that.
			We using '@ json' to get data from laravel. 
		-->
			<script>
				const old_educations = @json(old('educations', []));
				const educations_errorsBag = @json($errors->get('educations.*'));
				
				const old_works = @json(old('work_experiences', ''));
				const works_container = document.getElementById('works');
				const works_errorsBag = @json($errors->get('work_experiences.*'));
				
				const old_socials = @json(old('social_links', ''));
				const socials_container = document.getElementById('socialLinks');
				const socials_errorsBag = @json($errors->get('social_links.*'));
				console.log(socials_errorsBag);
				
				// Skip array index 0 because they areready available
				const educations = old_educations.slice(1);
				const works = old_works.slice(1);
				const socials = old_socials.slice(1);

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
							${socials_errorsBag[`social_links.${index + 1}.platform`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${socials_errorsBag[`social_links.${index + 1}.platform`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="social_links_${index + 1}_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Social links link ${index + 2}</label>
							<input type="link" name="social_links[${index + 1}][link]" id="social_links_${index + 1}_link" value="${social['link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://maryadi.biz.id/" required>
							${socials_errorsBag[`social_links.${index + 1}.link`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${socials_errorsBag[`social_links.${index + 1}.link`]}</p>` : ``}
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
							${educations_errorsBag[`educations.${index + 1}.institution`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${educations_errorsBag[`educations.${index + 1}.institution`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_degree" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution of educations ${index + 2}</label>
							<input type="link" name="educations[${index + 1}][degree]" id="educations_${index + 1}_degree" value="${education['degree']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="bachelor">
							${educations_errorsBag[`educations.${index + 1}.degree`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${educations_errorsBag[`educations.${index + 1}.degree`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations start ${index + 2}</label>
							<input type="month" name="educations[${index + 1}][start_date]" id="educations_${index + 1}_start" value="${education['start_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							${educations_errorsBag[`educations.${index + 1}.start_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${educations_errorsBag[`educations.${index + 1}.start_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations end ${index + 2}</label>
							<input type="month" name="educations[${index + 1}][end_date]" id="educations_${index + 1}_end" value="${education['end_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							${educations_errorsBag[`educations.${index + 1}.emd_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${educations_errorsBag[`educations.${index + 1}.emd_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="educations_${index + 1}_website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution website ${index + 2}</label>
							<input type="link" name="educations[${index + 1}][link]" id="educations_${index + 1}_link" value="${education['link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://prakasa.tv/et-fugit-qui-explicabo-maiores-qui-aut-corporis-autem.html">
							${educations_errorsBag[`educations.${index + 1}.link`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${educations_errorsBag[`educations.${index + 1}.link`]}</p>` : ``}
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
							${works_errorsBag[`works.${index + 1}.company`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${works_errorsBag[`works.${index + 1}.company`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work position ${index + 2}</label>
							<input type="text" name="work_experiences[${index + 1}][position]" id="works_${index + 1}_position" value="${work['position']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Senior Accountant" required>
							${works_errorsBag[`works.${index + 1}.position`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${works_errorsBag[`works.${index + 1}.position`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work start ${index + 2}</label>
							<input type="month" name="work_experiences[${index + 1}][start_date]" id="works_${index + 1}_start" value="${work['start_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							${works_errorsBag[`works.${index + 1}.start_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${works_errorsBag[`works.${index + 1}.start_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work end ${index + 2}</label>
							<input type="month" name="work_experiences[${index + 1}][end_date]" id="works_${index + 1}_end" value="${work['end_date']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							${works_errorsBag[`works.${index + 1}.end_date`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${works_errorsBag[`works.${index + 1}.end_date`]}</p>` : ``}
						</div>
						<div class="mt-3">
							<label for="works_${index + 1}_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work description ${index + 2}</label>
							<input type="text" name="work_experiences[${index + 1}][description]" id="works_${index + 1}_description" value="${work['description']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="computer technician training........" required>
							${works_errorsBag[`works.${index + 1}.description`] ? `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> ${works_errorsBag[`works.${index + 1}.description`]}</p>` : ``}
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