<?php
// Se adquiere la session.
session_start();

// Se destruye la session.
session_unset();
session_destroy();

// Se redirecciona al usuario a la 'Login page'.
header("Location: ../../../index.php");
