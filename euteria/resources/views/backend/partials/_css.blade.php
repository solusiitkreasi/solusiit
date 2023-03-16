<link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">    
<link rel="stylesheet" href="{{asset('backend/css/adminlte.min.css')}}">
@stack('css-plugins')
<link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/flag-icon/css/flag-icon.min.css')}}" media="screen">	

<style>
    .btn-outline-danger {
        color: #dc3545;
        border-color: transparent !important;
    }

    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {    
    border-color: #ddd #ddd #fff;
    background-color: #3876a4;
    color: #ffffff;
    
}
.nav-tabs .nav-item {
    margin-bottom: -1px;
    margin-right: 5px;
}
.nav-tabs .nav-link {
    border: none;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    background: #eee;
    color: #555;
}

.nav-treeview > .nav-item > .nav-link {
    color: #c2c7d0;
    padding-left: 2.5rem;
}
.table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
  padding: 0.75rem;
}

table.table {
  border: 1px solid #dee2e6;
  margin-bottom: 1rem !important;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
}

.nav-sidebar .nav-link p {
    text-transform: capitalize;
}

/* rating */
.rating-stars {
  display: flex;
  flex-direction: row-reverse;
}

.rating-stars input {
  display: none;
}

.rating-stars label {
  font-size: 0;
  padding: 0 .125rem
}

.rating-stars label .fa {
  font-size: 1.25rem;
  color: #ccc;
}

.rating-stars input:checked ~ label .fa {
  color: #0186BD;
}
</style>
@stack('styles')