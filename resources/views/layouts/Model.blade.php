<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!--Import materialize.css-->
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" integrity="sha512-t38vG/f94E72wz6pCsuuhcOPJlHKwPy+PY+n1+tJFzdte3hsIgYE7iEpgg/StngunGszVMrRfvwZinrza0vMTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" type="text/css"  href="{{ URL::asset('mycss/css.css') }}">
       <!--Icon displayed on the Tiler card UFP -->
      <link rel="icon" href="{!! asset('https://th.bing.com/th/id/OIP.BAIMISetTgoVBWQ3zjl_JQAAAA?pid=ImgDet&rs=1') !!}"/>

<!-- Title displayed in the title card of the page -->
<title>
                       @yield('Title','Default Title')
     </title>
</head>
    <body>
    <!--Header of the page with page with links of the requisitos , dropbox to see names , the requisitos, and log out with the link of the materilize -->
        @include('Include.Header')
    <!--Content of the form with tables, lists and forms that informs the user of the relevant information  -->
        @yield('Content')
    <!--Footer with links with link to main and adminmain  -->

        @include('Include.Footer')


          <script  src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js" integrity="sha512-m2PhLxj2N91eYrIGU2cmIu2d0SkaE4A14bCjVb9zykvp6WtsdriFCiXQ/8Hdj0kssUB/Nz0dMBcoLsJkSCto0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Compiled and minified JavaScript -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="{{ URL::asset('mycss/java.js') }}"></script>


        </body>
</html>
