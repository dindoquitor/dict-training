<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient Diagnosis</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .main-container {
            max-width: 1100px;
            margin: 40px auto;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #eee;
            padding: 20px;
        }

        .form-label {
            font-weight: 600;
        }

        .required {
            color: red;
        }

        .page-title {
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="container main-container">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="page-title mb-1">
                    <i class="bi bi-clipboard2-pulse text-primary"></i>
                    Add Patient Diagnosis
                </h3>
                <p class="text-muted mb-0">
                    Record a diagnosis for a registered patient.
                </p>
            </div>

            <a href="<?= base_url('patients_diagnosis') ?>"
                class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>

        </div>

        <!-- Form Card -->
        <div class="card shadow-sm">

            <div class="card-header">
                <h5 class="mb-0">
                    Patient Diagnosis Information
                </h5>
            </div>

            <div class="card-body p-4">

                <form action="<?= base_url('patients_diagnosis/store') ?>" method="POST">

                    <?= csrf_field() ?>

                    <div class="row">

                        <!-- Patient Selection -->
                        <div class="col-md-6 mb-3">

                            <label for="patientid" class="form-label">
                                Select Patient <span class="required">*</span>
                            </label>



                            <select name="patientid"
                                id="patientid"
                                class="form-select"
                                required>

                                <option value="" disabled selected>-- Select Name --</option>

                                <?php if (!empty($patients)): ?>
                                    <?php foreach ($patients as $patient): ?>

                                        <option value="<?= $patient['patientid'] ?>"><?= $patient['patient_fname'] ?> <?= $patient['patient_lname'] ?></option>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                        </div>

                        <!-- Diagnosis Selection -->
                        <div class="col-md-6 mb-3">

                            <label for="diagnosisID" class="form-label">
                                Select Diagnosis <span class="required">*</span>
                            </label>


                            <select name="diagnosisID"
                                id="diagnosisID"
                                class="form-select"
                                required>
                                <option value="" disabled selected>-- Select a Diagnosis --</option>

                                <?php if (!empty($diagnosis)): ?>
                                    <?php foreach ($diagnosis as $diagnose): ?>

                                        <option value="<?= esc($diagnose['diagnosisID']); ?>"><?= esc($diagnose['diagnosisCode']); ?> - <?= esc($diagnose['diagnosisName']); ?></option>

                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </select>

                        </div>

                        <!-- Date Diagnosed -->
                        <div class="col-md-6 mb-3">

                            <label for="dateDiagnosed" class="form-label">
                                Date Diagnosed <span class="required">*</span>
                            </label>

                            <input type="date"
                                name="dateDiagnosed"
                                id="dateDiagnosed"
                                class="form-control"
                                value="<?= old('dateDiagnosed', date('Y-m-d')) ?>"
                                max="<?= date('Y-m-d') ?>"
                                required>

                        </div>

                        <!-- Remarks -->
                        <div class="col-md-12 mb-3">

                            <label for="remarks" class="form-label">
                                Remarks
                            </label>

                            <textarea name="remarks"
                                id="remarks"
                                class="form-control"
                                rows="4"
                                placeholder="Enter additional remarks..."><?= esc(old('remarks') ?? '') ?></textarea>

                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2">

                        <a href="<?= base_url('patients_diagnosis') ?>"
                            class="btn btn-light border">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i>
                            Save Diagnosis
                        </button>

                    </div>

                </form>

            </div>

        </div>

        <div class="text-center mt-3">
            <small class="text-muted">
                Patient Management System
            </small>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>