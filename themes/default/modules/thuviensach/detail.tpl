<!-- BEGIN: main -->
<script src="/themes/{THEME}/images/thuviensach/jq-3d-flip-book/js/jquery.min.js"></script>
<script src="/themes/{THEME}/images/thuviensach/jq-3d-flip-book/js/html2canvas.min.js"></script>
<script src="/themes/{THEME}/images/thuviensach/jq-3d-flip-book/js/three.min.js"></script>
<script src="/themes/{THEME}/images/thuviensach/jq-3d-flip-book/js/pdf.min.js"></script>
<script src="/themes/{THEME}/images/thuviensach/jq-3d-flip-book/js/3dflipbook.min.js"></script>
<style type="text/css">
	.fullscreen {
		background-color: #333;
	}

</style>
<div>
	<div class="text-left" style="display: inline-block;">
		<a class="btn btn-primary" onclick="history.back()">
			← Quay lại
		</a>
	</div>
	<div class="text-right" style="display: inline-block;float: right;">
		<span style="margin-right: 10px;" >
			Số lượt xem: {INFO.number_view}
		</span>
		<a class="btn btn-primary" href="{INFO.pdf}" download>Tải pdf</a>
	</div>
</div>
<div class="container fullscreen" id="container1" style="height: 700px;border-radius: 5px;border:solid 1px #dcdcdc;margin: 20px 0px;background: #333;">

</div>
<script type="text/javascript">
	var x = screen.width;
	if(x>900){
		var template = {
			html: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/templates/default-book-view.html',
			links: [{
				rel: 'stylesheet',
				href: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/css/font-awesome.min.css'
			}],
			styles: [
				'/themes/{THEME}/images/thuviensach/jq-3d-flip-book/css/short-black-book-view.css'
				],
			script: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/js/default-book-view.js',
			sounds: {
				startFlip: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/sounds/start-flip.mp3',
				endFlip: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/sounds/end-flip.mp3'
			}
		};
		
		$('#container1').FlipBook({
			controlsProps: {
				actions: {
					cmdSinglePage: {active: false},

				} 
			},
			propertiesCallback: function(props) {
				props.page.depth /= 4.5;
				props.cover.padding = 0;
				props.cover.bending = 0;
				return props;
			},
			
			pdf: '{INFO.pdf}',
			template: template

		});
	}else{
		var template = {
			html: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/templates/default-book-view.html',
			links: [{
				rel: 'stylesheet',
				href: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/css/font-awesome.min.css'
			}],
			styles: [
				'/themes/{THEME}/images/thuviensach/jq-3d-flip-book/css/short-black-book-view.css'
				],
			script: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/js/default-book-view.js',
			sounds: {
				startFlip: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/sounds/start-flip.mp3',
				endFlip: '/themes/{THEME}/images/thuviensach/jq-3d-flip-book/sounds/end-flip.mp3'
			}
		};
		$('#container1').FlipBook({
			controlsProps: {
				actions: {
					cmdSinglePage: {active: true},

				} 
			},
			propertiesCallback: function(props) {
				props.page.depth /= 4.5;
				props.cover.padding = 0;
				props.cover.bending = 0;
				return props;
			},
			bending: 0,
			pdf: '{INFO.pdf}',
			template: template

		});
	}
	

	

</script>


<!-- END: main -->