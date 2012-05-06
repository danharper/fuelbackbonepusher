# fuelbackbonepusher

Demo of FuelPHP, Backbone.js and Pusher. Demo at http://fuelbbpusher.phpfogapp.com/.

An example application demoing [Pusher](http://pusher.com) a realtime web API with [FuelPHP](http://fuelphp.com) on the server and [Backbone.js](http://backbonejs.org) on the client.

* API endpoint at `/api/messages` implemented in FuelPHP, just for GET and POST requests as the client supports nothing else
* On first load, current messages are 'bootstrapped' into the application to cut down requests
* Backbone provides a seamless UI for creating messages which are added to the list & pushed to the API
* FuelPHP then pushes the message out to all connected clients using Pusher. Each client then adds the new message to their list

Using the [FuelPHP Pusher package](https://github.com/lembubintik/pusherapp).