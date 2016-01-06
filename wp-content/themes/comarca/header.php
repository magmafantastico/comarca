<?php
/**
 * The template for displaying the header
 *
 * @package Comarca
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js lato">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/villa.min.js"></script>
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/villa.min.css">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<style>

	.Maia {
		border-bottom: solid 1px #26a69a;
		width: 100%;
		height: 3.75em;
	}

	.Maia--fixed {
		position: fixed;
		top: 0;
		left: 0;
	}

	.MaiaContainer {
		width: 100%;
		max-width: 96em;
		margin: 0 auto;
		padding: 0 1em;
		height: 100%;
	}

	.Maia a {
		color: #009688;
	}

	.Maia a span {
		font-size: 1.3125em;
	}

</style>

<div class="Maia Maia--fixed white">

	<div class="MaiaContainer flex justify-between">

		<a href="#" class="flex align-center">
			<span>+</span>
		</a>

		<div id="now" class="Now flex align-center"></div>

		<div class="Acceptability"></div>

	</div>

</div>

<script>

	var Now = (function() {

		function Now(viewport) {

			var self = this;

			this.viewport = viewport;

		}

		Now.prototype.init = function() {

			var self = this;

			var request = new XMLHttpRequest();
			request.open('GET', 'http://api.openweathermap.org/data/2.5/weather?q=palmital,br&units=metric&appid=84cbb8f0f0a4ff4afd006f5a4d8917c2', true);

			request.onreadystatechange = function() {
				if (this.readyState === 4) {
					if (this.status >= 200 && this.status < 400) {
						// Success!
						var data = JSON.parse(this.responseText);
						if (!self.viewport.innerHTML.length) self.viewport.innerHTML = data.main.temp;
						else self.viewport.innerHTML = data.main.temp + 'º | ' + self.viewport.innerHTML;
					} else {
						// Error :(
					}
				}
			};

			request.send();
			request = null;

			var request = new XMLHttpRequest();
			request.open('GET', 'https://query.yahooapis.com/v1/public/yql?q=select%20*from%20yahoo.finance.xchange%20where%20pair%20in%20%28%22USDBRL%22%29&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=', true);

			request.onreadystatechange = function() {
				if (this.readyState === 4) {
					if (this.status >= 200 && this.status < 400) {
						// Success!
						var data = JSON.parse(this.responseText);

						if (self.viewport.innerHTML.length) self.viewport.innerHTML = + self.viewport.innerHTML + 'º | Dólar ' + data.query.results.rate.Rate;
						else self.viewport.innerHTML = 'Dólar ' + data.query.results.rate.Rate;

						console.log(data.query.results);

					} else {
						// Error :(
					}
				}
			};

			request.send();
			request = null;

		};

		return Now;

	})();

</script>

<script>

	var now = new Now(document.getElementById('now'));

	now.init();

</script>

<style>

	.MainHeader {
		border-bottom: solid 2px #014d41;
		margin: 6em auto 2.25em;
		max-width: 72em;
		padding: 0 0 2.25em;
		width: 100%;
	}

	.Logo {
		width: 100%;
		display: -webkit-box;
		display: -moz-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
	}

	.Logo--logo {
		background-color: #014d41;
		border-radius: 12px;
		border-top-right-radius: 0;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-align-items: center;
		align-items: center;
		width: 12em;
		height: 12em;
		padding: .75em;
	}

	.Logo--logo .Logo-svg {
		border: solid 2px #ffffff;
		border-radius: 12px;
		width: 100%;
		height: 100%;
	}

	.Logo--logo .ComarcaLogoSquare {
		fill: #014d41;
	}

	.Logo--logo .ComarcaLogoType,
	.Logo--logotype .ComarcaLogoTypeText {
		fill: #ffffff;
	}

	.Logo--logotype {
		background-color: #014d41;
		padding: 1em 1em 1em .5em;
		border-top-right-radius: 12px;
		border-bottom-right-radius: 12px;
	}

	.Logo--logotype .Logo-svg {
		height: 7em;
	}

	.MainMenu {
		height: 3em;
		display: -webkit-box;
		display: -moz-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-justify-content: space-around;
		justify-content: space-around;
		align-items: center;
	}

	.MainMenu li a {
		color: #014d41;
		font-size: 1.125em;
		text-transform: uppercase;
		font-weight: 600;
		letter-spacing: 0;
	}

	.MainMenu li a:hover {
		text-decoration: underline;
	}


</style>


<header class="MainHeader flex justify-center">

	<div class="MainHeaderLogo Logo Logo--logo">

		<a href="http://localhost/comarca/" class="Logo-select-area flex">

			<svg version="1.1" class="Logo-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1000px"
			     height="1000px" viewBox="0 0 1000 1000" style="enable-background:new 0 0 1000 1000;" xml:space="preserve">
			<g class="ComarcaLogoSquare">
				<rect id="XMLID_1_" class="ComarcaLogoSquareRect" width="1000" height="1000"></rect>
			</g>
				<g class="ComarcaLogoType">
					<path class="ComarcaLogoTypeLetter ComarcaLogoTypeLetter--c" d="M870,885V708c0,0-0.5,0-81.5,0c-140.9-29-142.3-397,0-449c83.3,0,81.5,0,81.5,0V81
		c-33.8,0,1.1,0-136,0c-283.5,25-306.4,767.2,0,804C804.5,885,870,885,870,885z"></path>
					<path class="ComarcaLogoTypeLetter ComarcaLogoTypeLetter--j" d="M272,81c0,0,0,559,0,576.8c0,17.8-5.6,49-49.1,49.5c-37.3,0.4-93.9,0-93.9,0V885h146.6
		c0,0,166.6-0.1,166.6-231.9c0-56-0.7-572.1-0.7-572.1H272z"></path>
				</g>
		</svg>

		</a>

	</div>

	<div class="flex flex-column">

		<div class="MainHeaderLogoType Logo Logo--logotype">

			<svg version="1.1" class="Logo-svg ComarcaLogoTypeText" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
			     x="0px" y="0px" width="606px" height="74.2px" viewBox="0 0 606 74.2" style="enable-background:new 0 0 606 74.2;"
			     xml:space="preserve">
				<path id="XMLID_81_" class="st0" d="M21.7,47.3c0,4.1-0.3,7.9-0.9,11.3c-0.6,3.4-1.5,6.3-2.7,8.7c-1.2,2.4-2.7,4.3-4.5,5.7
	c-1.8,1.3-3.9,2-6.4,2c-1.1,0-2.2-0.1-3.3-0.3c-1.1-0.2-2.2-0.5-3.4-1l0.5-10c0.1-0.9,0.3-1.6,0.6-2.1C2,61,2.5,60.7,3.2,60.7
	c0.3,0,0.7,0.1,1.2,0.3c0.5,0.2,1.1,0.3,1.8,0.3c1,0,1.8-0.2,2.5-0.7c0.7-0.5,1.3-1.2,1.8-2.3c0.5-1.1,0.8-2.5,1.1-4.2
	c0.2-1.7,0.4-3.9,0.4-6.4V0h9.9V47.3z"/>
				<path id="XMLID_83_" class="st0" d="M69.3,37.1c0,5.4-0.5,10.4-1.6,15c-1.1,4.6-2.6,8.6-4.5,12c-1.9,3.4-4.2,6.1-7,8
	c-2.7,1.9-5.7,2.9-9,2.9c-3.3,0-6.3-1-9-2.9c-2.7-1.9-5.1-4.6-7-8s-3.4-7.4-4.5-12c-1.1-4.6-1.6-9.6-1.6-15c0-5.4,0.5-10.4,1.6-15
	c1.1-4.6,2.6-8.6,4.5-12c1.9-3.4,4.3-6.1,7-8c2.7-1.9,5.7-2.9,9-2.9c3.3,0,6.3,1,9,2.9c2.7,2,5,4.6,7,8c1.9,3.4,3.4,7.4,4.5,12
	C68.8,26.8,69.3,31.8,69.3,37.1z M59.2,37.1c0-3.7-0.3-7-0.8-9.9c-0.5-2.9-1.3-5.4-2.3-7.5c-1-2-2.3-3.6-3.7-4.7
	c-1.5-1.1-3.2-1.6-5-1.6c-1.9,0-3.6,0.5-5.1,1.6c-1.5,1.1-2.7,2.6-3.8,4.7c-1,2-1.8,4.5-2.3,7.5c-0.5,2.9-0.8,6.2-0.8,9.9
	c0,3.7,0.3,7,0.8,10c0.5,2.9,1.3,5.4,2.3,7.5c1,2,2.3,3.6,3.8,4.7c1.5,1.1,3.2,1.6,5.1,1.6c1.9,0,3.6-0.5,5-1.6
	c1.5-1.1,2.7-2.6,3.7-4.7c1-2,1.8-4.5,2.3-7.5C58.9,44.1,59.2,40.8,59.2,37.1z"/>
				<path id="XMLID_86_" class="st0" d="M107.9,74.2H99c-1.7,0-2.8-1.1-3.6-3.3l-7.1-21.5c-0.3-0.9-0.7-1.6-1.1-2
	c-0.4-0.4-1-0.6-1.8-0.6H83v27.5h-9.9V0H87c3.1,0,5.7,0.6,7.9,1.7c2.2,1.1,3.9,2.6,5.3,4.6c1.4,2,2.4,4.3,3,7
	c0.6,2.7,0.9,5.6,0.9,8.8c0,2.4-0.2,4.7-0.6,6.8c-0.4,2.1-0.9,4.1-1.6,5.9c-0.7,1.8-1.6,3.4-2.7,4.9c-1.1,1.4-2.3,2.6-3.7,3.5
	c0.6,0.6,1.2,1.3,1.8,2.2c0.6,0.9,1.1,1.9,1.5,3.1L107.9,74.2z M87,34.9c1.3,0,2.5-0.3,3.4-0.9c0.9-0.6,1.7-1.4,2.3-2.5
	c0.6-1.1,1-2.3,1.3-3.7c0.3-1.4,0.4-2.9,0.4-4.6c0-3.3-0.6-5.8-1.8-7.6c-1.2-1.8-3.1-2.8-5.6-2.8h-4v22H87z"/>
				<path id="XMLID_89_" class="st0" d="M146.7,0v74.2h-5.1c-0.8,0-1.4-0.2-1.9-0.6c-0.5-0.4-1-1.2-1.5-2.2l-20-44.3
	c0.1,1.3,0.1,2.6,0.2,3.8c0,1.2,0,2.4,0,3.5v39.8h-8.7V0h5.2c0.4,0,0.8,0,1.1,0.1c0.3,0.1,0.6,0.2,0.8,0.4c0.2,0.2,0.5,0.5,0.7,0.8
	c0.2,0.3,0.5,0.8,0.7,1.4l20.2,44.6c-0.1-1.4-0.2-2.8-0.2-4.2c0-1.3-0.1-2.6-0.1-3.8V0H146.7z"/>
				<path id="XMLID_91_" class="st0" d="M191.2,74.2h-7.6c-0.9,0-1.5-0.3-2.1-1c-0.5-0.7-0.9-1.6-1.2-2.7l-2.5-12.9h-16.2l-2.5,12.9
	c-0.2,1-0.6,1.8-1.2,2.6s-1.2,1.1-2.1,1.1h-7.7L164.6,0h10.1L191.2,74.2z M175.5,45.9l-3.9-20.3c-0.3-1.3-0.6-2.8-0.9-4.6
	c-0.3-1.7-0.7-3.6-1-5.7c-0.3,2.1-0.6,4-0.9,5.8c-0.3,1.8-0.6,3.3-0.9,4.6l-3.9,20.2H175.5z"/>
				<path id="XMLID_94_" class="st0" d="M218.2,60.5v13.8h-25.6V0h9.9v60.5H218.2z"/>
				<path id="XMLID_96_" class="st0" d="M269.7,37.1c0,5.4-0.5,10.3-1.6,14.9c-1.1,4.5-2.6,8.5-4.5,11.8c-1.9,3.3-4.2,5.9-7,7.7
	c-2.7,1.9-5.7,2.8-9,2.8h-16.5V0h16.5c3.3,0,6.3,0.9,9,2.8c2.7,1.9,5,4.4,7,7.7c1.9,3.3,3.4,7.2,4.5,11.7
	C269.1,26.8,269.7,31.8,269.7,37.1z M259.6,37.1c0-3.7-0.3-7-0.8-9.9c-0.5-3-1.3-5.5-2.3-7.5c-1-2.1-2.3-3.6-3.7-4.7
	c-1.5-1.1-3.2-1.7-5-1.7H241V61h6.6c1.9,0,3.6-0.6,5-1.7c1.5-1.1,2.7-2.7,3.7-4.7c1-2.1,1.8-4.6,2.3-7.5
	C259.3,44.1,259.6,40.8,259.6,37.1z"/>
				<path id="XMLID_99_" class="st0" d="M310.3,74.2h-7.6c-0.9,0-1.5-0.3-2.1-1c-0.5-0.7-0.9-1.6-1.2-2.7l-2.5-12.9h-16.2l-2.5,12.9
	c-0.2,1-0.6,1.8-1.2,2.6s-1.2,1.1-2.1,1.1h-7.7L283.7,0h10.1L310.3,74.2z M294.6,45.9l-3.9-20.3c-0.3-1.3-0.6-2.8-0.9-4.6
	c-0.3-1.7-0.7-3.6-1-5.7c-0.3,2.1-0.6,4-0.9,5.8c-0.3,1.8-0.6,3.3-0.9,4.6L283,45.9H294.6z"/>
				<path id="XMLID_102_" class="st0" d="M349.9,55c0.2,0,0.5,0.1,0.7,0.2s0.5,0.4,0.7,0.8l3.9,7.2c-1.7,3.9-3.9,6.9-6.4,8.8
	c-2.6,2-5.6,3-9.1,3c-3.2,0-6.1-1-8.7-2.9c-2.6-1.9-4.7-4.6-6.5-7.9c-1.8-3.4-3.1-7.4-4.1-12c-1-4.6-1.4-9.7-1.4-15.1
	c0-5.5,0.5-10.6,1.5-15.3c1-4.6,2.5-8.6,4.3-12c1.9-3.4,4.1-6,6.7-7.8c2.6-1.9,5.5-2.8,8.6-2.8c1.6,0,3.1,0.2,4.5,0.7
	c1.4,0.5,2.7,1.2,4,2c1.2,0.9,2.4,1.9,3.4,3.1c1,1.2,1.9,2.5,2.7,4l-3.3,7.8c-0.2,0.5-0.5,0.9-0.8,1.3c-0.3,0.4-0.7,0.6-1.2,0.6
	c-0.3,0-0.7-0.1-1-0.4c-0.3-0.3-0.6-0.6-1-1c-0.4-0.4-0.7-0.8-1.2-1.3c-0.4-0.5-0.9-0.9-1.5-1.3c-0.6-0.4-1.2-0.7-2-1
	c-0.8-0.3-1.7-0.4-2.7-0.4c-1.6,0-3.1,0.5-4.5,1.6c-1.4,1.1-2.5,2.6-3.5,4.6c-1,2-1.7,4.5-2.3,7.4c-0.5,2.9-0.8,6.3-0.8,10.1
	c0,3.8,0.3,7.2,0.9,10.1c0.6,3,1.4,5.4,2.4,7.5c1,2,2.2,3.6,3.6,4.6c1.4,1.1,2.8,1.6,4.4,1.6c0.9,0,1.7-0.1,2.5-0.2
	c0.7-0.2,1.4-0.4,2.1-0.8c0.6-0.4,1.2-0.8,1.8-1.4c0.6-0.6,1.1-1.3,1.7-2.3c0.2-0.3,0.5-0.6,0.8-0.8C349.3,55.1,349.6,55,349.9,55z"
					/>
				<path id="XMLID_104_" class="st0" d="M398.3,37.1c0,5.4-0.5,10.4-1.6,15c-1.1,4.6-2.6,8.6-4.5,12s-4.2,6.1-7,8
	c-2.7,1.9-5.7,2.9-9,2.9s-6.3-1-9-2.9c-2.7-1.9-5.1-4.6-7-8c-1.9-3.4-3.4-7.4-4.5-12c-1.1-4.6-1.6-9.6-1.6-15c0-5.4,0.5-10.4,1.6-15
	c1.1-4.6,2.6-8.6,4.5-12c1.9-3.4,4.3-6.1,7-8c2.7-1.9,5.7-2.9,9-2.9s6.3,1,9,2.9c2.7,2,5,4.6,7,8c1.9,3.4,3.4,7.4,4.5,12
	C397.8,26.8,398.3,31.8,398.3,37.1z M388.2,37.1c0-3.7-0.3-7-0.8-9.9c-0.5-2.9-1.3-5.4-2.3-7.5c-1-2-2.3-3.6-3.7-4.7
	c-1.5-1.1-3.2-1.6-5-1.6c-1.9,0-3.6,0.5-5.1,1.6c-1.5,1.1-2.7,2.6-3.8,4.7c-1,2-1.8,4.5-2.3,7.5c-0.5,2.9-0.8,6.2-0.8,9.9
	c0,3.7,0.3,7,0.8,10c0.5,2.9,1.3,5.4,2.3,7.5c1,2,2.3,3.6,3.8,4.7c1.5,1.1,3.2,1.6,5.1,1.6c1.9,0,3.6-0.5,5-1.6
	c1.5-1.1,2.7-2.6,3.7-4.7c1-2,1.8-4.5,2.3-7.5C388,44.1,388.2,40.8,388.2,37.1z"/>
				<path id="XMLID_107_" class="st0" d="M450,0v74.2h-8.7V31.5c0-1,0-2.1,0-3.2c0-1.2,0.1-2.3,0.2-3.5L430.2,63
	c-0.4,1.2-0.8,2.1-1.4,2.7c-0.6,0.6-1.3,0.9-2,0.9h-1.3c-0.8,0-1.4-0.3-2-0.9c-0.6-0.6-1.1-1.5-1.4-2.7l-11.3-38.3
	c0.1,1.2,0.1,2.4,0.1,3.6c0,1.2,0.1,2.3,0.1,3.2v42.7h-8.7V0h7.5c0.4,0,0.8,0,1.1,0.1c0.3,0,0.6,0.1,0.9,0.3
	c0.3,0.2,0.5,0.4,0.7,0.8c0.2,0.4,0.4,0.9,0.6,1.5l10.9,37.6c0.4,1.3,0.8,2.6,1.1,4c0.4,1.4,0.7,2.8,1,4.3c0.3-1.5,0.7-3,1-4.4
	c0.4-1.4,0.7-2.8,1.2-4.1l10.9-37.5c0.2-0.6,0.4-1.1,0.6-1.5c0.2-0.4,0.4-0.6,0.7-0.8c0.3-0.2,0.5-0.3,0.9-0.3
	c0.3,0,0.7-0.1,1.1-0.1H450z"/>
				<path id="XMLID_109_" class="st0" d="M494.4,74.2h-7.6c-0.9,0-1.5-0.3-2.1-1c-0.5-0.7-0.9-1.6-1.2-2.7L481,57.6h-16.2l-2.5,12.9
	c-0.2,1-0.6,1.8-1.2,2.6c-0.6,0.8-1.2,1.1-2.1,1.1h-7.7L467.9,0H478L494.4,74.2z M478.8,45.9l-3.9-20.3c-0.3-1.3-0.6-2.8-0.9-4.6
	c-0.3-1.7-0.7-3.6-1-5.7c-0.3,2.1-0.6,4-0.9,5.8c-0.3,1.8-0.6,3.3-0.9,4.6l-3.9,20.2H478.8z"/>
				<path id="XMLID_112_" class="st0" d="M530.6,74.2h-8.9c-1.7,0-2.8-1.1-3.6-3.3l-7.1-21.5c-0.3-0.9-0.7-1.6-1.1-2
	c-0.4-0.4-1-0.6-1.8-0.6h-2.5v27.5h-9.9V0h13.8c3.1,0,5.7,0.6,7.9,1.7c2.2,1.1,3.9,2.6,5.3,4.6c1.4,2,2.4,4.3,3,7
	c0.6,2.7,0.9,5.6,0.9,8.8c0,2.4-0.2,4.7-0.6,6.8c-0.4,2.1-0.9,4.1-1.6,5.9c-0.7,1.8-1.6,3.4-2.7,4.9c-1.1,1.4-2.3,2.6-3.7,3.5
	c0.6,0.6,1.2,1.3,1.8,2.2c0.6,0.9,1.1,1.9,1.5,3.1L530.6,74.2z M509.7,34.9c1.3,0,2.5-0.3,3.4-0.9c0.9-0.6,1.7-1.4,2.3-2.5
	c0.6-1.1,1-2.3,1.3-3.7c0.3-1.4,0.4-2.9,0.4-4.6c0-3.3-0.6-5.8-1.8-7.6c-1.2-1.8-3.1-2.8-5.6-2.8h-4v22H509.7z"/>
				<path id="XMLID_115_" class="st0" d="M560.2,55c0.2,0,0.5,0.1,0.7,0.2c0.2,0.2,0.5,0.4,0.7,0.8l3.9,7.2c-1.7,3.9-3.9,6.9-6.4,8.8
	c-2.6,2-5.6,3-9.1,3c-3.2,0-6.1-1-8.7-2.9c-2.6-1.9-4.7-4.6-6.5-7.9s-3.1-7.4-4.1-12s-1.4-9.7-1.4-15.1c0-5.5,0.5-10.6,1.5-15.3
	c1-4.6,2.5-8.6,4.3-12c1.9-3.4,4.1-6,6.7-7.8c2.6-1.9,5.5-2.8,8.6-2.8c1.6,0,3.1,0.2,4.5,0.7c1.4,0.5,2.7,1.2,4,2
	c1.2,0.9,2.4,1.9,3.4,3.1c1,1.2,1.9,2.5,2.7,4l-3.3,7.8c-0.2,0.5-0.5,0.9-0.8,1.3c-0.3,0.4-0.7,0.6-1.2,0.6c-0.3,0-0.7-0.1-1-0.4
	c-0.3-0.3-0.6-0.6-1-1c-0.4-0.4-0.7-0.8-1.2-1.3c-0.4-0.5-0.9-0.9-1.5-1.3c-0.6-0.4-1.2-0.7-2-1c-0.8-0.3-1.7-0.4-2.7-0.4
	c-1.6,0-3.1,0.5-4.5,1.6c-1.4,1.1-2.5,2.6-3.5,4.6c-1,2-1.7,4.5-2.3,7.4c-0.5,2.9-0.8,6.3-0.8,10.1c0,3.8,0.3,7.2,0.9,10.1
	c0.6,3,1.4,5.4,2.4,7.5c1,2,2.2,3.6,3.6,4.6c1.4,1.1,2.8,1.6,4.4,1.6c0.9,0,1.7-0.1,2.5-0.2c0.7-0.2,1.4-0.4,2.1-0.8
	c0.6-0.4,1.2-0.8,1.8-1.4c0.6-0.6,1.1-1.3,1.7-2.3c0.2-0.3,0.5-0.6,0.8-0.8C559.6,55.1,559.9,55,560.2,55z"/>
				<path id="XMLID_117_" class="st0" d="M606,74.2h-7.6c-0.9,0-1.5-0.3-2.1-1c-0.5-0.7-0.9-1.6-1.2-2.7l-2.5-12.9h-16.2l-2.5,12.9
	c-0.2,1-0.6,1.8-1.2,2.6c-0.6,0.8-1.2,1.1-2.1,1.1H563L579.4,0h10.1L606,74.2z M590.3,45.9l-3.9-20.3c-0.3-1.3-0.6-2.8-0.9-4.6
	c-0.3-1.7-0.7-3.6-1-5.7c-0.3,2.1-0.6,4-0.9,5.8c-0.3,1.8-0.6,3.3-0.9,4.6l-3.9,20.2H590.3z"/>
			</svg>

		</div>

		<nav id="site-navigation" class="MainHeaderNav" role="navigation">


			<?php if ( has_nav_menu( 'primary' ) ) : ?>
<!--				<nav id="site-navigation" class="MainNav" role="navigation">-->
					<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'MainMenu',
						'theme_location' => 'primary',
					) );
					?>
<!--				</nav>-->
			<?php endif; ?>

		</nav>

	</div>

</header>

<?php //get_sidebar(); ?>
