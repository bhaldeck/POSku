<?php if ($this->session->has_userdata('success')) : ?>
  <div class="alert alert-success alert-dismissible" role="alert">
  <?= strip_tags(str_replace('</p>','',$this->session->flashdata('success'))); ?>
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if ($this->session->has_userdata('error')) : ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <?= strip_tags(str_replace('</p>','',$this->session->flashdata('error'))); ?>
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>