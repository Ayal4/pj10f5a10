<?php
// Inicialitzem variables per evitar warnings
$nom = $_POST['nom'] ?? null;
$visa = $_POST['visa'] ?? null;
$habitacio = $_POST['habitacio'] ?? null;
$persones = $_POST['persones'] ?? null;
$nits = $_POST['nits'] ?? null;

// Només calculem si totes les dades han arribat
if ($nom && $visa && $habitacio && $persones && $nits) {
    // Preus per nit per persona
    $preu_per_nit_b = 40; // Habitació bàsica
    $preu_per_nit_s = 50; // Habitació superior

    // Calcular el preu sense IVA
    if ($habitacio == 'bàsica') {
        $preu_sense_iva = $preu_per_nit_b * $persones * $nits;
    } else {
        $preu_sense_iva = $preu_per_nit_s * $persones * $nits;
    }

    // Calcular IVA (21%)
    $iva = $preu_sense_iva * 0.21;

    // Calcular preu amb IVA
    $preu_amb_iva = $preu_sense_iva + $iva;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <title>Detalls de la Reserva</title>
</head>
<body>
  <h1>Detalls de la Reserva TEST</h1>

  <?php if ($nom && $visa && $habitacio && $persones && $nits): ?>
    <p><strong>Nom i Cognoms:</strong> <?= htmlspecialchars($nom) ?></p>
    <p><strong>Número de VISA:</strong> <?= htmlspecialchars($visa) ?></p>
    <p><strong>Preu sense IVA:</strong> €<?= number_format($preu_sense_iva, 2) ?></p>
    <p><strong>IVA (21%):</strong> €<?= number_format($iva, 2) ?></p>
    <p><strong>Preu amb IVA:</strong> €<?= number_format($preu_amb_iva, 2) ?></p>
  <?php else: ?>
    <p><strong>⚠️ Error:</strong> No s'han rebut les dades del formulari.</p>
  <?php endif; ?>

  <br>
  <a href="index.html">Tornar al formulari</a>
</body>
</html>
