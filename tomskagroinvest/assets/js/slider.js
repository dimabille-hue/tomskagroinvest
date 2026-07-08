document.addEventListener('DOMContentLoaded', function () {
	const hero = document.querySelector('.hero-slider');

	if (hero) {
		const heroSlidesCount = hero.querySelectorAll('.swiper-slide').length;
		const hasHeroLoop = heroSlidesCount > 1;

		new Swiper(hero, {
			loop: hasHeroLoop,
			speed: 900,
			autoplay: hasHeroLoop ? {
				delay: 6000,
				disableOnInteraction: false
			} : false,
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			pagination: {
				el: '.hero-pagination',
				clickable: true
			},
			navigation: {
				nextEl: '.hero-next',
				prevEl: '.hero-prev'
			}
		});
	}

	const partners = document.querySelector('.partners-slider');

	if (!partners) {
		return;
	}

	const partnerSlidesCount = partners.querySelectorAll('.swiper-slide').length;
	const getCanLoop = function () {
		if (window.innerWidth >= 1200) {
			return partnerSlidesCount > 6;
		}

		if (window.innerWidth >= 768) {
			return partnerSlidesCount > 4;
		}

		return partnerSlidesCount > 2;
	};

	new Swiper(partners, {
		loop: getCanLoop(),
		spaceBetween: 30,
		autoplay: partnerSlidesCount > 1 ? {
			delay: 2500
		} : false,
		breakpoints: {
			0: {
				slidesPerView: 2
			},
			768: {
				slidesPerView: 4
			},
			1200: {
				slidesPerView: 6
			}
		}
	});
});
