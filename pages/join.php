<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome || Join</title>
</head>
<body>
  <form action="/zay/php/insert_mem.php" method="post" name="mem_form" enctype="multipart/form-data">
    <p>아이디 : <input type ="text" name="mem_id"></p>
    <p>비밀번호 : <input type ="password" name="mem_pass"></p>
    <p>프로필 사진 : <input type ="file" name="mem_pf"></p>
    <p>이름 : <input type ="text" name="mem_name"></p>
    <p>이메일 : <input type ="text" name="mem_email"></p>
    <p>가입일 : <input type ="text" name="mem_regi"></p>
    
    <button type="button" id="submit_btn">제출</button>
    <!--   타입에 써밋을 쓰지말아야하는 이유??  -->
  </form>

  <script>

  const submitBtn = document.querySelector("#submit_btn");

   submitBtn.addEventListener('click', function(){
     alert("abc");

     
   });


  </script>
</body>
</html>