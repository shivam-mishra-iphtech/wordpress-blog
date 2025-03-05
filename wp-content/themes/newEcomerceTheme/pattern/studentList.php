<?php
 $userData = do_shortcode('[custom_form_data]');
 $userData1 = do_shortcode('[custom_form]');
?>
<?php?>
<section style="display: flex; justify-content: center; align-items: center;">
        <style>
          .formData {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 10px;
          }
        </style>
        <div class="m-3">
          <div class="formData"><?php echo $userData; ?></div>
          <div class="formData"><?php echo $userData1; ?></div>
        </div>
</section>
