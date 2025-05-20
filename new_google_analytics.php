<?php
require 'vendor/autoload.php';

use Google\Client;
use Google\Service\AnalyticsData;

try {
    $client = new Client();
    $client->setAuthConfig('credentials/rfz-digital-uk-1736545897330-6a20e22e4361.json');
    $client->addScope(AnalyticsData::ANALYTICS_READONLY);
    $service = new AnalyticsData($client);

    $startDate = '2025-01-01';
    $endDate = date('Y-m-d');
    $currentTime = date('Y-m-d H:i:s');

    // ✅ Total Active Users
    $activeUsersRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']]
    ]);

    $activeUsersResponse = $service->properties->runReport('properties/472479059', $activeUsersRequest);
    $totalActiveUsers = $activeUsersResponse->getRows()[0]->getMetricValues()[0]->getValue() ?? 0;

    // ✅ Users Over Time (Graph Data)
    $trendRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => '30daysAgo', 'endDate' => 'today']],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'date']]
    ]);

    $trendResponse = $service->properties->runReport('properties/472479059', $trendRequest);
    $trendData = [];

    foreach ($trendResponse->getRows() as $row) {
        $trendData[] = [
            'y' => $row->getDimensionValues()[0]->getValue(),
            'a' => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ Active Users by Country & City
    $locationRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'country'], ['name' => 'city']]
    ]);

    $locationResponse = $service->properties->runReport('properties/472479059', $locationRequest);
    $locationData = [];

    foreach ($locationResponse->getRows() as $row) {
        $locationData[] = [
            "country" => $row->getDimensionValues()[0]->getValue(),
            "city" => $row->getDimensionValues()[1]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ Active Users by Device Type
    $deviceRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'deviceCategory']]
    ]);

    $deviceResponse = $service->properties->runReport('properties/472479059', $deviceRequest);
    $deviceData = [];

    foreach ($deviceResponse->getRows() as $row) {
        $deviceData[] = [
            "device" => $row->getDimensionValues()[0]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ Active Users by Traffic Source
    $trafficRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'sessionSource']]
    ]);

    $trafficResponse = $service->properties->runReport('properties/472479059', $trafficRequest);
    $trafficData = [];

    foreach ($trafficResponse->getRows() as $row) {
        $trafficData[] = [
            "source" => $row->getDimensionValues()[0]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ Active Users by Current Page
    $pageRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'pageTitle']]
    ]);

    $pageResponse = $service->properties->runReport('properties/472479059', $pageRequest);
    $pageData = [];

    foreach ($pageResponse->getRows() as $row) {
        $pageData[] = [
            "page" => $row->getDimensionValues()[0]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ New vs Returning Users
    $newReturningRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'newVsReturning']]
    ]);

    $newReturningResponse = $service->properties->runReport('properties/472479059', $newReturningRequest);
    $newReturningData = [];

    foreach ($newReturningResponse->getRows() as $row) {
        $newReturningData[] = [
            "type" => $row->getDimensionValues()[0]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ Top Landing Pages
    $landingPagesRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'landingPage']]
    ]);

    $landingPagesResponse = $service->properties->runReport('properties/472479059', $landingPagesRequest);
    $landingPagesData = [];

    foreach ($landingPagesResponse->getRows() as $row) {
        $landingPagesData[] = [
            "page" => $row->getDimensionValues()[0]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ Exit Pages
    // ✅ Exit Pages (Alternative: Based on Page Views & Event Count)
$exitPagesRequest = new Google\Service\AnalyticsData\RunReportRequest([
    'property' => 'properties/472479059',
    'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
    'metrics' => [['name' => 'eventCount']],  // Counting occurrences of page_view
    'dimensions' => [['name' => 'pagePath']], // Fetching page paths
    'dimensionFilter' => [
        'filter' => [
            'fieldName' => 'eventName',
            'stringFilter' => ['matchType' => 'EXACT', 'value' => 'page_view']
        ]
    ],
    'orderBys' => [['metric' => ['metricName' => 'eventCount'], 'desc' => true]] // Sort by most exited pages
]);

$exitPagesResponse = $service->properties->runReport('properties/472479059', $exitPagesRequest);
$exitPagesData = [];

foreach ($exitPagesResponse->getRows() as $row) {
    $exitPagesData[] = [
        "page" => $row->getDimensionValues()[0]->getValue(),
        "exits" => (int) $row->getMetricValues()[0]->getValue()
    ];
}

     // ✅ Demographics: Age & Gender
    $demographicsRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'userAgeBracket'], ['name' => 'userGender']]
    ]);

    $demographicsResponse = $service->properties->runReport('properties/472479059', $demographicsRequest);
    $demographicsData = [];

    foreach ($demographicsResponse->getRows() as $row) {
        $demographicsData[] = [
            "age" => $row->getDimensionValues()[0]->getValue(),
            "gender" => $row->getDimensionValues()[1]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

    // ✅ Browsers & OS
    $browserOSRequest = new Google\Service\AnalyticsData\RunReportRequest([
        'property' => 'properties/472479059',
        'dateRanges' => [['startDate' => $startDate, 'endDate' => $endDate]],
        'metrics' => [['name' => 'activeUsers']],
        'dimensions' => [['name' => 'browser'], ['name' => 'operatingSystem']]
    ]);

    $browserOSResponse = $service->properties->runReport('properties/472479059', $browserOSRequest);
    $browserOSData = [];

    foreach ($browserOSResponse->getRows() as $row) {
        $browserOSData[] = [
            "browser" => $row->getDimensionValues()[0]->getValue(),
            "os" => $row->getDimensionValues()[1]->getValue(),
            "users" => (int) $row->getMetricValues()[0]->getValue()
        ];
    }

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
