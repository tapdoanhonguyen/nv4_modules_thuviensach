<!-- BEGIN: main -->
<ul class="comment-list">
	<!-- BEGIN: comment -->
	<li class="comment even thread-even depth-1 comment">
		<div class="comment-body" id="div-comment-3">
			<div class="comment-author vcard">
				<img src="{photo}" alt="{name_user}" class="avatar">
				<cite class="fn">
					{name_user}
				</cite> 
				<div class="comment-meta" style="display: block">
					{time_add}
				</div>
			</div>
			<div class="row">
				<div class="rate">
					<!-- BEGIN: star -->
					<input type="radio" id="star_{VIEW.id}{key}" {checked} readonly="" name="rate_{VIEW.id}" value="{key}" />
					<label for="star_{VIEW.id}{key}" title="text">{key} stars</label>
					<!-- END: star -->
				</div>
			</div>
			<div class="comment-content dlab-page-text">
				<p>
					{content}
				</p>
			</div>
		</div>
	</li>
	<!-- END: comment -->
	<!-- BEGIN: generate_page -->
	<li class="comment even thread-even depth-1 comment">
		<div class="text-center">
			{NV_GENERATE_PAGE}
		</div>
	</li>
	<!-- END: generate_page -->
</ul>
<!-- END: main -->
