<?php 
include 'includes/ad-header.php'; 
include 'google_analytics.php'; // Include the analytics data
?>

<!-- jQuery (required before Morris.js) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Morris.js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">RFZ Digital</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="container mt-5">
                    <h2 class="text-center">Google Analytics Dashboard</h2>
                    <div class="row">
                        <!-- Total Active Users -->
                        <div class="col-md-4">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Users</h5>
                                    <h2><?php echo $totalActiveUsers; ?></h2>
                                </div>
                            </div>
                        </div>

                        <!-- Current Viewers (Real-time users) -->
                        <div class="col-md-4">
                            <div class="card border-danger">
                                <div class="card-body">
                                    <h5 class="card-title">Current Viewers</h5>
                                    <h2 id="current-viewers">Loading...</h2> <!-- Placeholder text -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="chart-container">
                        <!-- Bar Chart -->
                        <div id="morris-bar-example" style="height: 300px"></div>
                        <!-- Weekly Line Chart -->
                        <div id="weekly-line-chart" style="height: 300px"></div>
                        <!-- Monthly Line Chart (Grouped by Weeks) -->
                        <div id="monthly-weekly-line-chart" style="height: 300px"></div>
                        <!-- Monthly Line Chart (Day by Day) -->
                        <div id="monthly-daily-line-chart" style="height: 300px"></div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <h4>Last Refreshed: <span id="current-time"><?php echo $currentTime; ?></span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(window).on('load', function(){
    var barData = <?php echo json_encode($chartData, JSON_NUMERIC_CHECK); ?>;
    var weeklyData = <?php echo json_encode($weeklyData, JSON_NUMERIC_CHECK); ?>;
    var monthlyWeeklyData = <?php echo json_encode($monthlyWeeklyData, JSON_NUMERIC_CHECK); ?>;
    var monthlyDailyData = <?php echo json_encode($monthlyDailyData, JSON_NUMERIC_CHECK); ?>;
    var currentTime = "<?php echo $currentTime; ?>";

    // Bar Chart
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

    // Weekly Line Chart
    if ($('#weekly-line-chart').length && weeklyData.length > 0) {
        new Morris.Line({
            element: 'weekly-line-chart',
            data: weeklyData,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Weekly Users'],
            lineColors: ['#007bff'],
            parseTime: false
        });
    }

    // Monthly Line Chart (Grouped by Weeks)
    if ($('#monthly-weekly-line-chart').length && monthlyWeeklyData.length > 0) {
        new Morris.Line({
            element: 'monthly-weekly-line-chart',
            data: monthlyWeeklyData,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Monthly Users (Grouped by Weeks)'],
            lineColors: ['#ff5733'],
            parseTime: false,
            hoverCallback: function (index, options, content, row) {
                return "Week: " + row.y + "<br>Start Date: " + row.startDate + "<br>Active Users: " + row.a;
            }
        });
    }

    // Monthly Line Chart (Day by Day)
    if ($('#monthly-daily-line-chart').length && monthlyDailyData.length > 0) {
        new Morris.Line({
            element: 'monthly-daily-line-chart',
            data: monthlyDailyData,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Monthly Users (Day by Day)'],
            lineColors: ['#ffc107'],
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