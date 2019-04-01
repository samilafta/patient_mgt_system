<?php

function connectDB()    {
    $connect_db = new Mysqli("localhost", "root", "", "patient_system");


    if($connect_db->connect_error) {
        die("Connection Failed : " . $connect_db->error);
    }
    return $connect_db;

}

function createAccount($fname, $uname, $pwd, $status)    {
    $sql = "INSERT INTO user(userID, fname, uname, pwd, status) VALUES (NULL, '$fname', '$uname', '$pwd', '$status')";
    $run = connectDB()->query($sql);
    return $run;
}

function loginOpd($uname, $pwd){
    $sql = "SELECT * FROM user WHERE uname = '$uname' AND pwd = '$pwd' AND status = 'opd'";
    $run = connectDB()->query($sql);
    if ($run->num_rows == 1)   {
        $fetch = $run->fetch_array();
        return $fetch;
    }   else    {
        return false;
    }

}

function loginLab($uname, $pwd){
    $sql = "SELECT * FROM user WHERE uname = '$uname' AND pwd = '$pwd' AND status = 'lab'";
    $run = connectDB()->query($sql);
    if ($run->num_rows == 1)   {
        $fetch = $run->fetch_array();
        return $fetch;
    }   else    {
        return false;
    }

}

function loginPharmarcy($uname, $pwd){
    $sql = "SELECT * FROM user WHERE uname = '$uname' AND pwd = '$pwd'";
    $run = connectDB()->query($sql);
    if ($run->num_rows == 1)   {
        $fetch = $run->fetch_array();
        return $fetch;
    }   else    {
        return false;
    }

}


function loginAdmin($uname, $pwd)   {
    $sql = "SELECT * FROM user WHERE uname = '$uname' AND pwd = '$pwd' AND status = 'admin'";
    $run = connectDB()->query($sql);
    if ($run->num_rows == 1)   {
        $fetch = $run->fetch_array();
        return $fetch;
    }   else    {
        return false;
    }
}

function loginDoctor($uname, $pwd)  {
    $sql = "SELECT * FROM user WHERE uname = '$uname' AND pwd = '$pwd' AND status = 'doctor'";
    $run = connectDB()->query($sql);
    if ($run->num_rows == 1)   {
        $fetch = $run->fetch_array();
        return $fetch;
    }   else    {
        return false;
    }
}


function viewPatients() {
    $sql = "SELECT * FROM patient ORDER BY patientID DESC";
    $run = connectDB()->query($sql);
    return $run ;
}

function viewPatient($id)   {
    $sql = "SELECT * FROM patient WHERE patientUniqueID = '$id'";
    $run = connectDB()->query($sql);
    if ($run->num_rows == 1)    {
        $fetch = $run->fetch_array();
        return $fetch;
    }   else {
        return false;
    }

}


function updatePatient($surname, $firstname, $dob, $age, $sex, $tel, $haddress, $waddress, $marital, $insurance, $nhis, $kin, $pid)   {
    $sql = "UPDATE `patient` SET `surname` = '$surname', `firstname` = '$firstname', `dob` = '$dob', `age` = '$age', `sex` = '$sex', `tel_num` = '$tel', 
            `home_address` = '$haddress', `occupation` = '$waddress', `marital_status` = '$marital', `insurance` = '$insurance', `nhis_number` = '$nhis', `next_of_kin` = '$kin' WHERE `patient`.`patientID` = '$pid'";
    $run = connectDB()->query($sql);
    return $run;
}

function deleteAppointment($pid)    {
    $sql = "DELETE FROM appointments WHERE patient_id = '$pid'";
    $run = connectDB()->query($sql);
    return $run;
}

function deletePatient($pid)    {
        deleteAppointment($pid);
        $sql = "DELETE FROM `patient` WHERE patientID = '$pid'";
        $run = connectDB()->query($sql);
        return $run;
}

function addAppointment($pid)   {
    $sql = "INSERT INTO `appointments` (`aid`, `patient_id`, `appointmentDate`) 
            VALUES (NULL, '$pid', CURRENT_TIMESTAMP)";
    $run = connectDB()->query($sql);
    return $run;
}

function allAppointments($pid)  {
    $sql = "SELECT * FROM appointments WHERE  patient_id = '$pid'";
    $run = connectDB()->query($sql);
    $fetch = $run->fetch_array();
    return $fetch;
}

function viewAppointments($pid) {
    $fetch = allAppointments($pid);
    $docID = $fetch['user_id'];
    $sql = "SELECT appointments.*, user.fname FROM `appointments` 
            JOIN user ON user.userID = '$docID' AND appointments.patient_id = '$pid';";
    $result = connectDB()->query($sql);
    return $result;
}

function addNewPatient($puid, $sname, $fname, $dob, $age, $sex, $tel, $home, $work, $marital, $insurance, $nhis, $kin)    {
    $sql = "INSERT INTO `patient` (`patientID`, `patientUniqueID`, `surname`, `firstname`, `dob`, `age`, `sex`, `tel_num`, `home_address`, `occupation`, `marital_status`, `insurance`, `nhis_number`, `next_of_kin`, `date_registered`) 
            VALUES (NULL, '$puid', '$sname', '$fname', '$dob', '$age', '$sex', '$tel', '$home', '$work', '$marital', '$insurance', '$nhis', '$kin', CURRENT_TIMESTAMP)";
    $run = connectDB()->query($sql);
    return $run;
}

function viewUsers()    {
    $sql = "SELECT * FROM user ORDER BY userID DESC";
    $run = connectDB()->query($sql);
    return $run;
}

function deleteUser($uid)   {
    $sql = "DELETE FROM user WHERE userID = '$uid'";
    $run = connectDB()->query($sql);
    return $run;
}

function addVitals($aid, $opd, $means, $resp, $pulse, $bp, $temp) {
    $sql = "INSERT INTO `vitals` (vitalsID, appointment_id, opd_id, arrival_means, respiratory_rate, pulse_rate, blood_pressure, temperature, vitals_date) 
            VALUES (NULL, '$aid', '$opd', '$means', '$resp', '$pulse', '$bp', '$temp', CURRENT_TIMESTAMP)";
    $run = connectDB()->query($sql);
    return $run;
}

function addLab($aid, $pid, $doc, $type, $date) {
    $sql = "INSERT INTO lab (labID, aid, patient_uid, requested_by, lab_type, collection_date, lab_report, report_date, signed_by)
            VALUES (NULL, '$aid', '$pid', '$doc', '$type', '$date', '', '', '')";
    $run = connectDB()->query($sql);
    return $run;
}

function addDiagnoses($aid, $doc, $complaints, $diagnoses) {
    $sql = "INSERT INTO diagnosis (diagnosisID, aid, doc_id, complaints, diagnosis, date_taken) VALUES (NULL, '$aid', '$doc', '$complaints', '$diagnoses', CURRENT_TIMESTAMP)";
    $run = connectDB()->query($sql);
    return $run;
}

function updateDiagnoses($id, $diag) {
    $sql = "UPDATE `diagnosis` SET `diagnosis` = '$diag', `date_taken` = CURRENT_TIMESTAMP WHERE `diagnosis`.`diagnosisID` = '$id'";
    $run = connectDB()->query($sql);
    return $run;
}

function addPrescription($aid, $pid, $doc, $presc) {
    $sql = "INSERT INTO pharmarcy (pharmacyID, aid, patient_id, doctor, prescription, notes, status, served_by, date_served) 
            VALUES (NULL, '$aid', '$pid', '$doc', '$presc', '', 'not served yet', '', '')";
    $run = connectDB()->query($sql);
    return $run;
}

function updateLab($id, $report, $tech) {
    $sql = "UPDATE `lab` SET `lab_report` = '$report', `report_date` = CURRENT_TIMESTAMP, `signed_by` = '$tech', `status` = 'sent' WHERE `lab`.`labID` = '$id'";
    $run = connectDB()->query($sql);
    return $run;
}

function updatePharmacy($id, $note, $phar) {
    $sql = "UPDATE `pharmarcy` SET `notes` = '$note', `status` = 'served', `served_by` = '$phar', `date_served` = CURRENT_TIMESTAMP WHERE `pharmarcy`.`pharmacyID` = '$id'";
    $run = connectDB()->query($sql);
    return $run;
}