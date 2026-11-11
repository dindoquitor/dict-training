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

        .main-content {
            margin-left: 250px;
            padding: 25px;
        }

        .topbar {
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
            margin-bottom: 25px;
        }

        .content-card {
            background: white;
            padding: 25px;
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
    </style>
</head>

<!-- SIDEBAR MENU -->
<div class="sidebar">

    <div>
        <a href="/" class="nav-link brand">
            <i class="bi bi-hospital"></i>
            <span>Patient System</span></a>
    </div>

    <small class="text-uppercase text-secondary px-3">
        Main Menu
    </small>

    <nav class="nav flex-column mt-3">

        <a href="/" class="nav-link">
            <i class="bi bi-people"></i>
            <span>Patient</span>
        </a>

        <a href="diagnosis" class="nav-link active">
            <i class="bi bi-clipboard2-pulse"></i>
            <span>Diagnosis</span>
        </a>

        <a href="patients_diagnosis" class="nav-link"
            onclick="selectMenu(event, this)">
            <i class="bi bi-journal-medical"></i>
            <span>Patients Diagnosis</span>
        </a>

        <a href="medicine" class="nav-link ">
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

    <!-- TOPBAR -->
    <div class="topbar">
        <h5 class="mb-0">Patient Management System</h5>
        <small class="text-muted">Diagnosis Records</small>
    </div>

    <!-- PATIENT CONTENT -->
    <div class="content-card">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>
                <h5 class="mb-1">
                    <i class="bi bi-people text-primary"></i>
                    Daignosis Lists
                </h5>
                <small class="text-muted">
                    List of Diagnosis
                </small>
            </div>

            <a href=<?= base_url('diagnosis/add') ?> class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Add Diagnosis
            </a>

        </div>

        <!-- SEARCH -->
        <div class="row mb-3">
            <div class="col-md-4 ms-auto">
                <input type="text"
                    id="searchPatient"
                    class="form-control"
                    placeholder="Search Diagnosis...">
            </div>
        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table table-hover table-bordered align-middle">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Diagnosis Code</th>
                        <th>Diagnosis Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($result)): ?>

                        <?php foreach ($result as $diagnosis): ?>

                            <tr>
                                <td><?= esc($diagnosis['diagnosisID']); ?></td>
                                <td><?= esc($diagnosis['diagnosisCode']); ?></td>
                                <td><?= esc($diagnosis['diagnosisName']); ?></td>
                                <td><?= esc($diagnosis['category']); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <a href=<?= base_url('diagnosis/edit?id=' . esc($diagnosis['diagnosisID'])) ?> class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <a href=<?= base_url('diagnosis/delete?id=' . esc($diagnosis['diagnosisID'])) ?> class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>
                </tbody>

            </table>

        </div>

        <!-- FOOTER -->
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">
                Showing 3 sample records
            </small>
        </div>

    </div>

</div>

<!-- SEARCH FUNCTION -->
<script>
    document.getElementById('searchPatient').addEventListener('keyup', function() {

        let search = this.value.toLowerCase();

        document.querySelectorAll('#patientTable tr').forEach(row => {

            let text = row.textContent.toLowerCase();

            row.style.display = text.includes(search) ? '' : 'none';

        });

    });
</script>

<body>


</body>

</html>