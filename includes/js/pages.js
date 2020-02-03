class pages {

    // Get url parameters
    page(find) {
        var search = new URL(window.location.href);
        var param = search.searchParams.get(find);
        return param;
    }

    // Build a reference link, with only specifying the action parameter
    makeLink(action) {
        var link = 'index.php?page=' + page('page') + '&sub=' + page('sub') + '&action=' + action;
        var id = page('id') ?? null;
        if (id != null) {
            link += '&id=' + id;
        }
        return link;
    }

    // Append a single div to the document
    drawDiv(destination, HtmlId, HtmlClass) {
        var element = document.createElement(HtmlTag);
        element.setAttribute('id', HtmlId);
        element.setAttribute('class', HtmlClass);
        document.getElementById(destination).append(element);
    }

    // Append a single anchor to the document
    drawA(destination, HtmlId, HtmlClass, HtmlHref) {
        var element = document.createElement(HtmlTag);
        element.setAttribute('id', HtmlId);
        element.setAttribute('class', HtmlClass);
        element.setAttribute('href', HtmlHref);
        document.getElementById(destination).append(element);
    }

    // Draw the naming cell inside the table row
    drawNameCell(destination, key) {

        // Div id
        var divTarget = 'nameCell' + key;

        drawDiv(destination, divTarget, 'tablecell namecell');
    }

    // Draw the naming cell inside the table row, which is a link to a deeper level
    drawNameLinkCell(destination, key, link, name) {
        drawLinkCell(destination, key, link, name, 'name');
    }

    // Draw the action buttons behind the namecell
    drawButtonCell(destination, key, link, name) {
        drawLinkCell(destination, key, link, name, 'button');
    }

    drawLinkCell(destination, key, link, name, celltype) {
        
        // Main target id
        var mainTarget = destination + key;

        // Div id
        var divTarget = 'Button' + name + key; // Maybe prefix with destination variable

        // Anchor id
        var linkTarget = 'Link' + name + key; // Maybe prefix with destination variable

        var divCellClass = 'tablecell ' + celltype + 'cell';

        drawDiv(mainTarget, divTarget, divCellClass);
        drawA(divTarget, linkTarget, '', link);
        document.getElementById(linkTarget).append(name);
    }

    // Draw the containing table row
    drawTableRow(mainTarget, key) {

        // Div id
        var divTarget = 'tableRow' + key; // Maybe prefix with destination variable

        drawDiv(mainTarget, divTarget, 'tablerow');
    }

    // Draw add button
    drawAddButton(mainTarget, link, name) {

        // Link id
        var linkTarget = name + 'AddButton';

        drawA(mainTarget, linkTarget, 'button add', link);
        document.getElementById(linkTarget).append(name);
    }

    // Build table page
    pageAll(json, mainTarget) {
        for (var item in json) {

            // Set json values
            var key = json[item].id;
            var name = json[item].name;

            // Set child target
            var divTarget = 'tableRow' + key;

            // Set links
            var editLink = makeLink('2');
            var deleteLink = makeLink('3');

            // Draw!
            drawTableRow(mainTarget, key);
            drawNameLinkCell(divTarget, key, link, name);
            drawButtonCell(divTarget, key, editLink, 'Edit');
            drawButtonCell(divTarget, key, deleteLink, 'Delete');
        }
    }
}