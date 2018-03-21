<html>
    <head>
        <title>Onze bank</title>
    </head>

    <body>

    <H1><B>Welkom bij onzebank.</B></H1>

    <form id='register' action='aanmelden.php' method='post' accept-charset='UTF-8'>

        <fieldset >

            <legend>Registreren</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>
            <label for='name' >Uw volledige naam: </label>
            <input type='text' name='name' id='name' maxlength="50" /></br>
            <label for='email' >Email Adres:</label>
            <input type='text' name='email' id='email' maxlength="50" /></br>
            <label for='username' >Gebruikersnaam:</label>
            <input type='text' name='username' id='username' maxlength="50" /></br>
            <label for='password' >Wachtwoord:</label>
            <input type='password' name='password' id='password' maxlength="50" /></br>
            <input type='submit' name='Submit' value='Submit' />



        </fieldset>
    </form>

    </body>

</html>