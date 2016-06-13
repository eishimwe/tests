
<script>

var first_name = "{!! Auth::user()->first_name !!}";

var handleDashboardGritterNotification = function() {
    setTimeout(function() {
        $.gritter.add({
            title: 'Welcome back! '+ first_name,
            text: '',
            image: 'assets/img/logo-light.png',
            sticky: true,
            time: '',
            class_name: 'my-sticky-class'
        });
    }, 1000);
};


</script>
