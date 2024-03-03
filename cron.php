<?php
$db_host = 'localhost';
$db_name = 'tlc_wordpress';
$db_user = 'root';
$db_password = '';

function processText($text) {
    $textWithoutBrackets = preg_replace('/[()]/', '', $text);
    $processedText = preg_replace('/[\s\/]+/', '-', $textWithoutBrackets);
    $processedText = preg_replace('/^-+|-+$/', '', $processedText);
    $processedText = preg_replace('/-+/', '-', $processedText);
    $processedText = str_replace('&', '-and-', $processedText);
    $processedText = preg_replace('/[^a-zA-Z0-9-]/', '', $processedText);
    return strtolower($processedText);
}

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $api_url = 'https://api.tlcnursing.com/api/v1/vacancies?lastUpdateDateTime=' . gmdate('U');
    $api_data = file_get_contents($api_url);
    $api_data = json_decode($api_data, true);
    $api_data = $api_data['vacancies'];

    $stmt = $pdo->prepare("INSERT INTO api_vacancies (
        id, title, description, city, state_id, postal, latitude, longitude,
        client_name, duration, duration_length, post_date, start_date, end_date,
        is_hot, is_featured, total_vacancies_positions, open_vacancies_positions,
        shift_start_time, shift_end_time, profession_id, specialty_id,
        vacancy_status_id, hourly_pay_range_low, hourly_pay_range_high,
        weekly_pay_range_low, weekly_pay_range_high, bill_rate, guaranteed_hrs,
        last_update_datetime, vacancy_link
    ) VALUES (
        :id, :title, :description, :city, (SELECT id FROM api_states WHERE state_code = :state_code), :postal, :latitude, :longitude,
        :client_name, :duration, :duration_length, STR_TO_DATE(:post_date,'%m/%d/%Y'), STR_TO_DATE(:start_date,'%m/%d/%Y'), STR_TO_DATE(:end_date,'%m/%d/%Y'),
        :is_hot, :is_featured, :total_vacancies_positions, :open_vacancies_positions,
        :shift_start_time, :shift_end_time, :profession_id, :specialty_id,
        :vacancy_status_id, :hourly_pay_range_low, :hourly_pay_range_high,
        :weekly_pay_range_low, :weekly_pay_range_high, :bill_rate, :guaranteed_hrs,
        :last_update_datetime, :vacancy_link
    );");

    //$i = 0;

    foreach ($api_data as $item) {
        $id_check_sql = "SELECT id FROM api_vacancies WHERE id = :id";
        $id_stmt = $pdo->prepare($id_check_sql);
        $id_stmt->bindParam(':id', $item['id']);
        $id_stmt->execute();
        $id_result = $id_stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($id_result) > 0) {
            $pdo->query('DELETE FROM api_vacancies WHERE id = ' . $item['id'] . '');
        }

        $stmt->bindParam(':id', $item['id']);
        $stmt->bindParam(':title', $item['title']);
        $stmt->bindParam(':description', $item['description']);
        $stmt->bindParam(':city', $item['city']);
        $stmt->bindParam(':state_code', $item['stateCode']); // here
        $stmt->bindParam(':postal', $item['postal']);
        $stmt->bindParam(':latitude', $item['latitude']);
        $stmt->bindParam(':longitude', $item['longitude']);
        $stmt->bindParam(':client_name', $item['clientName']);
        $stmt->bindParam(':duration', $item['duration']);
        $stmt->bindParam(':duration_length', $item['durationLength']);
        $stmt->bindParam(':post_date', $item['postDate']);
        $stmt->bindParam(':start_date', $item['startDate']);
        $stmt->bindParam(':end_date', $item['endDate']);
        $isHot = ($item['isHot']) ? 1 : 0;
        $stmt->bindParam(':is_hot', $isHot);
        $isFeatured = ($item['isFeatured']) ? 1 : 0;
        $stmt->bindParam(':is_featured', $isFeatured);
        $stmt->bindParam(':total_vacancies_positions', $item['totalVacanciesPositions']);
        $stmt->bindParam(':open_vacancies_positions', $item['openVacanciesPositions']);
        $stmt->bindParam(':shift_start_time', $item['shiftStartTime']);
        $stmt->bindParam(':shift_end_time', $item['shiftEndTime']);
        $stmt->bindParam(':profession_id', $item['professionId']);
        $stmt->bindParam(':specialty_id', $item['specialtyId']);
        $stmt->bindParam(':vacancy_status_id', $item['vacancyStatusCode']); // here
        $stmt->bindParam(':hourly_pay_range_low', $item['hourlyPayRangeLow']);
        $stmt->bindParam(':hourly_pay_range_high', $item['hourlyPayRangeHigh']);
        $stmt->bindParam(':weekly_pay_range_low', $item['weeklyPayRangeLow']);
        $stmt->bindParam(':weekly_pay_range_high', $item['weeklyPayRangeHigh']);
        $stmt->bindParam(':bill_rate', $item['billRate']);
        $stmt->bindParam(':guaranteed_hrs', $item['guaranteedHrs']);
        $stmt->bindParam(':last_update_datetime', $item['lastUpdateDateTime']);
        $vacancyLink = processText($item['title']);
        $stmt->bindParam(':vacancy_link', $vacancyLink);
        $stmt->execute();

        //$i++;
    }

    //echo "Данные успешно добавлены в базу данных - " . $i;

} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>