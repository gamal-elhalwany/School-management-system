<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';

</script>

<!-- Bootstrap CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = "{{ asset('assets/js') }}/";</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

<!-- Livewire -->
@livewireScripts

<script>

    // Make a Check All Button.
    function checkAll(className, ele) {
        let elements = document.getElementsByClassName(className);
        let l = elements.length;

        if (ele.checked) {
            for (let i=0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (let i=0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }

    // Delete All Satges at Once.
    $(function () {
        $('#delete_all_classrooms').click(function () {
            let selected = new Array();

            $('#datatable input[type=checkbox].box:checked').each(function () {
                if (this.value) {
                    selected.push(this.value);
                }
            });

            if (selected.length > 0) {
                $('#delete_all_modal').modal('show');
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

    // Get All Classrooms That Relevant to Specified Stage When User Choose it From the Sections From.
    $(function() {
        $('select[name="stage_id"]').on('change', function() {
            $stage_id = $(this).val();
            if ($stage_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + $stage_id,
                    type: "GET",
                    dataType: "json",

                    success: function(data) {
                        console.log(data);
                        $('select[name="class_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="class_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                console.log('Error With AJAX Method');
            }
        });
    });
</script>
