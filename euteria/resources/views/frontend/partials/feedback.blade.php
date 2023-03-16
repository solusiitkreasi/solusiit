<div class="feedback-float">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal">
        @lang('front.feedback')
    </a>
</div>

<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('index.feedback.store') }}" method="post" id="feedback-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('front.feedback_form')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="strong">
                                    @lang('front.feedback_title')
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-sm">@lang('front.fullname') <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-sm">@lang('email') <span style="color:red;">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-sm">@lang('front.company_name') <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="company" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label class="strong">
                                    @lang('front.satisfaction_title')
                                </label>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="form-group">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary active">
                                        <input type="radio" name="rate" id="option1" value="1" required> 
                                        @lang('front.not_satisfied')
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="rate" id="option2" value="2" required> 
                                        @lang('front.average')
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="rate" id="option3" value="3" required> 
                                        @lang('front.really_satisfied')
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label class="strong">
                                    @lang('front.satisfaction_object')
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#product" aria-expanded="true" aria-controls="product">
                                        @lang('front.products')
                                    </button>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#delivery" aria-expanded="true" aria-controls="delivery">
                                        @lang('front.delivery')
                                    </button>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#service" aria-expanded="false" aria-controls="service">
                                        @lang('front.service')
                                    </button>
                                </div>

                                <div class="collapse" id="product" style="">
                                    <div class="card card-body">
                                        <h6 class="card-title">@lang('front.products')</h6>
                                        <div class="card-text">
                                            <p style="margin-bottom: 0;">1. @lang('front.products_rating.1')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[product][1]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">2. @lang('front.products_rating.2')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[product][2]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">3. @lang('front.products_rating.3')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[product][3]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">4. @lang('front.products_rating.4')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[product][4]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div class="collapse" id="delivery" style="">
                                    <div class="card card-body">
                                        <h6 class="card-title">@lang('front.delivery')</h6>
                                        <div class="card-text">
                                            <p style="margin-bottom: 0;">1. @lang('front.delivery_rating.1')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[delivery][1]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">2. @lang('front.delivery_rating.2')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[delivery][2]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">3. @lang('front.delivery_rating.3')
                                            </p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[delivery][3]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">4. @lang('front.delivery_rating.4')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[delivery][4]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">5. @lang('front.delivery_rating.5')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[delivery][]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div class="collapse" id="service">
                                    <div class="card card-body">
                                        <h6 class="card-title">@lang('front.service')</h6>
                                        <div class="card-text">
                                            <p style="margin-bottom: 0;">1. @lang('front.service_rating.1')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][1]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">2. @lang('front.service_rating.2')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][2]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">3. @lang('front.service_rating.3')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][3]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">4. @lang('front.service_rating.4')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][4]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">5. @lang('front.service_rating.5')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][5]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">6. @lang('front.service_rating.6')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][6]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">7. @lang('front.service_rating.7')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][7]" />
                                                </div>
                                            </div>
                                            <p style="margin-bottom: 0;">8. @lang('front.service_rating.8')</p>
                                            <div class="container">
                                                <div class="row py-2">
                                                    <x-rating-star name="opinion[service][8]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('front.send')</button>
                </div>
            </div>
        </form>
    </div>
</div>