<?php

return [

    'routes' => 'Rutas',
    'airplaneRoutes' => 'Rutas del avion',
    'activateRoute' => 'Activar ruta',
    'createRoute' => 'Crear ruta',
    'airplane' => 'Avion',
    'departure' => 'Origen',
    'arrival' => 'Destino',
    'distance' => 'Distancia',
    'time' => 'Tiempo',
    'timeOfDep' => 'Hora de salida',
    'timeOfArr' => 'Hora de llegada',
    'ticketPrice' => 'Precio Billete',
    'actions' => 'Acciones',
    'deleteRoute' => 'Eliminar Ruta',
    'modifyRoute' => 'Modificar Ruta',

    // Messages
    'inactive' => 'RUTA INACTIVA',
    'maintenance' => 'AVION EN MANTENIMIENTO',

    // Warnings
    'noRoutes' => 'No hay rutas creadas',
    'needHelp' => 'necesitas ayuda? visita nuestra pagina de',
    'needHelpT' => 'tutorial',
    'noRoutesAirplane' => 'No hay rutas creadas para este avion',

    // Modals
    'deny' => 'Deny',
    'confirm' => 'Confirm',

    'modifyTicketPrice' => 'Modificar precio billete:',
    'price' => 'Precio:',

    // Create Route
    'createRoute' => 'Crear Ruta Avion',
    'noSlots' => 'No hay espacios disponibles',
    'actualRoute' => 'Ruta actual del avion',

    // Controller Messages
    'maxSize' => 'El avion no puede operar en los aeropuertos seleccionados (el avion supera el tamaño maximo permitido en alguno de los aeropuertos seleccionados)',
    'routeSuccess' => 'Ruta creada correctamente',
    'maxTime' => 'La hora de llegada excede el limite maximo de llegada (04:00:00z)',
    'maxRange' => 'El avion tiene un rango inferior al de la ruta',
    'noSlotsAva' => 'No hay espacios disponibles',
    'userErr' => 'error al validar los datos del usuario',
    'arrDestEq' => 'El origen no puede ser el mismo que el destino',
    'arrEqArrPRoute' => 'El origen tiene que ser el mismo que el destino de la ruta anterior',
    'timeErr' => 'La ruta se debe situar delante la ruta anterior',
    'DestNEq' => 'La ruta creada no coincide con el destino de la siguiente ruta',
    'mixingRoutesErr' => 'El horario de la nueva ruta se superpone a otro ya creado',
    'deleteSuccess' => 'Ruta eliminada correctamente',
    'deleteErr' => 'error al eliminar la ruta',
    'modSuccess' => 'Ruta modificada correctamente',
    'modErr' => 'error al modificar la ruta',
    'routeCreated' => 'La ruta ha sido creada correctamente'


];

// Plantilla
// '' => '',
// {{ __('routes.') }}
