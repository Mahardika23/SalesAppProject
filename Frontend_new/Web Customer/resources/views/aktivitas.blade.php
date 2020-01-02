@extends('navbar')

@section('konten')

<link rel="stylesheet" href="{{ url('/css/tab.css')}}">

<div class='container mt-5' style="background-color:">
    <div class="tab">
        <button class="tablinks col-6" onclick="openTab(event, 'Pesanan')" id="defaultOpen">Pesanan</button>
        <button class="tablinks col-6" onclick="openTab(event, 'Riwayat')">Riwayat</button>
    </div>

    <!-- Tab content -->
    <div id="Pesanan" class="tabcontent">
        <h3>Pesanan</h3>
        <p>London is the capital city of England.</p>
    </div>

    <div id="Riwayat" class="tabcontent">
        <h3>Riwayat</h3>
        <p>Paris is the capital of France.</p>
    </div>

</div>
<script>
    function openTab(evt, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
@endsection