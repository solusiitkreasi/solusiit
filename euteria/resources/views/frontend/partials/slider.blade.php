<section id="slider" class="section-gap">
	<div class="slider">
		@foreach (App\Models\Backend\Slider::orderBy('order','ASC')->get() as $row)
		<div class="slider-item" style="background-image: url('{{asset($row->images)}}');"></div>
		@endforeach
	</div>
</section>