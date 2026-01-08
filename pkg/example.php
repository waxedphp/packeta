<?php

$pw = new PacketaWidget($this->waxed);
$pw->setApiKey(getenv('PACKETA_API_KEY'))
->setVendors([
  ['country' => "sk", 'selected' => true],
])
->setLanguage('sk')->setCountry('sk');//->open();
      
return [
'payload1' => $pw->value()
];

