<?php
$base = $GLOBALS['base'] ?? '';
$search = $search ?? '';
$sort = $sort ?? 'name';
$sortDir = ($_GET['dir'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
$path = '/courses';
?>
<h4>Courses</h4>
<?php if (!empty($_SESSION['flash_error'])): ?><div class="alert alert-danger"><?= htmlspecialchars($_SESSION['flash_error']); unset($_SESSION['flash_error']); ?></div><?php endif; ?>
<div class="d-flex flex-wrap gap-2 align-items-center mb-3">
    <a href="<?= $base ?>/courses/create" class="btn btn-primary">New Course</a>
    <form method="get" action="<?= $base ?><?= $path ?>" class="d-flex gap-2">
        <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">
        <input type="hidden" name="dir" value="<?= htmlspecialchars($sortDir) ?>">
        <input type="search" name="search" class="form-control form-control-sm" style="width:200px" placeholder="Search Course" value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-outline-secondary btn-sm">Search</button>
        <?php if ($search !== ''): ?><a href="<?= $base ?><?= $path ?>" class="btn btn-outline-secondary btn-sm">Clean</a><?php endif; ?>
    </form>
</div>
<table class="table table-striped">
<thead><tr><th>ID</th><th><?= sortLink($base, $path, 'name', 'Name', $sort, $sortDir) ?></th><th>Discrption</th><th>Type</th><th><?= sortLink($base, $path, 'created_at', 'Created Date', $sort, $sortDir) ?></th><th><?= sortLink($base, $path, 'status', 'Status', $sort, $sortDir) ?></th><th></th></tr></thead>
<tbody>
<?php foreach ($rows as $r): ?>
<tr>
    <td><?= (int) $r['id'] ?></td>
    <td><?= htmlspecialchars($r['name']) ?></td>
    <td><?= htmlspecialchars(mb_substr($r['description'] ?? '', 0, 50)) ?></td>
    <td><?= htmlspecialchars($r['category'] ?? '') ?></td>
    <td><?= htmlspecialchars($r['created_at'] ?? '') ?></td>
    <td><?= htmlspecialchars(statusLabel($r['status'], 'default')) ?></td>
    <td>
        <a href="<?= $base ?>/courses/<?= $r['id'] ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
        <form method="post" action="<?= $base ?>/courses/<?= $r['id'] ?>/delete" class="d-inline" onsubmit="return confirm('Delete for sure？');">
            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php require ROOT . '/views/partials/pagination.php'; ?>
