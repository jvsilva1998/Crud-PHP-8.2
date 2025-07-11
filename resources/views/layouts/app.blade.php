<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin - Produtos')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adicionando o Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            margin: 0;
            padding-top: 56px;
            /* navbar height */
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 56px;
            /* navbar height */
            left: 0;
            background: #343a40;
            padding-top: 1rem;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            z-index: 1030;
        }

        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 12px 24px;
            font-weight: 500;
            border-left: 4px solid transparent;
            transition: background-color 0.2s, border-color 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
            border-left-color: #0d6efd;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 220px;
            padding: 2rem;
            min-height: calc(100vh - 56px - 56px);
            /* full height minus navbar and footer */
            background: white;
            box-shadow: 0 0 10px rgb(0 0 0 / 0.05);
            border-radius: 8px;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        /* FOOTER */
        footer {
            background-color: #fff;
            padding: 1rem 2rem;
            text-align: center;
            font-size: 0.9rem;
            border-top: 1px solid #dee2e6;
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-left: 220px;
            box-shadow: 0 -1px 5px rgb(0 0 0 / 0.05);
            z-index: 1020;
        }

        /* TOASTS */
        .toast-container {
            position: fixed;
            top: 70px;
            right: 1rem;
            z-index: 1100;
            max-width: 320px;
        }

        /* Customizando o estilo da paginação */
        .pagination {
            display: flex;
            list-style: none;
            padding-left: 0;
            border-radius: 0.25rem;
        }

        .pagination .page-item {
            margin: 0;
        }

        .pagination .page-link {
            color: #007bff;
            border: 1px solid #ddd;
            padding: 5px 10px;
            font-size: 14px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .pagination .page-link:hover {
            background-color: #0056b3;
            color: white;
            border-color: #0056b3;
        }

        .pagination .active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination .disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #f8f9fa;
            border-color: #ddd;
        }


        /* RESPONSIVO */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1040;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem 1rem;
                min-height: auto;
                border-radius: 0;
                box-shadow: none;
                margin-top: 56px;
                margin-bottom: 56px;
            }

            footer {
                margin-left: 0;
                position: static;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('produtos.index') }}">CRUD</a>
            <button class="navbar-toggler" type="button" id="sidebarToggle" aria-label="Toggle sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <nav class="sidebar d-md-block" id="sidebarMenu" aria-label="Sidebar navigation">
        <a href="{{ route('produtos.index') }}" class="{{ request()->is('produtos') ? 'active' : '' }}">📦 Listar
            Produtos</a>
        <a href="{{ route('produtos.create') }}" class="{{ request()->is('produtos/create') ? 'active' : '' }}">➕ Novo
            Produto</a>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- TOASTS -->
    <div class="toast-container">
        @if (session('success'))
            <div class="toast align-items-center text-white bg-success border-0 show" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">{{ session('success') }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Fechar"></button>
                </div>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="toast align-items-center text-white bg-danger border-0 show" role="alert"
                    aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">{{ $error }}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Fechar"></button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- FOOTER -->
    <footer>
        &copy; {{ date('Y') }} - Laravel CRUD.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toast auto hide
        setTimeout(() => {
            document.querySelectorAll('.toast').forEach(toast => {
                new bootstrap.Toast(toast).hide();
            });
        }, 4000);

        // Sidebar toggle for mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarMenu = document.getElementById('sidebarMenu');

        sidebarToggle.addEventListener('click', () => {
            sidebarMenu.classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 992) {
                if (!sidebarMenu.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebarMenu.classList.remove('show');
                }
            }
        });
    </script>
</body>

</html>
