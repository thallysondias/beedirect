<?php
namespace Elementor;

class beeRooms extends Widget_Base {
  public function get_name(){
    return 'list-rooms';
  }
  public function get_title(){
    return 'Rooms';
  }
  public function get_icon(){
    return 'fa fa-bed';
  }
  public function get_categories(){
    return ['Omnibees'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
      'section_ttle',
      [
        'label' => __('Content','elementor')
      ]
    );
    $this->add_control(
      'rooms_hotel_id',
      [
        'label' => __('Hotel ID','elementor'),
        'label_block' => true,
        'type' => Controls_Manager::NUMBER,
        'title' => 'ID do Hotel Omnibees',
        'min' => 1,
        'placeholder' => __('Entender you title','elementor'),
      ]
    );
    $this->add_control(
      'rooms_currency',
      [
        'label' => __('Moeda','elementor'),
        'type' => Controls_Manager::SELECT2,
        'dynamic' => [
          'active' => true,
        ],
        'multiple' => false,
        'label_block' => true,
        'default' => [ '16', 'elementor' ],
        'options' => [
          '16' => __( 'R$ - BRL', 'elementor' ),
          '23' => __( '$ - COP', 'elementor' ),
          '34' => __( '€ - EUR', 'elementor' ),
          '66' => __( '$ - MXN', 'elementor' ),
          '108' => __( '£ - GBP', 'elementor' ),
          '109' => __( '$ - USD', 'elementor' )
        ],
      ]
    );
    $this->add_control(
      'rooms_language',
      [
        'label' => __('Idioma','elementor'),
        'type' => Controls_Manager::SELECT2,
        'dynamic' => [
          'active' => true,
        ],
        'multiple' => false,
        'label_block' => true,
        'default' => [ '8', 'elementor' ],
        'options' => [
          '1' => __( 'EN', 'elementor' ),
          '2' => __( 'FR', 'elementor' ),
          '3' => __( 'ES', 'elementor' ),
          '8' => __( 'PT-BR', 'elementor' ),
          '4' => __( 'PT-PT', 'elementor' ),
          '6' => __( 'IT', 'elementor' ),
          '7' => __( 'DE', 'elementor' ),
        ],
      ]
    );
    
    $this->end_controls_section();
  }

  protected function render(){
    $settings_rooms = $this->get_settings_for_display();
    $this->add_inline_editing_attributes('label_heading','advanced');
    $this->add_render_attribute(
      'label_heading', ['class' =>['beedirect__list-rooms']]
    );
?>

  <div <?php echo $this->get_render_attribute_string('label_heading');?>>
    <div class="omnibees-list-rooms"></div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <div class="omnibees-rooms-list">
    <div class="omnibees-calendar">
      <div class=flatpicker>
        <label>Estadia</label>
        <input id="checkInOut" type="text" data-input>
        <input name="CheckIn" type="hidden" id="checkin" value=""/>
        <input name="CheckOut" type="hidden" id="checkout" value=""/>
      </div>
      <div class="omnibees-guest">
        <label>Hóspedes</label>
        <input type="text" id="guest-information" autocomplete="off" >
        <div class="guest-box">
          <span>Selecione os Hospedes</span>
          <div class="list-guest">
            <label for="ad"><i class="fas fa-male"></i><i class="fas fa-female"></i></label>
            <select id="adult-filter" name="adult">
              <option value="1">1 Adulto</option>
              <option value="2">2 Adultos</option>
              <option value="3">3 Adultos</option>
              <option value="4">4 Adultos</option>
            </select>
          </div>
          <div class="list-guest">
            <label for="ch"><i class="fas fa-child"></i></label>
            <select id="child-filter" name="child">
              <option value="0" selected>0 Criança</option>
              <option value="1">1 Criança</option>
              <option value="2">2 Crianças</option>
              <option value="3">3 Crianças</option>
              <option value="4">4 Crianças</option>
            </select>
          </div>
          <div class="list-guest">
            <label for="in"><i class="fas fa-baby"></i></label>
            <select id="infant-filter" name="infant">
              <option value="0" selected>0 Bebe</option>
              <option value="1">1 Bebe</option>
              <option value="2">2 Bebe</option>
            </select>
          </div>
          <button id="save-guest" type="submit">Guardar</button>
        </div>
      </div>
      <div class="omnibees-promocode">
        <label>Codigo Promocional</label>
        <input type="text" name="Code" id="code">
      </div>
    </div>
    <div id="omnibees-rooms"></div>
  </div>

  <script>
  console.log("Init Omnibees List Room");
  var listRoomsApi = {
    init: function() {
      listRoomsApi.selectedDate();
      listRoomsApi.showGuest();
      listRoomsApi.initListRooms();
      listRoomsApi.listeningForm();
    },

    initListRooms: function() {
      listRoomsApi.searchResult();
      listRoomsApi.initSlider();
      listRoomsApi.showMoreRates();
    },

    selectedDate: function() {
      var today = new Date();
      var tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));

      setTimeout(function() {
        var checkInOut = $('#checkInOut').val().replace(/\s/g, '');

        var checkIn = checkInOut.split(' → ')[0].replace(/[.*+?^=!:${}()|\[\]\/\\]/g, "-");
        var checkOut = checkInOut.split(' → ')[1].replace(/[.*+?^=!:${}()|\[\]\/\\]/g, "-");

        var checkInFormated = checkIn.split("-").reverse().join("-");
        var checkOutFormated = checkOut.split("-").reverse().join("-");
        $('#checkin').val(checkInFormated);
        $('#checkout').val(checkOutFormated);

      }, 500);

      $(".flatpicker").flatpickr({
        mode: "range",
        minDate: "today",
        dateFormat: "d/m/Y",
        showMonths: 2,
        locale: {
          firstDayOfWeek: 1,
          weekdays: {
            shorthand: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
            longhand: ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"],
          },
          months: {
            shorthand: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            longhand: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
          },
          rangeSeparator: ' → '
        },
        wrap: true,
        defaultDate: ["today", tomorrow]
      })
    },

    listeningForm: function() {
      $("#checkInOut").change(function() {
        listRoomsApi.initListRooms();
      });
      $("#code").change(function() {
        listRoomsApi.initListRooms();
      });
    },

    initSlider: function() {
      setTimeout(function() {
        const carousels = document.querySelectorAll(".room-photos");
        Object.values(carousels).map(carousel => {
          const slider = new Glide(carousel, {
            type: "carousel"
          });
          slider.mount();
        });
      }, 500);
    },

    showGuest: function() {
      setTimeout(function() {
        $("#guest-information").click(function() {
          $(".guest-box").addClass("show-list");
        });
        $("#save-guest").click(function(){
          $(".guest-box").removeClass("show-list");
          listRoomsApi.initListRooms();
        });
      }, 500);
    },

    showMoreRates: function() {
      setTimeout(function() {
        $(".more-rates").click(function() {
          $(this).prev(".room-avaiable-rates").toggleClass("show-all");
          $(this).toggleClass("arrow-rotate");
        });
      }, 500);
    },

    searchResult: function() {
      <?php
        $roomsCurrency =  $settings_rooms['rooms_currency'];
        $roomsLanguage =  $settings_rooms['rooms_language'];
      ?>
      var timestamp = new Date();
      var timestampiso = timestamp.toISOString();
      var guestAdult = $('#adult-filter option:selected').val();
      var guestChild = $('#child-filter option:selected').val();
      var guestInfant = $('#infant-filter option:selected').val();
      var totalChild = parseInt(guestChild) + parseInt(guestInfant);
      var checkInOut = $('#checkInOut').val().replace(/\s/g, '');
      var checkIn = checkInOut.split('→')[0].replace(/[.*+?^=!:${}()|\[\]\/\\]/g, "-");
      var checkOut = checkInOut.split('→')[1].replace(/[.*+?^=!:${}()|\[\]\/\\]/g, "-");
      var checkInFormated = checkIn.split("-").reverse().join("-");
      var checkOutFormated = checkOut.split("-").reverse().join("-");

      $("#guest-information").val(guestAdult + " Adultos" + ", " + totalChild + " Crianças" );

      $('#checkin').val(checkInFormated);
      $('#checkout').val(checkOutFormated);

      var num, num2;
      var obj, obj2;
      var a, b, c, d, e, f, g, h, i, j, k, l;

      if ((guestChild > 0) && (guestInfant > 0)){
        var settings = {
          "url": "https://beapi.omnibees.com/api/BE/GetHotelAvail",
          "method": "POST",
          "headers": {
            "Content-Type": "application/json",
            "Authorization": "Bearer aab46c45b97d059671359e9bf122cc4a"
          },
          "data": '{"EchoToken":"aab46c45b97d059671359e9bf122cc4a","TimeStamp":"' + timestampiso + '","Target":1,"Version":0,"PrimaryLangID":<?php echo $settings_rooms['rooms_language'] ?>,"AvailRatesOnly":true,"BestOnly":false,"RequestedCurrency":<?php echo $settings_rooms['rooms_currency'] ?>,"HotelSearchCriteria":{"AvailableOnlyIndicator":false,"Criterion":{"RoomStayCandidatesType":{"RoomStayCandidates":[{"GuestCountsType":{"GuestCounts":[{ "Age":18,"AgeQualifyCode":10,"Count":'+ guestAdult +'},{ "Age":15,"AgeQualifyCode":8,"Count":'+ guestChild +'},{ "Age":1,"AgeQualifyCode":7,"Count":'+ guestInfant +'}]} }]},"HotelRefs":[{"HotelCode":<?php echo $settings_rooms['rooms_hotel_id'] ?>}],"GetPricesPerGuest":true,"StayDateRange":{"Start":"' + checkInFormated + '","End":"' + checkOutFormated + '"},"TPA_Extensions":{"MultimediaObjects": {"SendData": true},"IsForMobile":false}}}}',
        }
      }else if((guestChild > 0) && (guestInfant == 0)){
        var settings = {
          "url": "https://beapi.omnibees.com/api/BE/GetHotelAvail",
          "method": "POST",
          "headers": {
            "Content-Type": "application/json",
            "Authorization": "Bearer aab46c45b97d059671359e9bf122cc4a"
          },
          "data": '{"EchoToken":"aab46c45b97d059671359e9bf122cc4a","TimeStamp":"' + timestampiso + '","Target":1,"Version":0,"PrimaryLangID":<?php echo $settings_rooms['rooms_language'] ?>,"AvailRatesOnly":true,"BestOnly":false,"RequestedCurrency":<?php echo $settings_rooms['rooms_currency'] ?>,"HotelSearchCriteria":{"AvailableOnlyIndicator":false,"Criterion":{"RoomStayCandidatesType":{"RoomStayCandidates":[{"GuestCountsType":{"GuestCounts":[{ "Age":18,"AgeQualifyCode":10,"Count":'+ guestAdult +'},{ "Age":15,"AgeQualifyCode":8,"Count":'+ guestChild +'}]} }]},"HotelRefs":[{"HotelCode":<?php echo $settings_rooms['rooms_hotel_id'] ?>}],"GetPricesPerGuest":true,"StayDateRange":{"Start":"' + checkInFormated + '","End":"' + checkOutFormated + '"},"TPA_Extensions":{"MultimediaObjects": {"SendData": true},"IsForMobile":false}}}}',
        }
      }else if((guestChild == 0) && (guestInfant > 0)){
        var settings = {
          "url": "https://beapi.omnibees.com/api/BE/GetHotelAvail",
          "method": "POST",
          "headers": {
            "Content-Type": "application/json",
            "Authorization": "Bearer aab46c45b97d059671359e9bf122cc4a"
          },
          "data": '{"EchoToken":"aab46c45b97d059671359e9bf122cc4a","TimeStamp":"' + timestampiso + '","Target":1,"Version":0,"PrimaryLangID":<?php echo $settings_rooms['rooms_language'] ?>,"AvailRatesOnly":true,"BestOnly":false,"RequestedCurrency":<?php echo $settings_rooms['rooms_currency'] ?>,"HotelSearchCriteria":{"AvailableOnlyIndicator":false,"Criterion":{"RoomStayCandidatesType":{"RoomStayCandidates":[{"GuestCountsType":{"GuestCounts":[{ "Age":18,"AgeQualifyCode":10,"Count":'+ guestAdult +'},{ "Age":1,"AgeQualifyCode":7,"Count":'+ guestInfant +'}]} }]},"HotelRefs":[{"HotelCode":<?php echo $settings_rooms['rooms_hotel_id'] ?>}],"GetPricesPerGuest":true,"StayDateRange":{"Start":"' + checkInFormated + '","End":"' + checkOutFormated + '"},"TPA_Extensions":{"MultimediaObjects": {"SendData": true},"IsForMobile":false}}}}',
        }
      }else{
        var settings = {
          "url": "https://beapi.omnibees.com/api/BE/GetHotelAvail",
          "method": "POST",
          "headers": {
            "Content-Type": "application/json",
            "Authorization": "Bearer aab46c45b97d059671359e9bf122cc4a"
          },
          "data": '{"EchoToken":"aab46c45b97d059671359e9bf122cc4a","TimeStamp":"' + timestampiso + '","Target":1,"Version":0,"PrimaryLangID":<?php echo $settings_rooms['rooms_language'] ?>,"AvailRatesOnly":true,"BestOnly":false,"RequestedCurrency":<?php echo $settings_rooms['rooms_currency'] ?>,"HotelSearchCriteria":{"AvailableOnlyIndicator":false,"Criterion":{"RoomStayCandidatesType":{"RoomStayCandidates":[{"GuestCountsType":{"GuestCounts":[{ "Age":18,"AgeQualifyCode":10,"Count":'+ guestAdult +'}]} }]},"HotelRefs":[{"HotelCode":<?php echo $settings_rooms['rooms_hotel_id'] ?>}],"GetPricesPerGuest":true,"StayDateRange":{"Start":"' + checkInFormated + '","End":"' + checkOutFormated + '"},"TPA_Extensions":{"MultimediaObjects": {"SendData": true},"IsForMobile":false}}}}',
        }
      }
      var settings2 = {
        "url": "https://beapi.omnibees.com/api/BE/GetHotelDescriptiveInfo",
        "method": "POST",
        "headers": {
          "Content-Type": "application/json",
          "Authorization": "Bearer aab46c45b97d059671359e9bf122cc4a"
        },
        "data": '{"EchoToken":"aab46c45b97d059671359e9bf122cc4a","TimeStamp":"' + timestampiso + '","Target":1,"Version":0,"PrimaryLangID":1,"HotelDescriptiveInfosType":{"LangRequested":4,"HotelDescriptiveInfos":[{"HotelRef":{"HotelCode":<?php echo $settings_rooms['rooms_hotel_id'] ?>},"HotelInfo":{"SendData":true},"FacilityInfo":{"SendGuestRooms":true},"Policies":{"SendPolicies":true},"AreaInfo":{"SendRefPoints":true,"SendAttractions":true},"ContactInfo":{"SendData":true},"MultimediaObjects":{"SendData":true}}]}}',
      }
      $.when(
        $.ajax(settings).done(function(response) {
          obj = response;
        }),
        $.ajax(settings2).done(function(response2) {
          obj2 = response2;
        })
      ).then(function() {
        var rooms = "";
        rooms += '<div class="omnibees-rooms-list">';
        if (obj["RoomStaysType"] !== null) {
          for (a in obj.RoomStaysType.RoomStays) {
            for (b in obj.RoomStaysType.RoomStays[a].RoomTypes) {
              rooms += '<div class="rates-content">';
              rooms += '<div class="room-details">';

              //Pictures Room
              rooms += '<div class="room-photos">';
              rooms += '<div class="room-photos-carrousel" data-glide-el="track">';
              rooms += '<ul class="glide__slides">';
              for (h in obj.TPA_Extensions.MultimediaDescriptionsType.MultimediaDescriptions) {
                if (obj.TPA_Extensions.MultimediaDescriptionsType.MultimediaDescriptions[h].ID == obj.RoomStaysType.RoomStays[a].RoomTypes[b].RoomID) {
                  for (i in obj.TPA_Extensions.MultimediaDescriptionsType.MultimediaDescriptions[h].ImageItemsType.ImageItems) {
                    rooms += '<li class="glide__slide"><img src="' + obj.TPA_Extensions.MultimediaDescriptionsType.MultimediaDescriptions[h].ImageItemsType.ImageItems[i].URL.Address + '" alt="Fotos"> </li>';
                  }
                }
              }
              rooms += '</ul>';
              rooms += '<div data-glide-el="controls"><i class="fas fa-chevron-left" data-glide-dir="<"></i><i class="fas fa-chevron-right" data-glide-dir=">"></i></div>';
              rooms += '</div>';
              rooms += '</div>';
              rooms += '<div class="room-description">';

              //Room Name
              rooms += '<h3>' + obj.RoomStaysType.RoomStays[a].RoomTypes[b].RoomName + "</h3>";

              //Max. Guest per Room
              rooms += '<div class="room-max-occupation">';
              for (l in obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms) {
                if (obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[l].ID == obj.RoomStaysType.RoomStays[a].RoomTypes[b].RoomID) {
                  for (j = 1; j <= obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[l].MaxAdultOccupancy; j++) {
                    rooms += "<i class='fas fa-male'></i>";
                  }
                  for (k = 1; k <= obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[l].MaxChildOccupancy; k++) {
                    rooms += "<i class='fas fa-child'></i>";
                  }
                }
              }
              rooms += '</div>'; //Max Guest

              //Room Description
              rooms += '<div class="room-description">';
              rooms += '<p>' + obj.RoomStaysType.RoomStays[a].RoomTypes[b].RoomDescription.Description + '</p>';
              rooms += '</div>';
              rooms += '</div>';
              rooms += '</div>';
              rooms += '<div class="room-avaiable-rates">';
              //List of rooms
              for (c in obj.RoomStaysType.RoomStays[a].RoomRates) {
                if (obj.RoomStaysType.RoomStays[a].RoomTypes[b].RoomID == obj.RoomStaysType.RoomStays[a].RoomRates[c].RoomID && obj.RoomStaysType.RoomStays[a].RoomRates[c].Total !== null) {
                  for (g in obj.RoomStaysType.RoomStays[a].RatePlans) {
                    if (obj.RoomStaysType.RoomStays[a].RatePlans[g].RatePlanID == obj.RoomStaysType.RoomStays[a].RoomRates[c].RatePlanID) {
                      rooms += '<div class="rate-details">';
                      rooms += '<div class="rate-description">';
                      rooms += '<div class="rate-name"><i class="fas fa-info-circle"></i>' + obj.RoomStaysType.RoomStays[a].RatePlans[g].CancelPenalties[0].PenaltyDescription.Name + '</div>';
                      rooms += '<ul class="rate-info">';
                      //Has meal?
                      if (obj.RoomStaysType.RoomStays[a].RatePlans[g].MealsIncluded !== null && obj.RoomStaysType.RoomStays[a].RatePlans[g].MealsIncluded.MealPlanCode == "1" || obj.RoomStaysType.RoomStays[a].RatePlans[g].MealsIncluded !== null && obj.RoomStaysType.RoomStays[a].RatePlans[g].MealsIncluded.MealPlanCode == "3") {
                        rooms += '<li><i class="fas fa-utensils"></i>' + obj.RoomStaysType.RoomStays[a].RatePlans[g].MealsIncluded.Name + +'</li>';
                      }
                      //Amenities Included
                      if (obj.RoomStaysType.RoomStays[a].RatePlans[g].RatePlanInclusions !== null) {
                        for (j in obj.RoomStaysType.RoomStays[a].RatePlans[g].RatePlanInclusions) {
                          rooms += '<li><i class="fas fa-check"></i>' + obj.RoomStaysType.RoomStays[a].RatePlans[g].RatePlanInclusions[j].RatePlanInclusionDesciption.Name + "</li>";
                        }
                      }
                      //Alert last room
                      if (obj.RoomStaysType.RoomStays[a].RoomRates[c].RatesType.Rates[0].NumberOfUnits <= 2) {
                        rooms += "<div class='alert-last-room'><i class='fas fa-exclamation'></i>Restam " + obj.RoomStaysType.RoomStays[a].RoomRates[c].RatesType.Rates[0].NumberOfUnits + " quartos</div>";
                      }
                      if (obj.RoomStaysType.RoomStays[a].RoomRates[c].RatesType.Rates[0].NumberOfUnits === 0) {
                        rooms += "<p class='alert-last-room'><i class='fas fa-exclamation'></i>Sem quartos disponivéis</p>";
                      }
                      rooms += '</ul>';
                      rooms += '</div>'; //rate-descripion

                      //Price Rate
                      rooms += '<div class="rate-price">';
                      if (obj.RoomStaysType.RoomStays[a].BasicPropertyInfo.MaxPartialPaymentParcel != null) {
                        rooms += '<span>Pague até ' + obj.RoomStaysType.RoomStays[a].BasicPropertyInfo.MaxPartialPaymentParcel + 'x</span>';
                      }
                      if (obj.RoomStaysType.RoomStays[a].RatePlans[g].Offers !== null) {
                        num2 = (obj.RoomStaysType.RoomStays[a].RoomRates[c].Total.TPA_Extensions.TotalDiscountValue);
                        rooms += '<div class="old-price"><?php echo getCurrencySymbol($roomsCurrency) ?> ' + parseFloat(Math.round(((obj.RoomStaysType.RoomStays[a].RoomRates[c].Total.AmountBeforeTax) + (num2)) * 100) / 100).toFixed(2) + '</div>';
                      }
                      rooms += '<span class="new-price"><?php echo getCurrencySymbol($roomsCurrency) ?> ' + parseFloat(Math.round(obj.RoomStaysType.RoomStays[a].RoomRates[c].Total.AmountBeforeTax * 100) / 100).toFixed(2) + '</span>';
                      rooms += '</div>';

                      //rate-price
                      rooms += '<div class="rate-book">';
                      rooms += "<a target='_blank' href='https://myreservations.omnibees.com/book.aspx?packuid=0&roomnums=0&q=2825&CheckIn=01052020&CheckOut=05052020&NRooms=1&ad=2&ch=0&ag=-&Code=&group_code=&lang=pt-BR&rateuids=" + obj.RoomStaysType.RoomStays[a].RoomRates[c].RatePlanID + "&roomuids=" + obj.RoomStaysType.RoomStays[a].RoomRates[c].RoomID + "' class='precolink'><span class='text'>RESERVAR</span></a> ";

                      rooms += '</div>'; //rate-book
                      rooms += '</div>'; //rate-details
                    }
                  }
                }
              }
              rooms += '</div>'; //rates-content
              rooms += '<div class="more-rates">Mais opções de Preço <i class="fas fa-chevron-down"></i></div>';
              rooms += "</div>"; //room-avaible-rates
            }
          }
        }
        //No avaiable rates
        else if (obj["RoomStaysType"] === null) {
          console.log("erro");
          for (a in obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms) {
            rooms += '<div class="rates-content">';
            rooms += '<div class="room-details">';

            //Pictures Room
            rooms += '<div class="room-photos">';
            rooms += '<div class="room-photos-carrousel" data-glide-el="track">';
            rooms += '<ul class="glide__slides">';
            switch (true) {
              case obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MultimediaDescriptionsType.MultimediaDescriptions[1] === undefined:
                rooms += '<li class="glide__slide"><img src=" src="https://mobilereservations.omnibees.com/assets/images/no-photo-large.png"/>';
                break;
              case obj.TPA_Extensions === null:
                for (i in obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MultimediaDescriptionsType.MultimediaDescriptions[1].ImageItemsType.ImageItems) {
                  rooms += '<li class="glide__slide"><img src="' + obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MultimediaDescriptionsType.MultimediaDescriptions[1].ImageItemsType.ImageItems[i].URL.Address + '"></li>';
                }
                break;
              default:
                for (i in obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MultimediaDescriptionsType.MultimediaDescriptions[1].ImageItemsType.ImageItems) {
                  rooms += '<li class="glide__slide"><img src="' + obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MultimediaDescriptionsType.MultimediaDescriptions[1].ImageItemsType.ImageItems[i].URL.Address + '"></li>';
                }
                break;
            }
            rooms += '</ul>';
            rooms += '<div data-glide-el="controls"><i class="fas fa-chevron-left" data-glide-dir="<"></i><i class="fas fa-chevron-right" data-glide-dir=">"></i></div>';
            rooms += '</div>';
            rooms += '</div>'; //Room Photos
            rooms += '<div class="room-description">';
            rooms += '<h3>' + obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].DescriptiveText + '</h3>';
            rooms += '<div class="room-max-occupation">';
            for (j = 1; j <= obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MaxAdultOccupancy; j++) {
              rooms += "<i class='fas fa-male'></i>";
            }
            for (k = 1; k <= obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MaxChildOccupancy; k++) {
              rooms += "<i class='fas fa-child'></i>";
            }
            rooms += "</div>"; //Max. Guest
            //Room Description
            rooms += '<div class="room-description">';
            for (c in obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MultimediaDescriptionsType.MultimediaDescriptions[0].TextItemsType.TextItems) {
              rooms += "<div class='text-room large-12'><p class='descricao'>" + obj2.HotelDescriptiveContentsType.HotelDescriptiveContents[0].FacilityInfo.GuestRoomsType.GuestRooms[a].MultimediaDescriptionsType.MultimediaDescriptions[0].TextItemsType.TextItems[c].Description + "</p></div>";
            }
            rooms += '</div>'; //Room Description
            rooms += '</div>';
            rooms += '</div>';
            rooms += '<div class="room-avaiable-rates rates-off">';
            rooms += '<div class="rate-details">';
            rooms += '<div class="rate-description">';
            rooms += '<div class="rate-name"><i class="fas fa-info-circle"></i><b>Não existem tarifas disponíveis para a data pesquisada.</b><br>Altere as datas da pesquisa ou navegue em nosso <a href="https://myreservations.omnibees.com/default.aspx?q=2825" target="_blank">Motor de Reserva</a></div>';
            rooms += "</div>";
            rooms += "</div>";
            rooms += '</div>'; //rates-content
            rooms += "</div>"; //room-avaible-rates
          }
        }
        rooms += "</div>"; //omnibees-rooms-list
        $('#omnibees-rooms').html(rooms);
      });
    },
    omnibeesRenderListRooms: function() {}
  }
  </script>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      listRoomsApi.init();
    });
  </script>

<?php
  }

  protected function _content_template(){
  }
}
