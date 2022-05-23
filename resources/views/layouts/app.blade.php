<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo eTender</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
          <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        
<!-- ionicons Icons -->
        <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
         <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script> 

        {{-- <script src = "https://code.jquery.com/jquery-3.3.1.min.js" > </script>  --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


        
{{-- <script type= "text/javascript">
	$(document).ready( function() {
		$('#submit').on('click', function(e) {
			e.preventDefault();
			preview();
		});
	});
    

	function preview(){      
        var label1="General Information";      
		var name = $('input[id="name"]').val();
		var name_label = $('strong[for="name"]').text();
		var text_name = '<p><strong>' + company_label + '</strong> : ' + company_name + '</p>';
		 
	
        var email = $('input[id="email"]').val();
		var email_label = $('strong[for="email"]').text();
		var text_email = '<p><strong>' + email_label + '</strong> : ' + email + '</p>';

        var phone = $('input[id="phone"]').val();
		var phone_label = $('strong[for="phone"]').text();
		var text_phone = '<p><strong>' + phone_label + '</strong> : ' + phone + '</p>';

        var contact_person_name = $('input[id="contact_person_name"]').val();
		var contact_person_name_label = $('strong[for="contact_person_name"]').text();
		var text_contact_person_name = '<p><strong>' + contact_person_name_label + '</strong> : ' + contact_person_name + '</p>';


        var designation = $('input[id="designation"]').val();
		var designation_label = $('strong[for="designation"]').text();
		var text_designation = '<p><strong>' + designation_label + '</strong> : ' + designation + '</p>';


        var address = $('input[id="address"]').val();
		var address_label = $('strong[for="address"]').text();
		var text_address = '<p><strong>' + address_label + '</strong> : ' + address + '</p>';
		
		var label2="Legal Information";

        var trade_licence = $('input[id="trade_licence"]').val();
		var trade_licence_label = $('strong[for="trade_licence"]').text();
		var text_trade_licence = '<p><strong>' + trade_licence_label + '</strong> : ' + trade_licence + '</p>';


        var tin_certificate = $('input[id="tin_certificate"]').val();
		var tin_certificate_label = $('strong[for="tin_certificate"]').text();
		var text_tin_certificate = '<p><strong>' + tin_certificate_label + '</strong> : ' + tin_certificate + '</p>';


        var vat_certificate = $('input[id="vat_certificate"]').val();
		var vat_certificate_label = $('strong[for="vat_certificate"]').text();
		var text_vat_certificate = '<p><strong>' + vat_certificate_label + '</strong> : ' + vat_certificate + '</p>';


        var certificate_incorporation = $('input[id="certificate_incorporation"]').val();
		var certificate_incorporation_label = $('strong[for="certificate_incorporation"]').text();
		var text_certificate_incorporation = '<p><strong>' + certificate_incorporation_label + '</strong> : ' + certificate_incorporation + '</p>';



		var data =text_name + text_email + text_phone + text_contact_person_name + text_designation + text_address + text_trade_licence + text_tin_certificate + text_vat_certificate + text_certificate_incorporation;
		$('#preview_data').html('');
		$('#preview_data').append(data);
		$('#preview_data').dialog({
			resizable: false,
			//height:140,
			modal: true,
			buttons: {
				Cancel: function() {
					$(this).dialog("close");
				}
			}
		});
	}
</script> --}}
       
    </head>
    <body class="hold-transition sidebar-mini">
	<div class="wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('content')
        @include('layouts.footer')

	</div>

<script>
CKEDITOR.replace( 'detail' );
</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    
    </script>
    <script>
        $("body").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 3 secs

});
</script>




    </body>
    </html>


