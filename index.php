<?php
/*
 * LABORATORIO #9 · Estructuras de control en PHP
 * Sigue el documento del estudiante. Escribe tu código SOLO en las zonas marcadas con TODO.
 * Recuerda: un commit por ejercicio (ej0, ej1, ... css, final).
 */

// ---------- PARTE 0 · TUS DATOS ----------
const SEMILLA = 259;
const NOMBRE = 'Ariel';
const APELLIDO = 'Jimenez';

$nombreCompleto = NOMBRE . ' ' . APELLIDO;
$edad = 8 + (SEMILLA % 70);
$dia = (SEMILLA % 7) + 1;
$mes = (SEMILLA % 12) + 1;
$nota1 = 40 + (SEMILLA % 61);
$nota2 = 40 + ((SEMILLA * 3) % 61);
$nota3 = 40 + ((SEMILLA * 7) % 61);
$monto = 20 + (SEMILLA % 181);
$esMiembro = (SEMILLA % 2) == 0;
$hora = SEMILLA % 24;
$huella = (SEMILLA * 13 + 91) % 1000;
$descuento = 0.0;
$vacio = null;

// ---------- EJERCICIO 1 · Boleto de cine (if / elseif / else) ----------
if ($edad < 12) {
    $categoria = 'Niño';
    $precio = 3.00;
} elseif ($edad < 18) {
    $categoria = 'Joven';
    $precio = 4.50;
} elseif ($edad < 60) {
    $categoria = 'Adulto';
    $precio = 7.00;
} else {
    $categoria = 'Jubilado';
    $precio = 3.50;
}

if ($dia == 3) {
    $precio = $precio * 0.5;
    $miercoles = 'Sí';
} else {
    $miercoles = 'No';
}

// ---------- EJERCICIO 2 · Notas (elseif, ternario, &&) ----------
$promedio = ($nota1 + $nota2 + $nota3) / 3;

if ($promedio >= 90) {
    $letra = 'A';
} elseif ($promedio >= 80) {
    $letra = 'B';
} elseif ($promedio >= 70) {
    $letra = 'C';
} elseif ($promedio >= 60) {
    $letra = 'D';
} else {
    $letra = 'F';
}

$estado = ($promedio >= 70) ? 'Aprobado' : 'Reprobado';

if ($promedio >= 90 && $nota1 >= 80 && $nota2 >= 80 && $nota3 >= 80) {
    $honor = 'Sí';
} else {
    $honor = 'No';
}

// ---------- EJERCICIO 3 · Día de la semana (switch) ----------
switch ($dia) {
    case 1:
        $nombreDia = 'Lunes';
        break;
    case 2:
        $nombreDia = 'Martes';
        break;
    case 3:
        $nombreDia = 'Miércoles';
        break;
    case 4:
        $nombreDia = 'Jueves';
        break;
    case 5:
        $nombreDia = 'Viernes';
        break;
    case 6:
        $nombreDia = 'Sábado';
        break;
    case 7:
        $nombreDia = 'Domingo';
        break;
    default:
        $nombreDia = 'Desconocido';
}

switch ($dia) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        $tipoDia = 'Laboral';
        break;
    case 6:
    case 7:
        $tipoDia = 'Fin de semana';
        break;
    default:
        $tipoDia = 'Desconocido';
}

// ---------- EJERCICIO 4 · Mes y estación (match) ----------
$nombreMes = match ($mes) {
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Septiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre',
    default => 'Desconocido',
};

$estacion = match ($mes) {
    12, 1, 2, 3, 4 => 'Seca',
    5, 6, 7, 8, 9, 10, 11 => 'Lluviosa',
    default => 'Desconocida',
};

// ---------- EJERCICIO 5 · Caja de la tienda (reto integrador) ----------
if ($monto >= 50) {
    if ($monto >= 150) {
        $porcentaje = 15;
    } elseif ($monto >= 100) {
        $porcentaje = 10;
    } else {
        $porcentaje = 5;
    }
} else {
    $porcentaje = 0;
}

if ($esMiembro) {
    $porcentaje = $porcentaje + 5;
}

$rebaja = $monto * $porcentaje / 100;
$subtotal = $monto - $rebaja;

if ($hora >= 22 || $hora < 6) {
    $recargo = 'Sí';
    $subtotal = $subtotal + ($subtotal * 0.03);
} else {
    $recargo = 'No';
}

$totalPagar = $subtotal + ($subtotal * 0.07);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="lab9-huella" content="<?= $huella ?>">
  <title>Lab 9 · Estructuras de control</title>
  <link rel="stylesheet" href="css/estilos.css">
  <style>
    h2 { color: #1f3a5f; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; }
  </style>
</head>
<body>
  <header>
    <h1 style="margin: 0; font-size: 1.6rem;">Laboratorio #9 · Estructuras de control</h1>
    <p id="autor">Autor: <?= $nombreCompleto ?></p>
  </header>

  <main id="lab9-jimenez">

    <section id="ej0">
      <h2>Ejercicio 0 · Tipos de datos</h2>
      <table id="ej0-tipos">
        <thead>
          <tr><th>Variable</th><th>Tipo</th></tr>
        </thead>
        <tbody>
          <tr><td>$nombreCompleto</td><td><?= gettype($nombreCompleto) ?></td></tr>
          <tr><td>$edad</td><td><?= gettype($edad) ?></td></tr>
          <tr><td>$esMiembro</td><td><?= gettype($esMiembro) ?></td></tr>
          <tr><td>$descuento</td><td><?= gettype($descuento) ?></td></tr>
          <tr><td>$vacio</td><td><?= gettype($vacio) ?></td></tr>
        </tbody>
      </table>
    </section>

    <section id="ej1">
      <h2>Ejercicio 1 · Boleto de cine</h2>
      <p id="ej1-res">Categoría: <?= $categoria ?> | Precio final: B/. <?= number_format($precio, 2) ?> | Miércoles 50%: <?= $miercoles ?></p>
    </section>

    <section id="ej2">
      <h2>Ejercicio 2 · Notas</h2>
      <p id="ej2-res" class="resultado <?= ($promedio >= 70) ? 'ok' : 'error' ?>">Promedio: <?= number_format($promedio, 2) ?> | Letra: <?= $letra ?> | Estado: <?= $estado ?> | Cuadro de honor: <?= $honor ?></p>
    </section>

    <section id="ej3">
      <h2>Ejercicio 3 · Día de la semana</h2>
      <p id="ej3-res">Día: <?= $nombreDia ?> | Tipo: <?= $tipoDia ?></p>
    </section>

    <section id="ej4">
      <h2>Ejercicio 4 · Mes y estación</h2>
      <p id="ej4-res">Mes: <?= $nombreMes ?> | Estación: <?= $estacion ?></p>
    </section>

    <section id="ej5">
      <h2>Ejercicio 5 · Caja de la tienda</h2>
      <p id="ej5-monto">Monto de compra: B/. <?= number_format($monto, 2) ?></p>
      <p id="ej5-descuento">Descuento aplicado: <?= $porcentaje ?>%</p>
      <p id="ej5-recargo">Recargo nocturno: <?= $recargo ?></p>
      <p id="ej5-total">Total a pagar: B/. <?= number_format($totalPagar, 2) ?></p>
    </section>

  </main>

  <footer id="firma">Lab 9 · <?= $nombreCompleto ?> · Semilla <?= SEMILLA ?></footer>
</body>
</html>