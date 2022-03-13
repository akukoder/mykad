<?php
require './vendor/autoload.php';

use AkuKoder\MyKad\Extractor;
use AkuKoder\MyKad\Internal\Gender;


//print (new Extractor('871003417888'))->dateOfBirth('d/m/Y');
//print (new Extractor('871003417888'))->gender();
//print (new Extractor('871003417888'))->stateName();
print (new Gender('871003417887'))->value;