
<section data-gsap-anim="section">

	<div data-gsap-element="bubble" 
		x-data="{ isOpen: true }"
		x-show="isOpen"
		x-transition
		class="fixed bottom-8 right-8 z-50 w-full max-w-[320px]"
		style="display: none;" {{-- Zapobiega mignięciu przed inicjalizacją Alpine.js --}}>
		<div class="__sidebar relative bg-dark dashed-p-3 radius h-max p-8">

			<button @click="isOpen = false" class="absolute top-4 right-4 text-white/50 hover:text-white" aria-label="Zamknij">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>

			<h6 class="text-white pr-6">Potrzebujesz pomocy?</h6>
			<img class="my-8" src="/wp-content/uploads/2025/11/photos.png" />
			<p class="text-white">Nasz doradca pomoże Ci znaleźć odpowiedni produkt</p>

			<a class="main-btn m-btn mt-6" href="/kontakt">Zapytaj eksperta</a>
		</div>
	</div>

</section>