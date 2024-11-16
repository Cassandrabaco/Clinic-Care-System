<?php
require_once '../includes/connection.php';

if(isset($_POST['appointmentdate'])) {
    $appointmentdate = $_POST['appointmentdate'];
    $dateObj = DateTime::createFromFormat('Y-m-d', $appointmentdate);
    $fixedDate = $dateObj->format('Y-m-d');

    $sql = "SELECT time_from, time_to FROM appointmenttime WHERE available_date = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo json_encode(array('error' => 'Database error'));
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $fixedDate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {
            $times = array();
            while($row = mysqli_fetch_assoc($result)) {
                $time_from = date('H:i', strtotime($row['time_from']));
                $time_to = date('H:i', strtotime($row['time_to']));
                $option_text = $time_from . ' - ' . $time_to;
                $times[] = array(
                    'time_from' => $time_from,
                    'time_to' => $time_to,
                    'option_text' => $option_text
                );
            }
            echo json_encode($times);
        } else {
            echo json_encode(array('error' => 'No available times for selected date'));
        }
        mysqli_stmt_close($stmt);
    }
} else {
    echo json_encode(array('error' => 'Appointment date not set'));
}