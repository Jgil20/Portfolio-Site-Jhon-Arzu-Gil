<!-- ✅ Vanilla JavaScript AJAX Submission -->
<script>
document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent default form submission

  const form = e.target;
  const formData = new FormData(form);

  fetch("submit-website-form.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.text())
    .then((data) => {
      const msgBox = document.getElementById("msgContactSubmit");
      msgBox.style.display = "block";
      msgBox.innerHTML = data;
      form.reset(); // Optional: clear the form
    })
    .catch((error) => {
      document.getElementById("msgContactSubmit").innerHTML =
        "Oops! Something went wrong.";
    });
});
</script>
			
	<!-- end contact -->
    <?php include('quote-process.php');?>
	<!-- start footer -->
	<footer id="footer" class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="footer-top clearfix">
						<div class="row">
							<div class="column col-md-4">
						<h4 class="widget-title">Recent <span>Articles</span></h4>

<ul class="list-unstyled recent-post">

	<li class="clearfix">
		<div class="post-thumbnail">
			<a href="Quiz/index.html">
				<img src="images/blog/thumb/imagequiz.webp" alt="Take a quiz and test your knowledge">
			</a>
		</div><!-- end post-thumbnail -->

		<div class="post-content">
			<h3>
				<a href="Quiz/index.html">Take a Quiz and Test Your Knowledge</a>
			</h3>

			<div class="post-meta">
				<span>
					<i class="fas fa-calendar-alt"></i>
					<a href="#">Apr 27</a>
				</span>
			</div><!-- end post-meta -->
		</div><!-- end post-content -->
	</li>

	<li class="clearfix">
		<div class="post-thumbnail">
			<a href="Cloud%20Layout/index.php">
				<img src="images/blog/thumb/CloudLayoutArzuGil.avif" alt="Old template for Arzu Gil cloud computing layout">
			</a>
		</div><!-- end post-thumbnail -->

		<div class="post-content">
			<h3>
				<a href="Cloud%20Layout/index.php">Cloud Layout From Before</a>
			</h3>

			<div class="post-meta">
				<span>
					<i class="fas fa-calendar-alt"></i>
					<a href="#">Dec 29</a>
				</span>
			</div><!-- end post-meta -->
		</div><!-- end post-content -->
	</li>

	<li class="clearfix">
		<div class="post-thumbnail">
			<a href="Cloud%20Layout/index.php">
				<img src="images/blog/thumb/CloudLayoutArzuGil.avif" alt="Previous site layout">
			</a>
		</div><!-- end post-thumbnail -->

		<div class="post-content">
			<h3>
				<a href="Cloud%20Layout/index.php">Previous Site Layout</a>
			</h3>

			<div class="post-meta">
				<span>
					<i class="fas fa-calendar-alt"></i>
					<a href="#">Apr 27</a>
				</span>
			</div><!-- end post-meta -->
		</div><!-- end post-content -->
	</li>

</ul><!-- end recent-post -->
						
						 </div><!-- end col -->
                        
							<div class="column col-md-4">
								<h4 class="widget-title">Subscribe <span>NewsLetter</span></h4>
								<p>By subscribing to our mailing list you will always get latest news from us.</p>
								<!-- start mailchimp form -->
								<div class="mc-form-holder">
									<form action="subscribe.php" method="POST" id="mc-form">
    <input id="mc-email" class="form-control" placeholder="email address" name="EMAIL" type="email" required>
    <button class="btn" type="submit"><i class="fas fa-paper-plane"></i></button>
    <label for="mc-email"></label>
</form>
								</div>
								<!-- end mailchimp form -->
							</div><!-- end col -->
							<div class="column col-md-4">
								<h4 class="widget-title">Contact <span>Details</span></h4>
								<ul class="contact-info list-unstyled">
									<li><i class="fas fa-home"></i> 4409 Caplin St, Houston, Texas, 77026, USA</li>
									<li><i class="fas fa-phone"></i> <a href="tel:+1-713-870-9966">1-713-870-9966</a></li>
								    <!-- <li><i class="fas fa-mobile"></i> 832 302 1991</li> -->
									<li><i class="fas fa-envelope"></i> <a href="mailto:jhongil@arzugil.com">C.E.O</a></li>
								</ul><!-- end contact-info  -->
								
								<ul class="list-inline list-social clearfix">
									<li>
										<a href="https://www.facebook.com/profile.php?id=61552191954476" class="social-icon social-icon-facebook" target="_blank">
											<i class="fab fa-facebook-f"></i>
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a href="https://twitter.com/JhonArzuGil" class="social-icon social-icon-twitter" target="_blank">
											<i class="fab fa-twitter"></i>
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="https://www.linkedin.com/in/jhongil" class="social-icon social-icon-linkedin" target="_blank">
											<i class="fab fa-linkedin-in"></i>
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>
									<li>
										<a href="https://www.youtube.com/channel/UCnqgsyT440RgQFkHbnc3WRA" class="social-icon social-icon-youtube" target="_blank">
											<i class="fab fa-youtube"></i>
											<i class="fab fa-youtube"></i>
										</a>
									</li>
									<li>
										<a href="https://www.cloudtechnologycomputing.com" class="social-icon social-icon-link" target="_blank">
												<i class="fa-solid fa-link"></i>
												<i class="fa-solid fa-link"></i>
										</a>
									</li>
									<li>
										<a href="https://www.pinterest.com/jarzugil20/" class="social-icon social-icon-pinterest" target="_blank">
											<i class="fab fa-pinterest-p"></i>
											<i class="fab fa-pinterest-p"></i>
										</a>
									</li>
								</ul><!-- end list-social -->
							</div><!-- end col -->
						</div><!-- end row -->
					</div><!-- end footer-top  -->
				</div><!-- end col -->
			</div><!-- end row -->
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<a href="#" class="footer-logo-link"><img class="footer-logo" src="images/logo.avif" alt="Jhon Arzu-Gil"></a>
					<p class="text-center copyright">&copy; <span id="mgsYear"></span> <a href="https://cloudtechnologycomputing.com" class="footer-site-link">Cloud Technology Computing Corporation</a> All rights reserved. <a href="https://cloudtechnologycomputing.com" class="footer-site-link">Cloud Technology Computing Corporation</a></p>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</footer>
	<!-- end footer -->
	
	<!-- Chatbot Toggler -->
    <button id="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-rounded">close</span>
    </button>

    <div class="chatbot-popup">
      <!-- Chatbot Header -->
      <div class="chat-header">
        <div class="header-info">
          <svg class="chatbot-logo" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 1024 1024">
            <path
              d="M738.3 287.6H285.7c-59 0-106.8 47.8-106.8 106.8v303.1c0 59 47.8 106.8 106.8 106.8h81.5v111.1c0 .7.8 1.1 1.4.7l166.9-110.6 41.8-.8h117.4l43.6-.4c59 0 106.8-47.8 106.8-106.8V394.5c0-59-47.8-106.9-106.8-106.9zM351.7 448.2c0-29.5 23.9-53.5 53.5-53.5s53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5-53.5-23.9-53.5-53.5zm157.9 267.1c-67.8 0-123.8-47.5-132.3-109h264.6c-8.6 61.5-64.5 109-132.3 109zm110-213.7c-29.5 0-53.5-23.9-53.5-53.5s23.9-53.5 53.5-53.5 53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5zM867.2 644.5V453.1h26.5c19.4 0 35.1 15.7 35.1 35.1v121.1c0 19.4-15.7 35.1-35.1 35.1h-26.5zM95.2 609.4V488.2c0-19.4 15.7-35.1 35.1-35.1h26.5v191.3h-26.5c-19.4 0-35.1-15.7-35.1-35.1zM561.5 149.6c0 23.4-15.6 43.3-36.9 49.7v44.9h-30v-44.9c-21.4-6.5-36.9-26.3-36.9-49.7 0-28.6 23.3-51.9 51.9-51.9s51.9 23.3 51.9 51.9z"
            />
          </svg>
          <h2 class="logo-text">Chatbot</h2>
        </div>
        <button id="close-chatbot" class="material-symbols-rounded">keyboard_arrow_down</button>
      </div>

      <!-- Chatbot Body -->
      <div class="chat-body">
        <div class="message bot-message">
          <svg class="bot-avatar" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 1024 1024">
            <path
              d="M738.3 287.6H285.7c-59 0-106.8 47.8-106.8 106.8v303.1c0 59 47.8 106.8 106.8 106.8h81.5v111.1c0 .7.8 1.1 1.4.7l166.9-110.6 41.8-.8h117.4l43.6-.4c59 0 106.8-47.8 106.8-106.8V394.5c0-59-47.8-106.9-106.8-106.9zM351.7 448.2c0-29.5 23.9-53.5 53.5-53.5s53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5-53.5-23.9-53.5-53.5zm157.9 267.1c-67.8 0-123.8-47.5-132.3-109h264.6c-8.6 61.5-64.5 109-132.3 109zm110-213.7c-29.5 0-53.5-23.9-53.5-53.5s23.9-53.5 53.5-53.5 53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5zM867.2 644.5V453.1h26.5c19.4 0 35.1 15.7 35.1 35.1v121.1c0 19.4-15.7 35.1-35.1 35.1h-26.5zM95.2 609.4V488.2c0-19.4 15.7-35.1 35.1-35.1h26.5v191.3h-26.5c-19.4 0-35.1-15.7-35.1-35.1zM561.5 149.6c0 23.4-15.6 43.3-36.9 49.7v44.9h-30v-44.9c-21.4-6.5-36.9-26.3-36.9-49.7 0-28.6 23.3-51.9 51.9-51.9s51.9 23.3 51.9 51.9z"
            />
          </svg>
          <!-- prettier-ignore -->
          <div class="message-text"> Hey there 👋 <br /> How can I help you today? </div>
        </div>
      </div>

      <!-- Chatbot Footer -->
      <div class="chat-footer">
        <form action="#" class="chat-form">
            
                              <div class="quick-chat-actions">
  <button onclick="sendQuickMessage('I need a website')">I need a website</button>
  <button onclick="sendQuickMessage('I need SEO help')">SEO Help</button>
  <button onclick="sendQuickMessage('I want an AI chatbot')">AI Chatbot</button>
  <button onclick="sendQuickMessage('Book a consultation')">Book Consultation</button>
</div>  
         <script>
function sendQuickMessage(message) {
  const input = document.querySelector(".message-input");
  input.value = message;
  document.querySelector("#send-message").click();
}
</script> 

  
            
            
            
          <textarea placeholder="Message..." class="message-input" required>
              
          </textarea>
          <div class="chat-controls">
              
              <button type="button" id="emoji-picker" class="material-symbols-outlined">sentiment_satisfied</button>
            <div class="file-upload-wrapper">
              <input type="file" accept="image/*" id="file-input" hidden />
              <img src="#" />
              <button type="button" id="file-upload" class="material-symbols-rounded">attach_file</button>
              <button type="button" id="file-cancel" class="material-symbols-rounded">close</button>
            </div>
            
            <button type="submit" id="send-message" class="material-symbols-rounded">arrow_upward</button>
          </div>
        </form>
      </div>
    </div>

	<!-- jQuery Library -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Particles JS -->
	<script src="js/particles.min.js"></script>
	<script src="js/app.js"></script>
	<!-- Isotope Filtring Js -->
	<script src="js/isotope.pkgd.min.js"></script>
	<!-- Lightbox Js -->
	<script src="js/lightbox.min.js"></script>
	<!-- owl.carousel Js -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Form validator Js -->
	<script src="js/validator.min.js"></script>
	<!-- ajaxchimp Js -->
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<!-- counterup Js -->
	<script src="js/waypoint.js"></script>	
	<script src="js/jquery.counterup.min.js"></script>
	<!-- Template main Js -->
	<script src="js/main.js"></script>
		<!-- Template main Js -->
	<script src="../script.js"></script>
	   <!-- Linking custom script -->
    <script src="script.js"></script>

 <!-- Linking Emoji Mart script for emoji picker -->
    <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>

    <!-- Linking custom script -->
    <script src="script.js"></script>	
   <script src="https://www.paypal.com/sdk/js?client-id=<?php echo urlencode(PAYPAL_CLIENT_ID); ?>&currency=<?php echo urlencode(PAYPAL_CURRENCY); ?>&components=buttons"></script>
<script src="assets/js/paypal-service-checkout.js"></script>
   
  </body>
</html>
