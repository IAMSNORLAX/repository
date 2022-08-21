<!DOCTYPE html> <!--html 선언-->

<html>
  <head>
    <meta charset='utf-8'> <!--한글 적용되도록-->
    <style>
    body{
        margin: 0;
        background-color: rgb(110, 199, 231);}

    #main{
        position: absolute;
        height:300px;
        width:400px;
        margin:-150px 0px 0px -200px;
        top: 50%;
        left:50%;
        padding: 5px;
    }


    </style>
  </head>
<body>




<div id="main">
    <div align='center'> <!--중앙 배열-->
    <span>LOGIN</span> <!--로그인 글자 나타나는 것-->

    <form method='get' action='login.php'>  <!--php 로그인 할수 있도록 -->
              <p>ID: <input name="id" type="text"></p>
              <p>PW: <input name="pw" type="password"></p>
              <input type="submit" value="LOGIN">
    </form>
    <br />
    <button id="join" oncick="location.href=' join.php'"> SIGN UP</button>
    </div>
 </div>
  
</body>

</html>




