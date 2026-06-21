<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Expert Full-Stack Developer | Web Development, Cloud Solutions, & Software Engineering';
$pageDescription = 'Hire Jhon Arzu-Gil for full-stack web development, cloud solutions, software engineering, SEO, mobile apps, and custom business technology consulting.';
$pageKeywords = 'full stack developer, web development, PHP developer, cloud solutions, software engineer, SEO, mobile app development, Houston developer';

if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}
?>

<?php include "header.php"?>

</head>

<body>
	<!-- start Header -->
	<header id="header" class="header fixed-top headerbg-darkcolor nav-container">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- Navigation Menu -->
					<nav class="navbar navbar-expand-lg navbar-light mgsbsnavbar">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="mgsChangeMenubar(this)">
							<span class="menubar1"></span>
							<span class="menubar2"></span>
							<span class="menubar3"></span>
						</button>
						<a class="navbar-brand d-md-block d-lg-none" href="https://cloudtechnologycomputing.com">
							<img class="logo logo-color" src="images/logo.avif" alt="Jhon Arzu-Gil">
				            <img class="logo logo-white" src="images/logo.avif" alt="Jhon Arzu-Gil">
						</a>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<a class="navbar-brand d-none d-sm-none d-md-none d-lg-block" href="https://cloudtechnologycomputing.com">
				            <img class="logo logo-color" src="images/logo.avif" alt="Jhon Arzu-Gil">
				            <img class="logo logo-white" src="images/logo.avif" alt="Jhon Arzu-Gil">
							</a>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link active" href="#home">Home</a>

								</li>
								<li class="nav-item">
									<a class="nav-link" href="#about">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="https://www.cloudtechnologycomputing.com">Tech-Startup</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#service">Service</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#pricing">Pricing</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#portfolio">Portfolio</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="blog.php">Blog</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#contact">Contact</a>
								</li>
							</ul>
						</div>
					</nav>
					<!-- end Navigation Menu -->
				</div><!--End col-sm-12 -->
			</div><!-- end row -->
		</div><!--End container -->
	</header>
	<!-- end Header -->

	<!-- start slider and home section -->
	<section id="home" class="home">
        <div class="home-top-banner banner-1">
			<div id="particles-js"></div>
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
								<div class="banner-content">
									<h1 class="header-title-text type-animate">
										<a href="" class="typewrite" data-period="2000" data-type='[ "Hi, I am Jhon Arzu-Gil.", "I am a Application Developer Programming Specialist.", "I Founded Cloud Technology Computing Corporation.", "I travel all over the United States." ]'>
										<span class="wrap"></span>
										</a>
									</h1>
									<h3 style="color:white;">Application Developer Specialist &amp; Founder Of Cloud Technology Computing</h3>
									<ul class="list-inline list-social">
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
									</ul><!--End list-social -->
								</div><!--End banner-content -->

								<!-- start quoteForm-holder -->
								<div class="quoteForm-holder">

<form id="quoteForm" name="free-quote" data-toggle="validator" class="quoteForm" action="quote-process.php" method="POST">
    <h3 class="form-title">Get a free quote</h3>
    <div id="msgQuoteSubmit" class="hidden"></div>

    <div class="form-group">
        <div class="help-block with-errors"></div>
        <input name="fname" id="quoteName" placeholder="Full Name*" class="form-control" required data-error="Please enter your name" type="text" aria-label="Full Name">
        <div class="input-group-icon"><i class="fa-solid fa-user"></i></div>
    </div><!-- End form-group -->

    <div class="form-group">
        <div class="help-block with-errors"></div>
        <input name="email" id="quoteEmail" placeholder="Email Address*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" required data-error="Please enter a valid email address" type="email" aria-label="Email Address">
        <div class="input-group-icon"><i class="fa-solid fa-envelope"></i></div>
    </div><!-- End form-group -->

    <div class="form-group">
        <div class="help-block with-errors"></div>
        <input name="phone" id="quotePhone" placeholder="Phone Number*" class="form-control" required data-error="Please enter a valid phone number" type="text" aria-label="Phone Number">
        <div class="input-group-icon"><i class="fa-solid fa-phone"></i></div>
    </div><!-- End form-group -->

    <div class="form-group">
        <div class="help-block with-errors"></div>
        <select name="service" id="quoteService" class="form-control" required data-error="Please select a service" aria-label="Service Selection">
            <option value="">--- Select a Service ---</option>
            <option value="Web Development">Web Development</option>
            <option value="SAP Consulting">SAP Consulting</option>
            <option value="Mobile Development">Mobile Development</option>
            <option value="Full-Stack Development">Full-Stack Development</option>
            <option value="Cloud Solutions">Cloud Solutions</option>
            <option value="Support">Support</option>
        </select>
        <div class="input-group-icon"><i class="fa-solid fa-gear"></i></div>
    </div><!-- End form-group -->

    <div class="form-group bottomMargin0">
        <button type="submit" id="quoteSubmit" class="btn btn-shutter-out-horizontal" style="pointer-events: all; cursor: pointer;">Send Request</button>
    </div><!-- End form-group -->

    <span class="sub-text">* Required fields</span>
</form>

<script>
  $(document).ready(function() {
    $('#quoteForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        $.ajax({
            url: 'quote-process.php', // The PHP file to handle the form submission
            type: 'POST', // The HTTP method to use
            data: $(this).serialize(), // Serialize the form data
            success: function(response) {
                // Display the response (success or error message)
                $('#msgQuoteSubmit').removeClass('hidden').html(response);
                $('#quoteForm')[0].reset(); // Optionally reset the form fields
            },
            error: function(xhr, status, error) {
                // Display a generic error message
                $('#msgQuoteSubmit').removeClass('hidden').html('Sorry, there was an error processing your request. Please try again later.');
            }
        });
    });
});

</script>
								</div><!--End quoteForm-holder -->
							</div><!--End col-sm-12 -->
                        </div><!--End row -->
                    </div><!--End container -->
                </div><!--End display-table-cell -->
            </div><!--End display-table -->
        </div><!--End home-top-banner -->
	</section>
	<!-- end slider and home section -->

	<!-- start About section -->
	<section id="about" class="about about-box-style">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start section title-wrap -->
					<div class="title-wrap">
						<div class="title-border-svg">
							<h2 class="section-title">My <span>Life</span></h2>
							<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
								<rect class="title-border-svg-shape" height="76" width="100%"/>
							</svg>
						</div>
					</div><!-- end section title-wrap -->
				</div><!-- end col -->
				<div class="col-sm-12">

							<div class="profile-image">
								<img src="images/profile/Jhon%20Arzu-Gil%20Profile%20IMG.avif" alt="Jhon Arzu-Gil In front of a mirror taking a selfie">
							</div><!-- end profile-image -->

  <div class="about-text">
    <div class="title-box">
      <h3 class="sub-title">👨‍💻 Programmer | Cloud, AI & Full-Stack Developer</h3>
</div>

<p>
  I am a programmer, cloud computing student, and full-stack developer with a strong foundation in
  <strong>web development, cloud infrastructure, software engineering, artificial intelligence, cybersecurity, and networking</strong>.
  I build, test, deploy, and maintain real-world applications using modern development tools, cloud platforms, and hands-on technical experience.
</p>

<p>
  With <strong>32+ IT certifications</strong> across areas such as
  <strong>Cloud Computing, Artificial Intelligence, Cybersecurity, Networking, and Software Development</strong>,
  along with <strong>5+ years of enterprise experience at a Fortune 500 technology company</strong>,
  I have developed a well-rounded technical background that allows me to contribute across multiple areas of IT and software development.
</p>

<p>
  Some of my most valuable certifications include the
  <strong>AWS Certified Solutions Architect - Associate</strong>,
  <strong>CompTIA A+</strong>, <strong>CompTIA Network+</strong>,
  <strong>AWS Certified Cloud Practitioner</strong>, <strong>Microsoft Azure Fundamentals</strong>,
  and <strong>Linux Essentials</strong>. I am also continuing to expand my knowledge in security,
  cloud architecture, and artificial intelligence.
</p>

<p>
  My journey is unique because I have combined multiple paths of technical education and real-world experience:
</p>

<ul>
  <li>A <strong>Silicon Valley coding bootcamp</strong> focused on hands-on programming fundamentals</li>
  <li>A <strong>U.S. Department of Labor-backed Application Developer Apprenticeship</strong> at a global technology company</li>
  <li>A <strong>Bachelor of Science degree in Cloud Computing and Networking</strong> from an accredited nonprofit university</li>
  <li>Years of independent study through projects, certifications, cloud labs, and software development practice</li>
</ul>

<p>
  My apprenticeship gave me enterprise-level experience in
  <strong>consulting, software development, cloud computing, client engagement, Agile development, DevOps, and technical problem-solving</strong>.
  Instead of relying on one path, I intentionally built a long-term roadmap that combines practical skills,
  academic credibility, certifications, and real-world experience.
</p>

<p>
  More than seven years ago, when I first started learning computer science, I realized I did not want to become a one-dimensional developer.
  I created my own long-term learning plan to build a broad, future-proof skill set across
  <strong>software development, cloud computing, mobile development, artificial intelligence, and business technology solutions</strong>.
</p>

<p>
  I have built <strong>custom websites</strong>, <strong>business applications</strong>,
  <strong>mobile apps published on the Google Play Store</strong>, and cloud-based projects.
  I also operate and maintain multiple portfolio and business websites where I apply my skills in
  <strong>SEO, backend development, database integration, performance optimization, and digital business strategy</strong>.
</p>

<p>
  Through Cloud Technology Computing Corporation, I help small businesses and entrepreneurs use technology to grow.
  My services include <strong>website development, cloud consulting, SEO optimization, AI chatbot integration,
  software development, mobile app development, and managed web solutions</strong>.
</p>

<p>
  My long-term goal is to continue advancing into higher-level <strong>cloud, AI, and software engineering roles</strong>
  while building technology solutions that solve real business problems. I believe the strongest developers are not just people who write code,
  but people who understand infrastructure, users, business goals, security, scalability, and long-term value.
</p>
    <div class="button-holder">
      <a class="btn btn-shutter-out-horizontal" href="images/Certifications/UpdatedResumeJhonArzuGil.pdf">Download Resume</a>
      <a class="btn btn-shutter-out-horizontal" href="https://www.cloudcomputeai.com/">Buy Services</a>
    </div>
  </div>
</div>

>





				</div><!-- end col-sm-12 -->
				<div class="col-sm-12">
					<!-- start title-box -->
					<div class="title-box">
						<h3 class="sub-title">Work <strong>Experience</strong></h3>
					</div><!-- end title-box -->
					<div class="row">
						<div class="col-md-4">
							<div class="experience-content color-border">
								<p class="range">2020 - 2025</p>
								<h4>IBM</h4>
								<p class="text-bold">Application Developer Specialist</p>
								<p>

As an Application Developer Specialist at IBM's analytics department, my focus lies in leveraging technology to craft robust solutions for data analytics. I specialize in developing applications that manage, process, and extract insights from vast datasets. My role involves collaborating across teams to understand requirements, employing languages like Python and SQL for efficient data handling. I ensure data integrity, optimize databases, and troubleshoot to deliver top-notch, scalable analytics solutions.</p>
							</div><!-- end experience-content -->
						</div><!-- end col -->

						<div class="col-md-4">
							<div class="experience-content color-border">
								<p class="range">2023 - Current</p>
								<h4>IBM</h4>
								<p class="text-bold">Founder Of Cloud Technology Computing</p>
								<p>
As the Founder of Cloud Technology Computing, I witness the rapid evolution of cloud-supporting technologies. Organizations grapple with keeping pace amidst this swift advancement, often facing challenges in adapting their infrastructure, security, and operations to leverage these innovations effectively. My role involves guiding businesses in navigating these changes, ensuring seamless integration, and optimizing their cloud strategies for enhanced efficiency and competitiveness in the digital landscape.
 </p>
							</div><!-- end experience-content -->
						</div><!-- end col -->

						<div class="col-md-4">
							<div class="experience-content color-border">
								<p class="range">2020 - 2021</p>
								<h4>Application Developer Apprenticeship</h4>
								<p class="text-bold">Freelance</p>
								<p>As an Application Developer Apprentice at IBM, I participated in a Department of Labor-recognized training program designed to cultivate next-generation software engineers through hands-on experience, technical mentorship, and real-world development projects. The apprenticeship provided comprehensive exposure to full-stack development, cloud computing, DevOps practices, and Agile methodologies.</p>
							</div><!-- end experience-content -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end col-sm-12 -->

				<div class="col-sm-12">
					<!-- start title-box -->
					<div class="title-box">
						<h3 class="sub-title">My <strong>Education</strong></h3>
					</div><!-- end title-box -->
					<div class="row">
						<div class="col-md-4">
							<div class="experience-content color-border">
								<p class="range">2023 -</p>
								<h4>Bachelor's Degree</h4>
								<p class="text-bold">Cloud Computing From WGU</p>
								<p>Currently enrolled in a Bachelor's Degree program in Cloud Computing at WGU, I am immersing myself in cutting-edge technologies. This comprehensive curriculum covers cloud architecture, security, and virtualization, providing a solid foundation for designing and implementing scalable cloud solutions. I am gaining hands-on experience with major cloud platforms, ensuring I graduate with the skills needed to excel in the rapidly evolving field of cloud computing.</p>
							</div><!-- end experience-content -->
						</div><!-- end col -->

						<div class="col-md-4">
							<div class="experience-content color-border">
								<p class="range">2020 - 2021</p>
								<h4>Apprenticeship</h4>
								<p class="text-bold">IBM</p>
								<p>
I successfully completed an apprenticeship as an application developer at IBM. This immersive experience equipped me with practical skills in software development, programming languages, and collaborative project management. Working alongside seasoned professionals, I gained valuable insights into industry best practices and contributed to real-world projects, solidifying my foundation as a proficient application developer.</p>
							</div><!-- end experience-content -->
						</div><!-- end col -->

						<div class="col-md-4">
							<div class="experience-content color-border">
								<p class="range">2019 - 2019</p>
								<h4>Tech Bootcamp </h4>
								<p class="text-bold">College 42</p>
								<p>
I completed the Piscine at College 42, a tech bootcamp in Silicon Valley, California. The intensive program honed my coding skills, problem-solving abilities, and collaboration in a dynamic learning environment. Focused on hands-on projects and peer-based evaluation, it provided a unique approach to mastering programming. This experience at College 42 has equipped me with a strong foundation for success in the tech industry,that later helped me got a job in Big Tech.</p>
							</div><!-- end experience-content -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end col-sm-12 -->
			</div><!-- end row -->
		</div><!-- end container -->
	</section>
	<!-- end About section -->



	<!-- start service -->
	<section id="service" class="service service-2-column parallax">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start section title-wrap -->
					<div class="title-wrap">
						<div class="title-border-svg">
							<h2 class="section-title">services i <span>offer</span></h2>
							<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
								<rect class="title-border-svg-shape" height="76" width="100%"/>
							</svg>
						</div>
					</div><!-- end section title-wrap -->
					<div class="intro-text text-center">
						I have over thirty different Technology based certifications! Like the industry leading Comptia A+ certification,Cloud Computing certifications from from Microsoft Azure and IBM and certifications in Artificial Intelligence, Machine Learning, Block Chain Docker and Kubernetes, data analytical applications like SAP SAC Analytics.
					</div><!-- end intro-text -->
				</div><!-- end col -->
				<div class="col-md-6 col-xs-6">
					<div class="service-wrap color-border">
						<div class="service-box">
							<div class="service-box-wrap">
								<i class="fa-solid fa-code"></i>
								<h3>Full-Stack Developer</h3>
								<p>
As a fullstack developer, I offer end-to-end solutions, proficient in both frontend and backend development. Specializing in technologies like HTML, CSS, JavaScript for frontend, and Node.js, Express, or Django for backend, I create responsive, dynamic, and scalable web applications. My expertise includes database design (SQL/NoSQL), API integration, and ensuring optimal performance. Whether it's crafting intuitive user interfaces or architecting robust server-side logic, I deliver comprehensive and tailored solutions to meet diverse project needs.</p>
								<a class="btn btn-shutter-out-horizontal" href="Full-Stack-Developer.php">View Details</a>
							</div>
						</div><!-- end service-box -->
					</div><!-- end service-wrap -->
				</div><!-- end col -->
				<div class="col-md-6 col-xs-6">
					<div class="service-wrap color-border">
						<div class="service-box">
							<div class="service-box-wrap">
								<i class="fa-solid fa-file-code"></i>
								<h3>Sap Consultant</h3>
								<p>
As an SAP Consultant, I provide specialized services in SAP implementation, customization, and optimization. My expertise spans modules like SAP ERP, SAP S/4HANA, and SAP BW. I excel in configuring business processes, conducting system integration, and offering solutions for data migration. With a focus on maximizing SAP's capabilities, I ensure clients leverage the full potential of their SAP landscape. From system analysis to ongoing support, I deliver strategic insights and technical proficiency to enhance organizational efficiency and competitiveness.</p>
								<a class="btn btn-shutter-out-horizontal" href="Sap-Consultant.php">View Details</a>
							</div>
						</div><!-- end service-box -->
					</div><!-- end service-wrap -->
				</div><!-- end col -->
				<div class="col-md-6 col-xs-6">
					<div class="service-wrap color-border">
						<div class="service-box">
							<div class="service-box-wrap">
								<i class="fa-solid fa-window-maximize"></i>
								<h3>Mobile Development</h3>
								<p>I specialize in Mobile Development, offering expertise in both iOS Native and Android Native app development. Leveraging Swift and Objective-C for iOS and Kotlin/Java for Android, I craft high-performance, user-friendly applications. My services encompass the entire development lifecycle, from UI/UX design to coding, testing, and deployment. I prioritize creating seamless, platform-specific experiences, ensuring optimal performance and user satisfaction,Whether it's building from scratch or enhancing existing apps, I deliver tailored solutions that align with client goals and industry best practices. I have over 5 apps in the Google Playstore!</p>
								<a class="btn btn-shutter-out-horizontal" href="Mobile-Development.php">View Details</a>
							</div>
						</div><!-- end service-box -->
					</div><!-- end service-wrap -->
				</div><!-- end col -->
				<div class="col-md-6 col-xs-6">
					<div class="service-wrap color-border">
						<div class="service-box">
							<div class="service-box-wrap">
								<i class="fa-solid fa-cubes"></i>
								<h3>Cloud Solutions</h3>
								<p>
I provide Cloud Solutions expertise with certifications in IBM Cloud and Azure. Specializing in architecting and implementing cloud-based solutions, I ensure seamless integration, scalability, and security. Leveraging my proficiency in IBM Cloud and Azure services, I offer comprehensive solutions tailored to diverse business needs. Whether it's migration, optimization, or ongoing management, my goal is to empower clients with reliable, cutting-edge cloud solutions that align with industry standards and best practices. Thats why I created Cloud Technology Computing a Corporation Founded in Texas, that plans on being the leader in Cloud Consulting</p>
								<a class="btn btn-shutter-out-horizontal" href="Cloud-Solutions.php">View Details</a>
							</div>
						</div><!-- end service-box -->
					</div><!-- end service-wrap -->
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!--End Container -->
	</section>
	<!-- end service -->



	<section id="service-quiz" class="service-quiz">
  <h2>Find the Right Service for Your Business</h2>
  <p>Answer one quick question and we'll recommend the best solution.</p>

  <select id="businessGoal">
    <option value="">Choose your main goal</option>
    <option value="website">I need a professional website</option>
    <option value="seo">I need more traffic from Google</option>
    <option value="cloud">I need cloud hosting or migration</option>
    <option value="ai">I want an AI chatbot</option>
    <option value="app">I need a mobile app</option>
    <option value="ecommerce">I need to sell products or services online</option>
  </select>

  <button onclick="recommendService()">Get Recommendation</button>

  <div id="quizResult"></div>
</section>


	<script>
function recommendService() {
  const goal = document.getElementById("businessGoal").value;
  const result = document.getElementById("quizResult");

  const recommendations = {
    website: "Recommended: Custom Website Development starting at $1,000.",
    seo: "Recommended: Local SEO Package starting at $500/month.",
    cloud: "Recommended: Cloud Migration and Multi-Cloud Architecture Consultation.",
    ai: "Recommended: Custom AI Chatbot trained on your business data.",
    app: "Recommended: Native or WebView Mobile App Development.",
    ecommerce: "Recommended: E-Commerce Website with Stripe and PayPal Checkout."
  };

  if (!goal) {
    result.innerHTML = "<p>Please select a goal first.</p>";
    return;
  }

  result.innerHTML = `
    <div class="recommendation-box">
      <h3>${recommendations[goal]}</h3>
      <p>Cloud Technology Computing can help you plan, build, and launch this solution.</p>
      <a href="form.php" class="btn btn-primary">Book a Free Consultation</a>
    </div>
  `;
}
</script>



<section id="price-calculator">
  <h2>Estimate Your Project Cost</h2>

  <label>
    <input type="checkbox" class="service-option" value="1000">
    3-Page Website - $1,000
  </label>

  <label>
    <input type="checkbox" class="service-option" value="500">
    Local SEO Setup - $500
  </label>

  <label>
    <input type="checkbox" class="service-option" value="1500">
    Website Optimization - $1,500
  </label>

  <label>
    <input type="checkbox" class="service-option" value="450">
    PPC Advertising Setup - $450
  </label>

  <h3>Total Estimate: $<span id="totalPrice">0</span></h3>

  <a href="form.php" class="btn btn-primary">Request This Package</a>
</section>

<script>
const options = document.querySelectorAll(".service-option");
const totalPrice = document.getElementById("totalPrice");

options.forEach(option => {
  option.addEventListener("change", () => {
    let total = 0;

    options.forEach(item => {
      if (item.checked) {
        total += parseInt(item.value);
      }
    });

    totalPrice.textContent = total.toLocaleString();
  });
});
</script>







	<!-- start clients -->
<section id="clients" class="clients">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-wrap">
					<div class="title-border-svg">
						<h2 class="section-title">My <span>Certifications</span></h2>
						<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
							<rect class="title-border-svg-shape" height="76" width="100%"/>
						</svg>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="owl-carousel owl-theme certification-carousel">

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="c745aece-1623-4124-a940-482e85f34a30" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="77c85be2-b64c-4b39-aa24-d4dce56eea91" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="a484da96-582c-4240-a37b-6df13f2d6a7e" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="32290ba7-f029-4fe0-b25b-93dcfa083e4f" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="6c99d633-c1b7-4910-b16b-e52884fcff2c" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="b9cf1e83-f504-4e20-830d-07909e447e41" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="db9f8d85-1aaa-4bf6-86bc-af37df48655f" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="032efb65-704c-4eec-a580-ba5bd88ea0e7" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="1ea55c4f-6956-40cf-9d0b-fef5cb3e21e5" data-share-badge-host="https://www.credly.com"></div>

					<div class="certification-badge" data-iframe-width="250" data-iframe-height="350" data-share-badge-id="51591525-062a-429f-9282-638d3463ccb9" data-share-badge-host="https://www.credly.com"></div>

				</div>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>
</section>

<!-- Load Credly script only once -->
<script type="text/javascript" async src="https://cdn.credly.com/assets/utilities/embed.js"></script>
	<!-- end clients -->

	<!-- start success-story -->
	<section id="success-story" class="success-story parallax">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start section title-wrap -->
					<div class="title-wrap">
						<div class="title-border-svg">
							<h2 class="section-title">Success <span>Story</span></h2>
							<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
								<rect class="title-border-svg-shape" height="76" width="100%"/>
							</svg>
						</div>
					</div><!-- end section title-wrap -->
				</div><!-- end col -->
				<!-- BEGIN count Box -->
				<div class="success-story-inner text-center">
					<div class="row">
						<div class="col-sm-6 col-lg-3">
							<div class="counter-wrap color-border">
								<div class="counter-icon"><i class="fa-solid fa-user-graduate"></i></div>
								<div class="counter-text">
									<div class="counter">32</div>
									<p>Certifications And Counting!</p>
								</div><!-- end counter-text -->
							</div><!-- end counter-wrap -->
						</div><!-- end col -->
						<div class="col-sm-6 col-lg-3">
							<div class="counter-wrap color-border">
								<div class="counter-icon"><i class="fa-solid fa-rotate"></i></div>
								<div class="counter-text">
									<div class="counter">64</div>
									<p>Projects Completed!</p>
								</div><!-- end counter-text -->
							</div><!-- end counter-wrap -->
						</div><!-- end col -->
						<div class="col-sm-6 col-lg-3">
							<div class="counter-wrap color-border">
								<div class="counter-icon"><i class="fa-solid fa-globe"></i></div>
								<div class="counter-text">
									<div class="counter">5</div>
									<p>Years Working For Big Tech!</p>
								</div><!-- end counter-text -->
							</div><!-- end counter-wrap -->
						</div><!-- end col -->
						<div class="col-sm-6 col-lg-3">
							<div class="counter-wrap color-border">
								<div class="counter-icon"><i class="fa-solid fa-book-journal-whills"></i></div>
								<div class="counter-text">
									<div class="counter">8</div>
									<p>Years Of Programming Experience!</p>
								</div><!-- end counter-text -->
							</div><!-- end counter-wrap -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end success-story-inner -->
				<!-- END count Box -->
			</div><!-- end row -->
		</div><!-- end container -->
	</section>
	<!--End #success-story -->

	<!-- start Pricing Plan -->
<section id="pricing" class="pricing">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-wrap">
          <div class="title-border-svg">
            <h2 class="section-title">Pricing <span>Plans</span></h2>

```
        <svg
          height="76"
          width="100%"
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true"
        >
          <rect
            class="title-border-svg-shape"
            height="76"
            width="100%"
          ></rect>
        </svg>
      </div>
    </div>
  </div>

  <div class="col-sm-12 pricing-table">

    <!-- Custom PHP and MySQL Website -->
    <div class="pricing-plan">
      <div class="pricing-plan-wrap standard">
        <p class="pricing-label">Custom Development</p>

        <h3>Custom PHP &amp; MySQL Website</h3>

        <div class="price-holder">
          <p class="dolar">
            <sup>$</sup>3,000 <sub>/project</sub>
          </p>
        </div>

        <ul class="list-unstyled">
          <li>Custom-Coded Responsive Website</li>
          <li>PHP &amp; MySQL Database Integration</li>
          <li>Dynamic Content Structure</li>
          <li>Contact Forms &amp; Lead Capture</li>
          <li>Basic On-Page SEO Setup</li>
          <li>Testing, Launch &amp; Handoff Support</li>
        </ul>

        <a
          class="btn btn-shutter-out-horizontal"
          href="https://buy.stripe.com/bJecN5gEBdpDfE64vBfUQ05"
          data-sku="CTC-WEB-PHP-MYSQL-001"
        >
          Start My Custom Website
        </a>
      </div>
    </div>

    <!-- Monthly SEO Growth Plan -->
    <div class="pricing-plan active">
      <div class="pricing-plan-wrap starter">
        <p class="pricing-label">Most Popular</p>

        <h3>Monthly SEO Growth Plan</h3>

        <div class="price-holder">
          <p class="dolar">
            <sup>$</sup>500 <sub>/month</sub>
          </p>
        </div>

        <ul class="list-unstyled">
          <li>Ongoing Keyword Targeting</li>
          <li>Content &amp; Metadata Optimization</li>
          <li>Technical SEO Improvements</li>
          <li>Internal Linking Enhancements</li>
          <li>Performance &amp; Ranking Tracking</li>
          <li>Monthly Recommendations Report</li>
        </ul>

        <a
          class="btn btn-shutter-out-horizontal"
          href="https://buy.stripe.com/14k4hA6br7n5eqc5kn"
          data-sku="CTC-SEO-MONTHLY-001"
        >
          Grow My Search Traffic
        </a>
      </div>
    </div>

    <!-- Advanced AI Chatbot -->
    <div class="pricing-plan">
      <div class="pricing-plan-wrap premium">
        <p class="pricing-label">AI Automation</p>

        <h3>Advanced AI Chatbot Development</h3>

        <div class="price-holder">
          <p class="dolar">
            <sup>$</sup>1,200 <sub>/project</sub>
          </p>
        </div>

        <ul class="list-unstyled">
          <li>Custom AI Chatbot Development</li>
          <li>Website Chat Widget Integration</li>
          <li>Business FAQ &amp; Service Training</li>
          <li>Lead Capture &amp; Contact Routing</li>
          <li>Custom Conversation Flow Design</li>
          <li>Basic Analytics &amp; Integration Planning</li>
        </ul>

        <a
          class="btn btn-shutter-out-horizontal"
          href="https://buy.stripe.com/4gweWe8jzdLteqcbIK"
          data-sku="CTC-AI-CHATBOT-ADV-001"
        >
          Build My AI Chatbot
        </a>
      </div>
    </div>

  </div>

  <div class="col-sm-12 text-center">
    <p class="pricing-note">
      Prices reflect the base scope shown above. Hosting, domain
      registration, premium software, paid APIs, advertising spend,
      app-store fees, content creation, and advanced custom integrations
      may be billed separately. Final pricing is confirmed after a
      project-scope review.
    </p>
  </div>
</div>
```

  </div>
</section>

	<!-- end Pricing Plan -->

	<!-- start portfolio -->
	<section id="portfolio" class="filter-section portfolio-style2 parallax">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start section title-wrap -->
					<div class="title-wrap">
						<div class="title-border-svg">
							<h2 class="section-title">My I.T <span>Certifications</span></h2>
							<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
								<rect class="title-border-svg-shape" height="76" width="100%"/>
							</svg>
						</div>
					</div><!-- end section title-wrap -->
					<div class="intro-text text-center">
					I also hold 30+ technology certifications across cloud, networking, Linux, AI, machine learning, software development, and enterprise technology. These certifications helped me strengthen the same skills I have applied in real projects: building, deploying, troubleshooting, optimizing, and learning continuously.

What makes my journey different is that I did not wait for the perfect opportunity to start building. I created websites, published mobile apps, launched a technology company, developed custom solutions, studied cloud architecture, and kept improving my skills while working in enterprise technology.
					</div><!-- end intro-text -->
				</div><!-- end col -->
				<div class="col-sm-12">
					<!-- start filter-container -->
					<div class="filter-container isotopeFilters">
						<ul class="list-inline filter">
							<li class="list-inline-item active"><a href="#" data-filter="*">All </a></li>
                            <li class="list-inline-item"><a href="#" data-filter=".cloud">Cloud</a></li>
                            <li class="list-inline-item"><a href="#" data-filter=".ai">AI & Machine Learning</a></li>
                            <li class="list-inline-item"><a href="#" data-filter=".it">IT Foundations</a></li>
							<li class="list-inline-item"><a href="#" data-filter=".software">Software</a></li>
						</ul>
					</div><!--End filter-container -->
					<div class="isotopeContainer">
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/Awssolutionsarchitect_17KB_10KB.avif" alt="AWS Solutions Architect"  />
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/c745aece-1623-4124-a940-482e85f34a30/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title1" href="images/portfolio/Awssolutionsarchitect_17KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">AWS Solutions Architect</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector it">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/Aplus_12KB.avif" alt="Jhon Arzu-Gil Comptia A+ Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/6c99d633-c1b7-4910-b16b-e52884fcff2c/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title2" href="images/portfolio/Aplus.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Comptia A+ Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector it">
								<div class="portfolio-wrapper">
										<img src="images/portfolio/thumb/ComptiaNetworking+.avif" alt="Comptia Networking+ Certification"  >
										<div class="portfolio-overlay">
											<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/a484da96-582c-4240-a37b-6df13f2d6a7e/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title3" href="images/portfolio/ComptiaNetworking+.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Comptia Networking+ Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector software">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/Apprenticeship_11KB.avif" alt="IBM Application Developer Apprenticeship Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/32290ba7-f029-4fe0-b25b-93dcfa083e4f/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title4" href="images/portfolio/Apprenticeship_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">IBM Application Developer Apprenticeship Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/AWSCloud_10KB.avif" alt="AWS Cloud Practitioner Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title5" href="images/portfolio/AWSCloud_10KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">AWS Cloud Practitioner Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/azure900_8KB.avif" alt=">Azure Fundamentals Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title6" href="images/portfolio/azure900_8KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Azure Fundamentals Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->

<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector ai">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/IBM Al Associate Data Scientist_11KB.avif" alt="IBM Data Scientist"  />
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/c745aece-1623-4124-a940-482e85f34a30/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title1" href="images/portfolio/IBM_Al_Associate_Data_Scientist_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">IBM A.I Associate</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector ai">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/Machinelearning_11KB.avif" alt="Jhon Arzu-Gil Comptia A+ Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/6c99d633-c1b7-4910-b16b-e52884fcff2c/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title2" href="images/portfolio/Machinelearning_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Machine Learning Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector it">
								<div class="portfolio-wrapper">
										<img src="images/portfolio/thumb/Linuxessentials_11KB.avif" alt="Linux Essentials Certification"  >
										<div class="portfolio-overlay">
											<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/a484da96-582c-4240-a37b-6df13f2d6a7e/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title3" href="images/portfolio/Linuxessentials_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Linux Essentials Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/journeytothecloud.webp" alt="Journey to the Cloud Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/32290ba7-f029-4fe0-b25b-93dcfa083e4f/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title4" href="images/portfolio/journeytothecloud.webp"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Journey to the Cloud Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/IBMCloud_8KB.avif" alt="IBM Cloud Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title5" href="images/portfolio/IBMCloud_8KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">IBM Cloud Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/Cloud Core_10KB.avif" alt="IBM Cloud Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title6" href="images/portfolio/Cloud Core_10KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">IBM Cloud  </a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->

<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/Docker Essentials_11KB.avif" alt="IBM Data Scientist"  />
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/c745aece-1623-4124-a940-482e85f34a30/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title1" href="images/portfolio/Docker Essentials_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Docker Essentials</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/cloudessentials_10KB.avif" alt="Cloud Essentials Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/6c99d633-c1b7-4910-b16b-e52884fcff2c/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title2" href="images/portfolio/cloudessentials_10KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Cloud Essentials Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector ai">
								<div class="portfolio-wrapper">
										<img src="images/portfolio/thumb/Data Science Tools_11KB.avif" alt="Data Science Tools Certification"  >
										<div class="portfolio-overlay">
											<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/a484da96-582c-4240-a37b-6df13f2d6a7e/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title3" href="images/portfolio/Data Science Tools_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Data Science Tools Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/multicloud.webp" alt="Multi-Cloud Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/32290ba7-f029-4fe0-b25b-93dcfa083e4f/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title4" href="images/portfolio/multicloud.webp"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Multi-Cloud Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector it">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/IBM Agile Explorer_11KB.avif" alt="IBM Agile Explorer Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title5" href="images/portfolio/IBM Agile Explorer_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">IBM Agile Explorer Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/IBMStoragecloud_11KB.avif" alt="IBM Storage Cloud Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title6" href="images/portfolio/IBMStoragecloud_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">IBM Storage Cloud Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->

	<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector it">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/Security_11KB.avif" alt="Security Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title5" href="images/portfolio/Security_11KB.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">Security Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->
							<div class="col-sm-6 col-md-6 col-lg-3 space isotopeSelector cloud">
								<div class="portfolio-wrapper">
									<img src="images/portfolio/thumb/IBMcloudadvocate.avif" alt="IBM Cloud Advocate Certification"  >
									<div class="portfolio-overlay">
										<div class="portfolio-overlay-inner">
											<div class="portfolio-overlay-content">
												<div class="portfolio-link">
													<a title="Details" href="https://www.credly.com/badges/77c85be2-b64c-4b39-aa24-d4dce56eea91/public_url"><i class="fas fa-link"></i></a>
													<a data-lightbox="allportfolio" data-title="Project Title6" href="images/portfolio/IBMcloudadvocate.avif"><i class="fas fa-search-plus"></i></a>
												</div><!--End portfolio-link -->
												<div class="portfolio-caption">
													<h3><a href="javascript:void(0)">IBM Cloud Advocate Certification</a></h3>
												</div><!--End portfolio-caption -->
											</div><!--End portfolio-overlay-content -->
										</div><!--End portfolio-overlay-inner -->
									</div><!--End portfolio-overlay -->
								</div><!--End portfolio-wrapper -->
							</div><!-- end col -->


						</div><!--End row -->
					</div><!--End isotopeContainer -->
				</div><!--End col-sm-12 -->
			</div><!-- end row -->

		</div><!--End container -->
	</section>

	<!-- end portfolio -->
	<!-- start team -->
	<section id="team" class="our-team">
		<div class="container">
			<div class="row" >
				<div class="col-sm-12">
					<!-- start section title-wrap -->
					<div class="title-wrap">
						<div class="title-border-svg">
							<h2 class="section-title">My <span>Team</span></h2>
							<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
								<rect class="title-border-svg-shape" height="76" width="100%"/>
							</svg>
						</div>
					</div><!-- end section title-wrap -->
					<div class="intro-text text-center">
						Someone is sitting in the shade today because someone planted a tree a long time ago. "Warren Buffett"
					</div><!-- end intro-text -->
				</div><!--End col-sm-12 -->
							<div class="col-md-6 col-lg-4">
					<div class="team-wrap color-border">
						<div class="team-thumb">
							<img src="images/team/Jhongil.avif" alt="Jhon Arzu-Gil">
						</div><!-- end team-thumb -->
						<div class="team-details">
							<div class="details-plain">
								<p>Any sufficiently advanced technology is indistinguishable from magic. "Arthur C. Clarke</p>
								<div class="team-social">
									<a href="https://www.facebook.com/profile.php?id=61552191954476" class="social-icon social-icon-small social-icon-facebook">
										<i class="fab fa-facebook-f"></i>
										<i class="fab fa-facebook-f"></i>
									</a>
									<a href="https://twitter.com/JhonArzuGil" class="social-icon social-icon-small social-icon-twitter">
										<i class="fab fa-twitter"></i>
										<i class="fab fa-twitter"></i>
									</a>
									<a href="https://www.pinterest.com/jarzugil20" class="social-icon social-icon-small social-icon-pinterest">
										<i class="fab fa-pinterest-p"></i>
										<i class="fab fa-pinterest-p"></i>
									</a>
									<a href="https://www.linkedin.com/in/jhongil" class="social-icon social-icon-small social-icon-linkedin">
										<i class="fab fa-linkedin-in"></i>
										<i class="fab fa-linkedin-in"></i>
									</a>
								</div><!-- end team-social -->
							</div><!-- end details-plain -->
							<div class="details-overly">
								<div class="team-title">
									<h4>Jhon Arzu-Gil</h4>
									<h5>Funder &amp; President</h5>
								</div><!-- end team-title -->
								<div class="team-social">
									<a href="https://www.facebook.com/profile.php?id=61552191954476" class="social-icon social-icon-small social-icon-facebook">
										<i class="fab fa-facebook-f"></i>
										<i class="fab fa-facebook-f"></i>
									</a>
									<a href="ttps://twitter.com/JhonArzuGil" class="social-icon social-icon-small social-icon-twitter">
										<i class="fab fa-twitter"></i>
										<i class="fab fa-twitter"></i>
									</a>
									<a href="https://www.pinterest.com/jarzugil20" class="social-icon social-icon-small social-icon-pinterest">
										<i class="fab fa-pinterest-p"></i>
										<i class="fab fa-pinterest-p"></i>
									</a>
									<a href="https://www.linkedin.com/in/jhongil" class="social-icon social-icon-small social-icon-linkedin">
										<i class="fab fa-linkedin-in"></i>
										<i class="fab fa-linkedin-in"></i>
									</a>
								</div><!-- end team-social -->
							</div><!-- end details-overly -->
						</div><!-- end team-details -->
					</div><!-- end team-wrap -->
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!--End Container -->
	</section><!-- End Team -->
	<!-- end team -->

	<!--  start quotes-section -->
	<section id="quotes-section" class="quotes-section parallax">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="quotes-wrap text-center">
						<!-- start section title-wrap -->
						<div class="title-wrap">
							<div class="title-border-svg">
								<h2 class="section-title">Knowledge is <span>Power</span></h2>
								<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
									<rect class="title-border-svg-shape" height="76" width="100%"/>
								</svg>
							</div>
						</div><!-- end section title-wrap -->
						<p>See if you got what it takes to join the I.T Tech World!</p>
						<a class="btn btn-shutter-out-horizontal btn-transparent" href="Quiz/index.html">Take Quiz</a>
					</div>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</section>








	<!-- end quotes-section -->
		<!-- start blog -->

<?php
/*
|--------------------------------------------------------------------------
| Dynamic homepage blog posts
|--------------------------------------------------------------------------
| Requires:
| - includes/config.php to create the PDO connection: $pdo
| - blog_posts table
| - blog_comments table
*/

if (!isset($pdo)) {
    require_once __DIR__ . '/includes/config.php';
}

if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

try {
    $homepageBlogStmt = $pdo->prepare("
        SELECT
            p.id,
            p.title,
            p.slug,
            p.excerpt,
            p.image,
            p.author,
            p.category,
            p.`date`,
            p.created_at,
            (
                SELECT COUNT(*)
                FROM blog_comments bc
                WHERE bc.post_id = p.id
            ) AS comment_count
        FROM blog_posts p
        WHERE p.status = 'published'
        ORDER BY
            COALESCE(p.`date`, p.created_at) DESC,
            p.id DESC
        LIMIT :post_limit
    ");

    $homepageBlogStmt->bindValue(':post_limit', 8, PDO::PARAM_INT);
    $homepageBlogStmt->execute();

    $homepageBlogPosts = $homepageBlogStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    $homepageBlogPosts = [];

    // Log the real database error without showing it to visitors.
    error_log('Homepage blog query failed: ' . $exception->getMessage());
}
?>

<section id="blog" class="blog blog-style1">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">

                <div class="title-wrap">
                    <div class="title-border-svg">
                        <h2 class="section-title">Latest <span>Blog Posts</span></h2>

                        <svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
                            <rect
                                class="title-border-svg-shape"
                                height="76"
                                width="100%"
                            />
                        </svg>
                    </div>
                </div>

                <div class="intro-text text-center">
                    Explore practical articles about cloud computing, artificial intelligence,
                    web development, SEO, SAP consulting, cybersecurity, and business technology.
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <?php if (!empty($homepageBlogPosts)): ?>

                    <div class="owl-carousel">

                        <?php foreach ($homepageBlogPosts as $index => $post): ?>

                            <?php
                            $postUrl = '/blog/' . rawurlencode($post['slug']);

                            $postDateValue = $post['date'] ?: $post['created_at'];

                            $formattedPostDate = $postDateValue
                                ? date('M j, Y', strtotime($postDateValue))
                                : '';

                            $postImage = !empty($post['image'])
                                ? ltrim($post['image'], '/')
                                : 'images/blog/thumb/default-blog.webp';

                            $postAuthor = !empty($post['author'])
                                ? $post['author']
                                : 'Jhon Arzu-Gil';

                            $postExcerpt = trim((string) ($post['excerpt'] ?? ''));

                            if ($postExcerpt === '') {
                                $postExcerpt = 'Read the latest technology insights, strategies, and practical recommendations from Jhon Arzu-Gil.';
                            }

                            /*
                             * Alternate the card image position to preserve the
                             * visual style used by your original template.
                             */
                            $imageAtTop = $index % 2 === 0;
                            ?>

                            <div class="item">
                                <article class="post-wrap">

                                    <?php if ($imageAtTop): ?>
                                        <div class="post-thumb">
                                            <a href="<?= e($postUrl); ?>">
                                                <img
                                                    src="<?= e($postImage); ?>"
                                                    alt="<?= e($post['title']); ?>"
                                                    loading="lazy"
                                                    width="600"
                                                    height="400"
                                                >
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <div class="<?= $imageAtTop ? 'post-content-bottom' : 'post-content-top'; ?>">
                                        <div class="hover-overlay"></div>

                                        <div class="content-inner">

                                            <div class="post-meta">
                                                <span>
                                                    <i class="fas fa-user"></i>
                                                    <a href="<?= e($postUrl); ?>">
                                                        <?= e($postAuthor); ?>
                                                    </a>
                                                </span>

                                                <?php if ($formattedPostDate !== ''): ?>
                                                    <span>
                                                        <i class="fas fa-calendar-alt"></i>
                                                        <a href="<?= e($postUrl); ?>">
                                                            <?= e($formattedPostDate); ?>
                                                        </a>
                                                    </span>
                                                <?php endif; ?>

                                                <span>
                                                    <i class="fas fa-comments"></i>
                                                    <a href="<?= e($postUrl); ?>#comments">
                                                        <?= (int) $post['comment_count']; ?>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="post-title">
                                                <h3>
                                                    <a href="<?= e($postUrl); ?>">
                                                        <?= e($post['title']); ?>
                                                    </a>
                                                </h3>
                                            </div>

                                            <?php if (!empty($post['category'])): ?>
                                                <div class="post-category">
                                                    <span>
                                                        <i class="fas fa-folder-open"></i>
                                                        <?= e($post['category']); ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                            <div class="post-excerpt">
                                                <p>
                                                    <?= e($postExcerpt); ?>

                                                    <a
                                                        class="btn-more"
                                                        href="<?= e($postUrl); ?>"
                                                        aria-label="Read <?= e($post['title']); ?>"
                                                    >
                                                        Read More
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </a>
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                    <?php if (!$imageAtTop): ?>
                                        <div class="post-thumb">
                                            <a href="<?= e($postUrl); ?>">
                                                <img
                                                    src="<?= e($postImage); ?>"
                                                    alt="<?= e($post['title']); ?>"
                                                    loading="lazy"
                                                    width="600"
                                                    height="400"
                                                >
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                </article>
                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php else: ?>

                    <div class="blog-empty-message text-center">
                        <h3>New articles are coming soon.</h3>
                        <p>
                            Check back for content about cloud computing, AI, software
                            development, SEO, cybersecurity, and business technology.
                        </p>
                    </div>

                <?php endif; ?>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center" style="margin-top: 40px;">
                <a href="blog.php" class="btn btn-shutter-out-horizontal">
                    View All Blog Posts
                    <i class="fas fa-angle-double-right"></i>
                </a>
            </div>
        </div>

    </div>
</section>


	<!-- end blog -->

	<!-- start testimonials -->
	<section id="testimonials" class="testimonials testimonial-single parallax">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start section title-wrap -->
					<div class="title-wrap">
						<div class="title-border-svg">
							<h2 class="section-title">What <span>Client say?</span></h2>
							<svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
								<rect class="title-border-svg-shape" height="76" width="100%"/>
							</svg>
						</div>
					</div><!-- end section title-wrap -->
				</div><!-- end col -->
			</div><!-- end row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="owl-carousel owl-theme">
						<div class="testimonial-item">
							<div class="testimonial-image">
								<img src="images/customer/Lakeodessacarpetcare.avif" alt="Jonathon Hume"/>
							</div><!--End testimonial-image -->
							<div class="testimonial-content">
								<div class="rating-wrap">
									<div class="rating">
										<div class="stars five"></div>
									</div>
								</div><!--End rating-wrap -->
								<p class="blockquote">If you can just get them on the phone 9 out of every 10 phone calls turns into a sale.</p>
								<div class="testimonial-author">
									<h4 class="text-capitalize">Gene Smith</h4>
									<p>Business Owner,Lake Oddessa Carpet Care.</p>
								</div><!--End testimonial-author -->
							</div><!--End testimonial-content -->
						</div><!-- end testimonial-item -->
						<div class="testimonial-item">
							<div class="testimonial-image">
								<img src="images/customer/Baton%20Rouge%20Driving%20Service%20-%20Google.avif" alt="John Doe" />
							</div><!--End testimonial-image -->
							<div class="testimonial-content">
								<div class="rating-wrap">
									<div class="rating">
										<div class="stars five"></div>
									</div>
								</div><!--End rating-wrap -->
								<p class="blockquote">II was a lyft driving sharing my profits now I'm a business owner keep 100% of my profits from rides. </p>
								<div class="testimonial-author">
									<h4 class="text-capitalize">Michael Layfatte</h4>
									<p>Business Owner, Baton Rouge Driving Services</p>
								</div><!--End testimonial-author -->
							</div><!--End testimonial-content -->
						</div><!-- end testimonial-item -->
					</div><!-- end carousel -->
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</section>
	<!-- end testimonials -->

	<!-- start contact -->
	<section id="contact" class="contact">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-wrap">
          <div class="title-border-svg">
            <h2 class="section-title">Send me a <span>Message</span></h2>
            <svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg">
              <rect class="title-border-svg-shape" height="76" width="100%" />
            </svg>
          </div>
        </div>
        <div class="intro-text text-center">
          At Cloud Technology Computing Corporation, we specialize in helping small businesses and entrepreneurs thrive in the digital age. Whether you're launching a startup or growing an existing business, we offer the tools and technology to bring your vision to life-without the enterprise-level costs.
        </div>
      </div>

           <!-- start contact form -->
				<div class="col-sm-12 col-md-8 offset-md-2">
				<form id="contactForm" name="contactform" data-toggle="validator" class="contact-form" action="submit-website-form.php" method="POST">
  <div id="msgContactSubmit" style="margin-top: 15px; display: none;" class="alert alert-info"></div>
  <div class="row">

    <!-- Full Name -->
    <div class="form-group col-lg-4">
      <input name="name" id="name" placeholder="Full Name*" class="form-control" type="text" required data-error="Please enter your name">
      <div class="input-group-icon"><i class="fas fa-user"></i></div>
      <div class="help-block with-errors"></div>
    </div>

    <!-- Email -->
    <div class="form-group col-lg-4">
      <input name="email" id="email" placeholder="Email Address*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" class="form-control" type="email" required data-error="Please enter a valid email">
      <div class="input-group-icon"><i class="fas fa-envelope"></i></div>
      <div class="help-block with-errors"></div>
    </div>

    <!-- Phone -->
    <div class="form-group col-lg-4">
      <input name="phone" id="phone" placeholder="Phone Number*" pattern="^\+?\d{6,16}" class="form-control" type="text" required data-error="Please enter a valid phone number">
      <div class="input-group-icon"><i class="fas fa-phone"></i></div>
      <div class="help-block with-errors"></div>
    </div>

    <!-- Company Name -->
    <div class="form-group col-lg-6">
      <input name="company" id="company" placeholder="Company Name" class="form-control" type="text">
      <div class="input-group-icon"><i class="fas fa-building"></i></div>
    </div>

    <!-- Website URL -->
    <div class="form-group col-lg-6">
      <input name="website" id="website" placeholder="Current Website URL" class="form-control" type="url">
      <div class="input-group-icon"><i class="fas fa-globe"></i></div>
    </div>

    <!-- Services Interested In -->
    <div class="form-group col-sm-12">
      <label style="margin-left:50px;">Services You're Interested In*</label>
      <select name="services[]" id="services" class="form-control" multiple required data-error="Please select at least one service">
        <option value="New Website">New Website</option>
        <option value="Website Redesign">Website Redesign</option>
        <option value="E-commerce Integration">E-commerce Integration</option>
        <option value="SEO">Search Engine Optimization (SEO)</option>
        <option value="Hosting">Cloud Hosting</option>
        <option value="Mobile App Integration">Mobile App Integration</option>
        <option value="Other">Other</option>
      </select>
      <div class="input-group-icon"><i class="fas fa-cogs"></i></div>
      <div class="help-block with-errors"></div>
    </div>

    <!-- Budget -->
    <div class="form-group col-lg-6">
      <label style="margin-left:50px;">Estimated Budget*</label>
      <select name="budget" id="budget" class="form-control" required>
        <option value="">-- Select --</option>
        <option value="Under $1,000">Under $1,000</option>
        <option value="$1,000-$3,000">$1,000-$3,000</option>
        <option value="$3,000-$5,000">$3,000-$5,000</option>
        <option value="$5,000+">$5,000+</option>
      </select>
      <div class="input-group-icon"><i class="fas fa-dollar-sign"></i></div>
    </div>

    <!-- Timeline -->
    <div class="form-group col-lg-6">
      <label style="margin-left:50px;">Desired Launch Timeline*</label>
      <select name="timeline" id="timeline" class="form-control" required>
        <option value="">-- Select --</option>
        <option value="1-2 weeks">1-2 weeks</option>
        <option value="1 month">1 month</option>
        <option value="2-3 months">2-3 months</option>
        <option value="Flexible">Flexible</option>
      </select>
      <div class="input-group-icon"><i class="fas fa-clock"></i></div>
    </div>

    <!-- Features -->
    <div class="form-group col-sm-12">
      <textarea rows="3" name="features" id="features" placeholder="Key Features (chatbot, booking form, payment gateway, etc.)" class="form-control"></textarea>
      <div class="input-group-icon"><i class="fas fa-lightbulb"></i></div>
    </div>

    <!-- Project Goals -->
    <div class="form-group col-sm-12">
      <textarea rows="3" name="goals" id="goals" placeholder="Project Goals*" class="form-control" required data-error="Please describe your project goals"></textarea>
      <div class="input-group-icon"><i class="fas fa-bullseye"></i></div>
      <div class="help-block with-errors"></div>
    </div>

    <!-- Referral -->
    <div class="form-group col-sm-12">
      <input name="referral" id="referral" placeholder="How did you hear about us?" class="form-control" type="text">
      <div class="input-group-icon"><i class="fas fa-share-alt"></i></div>
    </div>

    <!-- Submit Button -->
    <div class="form-group col-sm-12">
      <button type="submit" id="submit" class="btn btn-shutter-out-horizontal">Submit Request</button>
    </div>

  </div>

          <span class="sub-text">* Required fields</span>
          <div class="clearfix"></div>
        </form>
      <!-- end contact form -->
  </div>
  </div>
  </div>
</section>

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

				<!-- start contact Info -->
				<div class="col-sm-12 text-center">
					<div class="row">
						<div class="col-md-4">
							<div class="contact-item">
								<div class="contact-item-inner">
									<div class="contact-icon">
										<i class="fas fa-home"></i>
									</div>
									<div class="contact-desc">
										<h4>4409 Caplin St, Houston, Texas, 77026, USA</h4>
									</div>
								</div><!-- end contact-item-inner -->
							</div><!-- end contact-item -->
						</div><!-- end col -->
						<div class="col-md-4">
							<div class="contact-item">
								<div class="contact-item-inner">
									<div class="contact-icon">
										<i class="fas fa-envelope"></i>
									</div>
									<div class="contact-desc">
										<h4><a href="mailto:jgil20@me.com">Email C.E.O</a></h4>
									</div>
								</div><!-- end contact-item-inner -->
							</div><!-- end contact-item -->
						</div><!-- end col -->
						<div class="col-md-4">
							<div class="contact-item">
								<div class="contact-item-inner">
									<div class="contact-icon">
										<i class="fas fa-phone"></i>
									</div>
									<div class="contact-desc">
										<h4><a href="tel:+1-713-870-9966">+1-713-870-9966</a></h4>
									</div>
								</div><!-- end contact-item-inner -->
							</div><!-- end contact-item -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end col-sm-12 -->
				<!-- end contact Info -->

			</div><!-- end row -->
		 </div><!-- end container -->
	</section>
	<!-- end contact -->
    <?php include('quote-process.php');?>
	<!-- start footer -->

<?php
/*
|--------------------------------------------------------------------------
| Dynamic footer recent articles
|--------------------------------------------------------------------------
| Requires:
| - includes/config.php
| - PDO connection stored in $pdo
| - blog_posts table
*/

if (!isset($pdo)) {
    require_once __DIR__ . '/includes/config.php';
}

if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

try {
    $footerPostsStmt = $pdo->prepare("
        SELECT
            id,
            title,
            slug,
            image,
            `date`,
            created_at
        FROM blog_posts
        WHERE status = 'published'
        ORDER BY
            COALESCE(`date`, created_at) DESC,
            id DESC
        LIMIT :footer_limit
    ");

    $footerPostsStmt->bindValue(':footer_limit', 3, PDO::PARAM_INT);
    $footerPostsStmt->execute();

    $footerRecentPosts = $footerPostsStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    $footerRecentPosts = [];

    error_log(
        'Footer recent posts query failed: ' .
        $exception->getMessage()
    );
}
?>

<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="footer-top clearfix">
                    <div class="row">

                        <div class="column col-md-4">
                            <h4 class="widget-title">
                                Recent <span>Articles</span>
                            </h4>

                            <?php if (!empty($footerRecentPosts)): ?>

                                <ul class="list-unstyled recent-post">

                                    <?php foreach ($footerRecentPosts as $footerPost): ?>

                                        <?php
                                        $footerPostUrl =
                                            '/blog/' .
                                            rawurlencode($footerPost['slug']);

                                        $footerPostImage =
                                            !empty($footerPost['image'])
                                                ? ltrim($footerPost['image'], '/')
                                                : 'images/blog/thumb/default-blog.webp';

                                        $footerPostDate =
                                            $footerPost['date']
                                            ?: $footerPost['created_at'];

                                        $formattedFooterDate =
                                            $footerPostDate
                                                ? date(
                                                    'M j',
                                                    strtotime($footerPostDate)
                                                )
                                                : '';
                                        ?>

                                        <li class="clearfix">

                                            <div class="post-thumbnail">
                                                <a href="<?= e($footerPostUrl); ?>">
                                                    <img
                                                        src="<?= e($footerPostImage); ?>"
                                                        alt="<?= e($footerPost['title']); ?>"
                                                        loading="lazy"
                                                        width="90"
                                                        height="70"
                                                    >
                                                </a>
                                            </div><!-- end post-thumbnail -->

                                            <div class="post-content">
                                                <h3>
                                                    <a href="<?= e($footerPostUrl); ?>">
                                                        <?= e($footerPost['title']); ?>
                                                    </a>
                                                </h3>

                                                <?php if ($formattedFooterDate !== ''): ?>
                                                    <div class="post-meta">
                                                        <span>
                                                            <i class="fas fa-calendar-alt"></i>

                                                            <a href="<?= e($footerPostUrl); ?>">
                                                                <?= e($formattedFooterDate); ?>
                                                            </a>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>

                                            </div><!-- end post-content -->

                                        </li>

                                    <?php endforeach; ?>

                                </ul><!-- end recent-post -->

                            <?php else: ?>

                                <div class="footer-no-posts">
                                    <p>No published articles are available yet.</p>
                                    <a href="blog.php">Visit the blog</a>
                                </div>

                            <?php endif; ?>

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

 <!-- Linking Emoji Mart script for emoji picker -->
    <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>

    <!-- Linking custom script -->
    <script src="script.js"></script>


  </body>
</html>
