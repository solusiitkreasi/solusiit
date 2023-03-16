<footer>
    <div class="container-fluid px-50">
        <div class="row align-items-center justify-content-center">
            <div class="col footer-col-left">
                <div class="left-footer">
                    Morita Mitra Bersama @ 2021 
                </div>
            </div>
            <div class="col-auto footer-col-right">
                <div class="right-footer">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" target="_blank" href="{{$setting->youtube}}">
                                <img width="50px" src="{{asset('frontend/images/footer-1.png')}}" alt="" class="img">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" target="_blank" href="{{ App\Models\Backend\Setting::generateWhatsappLink($setting->whatsapp_number)}}">
                                <img width="50px" src="{{asset('frontend/images/footer-2.png')}}" alt="" class="img">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" target="_blank" href="{{$setting->instagram}}">
                                <img width="50px" src="{{asset('frontend/images/footer-3.png')}}" alt="" class="img">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" target="_blank" href="{{$setting->facebook}}">
                                <img width="50px" src="{{asset('frontend/images/footer-4.png')}}" alt="" class="img">
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>