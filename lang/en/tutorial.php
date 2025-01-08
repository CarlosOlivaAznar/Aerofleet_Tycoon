<?php

return [

    'youtubeVideoTitle' => 'YouTube Video',
    'youtubeVideo' => '<p>
            For a detailed analysis of the basic concepts of the application, watch our official YouTube tutorial on creating routes, fleet management, and spaces. To guide you, read the video description where you will find the tutorial chapters. <a href="https://www.youtube.com/watch?v=RPQ9NV_zOZc" target="_blank">Click here to watch the tutorial</a>
        </p>',
    
    'fleetManagementTitle' => 'Fleet Management',
    'fleetManagement' => '<p>
                    Fleet management is a vital part of your airline. In the fleet tab of your airline, you can find all the information about your planes.
                </p>
                <p>
                    At first glance, you can observe the condition of your planes and their status. There are 3 different statuses: <span class="bold">In route</span>, which means the plane is flying and following the configured itinerary; <span class="bold">On the ground</span>, meaning the plane is parked at the headquarters and not performing any specific function; and finally, <span class="bold">In maintenance</span>, where the plane is at the headquarters being repaired.
                </p>
                <p>
                    At the end of the table, you can see 3 different buttons. Hovering over each button will show its function.
                </p>
                <p>
                    The first red button is used to put the plane up for sale. Before completing the sale, a confirmation window will appear to avoid accidental sales.
                </p>
                <p>
                    The second yellow button is the option to send planes for maintenance. Doing so will pause the routes of that plane until maintenance is completed at the headquarters.
                </p>
                <p>
                    The third green button is used to create routes for that specific plane. This button is essential for creating the plane\'s first route. Once a route is created, further routes can be managed directly in the routes tab.
                </p>',

    'buyAircraftTitle' => 'Buy Aircraft',
    'buyAircraft' => '<p>
                    Once you access the buy aircraft button from the fleet, you will find the aircraft purchase page. In the first section, you will see 4 buttons that lead to <span class="bold">brand-new</span> aircraft from the main manufacturers. Here you can choose the model, and it will arrive brand-new with 100% condition.
                </p>
                <p>
                    If you cannot afford a brand-new aircraft, in the second section of the page, you will find a table with <span class="bold">second-hand</span> aircraft. These planes, previously used by other airlines, have specific conditions, and their price depends on their condition.
                </p>
                <p>
                    <span class="bold">ATTENTION!</span> This table is shared among all users, meaning that any user can buy the same plane you see. If a second-hand plane catches your eye, act quickly, as it might not be available later.
                </p>
                <p>
                    The second-hand aircraft table is updated after each purchase, adding more planes for sale.
                </p>',

    'routeManagementTitle' => 'Route Management',
    'routeManagement' => '<p>
                    Routes are the cornerstone of your airline; you need efficient routes with good demand to generate substantial profits.
               </p>
               <p>
                    In the fleet management section, it is explained how to create the first route for a plane. If you have multiple routes for your plane, you may notice a message that says <span class="bold">INACTIVE ROUTE</span>. This means the route is not active or generating revenue. To activate the route, click the <span class="bold">Activate Route</span> button. Once activated, this message will disappear.
               </p>
               <p>
                    To add new routes to a plane, use the shortcut button <span class="bold">Create Route</span>, or you can also use the create route button in the fleet tab.
               </p>
               <p>
                    Two actions can be performed for a route: the first button <span class="bold">deletes the route</span>, and the other <span class="bold">modifies</span> it.
               </p>',

    'createRutesTitle' => 'Create Routes',
    'createRutes' => '<p>
                    Understanding routes is crucial as this is the most restrictive part of the program, and creating the optimal route may be challenging.
                </p>
                <p>
                    First, select the origin and destination, ensuring that <span class="bold">the origin and destination are not the same</span>.
                </p>
                <p>
                    After selecting the origin and destination, choose the departure time. It is essential that <span class="bold">the schedule does not overlap with other routes</span>. A table showing the plane\'s departure and arrival schedules is provided at the bottom to assist you.
                </p>
                <p>
                    A map is also available to assist in creating the route, showing the plane\'s maximum range from the origin airport and airports where you have purchased slots. When selecting the origin and destination, the map will draw a line illustrating the route you are about to create.
                </p>
                <p>
                    Finally, the most important part is setting a ticket price. A higher price results in lower demand, risking empty or underutilized planes, while a lower price increases demand but may reduce profit margins.
                </p>
                <p>
                    To finalize the route creation, a confirmation button is provided below the schedule table.
                </p>',

    'slotsManagementTitle' => 'Slots Management',
    'slotsManagement' => '<p>
                    Managing slots is essential for route creation. If you do not have slots at an airport, your planes cannot operate there.
               </p>
               <p>
                    To acquire new slots, purchase them. <span class="bold">ATTENTION!</span> Slots are limited and shared among all users.
               </p>
               <p>
                    For example, if Zaragoza airport has 50 slots and multiple users buy them all, you will not be able to purchase slots as there will be none available.
               </p>
               <p>
                    A section shows how many unused slots you have available.
               </p>
               <p>
                    To sell a slot, click the red action button. However, you can only sell slots that are available and not occupied by any plane.
               </p>',

    'spyOnYourCompetenceTitle' => 'Spy on Your Competitors',
    'spyOnYourCompetence' => '<p>
                    Want to know what other users are doing? Here you will find useful tools for this purpose.
                </p>
                <p>
                    The first tool evaluates how <span class="bold">demanded a route</span> is. The more routes there are, the lower the demand, making it less profitable. Select the destination and origin to assess whether opening a new route is worthwhile.
                </p>
                <p>
                    The second tool lets you view <span class="bold">the routes created by a specific user</span>. This way, you can see their routes and even plan strategies to exploit the same routes and reduce their profits.
                </p>
                <p>
                    Lastly, a map displays all planes currently flying for all companies. Clicking on a plane shows its name (or registration if it is yours).
                </p>',

    'moreInfoTitle' => 'More Questions?',
    'moreInfo' => '
            If you have more questions about the application, don\'t hesitate to join our <a href="https://discord.gg/sUueRvrttY" target="_blank">Discord</a> server. If not, and you think you found a bug within the application, you will find a bug report button in the top menu. If you want to know more about this project, visit the ',
    'moreInfoAM' => 'About Me',
];


// Plantilla
// '' => '',