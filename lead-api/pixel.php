<!-- Keitaro tracking script -->
    <script type='application/javascript'>
        if (!window.KTracking) {
            window.KTracking = {
                collectNonUniqueClicks: true,
                multiDomain: false,
                R_PATH: '<?=TRACKER_URL?><?=$user_id?>',
                P_PATH: '<?=POSTBACK_URL?>',
                listeners: [],
                reportConversion: function () {
                    this.queued = arguments;
                },
                getSubId: function (fn) {
                    this.listeners.push(fn);
                },
                ready: function (fn) {
                    this.listeners.push(fn);
                }
            };
        }
        (function () {
            var a = document.createElement('script');
            a.type = 'application/javascript';
            a.async = true;
            a.src = '<?=TRACKER_URL?>js/k.min.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(a, s)
        })();
    </script>
    <noscript><img height='0' width='0' alt='' src='https://fbkeitaro.site/<?=$user_id?>'/></noscript>

    <!-- Begin Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?=$fbpx?>');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=<?= $fbpx ?>&ev=PageView&noscript=1"/>
    </noscript>
<!-- End Facebook Pixel Code-->