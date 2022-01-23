<?php  require('functions.php')?>
<?= header_page('../../style/style.css','../../bootstrap-5.0.2-dist/css/bootstrap.min.css','Loan')?>
<?php 
    /* Loan_date Repayment_frequency Remark Amount Repayment_end_date*/
    //retouner localhost
    $DB_HOST = explode(':',$_SERVER['HTTP_HOST'])[0]; 
    // nom de notre base de donne
    $DB_NAME = 'Bankint';
    //nom d'utilisateur
    $DB_USER='root';
    //password
    $DB_PASS=''; 
    $data_base = connect_database($DB_HOST,$DB_NAME,$DB_USER,$DB_PASS);
    $sql = "INSERT INTO `Loan` (`id`,`Responsible`,`Client`,`Amount`,`Loan_date`,`Repayment_end_date`,`Repayment_frequency`,`Benefit_payment_method`,`Capital_payment_method`,`Remark`) VALUES (NULL,?,?,?,?,?,?,?,?,?);";
    //tester si l'utilisateur envoye des valeurs vide;
      $test = false;
        $champ =[$_POST['Responsible'],$_POST['Client'],$_POST['Amount'],$_POST['Loan_date'],$_POST['Repayment_end_date'],$_POST['Repayment_frequency'],$_POST['Benefit_payment_method'],$_POST['Capital_payment_method'],$_POST['Remark']];
       // testons si les champs ne sont pas vide et qu'elles existent;
       foreach($champ as $key => $val){
           if(empty($val) == true && isset($val)==false){
                $test = false;
                break;
           }else{
             // strip_tags : va enelever les balises html lorsque l'utilisateur les tape   
                $val = strip_tags($val);
               $test = true;
           }
       }
    if($test){
        insertion($data_base,$sql,$champ); 
    }
?>
</body>
<?php header('location:../../index.php')?>