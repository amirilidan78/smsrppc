<script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
<div class="g-recaptcha" style="width: 100% !important" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
<x-errors.inputError  errorType="g-recaptcha-response"/>
