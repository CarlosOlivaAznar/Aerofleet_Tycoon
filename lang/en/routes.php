<?php

return [

    'routes' => 'Routes',
    'airplaneRoutes' => 'Airplane Routes',
    'activateRoute' => 'Activate Route',
    'createRoute' => 'Create Route',
    'airplane' => 'Airplane',
    'departure' => 'Departure',
    'arrival' => 'Arrival',
    'distance' => 'Distance',
    'time' => 'Time',
    'timeOfDep' => 'Departure Time',
    'timeOfArr' => 'Arrival Time',
    'ticketPrice' => 'Ticket Price',
    'actions' => 'Actions',
    'deleteRoute' => 'Delete Route',
    'modifyRoute' => 'Modify Route',

    // Messages
    'inactive' => 'INACTIVE ROUTE',
    'maintenance' => 'AIRCRAFT IN MAINTENANCE',

    // Warnings
    'noRoutes' => 'No routes created',
    'needHelp' => 'Need help? Visit our',
    'needHelpT' => 'tutorial page',
    'noRoutesAirplane' => 'No routes created for this airplane',

    // Modals
    'deny' => 'Deny',
    'confirm' => 'Confirm',

    'modifyTicketPrice' => 'Modify ticket price:',
    'price' => 'Price:',

    // Create Route
    'createRoute' => 'Create Airplane Route',
    'noSlots' => 'No slots available',
    'actualRoute' => 'Current airplane route',

    // Controller Messages
    'maxSize' => 'The plane cannot operate at the selected airports (the plane exceeds the maximum allowed size at one of the selected airports)',
    'routeSuccess' => 'Route created successfully',
    'maxTime' => 'The arrival time exceeds the maximum arrival limit (04:00:00z)',
    'maxRange' => 'The plane has a range shorter than the route',
    'noSlotsAva' => 'No available slots',
    'userErr' => 'error validating user data',
    'arrDestEq' => 'The origin cannot be the same as the destination',
    'arrEqArrPRoute' => 'The origin must be the same as the destination of the previous route',
    'timeErr' => 'The route must be placed before the previous route',
    'DestNEq' => 'The created route does not match the destination of the next route',
    'mixingRoutesErr' => 'The schedule of the new route overlaps with another already created',
    'deleteSuccess' => 'Route deleted successfully',
    'deleteErr' => 'error deleting the route',
    'modSuccess' => 'Route modified successfully',
    'modErr' => 'error modifying the route',
    'routeCreated' => 'The route has been created successfully',
    'minSeparation' => 'The plane must wait at least 30 minutes at the airport to receive the necessary services.'

];

// Plantilla
// '' => '',
// {{ __('routes.') }}
