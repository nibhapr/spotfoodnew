
<!-- footer-->
<div id='footer'>
    <div class='packer'>
        <ul id="footer-pages" class="nav nav-footer justify-content-end">
            <li v-for="page in pages" class="nav-item" v-cloak>
                <a :href="'/pages/' + page.id" class="nav-link">{{ page.title }}</a>
            </li>
        </ul>
    </div>
    <div class='copyright'>
        <div class='packer'>
            <div class='package'> &copy; <?php echo e(date('Y')); ?> <a href="" target="_blank"><?php echo e(config('global.site_name', 'mResto')); ?></a>.</div>
        </div>
    </div>
</div><?php /**PATH /home/u774496545/domains/gotshi.com/public_html/modules/ElegantTemplate/Providers/../Resources/views/templates/footer.blade.php ENDPATH**/ ?>