# Packeta

MIT license


---
### PHP:

```php

$pw = new PacketaWidget($this->waxed);
$pw->setApiKey(getenv('PACKETA_API_KEY'))
->setVendors([
  ['country' => "sk", 'selected' => true],
])
->setLanguage('sk')->setCountry('sk');//->open();
      
return [
'payload1' => $pw->value()
];


```
---
### HTML:

```html

<button class="waxed-packeta" data-name="ship" 
  data-url="{{:ajax}}" data-action="packeta/point/selected" 
  >Vybrať odberné miesto
</button>


```
---
---
### PHP Methods:

```php

  use \Waxedphp\Packeta\Setter as PacketaWidget;

  $obj = new PacketaWidget($this->waxed);

  /**
  * apiKey	string: URL	no
  * Provides your api key.
  */  
  $obj->function setApiKey($key);
  
  /**
  * webUrl	string: URL	no
  * Provides your e-shop address, either a full URL, or at least top level domain.
  */
  $obj->setWebUrl($s);
  
  /**
  * appIdentity	string	no	
  * Provides the e-shop software name and version, and if applicable also Packeta module version.
  * E.g. "prestashop-1.6-packeta-4.1"
  */
  $obj->setAppIdentity($s);
  
  /**  
  * vendors	Array: Vendor	recommended	List of PUDO point vendors.
  * Only the specified vendors and their PUDO points will be displayed.
  * If not present, all vendors and all PUDO points will be displayed.
  * Available vendors respect the Allowed branch settings in the User branch settings at Packeta Client section.
  */
  $obj->setVendors($a);
  
  /**
  * country	string	no
  * Shows only PUDO points from particular countries, specified with ISO 3166-1 alpha-2 code in lower case and separated by comma 
  * (e.g.: au, be, gb).
  * If not set, specific PUDO points configured in the client section will be displayed.
  * Default value is based on the Allowed branch settings in the User branch settings at Packeta Client section.
  * Country restricts the list of PUDO point vendors. Consider using the vendors field.
  */
  $obj->setCountry($a);

  /**
  * language	string[2]	recommended	Displays user interface in language specified with following options:
  * ['en', 'cs', 'bg', 'hu', 'pl', 'ro', 'sk', 'fr', 'uk', 'de', 'sl', 'lv', 'it', 'hr', 'fi', 'et', 'da', 'es', 'el', 'lt', 'nl', 'pt', 'ru', 'sv'].
  * If not set, browser preference will be used.
  * Default value is "en" language.
  */
  $obj->setLanguage($a);

  /**
  * claimAssistant	string	no
  * If present and set to "yes", it will only display PUDO points, that provide the Claim Assistant (Return Packet) service.
  * If present and set to any other value, it will only display PUDO points that do not provide the Claim Assistant (Return Packet) service.
  */
  $obj->setClaimAssistant($a);

  /**
  * packetConsignment	string	no
  * If present and set to "yes", it will only display PUDO points, that provide new packet consignment service.
  * If present and set to any other value, it will only display PUDO points that do not provide new packet consignment service.
  */
  $obj->setPacketConsignment($a);

  /**
  * weight	float	no
  * If present, it will only display PUDO points, that accept packets of this weight in kilograms.
  */
  $obj->setWeight($a);

  /**
  * length	integer	no
  * If present, it will only display PUDO points, that accept packets of this length in centimeters.
  */
  $obj->setLength($a);

  /**
  * width	integer	no
  * If present, it will only display PUDO points, that accept packets of this width in centimeters.
  */
  $obj->setWidth($a);

  /**
  * depth	integer	no
  * If present, it will only display PUDO points, that accept packets of this depth in centimeters.
  */
  $obj->setDepth($a);

  /**
  * longitude	float	no
  * If web browser's location services are not allowed use longitude and latitude as current position.
  */
  $obj->setLongitude($a);

  /**
  * latitude	float	no
  * If web browser's location services are not allowed use longitude and latitude as current position.
  */
  $obj->setLatitude($a);

  /**
  * livePickupPoint	boolean	no
  * If present and set to true, only PUDO points where age 18+ verification service is available are displayed.
  */
  $obj->setLivePickupPoint($a);

  /**
  * expeditionDay	string: YYYY-MM-DD	no
  * Expected date of the packet expedition.
  * A PUDO point will be unavailable when the shipping date falls within the PUDO point's holiday that lasts more than 3 days.
  */
  $obj->setExpeditionDay($a);

  /**
  * defaultPrice	float	no
  * Default vendor's shipping price.
  * If not specified, no shiping price will be displayed.
  */
  $obj->setDefaultPrice($a);

  /**
  * defaultCurrency	string	no
  * Default vendor's currency ISO 4217 currency code.
  */
  $obj->setDefaultCurrency($a);

  /**
  * centerExternalId	string	no
  * If present, centers the map to the PUDO point.
  */
  $obj->setCenterExternalId($s);
  
  /**
  * Opens widget without need to click on button.
  */
  $obj->open();

  /**
  * returns value into template data.
  */
  return $obj->value();


```


