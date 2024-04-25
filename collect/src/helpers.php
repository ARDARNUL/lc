<?php
namespace Collect;

use collect\src\Collect;

function collection(array $array = []): Collect
{
   return new Collect($array);
}
