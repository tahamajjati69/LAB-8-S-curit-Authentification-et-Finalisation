<nav>
  <ul>
    <li>Gestion Étudiants</li>
  </ul>
  <ul>
    <li><a href="/etudiants">Liste</a></li>
    <li><a href="/etudiants/create">Ajouter</a></li>
    <?php if (!empty($_SESSION['admin_id'])): ?>
      <li>
        <form method="post" action="/logout" style="display:inline">
          <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
          <button type="submit" class="secondary">Se déconnecter</button>
        </form>
      </li>
    <?php else: ?>
      <li><a href="/login">Se connecter</a></li>
    <?php endif; ?>
  </ul>
</nav>