<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<p>Masuk ke Dashboard</p>
        <form action="<?php base_url('Auth') ?>" method="post" style="max-width: 600px;">
			<div>
                <label for="name">Email/username*</label>
                <input type="text" name="username" placeholder="Your username or email" required />
                <div class="invalid-feedback">
                </div>
            </div>
            <div>
                <label for="password">Password*</label>
                <input type="password" name="password" placeholder="Enter your password" required />
                <div class="invalid-feedback">

                </div>
            </div>

            <div>
                <input type="submit" class="button button-primary" value="Login">
            </div>
        </form>
    </div>

</body>

</html>
