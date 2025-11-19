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
						</div>
						<!-- Personal info -->
						<div>
							<img class="img-preview img-fluid img-thumbnail items-center" width="200">
							<x-forms.input-image-form id="profile_picture" name="profile_picture" value="profile_picture" error="profile_picture" required onchange="imgPreview()">Profile picture</x-forms.input-image-form>
						</div>
						<div class="sm:col-span-2">
							<label for="address" class="block mb-2.5 text-sm font-medium text-heading">Your address</label>
							<textarea id="address" name="address" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Jln. kebangki..." required>{{ old('address') }}</textarea>
						</div>
						<div>
							<x-forms.input-select-form id="gender" name="gender" :options="['male' => 'Male', 'female' => 'Female']" value="gender" error="gender" required>Gender</x-forms.input-select-form>
						</div>
						<div>
							<x-forms.input-form id="phone_number" name="phone_number" type="tel" placehold="123456789012" value="phone_number" error="phone_number" required>Phone Number</x-forms.input-form>
						</div>
						<div>
							<x-forms.input-form id="place_of_birth" name="place_of_birth" type="text" placehold="Surabaya" value="plave_of_birth" error="plce_of_birth" required>Place of birth</x-forms.input-form>
						</div>
						<div>
							<x-forms.input-form id="date_of_birth" name="date_of_birth" type="date" placehold="" value="date_of_birth" error="date_of_birth" required>Date of birth</x-forms.input-form>
						</div>
						<!-- Profesional info -->
						<div class="sm:col-span-2">
							<x-forms.input-form id="skills" name="skills" type="text" placehold="Branding, art director,....." value="skills" error="skills" required>Your skills</x-forms.input-form>
						</div>
						<div id="socialLinks">
							<div>
								<x-forms.input-select-form id="social_links_0_platform" name="social_links[0][platform]" :options="['github' => 'GitHub', 'linkedin' => 'LinkedIn', 'x' => 'X']" value="social_links.0.platform" error="social_links[0][platform]" required>Social links platform</x-forms.input-select-form>
								@foreach ($errors->get('social_links.*') as $messages)
									@foreach ($messages as $message)
										<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>									
									@endforeach
								@endforeach
							</div>
							<div class="mt-3">
								<x-forms.input-form id="social_links_0_link" name="social_links[0][link]" type="link" placehold="http://maryadi.biz.id/" value="social_links.0.link" error="social_links[0][link]" required>Social Links</x-forms.input-form>
							</div>
							<x-forms.new-input-form onclick="socialLinkPlatform()" id="socialLinksBtn">Add new social platforms</x-forms.new-input-form>
						</div>
						<div>
							<x-forms.input-form id="bio" name="bio" type="text" placehold="Introduce yoyrself" value="bio" error="bio" required>Biodata</x-forms.input-form>
						</div>
						<div id="educations">
							<div>
								<x-forms.input-form id="educations_0_institution" name="educations[0][institution]" type="text" placehold="SMAN 70 Surabaya" value="educations.0.institution" error="educations[0][institution]" required>Institutions of education</x-forms.input-form>
							</div>
							<div class="mt-3">
								<x-forms.input-list-form id="educations_0_degree" name="educations[0][degree]" :options="['none' => 'None', 'bachelor' => 'Bachelor', 'master' => 'Master', 'profesorr' => 'Professor']" placehold="bachelor" value="educations.0.degree" error="educations[0][degree]" required>Academic title</x-forms.input-list-form>
							</div>
							<div class="mt-3">
								<x-forms.input-form id="educations_0_start" name="educations[0][start_date]" type="month" placehold="" value="educations.0.start_date" error="educations[0][start_date]" required>Educations start</x-forms.input-form>
							</div>
							<div class="mt-3">							
								<x-forms.input-form id="educations_0_end" name="educations[0][end_date]" type="month" placehold="" value="educations.0.end_date" error="educations[0][end_date]" required>Educations end</x-forms.input-form>
							</div>
							<div class="mt-3">
								<x-forms.input-form id="educations_0_institution_website" name="educations[0][link]" type="link" placehold="http://prakasa.tv/et-fugit-qui-explicabo-maiores-qui-aut-corporis-autem.html" value="educations.0.link" error="educations[0][link]">Institution website</x-forms.input-form>
							</div>
							@foreach ($errors->get('educations.*') as $messages)
								@foreach ($messages as $message)
									<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>									
								@endforeach
							@endforeach
							<x-forms.new-input-form onclick="educationsData()" id="educationsDataBtn">Add new education data</x-forms.new-input-form>
						</div>
						<div id="works">
							<div>
								<x-forms.input-form id="works_0_company" name="work_experiences[0][company]" type="text" placehold="company name or workplace" value="work_experiences.0.company" error="work_experiences[0][company]" required>Workplace</x-forms.input-form>
							</div>
							<div class="mt-3">
								<x-forms.input-form id="works_0_position" name="work_experiences[0][position]" type="text" placehold="Senior Accountant" value="work_experiences.0.position" error="work_experiences[0][position]" required>Work positions</x-forms.input-form>
							</div>
							<div class="mt-3">
								<x-forms.input-form id="work_0_start" name="work_experiences[0][start_date]" type="month" placehold="" value="work_experiences.0.start_date" error="work_experiences[0][start_date]" required>Work start</x-forms.input-form>
							</div>
							<div class="mt-3">							
								<x-forms.input-form id="work_0_end" name="work_experiences[0][end_date]" type="month" placehold="" value="work_experiences.0.end_date" error="work_experiences[0][end_date]">Work end</x-forms.input-form>
							</div>
							<div class="sm:col-span-2 mt-3">
								<x-forms.input-form id="work_0_descriptions" name="work_experiences[0][description]" type="text" placehold="computer technician training........" value="work_experiences.0.description" error="work_experiences[0][description]" required>Work description</x-forms.input-form>
							</div>
							@foreach ($errors->get('work_experiences.*') as $messages)
								@foreach ($messages as $message)
									<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>									
								@endforeach
							@endforeach
							<x-forms.new-input-form onclick="worksData()" id="worksDataBtn">Add new work experience</x-forms.new-input-form>
						</div>
					</div>
					<button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" id="submit">Create an account</button>
					{{-- <button disabled type="button" id="loader" style="display:none;" class="w-full cursor-not-allowed text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
						Loading...
					</button> --}}
                	<p class="text-sm font-light text-gray-500 dark:text-gray-400">
						Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
					</p>
				</form>
			</div>
		</div>
	</section>

	@push('scripts')
		<!-- Addisional js -->
		<script src="{{ asset('js/register.js') }}"></script>
	@endpush
</x-layouts.app>