
<nav x-data="{ open: false }" class="bg-white border-b  border-gray-200 w-full">

    <style>
        :root {
            --navbar-height: 70px;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: var(--navbar-height);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: auto; /* Mueve los botones hacia la derecha */
        }

        .nav-link {
            color: var(--color-text);
            text-decoration: none;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link i {
            font-size: 1.2rem;
        }

        .nav-link:hover {
            background-color: var(--color-light);
            color: var(--color-primary-dark);
        }

        .nav-link.active {
            background-color: var(--color-primary);
            color: var(--color-white);
        }

        .logout-link {
            background-color: var(--color-danger);
            color: var(--color-white);
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .logout-link:hover {
            background-color: var(--color-danger-dark);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }

        .hamburger div {
            width: 30px;
            height: 3px;
            background-color: var(--color-text);
            border-radius: 2px;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .hamburger.open div:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger.open div:nth-child(2) {
            opacity: 0;
        }

        .hamburger.open div:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        .nav-dropdown {
            display: none;
            flex-direction: column;
            position: absolute;
            top: var(--navbar-height);
            right: 20px;
            background-color: var(--color-white);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow: hidden;
        }

        .nav-dropdown.show {
            display: flex;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hamburger {
                display: flex;
            }
        }
    </style>

    <div class="nav-container">
        <div class="navbar">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo.webp') }}" alt="Medical Logo" class="h-12">
            </a>

            <!-- Navigation Links -->
            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> Inicio
                </a>
                <a href="{{ route('patients.index') }}" class="nav-link {{ Route::is('patients.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-group"></i> Pacientes
                </a>
                <a href="{{ route('doctors.index') }}" class="nav-link {{ Route::is('doctors.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-doctor"></i> Especialistas
                </a>
                @if(Auth::user() && Auth::user()->role === 'admin')
                    <a href="{{ route('custom_register_form') }}" class="nav-link {{ Route::is('custom_register_form') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-plus"></i> Registrar
                    </a>
                    <a href="{{ route('specialties.index') }}" class="nav-link {{ Route::is('specialties.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-book-medical"></i> Especialidades
                    </a>
                    <a href="{{ route('admin_passwords.index') }}" class="nav-link {{ Route::is('admin_passwords.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-key"></i> Contraseñas
                    </a>
                @endif

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="logout-link">
                        <i class="fa-solid fa-right-from-bracket"></i> Salir
                    </button>
                </form>
            </div>

            <!-- Hamburger Menu -->
            <div class="hamburger" id="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <!-- Dropdown Menu for Mobile -->
        <div class="nav-dropdown" id="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i> Inicio
            </a>
            <a href="{{ route('patients.index') }}" class="nav-link {{ Route::is('patients.index') ? 'active' : '' }}">
                <i class="fa-solid fa-user-group"></i> Pacientes
            </a>
            <a href="{{ route('doctors.index') }}" class="nav-link {{ Route::is('doctors.index') ? 'active' : '' }}">
                <i class="fa-solid fa-user-doctor"></i> Especialistas
            </a>
            @if(Auth::user() && Auth::user()->role === 'admin')
                <a href="{{ route('custom_register_form') }}" class="nav-link">
                    <i class="fa-solid fa-user-plus"></i> Registrar
                </a>
                <a href="{{ route('specialties.index') }}" class="nav-link">
                    <i class="fa-solid fa-book-medical"></i> Especialidades
                </a>
                <a href="{{ route('admin_passwords.index') }}" class="nav-link">
                    <i class="fa-solid fa-key"></i> Contraseñas
                </a>
            @endif

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="logout-link">
                    <i class="fa-solid fa-right-from-bracket"></i> Salir
                </button>
            </form>
        </div>
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const dropdown = document.getElementById('dropdown');

        hamburger.addEventListener('click', () => {
            dropdown.classList.toggle('show');
            hamburger.classList.toggle('open');
        });
    </script>
</nav>
