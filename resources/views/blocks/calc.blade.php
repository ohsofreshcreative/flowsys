<!--- calc --->

<div class="b-calc" id="calculator-block" data-base-cost="{{ $base_cost_per_meter ?? 150 }}">
	<div class="c-main py-20">

		<div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8 lg:gap-12">
			<div>
				<h4 class="">Czym jesteś zainteresowany?</h4>
				@if($services)
				<div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6 mb-8">
					@foreach($services as $service)
					<div>
						<input
							type="checkbox"
							name="selected_service[]"
							id="service-{{ $loop->index }}"
							value="{{ $service['title'] }}"
							class="hidden peer"
							data-cost-type="{{ $service['cost_type'] ?? 'per_meter' }}"
							data-base-cost="{{ $service['base_cost'] ?? 0 }}"
							data-per-meter-cost="{{ $service['per_meter_cost'] ?? 0 }}"
							data-per-room-cost="{{ $service['per_room_cost'] ?? 0 }}">
						<label for="service-{{ $loop->index }}" class="service-tile flex flex-col justify-between items-center bg-white border-2 border-p-light rounded-lg p-4 h-full text-center cursor-pointer hover:shadow-lg transition-all duration-300 peer-checked:!border-primary">
							<div>
								@if($service['icon'])
								{!! wp_get_attachment_image($service['icon']['ID'], 'thumbnail', false, ['class' => 'mx-auto mb-2 h-8 w-8 object-contain']) !!}
								@endif
								<p class="font-semibold text-base">{{ $service['title'] }}</p>
							</div>
							<div class="mt-3 relative w-5 h-5">
								<div class="w-full h-full rounded-full border-2 border-primary"></div>
								<div class="indicator-dot absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2.5 h-2.5 bg-green-500 rounded-full opacity-0 transition-opacity"></div>
							</div>
						</label>
					</div>
					@endforeach
				</div>
				@endif

				<hr class="my-6 border-dotted border-primary">

				{{-- PRZYWRÓCONA SEKCJA DOFINANSOWAŃ --}}
				@if($subsidies)
				<h4 class="text-2xl font-bold mb-4">Dofinansowania</h4>
				<div class="flex flex-col gap-2 mb-8">
					@foreach($subsidies as $subsidy)
					<label class="flex items-center gap-2">
						<input type="checkbox" name="subsidies[]" value="{{ $subsidy['subsidy_name'] }}">
						<span>{{ $subsidy['subsidy_name'] }}</span>
					</label>
					@endforeach
				</div>
				@endif

				<hr class="my-6 border-dotted border-primary">


				{{-- SEKCJA 4: FORMULARZ KONTAKTOWY --}}
				@if($shortcode)
				{!! do_shortcode($shortcode) !!}
				@else
				<p>Wprowadź shortcode formularza w ustawieniach bloku.</p>
				@endif
			</div>


			{{-- PRAWA KOLUMNA: PODSUMOWANIE --}}

			{{-- PRAWA KOLUMNA: PODSUMOWANIE --}}
			<div class="bg-white p-8 rounded-2xl h-fit sticky top-26">
				<h4 class="text-2xl font-bold mb-6">Podsumowanie</h4>

				<div>
					<b class="font-semibold text-gray-700">Czym jesteś zainteresowany</b>
					<p id="summary-services" class="text-gray-500 mb-4 min-h-[1.5em]">Brak</p>
				</div>

				<hr class="my-6 border-dotted border-primary-500">

				<div>
					<b class="font-semibold text-gray-700 mt-4">Dane inwestycji</b>
					<p class="text-gray-500 flex justify-between">Powierzchnia całkowita: <span id="summary-area-value" class="font-medium"></span></p>
					<p class="text-gray-500 flex justify-between">Ilość kondygnacji: <span id="summary-floors-value" class="font-medium"></span></p>
					<p class="text-gray-500 mb-4 flex justify-between">Ilość pomieszczeń: <span id="summary-rooms-value" class="font-medium"></span></p>
				</div>

				<hr class="my-6 border-dotted border-primary">

				<div>
					<b class="font-semibold text-primary mt-4">Dofinansowania</b>
					<p id="summary-subsidies" class="text-secondary-500 mb-4 min-h-[1.5em]">Brak</p>
				</div>

				<hr class="my-6 border-dotted border-primary">

				<div>
					<b class="font-semibold text-gray-700">Szacowany koszt</b>
					<p id="summary-cost" class="primary text-2xl font-bold">0 zł</p>
				</div>

                <div class="mt-6">
                    <button id="trigger-cf7-submit" class="w-full text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-light font-medium rounded-lg text-sm px-5 py-2.5 text-center">Wyślij zapytanie</button>
                </div>
			</div>
		</div>
	</div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const triggerButton = document.getElementById('trigger-cf7-submit');
    const cf7Form = document.querySelector('.wpcf7-form');

    if (triggerButton && cf7Form) {
        const cf7SubmitButton = cf7Form.querySelector('input[type="submit"]');
        
        if (cf7SubmitButton) {
            triggerButton.addEventListener('click', function() {
                // Użyj requestSubmit() na formularzu, aby uruchomić walidację CF7
                cf7Form.requestSubmit(cf7SubmitButton);
            });
        }
    }
});
</script>