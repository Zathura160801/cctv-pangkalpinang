<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Add Google reCAPTCHA v2 to form in CodeIgniter 4</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

   <!-- reCAPTCHA JS-->
   <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>

   <div class="container">

      <div class="row">
         <div class="col-md-6 mt-5" style="margin: 0 auto;">

            <?php
            // Display Response
            if (session()->has('message')) {
            ?>
               <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                  <?= session()->getFlashdata('message') ?>
               </div>
            <?php
            }
            ?>

            <h2 class="mb-4">Contact US</h2>

            <?php $validation = \Config\Services::validation(); ?>

            <form method="post" action="<?= site_url('page/submitcontactus') ?>">

               <?= csrf_field(); ?>
               <div class="form-group mb-4">
                  <label class="control-label col-sm-2" for="name">Name:</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?= old('name') ?>">
                  </div>

                  <!-- Error -->
                  <?php if ($validation->getError('name')) { ?>
                     <div class='text-danger mt-2'>
                        * <?= $validation->getError('name'); ?>
                     </div>
                  <?php } ?>
               </div>
               <div class="form-group mb-4">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-10">
                     <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?= old('email') ?>">
                  </div>

                  <!-- Error -->
                  <?php if ($validation->getError('email')) { ?>
                     <div class='text-danger mt-2'>
                        * <?= $validation->getError('email'); ?>
                     </div>
                  <?php } ?>
               </div>
               <div class="form-group mb-4">
                  <label class="control-label col-sm-2" for="subject">Subject:</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="subject" placeholder="Enter Subject" name="subject" value="<?= old('subject') ?>">
                  </div>

                  <!-- Error -->
                  <?php if ($validation->getError('subject')) { ?>
                     <div class='text-danger mt-2'>
                        * <?= $validation->getError('subject'); ?>
                     </div>
                  <?php } ?>
               </div>
               <div class="form-group mb-4">
                  <label class="control-label col-sm-2" for="message">Message:</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" id="message" name="message"><?= old('message') ?></textarea>
                  </div>

                  <!-- Error -->
                  <?php if ($validation->getError('message')) { ?>
                     <div class='text-danger mt-2'>
                        * <?= $validation->getError('message'); ?>
                     </div>
                  <?php } ?>
               </div>
               <div class="form-group mb-4">
                  <!-- reCAPTCHA -->
                  <div class="g-recaptcha" data-sitekey="<?= getenv('GOOGLE_RECAPTCHA_SITEKEY') ?>"></div>

                  <!-- Error -->
                  <?php if ($validation->getError('g-recaptcha-response')) { ?>
                     <div class='text-danger mt-2'>
                        * <?= $validation->getError('g-recaptcha-response'); ?>
                     </div>
                  <?php } ?>

               </div>
               <div class="form-group ">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-info">Submit</button>
                  </div>
               </div>
            </form>
         </div>
      </div>

   </div>

</body>

</html>