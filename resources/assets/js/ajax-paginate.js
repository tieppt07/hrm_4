var ias = jQuery.ias({
    container:  'tbody',
    item:       'tr',
    pagination: '.pagination',
    next:       'a[rel="next"]'
});

// Add a loader image which is displayed during loading
ias.extension(new IASSpinnerExtension());

// Add a text when there are no more pages left to load
ias.extension(new IASNoneLeftExtension({text: "You reached the end"}));
