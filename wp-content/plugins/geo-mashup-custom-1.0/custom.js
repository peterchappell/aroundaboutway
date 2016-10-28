GeoMashup.addAction( 'objectIcon', function( properties, object ) {
  var iconImagePath = '/marker-past-position.png';
  var thisPostId = parseInt(object.object_id, 10);
  var contextPostId = properties.context_object_id;
  if (contextPostId === thisPostId) {
    iconImagePath = '/marker-current-position.png';
  } else if (contextPostId < thisPostId) {
    iconImagePath = '/marker-future-position.png';
  }
  object.icon.image = properties.template_url_path + '/images' + iconImagePath;
});