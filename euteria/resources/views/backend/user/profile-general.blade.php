<div class="tab-pane show active" id="general" role="tabpanel">    
    <div class="row">        
        <div class="col-lg-12">
            <strong>Nama</strong>
            <p>{{Auth::user()->name}}</p>
        </div>
        <div class="col-lg-12">
            <strong>Username</strong>
            <p>{{Auth::user()->username}}</p>
        </div>
        <div class="col-lg-12">
            <strong>Email</strong>
            <p>{{Auth::user()->email}}</p>
        </div>
        <div class="col-lg-12">
            <strong>Password</strong>
            <p>**********</p>
        </div>
    </div>
</div>