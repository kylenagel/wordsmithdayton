<?php

// SET HEADER TO ALLOW CROSS-DOMAIN REQUESTS
header('Access-Control-Max-Age: 1728000');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Origin: *');
header('Content-type: text/plain');
header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0, s-maxage=0"); 
header("Pragma: no-cache");
header("Expires: 0");

//$data = $_GET['data'];

$data = '{"data":{"irn_number":9484,"school_name":"Coshocton Christian School","district_name":null,"address":"23891 Airport Rd","city":"Coshocton","zip_code":43812,"county":"Coshocton","private_or_public":"Private","kindergarten":"Kindergarten","total_kindergartners":11,"kindergarten_number_of_pupils_with_all_required_immunizations":6,"percent_kindergartners_will_all_immunizations":"0_55","number_of_kindergartners_who_have_a_medical_contraindication":0,"number_of_kindergartners_who_have_a_reason_of_conscience_or_religious":2,"percent_k_medical_exemption":"0%","percent_k_reason_of_conscience_or_religious_objection":"18%","kindergartennumber_of_pupils_incomplete":3,"kindergartenin_process_total":3,"7thgrade":null,"total_pupils_enrolled_in_grade_reported_7th":null,"7thgradenumber_of_pupils_with_all_required_immunizations":null,"percent_7th_with_all_vaccines":null,"7thgradenumber_of_pupils_who_have_a_medical_contraindication":null,"7thgradenumber_of_pupils_who_have_a_reason_of_conscience_or_rel":null,"7thgradenumber_of_pupils_incomplete":null,"7thgradein_process_total":null,"12th_grade":null,"total_pupils_enrolled_in_grade_reported_12th":null,"12th_number_of_pupils_with_all_required_immunizations":null,"percent_12th_with_all_vaccines":null,"12th_number_of_pupils_who_have_a_medical_contraindication":null,"12th_number_of_pupils_who_have_a_reason_of_conscience_or_religious_ob":null,"12th_number_of_pupils_incomplete":null,"12th_in_process_total":null,"new_pupils_grades_1_6_8_11":null,"total_pupils_enrolled_in_grade_reported_new_pupils":null,"newpupils_number_of_pupils_with_all_required_immunizations":null,"percent_new_pupils_with_all_vaccines":null,"newpupils_number_of_pupils_who_have_a_medical_contraindication":null,"newpupils_number_of_pupils_who_have_a_reason_of_conscience_or_religious_ob":null,"newpupils_number_of_pupils_incomplete":null,"newpupils_in_process_total":null}}';

$data = json_encode($data);

echo $data;

// PROCESS REQUEST
$data_url = 'https://api.automatedinsights.com/v1/projects/ohio-school-vaccines/templates/ohio-school-vaccines-template/test';
$opts = array(
	'http' => array(
		'method' => 'POST',
		'header' => array(
			"Authorization: Bearer 3d20b612ad2dcfd8f4704e2a8ce5e36cbddf6b11c4d5274ee07fd6f8be1a6c95",
			"Content-type: application/json",
			"User-Agent: Cox Media Group",
		),
		'content' => $data
	)
);
$context = stream_context_create($opts);
$data_response = file_get_contents($data_url, false, $context);
$data_response = json_decode($data_response);
print_r($data_response);

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.automatedinsights.com/v1/projects/ohio-school-vaccines/templates/ohio-school-vaccines-template/outputs/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Authorization: Bearer 3d20b612ad2dcfd8f4704e2a8ce5e36cbddf6b11c4d5274ee07fd6f8be1a6c95',
	'Content-Type: application/json',
	'User-Agent: Cox Media Group'
));

$result = curl_exec($ch);

curl_close($ch);

if ($result != false){
	return $result;
}
*/

//$data['push_list'] = json_decode($data_response);

?>