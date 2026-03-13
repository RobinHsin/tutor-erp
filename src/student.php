<?php
$base = $GLOBALS['base'] ?? '';
$id = $student['id'] ?? null;
$isEdit = $id !== null;
?>
<h4><?= $isEdit ? '編輯學生' : '新增學生' ?></h4>
<form method="post" action="<?= $base ?>/students/<?= $isEdit ? $id . '/edit' : 'create' ?>">
    <div class="mb-3">
        <label class="form-label">姓名 *</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name'] ?? '') ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">生日</label>
    </div>
    <div class="mb-3">
        <label class="form-label">電話</label>
        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($student['phone'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($student['email'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">狀態</label>
        <select name="status" class="form-select">
            <option value="active" <?= ($student['status'] ?? '') === 'active' ? 'selected' : '' ?>>啟用</option>
            <option value="inactive" <?= ($student['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>停用</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><?= $isEdit ? '更新' : '新增' ?></button>
    <a href="<?= $base ?>/students" class="btn btn-secondary">取消</a>
</form>
