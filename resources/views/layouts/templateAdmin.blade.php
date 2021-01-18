<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{!! asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{!! asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{!! asset('dist/css/adminlte.min.css') !!}">
        <!-- Google Font: Source Sans Pro -->
        <link href="{!! asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') !!}" rel="stylesheet">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{!! asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{!! asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{!! asset('plugins/jqvmap/jqvmap.min.css') !!}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{!! asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{!! asset('plugins/daterangepicker/daterangepicker.css') !!}">
        <!-- summernote -->
        <link rel="stylesheet" href="{!! asset('plugins/summernote/summernote-bs4.css') !!}">
        <!-- Google Font: Source Sans Pro -->
        <link href="{!! asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') !!}" rel="stylesheet">

        <script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{!! asset('plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{!! asset('plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
        <!-- ChartJS -->
        <script src="{!! asset('plugins/chart.js/Chart.min.js') !!}"></script>
        <!-- Sparkline -->
        <script src="{!! asset('plugins/sparklines/sparkline.js') !!}"></script>
        <!-- JQVMap -->
        <script src="{!! asset('plugins/jqvmap/jquery.vmap.min.js') !!}"></script>
        <script src="{!! asset('plugins/jqvmap/maps/jquery.vmap.usa.js') !!}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{!! asset('plugins/jquery-knob/jquery.knob.min.js') !!}"></script>
        <!-- daterangepicker -->
        <script src="{!! asset('plugins/moment/moment.min.js') !!}"></script>
        <script src="{!! asset('plugins/daterangepicker/daterangepicker.js') !!}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{!! asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
        <!-- Summernote -->
        <script src="{!! asset('plugins/summernote/summernote-bs4.min.js') !!}"></script>
        <!-- overlayScrollbars -->
        <script src="{!! asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
        <!-- AdminLTE App -->
        <script src="{!! asset('dist/js/adminlte.js') !!}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{!! asset('dist/js/pages/dashboard.js') !!}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{!! asset('dist/js/demo.js') !!}"></script>

        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">

        @livewireStyles
        <script src="{!! asset('/livewire/livewire.js?id=eb510e851dceb24afd36') !!}" data-turbolinks-eval="false"></script>
        {{-- <script data-turbolinks-eval="false">
            if (window.livewire) {
                //console.warn('Livewire: It looks like Livewire\'s @livewireScripts JavaScript assets have already been loaded. Make sure you aren\'t loading them twice.')
            }

            window.livewire = new Livewire();
            window.livewire.devTools(true);
            window.Livewire = window.livewire;
            window.livewire_app_url = '';
            window.livewire_token = 'bDTg4PuvPORfhwechO1YJOYeCCQuYIoP62tX8AQY';

            /* Make sure Livewire loads first. */
            if (window.Alpine) {
                /* Defer showing the warning so it doesn't get buried under downstream errors. */
                document.addEventListener("DOMContentLoaded", function() {
                    setTimeout(function() {
                        //console.warn("Livewire: It looks like AlpineJS has already been loaded. Make sure Livewire\'s scripts are loaded before Alpine.\n\n Reference docs for more info: http://laravel-livewire.com/docs/alpine-js")
                    })
                });
            }

            /* Make Alpine wait until Livewire is finished rendering to do its thing. */
            window.deferLoadingAlpine = function(callback) {
                window.addEventListener('livewire:load', function() {
                    callback();
                });
            };

            document.addEventListener("DOMContentLoaded", function() {
                window.livewire.start();
            });
        </script> --}}
        @livewireScripts

        <!-- Scripts -->
        <script src="{{ asset(mix('js/app.js')) }}" defer></script>

        <script type="text/javascript">
            //function Add(save)
            // $('#add').click(function() {
            //     alert('ok1');
            //   $.ajax({
            //     type : "POST",
            //     url : "saveP",
            //     data : {
            //       commentaire : $('#commentaire').val(),
            //     },
            //     success : function(){
            //       // if ((data.errors)) {
            //       //   $('.error').removeClass('hidden');
            //       //  $('.error').text(data.errors.commentaire);
            //       // } else {
            //       //   $('.error').remove();
            //       //   $('#example2').append("<tr>"+
            //       //       "<td>"+data.id+"</td>"+
            //       //       "<td>"+data.commentaire+"</td>"+
            //       //       "<td>"+
            //       //       "<a href='#' style='margin-bottom:5px;' class='show-modal btn btn-info btn-sm' data-id = '"+data.id+"' data-commentaire = '"+data.commentaire+"'><i class='fa fa-eye'></i></a>"+
            //       //       "<a href='#' style='margin-bottom:5px;' class='edit-modal btn btn-danger btn-sm' data-id = '"+data.id+"' data-commentaire = '"+data.commentaire+"'><i class='fa fa-pen'></i></a>"+
            //       //       "<a href='#' class='delete-modal btn btn-warning btn-sm' data-id = '"+data.id+"' data-commentaire = '"+data.commentaire+"'><i class='fa fa-trash'></i></a>"+
            //       //       "</td>"+
            //       //     "</tr>");
            //       // }
            //
            //       alert('ok');
            //     },
            //   });
            //   $('#commentaire').val('');
            // });
            //searching
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <style media="screen">
            #dec:hover {
                color: black;
            }
        </style>
    </head>
    @yield('contenu')

</html>