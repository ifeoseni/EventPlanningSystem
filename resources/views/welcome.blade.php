<!DOCTYPE html>
<html>
<head>
	<title>Event Planning Software Landing Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
        <style>
            /* Reset Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 1.5;
      color: #333;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    /* Layout Styles */
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    /* Component Styles */
    .btn {
      display: inline-block;
      padding: 0.5rem 1rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      cursor: pointer;
      user-select: none;
      background-color: #007bff;
      border: 1px solid #007bff;
      border-radius: 0.25rem;
      color: #fff;
    }

    .form-control {
      display: block;
      width: 100%;
      height: calc(2.25rem + 2px);
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      background-color: transparent;
      border-collapse: collapse;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
      .sidebar {
        display: none;
      }
    }

    /* Custom Styles */
    .logo {
      font-size: 2rem;
      font-weight: 700;
      color: #007bff;
    }

        </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-dark text-white">
          <a class="navbar-brand" href="#">ePlanner</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Events</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
          </div>
        </nav>
      </header>
    <main>
		<section class="hero">
			<h2>Plan Your Perfect Event</h2>
			<p>Our all-in-one event planning software makes it easy to create, manage, and promote your events.</p>
			<a href="#" class="cta-button">Get Started</a>
		</section>

		<section class="features">
			<h3>Features</h3>
			<ul>
				<li>Event Creation</li>
				<li>Event Management</li>
				<li>Marketing and Promotion</li>
				<li>Analytics and Reporting</li>
			</ul>
		</section>

		<section class="pricing">
			<h3>Pricing</h3>
			<p>Our event planning software is available at an affordable monthly subscription.</p>
			<a href="#" class="cta-button">Sign Up Now</a>
		</section>

		<section class="blog">
			<h3>Latest from Our Blog</h3>
			<article>
				<h4>5 Tips for Hosting a Successful Conference</h4>
				<p>Hosting a conference can be a daunting task, but with our event planning software, you can make it a success. Here are five tips to get you started.</p>
				<a href="#">Read More</a>
			</article>

			<article>
				<h4>How to Create a Custom Event Landing Page</h4>
				<p>With our software, you can create custom landing pages to promote your events. Here's how to do it.</p>
				<a href="#">Read More</a>
			</article>
		</section>

		<section class="contact">
			<h3>Contact Us</h3>
			<form>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name">

				<label for="email">Email:</label>
				<input type="email" id="email" name="email">

				<label for="message">Message:</label>
				<textarea id="message" name="message"></textarea>

				<input type="submit" value="Send">
			</form>
		</section>
	</main>

	<footer>
		<p>&copy; 2023 Event Planning Software</p>
	</footer>
</body>
</html>
