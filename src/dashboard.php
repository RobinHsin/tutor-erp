<?php
$pageTitle = 'Dashboard';
ob_start();
?>
<h4 class="mb-4">Dashboard</h4>
<div class="row g-3">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6 class="text-muted">Students</h6>
                <h3><?= $stats['students'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6 class="text-muted">Courses</h6>
                <h3><?= $stats['classes'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6 class="text-muted">Today Course</h6>
                <h3><?= $stats['sessions_today'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6 class="text-muted">Revenue</h6>
                <h3>NT$ <?= number_format($stats['revenue_month']) ?></h3>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT . '/views/layout.php';
