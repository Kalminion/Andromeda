class pages {

    // Switch table name to display name
    nameSwitch(tableName) {
        switch(tableName) {
            case 'modules_types':
                return 'Modules types';
        }
    }

    pageSwitch() {
        switch(this.page('action') % 4) {
            case 0:
                return 'list';
            case 0.25:
                return 'add';
            case 0.5:
                return 'edit';
            case 0.75:
                return 'delete';
            default:
                return 'list';
        }
    }

    // Get url parameters
    page(find) {
        var search = new URL(window.location.href);
        var param = search.searchParams.get(find);
        return param;
    }

    // Build a reference link, with only specifying the action parameter
    makeLink(action) {
        var link = 'index.php?page=' + this.page('page') + '&sub=' + this.page('sub') + '&action=' + action;
        var id = this.page('id') ?? null;
        if (id != null) {
            link += '&id=' + id;
        }
        return link;
    }

    // Append a single div to the document
    drawDiv(destination, HtmlId, HtmlClass) {
        var element = document.createElement('div');
        element.setAttribute('id', HtmlId);
        element.setAttribute('class', HtmlClass);
        document.getElementById(destination).append(element);
    }

    // Append a single anchor to the document
    drawA(destination, HtmlId, HtmlClass, HtmlHref) {
        var element = document.createElement('a');
        element.setAttribute('id', HtmlId);
        element.setAttribute('class', HtmlClass);
        element.setAttribute('href', HtmlHref);
        document.getElementById(destination).append(element);
    }

    // Draw the naming cell inside the table row
    drawNameCell(destination, key) {
        
        // Div id
        var divTarget = 'nameCell' + key;

        this.drawDiv(destination, divTarget, 'tablecell namecell');
    }

    // Draw the naming cell inside the table row, which is a link to a deeper level
    drawNameLinkCell(destination, key, link, name) {
        this.drawLinkCell(destination, key, link, name, 'name');
    }

    // Draw the action buttons behind the namecell
    drawButtonCell(destination, key, link, name) {
        this.drawLinkCell(destination, key, link, name, 'button');
    }

    drawLinkCell(destination, key, link, name, celltype) {

        // Main target id
        var mainTarget = destination;

        // Div id
        var divTarget = 'Button' + name + key; // Maybe prefix with destination variable

        // Anchor id
        var linkTarget = 'Link' + name + key; // Maybe prefix with destination variable

        var divCellClass = 'tablecell ' + celltype + 'cell';

        this.drawDiv(mainTarget, divTarget, divCellClass);
        this.drawA(divTarget, linkTarget, '', link);
        document.getElementById(linkTarget).append(name);
    }

    // Draw the containing table row
    drawTableRow(mainTarget, key) {

        // Div id
        var divTarget = 'tableRow' + key; // Maybe prefix with destination variable

        this.drawDiv(mainTarget, divTarget, 'tablerow');
    }

    // Draw add button
    drawAddButton(mainTarget, link, name) {

        // Link id
        var linkTarget = name + 'AddButton';

        this.drawA(mainTarget, linkTarget, 'button add', link);
        document.getElementById(linkTarget).append(name);
    }

    // Draw title
    drawTitle(mainTarget) {
        var title = document.createElement('div');
        title.setAttribute('class', 'title');
        title.setAttribute('id', 'title');
        document.getElementById('main').append(title);
        document.getElementById('title').append(this.nameSwitch(mainTarget));
    }

    // Draw section, always places the section inside the <main> element
    drawSection(name) {
        var section = document.createElement('section');
        section.setAttribute('id', name);
        document.getElementById('main').append(section);
    }

    // Build the corresponding page
    pageBuilder(json, mainTarget) {
        switch(this.pageSwitch()) {
            case 'list':
                this.pageAll(json, mainTarget);
                break;
            case 'add':
                break;
            case 'edit':
                break;
            case 'delete':
                break;
            default:
                this.pageAll(json, mainTarget);
        }
    }

    // Build table page
    pageAll(json, mainTarget) {
        this.drawTitle(mainTarget);
        this.drawSection(mainTarget);

        for (var item in json) {

            // Set json values
            var key = json[item].id;
            var name = json[item].name;

            // Set child target
            var divTarget = 'tableRow' + key;

            // Set links
            var nameLink = this.makeLink('4');
            var editLink = this.makeLink('2');
            var deleteLink = this.makeLink('3');

            // Draw!
            this.drawTableRow(mainTarget, key);
            this.drawNameLinkCell(divTarget, key, nameLink, name);
            this.drawButtonCell(divTarget, key, editLink, 'Edit');
            this.drawButtonCell(divTarget, key, deleteLink, 'Delete');
        }

        // Set add button link
        var addLink = this.makeLink('1');

        // Draw add button
        this.drawAddButton(mainTarget, addLink, 'Add ' + this.nameSwitch(mainTarget));
    }
}

function executePages(json, mainTarget) {
    var newPage = new pages();
    newPage.pageBuilder(json, mainTarget);
}