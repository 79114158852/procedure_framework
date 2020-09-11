</div>
<?php //message_add('Memory peak usege: '.number_format(memory_get_peak_usage() / 1048576, 2).' mb / '.'Memory usege: '.number_format(memory_get_usage() / 1048576, 2).' mb', 'warning'); ?>
<div class="messages"><?php message_show(); ?></div>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/sorter.js"></script>
<script src="/assets/js/cpn.js?v=<?php echo time(); ?>"></script>
</body>
</html>