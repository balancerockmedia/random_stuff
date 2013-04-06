define(['views/job_details'], function(JobDetailsView) {
  
  var router = Backbone.Router.extend({
    
    initialize: function() {
      Backbone.history.start();
    },
    
    routes: {
      '': 'index',
      'job/:id': 'job'
    },

    index: function() {
  
    },

    job: function(id) {
      var job_details_view = new JobDetailsView({
        model: CDIAJobBoard.collections.jobs.get(id)
      });
    }
  });
  
  return router;
  
});