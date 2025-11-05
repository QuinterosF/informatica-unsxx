<script src="../../public/lib/jquery/jquery.js"></script>
<script src="../../public/lib/popper.js/popper.js"></script>
<script src="../../public/lib/bootstrap/bootstrap.js"></script>
<script src="../../public/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../../public/lib/moment/moment.js"></script>
<script src="../../public/lib/jquery-ui/jquery-ui.js"></script>
<script src="../../public/lib/jquery-switchbutton/jquery.switchButton.js"></script>
<script src="../../public/lib/peity/jquery.peity.js"></script>

<script src="../../public/lib/highlightjs/highlight.pack.js"></script>
<script src="../../public/lib/jquery-toggles/toggles.min.js"></script>
<script src="../../public/lib/jt.timepicker/jquery.timepicker.js"></script>
<script src="../../public/lib/spectrum/spectrum.js"></script>
<script src="../../public/lib/jquery.maskedinput/jquery.maskedinput.js"></script>
<script src="../../public/lib/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="../../public/lib/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

<script src="../../public/lib/datatables/jquery.dataTables.js"></script>
<script src="../../public/lib/datatables-responsive/dataTables.responsive.js"></script>

<script src="../../public/datatables/dataTables.buttons.min.js"></script>
<script src="../../public/datatables/buttons.html5.min.js"></script>
<script src="../../public/datatables/buttons.colVis.min.js"></script>
<script src="../../public/datatables/jszip.min.js"></script>

<script src="../../public/lib/select2/js/select2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="../../public/js/bracket.js"></script>

<script>
    var baseUrl = "../../";  // Ajusta la ruta según la ubicación de tus controladores
    var name_file = "server";
</script>

<script>
    $(function () {
        'use strict'

        // Toggles
        $('.toggle').toggles({
            on: true,
            height: 26
        });

        // Input Masks
        $('#dateMask').mask('99/99/9999');
        $('#phoneMask').mask('(999) 999-9999');
        $('#ssnMask').mask('999-99-9999');

        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
        });

        // Time Picker
        $('#tpBasic').timepicker();
        $('#tp2').timepicker({ 'scrollDefault': 'now' });
        $('#tp3').timepicker();

        $('#setTimeButton').on('click', function () {
            $('#tp3').timepicker('setTime', new Date());
        });

        // Color picker
        $('#colorpicker').spectrum({
            color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
            color: 'rgba(23,162,184,0.5)',
            showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette: true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });


        // Rangeslider
        if ($().ionRangeSlider) {
            $('#rangeslider1').ionRangeSlider();

            $('#rangeslider2').ionRangeSlider({
                min: 100,
                max: 1000,
                from: 550
            });

            $('#rangeslider3').ionRangeSlider({
                type: 'double',
                grid: true,
                min: 0,
                max: 1000,
                from: 200,
                to: 800,
                prefix: '$'
            });

            $('#rangeslider4').ionRangeSlider({
                type: 'double',
                grid: true,
                min: -1000,
                max: 1000,
                from: -500,
                to: 500,
                step: 250
            });
        }

    });
</script>