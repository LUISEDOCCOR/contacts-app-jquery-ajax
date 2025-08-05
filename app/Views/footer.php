</html>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/index.js"></script>
<script>
  const notyf = new Notyf()

  <?php if (!empty($_SESSION["error"])): ?>
    notyf.error("<?= $_SESSION["error"] ?>")
  <?php endif; ?>

  <?php if (!empty($_SESSION["success"])): ?>
    notyf.success("<?= $_SESSION["success"] ?>")
  <?php endif; ?>
</script>

<?php
unset($_SESSION["error"]);
unset($_SESSION["success"]);

