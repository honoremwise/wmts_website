<?php include('header.php')?>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="mu-search-form">
             <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Contact</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Contact</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

 <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
            <h4>Leave a message ,suggestion or just a question </h4>
            <p>WMTS use this window to receive student views ,comments and question we will be glad to hear from </p>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                  <form class="contactform">
                    <p class="comment-form-author">
                      <label for="author">Name <span class="required">*</span></label>
                      <input type="text" required="required" size="30" value="" name="author">
                    </p>
                    <p class="comment-form-email">
                      <label for="email">Email <span class="required">*</span></label>
                      <input type="email" required="required" aria-required="true" value="" name="email">
                    </p>
                    <p class="comment-form-url">
                      <label for="subject">Subject</label>
                      <input type="text" name="subject">
                    </p>
                    <p class="comment-form-comment">
                      <label for="comment">Message</label>
                      <textarea required="required" aria-required="true" rows="8" cols="45" name="comment"></textarea>
                    </p>
                    <p class="form-submit">
                      <input type="submit" value="Send Message" class="mu-post-btn" name="submit">
                    </p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-right">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1705.6279035946036!2d30.08727335789837!3d-1.9164247189398982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca1481537b29f%3A0x517b900a5b704ab7!2sChristian%20Life%20World%20Mission%20Frontier!5e1!3m2!1sen!2srw!4v1592661268799!5m2!1sen!2srw" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->


  <!-- Start footer --><?php
  include('footer.php');?>
