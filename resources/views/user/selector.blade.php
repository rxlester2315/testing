<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Auto populate Dropdown with jQuery AJAX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body style="background-color:gray;">
    <div class="container">
        <p>
        <h1>DROP DOWN MENU OF DOCTORSS </h1>
        </p>
        <div class="row">
            <div class="col-12">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"><b>Doctor Specialty</b></label>
                    <div class="col-sm-10">
                        <select id='sel_depart' name='sel_depart' class="form-select">
                            <option value='0'>-- Select Doctor Specialty --</option>
                            @foreach($departmentData['data'] as $department)
                            <option value='{{ $department->id }}'>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"><b>Doctors</b></label>
                    <div class="col-sm-10">
                        <select id='sel_emp' name='sel_emp' class="form-select">

                            <option value='0'>-- Available Doctors --</option>

                        </select>
                        </d iv>
                    </div>
                </div>
            </div>
        </div>
        <script type='text/javascript'>
        $(document).ready(function() {

            $('#sel_depart').change(function() {
                // Department id
                var id = $(this).val();

                // Empty the dropdown
                $('#sel_emp').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: 'getEmployees/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {

                            len = response['data'].length;

                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var name = response['data'][i].name;
                                var option = "<option value='" + id + "'>" + name +
                                    "</option>";
                                $("#sel_emp").append(option);
                            }
                        }
                    }
                });
            });
        });
        </script>
</body>

</html>