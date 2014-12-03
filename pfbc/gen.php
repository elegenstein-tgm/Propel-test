<?php
session_start();
 
include("PFBC/Form.php");
$form = new Form("login");
$form->addElement(new Element_HTML('<legend>Login</legend>'));
$form->addElement(new Element_Hidden("form", "login"));
$form->addElement(new Element_Email("Email Address:", "Email", array(
    "required" => 1
)));
$form->addElement(new Element_Password("Password:", "Password", array(
    "required" => 1
)));
$form->addElement(new Element_Checkbox("", "Remember", array(
    "1" => "Remember me"
)));
$form->addElement(new Element_Button("Login"));
$form->addElement(new Element_Button("Cancel", "button", array(
    "onclick" => "history.go(-1);"
)));
$form->render();
?>
