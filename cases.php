

<?php
    // $data = file_get_contents('https://api.covid19india.org/v4/min/data.min.json');

    $data = file_get_contents('https://api.covid19india.org/data.json');

    $actualdata = json_decode($data,true);

    echo "<pre>";

    // print_r($actualdata);

    $dailyUpdates = $actualdata['cases_time_series'];
    print_r(end($dailyUpdates));
    $lastUpd = end($dailyUpdates);
    $newConf = $lastUpd['dailyconfirmed'];

    print_r($newConf);

?>




