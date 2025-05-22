<?php
include '../conexion.php';

$totalClientes = $conn->query("SELECT COUNT(*) as total FROM clientes")->fetch_assoc()['total'];
$clientesVIP = $conn->query("SELECT COUNT(*) as total FROM clientes WHERE segmento = 'VIP'")->fetch_assoc()['total'];
$promocionesActivas = $conn->query("SELECT COUNT(*) as total FROM promociones WHERE estado = 'Activa'")->fetch_assoc()['total'];
$topCliente = $conn->query("SELECT nombre FROM clientes ORDER BY gasto_total DESC LIMIT 1")->fetch_assoc()['nombre'] ?? 'Sin datos';

// Hacer variables accesibles para HTML
include 'analisis.html';
?>
