// Self invoking anonymous function, good for creating variables that will not interfere with anything that is outside of it
(function() {

    var link = document.getElementsByTagName("a")[0];

    link.onclick = function() {
        // XHR Object
        var xhr = new XMLHttpRequest();

        // handle the "onreadystatechange" event
        // xhr.readyState property values
        // 0 = uninitialized
        // 1 = Loading
        // 2 = Loaded
        // 3 = Interactive
        // 4 = Complete

        xhr.onreadystatechange = function() {
          if ((xhr.readyState == 4) && (xhr.status == 200 || xhr.status == 304))  {
              var body = document.getElementsByTagName("body")[0];
              var d = document.createElement("div");
              body.appendChild(d);

              var div = document.getElementsByTagName("div")[0];
              div.innerHTML = xhr.responseText;

              body.removeChild(link);
          }
        };

        // open the request
        xhr.open("GET", "files/ajax.html", true);

        // send the request

        xhr.send(null);

        return false; //return false is disable a default behavior of <a> tag so it will not send us to some link
    };


})();