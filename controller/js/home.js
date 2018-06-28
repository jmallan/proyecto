


// Definimos funciones ---------- guardar y text_editable ______________________________________________________________________________
// funcion guardar (@paramatre array, callback)
function Guardar(botonSeccion,contentEditor,callback) {
    console.log('aray contentEditor en la funcion guardar al principio');    
    //console.log(contentEditor);  
    elemento = 'div#' + botonSeccion;
    var existeSeccio = false;
    // recogemos el html del froalaEditor
    var texto = $(elemento).froalaEditor('html.get');
    // si el contentEditor no se encuentra bacio quiere decir que esiste contenido previo
    if (contentEditor != null) {
        // recoremos el objeto  contentEditor
        contentEditor = texto;
        // la variable exiteSeccio cambiamos su valor a true
        existeSeccio = true;
    }
    if (!existeSeccio) {
        // no existeSeccio inplica que no hay un push perevio que tenga esa seccion con lo cual hacemos un push.
        contentEditor = texto;
        exisiteSeccio = true;
    }
    return callback(contentEditor);
    //console.log(contentEditor);
}

function text_editable(boton, contentEditor) {
    
    /*console.log('contentEditor en la funcion text_editable inicial');
    console.log(contentEditor);
    console.log('boton ->');
    console.log(boton);*/
    
    Guardar ( boton, contentEditor, function (res) {
        //console.log(res);
        /*  En la variable RES está el nuevo contenido a guardar en la base de datos  */
        /*  Incluir el Id del usuario para enviar a DB que creen el nuevo registro */
        $('#pintar').append(res);
    })
}


$('document').ready( function () {
        //event.preventDefault();
    
        var elemento;
        var idSeccio;
        console.log(content);
    $(".guardar").hide();    
    $(".editar").on('click', function () {
        $('.info').hide();
        idSeccio = $(this).data('seccio');
        console.log(idSeccio +'<- seccion del boton editar');
        $(this).after('<div id="' + idSeccio + '" class = "fr-view">'+content+'</div>');
        elemento = 'div#' + idSeccio;
        $(elemento).froalaEditor({
            // toolbarButtons: ['bold', 'italic', 'underline','|','fontFamily', 'fontSize','color','|','align','|','insertImage', 'insertTable','insertHR', '|','saveSelection'],
            placeholderText: 'Empiece a escribir aqui ...'
        });
        var idBoto = 'button#'+idSeccio;
        $(idBoto).show();
        $(this).hide();
    });
    $(".guardar").on('click', function () {
        text_editable( idSeccio, content);
    });
    
    // fin document ready

 }); 