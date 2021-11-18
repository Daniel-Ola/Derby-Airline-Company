<?php
if ($message = Session::get('message')) {
?>
<div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <i data-feather="x" class="w-4 h-4"></i>
    </button>
</div>
<?php
}
?>
