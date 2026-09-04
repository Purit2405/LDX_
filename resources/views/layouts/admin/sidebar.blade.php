<aside class="ldx-admin-sidebar">

    {{-- ================================================================
        BRAND
    ================================================================= --}}

    <div class="ldx-sidebar-brand">

        <a
            href="{{ route('admin.dashboard') }}"
            class="ldx-sidebar-brand-link"
        >

            <div class="ldx-sidebar-brand-mark">

                <span class="ldx-sidebar-brand-initial">
                    LD
                </span>

                <span class="ldx-sidebar-brand-status"></span>

            </div>

            <div class="ldx-sidebar-brand-text">

                <div class="ldx-sidebar-brand-name">
                    LD Elevator
                </div>

                <div class="ldx-sidebar-brand-subtitle">
                    control panel
                </div>

            </div>

        </a>

    </div>


    {{-- ================================================================
        NAVIGATION
    ================================================================= --}}

    <nav class="ldx-sidebar-nav">


        {{-- ============================================================
            OVERVIEW
        ============================================================= --}}

        <div class="ldx-sidebar-section">

            <p class="ldx-sidebar-section-title">
                Overview
            </p>


            {{-- Dashboard --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="ldx-sidebar-menu-item
                {{ request()->routeIs('admin.dashboard')
                    ? 'ldx-sidebar-menu-item-active'
                    : 'ldx-sidebar-menu-item-inactive'
                }}"
            >

                @if(request()->routeIs('admin.dashboard'))

                    <span class="ldx-sidebar-active-bar"></span>

                @endif


                <svg
                    class="ldx-sidebar-icon
                    {{ request()->routeIs('admin.dashboard')
                        ? 'ldx-sidebar-icon-active'
                        : 'ldx-sidebar-icon-inactive'
                    }}"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.75"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 12l9-9 9 9M5 10v10h14V10M9 21v-6h6v6"
                    />

                </svg>


                <span>
                    Dashboard
                </span>

            </a>

        </div>



        {{-- ============================================================
            CONTENT MANAGEMENT
        ============================================================= --}}

        <div class="ldx-sidebar-section">

            <p class="ldx-sidebar-section-title">
                Content Management
            </p>


            <div class="ldx-sidebar-subnav-group">


                {{-- ====================================================
                    ABOUT US
                ===================================================== --}}

                <details
                    class="ldx-sidebar-details"
                    {{ request()->routeIs(
                        'admin.about.*',
                        'admin.about.certificates.*',
                        'admin.about.clients.*',
                        'admin.about.timeline.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="ldx-sidebar-summary
                        {{ request()->routeIs(
                            'admin.about.*',
                            'admin.about.certificates.*',
                            'admin.about.clients.*',
                            'admin.about.timeline.*'
                        )
                            ? 'ldx-sidebar-summary-active'
                            : 'ldx-sidebar-summary-inactive'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.about.*',
                            'admin.about.certificates.*',
                            'admin.about.clients.*',
                            'admin.about.timeline.*'
                        ))

                            <span class="ldx-sidebar-subnav-active-dot"></span>

                        @endif


                        <div class="ldx-sidebar-summary-content">

                            {{-- Company Icon --}}

                            <svg
                                class="ldx-sidebar-icon
                                {{
                                    request()->routeIs(
                                        'admin.about.*',
                                        'admin.about.certificates.*',
                                        'admin.about.clients.*',
                                        'admin.about.timeline.*'
                                    )
                                        ? 'ldx-sidebar-icon-active'
                                        : 'ldx-sidebar-icon-inactive'
                                }}"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.75"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 21h18M5 21V5a2 2 0 012-2h6a2 2 0 012 2v16M15 21V9a2 2 0 012-2h1a2 2 0 012 2v12M8 7h2M8 11h2M8 15h2M17 11h1M17 15h1"
                                />

                            </svg>


                            <span>
                                About Us
                            </span>

                        </div>


                        <svg
                            class="ldx-sidebar-chevron"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />

                        </svg>

                    </summary>


                    <div class="ldx-sidebar-subnav">

                        {{-- Company Profile --}}

                        <a
                            href="{{ route('admin.about.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.about.index')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Company Profile
                        </a>


                        {{-- Certificates --}}

                        <a
                            href="{{ route('admin.about.certificates.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.about.certificates.*')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Certificates
                        </a>


                        {{-- Clients --}}

                        <a
                            href="{{ route('admin.about.clients.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.about.clients.*')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Clients
                        </a>


                        {{-- Company Timeline --}}

                        <a
                            href="{{ route('admin.about.timeline.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.about.timeline.*')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Company Timeline
                        </a>

                    </div>

                </details>



                {{-- ====================================================
                    SERVICES
                ===================================================== --}}

                <details
                    class="ldx-sidebar-details"
                    {{ request()->routeIs(
                        'admin.services.*',
                        'admin.service-categories.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="ldx-sidebar-summary
                        {{ request()->routeIs(
                            'admin.services.*',
                            'admin.service-categories.*'
                        )
                            ? 'ldx-sidebar-summary-active'
                            : 'ldx-sidebar-summary-inactive'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.services.*',
                            'admin.service-categories.*'
                        ))

                            <span class="ldx-sidebar-subnav-active-dot"></span>

                        @endif


                        <div class="ldx-sidebar-summary-content">

                            <svg
                                class="ldx-sidebar-icon
                                {{
                                    request()->routeIs(
                                        'admin.services.*',
                                        'admin.service-categories.*'
                                    )
                                        ? 'ldx-sidebar-icon-active'
                                        : 'ldx-sidebar-icon-inactive'
                                }}"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.75"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M20 7h-4V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2H4a2 2 0 00-2 2v9a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"
                                />

                            </svg>


                            <span>
                                Services
                            </span>

                        </div>


                        <svg
                            class="ldx-sidebar-chevron"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />

                        </svg>

                    </summary>


                    <div class="ldx-sidebar-subnav">

                        {{-- All Services --}}

                        <a
                            href="{{ route('admin.services.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.services.index')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            All Services
                        </a>


                        {{-- Categories --}}

                        <a
                            href="{{ route('admin.service-categories.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.service-categories.*')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Categories
                        </a>


                        {{-- Add Service --}}

                        <a
                            href="{{ route('admin.services.create') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.services.create')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Add Service
                        </a>

                    </div>

                </details>



                {{-- ====================================================
                    PROJECTS
                ===================================================== --}}

                <details
                    class="ldx-sidebar-details"
                    {{ request()->routeIs(
                        'admin.projects.*',
                        'admin.project-categories.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="ldx-sidebar-summary
                        {{ request()->routeIs(
                            'admin.projects.*',
                            'admin.project-categories.*'
                        )
                            ? 'ldx-sidebar-summary-active'
                            : 'ldx-sidebar-summary-inactive'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.projects.*',
                            'admin.project-categories.*'
                        ))

                            <span class="ldx-sidebar-subnav-active-dot"></span>

                        @endif


                        <div class="ldx-sidebar-summary-content">

                            <svg
                                class="ldx-sidebar-icon
                                {{
                                    request()->routeIs(
                                        'admin.projects.*',
                                        'admin.project-categories.*'
                                    )
                                        ? 'ldx-sidebar-icon-active'
                                        : 'ldx-sidebar-icon-inactive'
                                }}"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.75"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                                />

                            </svg>


                            <span>
                                Projects
                            </span>

                        </div>


                        <svg
                            class="ldx-sidebar-chevron"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />

                        </svg>

                    </summary>


                    <div class="ldx-sidebar-subnav">

                        {{-- All Projects --}}

                        <a
                            href="{{ route('admin.projects.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.projects.index')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            All Projects
                        </a>


                        {{-- Categories --}}

                        <a
                            href="{{ route('admin.project-categories.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.project-categories.*')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Categories
                        </a>


                        {{-- Add Project --}}

                        <a
                            href="{{ route('admin.projects.create') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.projects.create')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Add Project
                        </a>

                    </div>

                </details>



                {{-- ====================================================
                    NEWS
                ===================================================== --}}

                <details
                    class="ldx-sidebar-details"
                    {{ request()->routeIs(
                        'admin.news.*',
                        'admin.news-categories.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="ldx-sidebar-summary
                        {{ request()->routeIs(
                            'admin.news.*',
                            'admin.news-categories.*'
                        )
                            ? 'ldx-sidebar-summary-active'
                            : 'ldx-sidebar-summary-inactive'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.news.*',
                            'admin.news-categories.*'
                        ))

                            <span class="ldx-sidebar-subnav-active-dot"></span>

                        @endif


                        <div class="ldx-sidebar-summary-content">

                            <svg
                                class="ldx-sidebar-icon
                                {{
                                    request()->routeIs(
                                        'admin.news.*',
                                        'admin.news-categories.*'
                                    )
                                        ? 'ldx-sidebar-icon-active'
                                        : 'ldx-sidebar-icon-inactive'
                                }}"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.75"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2M7 8h6M7 12h6M7 16h4"
                                />

                            </svg>


                            <span>
                                News
                            </span>

                        </div>


                        <svg
                            class="ldx-sidebar-chevron"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />

                        </svg>

                    </summary>


                    <div class="ldx-sidebar-subnav">

                        {{-- All News --}}

                        <a
                            href="{{ route('admin.news.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.news.index')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            All News
                        </a>


                        {{-- Categories --}}

                        <a
                            href="{{ route('admin.news-categories.index') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.news-categories.*')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Categories
                        </a>


                        {{-- Add News --}}

                        <a
                            href="{{ route('admin.news.create') }}"
                            class="ldx-sidebar-subnav-item
                            {{ request()->routeIs('admin.news.create')
                                ? 'ldx-sidebar-subnav-item-active'
                                : 'ldx-sidebar-subnav-item-inactive'
                            }}"
                        >
                            Add News
                        </a>

                    </div>

                </details>

            </div>

        </div>



        {{-- ============================================================
            SYSTEM
        ============================================================= --}}

        <div class="ldx-sidebar-section">

            <p class="ldx-sidebar-section-title">
                System
            </p>


            <div class="ldx-sidebar-system-menu">


                {{-- ====================================================
                    QUOTE REQUESTS
                ===================================================== --}}

                <a
                    href="{{ route('admin.quote-requests.index') }}"
                    class="ldx-sidebar-menu-item
                    {{ request()->routeIs('admin.quote-requests.*')
                        ? 'ldx-sidebar-menu-item-active'
                        : 'ldx-sidebar-menu-item-inactive'
                    }}"
                >

                    @if(request()->routeIs('admin.quote-requests.*'))

                        <span class="ldx-sidebar-active-bar"></span>

                    @endif


                    <svg
                        class="ldx-sidebar-icon
                        {{ request()->routeIs('admin.quote-requests.*')
                            ? 'ldx-sidebar-icon-active'
                            : 'ldx-sidebar-icon-inactive'
                        }}"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.75"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 11.5a8.38 8.38 0 01-.9 3.8
                               8.5 8.5 0 01-7.6 4.7
                               8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7
                               A8.38 8.38 0 014 11.5
                               8.5 8.5 0 1112.5 20"
                        />

                    </svg>

                    <span>
                        Quote Requests
                    </span>

                </a>

            </div>

        </div>


        {{-- ============================================================
            SEO
        ============================================================= --}}

        <a
            href="{{ route('admin.seo.index') }}"
            class="ldx-sidebar-menu-item
            {{ request()->routeIs('admin.seo.*')
                ? 'ldx-sidebar-menu-item-active'
                : 'ldx-sidebar-menu-item-inactive'
            }}"
        >

            @if(request()->routeIs('admin.seo.*'))

                <span class="ldx-sidebar-active-bar"></span>

            @endif


            <svg
                class="ldx-sidebar-icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M12 3v18M3 12h18"
                />

            </svg>

            <span>
                General SEO
            </span>

        </a>



    {{-- ================================================================
        USER FOOTER
    ================================================================= --}}

    <div class="ldx-sidebar-footer">


        {{-- User Card --}}

        <div class="ldx-sidebar-user-card">


            {{-- Avatar --}}

            <div class="ldx-sidebar-user-avatar">

                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

            </div>


            {{-- User Info --}}

            <div class="ldx-sidebar-user-info">

                <p class="ldx-sidebar-user-name">

                    {{ auth()->user()->name ?? 'Administrator' }}

                </p>


                <p class="ldx-sidebar-user-role">

                    Administrator

                </p>

            </div>

        </div>



        {{-- ============================================================
            LOGOUT
        ============================================================= --}}

        <form
            method="POST"
            action="{{ route('admin.logout') }}"
        >

            @csrf


            <button
                type="submit"
                class="ldx-sidebar-logout"
            >

                <svg
                    class="ldx-sidebar-logout-icon"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.75"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                    />

                </svg>


                <span>
                    Sign out
                </span>

            </button>

        </form>

    </div>

</aside>
