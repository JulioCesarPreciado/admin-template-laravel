{{-- App js --}}
<script src="{{ asset('js/app.js') }}"></script>
{{-- Tailwind element js --}}
<script src="{{ asset('resources/js/app.js') }}"></script>
{{-- JQuery --}}
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
{{-- Datatable --}}
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
{{-- Poppers --}}
<script src="{{ asset('js/popper.js') }}"></script>
{{-- FontAwesome --}}
<script src="{{ asset('js/fontawesome.js') }}" crossorigin="anonymous"></script>
{{-- Chartjs --}}
<script src="{{ asset('js/Chart.min.js') }}" charset="utf-8"></script>
{{-- Sweetalert2 --}}
<script src="{{ asset('js/sweetalert2.js') }}"></script>
{{-- Toastr --}}
<script src="{{ asset('js/toastr.min.js') }}"></script>
{{-- leaflet --}}
<script src="{{ asset('js/leaflet.js') }}"></script>
{{-- GeoJson --}}
<script src="{{ asset('js/geojson.js') }}"></script>
{{-- Mapa --}}
<script src="{{ asset('js/mapas.js') }}"></script>
{{-- jsPDF --}}
<script src="{{ asset('js/jspdf.umd.min.js') }}"></script>
{{-- html2canvas --}}
<script src="{{ asset('js/html2canvas.min.js') }}"></script>
{{-- html2canvas --}}
<script src="{{ asset('js/select2.min.js') }}"></script>
{{-- Datatable --}}
<script>
    var table = $('#table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
        }
    });
</script>
{{-- Scripts template --}}
<script type="text/javascript">
    /* Make dynamic date appear */
    (function() {
        if (document.getElementById("get-current-year")) {
            document.getElementById(
                "get-current-year"
            ).innerHTML = new Date().getFullYear();
        }
    })();
    /* Sidebar - Side navigation menu on mobile/responsive mode */
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        Popper.createPopper(element, document.getElementById(dropdownID), {
            placement: "bottom-start",
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }
</script>
{{-- Toasters Messages --}}
@if (Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
@endif
