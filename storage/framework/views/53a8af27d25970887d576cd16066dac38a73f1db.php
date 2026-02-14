



<?php if($settings->whatsapp): ?>
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "<?php echo e($settings->whatsapp); ?>", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
            pre_filled_message: "Hello I am", // WhatsApp pre-filled message
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<?php endif; ?>























<?php /**PATH C:\xampp\htdocs\aa\resources\views/layouts/livechat.blade.php ENDPATH**/ ?>