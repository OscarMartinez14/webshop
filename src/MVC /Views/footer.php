
</main>

<footer class="footer">
	<div class="container">
		<a href=""><i class="paddding10">AGB</i></a> <a href=""><i
			class="paddding10">Contact</i></a> <a href=""><i class="paddding10">Impressum</i></a>
		<a href=""><i class="paddding10">Help</i></a>
	</div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
	crossorigin="anonymous"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/JavaScript/javascript.js"></script>
<script>
   $(document).ready(function(){
	    $('.sidenav').sidenav({
	        menuWidth: 300,
	        closeOnClick: true,
	        edge: 'right',
	      });
	  })

	  $('.collapsible').collapsible();
	  
   $('.carousel.carousel-slider').carousel({
	    fullWidth: true});

   $('.dropdown-trigger').dropdown();

   var message = document.getElementById('message');
   if (message != null) {

         message.onclick = setTimeout(function() {
                message.style.display = 'none';
         }, 3000);
   }
   
   $(document).ready(function(){
	    $('.fixed-action-btn').floatingActionButton();
	  });

   $(document).ready(function(){
	    $('select').formSelect();
	  });
   
	 
   </script>



</body>
</html>