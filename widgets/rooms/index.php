<?php
namespace Elementor;

class listRooms extends Widget_Base {
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
      'hotel_id',
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
      'currency',
      [
        'label' => __('Moeda','elementor'),
        'type' => Controls_Manager::SELECT2,
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
      'language',
      [
        'label' => __('Idioma','elementor'),
        'type' => Controls_Manager::SELECT2,
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
    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();
    $this->add_inline_editing_attributes('label_heading','advanced');
    $this->add_render_attribute(
      'label_heading', ['class' =>['beedirect__list-rooms']]
    );
?>

  <div <?php echo $this->get_render_attribute_string('label_heading');?>>
    <div class="omnibees-list-rooms"></div>
  </div>
  <script>
  console.log("inicou script");
    var timestamp = new Date();
    var timestampiso = timestamp.toISOString();
    function start_rooms(){
      console.log("abriu start");
        var obj;
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://beapi.omnibees.com/api/BE/GetHotelAvail",
            "method": "POST",
            "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer aab46c45b97d059671359e9bf122cc4a",
                "Cache-Control": "no-cache"
            },
            "processData": false,
            "data": '{"EchoToken":"aab46c45b97d059671359e9bf122cc4a","TimeStamp":"'+timestampiso+'","Target":1,"Version":0,"PrimaryLangID":8,"AvailRatesOnly":true,"BestOnly":true,"OnRequestInd":true,"IsModify":false,"RequestedCurrency":<?php echo $settings['currency'] ?>,"HotelSearchCriteria":{"AvailableOnlyIndicator":false,"Criterion":{"RoomStayCandidatesType":{"RoomStayCandidates":[{"GuestCountsType":{"GuestCounts":[{"Age":null,"AgeQualifyCode":10,"Count":1}]},"Quantity":1,"RPH":0,"BookingCode":""}]},"HotelRefs":[{"ChainCode":null,"HotelCode":<?php echo $settings['hotel_id'] ?>}],"GetPricesPerGuest":true,"StayDateRange":{"Duration":null,"Start":"<?php echo date("Y-m-d"); ?>","End":"<?php echo date("Y-m-d", strtotime('tomorrow')); ?>"},"RatePlanCandidatesType":{"RatePlanCandidates":[{"GroupCode":null,"PromotionCode":null}]},"TPA_Extensions":{"MultimediaObjects": {"SendData": true},"IsForMobile":false,"RatePlanID":"0"}}}'
        };
        $.when(
          $.ajax(settings).done(function (response) {
                obj = response;
            }
        ),
        ).then(function() {
            var bestPriceApi = "";
            if (obj["HotelStaysType"] !== null) {

              <?php
              $beeCurrency =  $settings['currency'];
              function getCurrencySymbol($beeCurrency){
                switch ($beeCurrency) :
                  case 16: return "R$";
                  case 23: return "$"; 
                  case 34: return "€";
                  case 108: return "£";
                  case 109: return "$";
                endswitch;
              }
              ?>
              bestPrice = obj.HotelStaysType.HotelStays[0].Price.AmountBeforeTax;
              bestPriceApi += "<span class='best-price-since'><?php echo $settings['title'] ?></span>"
              bestPriceApi += "<span class='best-price-value'><?php echo getCurrencySymbol($beeCurrency) ?> " + parseFloat(bestPrice.toFixed(2)) + "</span>";
              $('.omnibees-list-rooms').html(bestPriceApi);
            }
        });
    }
    jQuery(document).ready(function(){
      start_rooms();
    });
    
  </script>

<?php
  }

  protected function _content_template(){
  }
}
