function openPage(pageName, elmnt, color, color1) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the    button used to open the tab content
    elmnt.style.backgroundColor = color;


    $(".pet").css("background-color", color)
    $(".stat").css("background-color", color)
    $(".prov").css("background-color", color1)
    $(".kota").css("background-color", color1)
    $(".tertinggi").css("background-color", color1)
    $(".label1").css("color", color1)
    $(".prov").css("color", color)
    $(".kota").css("color", color)
    $(".tertinggi").css("color", color)
    $(".KetPeta").css("color", color1)
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

var mymap = L.map('mapid').setView([-7.474212, 112.440175], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	}).addTo(mymap);