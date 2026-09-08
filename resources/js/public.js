document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Public Navbar
    |--------------------------------------------------------------------------
    */

    const navbar = document.querySelector('.ldx-public-navbar');
    const toggle = document.querySelector('.ldx-public-navbar-toggle');
    const mobileMenu = document.querySelector('.ldx-public-navbar-mobile');

    if (navbar && toggle && mobileMenu) {

        const closeMenu = () => {

            navbar.classList.remove('is-menu-open');

            mobileMenu.classList.remove('is-open');

            toggle.classList.remove('is-active');

            toggle.setAttribute('aria-expanded', 'false');

            toggle.setAttribute(
                'aria-label',
                'Open navigation menu'
            );

            document.body.classList.remove(
                'ldx-public-menu-open'
            );
        };


        const openMenu = () => {

            navbar.classList.add('is-menu-open');

            mobileMenu.classList.add('is-open');

            toggle.classList.add('is-active');

            toggle.setAttribute('aria-expanded', 'true');

            toggle.setAttribute(
                'aria-label',
                'Close navigation menu'
            );

            document.body.classList.add(
                'ldx-public-menu-open'
            );
        };


        toggle.addEventListener('click', () => {

            const isOpen =
                navbar.classList.contains('is-menu-open');

            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }

        });


        /*
        |--------------------------------------------------------------------------
        | Close when clicking mobile link
        |--------------------------------------------------------------------------
        */

        const mobileLinks =
            mobileMenu.querySelectorAll('a');

        mobileLinks.forEach((link) => {

            link.addEventListener('click', () => {
                closeMenu();
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Close with Escape
        |--------------------------------------------------------------------------
        */

        document.addEventListener('keydown', (event) => {

            if (event.key === 'Escape') {

                if (
                    navbar.classList.contains('is-menu-open')
                ) {
                    closeMenu();
                }

            }

        });


        /*
        |--------------------------------------------------------------------------
        | Close when resizing to desktop
        |--------------------------------------------------------------------------
        */

        window.addEventListener('resize', () => {

            if (window.innerWidth > 900) {
                closeMenu();
            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Navbar Scroll State
    |--------------------------------------------------------------------------
    */

    if (navbar) {

        const updateNavbar = () => {

            if (window.scrollY > 20) {

                navbar.classList.add('is-scrolled');

            } else {

                navbar.classList.remove('is-scrolled');

            }

        };

        updateNavbar();

        window.addEventListener(
            'scroll',
            updateNavbar,
            { passive: true }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Smooth Scroll
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('a[href^="#"]')
        .forEach((link) => {

            link.addEventListener('click', (event) => {

                const targetId =
                    link.getAttribute('href');

                if (
                    !targetId ||
                    targetId === '#'
                ) {
                    return;
                }

                const target =
                    document.querySelector(targetId);

                if (!target) {
                    return;
                }

                event.preventDefault();

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

            });

        });


    /*
    |--------------------------------------------------------------------------
    | Reveal Animation
    |--------------------------------------------------------------------------
    */

    const revealElements =
        document.querySelectorAll(
            '.ldx-home-service-card, ' +
            '.ldx-home-project-card, ' +
            '.ldx-home-news-card, ' +
            '.ldx-home-why-item, ' +
            '.ldx-home-stat'
        );


    if (
        revealElements.length &&
        'IntersectionObserver' in window
    ) {

        const observer =
            new IntersectionObserver(
                (entries, observerInstance) => {

                    entries.forEach((entry) => {

                        if (!entry.isIntersecting) {
                            return;
                        }

                        entry.target.classList.add(
                            'is-visible'
                        );

                        observerInstance.unobserve(
                            entry.target
                        );

                    });

                },
                {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                }
            );


        revealElements.forEach((element) => {

            element.classList.add(
                'ldx-public-reveal'
            );

            observer.observe(element);

        });

    }

});