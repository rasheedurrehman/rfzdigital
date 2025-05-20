<?php
require 'vendor/autoload.php';

use Google\Client;
use Google\Service\AnalyticsData;

try {
    $client = new Client();
    $client->setAuthConfig('credentials/rfz-digital-uk-1736545897330-6a20e22e4361.json');
    $client->addScope(AnalyticsData::ANALYTICS_READONLY);
    $service = new AnalyticsData($client);

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

    // Return JSON response
    echo json_encode(["currentViewers" => $currentViewers]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
