requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: 'sites/all/themes/greenkiteband/js',
	paths: {
        lib: 'lib',
		app: 'app',
		jquery: 'lib/jquery',
		modernizr: 'lib/modernizr',
		enquire: 'lib/enquire',
		polyfil: 'app/polyfil'
    }
});

// Start the main app logic.
requirejs(['app/menu']);