<?php
// ---------------------------------------------
// Script para cerrar la sesión del usuario
// Destruye la sesión y redirige al login
// ---------------------------------------------

session_start(); // Inicia la sesión (necesario para destruirla)
session_destroy(); // Elimina todos los datos de la sesión
header("Location: login.php"); // Redirige al login
