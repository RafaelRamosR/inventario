<?php
function validar_obligatorio($obligatorio)
{
  if (empty($obligatorio) || $obligatorio == "") {
    return false;
  }
  return true;
}

function validar_fecha($fecha)
{
  $valores = explode('-', $fecha);
  if (
    count($valores) == 3 &&
    checkdate($valores[1], $valores[2], $valores[0])
  ) {
    return true;
  }
  return false;
}

function validar_texto($texto, $min, $max, $val)
{
  $texto = trim($texto);
  $requisitos = ["options" => ["regexp" => '/^[ a-z|A-Z|ñáéíóú]*$/']];

  if (isset($texto) == false || $texto == "" && $val == true) {
    return false;
  } elseif ($texto != "") {
    if (filter_var($texto, FILTER_VALIDATE_REGEXP, $requisitos) === false) {
      return false;
    }
    if (strlen($texto) < $min || strlen($texto) > $max) {
      return false;
    }
  }
  return true;
}

function validar_numero($numero, $min, $max, $val)
{
  $numero = trim($numero);
  $requisitos = ["options" => ["regexp" => '/^[.0-9]*$/']];

  if (isset($numero) == false || $numero == "" && $val == true) {
    return false;
  } elseif ($numero != "") {
    if (filter_var($numero, FILTER_VALIDATE_REGEXP, $requisitos) === false) {
      return false;
    }
    if (strlen($numero) < $min || strlen($numero) > $max) {
      return false;
    }
  }
  return true;
}

function validar_mail($mail, $min, $max, $val)
{
  if (isset($mail) == false || $mail == "" && $val == true) {
    return false;
  } elseif ($mail != "") {
    if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
      return false;
    }
    if (strlen($mail) < $min || strlen($mail) > $max) {
      return false;
    }
  }
  return true;
}

function validar_pass($pass)
{
  $pass = trim($pass);
  $requisitos = ["options" => ["regexp" => '/(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,20}$/']];

  if (isset($pass) == false || $pass == "") {
    return false;
  }
  if (!filter_var($pass, FILTER_VALIDATE_REGEXP, $requisitos)) {
    return false;
  }
  return true;
}

function validar_numeroTexto($variable, $min, $max, $val)
{
  $variable = trim($variable);
  $requisitos = ["options" => ["regexp" => '/^[a-z, |A-Z, |áéíóú, |ÁÉÍÓÚ, |ñÑ, |0-9, ]*$/']];

  if (isset($variable) == false || $variable == "" && $val == true) {
    return false;
  } elseif ($variable != "") {
    if (filter_var($variable, FILTER_VALIDATE_REGEXP, $requisitos) === false) {
      return false;
    }

    if (strlen($variable) < $min || strlen($variable) > $max) {
      return false;
    }
  }

  return true;
}
