@if (Session::has('notifier.notice'))
    <script type="text/javascript">
        $( document ).ready(function() {
            new PNotify({!! Session::get('notifier.notice') !!});
        });
    </script>
@endif
