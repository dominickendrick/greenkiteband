requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: 'js',
	paths: {
        lib: 'lib',
		app: 'app',
		jquery: 'lib/jquery',
		modernizr: 'lib/modernizr',
		enquire: 'lib/enquire'
    }
});

// Start the main app logic.
requirejs(['modernizr','enquire','app/polyfil','app/menu']);