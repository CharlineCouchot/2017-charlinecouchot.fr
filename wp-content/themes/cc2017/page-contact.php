<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 * Template Name: Page Contact
 */

get_header(); ?>

<div class="block-content">
    <h3 class="block-title">Get in touch</h3>
    <div class="row">
        <div class="col-md-6">
            <form id="contactForm" data-toggle="validator" class="contact-form shake">
                <div class="form-group">
                    <input id="name" type="text" class="form-control" name="Name" autocomplete="off" required data-error="Please enter your name" placeholder="* Your Name">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" autocomplete="off" required data-error="Please enter your email" placeholder="* Your Email">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <textarea id="message" class="form-control textarea" rows="10" name="Message" required data-error="Please enter your message subject" placeholder="* Your Message"></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" class="btn selected">Send Message</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                </div>
            </form>
        </div>

        <div class="col-md-5 offset-md-1">
            <div class="contact-content">
                <div class="contact-icon">
                    <i class="ion-ios-location-outline"></i>
                </div>
                <div class="contact-details">
                    <h5>Address</h5>
                    <p>234 House, Baker Street, London, EL10 6 BG</p>
                </div>
            </div>
            <div class="contact-content">
                <div class="contact-icon">
                    <i class="ion-ios-telephone-outline"></i>
                </div>
                <div class="contact-details">
                    <h5>Call Us</h5>
                    <p> <a href="tel:+4402920111222">+44 - 02920111222</a></p>
                </div>
            </div>
            <div class="contact-content">
                <div class="contact-icon">
                    <i class="ion-ios-email-outline"></i>
                </div>
                <div class="contact-details">
                    <h5>Enquiries</h5>
                    <p>alpha@james.com</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--Google Map-->
            <div id="map"></div>
            <!--Google Map End-->
        </div>
    </div>
</div>

<?php get_footer(); ?>
