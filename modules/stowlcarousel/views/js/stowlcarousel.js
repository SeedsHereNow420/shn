/*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/

var st_owl_progressBar = [], st_owl_bar = [], st_owl_elem= [], st_owl_isPause= [], st_owl_tick=[], st_owl_percentTime=[];
//Init progressBar where elem is $("#owl-demo")
function st_owl_progressBar_init(elem){
    //for some reason data() does not work.
  var id_st = elem.attr('id').replace(/\D*/g,'');
  id_st = parseInt(id_st);
  st_owl_elem[id_st] = elem;

  //build progress bar elements
  st_owl_buildProgressBar(id_st);
  //start counting
  st_owl_start(id_st);
};

//create div#progressBar and div#bar then prepend to $("#owl-demo")
function st_owl_buildProgressBar(id_st){
  st_owl_progressBar[id_st] = $("<div>",{
    class:"owl_progressBar"
  });
  st_owl_bar[id_st] = $("<div>",{
    class:"owl_bar"
  });
  if(stowlcarousel_array[id_st].progress_bar==1)
    st_owl_progressBar[id_st].append(st_owl_bar[id_st]).prependTo(st_owl_elem[id_st]);
  else
    st_owl_progressBar[id_st].append(st_owl_bar[id_st]).appendTo(st_owl_elem[id_st]);

};

function st_owl_start(id_st) {
  //reset timer
  st_owl_percentTime[id_st] = 0;
  st_owl_isPause[id_st] = false;
  //run interval every 0.01 second
  st_owl_tick[id_st] = setInterval(function(){
    if(st_owl_isPause[id_st] === false){
        st_owl_percentTime[id_st] += 1000 / stowlcarousel_array[id_st].bar_time;
        st_owl_bar[id_st].css({
           width: st_owl_percentTime[id_st]+"%"
         });
        //if st_owl_percentTime is equal or greater than 100
        if(st_owl_percentTime[id_st] >= 100){
          //slide to next item 
          st_owl_elem[id_st].trigger('owl.next')
        }
      }
  }, 10);
};


//pause while dragging 
function st_owl_pauseOnDragging(elem){
  var id_st = elem.attr('id').replace(/\D*/g,'');
  st_owl_isPause[id_st] = true;
};

//moved callback
function st_owl_moved(elem){
  var id_st = elem.attr('id').replace(/\D*/g,'');
  //clear interval
  clearTimeout(st_owl_tick[id_st]);
  //start again
  st_owl_start(id_st);
};
jQuery(function($) {
  if(typeof(stowlcarousel_array)!=='undefined' && stowlcarousel_array.length)
  {
    $.each(stowlcarousel_array, function(key, value){
        if(value)
        {
            if(typeof(value.progress_bar)!=='undefined' && value.progress_bar)
            {
                value.afterInit = st_owl_progressBar_init;
                value.afterMove = st_owl_moved;
                value.startDragging = st_owl_pauseOnDragging;
            }
            $("#st_owl_carousel-"+key).owlCarousel(value);
        }
    });
  }
});