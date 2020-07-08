<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://thank-you.pro/css/main.css">
		<title>Thanx!</title>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="white">
		<meta name="apple-mobile-web-app-title" content="">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
		<? if (isset($fbpx)) {?>
			<!-- Facebook Pixel Code -->
			<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t,s)}(window, document,'script',
												'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '<?=$fbpx?>');
			fbq('track', 'PageView');
			</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=<?=$fbpx?>&ev=PageView&noscript=1"
			/></noscript>
			<!-- End Facebook Pixel Code -->
		<?}?>
    </head>
    <body>
	<script>
		fbq('track', 'Lead');
		fbq('track', 'Purchase');
		fbq('track', 'AddToCart');
		fbq('track', 'InitiateCheckout');
	</script>
		<div class="wrap">
			<div class="blink"></div>
			<div class="step1 step2">
				<h1 class="step1__title">Thank you! Your order has been successfully created!</h1>
				<h2 class="step1__subtitle">Our operator will contact you shortly. Don't turn off the phone.</h2>
			</div>
		</div>
	</body>
</html>