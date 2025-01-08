<?php

return [

    'home' => 'Home',
    'balanceAva' => 'Efectivo disponible',
    'routes' => 'Rutas activas',
    'airplanes' => 'Aviones comprados',
    'airports' => 'Diferentes aeropuertos',
    'balance' => 'Valor de la aerolinea',
    'messages' => 'Mensajes',
    'noMessages' => 'No hay mensajes disponibles',
    'routeInfo' => 'Información de los vuelos',
    'noInfo' => 'No hay información',

    // First Login
    'newAirline' => 'Introduce los datos de tu nueva compañía aérea',
    'ailineName' => 'Nombre de la compañía aérea:',
    'hqLocalization' => 'Localización de la sede:',
    'searchLocalization' => 'Busca la localización...',
    'begin' => 'Comenzar',

    // Controller Messages
    'thePlane' => 'El avión',
    'depCond' => 'tiene un estado deplorable, por seguridad se ha detenido todas las operaciones del avión y se encuentra en tierra',
    'wRoute' => 'con la ruta',
    'startTime' => 'con la hora de inicio a las',
    'completedFlight' => 'ha completado el vuelo con',
    'passengers' => 'pasajeros y tiene un beneficio de',
    'income' => '(ingresos:',
    'expenses' => 'gastos:',
    'losses' => 'está generando perdidas, considere reducir el precio de los billetes o cambiar la ruta del avión',
    'fullPlane' => 'está completando la ruta con el avión lleno, considere aumentar el precio de los billetes',
    'fewPassengers' => 'esta completando la ruta con muy pocos pasajeros, considere bajar los precios de los billetes o cambiar la ruta',
    'emptyPlane' => 'esta completando la ruta vacío, no tiene ningún pasajero, considere cambiar la ruta o bajar los precios de los billetes',
    'maintenanceComp' => 'ha completado el mantenimiento, considere retiralo del hangar',
    'hireEng' => 'El ratio de mantenimiento es menor de 0.33 por avión, considere contratar a más ingenieros',

    // Eventos Aleatorios
    'retrasoVuelo' => 'ha sufrido un retraso y se abonará el 25% de los ingresos generados por las molestias',
    'falloMecanico1' => 'ha sufrido un fallo mecánico en el aeropuerto y ha tenido que ser reparado, los gastos de la reparación son:',
    'falloMecanico2' => 'ha sufrido un fallo mecánico en el aeropuerto y no ha podido ser reparado a tiempo, el vuelo ha sido cancelado.',
    'huelgaAeropuerto' => 'ha sufrido una huelga de controladores aéreos en uno de los aeropuertos, por el retraso se ha abonado el 25% del precio de los billetes a los pasajeros',
    'aumentoDemanda' => 'ha sufrido un aumento de la demanda inesperadamente, los ingresos se han multiplicado un',
    'perdidaEquipaje' => 'ha sufrido perdidas de equipaje en el aeropuerto, se ha compensado económicamente a los pasajeros afectados, pasajeros afectados:',
    'impactoAve' => 'ha sufrido el impacto de una ave en pleno vuelo, se ha pagado de reparación de',
    'pasajeroProblematico' => 'ha sufrido un desvío a otro aeropuerto por un pasajero que estaba dando problemas en el avión. Se ha abonado de vuelta el 25% del precio del billete y debido al desvío del avion a otro aeropuerto se ha cobrado la tasa de operación extra:',
    'personaEnferma' => 'ha sufrido una emergencia abordo y ha tenido que ser aterrizado de emergencia en otro aeropuerto. Se abona de vuelta el 10% del precio del billete y debido al desvío del avión a otro aeropuerto se ha cobrado la tasa de operación extra:',
    'impactosMenores' => 'ha sufrido daños menores durante el vuelo, se ha reducido el estado del avión un',

    // Eventos METAR
    'windDepEvent1' => 'ha sufrido un retraso por fuertes vientos en el aeropuerto de origen, se ha devuelto un 10% de los ingresos generados',
    'windDepEvent2' => 'ha sufrido un retraso por fuertes vientos en el aeropuerto de origen, se ha devuelto un 30% de los ingresos generados',
    'windDepEvent3' => 'ha sido cancelado por fuertes vientos en el aeropuerto de origen, se ha reembolsado a los pasajeros el dinero de los billetes',

    'visDepEvent1' => 'ha sufrido un retraso por baja visibilidad en el aeropuerto de origen, se ha devuelto un 10% de los ingresos generados en el vuelo',
    'visDepEvent2' => 'ha sufrido un retraso por baja visibilidad en el aeropuerto de origen, se ha devuelto un 40% de los ingresos generados en el vuelo',
    'visDepEvent3' => 'ha sido cancelado por baja visibilidad en el aeropuerto de origen, se ha reembolsado a los pasajeros el dinero de los billetes',

    'windArrEvent1' => 'ha tenido que abortar el aterrizaje y ha sufrido un pequeño retraso debido a los fuertes vientos, se ha reembolsado el 10% del precio de los billetes a los pasajeros por las molestias',
    'windArrEvent2' => 'ha sufrido un accidente menor al aterrizar debido a los fuertes vientos, el coste de la reparación ha sido de:',
    'windArrEvent3' => 'se ha desviado a otro aeropuerto debido a los fuertes vientos, se ha facilitado un bus a los pasajeros para llegar al aeropuerto de origen, el gasto del bus ha sido de:',

    'visArrEvent1' => 'ha tenido que abortar el aterrizaje y ha sufrido un pequeño retraso, se ha reembolsado el 10% del precio de los billetes a los pasajeros por las molestias',
    'visArrEvent2' => 'ha sufrido un accidente menor al aterrizar debido a la baja visibilidad, el coste de la reparación ha sido de:',
    'visArrEvent3' => 'se ha desviado a otro aeropuerto debido a la baja visibilidad, se ha facilitado un bus a los pasajeros para llegar al aeropuerto de origen, el gasto del bus ha sido de:',


    // Mensajes de loading
    'txtLoading1' => 'Calculando Rutas',
    'txtLoading2' => 'Repostando Aviones',
    'txtLoading3' => 'Embarcando Pasajeros',
    'txtLoading4' => 'Fumigando civiles',
    'txtLoading5' => 'Los pilotos se han perdido',
    'txtLoading6' => '¿Seguro que teniamos combustible de sobra?',
    'txtLoading7' => 'Verificando el clima',
    'txtLoading8' => 'Realizando el mantenimiento',
    'txtLoading9' => 'Contactando con control aéreo',
    'txtLoading10' => 'Pagando las tasas de aterrizaje',
    'txtLoading11' => 'Llegando a la terminal',
    'txtLoading12' => 'Buscando el camino… y las maletas perdidas',



];

// Plantilla
// '' => '',
// {{ __('home.') }}