@if(!config('settings.hide_cod'))
    <div class="text-center" id="totalSubmitCOD"  style="display: {{ config('settings.default_payment')=="cod"&&!config('settings.hide_cod')?"block":"none"}};" >
        <button
            v-if="totalPrice"
            type="button"
            class="btn d-flex w-50 text-center mb-4 justify-content-center btn-whatsapp waves-effect waves-light"
            onclick="document.getElementById('order-form').submit();    "
        >{{ __('Place order') }}</button>
    </div>
@endif
