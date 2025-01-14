<?php
    require_once "init.php";
    
    $patients = $DATA->getAllPatients();

    if (isset($_POST["addAppointment"])) {
        $id = $_POST["patientIds"][0];
        $nurse = $_POST["nurse"];
        $datetime = $_POST["datetime"];

        $DATA->addAppointment($id, $nurse, $datetime);
        Util::saveData();

        header("location: /appointments.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Appointment System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Clinic Appointment System</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Dashboard</a></li>
                <li class="nav-item"><a href="/appointments" class="nav-link active" aria-current="page">Appointments</a></li>
                <li class="nav-item"><a href="/patients.php" class="nav-link ">Patient Info</a></li>
            </ul>
        </header>

        <div class="d-flex flex-row gap-2 justify-content-center">
            <form class="row" method="POST">
                <div class="mb-3 col-sm-12">
                    <label for="patientId" class="form-label">Patient Name</label>
                    <select id="patientIds" class="form-control" name="patientIds[]" required>
                        <?php if (!empty($patients)) { ?>
                                <?php 
                                $first = false;
                                foreach ($patients as $patient) { ?>
                                    <option value='<?= $patient->getId(); ?>' <?= $first ? 'selected' : '' ?>><?= $patient->getName(); ?></option>
                                    <?php $first = true; ?>
                                <?php } ?>
                        <?php } else { ?>
                            <option selected default>No Patients Available</option>
                        <?php } ?>
                    </select>                </div>
                <div class="mb-3 col-sm-12">
                    <label for="nurse" class="form-label">Nurse Name</label>
                    <input type="text" class="form-control" id="nurse" name="nurse">
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="datetime" class="form-label">Date Time</label>
                    <input type="datetime-local" id="datetime" class="form-control" name="datetime"/>
                </div>
                <button type="submit" class="btn btn-primary col-sm-12" name="addAppointment">Add</button>
            </form>
        </div>
    </div>
</body>

</html>