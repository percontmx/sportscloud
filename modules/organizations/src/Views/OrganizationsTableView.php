<!doctype html>
<html lang="es">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SportsCloud - Organizaciones</title>

  </head>
  <body>
    <h1>SportsCloud - Organizaciones</h1>

    <main class="container">
        <h2>Lista de Organizaciones</h2>
    
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Nombre Corto</th>
                <th>Creado Por</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!isset($organizations) || empty($organizations)): ?>
                <tr>
                    <td colspan="4">No hay organizaciones disponibles.</td>
                </tr>
            <?php else: ?>
            <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?= esc($organization->id) ?></td>
                <td><?= esc($organization->full_name) ?></td>
                <td><?= esc($organization->short_name) ?></td>
                <td><?= esc($organization->created_by) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </main>
  </body>
</html>