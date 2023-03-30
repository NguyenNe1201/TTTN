<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
    @yield('headListCus')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/assets/img/nguyen.jpg" alt="Logo" height="60" width="60">
        </div>
        <!-- Navbar Header -->
        @include('layout.header')
        <!-- /.navbar -->
        @include('layout.rightmenu')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- /.content-wrapper -->
        @include('layout.footer')
    </div>
    <!-- JQUERY -->
    @include('layout.jquery')
    
</body>
<script>
    //sweet alert delete employce
    // window.addEventListener('show-delete-confirmation', event => {
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             Livewire.emit('deleteConfirmed')
    //         }
    //     })
    // });
</script>

</html>
