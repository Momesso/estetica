var Posts = Gillie.Handler.extend({

    initialize: function() {

        // Get information from all posts
        // and trigger 'posts.get' event for listeners
        // to paint them
        model.sync( 'posts.get' );
    }
});

// Posts instance
var posts = new Post();