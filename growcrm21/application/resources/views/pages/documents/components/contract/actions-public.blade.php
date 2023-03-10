@if(config('visibility.page_rendering') =='view')
<div class="col-12">
    <div class="docs-heading-wrapper">

        <div class="row">
            <div class="col-4">
                <div class="logo">
                    <img src="{{ runtimeLogoLarge() }}" alt="homepage" />
                </div>
            </div>
            <div class="col-8">
                <div class="actions">
                    <!--print-->
                    <a class="btn btn-secondary btn-outline btn-sm"
                        href="{{ url('contracts/view/'.$document->doc_unique_id.'?render=print') }}" target="_blank">
                        <span><i class="sl-icon-printer"></i> @lang('lang.print_contract')</span> </a>

                    @if(config('visibility.contract_accept_decline_buttons'))
                    <!--decline-->
                    <button class="buttons-accept-decline btn btn-danger confirm-action-danger btn-sm"
                        data-confirm-title="@lang('lang.decline_contract')"
                        data-confirm-text="@lang('lang.confirm_decline_contract')" data-ajax-type="GET"
                        data-url="{{ url('contracts/'.$document->doc_unique_id.'/decline') }}">
                        @lang('lang.decline_contract') </button>

                    <!--accept-->
                    <button type="button"
                        class="buttons-accept-decline btn btn-success btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                        data-toggle="modal" 
                        data-target="#commonModal" 
                        data-progress-bar="hidden"
                        data-url="{{ url('contracts/'.$document->doc_unique_id.'/sign') }}"
                        data-loading-target="commonModalBody" 
                        data-modal-title="@lang('lang.accept_contract')"
                        data-action-form-id=""
                        data-modal-size="modal-lg"
                        data-action-url="{{ url('contracts/'.$document->doc_unique_id.'/accept') }}"
                        data-action-method="POST" 
                        data-action-ajax-class="js-ajax-ux-request">
                        @lang('lang.accept_contract')
                    </button>
                    @endif
                </div>
            </div>
        </div>


    </div>
</div>
@endif