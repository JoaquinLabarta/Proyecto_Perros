<?php
session_start();

$_SESSION["Invitado"] = 1;
header("Location: /proyecto-perros");
