<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Free Dental Medical Shcool Website Template | Smarteyeapps.com</title>

    <link rel="shortcut icon" href="storage/image/fav.jpg">
    <link rel="stylesheet" href="assets/css/sbootstrap.min.css">
    <link rel="stylesheet" href="assets/css/sfontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sstyle.css" />
    <style>
        #infoTable {
            border-collapse: collapse;
            width: 100%;
        }

        #infoTable th, #infoTable td {
            border: 1px solid #000;
            padding: 8px;
        }

        #infoTable tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #infoTable th {
            background-color: #ddd;
        }

        #infoTable h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="cover">
        <div class="cover-layer">
            <div class="container web-portion">
                <div class="row top-det">
                    <div class="col-md-4">
                        <div class="profil-det-img d-flex">
                            @foreach($students as $student)
                                @foreach($informations as $information)
                            <div class="dp">
                                <img src="{{ asset('storage/' . $student->image) }}" alt="User image">
                            </div>
                            <div class="pd">
                                <h2>{{$student->first_name .'   '. $student->last_name}}</h2>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 eml-mob">
                        <ul>
                            <li><i class="fas fa-envelope"></i> MySchool@gmail.com</li>
                            <li><i class="fas fa-phone-square"></i> 011-4564654</li>
                        </ul>
                    </div>
                    <div class="col-md-4 d-flex map-mark">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Syria, Damascus, Almalky </p>
                    </div>
                </div>
                <div class="nav-detail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Assignment-tab" data-toggle="tab" href="#Assignment" role="tab" aria-controls="contact" aria-selected="false">Assignment</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Us</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row no-margin home-det">
                                <div class="col-md-4 big-img">
                                    <img src="storage/image/profile-big.jpg" alt="">
                                </div>
                                <div class="col-md-8 home-dat">
                                    <div class="detal-jumbo">
                                        <h3>Welcome, Dear My School Student</h3>
                                        <p>
                                            Welcome to My School, students!

                                            We are so excited to have you here for the new school year. Whether you are a new student or a returning one, we are committed to providing you with a supportive and challenging learning environment where you can thrive.

                                            This year, we are focused on helping our students develop the skills and knowledge they need to succeed in college, careers, and life. We will also be working to create a more inclusive and equitable school community for all students.

                                            We know that the start of a new school year can be both exciting and nerve-wracking. That's why we are here to support you every step of the way. Please don't hesitate to reach out to your teachers, counselors, or other staff members if you have any questions or concerns.

                                            We look forward to a great year ahead!

                                            Sincerely,

                                            The Staff of My School</p>
                                    </div>
                                    <div class="links">
                                    </div>
                                    <div class="jumbo-address">
                                        <div class="row no-margin">
                                            <div class="col-lg-6 no-padding">
                                                <table class="addrss-list">

                                                    <tbody>
                                                    <tr>
                                                        <th>Id</th>
                                                        <td>{{$student->full_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>First Name</th>
                                                        <td>{{$student->first_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Last Name</th>
                                                        <td>{{$student->last_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Class</th>
                                                        <td>{{$information->name}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </form>
                                            </div>
                                            <div class="col-lg-6 no-padding">
                                                <table class="addrss-list">
                                                    <tbody><tr>
                                                        <th>Gender</th>
                                                        <td>{{$information->Name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Father Name</th>
                                                        <td>{{$student->s_father}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother Name</th>
                                                        <td>{{$student->s_mother}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{$student->s_address}}</td>
                                                    </tr>
                                                    </tbody>
                                                    @endforeach
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
{{--                        this is profile page --}}
                        <div class="tab-pane fade profile-tab" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="detal-jumbo">
                                <h3>our dear student's marks in subject :</h3>
                                <p>
                                    Wishing all our students the best of luck in their studies!

                                    We know that hard work and dedication are essential for success, and we are confident that you are all capable of achieving your goals.

                                    May this year be filled with learning, growth, and new experiences. We are here to support you every step of the way.

                                    Dream big, and go for it!</p>

                                        <h2>Student Mark Table:</h2>
                                        <table id="infoTable" border="1">
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Total Mark</th>
                                                <th>Student Mark</th>
                                            </tr>
                                            @foreach ($quizzes as $quiz)
                                                <tr>
                                                    <td>{{ $quiz->Name }}</td>
                                                    <td>{{ $quiz->Day }}</td>
                                                    <td>{{ $quiz->Type }}</td>
                                                    <td>{{ $quiz->Mark }}</td>
                                                    <td>{{ $quiz->TotalMark }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
{{--                        Assignment view page --}}
                                <div class="tab-pane Assignment-detail fade" id="Assignment" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="detal-jumbo">
                                        <h3>our dear student's marks in subject :</h3>
                                        <p>
                                            Wishing all our students the best of luck in their studies!

                                            We know that hard work and dedication are essential for success, and we are confident that you are all capable of achieving your goals.

                                            May this year be filled with learning, growth, and new experiences. We are here to support you every step of the way.

                                            Dream big, and go for it!</p>

                                        <h2>Assignments Table:</h2>
                                        <table id="infoTable" border="1">
                                            <tr>
                                                <th>Name Subject</th>
                                                <th>Name Assignment</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                            </tr>
                                            @foreach ($assignments as $assignment)
                                                <tr>
                                                    <td>{{ $assignment->Name }}</td>
                                                    <td>{{ $assignment->name }}</td>
                                                    <td>{{ $assignment->description }}</td>
                                                    <td>{{ $assignment->date }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
{{--                                <div class="tab-pane Assignment-detail contact-tab fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">--}}
{{--                                    <div class="row no-margin">--}}
{{--                                        <div class="col-md-6 no-padding">--}}
{{--                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3176144.0450019627!2d-107.79423426090409!3d38.97644533805396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x874014749b1856b7%3A0xc75483314990a7ff!2sColorado%2C+USA!5e0!3m2!1sen!2sin!4v1547222354537"  frameborder="0" style="border:0" allowfullscreen></iframe>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="row cont-row no-margin">--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <input placeholder="Enter Full Name" type="text" class="form-control form-control-sm">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <input placeholder="Enter Email Address" type="text" class="form-control form-control-sm">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row cont-row no-margin">--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <input placeholder="Enter Mobile Number" type="text" class="form-control form-control-sm">--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="row cont-row no-margin">--}}
{{--                                                <div class="col-sm-12">--}}
{{--                                                    <textarea placeholder="Enter your Message" class="form-control form-control-sm" rows="10"></textarea>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="row cont-row no-margin">--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <button class="btn btn-sm btn-success">Send Message</button>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function addRow(data) {
        var row = '<tr>' +
            '<td>' + data.Name + '</td>' +
            '<td>' + data.Day + '</td>' +
            '<td>' + data.teacher_id + '</td>' +
            '<td>' + data.subject_id + '</td>' +
            '<td>' + data.TotalMark + '</td>' +
            '<td>' + data.mark + '</td>' +
            '</tr>';
        $('#infoTable').append(row);
    }

    function checkUpdates() {
        $.ajax({
            url: '/check-updates',  // استبدل هذا بعنوان URL الخاص بالتحقق من التحديثات في الخادم
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.newData) {
                    addRow(response.newData);
                }
            },
            error: function() {
                console.log('حدث خطأ أثناء التحقق من التحديثات');
            }
        });
    }

    setInterval(checkUpdates, 5000);  // التحقق من التحديثات كل 5 ثواني (يمكنك تعديل هذه القيمة حسب احتياجاتك)
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function addRow(data) {
        var row = '<tr>' +
            '<td>' + data.Name + '</td>' +
            '<td>' + data.Day + '</td>' +
            '<td>' + data.TotalMark + '</td>' +
            '<td>' + data.mark + '</td>' +
            '</tr>';
        $('#infoTable').append(row);
    }

    function checkUpdates() {
        $.ajax({
            url: '/check-updates',  // استبدل هذا بعنوان URL الخاص بالتحقق من التحديثات في الخادم
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.newData) {
                    addRow(response.newData);
                }
            },
            error: function() {
                console.log('حدث خطأ أثناء التحقق من التحديثات');
            }
        });
    }

    setInterval(checkUpdates, 5000);  // التحقق من التحديثات كل 5 ثواني (يمكنك تعديل هذه القيمة حسب احتياجاتك)
</script>

<script src="assets/js/sjquery-3.2.1.min.js"></script>
<script src="assets/js/spopper.min.js"></script>
<script src="assets/js/sbootstrap.min.js"></script>
<script src="assets/js/sscript.js"></script>


</html>
{{-- لا نسى ملف
ت
ضمين التنسيق الخاص بال css --}}
