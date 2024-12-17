<?php

return [

    'routes' => 'Rutas',
    'airplaneRoutes' => 'Rutas del avión',
    'activateRoute' => 'Activar ruta',
    'createRoute' => 'Crear ruta',
    'airplane' => 'Avión',
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
    'income' => 'Beneficios',
    'collapseAll' => 'Encoger todos',

    // Messages
    'inactive' => 'RUTA INACTIVA',
    'maintenance' => 'AVIÓN EN MANTENIMIENTO',

    // Warnings
    'noRoutes' => 'No hay rutas creadas',
    'needHelp' => '¿necesitas ayuda? Visita nuestra página de',
    'needHelpT' => 'tutorial',
    'noRoutesAirplane' => 'No hay rutas creadas para este avión',

    // Modals
    'deny' => 'Deny',
    'confirm' => 'Confirm',

    'modifyTicketPrice' => 'Modificar precio billete:',
    'price' => 'Precio:',

    // Create Route
    'createRoute' => 'Crear Ruta Avión',
    'noSlots' => 'No hay espacios disponibles',
    'actualRoute' => 'Ruta actual del avión',
    'newRoute' => 'Nueva Ruta',
    'createNewRoute' => 'Crear Nueva Ruta',

    // Controller Messages
    'maxSize' => 'El avión no puede operar en los aeropuertos seleccionados (el avión supera el tamaño máximo permitido en alguno de los aeropuertos seleccionados)',
    'routeSuccess' => 'Ruta creada correctamente',
    'maxTime' => 'La hora de llegada excede el límite máximo de llegada (04:00:00z)',
    'maxRange' => 'El avión tiene un rango inferior al de la ruta',
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
    'routeCreated' => 'La ruta ha sido creada correctamente',
    'minSeparation' => 'El avión debe pasar mínimo 30 minutos de espera en el aeropuerto para recibir los servicios necesarios',
    'destNEq' => 'El destino tiene que ser el mismo que la llegada de la ruta siguiente',


];

// Plantilla
// '' => '',
// {{ __('routes.') }}
