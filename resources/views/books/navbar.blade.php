<nav class="navbar navbar-expand-lg border-bottom shadow-sm">
    <div class="container-fluid d-flex align-items-center">
        <!-- <a class="navbar-brand fw-bold text-primary fs-4" href="#">University</a> -->
        <img style="opacity: 0.6;height:60px " src="{{ asset('images/ju.png') }}">

        <div class="d-flex align-items-center ms-4">
            <ul class="navbar-nav d-flex flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" style="color: var(--bs-emphasis-color) !important;" href="{{ route('books.index') }}">My Courses</a>
                </li>
                
                @if (Gate::allows('is_doctor') || Gate::allows('is_admin'))
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" style="color: var(--bs-emphasis-color) !important;" href="{{ route('users.students.show') }}">
                            Students
                        </a>
                    </li>
                @endif

                @if (Gate::allows('is_admin'))
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" style="color: var(--bs-emphasis-color) !important;" href="{{ route('users.teachers.show') }}">
                            Teachers
                        </a>
                    </li>
                @endif
            </ul>
        </div>


<div class="ms-auto d-flex align-items-center gap-3">
    <a href="{{ route('log.logout') }}" class="nav-link fw-bold" style="color: var(--bs-emphasis-color) !important;">Logout</a>
    
    <button id="themeToggle" class="btn border-0 p-0 shadow-none" type="button">
        <svg id="sunIcon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ffc107" class="bi bi-sun-fill" viewBox="0 0 16 16" style="display: none !important;">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
        </svg>
        <svg id="moonIcon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0d6efd" class="bi bi-moon-stars-fill" viewBox="0 0 16 16" style="display: none !important;">
            <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/>
        </svg>
    </button>
</div>
    </div>
</nav>

<script>
    (function() {
        const sun = document.getElementById('sunIcon');
        const moon = document.getElementById('moonIcon');
        const btn = document.getElementById('themeToggle');
        const html = document.documentElement;

        function updateUI(theme) {
            html.setAttribute('data-bs-theme', theme);
            localStorage.setItem('theme', theme);

            if (theme === 'dark') {
                sun.style.setProperty('display', 'block', 'important');
                moon.style.setProperty('display', 'none', 'important');
            } else {
                sun.style.setProperty('display', 'none', 'important');
                moon.style.setProperty('display', 'block', 'important');
            }
        }

        const saved = localStorage.getItem('theme') || 'light';
        updateUI(saved);

        btn.addEventListener('click', function() {
            const current = html.getAttribute('data-bs-theme');
            const target = current === 'dark' ? 'light' : 'dark';
            updateUI(target);
        });
    })();
</script>