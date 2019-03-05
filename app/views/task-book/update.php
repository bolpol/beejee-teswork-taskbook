<form action="/www/task/update/?id=<?= $_GET['id']; ?>" method="post">
    <div class="container">
        <div class="<?php echo htmlspecialchars($_alert); ?>" role="alert">
            <?php echo htmlspecialchars($_error); ?>
        </div>
        <?php if(!empty($_GET['id']) && isset($_GET['id'])): ?>
            <label for="task"><b>Task Name</b></label>
            <textarea placeholder="Enter Task Text" name="task" required></textarea>
            <label for="status"><b>Update Status</b></label>
            <input type="checkbox" placeholder="Enter Task Text" name="status" required>
            <button type="submit">Update</button>
        <?php endif; ?>
    </div>
</form>