/**
 * Change buttons stage from active to disable if items remainders one
 * @param {string} buttons - Get id of buttons
 * @param {string} containerId - Get id of parents container
 * @param {string} className - Get all of 'className' class inside parent container
 */
function toggleButtonsState(buttons, containerId, className) {
	const targetBtn = document.getElementById(buttons);
	const targetId = document.getElementById(containerId);

	// Check if className start with '.'
	if (!className.startsWith('.')) className = '.' + className;
	
	const targetClass = targetId.querySelectorAll(className);

	if(targetClass.length === 1) {
		targetBtn.style.display = 'none';
		targetBtn.classList.add("cursor-not-allowed");
		targetBtn.disabled = true;
	} else if (targetBtn.length !== 1) {
		targetBtn.style.display = 'inline';
		targetBtn.classList.remove("cursor-not-allowed");
		targetBtn.disabled = false;
	}
	
}

// Display remove buttons if items above 1
toggleButtonsState('socialLinksRemoveBtn', 'socialLinks', '.socials');
toggleButtonsState('educationsRemoveDataBtn', 'educations', '.educations');
toggleButtonsState('workRemoveDataBtn', 'works', '.works');

// Add addisional social links input
function socialLinkPlatform() {
	const container = document.getElementById('socialLinks');
	const new_div = document.createElement('div');
	let social_links_index = document.querySelectorAll('.socials').length;
	new_div.classList.add("sosials");
		
	// add new input inside div
	new_div.innerHTML = `
		<div class='mt-3'>
			<label for="social_links_${social_links_index}_platform" class="block mb-2.5 text-sm font-medium text-heading">Social links platform ${social_links_index + 1}</label>
			<select id="social_links_${social_links_index}_platform" name="social_links[${social_links_index}][platform]" required class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
				<option value="" selected disabled>Social links platform</option>
				<option value="github">GitHub</option>
				<option value="linkedin">LinkedIn</option>
				<option value="x">X</option>
			</select>
		</div>
		<div class="mt-3">
			<label for="social_links_${social_links_index}_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Social links link ${social_links_index + 1}</label>
			<input type="link" name="social_links[${social_links_index}][link]" id="social_links_${social_links_index}_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://maryadi.biz.id/" required>
		</div>`;
		
		container.appendChild(new_div);

		// Enable remove button
		toggleButtonsState("socialLinksRemoveBtn", "socialLinks", ".socials");
	}
	
	// Add addisional educations input
function educationsData() {
	let educations_data_index = document.querySelectorAll('.educations').length;
	const container = document.getElementById('educations');
	const new_div = document.createElement('div');
	new_div.classList.add('educations');
	new_div.classList.add('mt-3');
	
	// add new input inside div
	new_div.innerHTML = `
		<div class="mt-3">
			<label for="educations_${educations_data_index}_institution" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institutions of education ${educations_data_index + 1}</label>
			<input type="text" name="educations[${educations_data_index}][institution]" id="educations_${educations_data_index}_institution" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="SAMAN 70 Surabaya" required>
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_degree" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Academic title ${educations_data_index + 1}</label>
			<input type="text" list="degree" name="educations[${educations_data_index}][degree]" id="educations_${educations_data_index}_degree" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="bachelor">
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations start ${educations_data_index + 1}</label>
			<input type="month" name="educations[${educations_data_index}][start_date]" id="educations_${educations_data_index}_start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educations end ${educations_data_index + 1}</label>
			<input type="month" name="educations[${educations_data_index}][end_date]" id="educations_${educations_data_index}_end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
		</div>
		<div class="mt-3">
			<label for="educations_${educations_data_index}_website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution website ${educations_data_index + 1}</label>
			<input type="link" name="educations[${educations_data_index}][link]" id="educations_${educations_data_index}_website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="http://prakasa.tv/et-fugit-qui-explicabo-maiores-qui-aut-corporis-autem.html">
		</div>`;
	
	container.appendChild(new_div);

	// Enable remove button
	toggleButtonsState("educationsRemoveDataBtn", "educations", ".educations");
}

// Add new work experiences input
function worksData() {
	const container = document.getElementById('works');
	const new_div = document.createElement('div');
	let works_data_index = document.querySelectorAll('.works').length;
	new_div.classList.add("works");
	
	// add new input inside div
	new_div.innerHTML = `
		<div class="mt-3">
			<label for="works_${works_data_index}_company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Workplace ${works_data_index + 1}</label>
			<input type="text" name="work_experiences[${works_data_index}][company]" id="works_${works_data_index}_company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="company name or workplace" required>
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work position ${works_data_index + 1}</label>
			<input type="text" name="work_experiences[${works_data_index}][position]" id="works_${works_data_index}_position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Senior Accountant" required>
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work start ${works_data_index + 1}</label>
			<input type="month" name="work_experiences[${works_data_index}][start_date]" id="works_${works_data_index}_start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work end ${works_data_index + 1}</label>
			<input type="month" name="work_experiences[${works_data_index}][end_date]" id="works_${works_data_index}_end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
		</div>
		<div class="mt-3">
			<label for="works_${works_data_index}_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work description ${works_data_index + 1}</label>
			<input type="text" name="work_experiences[${works_data_index}][description]" id="works_${works_data_index}_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="computer technician training........" required>
		</div>`;

	container.appendChild(new_div);

	// Enamble remove button
	toggleButtonsState("workRemoveDataBtn", "works", ".work");
}

/**
 * Remove inputs field
 * @param {string} btn - Buttons Id
 * @param {string} containerId - Parents container
 * @param {string} className - Get all of 'className' class inside parent
 * @returns - If user pressed cancel or className.length <= 1, return nothing
 */
function RemoveButtons(btn, containerId, className) {
	const targetId = document.getElementById(containerId);

	// Check if className start with '.'
	if (!className.startsWith('.')) className = '.' + className;
	
	const target = targetId.querySelectorAll(className);

	if (confirm("Press OK to continue. If you do, the data will be lost!")) {
		if (target.length > 1) {
			target[target.length - 1].remove();
		} else {
			return;
		}
	} else {
		return;
	}

	toggleButtonsState(btn, containerId, className);
}