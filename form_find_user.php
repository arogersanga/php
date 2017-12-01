<?php
  /**
   * Fonction qui trouve si un Utilisateur existe
   *
   * @param string $email
   * @param string $password
   * @return bool
   */
  function findUser($email, $password){
    $filename = 'users.csv';
    $filenamelu= fopen($filename,"r");
    while ($tampon = fgets($filenamelu)) {
      $pwd = explode(",",$tampon);
      $exEmailDecompose=str_split($pwd[0]);
      $emailTrouve="";
      $exPwdDecompose=str_split($pwd[1]);
      $passwordTrouve="";
      foreach ($exEmailDecompose as $charactere) {
        if ($charactere != '"')
          $emailTrouve = $emailTrouve . $charactere;
      }

      if($emailTrouve == $email)
      {
        foreach ($exPwdDecompose as $charactere) {
          if ($charactere != '"')
            $passwordTrouve = $passwordTrouve . $charactere;

        if(password_verify($password,$passwordTrouve))
          return true;
        }
      }

    }
    fclose($filenamelu);
    return false;

}
?>
