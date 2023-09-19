
<div class="col-md-6 txt_field_white">
    <label for="lazy-select">To</label>
    <div class="form-group <?php echo e($errors->has('to') ? 'has-error' : ''); ?>">
        <!-- <input class="form-control" name="to" type="text" id="to" value="<?php echo e($sentemail->to??''); ?>" > -->
         <select id="lazy-select" multiple  name="to[]" class="form-control selectpicker" data-size="5"  data-live-search="true" data-live-search-style="contains" title='Select users'>
        </select>
        <?php echo $errors->first('to', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="col-md-6 txt_field_white">
    <label for="from">From</label>
<div class="form-group <?php echo e($errors->has('from') ? 'has-error' : ''); ?>">
        
        <input class="form-control" name="from" type="text" id="from" value="contact@airwavedefender.com" readonly >
        <?php echo $errors->first('from', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="col-md-6 txt_field_white">
    <label for="subject">Subject</label>
<div class="form-group <?php echo e($errors->has('subject') ? 'has-error' : ''); ?>">
        <input class="form-control" name="subject" type="text" id="subject" value="<?php echo e($sentemail->subject??''); ?>" required>
        <?php echo $errors->first('subject', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="col-md-6 txt_field_white">
    <label for="email_type">Type</label>
<div class="form-group <?php echo e($errors->has('email_type') ? 'has-error' : ''); ?>">
        <!-- <input class="form-control" name="email_type" type="text" id="email_type" value="<?php echo e($sentemail->email_type??''); ?>" required> -->
        <select name="email_type" id="email_type" class="form-control" required>
            <option value="">Select Email Type</option>
            <option value="1">Raw</option>
            <option value="2">Html</option>
        </select>
        <?php echo $errors->first('email_type', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="col-md-12 txt_field_white">
    <label for="body">Message</label>
<div class="form-group <?php echo e($errors->has('body') ? 'has-error' : ''); ?>">
        <textarea class="ck-editor form-control" rows="5" name="body" type="textarea" id="body" required><?php echo e($sentemail->body??''); ?></textarea>
        <?php echo $errors->first('body', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="col-md-4">
<div class="form-group">
        <input class="btn btn_primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>
<script>
  CKEDITOR.replace('body');
</script>
<script>
// Variables to keep track of the current offset and limit
var offset = 0;
var limit = 100;

// Function to load the next set of options using AJAX
function loadOptions() {
  // Make an AJAX request to retrieve the options
  $.ajax({
    url: "<?php echo e(url('/get-email-options')); ?>",
    data: {"_token": "<?php echo e(csrf_token()); ?>",offset: offset, limit: limit},
    success: function(options) {
      // Add the options to the select dropdown
      $("#lazy-select").append(options);
      $("#lazy-select").selectpicker('refresh');
           $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: 'List has been Append',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
      // Increment the offset
      offset += limit;
    }
  });
}
// Load the first set of options when the page loads
loadOptions();
// Bind an event handler to the select dropdown
$("#lazy-select").on("change", function() {
  // If the user has scrolled to the bottom of the dropdown, load the next set
  if ($("#lazy-select option").last().is(":selected")) {
    loadOptions();
  }
});
// Bind an event handler to the scroll event on the document
// $(document).on("scroll.lazyload", function() {
//   // If the user has scrolled to the bottom of the dropdown, load the next set
//   if ($("#lazy-select").scrollTop() + $("#lazy-select").outerHeight() >= $("#lazy-select").prop("scrollHeight")) {
//     loadOptions();
//   }
// });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/sentEmail/sent-email/form.blade.php ENDPATH**/ ?>