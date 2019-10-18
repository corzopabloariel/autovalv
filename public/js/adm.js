/** ------------------------------------------------
 ** -------------- FUNCIONES BÁSICAS <--------------
 ** ------------------------------------------------
 ** ------------------------------------------------ */

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
/** -------------------------------------
 *      FORMATO MONEDA
 ** ------------------------------------- */
formatter = new Intl.NumberFormat('es-AR', {
    style: 'currency',
    currency: 'ARS',
});
/** -------------------------------------
 *      MOSTRAR TÉRMINOS
 ** ------------------------------------- */
terminosShow = ( t , btn ) => {
    if( $( t ).is( ":checked" ) ) {
        $( "#terminosModal" ).modal( "show" );
        $( `#${btn}` ).prop( "disabled" , false );
    } else
        $( `#${btn}` ).prop( "disabled" , true );
};
/** -------------------------------------
 *      MOSTRAR COMBINACIONES DE TECLAS
 ** ------------------------------------- */
showCombinacion = ( t ) => {
    $( "#modalCombinacion" ).modal( "show" );
};
/** -------------------------------------
 *      COPIAR IMAGEN
 ** ------------------------------------- */
copy = ( t , url ) => {
    $temp = $(`<input>`);
    $("body").append($temp);
    $temp.val($( t ).parent().find( "a" ).text()).select();
    document.execCommand("copy");
    $temp.remove();
    alertify.success( "Imagen copiada" );
};
/** -------------------------------------
 *      ELIMINAR REGISTRO
 ** ------------------------------------- */
erase = ( t , id ) => {
    window.pyrus.delete( t , { title : "ATENCIÓN" , body : "¿Eliminar registro?" } , `${url_simple}/adm/${window.pyrus.name}/delete` , id );
};
/** -------------------------------------
 *      LIMPIAR FORMULARIO
 ** ------------------------------------- */
remove = ( t ) => {
    $( '[data-toggle="tooltip"]' ).tooltip( 'hide' );
    alertify.confirm( "ATENCIÓN" , "¿Cerrar sin guardar registro?",
        () => {
            window.pyrus.clean( CKEDITOR );
            add( $( "#btnADD" ) );
        },
        () => {}
    ).set( 'labels' , { ok : 'Confirmar' , cancel : 'Cancelar' } );
};

removeImage = ( t ) => {
    let button = $( t );
    let id = button.prop( "id" );
    id = id.replace( "_button" , "" );
    $( `#${id}` ).val( "" );
    id = `src-${id}`;
    $( `#${id}` ).prop( `src` , $( `#${id}` ).data( "src" ) );
    $( `#${id}-2` ).prop( `src` , $( `#${id}-2` ).data( "src" ) );
    button.prop( `disabled` , true );
};
/** -------------------------------------
 *      EDITAR REGISTRO
 ** ------------------------------------- */
edit = ( t , id ) => {
    $( t ).prop( "disabled" , true );
    window.pyrus.one( `${url_simple}/adm/${window.pyrus.name}/${id}/edit`, function( res ) {
        $( '[data-toggle="tooltip"]' ).tooltip( 'hide' );
        $( t ).prop( "disabled" , false );
        add( $( "#btnADD" ) , parseInt( id ) ,res.data );
    } );
};
/** -------------------------------------
 *      PREVIEW DE IMAGEN
 ** ------------------------------------- */
readURL = ( input , target ) => {
    if ( input.files && input.files[ 0 ] ) {
        let reader = new FileReader();
        reader.onload = ( e ) => {
            $( `#${target}` ).prop( `src` , `${e.target.result}` );
            $( `#${target}-2` ).prop( `src` , `${e.target.result}` );
            target = target.replace( "src-" , "" );
            $( `#${target}_button` ).prop( `disabled` , false );
        };
        reader.readAsDataURL( input.files[ 0 ] );
    }
};
/** -------------------------------------
 *      CHECKBOX
 ** ------------------------------------- */
check = ( i ) => {
    if( $( i ).prop( "checked" ) )
        $( i ).find( "+ input").val( 1 );
    else
        $( i ).find( "+ input").val( 0 );
};
/** -------------------------------------
 *      GUARDAR ELEMENTO
 ** ------------------------------------- */
formSave = ( t , formData ) => {
    let url = t.action;
    let method = t.method;

    method = (method == "GET" || method == "get") ? "post" : method;
    $( "body > .wrapper" ).addClass( "isDisabled" );
    alertify.warning("Espere. Guardando contenido");
    axios({
        method: method,
        url: url,
        data: formData,
        responseType: 'json',
        config: { headers: {'Content-Type': 'multipart/form-data' }}
    })
    .then((res) => {
        if(parseInt(res.data) == 1) {
            alertify.success("Contenido guardado");
            location.reload();
        } else  {
            $( "body > .wrapper" ).removeClass( "isDisabled" );
            alertify.error("Ocurrió un error en el guardado. Reintente");
        }
    })
    .catch((err) => {
        $( "body > .wrapper" ).removeClass( "isDisabled" );
        console.error( `ERROR en ${url}` );
        alertify.error("Ocurrió un error en el guardado.");
    })
    .then(() => {});
};

verificarForm = () => {
    if( window.pyrus.objeto.NECESARIO !== undefined ) {
        flag = 0;
        alert = "";
        for( let x in window.pyrus.objeto.NECESARIO ) {
            if( window.pyrus.objeto.NECESARIO[ x ][ window.formAction ] !== undefined ) {
                if( $(`#${window.pyrus.name}_${x}`).is( ":invalid" ) || $(`#${window.pyrus.name}_${x}`).val() == "" ) {
                    if( alert != "" )
                        alert += ", ";
                    alert += window.pyrus.especificacion[ x ].NOMBRE;
                    flag = 1;
                }
            }
        }
        if( flag ) {
            alertify.error( `Complete los siguientes campos: ${alert}` , 100 );
            return false;
        }
        return true;
    }
    return true
};
/** -------------------------------------
 *      OBJETO A GUARDAR
 ** ------------------------------------- */
formSubmit = ( t ) => {
    let idForm = t.id;
    let formElement = document.getElementById( idForm );

    if( !verificarForm() )
        return null;
    let formData = new FormData( formElement );
    formData.append("ATRIBUTOS",JSON.stringify(
        [
            { DATA: window.pyrus.objetoSimple , TIPO: "U" }
        ]
    ));

    for( let x in CKEDITOR.instances )
        formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
    formSave( t , formData );
};
/** -------------------------------------
 *      ABRIR FORMULARIO
 ** ------------------------------------- */
add = ( t , id = 0 , data = null ) => {
    let btn = $(t);
    let action = `${url_simple}/adm/${window.pyrus.name}`;
    let method = "POST";
    window.formAction = "CREATE";
    window.elementData = data;
    if( btn.is(":disabled") )
        btn.prop( "disabled" , false );
    else
        btn.prop( "disabled" , true );
    $( "#wrapper-form" ).toggle( 800 , "swing" );
    $( "#wrapper-tabla" ).toggle( "fast" );
    
    if(id != 0) {
        action = `${url_simple}/adm/${window.pyrus.name}/update/${id}`;
        method = "PUT";
        $( "#form" ).data( "id" , id );
        window.formAction = "UPDATE";
    }
    window.pyrus.show( CKEDITOR , url_simple , data );
    document.getElementById( "form" ).scrollIntoView();
    $( "#form" ).prop( "action" , action ).prop( "method" , method );
    addfinish( data );
};
addfinish = ( data = null ) => {};
/** -------------------------------------
 *      ELIMINAR ARCHIVO
 ** ------------------------------------- */
deleteFile = ( t , url , txt ) => {
    alertify.confirm( "ATENCIÓN" ,`${txt}`,
        () => {
            axios.get( url, {
                responseType: 'json'
            })
            .then(( res ) => {
                if( res.data ) {
                    alertify.success( "Archivo eliminado" );
                    $( t ).prop( "disabled" , true );
                    location.reload();
                } else {
                    alertify.error( "Ocurrió un error. Reintente" );
                    $( t ).prop( "disabled" , false );
                }
            })
            .catch(( err ) => {
                alertify.error( "Ocurrió un error" );
                $( t ).prop( "disabled" , false );
                console.error( `ERROR en ${url}` );
            })
            .then(() => {});
            
        },
        () => {
            $( t ).prop( "disabled" , false );
        }
    ).set( 'labels' , { ok : 'Confirmar' , cancel : 'Cancelar' } );
};
/** -------------------------------------
 *      COMBINACIÓN DE TECLAS
 ** ------------------------------------- */
shortcut.add( "Alt+Ctrl+S" , function () {
    if( $( "#form" ).is( ":visible" ) )
        $( "#form" ).submit();
}, {
    type: "keydown",
    propagate: true,
    target: document
});
shortcut.add( "Alt+Ctrl+N" , function () {
    if( $( "#btnADD" ).length ) {
        if( !$( "#form" ).is( ":visible" ) )
            $( "#btnADD" ).click();
        else
            remove( null );
    }
}, {
    type: "keydown",
    propagate: true,
    target: document
});
/** -------------------------------------
 *      INICIO
 ** ------------------------------------- */
init = ( callbackOK ) => {
    /** */
    $( "#form .container-form" ).html( window.pyrus.formulario() );
    $( "#wrapper-tabla > div.card-body" ).html( window.pyrus.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" } ] ) );
    
    window.pyrus.editor( CKEDITOR );
    window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos , [ "e" , "d" ] );
    callbackOK.call( this , null );
};