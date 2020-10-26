<?php include("header.html"); ?>

<div>
    <form action="signup-submit.php" method="post">
    <fieldset>
        <legend>New User Signup:</legend>

        <strong class="column">Name:</strong>
        <input type="text" name="name" size="17" maxlength="16"><br><br>

        <strong class="column">Gender:</strong>
        <input type="radio" name="gender" value="M">Male
        <input type="radio" name="gender" value="F" checked>Female<br><br>

        <strong class="column">Age:</strong>
        <input type="text" name="age" size="6" maxlength="2"><br><br>

        <strong class="column">Personality Type:</strong>
        <input type="text" name="personality_type" size="6" maxlength="4">
		<label>(<a target="_blank" href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type</a>)</label><br><br>

        <strong class="column">Favorite OS:</strong>
        <select name="favourite_os">
            <option value="Linux"> Linux</option>
            <option value="Mac OS X" > Mac OS X</option>
            <option value="Windows" selected> Windows</option>
        </select><br><br>

        <strong class="column">Seeking age:</strong>
        <input type="text" name="min_seeking_age" size="6" maxlength="2" placeholder="min"> to
        <input type="text" name="max_seeking_age" size="6" maxlength="2" placeholder="max"><br><br>

        <input type="submit" name="sign_up" value="Sign Up">
    </fieldset>
    </form>
</div>

<?php include("footer.html"); ?>
