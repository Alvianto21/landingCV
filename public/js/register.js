let social_links_index = 1;
let educations_data_index = 1;
let works_data_index = 1;

// Image preview
function imgPreview() {
	const img = document.querySelector('#profile_picture');
	const img_preview = document.querySelector('.img-preview');

	img_preview.style.display = 'block';

	const oFReader = new FileReader();
	oFReader.readAsDataURL(img.files[0]);

	oFReader.onload = function(ofREvent) {
		img_preview.src = ofREvent.target.result;
	};
}

// disable submit button on click
// Kembalikan tombil bila validasi gagal
// function buttonDisable() {
// 	const btn_origin = document.getElementById('submit');
// 	const btn_target = document.getElementById('loader');

// 	btn_origin.style.display = 'none';
// 	btn_origin.disabled = true;
// 	btn_target.style.display = 'block';
// }

// Add addisional social links input
// ToDo optimasi dengan cara menampilkan nilai lama pada form yang digenerate disini
function socialLinkPlatform() {
	const container = document.getElementById('socialLinks');
	const new_div = document.createElement('div');
	
	// add new input inside div
	new_div.innerHTML = `
		<div class='mt-3'>
			<label for="social_links_${social_links_index}_platform" class="block mb-2.5 text-sm font-medium text-heading">Social links platform</label>
			<select id="social_links_${social_links_index}_platform" name="social_links[${social_links_index}][platform]" required class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
			<option value="" selected disabled>Social links platform</option>
			<option value="github">GitHub</option>
			<option value="linkedin">LinkedIn</option>
			<option value="x">X</option>
			</select>
		</div>
		<div class="mt-3">
			<label for="social_links_${social_links_index}_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Social links link</label>
			<input type="link" name="social_links[${social_links_index}][link]" id="social_links_${social_links_index}_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://maryadi.biz.id/" required>
		</div>`;
	
	social_links_index++;
	container.appendChild(new_div);
}

// Add addisional educations input
function educationsData() {
	const container = document.getElementById('educations');
	const new_div = document.createElement('div');
	
	// add new input inside div
	new_div.innerHTML = `
		<div class="mt-3">
			<label for="educations_${educations_data_index}_institution" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institutions of education</label>
			<input type="text" name="educations[${educations_data_index}][institution]" id="educations_${educations_data_index}_institution" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="SAMAN 70 Surabaya" required>
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_degree" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Academic title</label>
			<input type="text" list="degree" name="educations[${educations_data_index}][degree]" id="educations_${educations_data_index}_degree" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="bachelor">
			<datalist id="degree">
			<option value="none">None</option>
			<option value="bachekor">Bachelor</option>
			<option value="master">Master</option>
			<option value="professor">Professor</option>
			</datalist>
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations start</label>
			<input type="month" name="educations[${educations_data_index}][start_date]" id="educations_${educations_data_index}_start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations end</label>
			<input type="month" name="educations[${educations_data_index}][end_date]" id="educations_${educations_data_index}_end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution website</label>
			<input type="link" name="educations[${educations_data_index}][link]" id="educations_${educations_data_index}_website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://prakasa.tv/et-fugit-qui-explicabo-maiores-qui-aut-corporis-autem.html">
		</div>`;
	
	educations_data_index++;
	container.appendChild(new_div);
}

// Add new work experiences input
function worksData() {
	const container = document.getElementById('works');
	const new_div = document.createElement('div');
	
	// add new input inside div
	new_div.innerHTML = `
		<div class="mt-3">
			<label for="works_${works_data_index}_company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Workplace</label>
			<input type="text" name="work_experiences[${works_data_index}][company]" id="works_${works_data_index}_company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="company name or workplace" required>
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work position</label>
			<input type="text" name="work_experiences[${works_data_index}][position]" id="works_${works_data_index}_position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Senior Accountant" required>
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work start</label>
			<input type="month" name="work_experiences[${works_data_index}][start_date]" id="works_${works_data_index}_start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work end</label>
			<input type="month" name="work_experiences[${works_data_index}][end_date]" id="works_${works_data_index}_end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work description</label>
			<input type="text" name="work_experiences[${works_data_index}][description]" id="works_${works_data_index}_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="computer technician training........" required>
		</div>`;

	works_data_index++;
	container.appendChild(new_div);
}