<aside class="flex w-64 shrink-0 flex-col border-r border-[#23262c] bg-[#0b0d10] text-[#d8d5cd]">

    {{-- ================================================================
        BRAND
    ================================================================= --}}
    <div class="flex h-20 items-center border-b border-[#23262c] px-5">

        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">

            <div class="relative flex h-11 w-11 items-center justify-center rounded-md border border-[#3a3d44] bg-[#141619]">

                <span class="font-mono text-base font-semibold tracking-tight text-[#f2a93b]">
                    LD
                </span>

                <span class="absolute -bottom-1 -right-1 h-2 w-2 rounded-full bg-[#f2a93b] shadow-[0_0_6px_1px_rgba(242,169,59,0.65)]"></span>

            </div>

            <div class="leading-tight">

                <div class="text-sm font-semibold tracking-tight text-[#ece9e2]">
                    LD Elevator
                </div>

                <div class="mt-0.5 font-mono text-[10px] tracking-tight text-[#8a8d94]">
                    control panel
                </div>

            </div>

        </a>

    </div>


    {{-- ================================================================
        NAVIGATION
    ================================================================= --}}
    <nav class="flex-1 overflow-y-auto px-3 py-6">


        {{-- ============================================================
            OVERVIEW
        ============================================================= --}}
        <div class="mb-8">

            <p class="mb-2 px-3 text-[10px] font-medium text-[#5b5e65]">
                Overview
            </p>


            {{-- Dashboard --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="group relative flex items-center gap-3 rounded-md px-3 py-2.5 text-sm transition
                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-[#f2a93b]/10 font-medium text-[#f2a93b]'
                    : 'text-[#a3a6ad] hover:bg-[#15171b] hover:text-[#ece9e2]'
                }}"
            >

                @if(request()->routeIs('admin.dashboard'))

                    <span
                        class="absolute left-0 top-1/2 h-4 w-[3px] -translate-y-1/2 rounded-r bg-[#f2a93b]"
                    ></span>

                @endif


                <svg
                    class="h-[18px] w-[18px] shrink-0
                    {{ request()->routeIs('admin.dashboard')
                        ? 'text-[#f2a93b]'
                        : 'text-[#5b5e65] group-hover:text-[#a3a6ad]'
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
        <div class="mb-8">

            <p class="mb-2 px-3 text-[10px] font-medium text-[#5b5e65]">
                Content Management
            </p>


            <div class="relative ml-[19px] space-y-1 border-l border-[#23262c] pl-[15px]">


                {{-- ====================================================
                    ABOUT US
                ===================================================== --}}
                <details
                    class="group"
                    {{ request()->routeIs(
                        'admin.about.*',
                        'admin.about.certificates.*',
                        'admin.about.clients.*',
                        'admin.about.timeline.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="relative -ml-[34px] flex cursor-pointer list-none items-center justify-between rounded-md py-2.5 pl-3 pr-3 text-sm transition
                        {{ request()->routeIs(
                            'admin.about.*',
                            'admin.about.certificates.*',
                            'admin.about.clients.*',
                            'admin.about.timeline.*'
                        )
                            ? 'text-[#ece9e2]'
                            : 'text-[#a3a6ad] hover:bg-[#15171b] hover:text-[#ece9e2]'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.about.*',
                            'admin.about.certificates.*',
                            'admin.about.clients.*',
                            'admin.about.timeline.*'
                        ))

                            <span
                                class="absolute -left-[3px] top-1/2 h-2 w-2 -translate-y-1/2 rounded-full bg-[#f2a93b] shadow-[0_0_5px_1px_rgba(242,169,59,0.6)]"
                            ></span>

                        @endif


                        <div class="flex items-center gap-3">

                            {{-- Company Icon --}}
                            <svg
                                class="h-[18px] w-[18px]
                                {{
                                    request()->routeIs(
                                        'admin.about.*',
                                        'admin.about.certificates.*',
                                        'admin.about.clients.*',
                                        'admin.about.timeline.*'
                                    )
                                        ? 'text-[#f2a93b]'
                                        : 'text-[#5b5e65]'
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
                            class="h-3.5 w-3.5 text-[#5b5e65] transition-transform duration-200 group-open:rotate-180"
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



                    <div class="mt-1 space-y-0.5 pb-1">


                        {{-- =================================================
                            COMPANY PROFILE
                        ================================================== --}}
                        <a
                            href="{{ route('admin.about.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.about.index')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            Company Profile

                        </a>



                        {{-- =================================================
                            CERTIFICATES
                        ================================================== --}}
                        <a
                            href="{{ route('admin.about.certificates.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.about.certificates.*')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            Certificates

                        </a>



                        {{-- =================================================
                            CLIENTS
                        ================================================== --}}
                        <a
                            href="{{ route('admin.about.clients.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.about.clients.*')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            Clients

                        </a>



                        {{-- =================================================
                            COMPANY TIMELINE
                        ================================================== --}}
                        <a
                            href="{{ route('admin.about.timeline.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.about.timeline.*')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
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
                    class="group"
                    {{ request()->routeIs(
                        'admin.services.*',
                        'admin.service-categories.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="relative -ml-[34px] flex cursor-pointer list-none items-center justify-between rounded-md py-2.5 pl-3 pr-3 text-sm transition
                        {{ request()->routeIs(
                            'admin.services.*',
                            'admin.service-categories.*'
                        )
                            ? 'text-[#ece9e2]'
                            : 'text-[#a3a6ad] hover:bg-[#15171b] hover:text-[#ece9e2]'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.services.*',
                            'admin.service-categories.*'
                        ))

                            <span
                                class="absolute -left-[3px] top-1/2 h-2 w-2 -translate-y-1/2 rounded-full bg-[#f2a93b] shadow-[0_0_5px_1px_rgba(242,169,59,0.6)]"
                            ></span>

                        @endif


                        <div class="flex items-center gap-3">

                            <svg
                                class="h-[18px] w-[18px]
                                {{
                                    request()->routeIs(
                                        'admin.services.*',
                                        'admin.service-categories.*'
                                    )
                                        ? 'text-[#f2a93b]'
                                        : 'text-[#5b5e65]'
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
                            class="h-3.5 w-3.5 text-[#5b5e65] transition-transform duration-200 group-open:rotate-180"
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



                    <div class="mt-1 space-y-0.5 pb-1">


                        {{-- All Services --}}
                        <a
                            href="{{ route('admin.services.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.services.index')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            All Services

                        </a>


                        {{-- Categories --}}
                        <a
                            href="{{ route('admin.service-categories.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.service-categories.*')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            Categories

                        </a>


                        {{-- Add Service --}}
                        <a
                            href="{{ route('admin.services.create') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.services.create')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
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
                    class="group"
                    {{ request()->routeIs(
                        'admin.projects.*',
                        'admin.project-categories.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="relative -ml-[34px] flex cursor-pointer list-none items-center justify-between rounded-md py-2.5 pl-3 pr-3 text-sm transition
                        {{ request()->routeIs(
                            'admin.projects.*',
                            'admin.project-categories.*'
                        )
                            ? 'text-[#ece9e2]'
                            : 'text-[#a3a6ad] hover:bg-[#15171b] hover:text-[#ece9e2]'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.projects.*',
                            'admin.project-categories.*'
                        ))

                            <span
                                class="absolute -left-[3px] top-1/2 h-2 w-2 -translate-y-1/2 rounded-full bg-[#f2a93b] shadow-[0_0_5px_1px_rgba(242,169,59,0.6)]"
                            ></span>

                        @endif


                        <div class="flex items-center gap-3">

                            <svg
                                class="h-[18px] w-[18px]
                                {{
                                    request()->routeIs(
                                        'admin.projects.*',
                                        'admin.project-categories.*'
                                    )
                                        ? 'text-[#f2a93b]'
                                        : 'text-[#5b5e65]'
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
                            class="h-3.5 w-3.5 text-[#5b5e65] transition-transform duration-200 group-open:rotate-180"
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



                    <div class="mt-1 space-y-0.5 pb-1">


                        {{-- All Projects --}}
                        <a
                            href="{{ route('admin.projects.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.projects.index')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            All Projects

                        </a>


                        {{-- Categories --}}
                        <a
                            href="{{ route('admin.project-categories.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.project-categories.*')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            Categories

                        </a>


                        {{-- Add Project --}}
                        <a
                            href="{{ route('admin.projects.create') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.projects.create')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
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
                    class="group"
                    {{ request()->routeIs(
                        'admin.news.*',
                        'admin.news-categories.*'
                    ) ? 'open' : '' }}
                >

                    <summary
                        class="relative -ml-[34px] flex cursor-pointer list-none items-center justify-between rounded-md py-2.5 pl-3 pr-3 text-sm transition
                        {{ request()->routeIs(
                            'admin.news.*',
                            'admin.news-categories.*'
                        )
                            ? 'text-[#ece9e2]'
                            : 'text-[#a3a6ad] hover:bg-[#15171b] hover:text-[#ece9e2]'
                        }}"
                    >

                        @if(request()->routeIs(
                            'admin.news.*',
                            'admin.news-categories.*'
                        ))

                            <span
                                class="absolute -left-[3px] top-1/2 h-2 w-2 -translate-y-1/2 rounded-full bg-[#f2a93b] shadow-[0_0_5px_1px_rgba(242,169,59,0.6)]"
                            ></span>

                        @endif


                        <div class="flex items-center gap-3">

                            <svg
                                class="h-[18px] w-[18px]
                                {{
                                    request()->routeIs(
                                        'admin.news.*',
                                        'admin.news-categories.*'
                                    )
                                        ? 'text-[#f2a93b]'
                                        : 'text-[#5b5e65]'
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
                            class="h-3.5 w-3.5 text-[#5b5e65] transition-transform duration-200 group-open:rotate-180"
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



                    <div class="mt-1 space-y-0.5 pb-1">


                        {{-- All News --}}
                        <a
                            href="{{ route('admin.news.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.news.index')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            All News

                        </a>


                        {{-- Categories --}}
                        <a
                            href="{{ route('admin.news-categories.index') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.news-categories.*')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
                            }}"
                        >

                            Categories

                        </a>


                        {{-- Add News --}}
                        <a
                            href="{{ route('admin.news.create') }}"
                            class="block rounded-md py-1.5 pl-3 pr-3 text-xs transition
                            {{ request()->routeIs('admin.news.create')
                                ? 'font-medium text-[#f2a93b]'
                                : 'text-[#6f7278] hover:text-[#ece9e2]'
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
        <div>

            <p class="mb-2 px-3 text-[10px] font-medium text-[#5b5e65]">
                System
            </p>


            <div class="space-y-1">


              

                {{-- ====================================================
    QUOTE REQUESTS
===================================================== --}}

<a
    href="{{ route('admin.quote-requests.index') }}"
    class="group relative flex items-center gap-3 rounded-md px-3 py-2.5 text-sm transition
    {{ request()->routeIs('admin.quote-requests.*')
        ? 'bg-[#f2a93b]/10 font-medium text-[#f2a93b]'
        : 'text-[#a3a6ad] hover:bg-[#15171b] hover:text-[#ece9e2]'
    }}"
>

    @if(request()->routeIs('admin.quote-requests.*'))
        <span
            class="absolute left-0 top-1/2 h-4 w-[3px] -translate-y-1/2 rounded-r bg-[#f2a93b]"
        ></span>
    @endif

    <svg
        class="h-[18px] w-[18px] shrink-0
        {{ request()->routeIs('admin.quote-requests.*')
            ? 'text-[#f2a93b]'
            : 'text-[#5b5e65] group-hover:text-[#a3a6ad]'
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

        <a
    href="{{ route('admin.seo.index') }}"
    class="group relative flex items-center gap-3 rounded-md px-3 py-2.5 text-sm transition
    {{ request()->routeIs('admin.seo.*')
        ? 'bg-[#f2a93b]/10 font-medium text-[#f2a93b]'
        : 'text-[#a3a6ad] hover:bg-[#15171b] hover:text-[#ece9e2]'
    }}"
>

    @if(request()->routeIs('admin.seo.*'))

        <span
            class="absolute left-0 top-1/2 h-4 w-[3px] -translate-y-1/2 rounded-r bg-[#f2a93b]"
        ></span>

    @endif

    <svg
        class="h-5 w-5 shrink-0"
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

    <span>General SEO</span>

</a>



    {{-- ================================================================
        USER FOOTER
    ================================================================= --}}
    <div class="border-t border-[#23262c] bg-[#0b0d10] p-3">


        {{-- User Card --}}
        <div class="mb-2 flex items-center gap-3 rounded-md border border-[#23262c] bg-[#14161a] px-3 py-3">


            {{-- Avatar --}}
            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-md border border-[#3a3d44] bg-[#0b0d10] font-mono text-xs font-semibold text-[#f2a93b]"
            >

                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

            </div>


            {{-- User Info --}}
            <div class="min-w-0 flex-1">

                <p class="truncate text-xs font-medium text-[#ece9e2]">

                    {{ auth()->user()->name ?? 'Administrator' }}

                </p>


                <p class="mt-0.5 text-[10px] text-[#6f7278]">

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
                class="group flex w-full items-center gap-3 rounded-md px-3 py-2.5 text-left text-xs text-[#6f7278] transition hover:bg-[#3a1414] hover:text-[#e2857a]"
            >

                <svg
                    class="h-4 w-4 text-[#5b5e65] transition group-hover:text-[#e2857a]"
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