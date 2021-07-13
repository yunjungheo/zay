<?php

  session_start();

  //세션 삭제
  unset($_SESSION['userid']);
  unset($_SESSION['userprofile']);

  echo "
    <script>
      location.href='/zay/index.php';
    </script>
  ";

?>