function page(find) {
    var search = new URL(window.location.href);
    var param = search.searchParams.get(find);
    return param;
}
