/**
 * ----------------------------------------
 *              CONSIDERACIONES
 * ---------------------------------------- */
/**
 * Las entidades nombradas a continuación tienen referencia con una tabla de la BASE DE DATOS.
 * Respetar el nombre de las columnas
 * 
 * @version 2
 */
const ENTIDADES = {
    
    slider: {
        //TABLE: "sliders",
        ATRIBUTOS: {
            order:      {TIPO:"TP_STRING",MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden"},
            image:      {TIPO:"TP_IMAGE",FOLDER:"sliders",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - (X)px X (X)px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"350px"},
            section:    {TIPO:"TP_STRING",VISIBILIDAD:"TP_INVISIBLE",NOMBRE:"sección"},
            content:    {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        
        FORM: [
            {
                '/section/<div class="col-12 col-md-8">/content/</div><div class="col-12 col-md-4"><div class="row d-flex justify-content-center"><div class="col-md-6 mb-3">/order/</div><div class="col-12">/image/</div></div>':['section','order','content','image'],
            },
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            content: {
                toolbarGroups: [
                    { name: "basicstyles", groups: ["basicstyles"] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ]},
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'links'},

                    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor', 'BGColor' ] },
                ],
                removeButtons: 'CreateDiv,Language'
            }
        }
    },
    /**
     * FAMILIAS
     */
    familia: {
        TABLE: "familias",
        ATRIBUTOS: {
            order:      {TIPO:"TP_STRING",MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden",LABEL:1},
            image:      {TIPO:"TP_IMAGE",FOLDER:"familias",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - 283px X 283px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"283px"},
            title:      {TIPO:"TP_STRING",MAXLENGTH: 100,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
        },
        
        FORM: [
            {
                '<div class="col-12 col-md-7">/image/</div><div class="col-12 col-md"><div class="row"><div class="col-12 col-md-5">/order/</div><div class="col-12 mt-3">/title/</div></div></div>':['title','order','image'],
            },
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            title: {
                toolbarGroups: [
                    { name: "basicstyles", groups: ["basicstyles"] },
                ],
                removeButtons: 'CreateDiv,Language'
            }
        }
    },
    producto: {
        TABLE: "productos",
        ATRIBUTOS: {
            order:      {TIPO:"TP_STRING",MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden",LABEL:1},
            destacado: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Producto destacado?",VALUE:1,OPTION:{ "" : "NO" , 1 : "Si"}},
            argentina: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Industría Argentina?",VALUE:1,OPTION:{ "" : "NO" , 1 : "Si"},NOMBRE:"industria argentina"},
            familia_id: {TIPO:"TP_ENUM",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"Familia",COMUN:1,LABEL:1,ENUMOP:"familias",RELACION:{ E : "familias" , A : "title" },CLASS:"border-left-0 border-right-0 border-top-0" },
            title:      {TIPO:"TP_STRING",MAXLENGTH: 100,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
            file: {TIPO:"TP_FILE",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE_FORM",ACCEPT:"image/jpeg,application/pdf",NOMBRE:"ficha",WIDTH:"190px",SIMPLE:1, LABEL:1},
            content:    {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"texto"},
            metadata: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"Metadatos",HELP:"Metadatos del producto. Separe con comas <strong>(,)</strong>"},
        },
        
        FORM: [
            {
                '<div class="col-12 col-md">/order/</div><div class="col-12 col-md-6">/title/</div><div class="col-12 col-md-4">/familia_id/</div>':['title','order','familia_id'],
            },
            {
                '<div class="col-12 col-md-6">/file/</div><div class="col-12 col-md-6">/destacado//argentina/</div>' : [ 'file' , 'destacado' , 'argentina' ]
            },
            {
                '<div class="col-12" id="detallesFORM"></div>' : [ 'VACIO' ]
            },
            {
                '<div class="col-12">/content/</div>' : [ 'content' ]
            },
            {
                '<div class="col-12">/metadata/</div>' : [ 'metadata' ]
            }
        ],
        EDITOR: {
            content: {
                toolbarGroups: [
                    { name: "basicstyles", groups: ["basicstyles"] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ]},
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'links'},

                    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor', 'BGColor' ] },
                ],
                removeButtons: 'CreateDiv,Language'
            }
        }
    },
    producto_images: {
        TABLE: "productoimages",
        ATRIBUTOS: {
            producto_id: {TIPO:"TP_ENUM",VISIBILIDAD:"TP_INVISIBLE" },
            order:      {TIPO:"TP_STRING",MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden",LABEL:1},
            image:      {TIPO:"TP_IMAGE",FOLDER:"familias",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - 278px X 278px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"278px"},
        },
        
        FORM: [
            {
                '/producto_id/<div class="col-12 col-md-7">/image/</div><div class="col-12 col-md">/order/</div>':['order','image','producto_id'],
            },
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },
    producto_detalle: {
        ATRIBUTOS: {
            key:  {TIPO:"TP_STRING",MAXLENGTH: 100,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
            value:  {TIPO:"TP_STRING",MAXLENGTH: 100,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"valor",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/key/</div><div class="col-12 col-md">/value/</div>' : [ 'key' , 'value' ]
            },
        ]
    },
    /**
     * HOME
     */
    contenido_home: {
        ATRIBUTOS: {
            lim: {TIPO:"TP_STRING",VISIBILIDAD:"TP_INVISIBLE"},
            icon: {TIPO:"TP_IMAGE",FOLDER:"icons",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - 54px X 54px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"ícono",WIDTH:"54px"},
            text: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '/lim/<div class="col-12 col-md-4">/icon/</div><div class="col-12 col-md">/text/</div>' : [ 'icon' , 'text','lim' ]
            }
        ],
        FUNCIONES: {
            icon: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    //{ name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    //{ name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Mode,Subscript,Superscript'
            }
        }
    },
    /**
     * EMPRESA
     */
    contenido_empresa: {
        ATRIBUTOS: {
            image: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - 534px X 405px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"ícono",WIDTH:"534px"},
            text1: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto 1"},
            phrase1: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"frase 1"},
            phrase2: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"frase 2"},
            text2: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto 2"}
        },
        FORM: [
            {
                '<div class="col-12">/text1/</div>' : [ 'text1' ]
            },
            {
                '<div class="col-12">/phrase1/</div>' : [ 'phrase1' ]
            },
            {
                '<div class="col-12">/text2/</div>' : [ 'text2' ]
            },
            {
                '<div class="col-12">/phrase2/</div>' : [ 'phrase2' ]
            },
            {
                '<div class="col-12 col-md-8">/image/</div>' : [ 'image' ]
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            text1: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    { name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                    { name: 'insert' },
                ],
                removeButtons: 'CreateDiv,Language,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe'
            },
            text2: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    { name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                    { name: 'insert' },
                ],
                removeButtons: 'CreateDiv,Language,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe'
            },
            phrase1: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    //{ name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    //{ name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Mode,Subscript,Superscript'
            },
            phrase2: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    //{ name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    //{ name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Mode,Subscript,Superscript'
            }
        }
    },
    /**
     * DOCUMENTACIÓN
     */
    documentacion: {
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING",MAXLENGTH:3,LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase text-center border-left-0 border-right-0 border-top-0 rounded-0",WIDTH:"70px",NOMBRE:"orden"},
            file: {TIPO:"TP_FILE",FOLDER:"documentacion",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/jpeg,application/pdf",NOMBRE:"Archivo"},
            title: {TIPO:"TP_STRING",MAXLENGTH:100,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0"},
            cover: {TIPO:"TP_IMAGE",FOLDER:"cover",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Archivo - 200px X 180px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"200px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-5">/cover/</div><div class="col-12 col-md"><div class="row"><div class="col-12 col-md-3">/order/</div><div class="col-12 col-md">/title/</div></div><div class="row mt-4"><div class="col-12">/file/</div></div></div>':['cover','file','order','title'],
            },
        ],
        FUNCIONES: {
            cover: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
    },

    /** DATOS EMPRESA */
    terminos: {
        ATRIBUTOS: {
            title: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
            text: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"},
            frase: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"Frase en formularios",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",FIELDSET:1,EDITOR:1},
        },
        FORM: [
            {
                '<div class="col-12">/title/</div>' : ['title']
            },
            {
                '<div class="col-12">/text/</div>' : ['text']
            },
            {
                '<div class="col-12">/frase/</div>' : ['frase']
            }
        ],
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'mode' , 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    { name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates'
            },
            frase: {
                toolbarGroups: [
                    { name: 'document', groups : [ 'mode' , 'document' , 'doctools' ] },
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    { name: 'clipboard', groups : [ 'clipboard' , 'undo' ] },
                    { name: 'links' },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates'
            }
        }
    },
    metadatos: {
        ATRIBUTOS: {
            section: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE_TABLE",CLASS:"text-uppercase",NOMBRE:"sección"},
            keywords: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"metadatos (,)", CLASS:"rounded-0"},
            description: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"descripción", CLASS:"rounded-0"}
        },
        FORM: [
            {
                '/section/<div class="d-flex col-3 col-md-3">/BTN/</div>' : ['BTN','section']
            },
            {
                '<div class="col-12">/description/</div><div class="col-12 mt-2">/keywords/</div>' : ['description','keywords']
            }
        ]
    },
    usuarios: {
        ATRIBUTOS: {
            username: {TIPO:"TP_STRING",MAXLENGTH:30,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"usuario",CLASS:"border-left-0 border-top-0 border-right-0"},
            name: {TIPO:"TP_STRING",MAXLENGTH:100,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre",CLASS:"border-left-0 border-top-0 border-right-0"},
            password: {TIPO:"TP_PASSWORD",LABEL:1,VISIBILIDAD:"TP_VISIBLE_FORM",NOMBRE:"contraseña",CLASS:"border-left-0 border-top-0 border-right-0",HELP:"<strong>SOLO EN EDITAR</strong> Si no desea cambiar la clave, deje el campo vacío."},
            is_admin: {TIPO:"TP_ENUM",LABEL:1,VISIBILIDAD:"TP_VISIBLE",ENUM:{1:"Administrador",0:"Usuario"},NOMBRE:"Tipo",CLASS:"text-uppercase border-left-0 border-top-0 border-right-0",COMUN:1, NECESARIO: 1},
        },
        NECESARIO: {
            'username' : { CREATE : 1 , UPDATE : 1 },
            'name' : { CREATE : 1 , UPDATE : 1 },
            'is_admin' : { CREATE : 1 , UPDATE : 1 },
            'password' : { CREATE : 1 }
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/is_admin/</div><div class="col-12 col-md-6">/name/</div>' : ['is_admin','name']
            },
            {
                '<div class="col-12 col-md-6">/username/</div><div class="col-12 col-md-6">/password/</div>' : ['username','password']
            }
        ]
    },
    imagen: {
        ATRIBUTOS: {
            image: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo - (?)px x (?)px",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"250px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/image/</div>' : ['image']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
    },
    redes: {
        ATRIBUTOS: {
            redes: {TIPO:"TP_ENUM",ENUM:{facebook:'Facebook',instagram:'Instagram',twitter:'Twitter',youtube:'YouTube',linkedin:'LinkedIn',pinterest:'Pinterest'},NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-uppercase border-left-0 border-right-0 border-top-0",NOMBRE:"red social",COMUN:1},
            titulo: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-left-0 border-right-0 border-top-0"},
            url: {TIPO:"TP_LINK",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"link del sitio",CLASS:"border-left-0 border-right-0 border-top-0"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6 col-lg-6">/redes/</div><div class="d-flex col-12 col-md-4 col-lg-3">/BTN/</div>' : ['redes','BTN']
            },
            {
                '<div class="col-12 col-md-10 col-lg-9">/titulo/</div>' : ['titulo']
            },
            {
                '<div class="col-12 col-md-10 col-lg-9">/url/</div>': ['url']
            }
        ],
        BTN: {
            "icono": '<i class="fas fa-save ml-2"></i>',
            "titulo": '',
            "mayuscula": 1,
            "class": "btn btn-success btn-block text-uppercase"
        },
        PADRE: "empresa"
    },
    empresa_email: {
        ATRIBUTOS: {
            email: {TIPO:"TP_EMAIL",MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"}
        },
        FORM: [
            {
                '<div class="col-12">/email/</div>' : ['email']
            }
        ]
    },
    empresa_telefono: {
        ATRIBUTOS: {
            telefono: {TIPO:"TP_PHONE",MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"teléfono",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0",HELP:"Contenido oculto en el HREF. Solo números"},
            tipo: {TIPO:"TP_ENUM",ENUM:{tel:"Teléfono",wha:"Whatsapp"},NECESARIO:1,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0 text-uppercase",NOMBRE:"Tipo",COMUN: 1},
            visible: {TIPO:"TP_STRING",MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"elemento visible",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0",HELP:"Contenido visible. En caso de permanecer vacío, se utilizará el primer campo"},
            is_link: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Es clickeable?"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/tipo/</div><div class="col-12 mt-3">/telefono/</div>' : ['tipo','telefono']
            },
            {
                '<div class="col-12">/visible/</div>':['visible']
            },
            {
                '<div class="col-12 col-md-6">/is_link/</div>':['is_link']
            }
        ]
    },
    empresa_domicilio: {
        ATRIBUTOS: {
            calle: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            altura: {TIPO:"TP_ENTERO",VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            localidad: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"localidad",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            provincia: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",DEFAULT:"Buenos Aires",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            pais: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",DEFAULT:"Argentina",NOMBRE:"país",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            cp: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"código postal",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            mapa: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"ubicación de Google Maps",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"},
            link: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"enlace de Google Maps",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/calle/</div><div class="col-12 col-md-4">/altura/</div>' : ['calle','altura'],
            },
            {
                '<div class="col-12 col-md-6">/cp/</div><div class="col-12 col-md-6">/pais/</div>' : ['cp','pais']
            },
            {
                '<div class="col-12 col-md-6">/provincia/</div><div class="col-12 col-md-6">/localidad/</div>' : ['provincia','localidad']
            },
            {
                '<div class="col-12"><div class="alert alert-primary" role="alert">Copie de <a class="text-dark" href="https://www.google.com/maps" target="blank"><strong>Google Maps</strong> <i class="fas fa-external-link-alt"></i></a> la ubicación de la Empresa <i class="fas fa-share-alt"></i> / Insertar mapa / iFrame</div>/mapa/</div>' : ['mapa']
            },
            {
                '<div class="col-12"><div class="alert alert-warning" role="alert">Copie de <a class="text-dark" href="https://www.google.com/maps" target="blank"><strong>Google Maps</strong> <i class="fas fa-external-link-alt"></i></a> la ubicación de la Empresa <i class="fas fa-share-alt"></i> / Enlace para compartir</div>/link/</div>' : ['link']
            }
        ]
    },
    empresa_horario: {
        ATRIBUTOS: {
            publico: {TIPO:"TP_STRING",MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0",LABEL:1,NOMBRE:"Atención al Público"},
            mercaderia: {TIPO:"TP_STRING",MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-top-0 border-left-0 border-right-0 rounded-0",LABEL:1,NOMBRE:"Expedición de Mercadería"}
        },
        FORM: [
            {
                '<div class="col-12 col-md">/publico/</div><div class="col-12 col-md">/mercaderia/</div>' : ['publico','mercaderia']
            },
        ]
    },
    empresa_footer: {
        ATRIBUTOS: {
            text: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12">/text/</div>' : ['text']
            }
        ],
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'basicstyles', groups : [ 'basicstyles' ] },
                    { name: 'colors', groups: [ 'TextColor' , 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates'
            }
        }
    },
    empresa_texto: {
        ATRIBUTOS: {
            whatsapp: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título de whatsapp",LABEL:1,CLASS:"border-left-0 border-rigth-0 border-top-0 rounded-0"}
        },
        FORM: [
            {
                '<div class="col-12">/whatsapp/</div>' : ['whatsapp']
            }
        ]
    },
    empresa_images: {
        ATRIBUTOS: {
            logo: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Logotipo OK",INVALID:"Logotipo - 334px X 69px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"334px",CLASS:"bg-white"},
            logoFooter: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Logotipo Footer OK",INVALID:"Logotipo Footer - 263px X 55px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"263px",CLASS:"bg-white"},
            favicon: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Favicon OK",INVALID:"Favicon",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/x-icon,image/png",NOMBRE:"imagen",WIDTH:"70px"},
            icon: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Ícono OK",INVALID:"Ícono - 111px X 67px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"111px"},
            industria: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Ícono OK",INVALID:"Ícono - 75px X 68px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"75px"},
            header: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Header OK",INVALID:"Header - 1350px X 119px",BROWSER:"",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"100%"},
        },
        FORM: [
            {
                '<div class="col-7 col-md-5">/logo/</div><div class="col-5 col-md-5">/logoFooter/</div><div class="col-3 col-md-2">/favicon/</div>' : ['logo','logoFooter','favicon']
            },
            {
                '<div class="col-7 col-md-4">/icon/</div><div class="col-5 col-md-5">/header/</div><div class="col-3 col-md-2">/industria/</div>' : ['icon','header','industria']
            }
        ],
        FUNCIONES: {
            logo: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            logoFooter: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            favicon: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            icon: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            header: {onchange:{F:"readURL(this,'/id/')",C:"id"}},
            industria: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    }
};