
;(function ( $, window, document, undefined ) {

    var pluginName = 'packeta',
        _search = '.waxed-packeta',
        _api = [],
        defaults = {
            propertyName: "value"
        },
        inited = false
        ;

    function Instance(pluggable,element,dd){
      var that = this;
      this.pluggable = pluggable;
      this.element = element;
      this.o = element;
      this.t = pluginName;
      this.dd = dd;
      this.name = '';
      this.cfg = {
      };
      this.packetaApiKey = '';
      this.packetaOptions = {};

      this.invalidate = function(RECORD){

      },

      this.setRecord = function(RECORD){
        if (typeof that.dd.name == 'undefined') return;
        var rec = that.pluggable.getvar(that.dd.name, RECORD);
        if (typeof rec != 'object') { return; };
        //console.log('PACKETA!', rec);
        if (typeof rec.apiKey == 'string') {
          this.packetaApiKey = rec.apiKey;
        };
        if ((typeof rec.reset == 'boolean')&&(rec.reset)) {
          this.packetaOptions = {};
        };
        if (typeof rec.appIdentity == 'string') {
          this.packetaOptions.appIdentity = rec.appIdentity;
        };
        if (typeof rec.vendors == 'object') {
          this.packetaOptions.vendors = rec.vendors;
        };
        if (typeof rec.country == 'string') {
          this.packetaOptions.country = rec.country;
        };
        if (typeof rec.language == 'string') {
          this.packetaOptions.language = rec.language;
        };
        if (typeof rec.claimAssistant == 'string') {
          this.packetaOptions.claimAssistant = rec.claimAssistant;
        };
        if (typeof rec.packetConsignment == 'string') {
          this.packetaOptions.packetConsignment = rec.packetConsignment;
        };
        if (typeof rec.weight == 'number') {
          this.packetaOptions.weight = rec.weight;
        };
        if (typeof rec.length == 'number') {
          this.packetaOptions.length = rec.length;
        };
        if (typeof rec.width == 'number') {
          this.packetaOptions.width = rec.width;
        };
        if (typeof rec.depth == 'number') {
          this.packetaOptions.depth = rec.depth;
        };
        if (typeof rec.longitude == 'number') {
          this.packetaOptions.longitude = rec.longitude;
        };
        if (typeof rec.latitude == 'number') {
          this.packetaOptions.latitude = rec.latitude;
        };
        if (typeof rec.livePickupPoint == 'boolean') {
          this.packetaOptions.livePickupPoint = rec.livePickupPoint;
        };
        if (typeof rec.expeditionDay == 'string') {
          this.packetaOptions.expeditionDay = rec.expeditionDay;
        };
        if (typeof rec.defaultPrice == 'number') {
          this.packetaOptions.defaultPrice = rec.defaultPrice;
        };
        if (typeof rec.defaultCurrency == 'string') {
          this.packetaOptions.defaultCurrency = rec.defaultCurrency;
        };
        if (typeof rec.centerExternalId == 'string') {
          this.packetaOptions.centerExternalId = rec.centerExternalId;
        };
        if ((typeof rec.open == 'boolean')&&(rec.open)) {
          this.open();
        };
      },


      this.showSelectedPickupPoint = function(point) {
        const saveElement = document.querySelector(".packeta-selector-value");
        // Add here an action on pickup point selection
        //saveElement.innerText = '';
        if (point) {
          //console.log("Selected point", point);
          //console.log("Selected point gps", point.gps);
          //saveElement.innerText = "Address: " + point.formatedValue;
          if ((typeof that.dd.url == 'string')&&(typeof that.dd.action == 'string')) {
            const o = {
              'pnt': point.formatedValue,
              'gps': point.gps,
              'json': JSON.stringify(point),
              'action': that.dd.action
            };
            that.pluggable.sendData(o, that.dd.url, this);
          }
        }
      },

      this.open = function() {
        //console.log('OPEN', that.packetaApiKey);
        if (!that.packetaApiKey) return;
        that.packetaOptions.valueFormat = "\"Packeta\",id,carrierId,carrierPickupPointId,name,city,street";
        Packeta.Widget.pick(that.packetaApiKey, that.showSelectedPickupPoint, that.packetaOptions);
      },

      this.free = function() {

      },

      this.init=function() {

        //var elementType = $(this).prev().prop('nodeName');
        var elementType = $(that.element).prop('nodeName');
        //console.log('PACKETA', elementType);
        if (elementType == 'BUTTON') {
          $(that.element).off('click').on('click', function(){
            that.open();
          });
        };



        inited = true;
      },
      this._init_();
    }

    $.waxxx(pluginName, _search, Instance, _api);


})( jQuery, window, document );
/*--*/
//# sourceURL: /js/jam/boilerplate/plugin.js
