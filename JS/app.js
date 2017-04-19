window.AppUser = {};

function AppLoadUser(callback) {
    jQuery.ajaxSetup({async:false});
    $.get("/API/Session/current.php", function(data) {
        window.AppUser = data;
    }, 'json');
    jQuery.ajaxSetup({async:true});
    AppLoadMenuItems();

    if (callback !== undefined) {
        callback();
    }
}

function AppLoadMenuItems() {
    if (window.AppUser['authed']) {
        $('.app-logged-in').removeClass('hidden-xs-up');
        $('.app-logged-out').addClass('hidden-xs-up');
    } else {
        $('.app-logged-in').addClass('hidden-xs-up');
        $('.app-logged-out').removeClass('hidden-xs-up');
    }
}

function AppLogIn(u, p) {
    jQuery.ajaxSetup({async:false});
    $.post("/API/Session/login.php", { username: u, password: p }, function(data) {
        if (data == 'success') {
            AppLoadUser();
            $('#form-results').html('<div class="alert alert-success" role="alert"><strong>Success!</strong> You successfully logged in as ' + window.AppUser['name'] + '.</div>');
        } else {
            $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred: ' + data + '.</div>');
        }
    });
    jQuery.ajaxSetup({async:true});
}

function AppCreatePerson(n, d, s) {
    jQuery.ajaxSetup({async:false});
    $.post("/API/Person/create.php", { name: n, dob: d, ssn: s }, function(data) {
        if (data == 'success') {
            $('#form-results').html('<div class="alert alert-success" role="alert"><strong>Success!</strong> You successfully created a new person.</div>');
        } else {
            $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred: ' + data + '.</div>');
        }
    });
    jQuery.ajaxSetup({async:true});
}

function AppCreateLicensePlate(p, b, m, c, o) {
    jQuery.ajaxSetup({async:false});
    $.post("/API/LicensePlate/create.php", { plate: p, brand: b, model: m, color: c, owner: o }, function(data) {
        if (data == 'success') {
            $('#form-results').html('<div class="alert alert-success" role="alert"><strong>Success!</strong> You successfully created a new license plate.</div>');
        } else {
            $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred: ' + data + '.</div>');
        }
    });
    jQuery.ajaxSetup({async:true});
}

function AppCreatePoliceReport(ro, rt, ot, t, d, rp) {
    jQuery.ajaxSetup({async:false});
    $.post("/API/PoliceReport/create.php", { reporting_officer: ro, report_time: rt, offense_time: ot, title: t, description: d, reporting_person: rp }, function(data) {
        if (data == 'success') {
            $('#form-results').html('<div class="alert alert-success" role="alert"><strong>Success!</strong> You successfully created a new police report.</div>');
        } else {
            $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred: ' + data + '.</div>');
        }
    });
    jQuery.ajaxSetup({async:true});
}

function AppCreateUser(n, p, r) {
    jQuery.ajaxSetup({async:false});
    $.post("/API/User/create.php", { name: n, password: p, role: r }, function(data) {
        if (data == 'success') {
            $('#form-results').html('<div class="alert alert-success" role="alert"><strong>Success!</strong> You successfully created a new user.</div>');
        } else {
            $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred: ' + data + '.</div>');
        }
    });
    jQuery.ajaxSetup({async:true});
}

function AppCreateWarrant(t, p, gd, sa, sb) {
    jQuery.ajaxSetup({async:false});
    $.post("/API/Warrants/create.php", { title: t, person: p, granted_date: gd, served_at: sa, served_by: sb }, function(data) {
        if (data == 'success') {
            $('#form-results').html('<div class="alert alert-success" role="alert"><strong>Success!</strong> You successfully created a new warrant.</div>');
        } else {
            $('#form-results').html('<div class="alert alert-warning" role="alert"><strong>Error!</strong> An error occurred: ' + data + '.</div>');
        }
    });
    jQuery.ajaxSetup({async:true});
}

function AppSearch(v, t) {
    if(t == 'User')
    {
        CheckAdmin();
    }

    var fields = {
        'LicensePlate': ['plate', 'brand', 'model', 'color', 'owner'],
        'Person': ['name', 'dob', 'ssn'],
        'PoliceReport': ['reporting_officer', 'report_time', 'offense_time', 'title', 'description', 'reporting_person'],
        'User': ['name', 'password', 'role'],
        'Warrants': ['title', 'person', 'granted_date', 'served_at', 'served_by']
    };

    $('#form-results').html('');

    actual_results = [];

    for (var fid in fields[t]) {
        var field = fields[t][fid];
        jQuery.ajaxSetup({async:false});
        $.get("/API/" + t + "/search.php?" + field + "=" + v, function(data) {
            if (data.substring(0, 1) == '[') {
                data = JSON.parse(data);
                for (var did in data) {
                    var d = data[did];
                    actual_results[d['id']] = d;
                }
            } else if (data.substring(0, 1) == '{') {
                data = JSON.parse(data);
                actual_results[data['id']] = data;
            }
        }, 'text');
        jQuery.ajaxSetup({async:true});
    }


    var s = '<h2>' + t + '</h2><div class="container"><table class="table table-striped">';
    s += BuildObjectHeader(t);
    for (var r in actual_results) {
        data = actual_results[r];
        s += BuildObjectTR(t, data);
    }
    s += '</div></table>';
    $('#form-results').html(s);
}

function BuildObjectHeader(t) {
    var s = '<thead class="table-inverse"><tr><td>#</td>';
    var fields = {
        'LicensePlate': ['plate', 'brand', 'model', 'color', 'owner'],
        'Person': ['name', 'dob', 'ssn'],
        'PoliceReport': ['reporting_officer', 'report_time', 'offense_time', 'title', 'description', 'reporting_person'],
        'User': ['name', 'password', 'role'],
        'Warrants': ['title', 'person', 'granted_date', 'served_at', 'served_by']
    };
    for (var k in fields[t]) {
        s += '<td>' + fields[t][k] + '</td>';
    }
    s += '<td>Edit</td></tr></thead>'
    return s;
}

function BuildObjectTR(t, d) {
    var s = '<tr id="' + t + '-' + d['id'] + '" class="editable"><td>' + d['id'] + '</td>';
    var fields = {
        'LicensePlate': ['plate', 'brand', 'model', 'color', 'owner'],
        'Person': ['name', 'dob', 'ssn'],
        'PoliceReport': ['reporting_officer', 'report_time', 'offense_time', 'title', 'description', 'reporting_person'],
        'User': ['name', 'password', 'role'],
        'Warrants': ['title', 'person', 'granted_date', 'served_at', 'served_by']
    };
    for (var k in fields[t]) {
        s += '<td>' + d[fields[t][k]] + '</td>';
    }
    s += '<td><a href="/edit.php?t=' + t + '&id=' + d['id'] + '">edit</a></td>';
    s += '</tr>'
    return s;
}

function CheckAdmin() {
    if (window.AppUser['role'] != 'admin' && window.AppUser['role'] != 'records') {
        window.location.href = '/index.php';
    }
}

$(document).ready(function() {
    AppLoadUser();
    AppLoadMenuItems();
});
