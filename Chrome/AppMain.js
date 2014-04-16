chrome.app.runtime.onLaunched.addListener(function() {
  chrome.app.window.create("http://confab.dev.php.gt", {
    'bounds': {
      'width': 800,
      'height': 600
    }
  });
});