<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/Login.css" />
  <title>Document</title>
</head>

<body>
  <div class="farme">
    <div class="formContent">
      <span class="iconf">
        <ion-icon class="iconClose" name="close-outline"></ion-icon>
      </span>

      <div class="FromLS LoginForm">
        <form action="../Controller/LoginControler.php" method="post">
          <h1>Login</h1>
          <div class="inputText">
            <label htmlFor="Email"> Email</label>
            <input type="email" name="EmailL" id="Email" required />
            <ion-icon class="iconIp" name="mail-outline"></ion-icon>
            <span></span>
          </div>

          <div class="inputText">
            <label htmlFor="Pass">Password</label>
            <input type="password" name="PasswordL" id="Pass" required />
            <ion-icon class="iconIp" name="mail-outline"></ion-icon>
            <span></span>
          </div>
          <div class="selection">
            <div class="remeber">
              <input type="checkbox" name="" id="" />
              <h3>Remember</h3>
            </div>
            <a>Forgot Password</a>
          </div>
          <input class="btnSubmit" type="submit" name="submitL" value="Login" />
          <div class="btnLink mt-30U">
            <span>
              Don't have an account
              <span class="btnChange" onclick="change()"> Register </span>
            </span>
          </div>
        </form>
      </div>

      <div class="FromLS RegisterForm">
        <form action="../Controller/LoginControler.php" method="post">
          <h1>Sign Up</h1>
          <div class="inputText">
            <label htmlFor="SEmail"> Email</label>
            <input type="text" name="EmailS" id="SEmail" required />
            <ion-icon class="iconIp" name="mail-outline"></ion-icon>
            <span></span>
          </div>

          <div class="inputText">
            <label htmlFor="SPass">Password</label>
            <input type="password" name="PasswordS" id="SPass" required />
            <ion-icon class="iconIp" name="mail-outline"></ion-icon>
            <span></span>
          </div>

          <div class="inputText">
            <label htmlFor="SRPass">RePassword</label>
            <input type="password" name="RePasswordS" id="SRPass" required />
            <ion-icon class="iconIp" name="mail-outline"></ion-icon>
            <span></span>
          </div>

          <div class="inputText">
            <label htmlFor="SPass">Number Phone</label>
            <input type="text" name="PhoneS" id="SPass" required />
            <ion-icon class="iconIp" name="mail-outline"></ion-icon>
            <span></span>
          </div>
          <input class="btnSubmit" type="submit" name="submitR" value="Register" />
          <div class="btnLink mt-20U">
            <span>
              I have an account
              <span class="btnChange" onclick="change()"> Login </span>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="../js/LoginEvent.js"></script>

</html>