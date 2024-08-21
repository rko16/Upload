@extends('app')
@section('content')
	<section class="wrap bg-light wrap-top40">
		<div class="container mt-5 pt-4">
			<div class="faq-panel inrpage-faq">
				<div class="title">
					<h3>Frequently <span class="text-warning">Asked</span> Question <span class="text-warning">(Faq's)</span></h3>
				</div>
				<div class="accordion" id="accordionExample">
					@foreach($faqdata as $index => $data)
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading{{ $index }}">
							<button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
								{{ $data->question }}
							</button>
						</h2>
						<div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<p>
									{{ $data->answer }}
								</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endsection
