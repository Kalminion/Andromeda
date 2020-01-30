function getContent(containerName) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            
            function drawButton(name, index, container, link) {
                // Draw button container
                var button = document.createElement('div');
                button.setAttribute('class', 'tablecell buttoncell');
                button.setAttribute('id', name + index);
                document.getElementById(container).append(button);

                // Draw button link
                var linkref = document.createElement('a');
                linkref.setAttribute('href', link);
                linkref.setAttribute('id', name + 'link' + index);
                document.getElementById(name + index).append(linkref);

                // Draw button name
                document.getElementById(name + 'link' + index).append(name);
            }

            function drawName(name, index, container) {
                // Draw name div
                var cellname = document.createElement('div');
                cellname.setAttribute('id', 'namecell' + index);
                cellname.setAttribute('class', 'tablecell namecell');
                document.getElementById(container).append(cellname);
                document.getElementById('namecell' + index).append(name.name);
            }

            function loop(item, index) {
                var rowName = containerName + 'Row' + index;

                // Add tablerow div
                var tableRow = document.createElement('div');
                tableRow.setAttribute('id', rowName);
                tableRow.setAttribute('class', 'tablerow');
                document.getElementById(containerName + "Content").append(tableRow);

                drawName(item, index, rowName);
                drawButton('Statics', index, rowName, window.location.href + 'action=1');
                drawButton('Edit', index, rowName, window.location.href + 'action=2');
                drawButton('Delete', index, rowName, window.location.href + 'action=3');
            }
            if (myObj[0] == 'No content found') {
                document.getElementById(containerName + 'Content').append(myObj[0]);
            } else {
                myObj.forEach(loop);
            }
        }
    };

    xmlhttp.open("GET", "includes/json/results.json", true);
    xmlhttp.send();
}