<?php
$base = $GLOBALS['base'] ?? '';
$id = $student['id'] ?? null;
$isEdit = $id !== null;
?>
<h4><?= $isEdit ? 'Edit' : 'Add' ?></h4>
<form method="post" action="<?= $base ?>/students/<?= $isEdit ? $id . '/edit' : 'create' ?>">
    <div class="mb-3">
        <label class="form-label">Name *</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name'] ?? '') ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Birthday</label>
    </div>
    <div class="mb-3">
        <label class="form-label">Tel</label>
        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($student['phone'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($student['email'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="active" <?= ($student['status'] ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= ($student['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Update' : 'Add' ?></button>
    <a href="<?= $base ?>/students" class="btn btn-secondary">Cancel</a>
</form>
