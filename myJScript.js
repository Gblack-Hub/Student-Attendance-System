/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "230px";
    document.getElementById("main").style.marginLeft = "230px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

//fadein method
// $(document).ready(function() {
//     // show the alert
//     setTimeout(function() {
//         $(".alert").alert('close');
//     }, 2000);
// //second method
//     window.setTimeout(function() {
// 	    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
// 	        $(this).remove();
// 	    });
// 	}, 5000);
// });