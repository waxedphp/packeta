<?php
namespace Waxedphp\Packeta;

class Setter extends \Waxedphp\Waxedphp\Php\Setters\AbstractSetter {

  /**
   * @var array<mixed> $setup
   */
  private array $setup = [
  ];
  
  /**
   * allowed options
   *
   * @var array<mixed> $_allowedOptions
   */
  protected array $_allowedOptions = [
  ];

  function setValue($value) {
    $this->setup['value'] = $value;
    return $this;
  }

  function setMode($mode) {
    $this->setup['mode'] = $mode;
    return $this;
  }

  function setTheme($theme) {
    $this->setup['theme'] = $theme;
    return $this;
  }

  function setApiKey(string $key) {
    $this->setup['apiKey'] = $key;
    return $this;
  }
  
  /**
  * webUrl	string: URL	no	Provides your e-shop address, either a full URL, or at least top level domain.
  */
  function setWebUrl(string $s) {
    $this->setup['webUrl'] = $s;
    return $this;    
  }
  
  /**
  * appIdentity	string	no	
  * Provides the e-shop software name and version, and if applicable also Packeta module version.
  * E.g. "prestashop-1.6-packeta-4.1"
  */
  function setAppIdentity(string $s) {
    $this->setup['appIdentity'] = $s;
    return $this;    
  }
  
  /**  
  * vendors	Array: Vendor	recommended	List of PUDO point vendors.
  * Only the specified vendors and their PUDO points will be displayed.
  * If not present, all vendors and all PUDO points will be displayed.
  * Available vendors respect the Allowed branch settings in the User branch settings at Packeta Client section.
  */
  function setVendors(array $a) {
    $allowedOptions = ['carrierId', 'country', 'group', 'selected', 'price', 'currency'];
    $b = [];
    foreach ($a as $k => $v) {
      $c = [];
      foreach ($v as $kk => $vv) {
        if ((in_array($kk, $allowedOptions))&&(is_scalar($vv))) {
          $c[$kk] = $vv;
        };
      };
      if (!empty($c)) $b[] = $c;
    };
    if (empty($b)) return $this; 
    $this->setup['vendors'] = $b;
    return $this;    
  }
  
  /**
  * country	string	no
  * Shows only PUDO points from particular countries, specified with ISO 3166-1 alpha-2 code in lower case and separated by comma 
  * (e.g.: au, be, gb).
  * If not set, specific PUDO points configured in the client section will be displayed.
  * Default value is based on the Allowed branch settings in the User branch settings at Packeta Client section.
  * Country restricts the list of PUDO point vendors. Consider using the vendors field.
  */
  function setCountry(string $a) {
    $this->setup['country'] = $a;
    return $this;    
  }

  /**
  * language	string[2]	recommended	Displays user interface in language specified with following options:
  * ['en', 'cs', 'bg', 'hu', 'pl', 'ro', 'sk', 'fr', 'uk', 'de', 'sl', 'lv', 'it', 'hr', 'fi', 'et', 'da', 'es', 'el', 'lt', 'nl', 'pt', 'ru', 'sv'].
  * If not set, browser preference will be used.
  * Default value is "en" language.
  */
  function setLanguage(string $a) {
    if (!in_array($a, [
      'en', 'cs', 'bg', 'hu', 'pl', 'ro', 'sk', 'fr', 'uk', 'de', 'sl', 'lv',
      'it', 'hr', 'fi', 'et', 'da', 'es', 'el', 'lt', 'nl', 'pt', 'ru', 'sv'
    ])) return $this;
    $this->setup['language'] = $a;
    return $this;    
  }

  /**
  * claimAssistant	string	no
  * If present and set to "yes", it will only display PUDO points, that provide the Claim Assistant (Return Packet) service.
  * If present and set to any other value, it will only display PUDO points that do not provide the Claim Assistant (Return Packet) service.
  */
  function setClaimAssistant(string $a) {
    if (!in_array($a, ['yes', 'no'])) return $this;
    $this->setup['claimAssistant'] = $a;
    return $this;    
  }

  /**
  * packetConsignment	string	no
  * If present and set to "yes", it will only display PUDO points, that provide new packet consignment service.
  * If present and set to any other value, it will only display PUDO points that do not provide new packet consignment service.
  */
  function setPacketConsignment(string $a) {
    if (!in_array($a, ['yes', 'no'])) return $this;
    $this->setup['packetConsignment'] = $a;
    return $this;    
  }

  /**
  * weight	float	no
  * If present, it will only display PUDO points, that accept packets of this weight in kilograms.
  */
  function setWeight(float $a) {
    $this->setup['weight'] = $a;
    return $this;    
  }

  /**
  * length	integer	no
  * If present, it will only display PUDO points, that accept packets of this length in centimeters.
  */
  function setLength(int $a) {
    $this->setup['length'] = $a;
    return $this;    
  }

  /**
  * width	integer	no
  * If present, it will only display PUDO points, that accept packets of this width in centimeters.
  */
  function setWidth(int $a) {
    $this->setup['width'] = $a;
    return $this;    
  }

  /**
  * depth	integer	no
  * If present, it will only display PUDO points, that accept packets of this depth in centimeters.
  */
  function setDepth(int $a) {
    $this->setup['depth'] = $a;
    return $this;    
  }

  /**
  * longitude	float	no
  * If web browser's location services are not allowed use longitude and latitude as current position.
  */
  function setLongitude(float $a) {
    $this->setup['longitude'] = $a;
    return $this;    
  }

  /**
  * latitude	float	no
  * If web browser's location services are not allowed use longitude and latitude as current position.
  */
  function setLatitude(float $a) {
    $this->setup['latitude'] = $a;
    return $this;    
  }

  /**
  * livePickupPoint	boolean	no
  * If present and set to true, only PUDO points where age 18+ verification service is available are displayed.
  */
  function setLivePickupPoint(bool $a) {
    $this->setup['livePickupPoint'] = $a;
    return $this;    
  }

  /**
  * expeditionDay	string: YYYY-MM-DD	no
  * Expected date of the packet expedition.
  * A PUDO point will be unavailable when the shipping date falls within the PUDO point's holiday that lasts more than 3 days.
  */
  function setExpeditionDay(string $a) {
    $this->setup['expeditionDay'] = $a;
    return $this;    
  }

  /**
  * defaultPrice	float	no
  * Default vendor's shipping price.
  * If not specified, no shiping price will be displayed.
  */
  function setDefaultPrice(float $a) {
    $this->setup['defaultPrice'] = $a;
    return $this;    
  }

  /**
  * defaultCurrency	string	no
  * Default vendor's currency ISO 4217 currency code.
  */
  function setDefaultCurrency(string $a) {
    $this->setup['defaultCurrency'] = $a;
    return $this;    
  }

  /**
  * centerExternalId	string	no
  * If present, centers the map to the PUDO point.
  */
  function setCenterExternalId(string $s) {
    $this->setup['centerExternalId'] = $s;
    return $this;    
  }
  
  function open() {
    $this->setup['open'] = true;
    return $this;
  }

  /**
  * value
  *
  * @param mixed $value
  * @return array<mixed>
  */
  public function value(mixed $value = ''): array {
    $a = [];
    $a = $this->setup;
    $b = $this->getArrayOfAllowedOptions();
    if (!empty($b)) {
      $a['config'] = $b;
    }
    $a['value'] = $value;
    return $a;
  }

}
