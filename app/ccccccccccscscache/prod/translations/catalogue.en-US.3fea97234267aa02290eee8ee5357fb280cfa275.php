<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('en-US', array (
));

$catalogueDefault = new MessageCatalogue('default', array (
));
$catalogue->addFallbackCatalogue($catalogueDefault);

return $catalogue;
