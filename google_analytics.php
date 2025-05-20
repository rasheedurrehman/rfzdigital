<?php
require 'vendor/autoload.php';

use Google\Client;
use Google\Service\AnalyticsData;

try {
    $client = new Client();
    $client->setAuthConfig('credentials/rfz-digital-uk-1736545897330-6a20e22e4361.json');
    $client->addScope(AnalyticsData::ANALYTICS_READONLY);
    $service = new AnalyticsData($client);

    // Set the start date (Fixed to 13 January 2025) and end date (Dynamic - today's date)
    $startDate = '2025-01-13'; // Start from 13 January 2025
    $endDate = date('Y-m-d'); // Automatically picks today's date
    $currentTime = date('Y-m-d H:i:s'); // Get current time

    // Fetch Active Users by Country (for Bar Chart)
    $request = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'country']]
    ]);

    $response = $service->properties->runReport('properties/472479059', $request);

    $chartData = [];
    $totalActiveUsers = 0;

    foreach ($response->getRows() as $row) {
        $country = $row->getDimensionValues()[0]->getValue();
        $activeUsers = (int) $row->getMetricValues()[0]->getValue();
        $totalActiveUsers += $activeUsers;
        $chartData[] = ["y" => $country, "a" => $activeUsers]; // JSON format
    }

    // Fetch Weekly Data (from 13 January 2025 to today)
    $weeklyRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'date']]
    ]);

    $weeklyResponse = $service->properties->runReport('properties/472479059', $weeklyRequest);
    $weeklyData = [];

    foreach ($weeklyResponse->getRows() as $row) {
        $date = $row->getDimensionValues()[0]->getValue();
        $formattedDate = date("Y-m-d", strtotime($date)); // Ensure proper date format
        $activeUsers = (int) $row->getMetricValues()[0]->getValue();
        $weeklyData[] = ["y" => $formattedDate, "a" => $activeUsers];
    }

    // Sort the weekly data by date (ascending order)
    usort($weeklyData, function ($a, $b) {
        return strtotime($a['y']) - strtotime($b['y']);
    });

    // Group weekly data into weeks starting from 13 January 2025
    $monthlyWeeklyData = [];
    $weekStartDate = $startDate;
    $weekNumber = 1;

    while (strtotime($weekStartDate) <= strtotime($endDate)) {
        $weekEndDate = date('Y-m-d', strtotime($weekStartDate . ' +6 days'));
        $weekLabel = "Week " . $weekNumber;
        $weekData = array_filter($weeklyData, function ($entry) use ($weekStartDate, $weekEndDate) {
            return $entry['y'] >= $weekStartDate && $entry['y'] <= $weekEndDate;
        });

        $totalActiveUsersForWeek = array_sum(array_column($weekData, 'a'));
        $monthlyWeeklyData[] = ["y" => $weekLabel, "a" => $totalActiveUsersForWeek, "startDate" => $weekStartDate];

        $weekStartDate = date('Y-m-d', strtotime($weekStartDate . ' +7 days'));
        $weekNumber++;
    }

    // Fetch Daily Data (from 13 January 2025 to today)
    $dailyRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'date']]
    ]);

    $dailyResponse = $service->properties->runReport('properties/472479059', $dailyRequest);
    $monthlyDailyData = [];

    foreach ($dailyResponse->getRows() as $row) {
        $date = $row->getDimensionValues()[0]->getValue();
        $formattedDate = date("Y-m-d", strtotime($date)); // Ensure proper date format
        $activeUsers = (int) $row->getMetricValues()[0]->getValue();
        $monthlyDailyData[] = ["y" => $formattedDate, "a" => $activeUsers];
    }

    // Sort the daily data by date (ascending order)
    usort($monthlyDailyData, function ($a, $b) {
        return strtotime($a['y']) - strtotime($b['y']);
    });

    // Fetch Real-Time Active Users (CURRENT VIEWERS)
    $realtimeRequest = new Google\Service\AnalyticsData\RunRealtimeReportRequest([
        'property' => 'properties/472479059',
        'metrics' => [['name' => 'activeUsers']]
    ]);

    $realtimeResponse = $service->properties->runRealtimeReport('properties/472479059', $realtimeRequest);

    $currentViewers = 0;
    if (!empty($realtimeResponse->getRows())) {
        $currentViewers = (int) $realtimeResponse->getRows()[0]->getMetricValues()[0]->getValue();
    }

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>