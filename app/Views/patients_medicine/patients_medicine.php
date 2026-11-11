<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management System</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #172b4d;
            color: white;
            padding: 20px 15px;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            margin-bottom: 30px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            color: #cbd5e1;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 7px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar .nav-link i {
            font-size: 18px;
            margin-right: 12px;
        }

        .sidebar .nav-link:hover {
            background: #263f65;
            color: white;
        }

        .sidebar .nav-link.active {
            background: #0d6efd;
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 25px;
        }

        .topbar {
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
        }

        /* Mobile Responsive */
        @media(max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 15px 8px;
            }

            .brand span,
            .sidebar .nav-link span {
                display: none;
            }

            .brand {
                text-align: center;
                padding: 10px 0;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 13px 5px;
            }

            .sidebar .nav-link i {
                margin: 0;
                font-size: 22px;
            }

            .main-content {
                margin-left: 70px;
                padding: 15px;
            }
        }

        .page-header,
        .content-card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
        }

        .table th {
            background: #f1f5f9;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR MENU -->
    <div class="sidebar">

        <!-- System Name -->
        <div class="brand">
            <i class="bi bi-hospital"></i>
            <span>Patient System</span>
        </div>

        <!-- Navigation -->
        <small class="text-uppercase text-secondary px-3">
            Main Menu
        </small>

        <nav class="nav flex-column mt-3">

            <a href="patients" class="nav-link">
                <i class="bi bi-people"></i>
                <span>Patient</span>
            </a>

            <a href="diagnosis" class="nav-link">
                <i class="bi bi-clipboard2-pulse"></i>
                <span>Diagnosis</span>
            </a>

            <a href="patients_diagnosis" class="nav-link active">
                <i class="bi bi-journal-medical"></i>
                <span>Patients Diagnosis</span>
            </a>

            <a href="medicine" class="nav-link">
                <i class="bi bi-capsule"></i>
                <span>Medicines</span>
            </a>

            <a href="patients_medicine" class="nav-link">
                <i class="bi bi-heart-pulse-fill"></i>
                <span>Patient's Medicine</span>
            </a>

        </nav>

    </div>

    <!-- MAIN AREA -->
    <div class="main-content">



        <!-- PAGE HEADER -->
        <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>
                <h4 class="mb-1">
                    <i class="bi bi-journal-medical text-primary"></i>
                    Patient Medicine
                </h4>
                <small class="text-muted">
                    Manage patient medicine records
                </small>
            </div>

            <a class="btn btn-primary" href="patients_medicine/add">
                <i class="bi bi-plus-circle"></i>
                Assign Medicine
            </a>

        </div>

        <!-- SUMMARY CARDS -->
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <small class="text-muted">Total Records</small>
                        <h3 id="totalRecords">3</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <small class="text-muted">Unique Patients</small>
                        <h3 id="totalPatients">3</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <small class="text-muted">Diagnosis Types</small>
                        <h3 id="totalDiagnoses">3</h3>
                    </div>
                </div>
            </div>

        </div>

        <!-- RECORDS TABLE -->
        <div class="content-card">

            <div class="row align-items-center mb-3">

                <div class="col-md-6">
                    <h5 class="mb-1">Diagnosis Records</h5>
                    <small class="text-muted">List of patient diagnosis transactions</small>
                </div>

                <div class="col-md-4 ms-auto mt-3 mt-md-0">
                    <input type="text" id="searchRecord"
                        class="form-control"
                        placeholder="Search patient or diagnosis...">
                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Medicine Name</th>
                            <th>Date Prescribed</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="diagnosisTable">

                        <?php if (!empty($result)): ?>

                            <?php foreach ($result as $medicineModel): ?>

                                <tr>
                                    <td><?= esc($medicineModel['patientmedicineid']); ?></td>
                                    <td><?= esc($medicineModel['PatientName']); ?></td>
                                    <td><?= esc($medicineModel['MnedicineName']); ?></td>
                                    <td><?= esc($medicineModel['datePrescribed']); ?></td>
                                    <td><?= esc($medicineModel['remarks']); ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white" onclick="viewRecord(this)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <a href="<?= base_url('patients_diagnosis/edit?id=' . esc($medicineModel['patientmedicineid'])) ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="<?= base_url('patients_diagnosis/delete?id=' . esc($medicineModel['patientmedicineid'])) ?>" class="btn btn-sm btn-danger">
                                            <i class=" bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    </div>



    <!-- JAVASCRIPT -->
    <script>
        function selectMenu(event, element) {

            // Prevent default link behavior
            event.preventDefault();

            // Remove active class from all menus
            document.querySelectorAll('.sidebar .nav-link')
                .forEach(menu => {
                    menu.classList.remove('active');
                });

            // Highlight selected menu
            element.classList.add('active');
        }
    </script>

</body>

</html>
