<form action="/www/task/new/" method="post">
    <div class="container">
        <div class="<?php echo htmlspecialchars($_alert); ?>" role="alert">
            <?php echo htmlspecialchars($_error); ?>
        </div>

        <label for="name"><b>Your Name</b></label>
        <input type="text" placeholder="Enter Username" name="name" required>

        <label for="email"><b>Your Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="task"><b>Task</b></label>
        <textarea placeholder="Enter Task Text" name="task" required></textarea>

        <button type="submit">Create</button>
    </div>
</form>