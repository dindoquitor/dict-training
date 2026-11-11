<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Medicine</title>

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
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
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
                Edit New Medicine
            </h3>
            <p class="text-muted">Enter the medicine's basic information.</p>
        </div>

        <!-- FORM CARD -->
        <div class="form-card">

            <form action="<?= base_url('medicine/edit') ?>" method="POST">

                <?= csrf_field() ?>

                <h5 class="text-primary mb-4">Medicine Information</h5>

                <?php if (!empty($result)): ?>

                    <div class="row g-3">

                        <input type="hidden" name="medicineid" value="<?= esc($result['medicineid']) ?>">

                        <!-- Medicine Name -->
                        <div class="col-md-6">
                            <label for="patient_fname" class="form-label">
                                Medicine Name <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="medecine_name"
                                id="medecine_name"
                                class="form-control"
                                placeholder="Enter medicine name"
                                value="<?= esc($result['medecine_name']) ?>"
                                required>
                        </div>

                        <!--  Generic Name -->
                        <div class="col-md-6">
                            <label for="patient_mname" class="form-label">
                                Generic Name <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="generic_name"
                                id="generic_name"
                                class="form-control"
                                placeholder="Enter generic name"
                                value="<?= esc($result['generic_name']) ?>"
                                required>
                        </div>

                        <!-- Brand Name -->
                        <div class="col-md-6">
                            <label for="patient_lname" class="form-label">
                                Brand Name <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="brand_name"
                                id="brand_name"
                                class="form-control"
                                placeholder="Enter brand name"
                                value="<?= esc($result['brand_name']) ?>"
                                required>
                        </div>

                        <!-- Dosage -->
                        <div class="col-md-6">
                            <label for="patient_gender" class="form-label">
                                Dosage <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="dosage"
                                id="dosage"
                                class="form-control"
                                placeholder="Enter Dosage"
                                value="<?= esc($result['dosage']) ?>"
                                required>
                        </div>

                    </div>

                    <!-- BUTTONS -->
                    <div class="d-flex justify-content-end gap-2 mt-4">

                        <a href="<?= base_url('/medicine') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i>
                            Save Medicine
                        </button>

                    </div>

                <?php endif ?>

            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>