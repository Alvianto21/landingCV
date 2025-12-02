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
	console.info("tombo");
}

document.querySelector('#renotif').addEventListener('submit', buttonDisable);
document.querySelector('#goOut').addEventListener('submit', buttonDisable);