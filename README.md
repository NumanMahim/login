<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>
<body>
    <h1>Submit Your Surname</h1>

    <form action="process_form.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br><br>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>
        <br><br>
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required>
        <br><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone">
        <br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4"></textarea>
        <br><br>

        <label for="captcha">Captcha:</label>
        <!-- Add your CAPTCHA/verification mechanism here -->
        <br><br>

      
        <label for="favorite_sports">Favorite Sports:</label>
        <select id="favorite_sports" name="favorite_sports[]" multiple>
            <option value="football">Football</option>
            <option value="basketball">Basketball</option>
            <option value="soccer">Soccer</option>
            <option value="tennis">Tennis</option>
            <option value="cricket">Cricket</option>
            <!-- Add more sports as needed -->
        </select>
        
        <br><br>
        <input type="checkbox" id="agree_terms" name="agree_terms" required>
        <label for="agree_terms">I agree to the <a href="terms_of_service.html" target="_blank">Terms of Service</a></label>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
