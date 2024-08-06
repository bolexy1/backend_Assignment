<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <form class="form" action="text.php" method="post">
    <label for="firstname">Firstname</label>
        <input id="firstname" type="text" name="firstname" placeholder="Firstname....." required> <br>
        <label for="Lastname">Lastname</label>
        <input id="lastname" type="text" name="lastname" placeholder="Lastname....." required>
        <br>
        <label for="Middlename">Middlename</label>
        <input id="middlename" type="text" name="middlename" placeholder="Middlename....." required> <br>
        <label for="Gender">Gender</label> <br>
        <select name="gender" id="gender" required>
            <option value="none">--</option>
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <label for="phone">Phone Number:</label><br>
        <input type="number" id="phone" name="phone" placeholder="090123567" required><br>
        <label for="wallet">Wallet Balance</label><br>
        <input type="number" id="wallet" name="wallet" placeholder="put your wallet balance here" required><br>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" placeholder="put email here....." required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    </main>
</body>
</html>