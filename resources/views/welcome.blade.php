@extends('layout.layout')

@section('content')
<?php $count_id=1; ?>
  <div role="handle_right_side_bar">
    <div class="showandhidebutton_right">
      <a href="#" data-ix="show-right-side-bar" class="w-button show_right_side_bar">&nbsp;</a>
      <a href="#" data-ix="hide-right-side-bar" class="w-button hide_right_side_bar">&nbsp;</a>     
    </div>
      <div class="right_side_bar">
         <div class="w-clearfix rateandreview">
            <div class="black_overlay_in_rating" style="display: none;"></div> 
            <div class="message_overlay" id="message_overlay" style="display: none;">
              <h5 class="message_in_rating" id="message_in_rating">Submitting</h5>
            </div>
            <div class="message_overlay retry" id="retry" style="display: none; ">
              <a href="#" id="retry_message" data-Type=""><h5 class="message_in_rating" style="text-decoration: underline">Try again</h5></a>
              <a href="#" id="cancel_message" style="margin-left: 5px;"><h5 class="message_in_rating" style="text-decoration: underline">Cancel</h5></a>
            </div>
            <div>
              <a href="#" class="w-inline-block">
               <h3 class="head engraved">Rate and Review</h3>
             </a>
            </div>
            <div class="w-clearfix" style="margin-top: 8px;">
               <div data-ix="hover" class="entity rates">
                  <div><img width="80" height="60" src="./About _ Escape Template_files/56895407210f4cfc1604b7a0_thesis_full_form.jpg" class="mini_product_img"></div>
               </div>
               <div class="namecat">
                  <div class="product_name_in_rate engraved">Hello</div>
                  <ul class="w-list-unstyled w-clearfix">
                     <li class="list_item_float_right">
                        <div class="cat_name_in_rate engraved light">hello</div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="description" style="display:none;">
               <h4 class="rate_title">Description</h5>
               <div class="description_details">                
               </div>
            </div>
            <div class="wrapper white_shadow">
               <h4 class="rate_title" id="rate_title">Rate this item :</h4>
              <ul class="w-list-unstyled style_rating" data-ProductID="">
               <li class="w-clearfix rate">
                  <div data-ix="show-rate-review" id="jRate<?php echo $count_id; $count_id=$count_id+1; ?>" style="float:right;display: inline-block; margin-left: 2px; height:20px;width: 80px;"></div>
                  <div class="rate_citeria">Look and Feel</div>
               </li>
               <li class="w-clearfix rate">
                  <div data-ix="show-rate-review" id="jRate<?php echo $count_id; $count_id=$count_id+1; ?>" style="float:right;display: inline-block; margin-left: 2px; height:20px;width: 80px;"></div>
                  <div class="rate_citeria">Look and Feel</div>
               </li>
               <li class="w-clearfix rate">                 
                  <div data-ix="show-rate-review" id="jRate<?php echo $count_id; $count_id=$count_id+1; ?>" style="float:right;display: inline-block; margin-left: 2px; height:20px;width: 80px;"></div>
                  <div class="rate_citeria">Look and Feel</div>
               </li>
              </ul>
              <div class="w-form review_wrapper">
                 <form id="email-form" name="email-form" data-name="Email Form" class="div">
                  <label for="field-3" class="rate_title" id="review_title">Write a review :</label>
                  <textarea id="field-3" placeholder="Give your Review" name="field-3" data-name="Field 3" class="w-input review_area"></textarea>
                  </form>
              </div>
               <div class="w-form-done invisible"></div>
               <div class="w-form-fail invisible"></div>
            </div>
            <a href="#" class="w-button arrow left tooltip-left"  data-tooltip="Previous">&nbsp;</a>
            <!Submission of rating and review>
           
            <!if guest clicked on any item, save it so that after logging in he/she can see it on rate bar
              also write a method for submission>
            <a href="#" class="w-button arrow tick tooltip-left" id='submit_rate_and_review' data-tooltip="Submit">&nbsp;</a>
            <a class="w-button arrow more tooltip-right"  data-tooltip="Details">&nbsp;</a>
            <a href="#" class="w-button arrow right tooltip-right"  data-tooltip="Next">&nbsp;</a>
            
         </div>      
      </div>         
  </div>


<div class="main-div">

  <div data-ix="showmorebutton" class="post">
    <a href="#" class="w-button left_navigation">&nbsp;</a>
    <a href="#" class="w-button right_navigation">&nbsp;&nbsp;</a>
      <div class="w-clearfix block">
        <a href="#" class="w-inline-block">
         <h3 class="head">New Categories</h3>
       </a> 
       <a href="#" class="w-inline-block showmore" style="display: none;">
      <img width="15" height="15" src="{{ asset( '/images/showmore.png') }}" class="general_pic"></a>        
      </div>
      <div class="scrollable" >
        <ul id="list">
         @foreach ($most_recents as $product)
         <li>
          <div class="card_block">
              <div class="item_card" >
                  <div class="front">
                    <div data-ix="hover" class="entity">
                        <div class="image_div">
                          <a href="detailsProduct/{{ $product->PROD_ID }}" class="w-inline-block image_link">
                          <img width="100%" height="100%"  class="w-inline-block image_scale" src="{{ asset( '/product_img/' . $product->image ) }}">
                          </a>
                        </div>
                        <div class="w-clearfix details_div">
                          <div class="title_div">
                            <a data-new-link="true" href="detailsProduct/{{ $product->PROD_ID }}">
                              <strong><span class="product-name">{{ $product->PROD_NAME }}</span></strong>
                            </a>
                          </div>
                          <div class="cat_div"><span class="category">In: 
                              <a class="custom" href="#">{{$product->CAT_NAME}}</a></span>
                          </div>
                         <!hidden info for rateandreview div-Part of Rate_and_Review Modeule> 
                         <div class="rate_div tooltip-right" data-tooltip="Rate"
                              data-ProductID="{{ $product->PROD_ID }}"
                              data-ProductImage="{{ asset( '/product_img/' . $product->image ) }}"
                              data-ProductName="{{ $product->PROD_NAME }}"
                              data-CatID="{{$product->CAT_ID}}"
                              data-CategorName="{{$product->CAT_NAME}}"
                              >
                          <div class="rating" style="display: block; margin-left: 2px;   position: absolute; width: 100%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                          <?php
                            $ratio=($product->AVG_RATING/5)*100;
                           ?>
                          <div class="rating" style="display: block; margin-left: 2px;  position: absolute; width: <?php echo $ratio; ?>%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                         </div>
                          <div class="views">{{ $product->views }} views</div>
                        </div>
                          <div class="showinteraction" style="transform: translateX(0px) translateY(0px) translateZ(0px); display: none; opacity: 0; transition: opacity 350ms ease-in;">
                          <a href="#" class="w-button settings tooltip-left" data-tooltip="Options">&nbsp;</a>
                          <a href="#"  class="w-button details tooltip-right" data-tooltip="Details">&nbsp;</a>
                          <a href="#" class="w-button favorite tooltip-left" data-tooltip="Favorite">&nbsp;</a>
                          <a href="" target="_blank" class="w-inline-block link"></a>
                        </div>                    
                    </div>            
                  </div>
                  <div class="w-preserve-3d back">
                     <div data-ix="hover" class="w-preserve-3d entity">
                        <h5 class="white">Short &nbsp;Description</h5>
                        <div class="white">CPU: i7<br> RAM: 4GB<br> HDD: 1TB<br>GPU: Nvidia</div>
                     </div>
                  </div>
             </div>
            </div>
            
         </li>
         @endforeach
        </ul>
      </div>             
  </div>

   <div data-ix="showmorebutton" class="post">      
    <a href="#" class="w-button left_navigation">&nbsp;</a>
    <a href="#" class="w-button right_navigation">&nbsp;&nbsp;</a>
      <div class="w-clearfix block">
        <a href="#" class="w-inline-block">
         <h3 class="head">Top Rated</h3>
       </a>
         <a href="#" class="w-inline-block showmore" style="display: none;">
         <img width="15" height="15" src="{{ asset( '/images/showmore.png') }}" class="general_pic"></a>
      </div>
      <div class="scrollable" >
        <ul id="list">
         @foreach ($top_rated as $product)
         <li>
            
          <div class="card_block">
              <div  class="item_card" >
                  <div class="front">
                    <div data-ix="hover" class="entity">
                        <div class="image_div">
                          <a href="detailsProduct/{{ $product->PROD_ID }}" class="w-inline-block image_link">
                          <img width="100%" height="100%"  class="w-inline-block image_scale" src="{{ asset( '/product_img/' . $product->image ) }}">
                          </a>
                        </div>
                        <div class="w-clearfix details_div">
                          <div class="title_div">
                            <a data-new-link="true" href="detailsProduct/{{ $product->PROD_ID }}">
                              <strong><span class="product-name">{{ $product->PROD_NAME }}</span></strong>
                            </a>
                          </div>
                          <div class="cat_div"><span class="category">In: 
                              <a class="custom" href="#">{{$product->CAT_NAME}}</a></span>
                          </div>
                            
                         <div class="rate_div tooltip-right" data-tooltip="Rate"
                              data-ProductID="{{ $product->PROD_ID }}"
                              data-ProductImage="{{ asset( '/product_img/' . $product->image ) }}"
                              data-ProductName="{{ $product->PROD_NAME }}"
                              data-CatID="{{$product->CAT_ID}}"
                              data-CategorName="{{$product->CAT_NAME}}">
                          <div class="rating" style="display: block; margin-left: 2px;   position: absolute; width: 100%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                          <?php
                            $ratio=($product->AVG_RATING/5)*100;
                           ?>
                          <div class="rating" style="display: block; margin-left: 2px;  position: absolute; width: <?php echo $ratio; ?>%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                         </div>
                          <div class="views">{{ $product->views }} views</div>
                        </div>
                          <div class="showinteraction" style="transform: translateX(0px) translateY(0px) translateZ(0px); display: none; opacity: 0; transition: opacity 350ms ease-in;">
                          <a href="#" class="w-button settings tooltip-left" data-tooltip="Options">&nbsp;</a>
                          <a href="#" class="w-button details tooltip-right" data-tooltip="Details">&nbsp;</a>
                          <a href="#" class="w-button favorite tooltip-left" data-tooltip="Favorite">&nbsp;</a>
                          <a href="" target="_blank" class="w-inline-block link"></a>
                        </div>                    
                    </div>            
                  </div>
                  <div class="w-preserve-3d back">
                     <div data-ix="hover" class="w-preserve-3d entity">
                        <h5 class="white">Short &nbsp;Description</h5>
                        <div class="white">CPU: i7<br> RAM: 4GB<br> HDD: 1TB<br>GPU: Nvidia</div>
                     </div>
                  </div>
             </div>
            </div>
            
         </li>
         @endforeach
        </ul>
      </div>             
  </div>

   <div data-ix="showmorebutton" class="post">    
    <a href="#" class="w-button left_navigation">&nbsp;</a>
    <a href="#" class="w-button right_navigation">&nbsp;&nbsp;</a>
      <div class="w-clearfix block">
        <a href="#" class="w-inline-block">
         <h3 class="head">Most Viewed</h3>
       </a>
         <a href="#" class="w-inline-block showmore" style="display: none;">
         <img width="15" height="15" src="{{ asset( '/images/showmore.png') }}" class="general_pic"></a>
      </div>
      <div class="scrollable" >
        <ul id="list">
         @foreach ($most_viewed as $product)
         <li>
            
          <div class="card_block">
              <div class="item_card" >
                  <div class="front">
                    <div data-ix="hover" class="entity">
                        <div class="image_div">
                          <a href="detailsProduct/{{ $product->PROD_ID }}" class="w-inline-block image_link">
                          <img width="100%" height="100%"  class="w-inline-block image_scale" src="{{ asset( '/product_img/' . $product->image ) }}">
                          </a>
                        </div>
                        <div class="w-clearfix details_div">
                          <div class="title_div">
                            <a data-new-link="true" href="detailsProduct/{{ $product->PROD_ID }}">
                              <strong><span class="product-name">{{ $product->PROD_NAME }}</span></strong>
                            </a>
                          </div>
                          <div class="cat_div"><span class="category">In: 
                              <a class="custom" href="#">{{$product->CAT_NAME}}</a></span>
                          </div>
                            
                         <div class="rate_div tooltip-right" data-tooltip="Rate"
                              data-ProductID="{{ $product->PROD_ID }}"
                              data-ProductImage="{{ asset( '/product_img/' . $product->image ) }}"
                              data-ProductName="{{ $product->PROD_NAME }}"
                              data-CatID="{{$product->CAT_ID}}"
                              data-CategorName="{{$product->CAT_NAME}}">
                          <div class="rating" style="display: block; margin-left: 2px;   position: absolute; width: 100%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                          <?php
                            $ratio=($product->AVG_RATING/5)*100;
                           ?>
                          <div class="rating" style="display: block; margin-left: 2px;  position: absolute; width: <?php echo $ratio; ?>%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                         </div>
                          <div class="views">{{ $product->views }} views</div>
                        </div>
                          <div class="showinteraction" style="transform: translateX(0px) translateY(0px) translateZ(0px); display: none; opacity: 0; transition: opacity 350ms ease-in;">
                          <a href="#" class="w-button settings tooltip-left" data-tooltip="Options">&nbsp;</a>
                          <a href="#"  class="w-button details tooltip-right" data-tooltip="Rate">&nbsp;</a>
                          <a href="#" class="w-button favorite tooltip-left" data-tooltip="Favorite">&nbsp;</a>
                          <a href="" target="_blank" class="w-inline-block link"></a>
                        </div>                    
                    </div>            
                  </div>
                  <div class="w-preserve-3d back">
                     <div data-ix="hover" class="w-preserve-3d entity">
                        <h5 class="white">Short &nbsp;Description</h5>
                        <div class="white">CPU: i7<br> RAM: 4GB<br> HDD: 1TB<br>GPU: Nvidia</div>
                     </div>
                  </div>
             </div>
            </div>
            

         </li>
         @endforeach
        </ul>
      </div>             
  </div>
@foreach ($categories as $category)
  <div data-ix="showmorebutton" class="post">    
    <a href="#" class="w-button left_navigation">&nbsp;</a>
    <a href="#" class="w-button right_navigation">&nbsp;&nbsp;</a>
      <div class="w-clearfix block">
        <a href="#" class="w-inline-block">
         <h3 class="head">{{$category->CAT_NAME}}</h3>
       </a>
         <a href="#" class="w-inline-block showmore" style="display: none;">
         <img width="15" height="15" src="{{ asset( '/images/showmore.png') }}" class="general_pic"></a>
      </div>
      <div class="scrollable" >
        <ul id="list">
         <?php $count=1; ?>
        @foreach ($products as $product)
         @if ($product->CAT_ID==$category->CAT_ID&&$count<'6')
        
         <?php $count=$count+1; ?>
         <li>
            <div class="card_block">
              <div  class="item_card" >
                  <div class="front">
                    <div data-ix="hover" class="entity">
                        <div class="image_div">
                          <a href="detailsProduct/{{ $product->PROD_ID }}" class="w-inline-block image_link">
                          <img width="100%" height="100%"  class="w-inline-block image_scale" src="{{ asset( '/product_img/' . $product->image ) }}">
                          </a>
                        </div>
                        <div class="w-clearfix details_div">
                          <div class="title_div">
                            <a data-new-link="true" href="detailsProduct/{{ $product->PROD_ID }}">
                              <strong><span class="product-name">{{ $product->PROD_NAME }}</span></strong>
                            </a>
                          </div>
                          <div class="cat_div"><span class="category">In: 
                              <a class="custom" href="#">{{$product->CAT_NAME}}</a></span>
                          </div>
                            
                         <div class="rate_div tooltip-right" data-tooltip="Rate"
                              data-ProductID="{{ $product->PROD_ID }}"
                              data-ProductImage="{{ asset( '/product_img/' . $product->image ) }}"
                              data-ProductName="{{ $product->PROD_NAME }}"
                              data-CatID="{{$product->CAT_ID}}"
                              data-CategorName="{{$product->CAT_NAME}}">
                          <div class="rating" style="display: block; margin-left: 2px;   position: absolute; width: 100%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #c4c4c4;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                          <?php
                            $ratio=($product->AVG_RATING/5)*100;
                           ?>
                          <div class="rating" style="display: block; margin-left: 2px;  position: absolute; width: <?php echo $ratio; ?>%;height: 20px; overflow-x: hidden; overflow-y:hidden; white-space: nowrap; "> 
                            <ul>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                               <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                              <li>
                                <svg width="16" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 0px;"><polygon style="fill: #ffd000;stroke:black;fill-opacity:1;stroke-width:3px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>
                              </li>
                            </ul>   
                          </div>
                         </div>
                          <div class="views">{{ $product->views }} views</div>
                        </div>
                          <div class="showinteraction" style="transform: translateX(0px) translateY(0px) translateZ(0px); display: none; opacity: 0; transition: opacity 350ms ease-in;">
                          <a href="#" class="w-button settings tooltip-left" data-tooltip="Options">&nbsp;</a>
                          <a href="#"  class="w-button details tooltip-right" data-tooltip="Details">&nbsp;</a>
                          <a href="#" class="w-button favorite tooltip-left" data-tooltip="Favorite ">&nbsp;</a>
                          <a href="" target="_blank" class="w-inline-block link"></a>
                        </div>                    
                    </div>            
                  </div>
                  <div class="w-preserve-3d back">
                     <div data-ix="hover" class="w-preserve-3d entity">
                        <h5 class="white">Short &nbsp;Description</h5>
                        <div class="white">CPU: i7<br> RAM: 4GB<br> HDD: 1TB<br>GPU: Nvidia</div>
                     </div>
                  </div>
             </div>
            </div>
            @endif
         </li>
         @endforeach
        </ul>
      </div>             
  </div>
 @endforeach

</div>
<!--Valo jinish
  <script defer>
  </script>

  <script>
      
    document.addEventListener("DOMContentLoaded", theDomHasLoaded, false);
    function theDomHasLoaded(e) {
      // do something
      show_hide_right_side_bar();
    }
    window.addEventListener("load", pageFullyLoaded, false);
    function pageFullyLoaded(e) {
      // do something again
    }
    

      var FunctionOne = function () {
      // create a deferred object
      var r = $.Deferred();
      // do whatever you want (e.g. ajax/animations other asyc tasks)
      show_hide_right_side_bar();
      r.resolve();
      // return the deferred object
      return r;
      };

      // define FunctionTwo as needed
      var FunctionTwo = function () {
      adjust();
      };

      // call FunctionOne and use the `done` method
      // with `FunctionTwo` as it's parameter
      FunctionOne().done(FunctionTwo);
  </script>
-->
<!putting not urgent js to last for page speed*> 




{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/jquery.mousewheel.min.js')!!}
<!Load this script only if firefox>
@if(isset($_SERVER['HTTP_USER_AGENT'])&&(strlen(strstr($_SERVER['HTTP_USER_AGENT'], 'Firefox')) > 0)) 
    {!!Html::script('js/perfect-scrollbar.jquery.min.js')!!}
@endif

<!load and decorate the div asap>
<!this will be read at the end so automatically this will work first than any other javascript>
<!the page freezed the browser before the culprit was the malihu custom scrollbar
it doesn't hang now,thanks to my custom scroll>
<script>
var step = 200;
var pos;
var scrolltarget;
var right=true;
var horizontal=false;
//this is to detect left or right mousewheel movement so that we can smooth
//out navigation 
$(' .scrollable ul').mousewheel(function(event, delta, deltaX, deltaY) {   
  if(deltaX>-1){
    //right scrolling
    right=true;
  }
  else{
    //left scrolling
    right=false;
  }
  horizontal=true
     
});
//make a similar function for key scrolling as well
//also do something about the touch options

//now as firefox doesn't allow custom design for scrollbar
//we have to go with a lightweight jquery plugin instead
//this plugin gives irregular behaviour in internet explorer
//do something about internet explorer as well
//malihu custom scrollbar plugin works great everywhere but if it didn't 
//freeze the browser and was lightweight we would use it
//still consider to use malihu 
if(navigator.userAgent.toLowerCase().indexOf('firefox') !== -1){
  //fetch the script first
  //$.getScript("/js/perfect-scrollbar.jquery.min.js");
  //apply the plugin
  $(' .scrollable ul').perfectScrollbar({
    suppressScrollY: true
  });
  //detect scrolling event according to scrollbar
  $(' .scrollable ul').on('ps-scroll-x', function () {
    scrolltarget=$(this);
    pos=scrolltarget.scrollLeft();
    //is scrolled position evenly divided by 200?
    if(pos%step!=0){
      //is it mousewheel event?
      if(horizontal){
        //right navigation
        if(right){
          scrolltarget.scrollLeft(pos-pos%step+step);
        }
        else {
          //left navigation
          scrolltarget.scrollLeft(pos-pos%step);
        }
        horizontal=false;
      }
      else{
        //if it is not a mousewheel movement 
        //then due to dragging/clicking of scroll
        //wait for some offset to cross
        if(pos%step>100){
          scrolltarget.scrollLeft(pos-pos%step+step);
        }
        else {
          scrolltarget.scrollLeft(pos-pos%step);
        }
      }    
    }
  });
  
  
}
else{
  //default behaviour in every browser except firefox
  $(' .scrollable ul').scroll(function(e){
    scrolltarget=$(this);
    pos=scrolltarget.scrollLeft();
    //scrollbar clicking is not working because 
    //whenever a user clicks on scrollbar it doesn't abruptly changes its value 
    //rather it monotonically increases, and because of it, it goes back to where it was
    //so we can hide the scrollbarpane for now
    if(pos%step!=0){
      if(horizontal){
        if(right){
          scrolltarget.scrollLeft(pos-pos%step+step);
        }
        else {
          scrolltarget.scrollLeft(pos-pos%step);
        }
        horizontal=false;
      }
      else{
        if(pos%step>100){
          scrolltarget.scrollLeft(pos-pos%step+step);
        }
        else {
          scrolltarget.scrollLeft(pos-pos%step);
        }
      }    
    }         
  });
}

function load_jRate(i,j) {
     var initial_value=j;
     $("#jRate"+i).jRate({
        strokeColor: 'black', 
        startColor: '#ffd000',
        endColor:  '#ffd000', 
        rating: j,                             
        width: 18,
        height: 20,
        precision: 1,
        backgroundColor: '#c4c4c4',
        onChange: function(rating) {
          
        },
        onSet: function(rating) {
          if(rating!=initial_value) $(this).parent().attr("data-Changed",1);
          else $(this).parent().attr("data-Changed",0);;
          $(this).parent().attr("data-RatingValue",rating);
        }
     });
   }

  /*below are all helper functions for decorating the homepage*/
  /*inside loading function it didn't work but it has no ill effect since 
  button doesn't show before the page is fully loaded*/
  var disable_auto_right=false;/*if user clicks show/hide once disable auto behaviour*/
  var disable_auto_left=false;
  $(".hide_right_side_bar").click(function(e){
      var delay=0;
      if(e.hasOwnProperty('originalEvent')){
          disable_auto_right=true;
          delay=1000;
      }
      $('.right_side_bar').animate({right: "-280"},delay);
      $('.showandhidebutton_right').animate({right: "-20"},delay);
      $('.main-div').animate({'margin-right': '0px'}, delay);
       var offset_string=$('.main-div').css("margin-left");
      if(offset_string=="200px")  offset=200;
      else if(offset_string=="0px")  offset=0;
      resizeDiv(offset);
      show_show_right_side_bar();
      hide_hide_right_side_bar() ;
      
      
      
    });

   $(".show_right_side_bar").click(function(e){
      var delay=0;
      if(e.hasOwnProperty('originalEvent')){
          disable_auto_right=true;
          delay=1000;
      }
      $('.right_side_bar').animate({right: "0"},delay);
      $('.showandhidebutton_right').animate({right: "260"},delay);
      $('.main-div').animate({'margin-right': '280px'}, delay);
      var offset_string=$('.main-div').css("margin-left");
      if(offset_string=="200px")  offset=480;
      else if(offset_string=="0px")  offset=280;
      resizeDiv(offset);
      hide_show_right_side_bar();
      show_hide_right_side_bar() ;
      
    });

  function show_show_right_side_bar() {
    $(".show_right_side_bar").delay(500).fadeIn();         
  }
  function hide_show_right_side_bar() {
    $(".show_right_side_bar").css("display","none");         
  }
  function show_hide_right_side_bar() {
    $(".hide_right_side_bar").delay(500).fadeIn();         
  }
  function hide_hide_right_side_bar() {
    $(".hide_right_side_bar").css("display","none");         
  }
 

  $(".hide_left_side_bar").click(function(e){   
      var delay=0;
      if(e.hasOwnProperty('originalEvent')){
          disable_auto_left=true;
          delay=1000;
      }      
      $('.left_side_bar').animate({left: "-200"},delay);
      $('.showandhidebutton_left').animate({left: "-20"},delay);
      $('.main-div').animate({'margin-left': '0px'}, delay);
      $('.subsection').animate({'margin-left': '0px'}, delay);
      var offset_string=$('.main-div').css("margin-right");
      if(offset_string=="280px")  offset=280;
      else if(offset_string=="0px")  offset=0;
      resizeDiv(offset);
      show_show_left_side_bar();
      hide_hide_left_side_bar();
      
  });

  $(".show_left_side_bar").click(function(e){
    var delay=0;

    if(e.hasOwnProperty('originalEvent')){
        delay=1000;
        disable_auto_left=false;
    }
    if(vpw>=1150){
        $('.left_side_bar').animate({left: "0"},delay);
        $('.showandhidebutton_left').animate({left: "180"},delay);
        $('.main-div').animate({'margin-left': '200px'}, delay);
        $('.subsection').animate({'margin-left': '200px'}, delay);
        var offset_string=$('.main-div').css("margin-right");
        if(offset_string=="280px")  offset=480;
        else if(offset_string=="0px")  offset=200;
        resizeDiv(offset);           
      } 
       else{
        $('.left_side_bar').animate({left: "0"},delay);
        $('.showandhidebutton_left').animate({left: "180"},delay);
        $('.main-div').animate({'margin-left': '0px'}, delay);
        $('.subsection').animate({'margin-left': '0px'}, delay);
      } 
      hide_show_left_side_bar();
      show_hide_left_side_bar() ;
      
  });

  function show_show_left_side_bar() {
    $(".show_left_side_bar").delay(500).fadeIn();         
  }
  function hide_show_left_side_bar() {
    $(".show_left_side_bar").css("display","none");         
  }
  function show_hide_left_side_bar() {
    $(".hide_left_side_bar").delay(500).fadeIn();         
  }
  function hide_hide_left_side_bar() {
    $(".hide_left_side_bar").css("display","none");         
  }


 
 function adjust_offset() {
    
    var offset_string=$('.main-div').css("margin-right")+$('.main-div').css("margin-left");

    if(offset_string=="0px200px")  offset=200;
    else if(offset_string=="280px200px")  offset=480;
    else if(offset_string=="280px0px")  offset=280;
    else if(offset_string=="0px0px")  offset=0;
   // alert(offset);
   resizeDiv(offset);
  }

        // define our function with the callback argument
  function some_function(arg1, callback) {
    // this generates a random number between
    // arg1 and arg2
    var same_view = auto_hide_left_side_bar(arg1);
    // then we're done, so we'll call the callback and
    // pass our result
    callback(same_view);
  }
  
  function auto_hide_left_side_bar(vpw_1){
    if(vpw_1<525&&$('.right_side_bar').css("right")=="0px"&&disable_auto_right==false){ 
        $(".hide_right_side_bar").trigger("click");                  
      }
      else if(vpw_1>=525&&$('.right_side_bar').css("right")=="-280px"&&disable_auto_right==false){
          $(".show_right_side_bar").trigger("click");
      }
      else{
        /*adjust main div's margin*/
        adjust_offset();
      }
      console.log("called first");  
     
    
    return vpw_1;
  }

  function adjust(){
    vpw=$(window).width();
      // call the function
    some_function(vpw, function(vpw_2) {
      // this anonymous function will run when the
      // callback is called
      /*autohidesidebar*/
      console.log("called 2nd");
      if(vpw_2<1150&&$('.left_side_bar').css("left")=="0px"){ 
        $(".hide_left_side_bar").trigger("click");                  
      }
      else if(vpw_2>=1150&&$('.left_side_bar').css("left")=="-200px"&&disable_auto_left==false){
        $(".show_left_side_bar").trigger("click");
      }
      else if(vpw_2>=1150&&$('.left_side_bar').css("left")=="0px"&&disable_auto_left==true){
        $('.main-div').animate({'margin-left': '200px'}, 0);
        $('.subsection').animate({'margin-left': '200px'}, 0);
        var offset_string=$('.main-div').css("margin-right");
        if(offset_string=="280px")  offset=480;
        else if(offset_string=="0px")  offset=200;
        resizeDiv(offset);
      }       
    });
  }


  window.onresize = function (event) {
    adjust();
    
  }

  function preventDefault_class(classname){
    
    $(classname).hover(function() {
      var oldScrollPos = $(window).scrollTop();

      $(window).on('scroll.scrolldisabler', function(event) {
        $(window).scrollTop(oldScrollPos);
        event.preventDefault();
      });
    }, function() {
      $(window).off('scroll.scrolldisabler');
    });
  }

  

  function resizeDiv(size) {
    vpw = $(window).width();
    if ((vpw-size) >= 1245) {
      x=1242;
      y=1202;
    }
    else if ((vpw-size) >= 1045) {
      x=1042;
      y=1002;
    }
    else if ((vpw-size) >= 845) {
      x=842;
      y=802;
    }
    else if ((vpw-size) >= 645) {
      x=642;
      y=602;
    }
    else if ((vpw-size) >= 445) {
      x=442;
      y=402;
    }
    else {
      x=242;
      y=202;
    }
    $('.post').animate({'width': x + 'px'}, 0);
    $('.scrollable').animate({'width': y + 'px'}, 0);
   }
</script>

<!now decoarate the homepage on load>

<script type="text/javascript">
  
  $(window).load(function(){      

        var i;
        for (i = 1; i < "<?php echo $count_id; ?>"; i++) {
           load_jRate(i,0);
        }
         

        $(document).mouseup(function (e)
          {
             var container = $(".left_side_bar");
             var showandhidebutton_left=$(".showandhidebutton_left");
             var hide_left_side_bar=$(".hide_left_side_bar");
             vpw = $(window).width();
            if(vpw<1150){
              if (!container.is(e.target)&&!showandhidebutton_left.is(e.target)
                  &&!hide_left_side_bar.is(e.target) // if the target of the click isn't the container...
                  && container.has(e.target).length === 0) // ... nor a descendant of the container
              {
                // 
                if($('.left_side_bar').css("left")=="0px")
                 $(".hide_left_side_bar").trigger("click");  
              }
            }

              
          });

        /*show only after the full page has loaded
        so that clicking before has no ill-effect*/
        show_hide_right_side_bar(); 
        show_hide_left_side_bar(); 
        /*adjust main div's element according to width*/
        adjust();

        /*prevent default in review scrolling*/
        preventDefault_class(".description_details");
        preventDefault_class(".review_area");
        preventDefault_class(".left_side_bar");
        preventDefault_class(".right_side_bar");

        /*use delegate functions in these*/
        $(".details").click(function(){                              
          $(this).parent().parent().parent().parent().css({
            "transform-style": "preserve-3d",
            "transition": "transform 1000ms",
            "transform": "rotateX(0deg) rotateY(180deg) rotateZ(0deg)"
          });         
        });

        
        $(".showmore").click(function(e){
          e.preventDefault();
          var par=$(this).parents('.post');
          var markup="<li><div class='entity'></div></li>";
          par.find("#list").append(markup);
          
        });

        $('.more').click(function() {
          var clicks = $(this).data('clicks');
          if (clicks) {
             // 2nd clicks
              $( ".description" ).fadeOut( "slow" );
          } else {
             // 1st clicks
             $( ".description" ).fadeIn( 1500 );
          }
          $(this).data("clicks", !clicks);
        });

          $(".card_block").delegate(".item_card","mouseleave", function(){
              $(this).css({
                      "transform-style": "preserve-3d",
                      "transition": "transform 1000ms",
                      "transform": "rotateX(0deg) rotateY(0deg) rotateZ(0deg)"
                    });    
             
          });
      });
</script>
<!end of decorating>
 
<!sending token in advance for ajax, how this works??
  Part of Authentication Module>

<script type="text/javascript">
  $(document).ready(function(){
    //alert('Successfully Loaded');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
        var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
        }
    });
   });
</script>

<!actual handling of login/signup form
  Part of Authentication Module>


<script type="text/javascript">
   $(document).ready(function(){
    //alert('Successfully Loaded');
     
    var loginForm = $("#loginForm");
    loginForm.submit(function(e){
        /*erasing any previous error message*/
        $("#error_div_logIn").css({"display": "none"});
        /*also locking the close button for any unintended behaviour*/ 
        $(".close_button").css({"display": "none"});
        /*show users that something is happening preventing them from doing reckless thing*/
        var button=$(this).find('input[type=submit]');
        button.prop('disabled', true);
        button.attr('value','Please wait...');

        e.preventDefault();
        var loginData = loginForm.serialize();
        //alert(loginData);
        $.ajax({
            url:'auth/login',
            type:'POST',
            data:loginData,
            success:function(data){
                //after advanced knowledge enable throttlelogin again, if you need it 
                $("#loginForm").css({"display": "none"});
                $("#error_div_logIn").css({"display": "none"}); 
                $("#success_div_logIn").css({"display": "block"}); 
                $(".close_button").css({"display": "block"});
                button.prop('disabled', false);
                button.attr('value','Log In');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown){
              //alert('HTTP Error: '+errorThrown+' | Error Message: '+textStatus);
              //why not error message from laravel?? work this out
              $("#loginForm").css({"display": "block"});
              $("#error_div_logIn").css({"display": "block"}); 
              $(".close_button").css({"display": "block"});              
              button.prop('disabled', false);
              button.attr('value','Log In');
            }
            /*error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                $("#loginForm").css({"display": "block"});
                $("#error_div_logIn").css({"display": "block"}); 
            }*/
        });
    });

    var signupForm = $("#signupForm");
    signupForm.submit(function(e){
        /*erasing any previous error message*/
        $("#error_div_signUp").css({"display": "none"}); 
        /*also locking the close button for any unintended behaviour*/ 
        $(".close_button").css({"display": "none"});
        /*show users that something is happening preventing them from doing reckless thing*/
        var button=$(this).find('input[type=submit]');
        button.prop('disabled', true);
        button.attr('value','Please wait...');

        e.preventDefault();//what does it do?
        var signupData = signupForm.serialize();//is this the right way?

        $.ajax({
            url:'auth/register',//is this all laravel needs to know
            type:'POST',
            data:signupData,
            success:function(data){
                $("#signupForm").css({"display": "none"}); 
                $("#error_div_signUp").css({"display": "none"}); 
                $("#success_div_signUp").css({"display": "block"}); 
                $(".close_button").css({"display": "block"});
                button.prop('disabled', false);
                button.attr('value','Sign Up');
                location.reload();
            },
            error: function (data) {
              //getting no error messgae from laravel understand the middleware deeply
                $("#signupForm").css({"display": "block"}); 
             
                var errors = $.parseJSON(data.responseText);
                var errorMessage="";
                $.each(errors, function(index, value) {
                    errorMessage += value;                    
                });
                $("#error_message_signUp").text(errorMessage);
                $("#error_div_signUp").css({"display": "block"});
                $(".close_button").css({"display": "block"});  
                button.prop('disabled', false);
                button.attr('value','Sign Up');            
            }
        });
    });
    
    
  });
</script>
<!end of authentication module>


<!start of Rate_and_Review Module>

<script type="text/javascript">
  
  /*(function( $ ){
      $.myPOST = function( url, data, success, timeout ) {      
      var settings = {
        type : "POST", //predefine request type to POST
        'url'  : url,
        'data' : data,
        'success' : success,
        'timeout' : timeout
      };
      $.ajax(settings)
    };

    $.fetch_ajax = function(prod_data) {
        $.ajax({
            type: "POST",
            url: "rate/fetchCiteria",
            data: prod_data,
            dataType: "json",
            timeout: 10000, // in milliseconds
            success: function(response) {
              var all_null=true
              //yes we got whatever we needed now decorate again -_-
              $('.style_rating').empty();
              //save these for submitting purposes
              //$('.style_rating').attr('data-UserID',user_id);
              $('.style_rating').attr('data-ProductID',product_id);
              $.each(response.rate_citeria, function(i, citeria){
                  //console.log(citeria.RAT_CAT_ID);
                  $('.style_rating').append('<li class="w-clearfix rate"><div data-RateCiteriaID="'+citeria.RAT_CAT_ID+'" data-RatingValue="'+citeria.RATING_VAL+'" data-Changed="0" id="jRate'+citeria.RAT_CAT_ID+'" class="rating_value"></div><div class="rate_citeria">'+citeria.RAT_CAT_NAME+'</div></li>');
                  //now load jrate script, for getting the rate value
                  //alert(citeria.RATING_VAL);
                  if(citeria.RATING_VAL==null)
                    load_jRate(citeria.RAT_CAT_ID,0);
                  else{
                    all_null=false;
                    load_jRate(citeria.RAT_CAT_ID,citeria.RATING_VAL);
                  }
                    
              });
              if(!all_null){
                $('#rate_title').text('Edit your rating :')
                //$('#review_title').text('Edit your review :') write a separate condition if review is also empty
              }
              else{
                $('#rate_title').text('Rate this item :')
               // $('#review_title').text('Write a review :')
              }
              //remove loading screen
              $(".black_overlay_in_rating").css({"display": "none"});
              //nice and cool focus, make it look like it was clicked
              //window.location.hash = '.rateandreview';
              //first give it a color
              $('.rateandreview').css({
                'background-color':'#a6a6a6',
                'transition':'background-color 0ms linear'
              });
              //then take it away :V why use jqueryUI.min.js(146kb -_-) when have me
              setTimeout(function(){ 
                  $('.rateandreview').css({
                    'background-color':'#e6e6e6',
                    'transition':'background-color 1000ms ease-out'
                  });
               }, 0);
            },
            error: function(request, status, err) {
                var error_message="";
                var error=false;
                if(status == "timeout") {
                  error_message="Connection timed out";
                  error=true;
                }
                else if(request.status == 0){
                  error_message="Connection is lost";
                  error=true;
                }
                else if(request.status == 500){
                  error_message="Internel Server Error";
                  error=true;
                }
                else{
                  error_message="There was a problem submitting your request";
                  error=true;
                }
                if(error==true){
                  //show error message accordingly
                  $(".black_overlay_in_rating").css({"display": "none"});
                  $("#message_in_rating").text(error_message);
                  $("#message_overlay").css({
                    "background-color":"white",
                    "opacity": "0.85"
                  });
                  $("#message_overlay").css({"display": "block"});
                  //also show retry div
                  $("#retry").css({"display": "block"});
                  //set type
                  $("#retry_message").attr("data-Type","fetch");
                }
            }
          });
    };
  })( jQuery );

*/
  //this variable is stored globally because of the fetching purpose
  
  var reference_div=null;

  $(window).load(function(){

    //using delegate method, as more entity can be addded dynamically
    //write a code to save guest's input, so that it is showed after logging in
    $(".entity").delegate(".rate_div","click", function(){
      reference_div=$(this);
      //if the right_side_bar is closed open it please
      if($('.right_side_bar').css("right")=="-280px"){
        $(".show_right_side_bar").trigger("click");//no cool transition though        
      }
      //get all the necessary data information from the 
      //rate_div data tag
      var product_id=$(this).attr('data-ProductID');
      var product_name=$(this).attr('data-ProductName');
      var product_image=$(this).attr('data-ProductImage')
      var category_id=$(this).attr('data-CatID');      
      var category_name=$(this).attr('data-CategorName');
      var guest={!! json_encode(Auth::guest()) !!};
      var user_id=null;
      if(!guest){
        user_id=$('#profile').attr('data-UserID');
      }
              

      //remove for safety
      $("#message_overlay").css({"display": "none"});
      $("#retry").css({"display": "none"});
      $("#message_in_rating").text("Submitting");
      $("#message_overlay").css({
        "background-color":"transparent",
        "opacity": "1"
      }); 
      //show loading gif
      $(".black_overlay_in_rating").css({"display": "block"});


      //Ok enuf with decoration now fetch data
      //First put all needed info in a neat format
      var product_data = '{"USER_ID":"'+user_id+'","PROD_ID":"'+product_id+'","CAT_ID":"'+category_id+'"}';
      //then convert it to json, dont forget to convert otherwise error message will be received
      var prod_data_JSON=JSON.parse(product_data);
      //you can use any convenient jquery ajax methods, you know how the function work right, no? see the doc online
      
      $.ajax({
        type: "POST",
        url: "rate/fetchCiteria",
        data: prod_data_JSON,
        dataType: "json",
        timeout: 10000, // in milliseconds
        success: function(response) {
          var all_null=true
          //yes we got whatever we needed now decorate
          //this portion is repeated again because of late reply from server
          $("#message_overlay").css({"display": "none"});
          $("#retry").css({"display": "none"});
          $("#message_in_rating").text("Submitting");
          $("#message_overlay").css({
            "background-color":"transparent",
            "opacity": "1"
          }); 
          //turn off loading
          $(".black_overlay_in_rating").css({"display": "none"});

          //populate rateandreview div
          $('.mini_product_img').attr('src',product_image);
          $('.product_name_in_rate').text(product_name);
          //do something when your project is advanced and more than one category
          //exists for an item
          $('.cat_name_in_rate').text(category_name);

          $('.style_rating').empty();
          //save these for submitting purposes
          $('.style_rating').attr('data-ProductID',product_id);

          $.each(response.rate_citeria, function(i, citeria){
              //console.log(citeria.RAT_CAT_ID);
              $('.style_rating').append('<li class="w-clearfix rate"><div data-RateCiteriaID="'+citeria.RAT_CAT_ID+'" data-RatingValue="'+citeria.RATING_VAL+'" data-Changed="0" id="jRate'+citeria.RAT_CAT_ID+'" class="rating_value"></div><div class="rate_citeria">'+citeria.RAT_CAT_NAME+'</div></li>');
              //now load jrate script, for getting the rate value
              //alert(citeria.RATING_VAL);
              if(citeria.RATING_VAL==null)
                load_jRate(citeria.RAT_CAT_ID,0);
              else{
                all_null=false;
                load_jRate(citeria.RAT_CAT_ID,citeria.RATING_VAL);
              }
                
          });
          if(!all_null){
            $('#rate_title').text('Edit your rating :')
            //$('#review_title').text('Edit your review :') write a separate condition if review is also empty
          }
          else{
            $('#rate_title').text('Rate this item :')
           // $('#review_title').text('Write a review :')
          }
          //nice and cool focus, make it look like it was clicked
          //window.location.hash = '.rateandreview';
          //first give it a color
          $('.rateandreview').css({
            'background-color':'#a6a6a6',
            'transition':'background-color 0ms linear'
          });
          //then take it away :V why use jqueryUI.min.js(146kb -_-) when have me
          setTimeout(function(){ 
              $('.rateandreview').css({
                'background-color':'#e6e6e6',
                'transition':'background-color 1000ms ease-out'
              });
           }, 0);
        },
        error: function(request, status, err) {
            var error_message="";
            var error=false;
            if(status == "timeout") {
              error_message="Connection timed out";
              error=true;
            }
            else if(request.status == 0){
              error_message="Connection is lost";
              error=true;
            }
            else if(request.status == 500){
              error_message="Internel Server Error";
              error=true;
            }
            else{
              error_message="There was a problem submitting your request";
              error=true;
            }
            if(error==true){
              //show error message accordingly
              $(".black_overlay_in_rating").css({"display": "none"});
              $("#message_in_rating").text(error_message);
              $("#message_overlay").css({
                "background-color":"white",
                "opacity": "0.85"
              });
              $("#message_overlay").css({"display": "block"});
              //also show retry div
              $("#retry").css({"display": "block"});
              //set type
              $("#retry_message").attr("data-Type","fetch");
            }
        }
      });

    });
    
    //handle retry 
    $("#retry_message").on("click", function(){
      //default view
      $("#message_overlay").css({"display": "none"});
      $("#retry").css({"display": "none"});
      $("#message_in_rating").text("Submitting");
      $("#message_overlay").css({
        "background-color":"transparent",
        "opacity": "1"
      }); 
      //do the same thing again 
      var type=$(this).attr("data-Type");
      if(type=="submit"){
        $("#submit_rate_and_review").trigger("click");
      }  
      else if(type=="fetch"){
        reference_div.trigger("click");        
      }  
      
    });
    

    //handle cancel
    $("#cancel_message").on("click", function(){
      //default view
      $("#message_overlay").css({"display": "none"});
      $("#retry").css({"display": "none"});
      $("#message_in_rating").text("Submitting");
      $("#message_overlay").css({
        "background-color":"transparent",
        "opacity": "1"
      });    
    });

    $("#submit_rate_and_review").on("click", function(){
      //if guest show sign_up
      //you can also some fancy stuff before showing the sign_up screen

      //checked with laravel authentication
      var user = {!! json_encode(Auth::guest()) !!};
      if(user)
        $("#sign_up").trigger("click");
      //user can submit rating but you have to keep a restriction for new users
      //so that no one can bombard with ratings and reviews
      //also make a good function for avg_rating, reputation point
      else{
        var rating_data,rating_input,rating_citeria, rating_val,user_id,product_id;
        rating_val=null;
        rating_data='{"rating":[';
        user_id=$('#profile').attr('data-UserID');
        product_id=$('.style_rating').attr('data-ProductID');

        $('.style_rating').find('li').each(function(){
          rating_input=$(this).find('.rating_value');
          rating_citeria=rating_input.attr('data-RateCiteriaID');
          rating_val=rating_input.attr('data-RatingValue');
          changed=rating_input.attr('data-Changed');
          //if user didn't rate it, dont add it to json
          if(changed=="1"){
            rating_data+='{"RAT_CAT_ID":'+rating_citeria+', "RATING_VAL":'+rating_val+'},';
          }
            
        });
        //if all null, i.e. user didn't insert anything then we will not do anything
        //but there's a bug if user submits the initial values are not updated with latest value
        //make an adjust for initial_value
        if(rating_data!='{"rating":['){
          //show loading gif
          $(".black_overlay_in_rating").css({"display": "block"});
          //show submitting message
          $("#message_overlay").css({"display": "block"});

          if(rating_data.charAt(rating_data.length-1)==","){
            rating_data=rating_data.slice(0, -1);
          }          
          rating_data+=']';
          rating_data+=', "USER_ID":'+user_id+',"PROD_ID":'+product_id+'}';
          //alert(rating_data);

          var rating_data_JSON=JSON.parse(rating_data);
          //you can use any convenient jquery ajax methods, you know how the function work right, no? see the doc online
          $.ajax({
            type: "POST",
            url: "rate/submit_Rate_and_Review",
            data: rating_data_JSON,
            dataType: "json",
            timeout: 10000, // in milliseconds
            success: function(response) {
              //as load is successful move loading gif
              $(".black_overlay_in_rating").css({"display": "none"});
              //and show submitted message
              $("#message_in_rating").text("Submitted");
              $("#message_overlay").css({
                "background-color":"white",
                "opacity": "0.85"
              });
              //reset messages to original state
              setTimeout(function(){ 
                $("#message_in_rating").text("Submitting");
                $("#message_overlay").css({
                  "background-color":"transparent",
                  "opacity": "1"
                });                    
               }, 1000);
               $("#message_overlay").fadeOut(1000);
            },
            error: function(request, status, err) {
                var error_message="";
                var error=false;
                if(status == "timeout") {
                  error_message="Connection timed out";
                  error=true;
                }
                else if(request.status == 0){
                  error_message="Connection is lost";
                  error=true;
                }
                else if(request.status == 500){
                  error_message="Internel Server Error";
                  error=true;
                }
                else{
                  error_message="There was a problem submitting your request";
                  error=true;
                }
                if(error==true){
                  //show error message accordingly
                  $(".black_overlay_in_rating").css({"display": "none"});
                  $("#message_in_rating").text(error_message);
                  $("#message_overlay").css({
                    "background-color":"white",
                    "opacity": "0.85"
                  });
                  $("#message_overlay").css({"display": "block"});
                  //also show retry div
                  $("#retry").css({"display": "block"});
                  //set type
                  $("#retry_message").attr("data-Type","submit");
                }
            }
          });

        }
        else{
          //as user made no changes show message accordingly
          $("#message_overlay").css({"display": "block"});
          $("#message_in_rating").text("You haven't made any changes.");
          $("#message_overlay").css({
            "background-color":"white",
            "opacity": "0.85"
          });
          setTimeout(function(){ 
            $("#message_in_rating").text("Submitting");
            $("#message_overlay").css({
              "background-color":"transparent",
              "opacity": "1"
            });                    
           }, 3000);
          //longer delay to let this register in user's mind
           $("#message_overlay").fadeOut(3000);
        }
      }
    });
  });
</script>
<!end of Rate_and_Review Module>

<!put all inurgent js to last>
{!!Html::script('js/jRate.js')!!} 
{!!Html::script('js/webfont.js')!!}
{!!Html::script('js/modernizr-2.7.1.js')!!}


<script>
WebFont.load({
         google: {
           families: ["Bitter:400,700,400italic","Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Merriweather:300,400,700,900","Lora:regular,italic,700","Oxygen:300,regular,700"]
         }
         });
</script>



{!!Html::script('js/layout.js')!!}

 


@endsection