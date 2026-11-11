<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        .form-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <!-- PAGE HEADER -->
    <div class="mb-4">
        <h3>
            <i class="bi bi-person-plus text-primary"></i>
            Edit New Patient
        </h3>
        <p class="text-muted">Enter the patient's basic information.</p>
    </div>

    <!-- FORM CARD -->
    <div class="form-card">

        <form action="<?= base_url('patients/edit') ?>" method="POST">

            <?= csrf_field() ?>

            <h5 class="text-primary mb-4">Patient Information</h5>

            <?php if (!empty($result)): ?>

            <div class="row g-3">

            <input type="hidden" name="patientid" value="<?= esc($result['patientid']) ?>">

                <!-- FIRST NAME -->
                <div class="col-md-6">
                    <label for="patient_fname" class="form-label">
                        First Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="patient_fname"
                        id="patient_fname"
                        class="form-control"
                        placeholder="Enter first name"
                        value="<?= esc($result['patient_fname']);?>"
                        required
                    >
                </div>

                <!-- MIDDLE NAME -->
                <div class="col-md-6">
                    <label for="patient_mname" class="form-label">
                        Middle Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="patient_mname"
                        id="patient_mname"
                        class="form-control"
                        placeholder="Enter middle name"
                        value="<?= esc($result['patient_mname']);?>"
                        required
                    >
                </div>

                  <!-- LAST NAME -->
                <div class="col-md-6">
                    <label for="patient_lname" class="form-label">
                        Last Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="patient_lname"
                        id="patient_lname"
                        class="form-control"
                        placeholder="Enter last name"
                        value="<?= esc($result['patient_lname']);?>"
                        required
                    >
                </div>

                  <!-- LAST NAME -->
                <div class="col-md-6">
                    <label for="patient_gender" class="form-label">
                        Gender <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="patient_gender"
                        id="patient_gender"
                        class="form-control"
                        value="<?= esc($result['patient_gender']);?>"
                        required
                    >
                </div>

            </div>

            <!-- BUTTONS -->
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="<?= base_url('/') ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Save Patient
                </button>

            </div>

            <?php endif ?>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>