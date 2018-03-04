@extends('layouts.master')

@section('shopNotification')

<?php
$msg = Session::get('message');
if (isset($msg)) {
    ?>                                            
    <script type="text/javascript">
        console.log("test");
        $(document).ready(function () {
            toastr.<?php echo $msg['type']?>("{{ $msg['title'] }}.{{ $msg['body'] }}");
        });
    </script>
    <?php

    Session::forget('message');
}
?>
@endsection