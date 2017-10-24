(function() {

console.log(vaccines_data[0]);

var get_data_on_project = function() {
	$.get('https://api.automatedinsights.com/v1.5/projects/ohio-school-vaccines?access_token=3d20b612ad2dcfd8f4704e2a8ce5e36cbddf6b11c4d5274ee07fd6f8be1a6c95')
	.then(function(result) {
		console.log(result);
	})
}

var get_template = function() {

	var post_data = {}
	post_data.data = vaccines_data[0];
	post_data.proofread = false;

	console.log(post_data);

	$.get('php/get_template.php?data='+post_data)
	.then(function(result) {
		console.log(result);
	});
	
}

get_data_on_project();
get_template();


})();