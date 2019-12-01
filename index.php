<?php
    include_once('birthdays.php');

    $person = new Birthday();
    $person->birthReminder();

    include_once('layout/header.php');
?>
<ol class="breadcrumb">
  <li><a href="https://sbsharma.com">Home</a></li>
  <li><a href="https://sbsharma.com/php">PHP</a></li>
  <li class="active">Birthday Reminder</li>
</ol>

<div class="container">
    <div class="page-header">
        <h1>Birthday Reminder <small>(<?= $person->today->format('d-M-Y'); ?>)</small></h1>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default theme-color mt-1">
                <div class="panel-heading theme-color text-center"> <span class="glyphicon glyphicon-gift"></span> What is today?</div>
                <div class="panel-body">
                    <?php if(count($person->notifications) > 0) { ?>
                        <?php foreach($person->notifications as $notification) { ?>
                            <div class="alert alert-success alert-dismissible text-center mt-1" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span class="glyphicon glyphicon-bell"></span>
                        
                                <?php 
                                    if(isset($notification['name'])){ 
                                        echo 'Wish <strong>'.$notification['name'].
                                        "</strong> a happy birthday! <br/> Whose date of birth is ".$notification['dob'].
                                        '<br/> This is '.$notification['name']."'s ".$notification['age']."th Birthday";
                                    } 
                                ?> 
                                
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="alert alert-danger text-center mt-1" role="alert">
                            <?= 'Today is '.$person->today->format('d-m-Y')." ! <br/> Nothing else"; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="panel-footer theme-color text-center">
                    Powered by 
                    <a class="link-color" href="https://sbsharma.com" target="_blank">www.sbsharma.com</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    include_once('layout/footer.php');

?>