<section id="slider" class="section-gap">
	<div class="slider">
		@for ($i = 1; $i < 13; $i++)
		    <div
                class="slider-item"
                style="background-image: url({{ asset('frontend/images/banner-2.png') }})"
            ></div>
		@endfor
	</div>
</section>