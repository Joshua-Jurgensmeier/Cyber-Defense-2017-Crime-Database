<?php
	require_once __DIR__ . '/Includes/top.php';
    
    if(!(isset($_SESSION['admin']) and $_SESSION['admin'] == true))
    {
        header('Location: http://crime.team12.isucdc.com/index.php');
        exit("Access denied");
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Edit Record</title>
		<?php
			require_once __DIR__ . '/Includes/head.php'
		?>
		<script>AppLoadUser(CheckAdmin);</script>
	</head>
	<body>
		<?php
			require_once __DIR__ . '/Includes/header.php'
		?>
		<div class="edit-page">
			<h1 id="edit-title"></h1>
			<form id='edit-form' action="#">

			</form>
            <div id="form-results">
            </div>
		</div>
		<script>
            window.EditingTable = "<?php echo $_GET['t']; ?>";
            window.EditingID = "<?php echo $_GET['id']; ?>";

            function LoadEditingFormData() {
                jQuery.ajaxSetup({async:false});
                $.post("/API/" + window.EditingTable + "/show.php", { id: window.EditingID }, function(data) {
                    if (data.substring(0, 1) == '{') {
                        window.EditingData = JSON.parse(data);
                    } else {
                        $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred editing data: ' + data + '.</div>');
                    }
                    console.log(data);
                });
                jQuery.ajaxSetup({async:true});
            }

            function LoadEditingForm() {
                var fields = {
                    'LicensePlate': ['plate', 'brand', 'model', 'color', 'owner'],
                    'Person': ['name', 'dob', 'ssn'],
                    'PoliceReport': ['reporting_officer', 'report_time', 'offense_time', 'title', 'description', 'reporting_person'],
                    'User': ['name', 'password', 'role'],
                    'Warrants': ['title', 'person', 'granted_date', 'served_at', 'served_by']
                };

                var t = window.EditingTable;
                var s = "";
                $('#edit-form').html('');
                for (var fid in fields[t]) {
                    var field = fields[t][fid];
                    s += '<div class="form-group"><label for="' + field + '">' + field + '</label><input type="text" class="form-control" id="' + field + '" aria-describedby="Enter the ' + field + ' here." placeholder="Enter ' + field + '" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false"></div>';
                }
                s += '<button type="submit" class="btn btn-primary">Save Record</button>';
                $('#edit-form').html(s);
                for (var fid in fields[t]) {
                    var field = fields[t][fid];
                    $('#' + field).val(window.EditingData[field]);
                }
            }

			function SubmitEditForm() {
                var fields = {
                    'LicensePlate': ['plate', 'brand', 'model', 'color', 'owner'],
                    'Person': ['name', 'dob', 'ssn'],
                    'PoliceReport': ['reporting_officer', 'report_time', 'offense_time', 'title', 'description', 'reporting_person'],
                    'User': ['name', 'password', 'role'],
                    'Warrants': ['title', 'person', 'granted_date', 'served_at', 'served_by']
                };

                var t = window.EditingTable;
                for (var fid in fields[t]) {
                    var field = fields[t][fid];
                    console.log(field);
                    window.EditingData[field] = $('#' + field).val();
                    console.log(window.EditingData)
                }

                jQuery.ajaxSetup({async:false});
                $.post("/API/" + window.EditingTable + "/update.php", window.EditingData, function(data) {
                    if (data == 'success') {
                        $('#form-results').html('<div class="alert alert-success" role="alert"><strong>Success!</strong> Data saved successfully.</div>');
                    } else {
                        $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred editing data: ' + data + '.</div>');
                    }
                    console.log(data);
                });
                jQuery.ajaxSetup({async:true});
			}

			$(document).ready(function() {
                LoadEditingFormData();
                LoadEditingForm();

				$('#edit-form').submit(function(ev) {
					SubmitEditForm();
					ev.preventDefault();
				});
			});
		</script>
	</body>
</html>
