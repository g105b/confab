chrome.app.runtime.onLaunched.addListener(function() {
  chrome.app.window.create('AppWindow.html', {
    'bounds': {
      'width': 400,
      'height': 500
    }
  });
});