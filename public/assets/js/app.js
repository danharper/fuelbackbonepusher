$(function() {

	var app = window.app || {};

	// Model
	app.Message = Backbone.Model.extend({
		url: function() {
			var url = 'api/messages';
			if (this.id) {
				url += '/'+this.id;
			}
			return url;
		}
	});

	app.message = new app.Message;


	// Collection
	app.Messages = Backbone.Collection.extend({
		model: app.Message,
		url: 'api/messages',

		comparator: function(model) {
			return - model.id;
		}
	});

	app.messages = new app.Messages(window.Prefetch.messages);
	// app.messages.add(window.Prefetch.messages);

	// Views
	app.FormView = Backbone.View.extend({
		template: Handlebars.compile($('#template-form').html()),

		events: {
			'submit #new-list-item': 'add'
		},

		initialize: function() {
			_.bindAll(this, 'render');
			_.bindAll(this, 'add');
		},

		render: function() {
			this.$el.html(this.template({
				model: this.model.toJSON(),
				collection: this.collection.toJSON()
			}));
			return this;
		},

		add: function(e) {
			var self, params;
			e.preventDefault();
			self = this;
			params = {
				name: $('#new-name').val(),
				text: $('#new-text').val()
			}
			this.collection.create(params, {
				wait: true,
				success: function(model, response) {
					self.render();
				},
				error: function(model, response) {
					try {
						var json = $.parseJSON(response.responseText);
						if ('message' in json) {
							alert(json.message);
							return;
						}
					}
					catch(e) {}
					alert('Unknown error occurred. Error ' + response.status + '.');
				}
			});
		}
	});

	app.ListView = Backbone.View.extend({
		template: Handlebars.compile($('#template-list').html()),

		initialize: function() {
			_.bindAll(this, 'render');
			this.collection.on('add', this.render);
		},

		render: function() {
			this.$el.html(this.template({
				model: this.model.toJSON(),
				collection: this.collection.toJSON()
			}));
			return this;
		}
	});


	// Router
	app.Router = Backbone.Router.extend({
		routes: {
			'*path': 'home'
		},

		home: function() {
			this.views = {}

			this.views.form = new app.FormView({
				model: app.message,
				collection: app.messages
			});
			$('#form-shell').empty().append(this.views.form.render().el);

			this.views.list = new app.ListView({
				model: app.message,
				collection: app.messages
			});
			$('#list-shell').empty().append(this.views.list.render().el);
		}
	});

	app.router = new app.Router();
	Backbone.history.start({ pushState: true });
	Backbone.emulateJSON = true;


	// Pusher
	var pusher = new Pusher('3b36299ab399c2b65106');
	var channel = pusher.subscribe('fuelbbpusher');
	channel.bind('new_message', function(data) {
		app.messages.add(data);
	});

});