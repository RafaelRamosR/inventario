<?php

$modulos = [];

$modulos["inicio"] = [
    "ruta" => "modulos/inicio/",
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal",
        ]
    ]
];

$modulos["contrasena"] = [
    "ruta" => "modulos/cambio_contrasena/",
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal",
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json",
        ]
    ]
];

$modulos["datos_personales"] = [
    "ruta" => "modulos/datos_personales/",
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal",
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json",

        ]
    ]
];

$modulos["mision"] = [
    "ruta" => "modulos/mision/",
    "acciones" => [
        "ver" => [
            "archivo" => "",
            "diseño" => "horizontal",
            "contenido" => "mision"
        ]
    ]
];

$modulos["vision"] = [
    "ruta" => "modulos/vision/",
    "acciones" => [
        "ver" => [
            "archivo" => "",
            "diseño" => "horizontal",
            "contenido" => "vision"
        ]
    ]
];

$modulos["objetivos"] = [
    "ruta" => "modulos/objetivos/",
    "acciones" => [
        "ver" => [
            "archivo" => "",
            "diseño" => "horizontal",
            "contenido" => "objetivos"
        ]
    ]
];

$modulos["resena"] = [
    "ruta" => "modulos/resena/",
    "acciones" => [
        "ver" => [
            "archivo" => "",
            "diseño" => "horizontal",
            "contenido" => "resena"
        ]
    ]
];

$modulos["coro"] = [
    "ruta" => "modulos/coro/",
    "acciones" => [
        "ver" => [
            "archivo" => "",
            "diseño" => "horizontal",
            "contenido" => "coro"
        ]
    ]
];

$modulos["iniciar-sesion"] = [
    "ruta" => "modulos/iniciar_sesion/",
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "iniciar" => [
            "archivo" => "iniciar.php",
            "diseño" => "json"
        ],
    ]
];

$modulos["cerrar-sesion"] = [
    "ruta" => "modulos/cerrar_sesion/",
    "acciones" => [
        "cerrar" => [
            "archivo" => "cerrar.php",
            "diseño" => "json"
        ]
    ]
];
//m
$modulos["persona"] = [
    "ruta" => "modulos/persona/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["producto"] = [
    "ruta" => "modulos/producto/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["ingreso"] = [
    "ruta" => "modulos/ingreso/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["entrega"] = [
    "ruta" => "modulos/entrega/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["sexo"] = [
    "ruta" => "modulos/sexo/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["tipo_identidad"] = [
    "ruta" => "modulos/tipo_identidad/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["tipo_producto"] = [
    "ruta" => "modulos/tipo_producto/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["estado_civil"] = [
    "ruta" => "modulos/estado_civil/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["cargo"] = [
    "ruta" => "modulos/cargo/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["departamento"] = [
    "ruta" => "modulos/departamento/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["municipio"] = [
    "ruta" => "modulos/municipio/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["permiso"] = [
    "ruta" => "modulos/permiso/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["zona_de_residencia"] = [
    "ruta" => "modulos/zona_de_residencia/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["proveedores"] = [
    "ruta" => "modulos/proveedores/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["contenido"] = [
    "ruta" => "modulos/contenido/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["rol"] = [
    "ruta" => "modulos/rol/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["permiso_rol"] = [
    "ruta" => "modulos/permiso_rol/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["modulo_accion"] = [
    "ruta" => "modulos/modulo_accion/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
//m
$modulos["persona_rol"] = [
    "ruta" => "modulos/persona_rol/",
    //"verificar_permisos" => true,
    "acciones" => [
        "ver" => [
            "archivo" => "index.php",
            "diseño" => "horizontal"
        ],
        "listar" => [
            "archivo" => "tabla.php",
            "diseño" => "html"
        ],
        "agregar" => [
            "archivo" => "agregar.php",
            "diseño" => "json"
        ],
        "modificar" => [
            "archivo" => "modificar.php",
            "diseño" => "json"
        ],
        "eliminar" => [
            "archivo" => "eliminar.php",
            "diseño" => "json"
        ],
        "asignar" => [
            "archivo" => "asignar.php",
            "diseño" => "json"
        ],
        "reporte" => [
            "archivo" => "reporte.php",
            "diseño" => "horizontal"
        ],
        "descarga" => [
            "archivo" => "descarga.php",
            "diseño" => "html"
        ]
    ]
];
