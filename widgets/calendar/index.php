<?php
namespace Elementor;

class beeCalendar extends Widget_Base {
  public function get_name(){
    return 'calendar';
  }
  public function get_title(){
    return 'Calendar';
  }
  public function get_icon(){
    return 'fa fa-label';
  }
  public function get_categories(){
    return ['Omnibees'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
      'section_title',
      [
        'label' => __('Content','elementor')
      ]
    );
    $this->add_control(
      'calendar_hotel_id',
      [
        'label' => __('Hotel ID','elementor'),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'dynamic' => [
          'active' => true,
        ],
        'title' => 'ID do Hotel Omnibees',
        'min' => 1,
        'placeholder' => __('Entender you title','elementor'),
      ]
    );
    $this->add_control(
      'calendar_currency',
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

      
      
      
      
      
      
      
      
      
$this->start_controls_section(
      'style_section',
      [
        'label' => __( 'Geral', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE
      ]
    );
    $this->add_control(
      'engine_background',
      [
        'name' => 'engine_background',
        'label' => __( 'Fundo do Motor', 'elementor' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#000000',
        'selectors' => [
          '#omnibees-calendar' => 'background-color: {{engine_background}}'
            
        ],
      ]
    );

    $this->add_control(
      'calendar_background',
      [
        'name' => 'calendar_background',
        'label' => __( 'Fundo do Calendario', 'elementor' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#000000',
        'selectors' => [
          '#black-background .lightpick--inlined' => 'background-color: {{calendar_background}}',
          '#black-background .lightpick--inlined .lightpick__months' => 'background-color: {{calendar_background}}',
          '#black-background .lightpick--inlined .lightpick__months .lightpick__month' => 'background-color: {{calendar_background}}'
            
        ],
      ]
    );  
      
 $this->end_controls_section();      
      
 
$this->start_controls_section(
      'style_section2',
      [
        'label' => __( 'Campos de Input', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );   
      
      
    $this->add_control(
    'engine_fields_background',
      [
        'name' => 'engine_fields_background',
        'label' => __( 'Campos do Motor - Fundo', 'elementor' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#000000',
        'selectors' => [
          '#omnibees-calendar .booking input' => 'background-color: {{engine_fields_background}}',
          '#omnibees-calendar .booking select' => 'background-color: {{engine_fields_background}}'
        ],
      ]
    );
      
    $this->add_control(
    'engine_fields_color',
      [
        'name' => 'engine_fields_color',
        'label' => __( 'Campos do Motor - Cor do Texto', 'elementor' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#cccccc',
        'selectors' => [
          '#omnibees-calendar .booking input' => 'color: {{engine_fields_color}}',
          '#omnibees-calendar .booking select' => 'color: {{engine_fields_color}}'
        ],
      ]
    );
    
 
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'engine_fields_style',
        'label' => __( 'Campos do Motor - Personalização', 'elementor' ),
        'scheme' => Scheme_Typography::TYPOGRAPHY_1,

        'selector' => '#omnibees-calendar .booking input, #omnibees-calendar .booking select'
      ]
    );
      
    $this->add_control(
    'engine_icons_color',
      [
        'name' => 'engine_icons_color',
        'label' => __( 'Campos do Motor - Icone', 'elementor' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#cccccc',
        'selectors' => [
          '#omnibees-calendar .data .fa' => 'color: {{engine_icons_color}}',
          
        ],
      ]
    ); 
    $this->end_controls_section();
      
      
            
      
    $this->start_controls_section(
          'style_section_btn',
          [
            'label' => __( 'Botão', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE
          ]
        );
        $this->add_control(
          'engine_btn_background',
          [
            'name' => 'engine_btn_background',
            'label' => __( 'Fundo do Botão', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffba00',
            'selectors' => [
              '#omnibees-calendar .booking button' => 'background-color: {{engine_btn_background}}'
            ],
          ]
        );
        
        $this->add_control(
          'engine_btn_color',
          [
            'name' => 'engine_btn_color',
            'label' => __( 'Cor do Botão', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#000',
            'selectors' => [
              '#omnibees-calendar .booking button .text' => 'color: {{engine_btn_color}}'
            ],
          ]
        );
        $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
            'name' => 'engine_btn_style',
            'label' => __( 'Tipografia do Botão', 'elementor' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '#omnibees-calendar .booking button .text'
          ]
        );
      
     $this->end_controls_section();      
      
      
   
      
      
      
            
    $this->start_controls_section(
          'style_section_child',
          [
            'label' => __( 'Box Criança', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE
          ]
        );
        $this->add_control(
          'section_child_background',
          [
            'name' => 'section_child_background',
            'label' => __( 'Fundo da Box', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#000',
            'selectors' => [
              '#omnibees-calendar .booking .child-box' => 'background-color: {{section_child_background}}',
              '#omnibees-calendar .padrao' => 'background-color: {{section_child_background}}'
                
                
            ],
          ]
        );
        
        $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
            'name' => 'section_child_span_style',
            'label' => __( 'Estilo de label', 'elementor' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '#omnibees-calendar .booking .child-box span,.padrao #output'
          ]
        );
      
      
        $this->add_control(
          'section_child_btn_background',
          [
            'name' => 'section_child_btn_background',
            'label' => __( 'Fundo do Botão', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#000',
            'selectors' => [
              '#omnibees-calendar .booking #save-guest' => 'background-color: {{section_child_btn_background}}',
              '#omnibees-calendar .padrao #salvar-idade' => 'background-color: {{section_child_btn_background}}'
            ],
          ]
        );
        $this->add_control(
          'section_child_btn_color',
          [
            'name' => 'section_child_btn_color',
            'label' => __( 'Cor do Botão', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#000',
            'selectors' => [
              '#omnibees-calendar .booking #save-guest' => 'color: {{section_child_btn_color}}',
              '#omnibees-calendar .padrao #salvar-idade' => 'color: {{section_child_btn_color}}'
            ],
          ]
        );
              
        $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
            'name' => 'section_child_btn_style',
            'label' => __( 'Estilo de label', 'elementor' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '#omnibees-calendar .booking #save-guest,#omnibees-calendar .padrao #salvar-idade'
          ]
        );
     $this->end_controls_section();      
      
      
      
      
 
      
  }

  protected function render(){
    $settings_calendar = $this->get_settings_for_display();
    $this->add_render_attribute(
      'label_heading', ['class' =>['beedirect__calendar']]
    );
?>
 
   <div id="omnibees-calendar" <?php echo $this->get_render_attribute_string('label_heading');?>>
     <div class="booking background-color">
         <div class="row">
             <form method="get" target="_blank" id="FormReservav6" class="clearfix row">
                 <input type="hidden" id="q" name="q" value="<?php echo $settings_calendar['calendar_hotel_id'] ?>" />
                 <input type="hidden" id="lang" name="lang" value="pt-BR" />
                 <div class="data">
                     <i class="fa fa-calendar"></i>
                     <input type="text" value="Check-In" id="dpd1-consolav6" autocomplete="off" readonly="readonly" class="columns" />
                     <input type="text" id="checkin-consolav6" autocomplete="off" hidden name="CheckIn" />
                 </div>
                 <div class="data">
                     <i class="fa fa-calendar"></i>
                     <input type="text" value="Check-Out" id="dpd2-consolav6" autocomplete="off" readonly="readonly" class="columns" />
                     <input type="text" id="checkout-consolav6" autocomplete="off" hidden name="CheckOut" />
                 </div>
                 <div class="data adultos">
                     <select name="ad" id="ad">
                         <option value="1">1 Adulto</option>
                         <option value="2">2 Adultos</option>
                         <option value="3">3 Adultos</option>
                         <option value="4">4 Adultos</option>
                     </select>
                     <label for="ad" class="colunas">
                         <i class="fa fa-user" for="ad"></i>
                     </label>
                 </div>
                 <div class="data criancas">
                     <input type="text" id="totalCh" value="0" class="colunas" readonly />
                     <input type="hidden" id="ch" name="ch" value="0" class="colunas" readonly />
                     <label for="ch" class="colunas">
                         <i class="fa fa-child" for="totalCh"></i>
                     </label>
                     <div class="child-box">
                         <div class="list-guest">
                             <div class="list-guest">
                                 <span>Crianças</span>
                                 <select id="infant-filter">
                                     <option value="0" selected>0 Criança</option>
                                     <option value="1">1 Criança</option>
                                     <option value="2">2 Crianças</option>
                                     <option value="3">3 Crianças</option>
                                     <option value="4">4 Crianças</option>
                                     <option value="5">5 Crianças</option>
                                     <option value="6">6 Crianças</option>
                                     <option value="7">7 Crianças</option>
                                 </select>
                             </div>
                         </div>
                         <div id="save-guest">Guardar</div>
                     </div>
                     <div id="box-crianca" class="padrao">
                         <!--infant-->
                         <div id="output"></div>
                         <input type="text" id="ag" name="ag" class="esconde" hidden="hidden">
                         <button id="salvar-idade" type="button" class="button-idade">SALVAR</button>
                     </div>
                 </div>
                 <div class="data">
                     <button class="button" type="submit"><span class="text">RESERVAR</span></button>
                 </div>
             </form>
         </div>
     </div>
     <div id="black-background">
         <div id="calendar-inputs">
             <div class="fechar">
                 <div class="x"></div>
             </div>
             <input type="hidden" id="calendar-start" />
             <input type="hidden" id="calendar-end" />
         </div>
     </div>
 </div>

 <script>
jQuery(document).ready(function($){
      setTimeout(function(){
        $("#infant-filter").on("change keyup blur", function () {
            var a, e = $(this).val();
            e > 0 && $("#box-crianca").addClass("ativa"), e < 1 && ($("#box-crianca").removeClass("ativa"), $("#ag").removeClass("ativa"), $("#ag").addClass("esconde")), $("#output").empty();
          
            for (var d = 0, o = e; d < o; d++) idade = d + 1, a = "Idade criança " + idade + ': <select class="idade" id="ag' + d + '"  ><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option></select><br>', $("#output").append(a)
        }), 
        $("#infant-filter").click(function () {
            $("#salvar-idade").css("display", "block")
        });
        var $salvarIdade = $("#salvar-idade");
        $salvarIdade.click(function () {
            var a = "",
                e = $("#infant-filter").val();
            e = +e;
            for (var d = 0; d < e; d++) $("#ag" + d).val() && d !== e && (a += $("#ag" + d).val() + ";");
            $("#output").removeClass("esconde"), 
                $("#box-crianca").removeClass("ativa"), 
                $("#salvar-idade").addClass("esconde");
            var o = a.slice(0, -1);
            $("#ag").val(o);
        }); 
        
        $( "#infant-filter" ).change(function() {
           $('#ag0').get(0).focus();
        });
        document.getElementById("FormReservav6").action = "https://book.omnibees.com/bookdetails/";
           },500);
    });
    </script>
    <script>
        
    function start() {    
        jQuery(document).ready(function($){
      setTimeout(function(){
                $(function(){$(".button").on("click",function(){var t=$(this),n=t.parent().find("input").val();if("+"==t.text())var a=parseFloat(n)+1;else if(n>0)a=parseFloat(n)-1;else a=0;t.parent().find("input").val(a)})});
    !function(t,e){if("function"==typeof define&&define.amd)define(["moment"],function(t){return e(t)});else if("object"==typeof module&&module.exports){var s="undefined"!=typeof window&&void 0!==window.moment?window.moment:require("moment");module.exports=e(s)}else t.Lightpick=e(t.moment)}(this,function(t){"use strict";var e=window.document,s={field:null,secondField:null,firstDay:1,parentEl:"body",lang:"auto",format:"DD/MM/YYYY",separator:" - ",numberOfMonths:1,numberOfColumns:2,singleDate:!0,autoclose:!0,repick:!1,startDate:null,endDate:null,minDate:null,maxDate:null,disableDates:null,selectForward:!1,selectBackward:!1,minDays:null,maxDays:null,hoveringTooltip:!0,hideOnBodyClick:!0,footer:!1,disabledDatesInRange:!0,tooltipNights:!1,orientation:"auto",disableWeekends:!1,inline:!1,dropdowns:{years:{min:1900,max:null},months:!0},locale:{buttons:{prev:"&leftarrow;",next:"&rightarrow;",close:"&times;",reset:"Reset",apply:"Apply"},tooltip:{one:"day",other:"days"},tooltipOnDisabled:null,pluralize:function(t,e){return"string"==typeof t&&(t=parseInt(t,10)),1===t&&"one"in e?e.one:"other"in e?e.other:""}},onSelect:null,onOpen:null,onClose:null,onError:null},i=function(t){return'<div class="lightpick__toolbar"><button type="button" class="lightpick__previous-action">'+t.locale.buttons.prev+'</button><button type="button" class="lightpick__next-action">'+t.locale.buttons.next+"</button>"+(t.autoclose||t.inline?"":'<button type="button" class="lightpick__close-action">'+t.locale.buttons.close+"</button>")+"</div>"},a=function(t,e,s){return new Date(1970,0,e).toLocaleString(t.lang,{weekday:s?"short":"long"})},n=function(s,i,a,n){if(a)return"<div></div>";i=t(i);var o=t(i).subtract(1,"month"),l=t(i).add(1,"month"),r={time:t(i).valueOf(),className:["lightpick__day","is-available"]};if(n instanceof Array||"[object Array]"===Object.prototype.toString.call(n)?(n=n.filter(function(t){return["lightpick__day","is-available","is-previous-month","is-next-month"].indexOf(t)>=0}),r.className=r.className.concat(n)):r.className.push(n),s.disableDates)for(var d=0;d<s.disableDates.length;d++){if(s.disableDates[d]instanceof Array||"[object Array]"===Object.prototype.toString.call(s.disableDates[d])){var c=t(s.disableDates[d][0]),h=t(s.disableDates[d][1]);c.isValid()&&h.isValid()&&i.isBetween(c,h,"day","[]")&&r.className.push("is-disabled")}else t(s.disableDates[d]).isValid()&&t(s.disableDates[d]).isSame(i,"day")&&r.className.push("is-disabled");r.className.indexOf("is-disabled")>=0&&(s.locale.tooltipOnDisabled&&(!s.startDate||i.isAfter(s.startDate)||s.startDate&&s.endDate)&&r.className.push("disabled-tooltip"),r.className.indexOf("is-start-date")>=0?(this.setStartDate(null),this.setEndDate(null)):r.className.indexOf("is-end-date")>=0&&this.setEndDate(null))}if(s.minDays&&s.startDate&&!s.endDate&&i.isBetween(t(s.startDate).subtract(s.minDays-1,"day"),t(s.startDate).add(s.minDays-1,"day"),"day")&&(r.className.push("is-disabled"),s.selectForward&&i.isSameOrAfter(s.startDate)&&(r.className.push("is-forward-selected"),r.className.push("is-in-range"))),s.maxDays&&s.startDate&&!s.endDate&&(i.isSameOrBefore(t(s.startDate).subtract(s.maxDays,"day"),"day")?r.className.push("is-disabled"):i.isSameOrAfter(t(s.startDate).add(s.maxDays,"day"),"day")&&r.className.push("is-disabled")),s.repick&&(s.minDays||s.maxDays)&&s.startDate&&s.endDate){var p=t(s.repickTrigger==s.field?s.endDate:s.startDate);s.minDays&&i.isBetween(t(p).subtract(s.minDays-1,"day"),t(p).add(s.minDays-1,"day"),"day")&&r.className.push("is-disabled"),s.maxDays&&(i.isSameOrBefore(t(p).subtract(s.maxDays,"day"),"day")?r.className.push("is-disabled"):i.isSameOrAfter(t(p).add(s.maxDays,"day"),"day")&&r.className.push("is-disabled"))}i.isSame(new Date,"day")&&r.className.push("is-today"),i.isSame(s.startDate,"day")&&r.className.push("is-start-date"),i.isSame(s.endDate,"day")&&r.className.push("is-end-date"),s.startDate&&s.endDate&&i.isBetween(s.startDate,s.endDate,"day","[]")&&r.className.push("is-in-range"),t().isSame(i,"month")||(o.isSame(i,"month")?r.className.push("is-previous-month"):l.isSame(i,"month")&&r.className.push("is-next-month")),s.minDate&&i.isBefore(s.minDate,"day")&&r.className.push("is-disabled"),s.maxDate&&i.isAfter(s.maxDate,"day")&&r.className.push("is-disabled"),s.selectForward&&!s.singleDate&&s.startDate&&!s.endDate&&i.isBefore(s.startDate,"day")&&r.className.push("is-disabled"),s.selectBackward&&!s.singleDate&&s.startDate&&!s.endDate&&i.isAfter(s.startDate,"day")&&r.className.push("is-disabled"),!s.disableWeekends||6!=i.isoWeekday()&&7!=i.isoWeekday()||r.className.push("is-disabled"),r.className=r.className.filter(function(t,e,s){return s.indexOf(t)===e}),r.className.indexOf("is-disabled")>=0&&r.className.indexOf("is-available")>=0&&r.className.splice(r.className.indexOf("is-available"),1);var u=e.createElement("div");return u.className=r.className.join(" "),u.innerHTML=i.get("date"),u.setAttribute("data-time",r.time),u.outerHTML},o=function(s,i){for(var a=t(s),n=e.createElement("select"),o=0;o<12;o++){a.set("month",o);var l=e.createElement("option");l.value=a.toDate().getMonth(),l.text=a.toDate().toLocaleString(i.lang,{month:"long"}),o===s.toDate().getMonth()&&l.setAttribute("selected","selected"),n.appendChild(l)}return n.className="lightpick__select lightpick__select-months",n.dir="rtl",i.dropdowns&&i.dropdowns.months||(n.disabled=!0),n.outerHTML},l=function(s,i){var a=t(s),n=e.createElement("select"),o=i.dropdowns&&i.dropdowns.years?i.dropdowns.years:null,l=o&&o.min?o.min:1900,r=o&&o.max?o.max:parseInt(t().format("YYYY"));parseInt(s.format("YYYY"))<l&&(l=parseInt(s.format("YYYY"))),parseInt(s.format("YYYY"))>r&&(r=parseInt(s.format("YYYY")));for(var d=l;d<=r;d++){a.set("year",d);var c=e.createElement("option");c.value=a.toDate().getFullYear(),c.text=a.toDate().getFullYear(),d===s.toDate().getFullYear()&&c.setAttribute("selected","selected"),n.appendChild(c)}return n.className="lightpick__select lightpick__select-years",i.dropdowns&&i.dropdowns.years||(n.disabled=!0),n.outerHTML},r=function(e,s){for(var r="",d=t(s.calendar[0]),c=0;c<s.numberOfMonths;c++){var h=t(d);r+='<section class="lightpick__month">',r+='<header class="lightpick__month-title-bar">',r+='<div class="lightpick__month-title">'+o(h,s)+l(h,s)+"</div>",1===s.numberOfMonths&&(r+=i(s)),r+="</header>",r+='<div class="lightpick__days-of-the-week">';for(var p=s.firstDay+4;p<7+s.firstDay+4;++p)r+='<div class="lightpick__day-of-the-week" title="'+a(s,p)+'">'+a(s,p,!0)+"</div>";if(r+="</div>",r+='<div class="lightpick__days">',h.isoWeekday()!==s.firstDay)for(var u=h.isoWeekday()-s.firstDay>0?h.isoWeekday()-s.firstDay:h.isoWeekday(),f=t(h).subtract(u,"day"),_=f.daysInMonth(),m=f.get("date");m<=_;m++)r+=n(s,f,c>0,"is-previous-month"),f.add(1,"day");for(_=h.daysInMonth(),new Date,m=0;m<_;m++)r+=n(s,h),h.add(1,"day");var D=t(h),g=7-D.isoWeekday()+s.firstDay;if(g<7)for(m=D.get("date");m<=g;m++)r+=n(s,D,c<s.numberOfMonths-1,"is-next-month"),D.add(1,"day");r+="</div>",r+="</section>",d.add(1,"month")}s.calendar[1]=t(d),e.querySelector(".lightpick__months").innerHTML=r},d=function(t,e){var s=t.querySelectorAll(".lightpick__day");[].forEach.call(s,function(t){t.outerHTML=n(e,parseInt(t.getAttribute("data-time")),!1,t.className.split(" "))}),c(t,e)},c=function(e,s){if(!s.disabledDatesInRange&&s.startDate&&!s.endDate&&s.disableDates){var i=e.querySelectorAll(".lightpick__day"),a=s.disableDates.map(function(t){return t instanceof Array||"[object Array]"===Object.prototype.toString.call(t)?t[0]:t}),n=t(a.filter(function(e){return t(e).isBefore(s.startDate)}).sort(function(e,s){return t(s).isAfter(t(e))})[0]),o=t(a.filter(function(e){return t(e).isAfter(s.startDate)}).sort(function(e,s){return t(e).isAfter(t(s))})[0]);[].forEach.call(i,function(e){var i=t(parseInt(e.getAttribute("data-time")));(n&&i.isBefore(n)&&s.startDate.isAfter(n)||o&&i.isAfter(o)&&o.isAfter(s.startDate))&&(e.classList.remove("is-available"),e.classList.add("is-disabled"))})}},h=function(s){var a=this,n=a.config(s);a.el=e.createElement("section"),a.el.className="lightpick lightpick--"+n.numberOfColumns+"-columns is-hidden",n.inline&&(a.el.className+=" lightpick--inlined");var o='<div class="lightpick__inner">'+(n.numberOfMonths>1?i(n):"")+'<div class="lightpick__months"></div><div class="lightpick__tooltip" style="visibility: hidden"></div>';n.footer&&(o+='<div class="lightpick__footer">',!0===n.footer?(o+='<button type="button" class="lightpick__reset-action">'+n.locale.buttons.reset+"</button>",o+='<div class="lightpick__footer-message"></div>',o+='<button type="button" class="lightpick__apply-action">'+n.locale.buttons.apply+"</button>"):o+=n.footer,o+="</div>"),o+="</div>",a.el.innerHTML=o,n.parentEl instanceof Node?n.parentEl.appendChild(a.el):"body"===n.parentEl&&n.inline?n.field.parentNode.appendChild(a.el):e.querySelector(n.parentEl).appendChild(a.el),a._onMouseDown=function(e){if(a.isShowing){var s=(e=e||window.event).target||e.srcElement;if(s){e.stopPropagation(),s.classList.contains("lightpick__select")||e.preventDefault();var i=a._opts;if(s.classList.contains("lightpick__day")&&s.classList.contains("is-available")){var n=t(parseInt(s.getAttribute("data-time")));if(!i.disabledDatesInRange&&i.disableDates&&i.startDate){var o=n.isAfter(i.startDate)?t(i.startDate):t(n),l=n.isAfter(i.startDate)?t(n):t(i.startDate);if(i.disableDates.filter(function(e){if(e instanceof Array||"[object Array]"===Object.prototype.toString.call(e)){var s=t(e[0]),i=t(e[1]);return s.isValid()&&i.isValid()&&(s.isBetween(o,l,"day","[]")||i.isBetween(o,l,"day","[]"))}return t(e).isBetween(o,l,"day","[]")}).length)return a.setStartDate(null),a.setEndDate(null),s.dispatchEvent(new Event("mousedown")),a.el.querySelector(".lightpick__tooltip").style.visibility="hidden",void d(a.el,i)}if(i.singleDate||!i.startDate&&!i.endDate||i.startDate&&i.endDate?i.repick&&i.startDate&&i.endDate?(i.repickTrigger===i.field?(a.setStartDate(n),s.classList.add("is-start-date")):(a.setEndDate(n),s.classList.add("is-end-date")),i.startDate.isAfter(i.endDate)&&a.swapDate(),i.autoclose&&setTimeout(function(){a.hide()},100)):(a.setStartDate(n),a.setEndDate(null),s.classList.add("is-start-date"),i.singleDate&&i.autoclose?setTimeout(function(){a.hide()},100):i.singleDate&&!i.inline||d(a.el,i)):i.startDate&&!i.endDate&&(a.setEndDate(n),i.startDate.isAfter(i.endDate)&&a.swapDate(),s.classList.add("is-end-date"),i.autoclose?setTimeout(function(){a.hide()},100):d(a.el,i)),!i.disabledDatesInRange&&0===a.el.querySelectorAll(".lightpick__day.is-available").length&&(a.setStartDate(null),d(a.el,i),i.footer))if("function"==typeof a._opts.onError)a._opts.onError.call(a,"Invalid range");else{var r=a.el.querySelector(".lightpick__footer-message");r&&(r.innerHTML=i.locale.not_allowed_range,setTimeout(function(){r.innerHTML=""},3e3))}}else s.classList.contains("lightpick__previous-action")?a.prevMonth():s.classList.contains("lightpick__next-action")?a.nextMonth():s.classList.contains("lightpick__close-action")||s.classList.contains("lightpick__apply-action")?a.hide():s.classList.contains("lightpick__reset-action")&&a.reset()}}},a._onMouseEnter=function(e){if(a.isShowing){var s=(e=e||window.event).target||e.srcElement;if(s){var i=a._opts;if(s.classList.contains("lightpick__day")&&s.classList.contains("disabled-tooltip")&&i.locale.tooltipOnDisabled)a.showTooltip(s,i.locale.tooltipOnDisabled);else if(a.hideTooltip(),!i.singleDate&&(i.startDate||i.endDate)&&(s.classList.contains("lightpick__day")||s.classList.contains("is-available"))&&(i.startDate&&!i.endDate||i.repick)){var n=t(parseInt(s.getAttribute("data-time")));if(!n.isValid())return;var o=i.startDate&&!i.endDate||i.repick&&i.repickTrigger===i.secondField?i.startDate:i.endDate,l=a.el.querySelectorAll(".lightpick__day");if([].forEach.call(l,function(e){var s=t(parseInt(e.getAttribute("data-time")));e.classList.remove("is-flipped"),s.isValid()&&s.isSameOrAfter(o,"day")&&s.isSameOrBefore(n,"day")?(e.classList.add("is-in-range"),i.repickTrigger===i.field&&s.isSameOrAfter(i.endDate)&&e.classList.add("is-flipped")):s.isValid()&&s.isSameOrAfter(n,"day")&&s.isSameOrBefore(o,"day")?(e.classList.add("is-in-range"),(i.startDate&&!i.endDate||i.repickTrigger===i.secondField)&&s.isSameOrBefore(i.startDate)&&e.classList.add("is-flipped")):e.classList.remove("is-in-range"),i.startDate&&i.endDate&&i.repick&&i.repickTrigger===i.field?e.classList.remove("is-start-date"):e.classList.remove("is-end-date")}),i.hoveringTooltip){l=Math.abs(n.isAfter(o)?n.diff(o,"day"):o.diff(n,"day")),i.tooltipNights||(l+=1);a.el.querySelector(".lightpick__tooltip");if(l>0&&!s.classList.contains("is-disabled")){var r="";"function"==typeof i.locale.pluralize&&(r=i.locale.pluralize.call(a,l,i.locale.tooltip)),a.showTooltip(s,l+" "+r)}else a.hideTooltip()}i.startDate&&i.endDate&&i.repick&&i.repickTrigger===i.field?s.classList.add("is-start-date"):s.classList.add("is-end-date")}}}},a._onChange=function(t){var e=(t=t||window.event).target||t.srcElement;e&&(e.classList.contains("lightpick__select-months")?a.gotoMonth(e.value):e.classList.contains("lightpick__select-years")&&a.gotoYear(e.value))},a._onInputChange=function(t){t.target||t.srcElement;a._opts.singleDate&&(a._opts.autoclose||a.gotoDate(n.field.value)),a.syncFields(),a.isShowing||a.show()},a._onInputFocus=function(t){var e=t.target||t.srcElement;a.show(e)},a._onInputClick=function(t){var e=t.target||t.srcElement;a.show(e)},a._onClick=function(t){var e=(t=t||window.event).target||t.srcElement,s=e;if(e){do{if(s.classList&&s.classList.contains("lightpick")||s===n.field||n.secondField&&s===n.secondField)return}while(s=s.parentNode);a.isShowing&&n.hideOnBodyClick&&e!==n.field&&s!==n.field&&a.hide()}},a.showTooltip=function(t,e){var s=a.el.querySelector(".lightpick__tooltip"),i=a.el.classList.contains("lightpick--inlined"),n=t.getBoundingClientRect(),o=i?a.el.parentNode.getBoundingClientRect():a.el.getBoundingClientRect(),l=n.left-o.left+n.width/2,r=n.top-o.top;s.style.visibility="visible",s.textContent=e;var d=s.getBoundingClientRect();r-=d.height,l-=d.width/2,window.screen.width>992&&(r-=48,l-=68),setTimeout(function(){s.style.top=r+"px",s.style.left=l+"px"},10)},a.hideTooltip=function(){a.el.querySelector(".lightpick__tooltip").style.visibility="hidden"},a.el.addEventListener("mousedown",a._onMouseDown,!0),a.el.addEventListener("mouseenter",a._onMouseEnter,!0),a.el.addEventListener("touchend",a._onMouseDown,!0),a.el.addEventListener("change",a._onChange,!0),n.inline?a.show():a.hide(),n.field.addEventListener("change",a._onInputChange),n.field.addEventListener("click",a._onInputClick),n.field.addEventListener("focus",a._onInputFocus),n.secondField&&(n.secondField.addEventListener("change",a._onInputChange),n.secondField.addEventListener("click",a._onInputClick),n.secondField.addEventListener("focus",a._onInputFocus))};return h.prototype={config:function(e){var i=Object.assign({},s,e);if(i.field=i.field&&i.field.nodeName?i.field:null,i.calendar=[t().set("date",1)],1===i.numberOfMonths&&i.numberOfColumns>1&&(i.numberOfColumns=1),i.minDate=i.minDate&&t(i.minDate).isValid()?t(i.minDate):null,i.maxDate=i.maxDate&&t(i.maxDate).isValid()?t(i.maxDate):null,"auto"===i.lang){var a=navigator.language||navigator.userLanguage;i.lang=a||"en-US"}return i.secondField&&i.singleDate&&(i.singleDate=!1),i.hoveringTooltip&&i.singleDate&&(i.hoveringTooltip=!1),"[object Object]"===Object.prototype.toString.call(e.locale)&&(i.locale=Object.assign({},s.locale,e.locale)),window.innerWidth<480&&i.numberOfMonths>1&&(i.numberOfMonths=1,i.numberOfColumns=1),i.repick&&!i.secondField&&(i.repick=!1),i.inline&&(i.autoclose=!1,i.hideOnBodyClick=!1),this._opts=Object.assign({},i),this.syncFields(),this.setStartDate(this._opts.startDate,!0),this.setEndDate(this._opts.endDate,!0),this._opts},syncFields:function(){if(this._opts.singleDate||this._opts.secondField)t(this._opts.field.value,this._opts.format).isValid()&&(this._opts.startDate=t(this._opts.field.value,this._opts.format)),this._opts.secondField&&t(this._opts.secondField.value,this._opts.format).isValid()&&(this._opts.endDate=t(this._opts.secondField.value,this._opts.format));else{var e=this._opts.field.value.split(this._opts.separator);2===e.length&&(t(e[0],this._opts.format).isValid()&&(this._opts.startDate=t(e[0],this._opts.format)),t(e[1],this._opts.format).isValid()&&(this._opts.endDate=t(e[1],this._opts.format)))}},swapDate:function(){var e=t(this._opts.startDate);this.setDateRange(this._opts.endDate,e)},gotoToday:function(){this.gotoDate(new Date)},gotoDate:function(e){(e=t(e)).isValid()||(e=t()),e.set("date",1),this._opts.calendar=[t(e)],r(this.el,this._opts)},gotoMonth:function(t){isNaN(t)||(this._opts.calendar[0].set("month",t),r(this.el,this._opts))},gotoYear:function(t){isNaN(t)||(this._opts.calendar[0].set("year",t),r(this.el,this._opts))},prevMonth:function(){this._opts.calendar[0]=t(this._opts.calendar[0]).subtract(this._opts.numberOfMonths,"month"),r(this.el,this._opts),c(this.el,this._opts)},nextMonth:function(){this._opts.calendar[0]=t(this._opts.calendar[1]),r(this.el,this._opts),c(this.el,this._opts)},updatePosition:function(){if(!this.el.classList.contains("lightpick--inlined")){this.el.classList.remove("is-hidden");var t=this._opts.field.getBoundingClientRect(),e=this.el.getBoundingClientRect(),s=this._opts.orientation.split(" "),i=0,a=0;"auto"!=s[0]&&/top|bottom/.test(s[0])?(i=t[s[0]]+window.pageYOffset,"top"==s[0]&&(i-=e.height)):i=t.bottom+e.height>window.innerHeight&&window.pageYOffset>e.height?t.top+window.pageYOffset-e.height:t.bottom+window.pageYOffset,/left|right/.test(s[0])||s[1]&&"auto"!=s[1]&&/left|right/.test(s[1])?(a=/left|right/.test(s[0])?t[s[0]]+window.pageXOffset:t[s[1]]+window.pageXOffset,"right"!=s[0]&&"right"!=s[1]||(a-=e.width)):a=t.left+e.width>window.innerWidth?t.right+window.pageXOffset-e.width:t.left+window.pageXOffset,this.el.classList.add("is-hidden"),this.el.style.top=i+"px",this.el.style.left=a+"px"}},setStartDate:function(e,s){var i=t(e,t.ISO_8601),a=t(e,this._opts.format);if(!i.isValid()&&!a.isValid())return this._opts.startDate=null,void(this._opts.field.value="");this._opts.startDate=t(i.isValid()?i:a),this._opts.singleDate||this._opts.secondField?this._opts.field.value=this._opts.startDate.format(this._opts.format):this._opts.field.value=this._opts.startDate.format(this._opts.format)+this._opts.separator+"...",s||"function"!=typeof this._opts.onSelect||this._opts.onSelect.call(this,this.getStartDate(),this.getEndDate())},setEndDate:function(e,s){var i=t(e,t.ISO_8601),a=t(e,this._opts.format);if(!i.isValid()&&!a.isValid())return this._opts.endDate=null,void(this._opts.secondField?this._opts.secondField.value="":!this._opts.singleDate&&this._opts.startDate&&(this._opts.field.value=this._opts.startDate.format(this._opts.format)+this._opts.separator+"..."));this._opts.endDate=t(i.isValid()?i:a),this._opts.secondField?(this._opts.field.value=this._opts.startDate.format(this._opts.format),this._opts.secondField.value=this._opts.endDate.format(this._opts.format)):this._opts.field.value=this._opts.startDate.format(this._opts.format)+this._opts.separator+this._opts.endDate.format(this._opts.format),s||"function"!=typeof this._opts.onSelect||this._opts.onSelect.call(this,this.getStartDate(),this.getEndDate())},setDate:function(t,e){this._opts.singleDate&&(this.setStartDate(t,e),this.isShowing&&d(this.el,this._opts))},setDateRange:function(t,e,s){this._opts.singleDate||(this.setStartDate(t,!0),this.setEndDate(e,!0),this.isShowing&&d(this.el,this._opts),s||"function"!=typeof this._opts.onSelect||this._opts.onSelect.call(this,this.getStartDate(),this.getEndDate()))},setDisableDates:function(t){this._opts.disableDates=t,this.isShowing&&d(this.el,this._opts)},getStartDate:function(){return t(this._opts.startDate).isValid()?this._opts.startDate:null},getEndDate:function(){return t(this._opts.endDate).isValid()?this._opts.endDate:null},getDate:function(){return t(this._opts.startDate).isValid()?this._opts.startDate:null},toString:function(e){return this._opts.singleDate?t(this._opts.startDate).isValid()?this._opts.startDate.format(e):"":t(this._opts.startDate).isValid()&&t(this._opts.endDate).isValid()?this._opts.startDate.format(e)+this._opts.separator+this._opts.endDate.format(e):t(this._opts.startDate).isValid()&&!t(this._opts.endDate).isValid()?this._opts.startDate.format(e)+this._opts.separator+"...":!t(this._opts.startDate).isValid()&&t(this._opts.endDate).isValid()?"..."+this._opts.separator+this._opts.endDate.format(e):""},show:function(t){this.isShowing||(this.isShowing=!0,this._opts.repick&&(this._opts.repickTrigger=t),this.syncFields(),this._opts.secondField&&this._opts.secondField===t&&this._opts.endDate?this.gotoDate(this._opts.endDate):this.gotoDate(this._opts.startDate),e.addEventListener("click",this._onClick),this.updatePosition(),this.el.classList.remove("is-hidden"),"function"==typeof this._opts.onOpen&&this._opts.onOpen.call(this),e.activeElement&&e.activeElement!=e.body&&e.activeElement.blur())},hide:function(){this.isShowing&&(this.isShowing=!1,e.removeEventListener("click",this._onClick),this.el.classList.add("is-hidden"),this.el.querySelector(".lightpick__tooltip").style.visibility="hidden","function"==typeof this._opts.onClose&&this._opts.onClose.call(this))},destroy:function(){var t=this._opts;this.hide(),this.el.removeEventListener("mousedown",self._onMouseDown,!0),this.el.removeEventListener("mouseenter",self._onMouseEnter,!0),this.el.removeEventListener("touchend",self._onMouseDown,!0),this.el.removeEventListener("change",self._onChange,!0),t.field.removeEventListener("change",this._onInputChange),t.field.removeEventListener("click",this._onInputClick),t.field.removeEventListener("focus",this._onInputFocus),t.secondField&&(t.secondField.removeEventListener("change",this._onInputChange),t.secondField.removeEventListener("click",this._onInputClick),t.secondField.removeEventListener("focus",this._onInputFocus)),this.el.parentNode&&this.el.parentNode.removeChild(this.el)},reset:function(){this.setStartDate(null,!0),this.setEndDate(null,!0),d(this.el,this._opts),"function"==typeof this._opts.onSelect&&this._opts.onSelect.call(this,this.getStartDate(),this.getEndDate()),this.el.querySelector(".lightpick__tooltip").style.visibility="hidden"},reloadOptions:function(t){this._opts=Object.assign({},this._opts,t)}},h});
 
      
       
 
           
                var a = new Date,
                    b = a.getDate(),
                    c = a.getMonth() + 1,
                    d = a.getFullYear();
                10 > b && (b = "0" + b), 10 > c && (c = "0" + c), a = b + "/" + c + "/" + d, hojecheckcalend = b + c + d;
                var e = new Date,
                    f = new Date(e.getTime() + 86400000),
                    g = f.getDate(),
                    h = f.getMonth() + 1,
                    i = f.getFullYear();
                10 > g && (g = "0" + g), 10 > h && (h = "0" + h), f = g + "/" + h + "/" + i, tomorrowcheckcalend = g + h + i, $("#dpd1-consolav6").val(a), $("#dpd2-consolav6").val(f), $("#checkin-consolav6").val(hojecheckcalend), $("#checkout-consolav6").val(tomorrowcheckcalend),

                    $("#dpd1-consolav6 , #dpd2-consolav6").click(function() {
                        $("#black-background").css("display", "inline-flex");
                    }),
                    $(".button").click(function() {
                        $(".lightpick__days>div").removeClass("is-in-range"), $(".lightpick__days>div").removeClass("is-start-date"), $(".lightpick__days>div").removeClass("is-end-date")
                    }), $(document).mouseup(function(a) {
                        var b = $("#black-background");
                        b.is(a.target) || 0 !== b.has(a.target).length || b.hide()
                    }), window.isIE = function() {
                        return !(!(0 < window.navigator.userAgent.indexOf("MSIE ")) && !window.navigator.userAgent.match(/Trident.*rv\:11\./))
                    }, window.showLoader = function() {
                        $("#loader").css("display", "block")
                    }, window.hideLoader = function() {
                        $("#loader").css("display", "none")
                    }, window.calendarArrowClick = function() {
                        var a = $(".lightpick__days")[0].children,
                            b = $(".lightpick__days")[1].children,
                            c = document.createElement("img");
                        c.id = "carrow1", c.src = "https://widgets.omnibees.com/duda/icones/arrow_left.svg";
                        var d = document.createElement("img");
                        d.id = "carrow2", d.src = "https://widgets.omnibees.com/duda/icones/arrow_right.svg";
                        var e = $(".lightpick--inlined .lightpick__month-title-bar");
                        e[0].appendChild(c), e[1].appendChild(d)
                    }, window.getOBInfoPerDay = function() {
                        window.showLoader();
                        var a = $(".is-available:not(.is-previous-month)");
                        if (a.length) {
                            var b = a[0].getAttribute("data-time");
                            b = parseInt(b), b = new Date(b)
                        }
                        window.style2Months = "", window.style6Months = "";
                        var c = [],
                            d = [],
                            e = moment().toISOString(),
                            f = moment(b),
                            g = moment(f).month(),
                            h = f.clone().add(1, "d"),
                            j = null;
                        j = f.clone().endOf("month"), j.add(1, "M");
                        for (var k = j.diff(f, "days"), l = [], m = 0; m < k; m++) l.push(m);
                        for (var m = 0; m < l.length + 1; m++) {
                            var n = f.toISOString(),
                                o = h.toISOString();
                            body = {
                                    MaxResponses: 100,
                                    RequestedCurrency: <?php echo $settings_calendar['calendar_currency'] ?>,
                                    PageNumber: 10,
                                    EchoToken: "aab46c45b97d059671359e9bf122cc4a",
                                    TimeStamp: e,
                                    Target: 1,
                                    Version: 3,
                                    PrimaryLangID: 1,
                                    AvailRatesOnly: !1,
                                    BestOnly: !1,
                                    HotelSearchCriteria: {
                                        Criterion: {
                                            GetPricesPerGuest: !0,
                                            HotelRefs: [{
                                                HotelCode: <?php echo $settings_calendar['calendar_hotel_id'] ?>
                                            }],
                                            StayDateRange: {
                                                Start: n,
                                                End: o
                                            },
                                            RoomStayCandidatesType: {
                                                RoomStayCandidates: [{
                                                    GuestCountsType: {
                                                        GuestCounts: [{
                                                            Age: "",
                                                            AgeQualifyCode: 10,
                                                            Count: 1,
                                                            ResGuestRPH: [0]
                                                        }]
                                                    },
                                                    Quantity: 1,
                                                    RPH: 0
                                                }]
                                            }
                                        }
                                    }
                                }, body = JSON.stringify(body),
                                function(a) {
                                    var b = $.ajax({
                                        type: "POST",
                                        url: "https://beapi.omnibees.com/api/BE/GetHotelAvail",
                                        headers: {
                                            Authorization: "Bearer aab46c45b97d059671359e9bf122cc4a",
                                            "Content-type": "application/json"
                                        },
                                        data: body,
                                        success: function(b) {
                                            window.style2Months += b.HotelStaysType ? 0 == b.HotelStaysType.HotelStays[0].Price.AmountBeforeTax ? "div[data-time=\"" + a.valueOf() + "\"]  {pointer-events: auto; align-items: flex-start;background-size: 8px 8px; color: #d4d4d4;font-weight: 600!important;}" : null !== b.HotelStaysType.HotelStays[0].Availability && null !== b.HotelStaysType.HotelStays[0].Availability.Restrictions ? "div[data-time=\"" + a.valueOf() + "\"]::before { content: \"R$ " + Math.round(b.HotelStaysType.HotelStays[0].Price.AmountBeforeTax) + "\"; } div[data-time=\"" + a.valueOf() + "\"]   { pointer-events: auto; align-items:flex-start; color: #d4d4d4;font-weight: 600!important; }" : "div[data-time=\"" + a.valueOf() + "\"]::before { content: \"R$ " + Math.round(b.HotelStaysType.HotelStays[0].Price.AmountBeforeTax) + "\"; } div[data-time=\"" + a.valueOf() + "\"] { display: flex; align-items: flex-start; padding-top: 0px; }" : "div[data-time=\"" + a.valueOf() + "\"]  { background: url(https://widgets.omnibees.com/duda/icones/blocked_day.png) top right no-repeat;pointer-events: auto; align-items: flex-start;background-size: 8px 8px; color: #d4d4d4;font-weight: 600!important;}"
                                        }
                                    });
                                    c.push(b)
                                }(f), f = new Date(n), f.setDate(f.getDate() + 1), h = new Date(o), h.setDate(h.getDate() + 1)
                        }
                        $.when.apply(null, c).done(function() {
                            $("head").append("<style>" + window.style2Months + "</style>"), $(".lightpick__next-action ").click(function() {
                                window.hideLoader(), f = moment(f), h = f.clone().add(1, "d");
                                var a = null;
                                a = f.clone().add(1, "M"), a = a.endOf("month"), k = a.diff(f, "days"), l = [];
                                for (var b = 0; b < k; b++) l.push(b);
                                for (var b = 0; b < l.length + 1; b++) n = f.toISOString(), o = h.toISOString(), body = {
                                        MaxResponses: 100,
                                        RequestedCurrency: <?php echo $settings_calendar['calendar_currency'] ?>,
                                        PageNumber: 10,
                                        EchoToken: "aab46c45b97d059671359e9bf122cc4a",
                                        TimeStamp: e,
                                        Target: 1,
                                        Version: 3,
                                        PrimaryLangID: 1,
                                        AvailRatesOnly: !1,
                                        BestOnly: !1,
                                        HotelSearchCriteria: {
                                            Criterion: {
                                                GetPricesPerGuest: !0,
                                                HotelRefs: [{
                                                    HotelCode: <?php echo $settings_calendar['calendar_hotel_id'] ?>
                                                }],
                                                StayDateRange: {
                                                    Start: n,
                                                    End: o
                                                },
                                                RoomStayCandidatesType: {
                                                    RoomStayCandidates: [{
                                                        GuestCountsType: {
                                                            GuestCounts: [{
                                                                Age: "",
                                                                AgeQualifyCode: 10,
                                                                Count: 1,
                                                                ResGuestRPH: [0]
                                                            }]
                                                        },
                                                        Quantity: 1,
                                                        RPH: 0
                                                    }]
                                                }
                                            }
                                        }
                                    }, body = JSON.stringify(body),
                                    function(a) {
                                        var b = $.ajax({
                                            type: "POST",
                                            url: "https://beapi.omnibees.com/api/BE/GetHotelAvail",
                                            headers: {
                                                Authorization: "Bearer aab46c45b97d059671359e9bf122cc4a",
                                                "Content-type": "application/json"
                                            },
                                            data: body,
                                            success: function(b) {
                                                window.style6Months += b.HotelStaysType ? 0 == b.HotelStaysType.HotelStays[0].Price.AmountBeforeTax ? "div[data-time=\"" + a.valueOf() + "\"]  {pointer-events: auto; align-items: flex-start;background-size: 8px 8px; color: #d4d4d4;font-weight: 600!important;}" : null !== b.HotelStaysType.HotelStays[0].Availability && null !== b.HotelStaysType.HotelStays[0].Availability.Restrictions ? "div[data-time=\"" + a.valueOf() + "\"]::before { content: \"R$ " + Math.round(b.HotelStaysType.HotelStays[0].Price.AmountBeforeTax) + "\"; } div[data-time=\"" + a.valueOf() + "\"]   { pointer-events: auto; align-items:flex-start; color: #d4d4d4;font-weight: 600!important; }" : "div[data-time=\"" + a.valueOf() + "\"]::before { content: \"R$ " + Math.round(b.HotelStaysType.HotelStays[0].Price.AmountBeforeTax) + "\"; } div[data-time=\"" + a.valueOf() + "\"] { display: flex; align-items: flex-start; padding-top: 0px; }" : "div[data-time=\"" + a.valueOf() + "\"]  { background: url(https://widgets.omnibees.com/duda/icones/blocked_day.png) top right no-repeat;pointer-events: auto; align-items: flex-start;background-size: 8px 8px; color: #d4d4d4;font-weight: 600!important;}"
                                            }
                                        });
                                        d.push(b)
                                    }(f), f = new Date(n), f.setDate(f.getDate() + 1), h = new Date(o), h.setDate(h.getDate() + 1);
                                $.when.apply(null, d).done(function() {
                                    $("head").append("<style>" + window.style6Months + "</style>")
                                })
                            })
                        })
                    }, window.calendar = new Lightpick({
                        field: document.getElementById("calendar-start"),
                        secondField: document.getElementById("calendar-end"),
                        lang: "pt",
                        singleDate: !1,
                        inline: !0,
                        numberOfColumns: 2,
                        numberOfMonths: 2,
                        minDate: new Date,
                        minDays: 2,
                        autoclose: !1,
                        maxDays: 31,
                        firstDay: 1,
                        tooltipNights: !0,
                        locale: {
                            tooltip: {
                                one: "noite",
                                other: "noites"
                            }
                        },
                        dropdowns: {
                            years: !1
                        },
                        onSelect: function(a, b) {
                            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                                if (a < b) {
                                    $("#black-background").css("display", "none");
                                    var c = $("#calendar-start").val();
                                    $("#dpd1-consolav6").val(c);
                                    var d = $("#calendar-end").val();
                                    $("#dpd2-consolav6").val(d), $(".lightpick__days>div").addClass("is-start-date");
                                    var e = a.format("DDMMYYYY");
                                    $("#checkin-consolav6").val(e);
                                    var f = b.format("DDMMYYYY");
                                    $("#checkout-consolav6").val(f), $("#black-background").css("display", "none")
                                }
                            } else if (a < b) {
                                $("#black-background").css("display", "none");
                                var c = $("#calendar-start").val();
                                $("#dpd1-consolav6").val(c);
                                var d = $("#calendar-end").val();
                                $("#dpd2-consolav6").val(d);
                                var e = a.format("DDMMYYYY");
                                $("#checkin-consolav6").val(e);
                                var f = b.format("DDMMYYYY");
                                $("#checkout-consolav6").val(f);
                            }
                         
                        }
                    }), window.getOBInfoPerDay(), document.addEventListener("DOMNodeInserted", function(a) {
                        if ("lightpick__month" === a.target.className) {
                            if (window.firstMonth) return window.calendarArrowClick(), void(window.firstMonth = !1);
                            window.firstMonth = !0
                        }
                    }), window.calendarArrowClick()
       
 
        },500);
    });
        }
    </script>
    <script>
        
jQuery(document).ready(function($){
      setTimeout(function(){
    $("#black-background .fechar").click(function () {
        $("#black-background").css("display", "none");
    });
     $('#totalCh').click(function() {
        $(".child-box").css("display", "block"); 
         
        $('.list-guest select').on('change', function() {
            var totalChild =  parseInt($("#infant-filter").val());
            
            $('#save-guest').on('click', function() {
                $('#totalCh').val(totalChild + " Crianças");
                $(".child-box").css("display", "none");    
                
                var pontoevirgula =  ";";
                var qtdInfant = $("#infant-filter").val();
                var agesChild = "";
                $('#ch').val(totalChild);
         
            });
         });
     });
        },500);
    });
    
   </script>
  <script type="text/javascript">
    jQuery(document).ready(function($){
      setTimeout(function(){
        start();
      },500);
    });
  </script>

<?php
  }

  protected function _content_template(){
  }
}
