document.addEventListener('DOMContentLoaded', function () {

    const hero = document.querySelector('.hero-slider');

    if (!hero) return;

    new Swiper(hero, {

        loop: true,

        speed: 900,

        autoplay: {

            delay: 6000,

            disableOnInteraction: false

        },

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

});

const partners = document.querySelector('.partners-slider');

if (partners) {

	new Swiper(partners, {

		loop: true,

		spaceBetween: 30,

		autoplay: {

			delay: 2500

		},

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

}