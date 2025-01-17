@extends('layouts.master')
@section('title')
    New Diagnosis Test
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Machine
        @endslot
        @slot('li2Url')
            machine.index
        @endslot
        @slot('title')
            New Diagnosis Test
        @endslot
    @endcomponent

    @include('admin.diagnosis.money-receive._form')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let csrf_token = "{{ csrf_token() }}";
            let _gender_id = '';
            let _doctor_id = '';
            let _test_id = '';
            let _selected_test = [];
            // Initialize datepicker
            // $('#dob').datepicker({
            //     dateFormat: 'yy-mm-dd',
            //     onSelect: function(dateText) {
            //         var dateParts = dateText.split('-');
            //         $('#year').val(dateParts[0]);
            //         $('#month').val(dateParts[1]);
            //         $('#day').val(dateParts[2]);
            //
            //         calculateAge(new Date(dateParts[0], dateParts[1] - 1, dateParts[2]));
            //     }
            // });

            // Validate year, month, day input
            $('#year, #month, #day').on('input', function () {
                let year = $('#year').val();
                let month = $('#month').val();
                let day = $('#day').val();

                // Validation for empty strings, negative values, and upper limits
                year = year === '' || year < 0 ? 0 : year;
                month = month === '' || month < 0 ? 0 : (month > 12 ? 12 : month);
                day = day === '' || day < 0 ? 0 : (day > 31 ? 31 : day);

                // Update the input values with the corrected data
                $('#year').val(year);
                $('#month').val(month);
                $('#day').val(day);

                if (year || month || day) {
                    let dob = calculateDOB(year, month, day);
                    $('#dob').val(dob);
                    console.log(dob);
                }
            });

            $('#dob').on('input', function () {
                let dob = $('#dob').val();
                let {years, months, days} = calculateAge(dob);

                $('#year').val(years);
                $('#month').val(months);
                $('#day').val(days);
            });

            function calculateDOB(ageYears, ageMonths, ageDays) {
                // Get the current date
                const today = new Date();

                // Subtract the age in years, months, and days
                today.setFullYear(today.getFullYear() - ageYears);
                today.setMonth(today.getMonth() - ageMonths);
                today.setDate(today.getDate() - ageDays);

                // Return the calculated date of birth
                return today;
            }

            function calculateAge(dob) {
                // Convert the date of birth string to a Date object
                const birthDate = new Date(dob);
                const today = new Date();

                // Calculate the difference in years
                let years = today.getFullYear() - birthDate.getFullYear();

                // Calculate the difference in months
                let months = today.getMonth() - birthDate.getMonth();

                // Calculate the difference in days
                let days = today.getDate() - birthDate.getDate();

                // Adjust the calculation if the current date is before the birth date in the current year
                if (days < 0) {
                    months--;
                    days += new Date(today.getFullYear(), today.getMonth(), 0).getDate(); // Days in the previous month
                }

                if (months < 0) {
                    years--;
                    months += 12;
                }

                return {
                    years: years,
                    months: months,
                    days: days
                };
            }

            // make gender dropdown
            let genderOptions = @json($genders);
            let gender_options =
                `<option value="">Select Gender</option>`;
            for (let key in genderOptions) {
                gender_options +=
                    `<option value="${key}">${genderOptions[key]}</option>`;
            }
            $("#sex").html(gender_options);

            $("#sex").change(function () {
                _gender_id = $("#sex").val();
            });

            // make doctor dropdown
            let doctorOptions = @json($doctors);
            let doctor_options =
                `<option value="">Select Doctor</option>`;
            for (let key in doctorOptions) {
                doctor_options +=
                    `<option value="${key}">${doctorOptions[key]}</option>`;
            }
            $("#doctor").html(doctor_options);

            $("#doctor").change(function () {
                _doctor_id = $("#doctor").val();
                _test_id = '';
                $("#test").val(_test_id);
            });

            // make test dropdown
            let testOptions = @json($tests);
            let test_options =
                `<option value="">Select Doctor</option>`;
            for (let key in testOptions) {
                test_options +=
                    `<option value="${key}">${testOptions[key]}</option>`;
            }
            $("#test").html(test_options);

            $("#test").change(function () {
                _test_id = $("#test").val();
                if (_doctor_id === '' || _doctor_id == null) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Please select a doctor",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
                _selected_test.push();
            });

            $('#myForm').submit(function (event) {
                event.preventDefault();

                let pbNo = $('#pb_no').val();

                let data = {
                    gender_id: _gender_id,
                    _token: csrf_token
                }
            });
        });
    </script>
@endsection
