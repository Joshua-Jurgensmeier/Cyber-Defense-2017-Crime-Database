<?php
	function parse_request() {
		$req_data = [];

		foreach ($_GET as $key => $value) {
			error_log("GET: " . $key . " => " . $value);
			$req_data[$key] = $value;
		}

		foreach ($_POST as $key => $value) {
			error_log("POST: " . $key . " => " . $value);
			$req_data[$key] = $value;
		}

		$http_body = file_get_contents('php://input');
		if ($http_body !== '') {
			$arr = json_decode($http_body, true);
			error_log($arr);
			if ($arr == '') {
				return $req_data;
			}
			foreach ($arr as $key => $value) {
				error_log("JSON: " . $key . " => " . $value);
				$req_data[$key] = $value;
			}
		}

		return $req_data;
	}

	function check_required_attrs($req_data, $required_attrs) {
		foreach ($required_attrs as $required_attr) {
			if (!isset($req_data[$required_attr])) {
				return false;
			}
		}

		return true;
	}

	function check_extended_attrs($req_data, $extended_attrs) {
		$existing_attrs = [];
		foreach ($extended_attrs as $extended_attr) {
			if (isset($req_data[$extended_attr])) {
				$existing_attrs[] = $extended_attr;
			}
		}
		return $existing_attrs;
	}

	
?>
