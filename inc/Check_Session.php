<?php
session_start();

//region BEGIN: alerts functions

function addAlert($message, $type='info')
{
    $alerts = isset($_SESSION['alerts']) ? $_SESSION['alerts'] : [];
    $alerts[] = ['type' => $type, 'message' => $message];

    $_SESSION['alerts'] = $alerts;
    return $alerts;
}
function addSuccessAlert($message) { return addAlert($message, 'success'); }
function addWarningAlert($message) { return addAlert($message, 'warning'); }
function addDangerAlert($message) { return addAlert($message, 'danger'); }
function renderAlerts()
{
    if (!isset($_SESSION['alerts'])) {
        return null;
    }

    $alerts = $_SESSION['alerts'];
    $html='';
    foreach ($alerts as $alert) {
        $html .= "<div class=\"alert alert-{$alert['type']} alert-dismissable\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            {$alert['message']}
        </div>";
    }

    unset($_SESSION['alerts']);
    return $html;
}
//region END: alerts functions

if(!isset($_SESSION['user_id'])){
    /*
    $_SESSION['sessionid']=session_id();//session id
    $_SESSION['User_IC_Number']=$User_IC_Number;//browser
    $_SESSION['User_FullName']=$User_FullName;//client's ip
    $_SESSION['User_Name']=$User_Name;//the username
    $_SESSION['User_Password']=$User_Password;//full name
    $_SESSION['User_Birthdate']=$User_Birthdate;
    $_SESSION['User_Email']=$User_Email;
    $_SESSION['level']=1;//user access level
    */
    header ("location: ../PHP_Files/Log_In.php?msg=You are not logged in");
}