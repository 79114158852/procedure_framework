<div class="admin_menu__wrapper">
  <div class="admin_menu__logo">
    <img src="/assets/img/logo.png">
  </div>
  <div class="admin_menu__container">
    <?php template_position('menu', $page['modules']); ?>
  </div>
</div>
<div class="admin_content__header">
    <?php template_position('header', $page['modules']); ?>
    <a href="?logout">Выйти</a>
</div>
<div class="admin_content__wrapper">
    <?php template_position('content', $page['modules']); ?>
</div>