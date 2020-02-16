function request(callback, target, select, column = null, selector = null) {
    var request = new XMLHttpRequest();
    var location = 'api'; // Folder location, whole path is /api/index.php
    
    request.open("GET", location);
    request.setRequestHeader('target', target);
    request.setRequestHeader('select', select);

    if (column != null) {
        request.setRequestHeader('column', column);
    }
    if (selector != null) {
        request.setRequestHeader('selector', selector);
    }
    
    request.send();

    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callback(JSON.parse(request.responseText), target);
        }
    };
}