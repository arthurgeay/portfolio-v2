var input = document.querySelector( '#file' );
var labelFile = document.querySelector('#label-file');

input.addEventListener( 'change', function( e )
{
    var fileName = e['path'][0]['files'][0]['name'];;
    labelFile.textContent = fileName;
});