<?php
// if(!empty($_FILES['csv_file']['name'])) {

//     $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
//     $column = fgetcsv($file_data);
//     while($row = fgetcsv($file_data)) {
//         $row_data = array(
//             'firstname' => $row[0],
//             'lastname' => $row[1],
//             'student_id' => $row[2]
//         );
//     }
//     $output = array(
//         'column'    => $column,
//         'row_data' => $row_data
//     );

//     echo json_encode($output);
// }
include ('../connect.php');
function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    }

    $header = NULL;
    $result = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            if (!$header)
                $header = $row;
            else

                $result[] = array_combine($header, $row);
        }
        fclose($handle);
    }


    return $result;
}




// Insert data into database   

    $all_data = csvToArray('files/testcsv.csv');
    foreach ($all_data as $data) {

        $sql = $db->prepare("INSERT INTO students (name, roll, department) 
        VALUES (:name, :roll, :department)");
        $sql->bindParam(':name', $data['name']);
        $sql->bindParam(':roll', $data['roll']);
        $sql->bindParam(':department', $data['department']);
        $sql->execute();

    }
?>