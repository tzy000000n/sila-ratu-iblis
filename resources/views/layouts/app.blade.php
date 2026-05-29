<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexyra Learn - Cybersecurity Lab</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Phosphor Icons or similar could be used, but we'll use SVG or Lucide via CDN for icons if needed -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    @yield('content')

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
