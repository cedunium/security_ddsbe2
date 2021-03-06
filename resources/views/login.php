<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style>
        @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
        body{
          margin: 0;
          padding: 0;
          font-family: sans-serif;
          background-color: white;
          background-size: cover;
        }
        .login-box{
          width: 280px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%,-50%);
          color: black;
        }
        .login-box h1{
          float: left;
          font-size: 40px;
          border-bottom: 6px solid #4caf50;
          margin-bottom: 50px;
          padding: 13px 0;
        }
        .textbox{
          width: 100%;
          overflow: hidden;
          color: black;
          font-size: 20px;
          padding: 8px 0;
          margin: 8px 0;
          border-bottom: 1px solid #4caf50;
        }
        .textbox i{
          width: 26px;
          float: left;
          text-align: center;
        }
        .textbox input{
          border: none;
          outline: none;
          background: none;
          color: black;
          font-size: 18px;
          width: 80%;
          float: left;
          margin: 0 10px;
        }
        .btn{
          width: 100%;
          background: none;
          border: 2px solid #4caf50;
          color: black;
          padding: 5px;
          font-size: 18px;
          cursor: pointer;
          margin: 12px 0;
        }
    </style>
  </head>

  <body>
    <div class="login-box">
      <form action="validate" method="post">
        <h1>Login</h1>
    
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Username" name="username" required>
        </div>

        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="password" required>
        </div>

        <input type="submit" class="btn" value="Sign in">
      </form>
    </div>
  </body>
</html>