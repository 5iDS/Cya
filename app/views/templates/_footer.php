		</div>
	</section>

	<footer id="colophon" data-role="footer">
		<div id="site-generator">
			<h4><?php echo date('Y'). ' &copy; &hellip;a.work.of.HipHop&hellip;';?></h4>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>
	</footer>
	
</div>
<script type="text/javascript">
	var jacked_error = humane.create({
			baseCls: 'humane-jackedup', 
			addnCls: 'humane-jackedup-error',
			waitForMove: true
		}),
		jacked_success = humane.create({
			baseCls: 'humane-jackedup', 
			addnCls: 'humane-jackedup-success',
			waitForMove: true
	});
	if(Modernizr.mq('only all')) {} else {
		yepnope({
			load: {
				'mQCss': themeurl+"/css/mq.css"
			}
		});	
	};
	head.js(
		{ jquery: "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" },
		<?php /** ?>
		{ jqueryMobile: "//code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js" },
		<?php /**/?>
		{ jqueryPlugins: "assets/js/plugins/jquery/jquery.plugins.js" },
		//{ ajaxification: "/assets/js/myFunck/ajaxification.js" },
		{ history: "//cdnjs.cloudflare.com/ajax/libs/history.js/1.8/native.history.min.js" }
	);
</script>
</body>
</html>