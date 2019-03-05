<form action="/www/auth/login/init/" method="get">
    <div class="container">
        <div class="<?php echo htmlspecialchars($_alert); ?>" role="alert">
            <?php echo htmlspecialchars($_error); ?>
        </div>
<!--        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
-->
        <label for="psw"><b>Email</b></label>
        <input type="email" placeholder="email@site.dom" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>
</form>