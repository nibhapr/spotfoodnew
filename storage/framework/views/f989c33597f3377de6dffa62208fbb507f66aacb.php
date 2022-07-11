<footer class="footer pb-0 shadow">
  <div
    class="px-2"
    style="
      width: 100%;
      margin-right: auto;
      margin-left: auto;
      background-color: #444547;
    "
  >
    <div class="spot-footer py-2">
      <div class="col-md-12 d-sm-flex d-block justify-content-between">
        <div class="px-2 mb-4 padding-left: 0.99rem">
          <h6 class="font-weight-bold mr-2 text-white ckedit"><?php echo e(__('whatsapp.Contacts')); ?></h6>
          <div class="text-white">
            <!-- <p class="mb-0">GOTSHI Advertising & Marketing</p> -->
            <p class="mb-0 ckedit"><?php echo e(__('whatsapp.Email: info@gotshi.com')); ?></p>
            <p class="mb-0">Overkwartier 34, 5235JP, Den Bosch - Netherlands</p>
            <p class="mb-0 ckedit"><?php echo e(__('whatsapp.Company Registration number: 83286845')); ?></p>
          </div>
        </div>

        <div class="copyright align-self-end mb-2">
          <?php if(config('global.facebook') || config('global.instagram')): ?>
          <div class="d-flex mb-4">
            <?php if(config('global.facebook')): ?>
            <a
              class="mx-2"
              href="<?php echo e(config('global.facebook')); ?>"
              target="_blank"
              data-toggle="tooltip"
              title="Like us on Facebook"
            >
              <i class="fa fa-facebook-square fa-2x"></i>
            </a>
            <?php endif; ?> <?php if(config('global.instagram')): ?>
            <a
              class="mx-2"
              href="<?php echo e(config('global.instagram')); ?>"
              target="_blank"
              data-toggle="tooltip"
              title="Follow us on Instagram"
            >
              <i class="fa fa-instagram fa-2x"></i>
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <span class="text-white mr-4">&copy; <?php echo e(date('Y')); ?> </span>
          <a
            href=""
            class="text-white"
            target="_blank"
            style="text-decoration: none; color: black; margin-left: 5px"
            ><?php echo e(config('app.name')); ?></a
          >.
        </div>
      </div>
    </div>
  </div>
</footer>
<?php /**PATH /home/u774496545/domains/gotshi.com/public_html/resources/views/social/partials/footer.blade.php ENDPATH**/ ?>