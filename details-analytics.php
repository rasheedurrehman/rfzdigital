<?php 
include 'includes/ad-header.php'; 
include 'new_google_analytics.php'; 
?>

<div class="container mt-5">
    <h2 class="text-center">Google Analytics Dashboard</h2>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Active Users</h5>
                    <h2><?php echo $totalActiveUsers; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Users by Country -->
        <div class="col-md-4">
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title">Users by Country</h5>
                    <ol>
                        <?php foreach ($locationData as $location) { ?>
                            <li><?php echo $location['city'] . ', ' . $location['country'] . ': ' . $location['users']; ?> users</li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Users by Device -->
        <div class="col-md-4">
            <div class="card border-warning">
                <div class="card-body">
                    <h5 class="card-title">Users by Device</h5>
                    <ol>
                        <?php foreach ($deviceData as $device) { ?>
                            <li><?php echo ucfirst($device['device']) . " - " . $device['users']; ?> Users</li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Traffic Source -->
        <div class="col-md-6">
            <div class="card border-success">
                <div class="card-body">
                    <h5 class="card-title">Total Users by Traffic Source</h5>
                    <ol>
                        <?php foreach ($trafficData as $data) { ?>
                            <li><?php echo ucfirst($data['source']) . ': ' . $data['users']; ?> users</li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Current Pages -->
        <div class="col-md-6">
            <div class="card border-danger">
                <div class="card-body">
                    <h5 class="card-title">Users on Current Pages</h5>
                    <ol>
                        <?php foreach ($pageData as $data) { ?>
                            <li><?php echo $data['page'] . ': ' . $data['users']; ?> users</li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Demographics -->
    <h3>Demographics</h3>
    <ul>
        <?php foreach ($demographicsData as $demo) { ?>
            <li><?php echo $demo['age'] . " | " . $demo['gender'] . " - " . $demo['users']; ?> Users</li>
        <?php } ?>
    </ul>

    <!-- Browsers & OS -->
    <h3>Browsers & OS</h3>
    <ul>
        <?php foreach ($browserOSData as $browser) { ?>
            <li><?php echo $browser['browser'] . " on " . $browser['os'] . " - " . $browser['users']; ?> Users</li>
        <?php } ?>
    </ul>

    <!-- New vs. Returning Users -->
    <h3>New vs. Returning Users</h3>
    <ul>
        <?php foreach ($newReturningData as $user) { ?>
            <li><?php echo ucfirst($user['type']) . " - " . $user['users']; ?> Users</li>
        <?php } ?>
    </ul>

    <!-- Top Landing Pages -->
    <h3>Top Landing Pages</h3>
    <ul>
        <?php foreach ($landingPagesData as $page) { ?>
            <li><?php echo $page['page'] . " - " . $page['users']; ?> Users</li>
        <?php } ?>
    </ul>

    <!-- Exit Pages -->
    <h3>Top Exit Pages</h3>
<ul>
    <?php foreach ($exitPagesData as $exit) { ?>
        <li><?php echo $exit['page'] . " - " . $exit['exits']; ?> Exits</li>
    <?php } ?>
</ul>


    <div id="chart-container">
        <div id="morris-bar-example" style="height: 300px"></div>
        <div id="morris-line-example" style="height: 300px"></div>
    </div>

</div>

<script>
$(window).on('load', function(){
    var barData = <?php echo json_encode($chartData, JSON_NUMERIC_CHECK); ?>;
    var lineData = <?php echo json_encode($trendData, JSON_NUMERIC_CHECK); ?>;
    var currentTime = "<?php echo $currentTime; ?>";

    if ($('#morris-bar-example').length && barData.length > 0) {
        new Morris.Bar({
            element: 'morris-bar-example',
            data: barData,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Total Users'],
            barColors: ['#28a745']
        });
    }

    if ($('#morris-line-example').length && lineData.length > 0) {
        new Morris.Line({
            element: 'morris-line-example',
            data: lineData,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Total Users'],
            lineColors: ['#007bff'],
            parseTime: false
        });
    }

    // Function to update real-time viewers every 10 seconds
    function updateCurrentViewers() {
        $.get('get_current_viewers.php', function(data) {
            try {
                var response = JSON.parse(data);
                if (response.currentViewers !== undefined) {
                    $('#current-viewers').text(response.currentViewers);
                }
            } catch (error) {
                console.log("Error parsing current viewers data: ", error);
            }
        });
    }

    // Refresh current viewers count every 10 seconds
    setInterval(updateCurrentViewers, 10000);

    // Call the function immediately on page load
    updateCurrentViewers();

    // Update current time dynamically
    setInterval(function() {
        $('#current-time').text(new Date().toLocaleString());
    }, 1000);
});
</script>

<?php include 'includes/ad-footer.php'; ?>
