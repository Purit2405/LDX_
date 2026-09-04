
/*
|--------------------------------------------------------------------------
| LDX ELEVATOR - PUBLIC JAVASCRIPT
|--------------------------------------------------------------------------
| File:
| resources/js/public.js
|
| ใช้สำหรับหน้า Public Website
|--------------------------------------------------------------------------
*/

document.addEventListener("DOMContentLoaded", function () {

    "use strict";


    /* =========================================================
       01. NAVBAR
    ========================================================== */

    const navbar = document.querySelector(".public-site .navbar");

    if (navbar) {

        const handleNavbarScroll = function () {

            if (window.scrollY > 50) {
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
            }

        };

        window.addEventListener("scroll", handleNavbarScroll, {
            passive: true
        });

        handleNavbarScroll();
    }


    /* =========================================================
       02. MOBILE NAVBAR
    ========================================================== */

    const navbarCollapse = document.getElementById("publicNavbar");
    const navLinks = document.querySelectorAll(
        "#publicNavbar .nav-link"
    );

    if (navbarCollapse && navLinks.length > 0) {

        navLinks.forEach(function (link) {

            link.addEventListener("click", function () {

                /*
                 * Bootstrap 5 collapse
                 */
                if (
                    navbarCollapse.classList.contains("show") &&
                    typeof bootstrap !== "undefined"
                ) {

                    const collapse =
                        bootstrap.Collapse.getInstance(
                            navbarCollapse
                        ) ||
                        new bootstrap.Collapse(
                            navbarCollapse,
                            {
                                toggle: false
                            }
                        );

                    collapse.hide();
                }

            });

        });

    }


    /* =========================================================
       03. SMOOTH SCROLL
    ========================================================== */

    const smoothLinks = document.querySelectorAll(
        '.public-site a[href^="#"]'
    );

    smoothLinks.forEach(function (link) {

        link.addEventListener("click", function (event) {

            const targetId =
                this.getAttribute("href");

            if (
                !targetId ||
                targetId === "#" ||
                targetId.length <= 1
            ) {
                return;
            }

            const target =
                document.querySelector(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();

            const navbarHeight =
                navbar
                    ? navbar.offsetHeight
                    : 0;

            const targetPosition =
                target.getBoundingClientRect().top +
                window.pageYOffset -
                navbarHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: "smooth"
            });

        });

    });


    /* =========================================================
       04. ACTIVE NAVIGATION
    ========================================================== */

    const sections = document.querySelectorAll(
        ".public-site section[id]"
    );

    const sectionLinks = document.querySelectorAll(
        '.public-site .navbar .nav-link[href^="#"]'
    );

    if (
        sections.length > 0 &&
        sectionLinks.length > 0
    ) {

        const updateActiveNavigation = function () {

            const scrollPosition =
                window.scrollY +
                (navbar ? navbar.offsetHeight : 0) +
                100;

            let currentSection = "";

            sections.forEach(function (section) {

                const sectionTop =
                    section.offsetTop;

                const sectionHeight =
                    section.offsetHeight;

                if (
                    scrollPosition >= sectionTop &&
                    scrollPosition <
                    sectionTop + sectionHeight
                ) {

                    currentSection =
                        section.getAttribute("id");
                }

            });


            sectionLinks.forEach(function (link) {

                link.classList.remove("active");

                const href =
                    link.getAttribute("href");

                if (
                    currentSection &&
                    href === "#" + currentSection
                ) {

                    link.classList.add("active");
                }

            });

        };

        window.addEventListener(
            "scroll",
            updateActiveNavigation,
            {
                passive: true
            }
        );

        updateActiveNavigation();
    }


    /* =========================================================
       05. BOOTSTRAP CAROUSEL
    ========================================================== */

    const heroCarousel =
        document.getElementById("header-carousel");

    if (
        heroCarousel &&
        typeof bootstrap !== "undefined"
    ) {

        const carousel =
            bootstrap.Carousel.getOrCreateInstance(
                heroCarousel,
                {
                    interval: 6000,
                    ride: "carousel",
                    pause: "hover",
                    touch: true,
                    wrap: true
                }
            );

        /*
         * Start carousel
         */
        carousel.cycle();
    }


    /* =========================================================
       06. HERO ANIMATION
    ========================================================== */

    const heroItems =
        document.querySelectorAll(
            "#header-carousel .carousel-item"
        );

    const animateHero =
        function (slide) {

            if (!slide) {
                return;
            }

            const elements =
                slide.querySelectorAll(
                    ".carousel-caption p, " +
                    ".carousel-caption h1, " +
                    ".carousel-caption h2, " +
                    ".carousel-caption .fs-5, " +
                    ".carousel-caption .btn"
                );

            elements.forEach(function (element, index) {

                element.style.opacity = "0";

                element.style.transform =
                    "translateY(25px)";

                element.style.transition =
                    "opacity 0.6s ease, " +
                    "transform 0.6s ease";

                setTimeout(function () {

                    element.style.opacity = "1";

                    element.style.transform =
                        "translateY(0)";

                }, 120 + (index * 100));

            });

        };


    const activeHero =
        document.querySelector(
            "#header-carousel .carousel-item.active"
        );

    if (activeHero) {
        animateHero(activeHero);
    }


    if (
        heroCarousel &&
        typeof bootstrap !== "undefined"
    ) {

        heroCarousel.addEventListener(
            "slid.bs.carousel",
            function (event) {

                animateHero(
                    event.relatedTarget
                );

            }
        );

    }


    /* =========================================================
       07. BACK TO TOP
    ========================================================== */

    const backToTop =
        document.createElement("button");

    backToTop.type = "button";
    backToTop.className = "ldx-back-to-top";
    backToTop.setAttribute(
        "aria-label",
        "Back to top"
    );

    backToTop.innerHTML =
        '<i class="fa fa-arrow-up"></i>';

    document.body.appendChild(backToTop);


    const updateBackToTop =
        function () {

            if (window.scrollY > 500) {

                backToTop.classList.add("show");

            } else {

                backToTop.classList.remove("show");
            }

        };

    window.addEventListener(
        "scroll",
        updateBackToTop,
        {
            passive: true
        }
    );

    backToTop.addEventListener(
        "click",
        function () {

            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });

        }
    );

    updateBackToTop();


    /* =========================================================
       08. SCROLL REVEAL
    ========================================================== */

    const revealElements =
        document.querySelectorAll(
            ".service-card, " +
            ".project-card, " +
            ".feature-box, " +
            ".certificate-card, " +
            ".news-card, " +
            ".client-logo"
        );


    if (
        revealElements.length > 0 &&
        "IntersectionObserver" in window
    ) {

        revealElements.forEach(function (element) {

            element.classList.add(
                "ldx-scroll-reveal"
            );

        });


        const revealObserver =
            new IntersectionObserver(
                function (entries, observer) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.classList.add(
                                "ldx-scroll-visible"
                            );

                            observer.unobserve(
                                entry.target
                            );
                        }

                    });

                },
                {
                    threshold: 0.12,
                    rootMargin: "0px 0px -50px 0px"
                }
            );


        revealElements.forEach(function (element) {

            revealObserver.observe(element);

        });

    } else {

        revealElements.forEach(function (element) {

            element.classList.add(
                "ldx-scroll-visible"
            );

        });

    }


    /* =========================================================
       09. IMAGE ERROR FALLBACK
    ========================================================== */

    const images =
        document.querySelectorAll(
            ".public-site img"
        );

    images.forEach(function (image) {

        image.addEventListener(
            "error",
            function () {

                /*
                 * ป้องกัน infinite loop
                 */
                if (
                    image.dataset.fallbackApplied === "true"
                ) {
                    return;
                }

                image.dataset.fallbackApplied =
                    "true";

                /*
                 * ถ้าเป็น logo/client image
                 * ไม่ต้องเปลี่ยนเป็น placeholder
                 */
                if (
                    image.classList.contains(
                        "client-logo"
                    )
                ) {
                    image.style.display = "none";
                }

            }
        );

    });


    /* =========================================================
       10. DISABLE EMPTY LINKS
    ========================================================== */

    const emptyLinks =
        document.querySelectorAll(
            '.public-site a[href="#"]'
        );

    emptyLinks.forEach(function (link) {

        link.addEventListener(
            "click",
            function (event) {

                event.preventDefault();

            }
        );

    });


    /* =========================================================
       11. COUNTER ANIMATION
    ========================================================== */

    const statNumbers =
        document.querySelectorAll(
            ".stat-number"
        );


    const animateCounter =
        function (element) {

            if (
                element.dataset.animated === "true"
            ) {
                return;
            }

            const originalText =
                element.textContent.trim();

            /*
             * รองรับ:
             * 10+
             * 100+
             * 50+
             * 24/7
             */

            const match =
                originalText.match(
                    /^(\d+)(.*)$/
                );

            if (!match) {
                return;
            }

            const target =
                parseInt(
                    match[1],
                    10
                );

            const suffix =
                match[2] || "";

            if (isNaN(target)) {
                return;
            }

            element.dataset.animated =
                "true";

            const duration = 1200;

            const startTime =
                performance.now();


            const updateCounter =
                function (currentTime) {

                    const progress =
                        Math.min(
                            (
                                currentTime -
                                startTime
                            ) / duration,
                            1
                        );

                    /*
                     * Ease out
                     */
                    const eased =
                        1 -
                        Math.pow(
                            1 - progress,
                            3
                        );

                    const current =
                        Math.floor(
                            target * eased
                        );

                    element.textContent =
                        current + suffix;


                    if (progress < 1) {

                        requestAnimationFrame(
                            updateCounter
                        );

                    } else {

                        element.textContent =
                            originalText;
                    }

                };


            requestAnimationFrame(
                updateCounter
            );

        };


    if (
        statNumbers.length > 0 &&
        "IntersectionObserver" in window
    ) {

        const counterObserver =
            new IntersectionObserver(
                function (entries, observer) {

                    entries.forEach(function (entry) {

                        if (
                            entry.isIntersecting
                        ) {

                            animateCounter(
                                entry.target
                            );

                            observer.unobserve(
                                entry.target
                            );
                        }

                    });

                },
                {
                    threshold: 0.5
                }
            );


        statNumbers.forEach(function (element) {

            counterObserver.observe(element);

        });

    }


    /* =========================================================
       12. PROJECT HOVER
    ========================================================== */

    const projectCards =
        document.querySelectorAll(
            ".project-card"
        );

    projectCards.forEach(function (card) {

        card.addEventListener(
            "mouseenter",
            function () {

                card.classList.add(
                    "project-hover"
                );

            }
        );

        card.addEventListener(
            "mouseleave",
            function () {

                card.classList.remove(
                    "project-hover"
                );

            }
        );

    });


    /* =========================================================
       13. SERVICE HOVER
    ========================================================== */

    const serviceCards =
        document.querySelectorAll(
            ".service-card"
        );

    serviceCards.forEach(function (card) {

        card.addEventListener(
            "mouseenter",
            function () {

                card.classList.add(
                    "service-hover"
                );

            }
        );

        card.addEventListener(
            "mouseleave",
            function () {

                card.classList.remove(
                    "service-hover"
                );

            }
        );

    });


    /* =========================================================
       14. PREVENT DOUBLE SUBMIT
    ========================================================== */

    const forms =
        document.querySelectorAll(
            ".public-site form"
        );

    forms.forEach(function (form) {

        form.addEventListener(
            "submit",
            function () {

                const submitButtons =
                    form.querySelectorAll(
                        'button[type="submit"], ' +
                        'input[type="submit"]'
                    );

                submitButtons.forEach(
                    function (button) {

                        if (
                            button.dataset.submitted ===
                            "true"
                        ) {
                            return;
                        }

                        button.dataset.submitted =
                            "true";

                        button.disabled =
                            true;

                        /*
                         * เก็บข้อความเดิม
                         */
                        if (
                            button.tagName ===
                            "BUTTON"
                        ) {

                            button.dataset.originalText =
                                button.innerHTML;

                            button.innerHTML =
                                '<span class="spinner-border spinner-border-sm me-2" ' +
                                'role="status" aria-hidden="true"></span>' +
                                'Sending...';
                        }

                    }
                );

            }
        );

    });


    /* =========================================================
       15. ESC KEY
    ========================================================== */

    document.addEventListener(
        "keydown",
        function (event) {

            if (event.key === "Escape") {

                /*
                 * ปิด Mobile Navbar
                 */
                if (
                    navbarCollapse &&
                    navbarCollapse.classList.contains("show") &&
                    typeof bootstrap !== "undefined"
                ) {

                    const collapse =
                        bootstrap.Collapse.getInstance(
                            navbarCollapse
                        );

                    if (collapse) {
                        collapse.hide();
                    }

                }

            }

        }
    );


    /* =========================================================
       16. LAZY IMAGE LOADING
    ========================================================== */

    const lazyImages =
        document.querySelectorAll(
            ".public-site img"
        );

    lazyImages.forEach(function (image) {

        /*
         * ถ้ายังไม่ได้กำหนด loading
         * ให้ browser lazy-load image
         */
        if (
            !image.hasAttribute("loading") &&
            !image.closest("#header-carousel")
        ) {

            image.setAttribute(
                "loading",
                "lazy"
            );

        }

    });


    /* =========================================================
       17. CURRENT YEAR
    ========================================================== */

    const yearElements =
        document.querySelectorAll(
            "[data-current-year]"
        );

    if (yearElements.length > 0) {

        const currentYear =
            new Date().getFullYear();

        yearElements.forEach(
            function (element) {

                element.textContent =
                    currentYear;

            }
        );

    }


    /* =========================================================
       18. CONSOLE
    ========================================================== */

    console.log(
        "LDX Elevator Public Website initialized."
    );

});

