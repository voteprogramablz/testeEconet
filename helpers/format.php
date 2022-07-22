<?php

namespace Helpers\Format;

function cpfWithoutSpecialChars(String $cpf): String
{
  return preg_replace("/\D/", '', $cpf);
}
