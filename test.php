<?php
require './vendor/autoload.php';

use AkuKoder\MyKad\Extractor;
use AkuKoder\MyKad\Faker\MyKadProvider;
use AkuKoder\MyKad\Internal\Gender;
use AkuKoder\MyKad\Validator;


//print (new Extractor('871003417888'))->dateOfBirth('d/m/Y');
//print (new Extractor('871003417888'))->gender();
//print (new Extractor('871003417888'))->stateName();
$mykad = (new MyKadProvider)->mykad();
echo $mykad."\n";
dd((new Validator())->verifyStateCode($mykad));