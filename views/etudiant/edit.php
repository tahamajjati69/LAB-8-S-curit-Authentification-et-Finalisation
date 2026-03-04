<?php 
/** @var array $e */
/** @var array $filieres */
/** @var array $errors */
?>

<h2>Éditer l’étudiant #<?php echo (int)$e['id']; ?></h2>

<form method="post" action="/etudiants/<?php echo (int)$e['id']; ?>/update">

  <label>CNE
    <input name="cne" value="<?php echo htmlspecialchars($e['cne'], ENT_QUOTES, 'UTF-8'); ?>" required>
  </label>
  <?php if (!empty($errors['cne'])): ?>
      <small class="error"><?php echo htmlspecialchars($errors['cne'], ENT_QUOTES, 'UTF-8'); ?></small>
  <?php endif; ?>


  <label>Nom
    <input name="nom" value="<?php echo htmlspecialchars($e['nom'], ENT_QUOTES, 'UTF-8'); ?>" required>
  </label>
  <?php if (!empty($errors['nom'])): ?>
      <small class="error"><?php echo htmlspecialchars($errors['nom'], ENT_QUOTES, 'UTF-8'); ?></small>
  <?php endif; ?>


  <label>Prénom
    <input name="prenom" value="<?php echo htmlspecialchars($e['prenom'], ENT_QUOTES, 'UTF-8'); ?>" required>
  </label>
  <?php if (!empty($errors['prenom'])): ?>
      <small class="error"><?php echo htmlspecialchars($errors['prenom'], ENT_QUOTES, 'UTF-8'); ?></small>
  <?php endif; ?>


  <label>Email
    <input type="email" name="email" value="<?php echo htmlspecialchars($e['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
  </label>
  <?php if (!empty($errors['email'])): ?>
      <small class="error"><?php echo htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8'); ?></small>
  <?php endif; ?>


  <label>Filière
    <select name="filiere_id" required>
      <?php foreach ($filieres as $f): ?>
        <option value="<?php echo (int)$f['id']; ?>"
        <?php echo ((int)$e['filiere_id'] === (int)$f['id']) ? 'selected' : ''; ?>>
          <?php echo htmlspecialchars($f['code'].' — '.$f['libelle'], ENT_QUOTES, 'UTF-8'); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label>

  <?php if (!empty($errors['filiere_id'])): ?>
      <small class="error"><?php echo htmlspecialchars($errors['filiere_id'], ENT_QUOTES, 'UTF-8'); ?></small>
  <?php endif; ?>

  <button type="submit">Enregistrer</button>
  <a role="button" class="secondary" href="/etudiants/<?php echo (int)$e['id']; ?>">Annuler</a>

</form>