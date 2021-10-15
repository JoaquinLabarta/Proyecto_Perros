<?php
session_start();

// El rol nivel 3 es invitado
$_SESSION["Rol"] = 3;
header("Location: /perros");
