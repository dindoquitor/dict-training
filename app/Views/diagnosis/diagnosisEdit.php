<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Diagosis</title>

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
                Edit Diagnosis
            </h3>
            <p class="text-muted">Enter the diagnosis basic information.</p>
        </div>

        <!-- FORM CARD -->
        <div class="form-card">

            <form action="<?= base_url('diagnosis/edit') ?>" method="POST">

                <?= csrf_field() ?>

                <h5 class="text-primary mb-4">Diagnosis Information</h5>

                <?php if (!empty($result)): ?>

                    <div class="row g-3">

                        <input type="hidden" name="diagnosisID" value="<?= esc($result['diagnosisID']) ?>">

                        <!-- FIRST NAME -->
                        <div class="col-md-6">
                            <label for="diagnosisCode" class="form-label">
                                Diagnosis Code <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="diagnosisCode"
                                id="diagnosisCode"
                                class="form-control"
                                placeholder="Enter diagnosis code"
                                value="<?= esc($result['diagnosisCode'])?>"
                                required>
                        </div>

                        <!-- MIDDLE NAME -->
                        <div class="col-md-6">
                            <label for="diagnosisName" class="form-label">
                                Diagnosis Name <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="diagnosisName"
                                id="diagnosisName"
                                class="form-control"
                                placeholder="Enter diagnosis name"
                                value="<?= esc($result['diagnosisName']) ?>"
                                required>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label for="category" class="form-label">
                                Category <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="category"
                                id="category"
                                class="form-control"
                                placeholder="Enter category"
                                value="<?= esc($result['category']) ?>"
                                required>
                        </div>

                    </div>

                    <!-- BUTTONS -->
                    <div class="d-flex justify-content-end gap-2 mt-4">

                        <a href="<?= base_url('/diagnosis') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i>
                            Save Diagnosis
                        </button>

                    </div>

                <?php endif ?>

            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>